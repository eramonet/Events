<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Product;
use App\Exports\OrderExport;
use Illuminate\Http\Request;
use App\Services\OrderService;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\OrderProduct;
use App\Models\OrderTaxes;
use App\Models\Shipping;
use App\Models\Vendor;
use App\Models\WithDraw;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{


    protected $orderService;
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
        $this->middleware(['permission:orders-read'])->only(
            [
                'index',
                'export',
                'newOrders',
                'inprogressOrders',
                'deliveredOrders',
                'cancelledOrders',
                'show',
            ]
        );
        $this->middleware(['permission:orders-update'])->only([
            'inprogressAction',
            'deliveredAction',
            'updateComment',
            'updateCustomAddressFromAdmin',
            'cancelledAction',
        ]);

        $this->middleware(['permission:orders-extra-fees-create'])->only(['AddExtraFees']);
        $this->middleware(['permission:orders-extra-fees-delete'])->only(['deleteExtraFees']);


        $this->middleware(['permission:orders-special-discounts-create'])->only(['AddSpecialDiscount']);
        $this->middleware(['permission:orders-special-discounts-delete'])->only(['deleteSpecialDiscount']);

        // $this->middleware(['permission:orders-delete'])->only(['destroy']);
    }



    public function index()
    {
        $data = ['shipping_id' => 2, 'promo_id' => 1];
        $order = Order::create($data);


        $total = 0;
        $items = [];
        $quantities = collect([1, 2, 3, 4]);
        foreach ([2] as $id) {



            $product = Product::find($id);

            if ($product) {

                $quantity = $quantities->random();

                $items[$product->id] = [
                    'price' => $product->real_price,
                    'quantity' => $quantity,
                    'total' => $product->price_after_taxes * $quantity,
                    'taxes' => $product->price_after_taxes - $product->real_price,
                ];

                $total += $product->price_after_taxes * $quantity;
            }
        }


        $order->products()->attach($items);
        $order->extra_fees()->create([
            'cost' => 100
        ]);
        $order->total = $total;
        $order->save();
        $order->generateUniqueOrderNumber();
        $order->calcPromoCode();
        $order->calcShipping();
        $order->calcOrderTotalSum();
        $order->save();




        return $order;
    }

    public function calculate_order_price($orders)
    {
        $useradmin = Admin::where('id', Auth::guard('admin')->id())->first();
        $login_id = "" ;

        if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')) {
            $login_id = $useradmin->id ;
        }else{
            $vendor = Vendor::where("id", $useradmin->vendor_id)->first();
            $login_id = $vendor->id ;
        }

        $total_orders_price = 0;
        $product_price_iteration = 0;
        $promocode = 0;
        $total_tax = 0;

        $order_products_count = 0;
        $total_outer_orders_price = 0;

        $arr = [];

        foreach ($orders as $order) {

            $order_products_count = count($order->order_products);

            // loop through order_products
            foreach ($order->order_products as $order_product) {

                if( $order_product->vendor_id == $login_id ){
                    $order["current_login_action"] = $order_product->status ;
                }else{
                    $order["current_login_action"] = "no_action" ;
                }


                $product_price_iteration = $order_product->price * $order_product->product_quantity;




                if ($order->customer_promo_code_type) {
                    if ($order->customer_promo_code_type == "percent") {
                        $product_price_iteration = $product_price_iteration * (($order->customer_promo_code_value / $order_products_count) / 100);
                    } elseif ($order->customer_promo_code_type == "amount") {

                        $product_price_iteration = $product_price_iteration - ($order->customer_promo_code_value / $order_products_count);
                    }
                }




                $product_price_iteration = $product_price_iteration - ($product_price_iteration * ($order_product->commission / 100));

                // calculate taxes
                if ($order_product->order_taxes->count() > 0) {

                    foreach ($order_product->order_taxes as $order_tax) {
                        if ($order_tax->order_number == $order->order_number) {
                            $total_tax += $order_tax->taxe_percentage;
                        }
                    }
                    $product_price_iteration = $product_price_iteration + ($product_price_iteration * ($total_tax / 100));
                }



                $total_orders_price += $product_price_iteration;






                $total_tax = 0;
            }

            // check shipping
            $shipping = Shipping::where("city_id", $order->city_id)->first();

            if ($shipping) {
                $product_price_iteration = $product_price_iteration + $shipping->cost;
                $total_orders_price += $shipping->cost;
            }



            $total_outer_orders_price += $total_orders_price;


            $order["total_order_price"] = $total_orders_price;

            $total_orders_price = 0;
        }

        return [$orders, $total_outer_orders_price];
    }

    public function newOrders(Request $request)
    {
        $useradmin = Admin::where('id', Auth::guard('admin')->id())->first();
        if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')) {
            $orders = Order::pending();

            $orders = $this->calculate_order_price($orders)[0];

            $total_outer_orders_price = $this->calculate_order_price($orders)[1];

            return \view('admin.order.index', compact('orders', 'total_outer_orders_price'));
        } else {
            $vendor = Vendor::where("id", $useradmin->vendor_id)->first();

            $getOrders = OrderProduct::where('vendor_id', $vendor->id)->pluck('order_number');


            $orders = Order::whereIn('order_number', $getOrders)->with(["order_products" => function ($query) use ($vendor) {
                $query->where('vendor_id', $vendor->id);
            }])->pending();

            $orders = $this->calculate_order_price($orders)[0];

            $total_outer_orders_price = $this->calculate_order_price($orders)[1];

            return \view('admin.order.index', compact('orders', 'total_outer_orders_price'));
        }
    }


    public function inprogressOrders(Request $request)
    {
        $useradmin = Admin::where('id', Auth::guard('admin')->id())->first();
        if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')) {
            $orders = Order::inProgress();

            $orders = $this->calculate_order_price($orders)[0];

            $total_outer_orders_price = $this->calculate_order_price($orders)[1];

            return \view('admin.order.index', compact('orders', 'total_outer_orders_price'));
        } else {
            $vendor = Vendor::where("id", $useradmin->vendor_id)->first();

            $getOrders = OrderProduct::where('vendor_id', $vendor->id)->pluck('order_number');


            $orders = Order::whereIn('order_number', $getOrders)->with(["order_products" => function ($query) use ($vendor) {
                $query->where('vendor_id', $vendor->id);
            }])->inProgress();

            $orders = $this->calculate_order_price($orders)[0];

            $total_outer_orders_price = $this->calculate_order_price($orders)[1];

            return \view('admin.order.index', compact('orders', 'total_outer_orders_price'));
        }
    }

    public function deliveredOrders(Request $request)
    {
        $type = 'delivered';
        $order_by = 'delivered_at';
        $useradmin = Admin::where('id', Auth::guard('admin')->id())->first();
        if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')) {
            $orders = Order::delivered();

            $orders = $this->calculate_order_price($orders)[0];

            $total_outer_orders_price = $this->calculate_order_price($orders)[1];

            return \view('admin.order.index', compact('orders', 'total_outer_orders_price'));
        } else {
            $vendor = Vendor::where("id", $useradmin->vendor_id)->first();

            $getOrders = OrderProduct::where('vendor_id', $vendor->id)->pluck('order_number');


            $orders = Order::whereIn('order_number', $getOrders)->with(["order_products" => function ($query) use ($vendor) {
                $query->where('vendor_id', $vendor->id);
            }])->delivered();

            $orders = $this->calculate_order_price($orders)[0];

            $total_outer_orders_price = $this->calculate_order_price($orders)[1];

            return \view('admin.order.index', compact('orders', 'total_outer_orders_price'));
        }
    }

    public function cancelledOrders(Request $request)
    {



        $type = 'cancelled';
        $order_by = 'cancelled_at';
        $useradmin = Admin::where('id', Auth::guard('admin')->id())->first();
        if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')) {
            $orders = Order::canceled();
            $orders = $this->calculate_order_price($orders)[0];

            $total_outer_orders_price = $this->calculate_order_price($orders)[1];

            return \view('admin.order.index', compact('orders', 'total_outer_orders_price'));
        } else {
            $vendor = Vendor::where("id", $useradmin->vendor_id)->first();

            $getOrders = OrderProduct::where('vendor_id', $vendor->id)->pluck('order_number');


            $orders = Order::whereIn('order_number', $getOrders)->with(["order_products" => function ($query) use ($vendor) {
                $query->where('vendor_id', $vendor->id);
            }])->canceled();

            $orders = $this->calculate_order_price($orders)[0];

            $total_outer_orders_price = $this->calculate_order_price($orders)[1];

            return \view('admin.order.index', compact('orders', 'total_outer_orders_price'));
        }
    }

    public function export($type)
    {
        ob_end_clean();
        ob_start();

        return Excel::download(new OrderExport($type), Carbon::now() . '-' . $type . '-orders.xlsx');
    }

    public function calculate_specific_order_price($order)
    {
        $total_orders_price = 0;
        $product_price_iteration = 0;
        $promocode = 0;
        $total_tax = 0;

        $total_products_price = 0;
        $total_comissions = 0;
        $total_product_taxes = 0;
        $shipping = 0;

        $arr = [];

        $useradmin = Admin::where('id', Auth::guard('admin')->id())->first();
        $login_id = "" ;

        if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')) {
            $login_id = $useradmin->id ;
        }else{
            $vendor = Vendor::where("id", $useradmin->vendor_id)->first();
            $login_id = $vendor->id ;
        }

        $order_products_count = count($order->order_products);

        // loop through order_products
        foreach ($order->order_products as $order_product) {

            if( $order_product->vendor_id == $login_id ){
                $order["current_login_action"] = $order_product->status ;
            }else{
                $order["current_login_action"] = "You Cannot Take Any Action" ;
            }

            $product_price_iteration = $order_product->price * $order_product->product_quantity;



            $total_products_price += $order_product->price * $order_product->product_quantity;

            if ($order->customer_promo_code_type) {
                if ($order->customer_promo_code_type == "percent") {
                    $product_price_iteration = $product_price_iteration * (($order->customer_promo_code_value / $order_products_count) / 100);
                } elseif ($order->customer_promo_code_type == "amount") {

                    $product_price_iteration = $product_price_iteration - ($order->customer_promo_code_value / $order_products_count);
                }
            }

            $total_comissions += ( $product_price_iteration * ($order_product->commission / 100) );

            // return $total_comissions ;



            $product_price_iteration = $product_price_iteration - ($product_price_iteration * ($order_product->commission / 100));
            // $arr[] = ''.$product_price_iteration .' * ' . (($order_product->commission / 100)).' = ' . $total_comissions ;

            // calculate taxes
            if ($order_product->order_taxes->count() > 0) {
                foreach ($order_product->order_taxes as $order_tax) {
                    if ($order_tax->order_number == $order->order_number) {
                        $total_tax += $order_tax->taxe_percentage;
                    }
                }

                $total_product_taxes += $product_price_iteration + ($product_price_iteration * ($total_tax / 100));

                $product_price_iteration = $product_price_iteration + ($product_price_iteration * ($total_tax / 100));
            }

            $total_orders_price += $product_price_iteration;


            $total_tax = 0;
        }

        // check shipping
        $shipping = Shipping::where("city_id", $order->city_id)->first();

        if ($shipping) {
            $product_price_iteration = $product_price_iteration + $shipping->cost;
            $total_orders_price += $shipping->cost;
        }

        // return $arr ;

        $order["total_products_price"] = $total_products_price;
        $order["total_comissions"] = $total_comissions;
        $order["total_product_taxes"] = $total_product_taxes;
        $order["shipping"] = $shipping ? $shipping->cost : 0;

        return [$order, $total_orders_price];
    }

    public function show(Request $request, $id)
    {

        $useradmin = Admin::where('id', Auth::guard('admin')->id())->first();

        $order = [];

        if (auth()->guard('admin')->user()->getRoles()[0] == "vendor-admin") { // vendor

            $order = Order::latest()->with(["order_products" => function ($order_products) {
                $order_products->where("vendor_id", auth()->guard('admin')->user()->vendor->id);
            }])->where("order_number", $id)->first();
        } else {
            $order = Order::latest()->with("order_products")->where("order_number", $id)->first();
        }

        // return $this->calculate_specific_order_price($order) ;

        $order = $this->calculate_specific_order_price($order)[0];

        $total_orders_price = $this->calculate_specific_order_price($order)[1];


        $order->load([
            'products',
            'country',
            'city',
            'inprogress_admin',
            'delivered_admin',
            'cancelled_admin'
        ]);

        return \view('admin.order.show', \compact('order', 'total_orders_price'));
    }



    public function inprogressAction(Request $request, $id)
    {
        $updated = [];
        // $order =  Order::latest()->with("order_products")->where("order_number", $id)->first();

        if (auth()->guard('admin')->user()->getRoles()[0] == "vendor-admin") {
            $order = Order::latest()->with(["order_products" => function ($order_products) {
                $order_products->where("vendor_id", auth()->guard('admin')->user()->vendor->id);
            }])->where("order_number", $id)->first();
        } else {
            $order = Order::latest()->with(["order_products" => function ($order_products) {
                $order_products->where("vendor_id", auth()->guard('admin')->user()->id);
            }])->where("order_number", $id)->first();
        }


        if (!$order) {
            $request->session()->flash('failed', 'Order Not Found');
            return redirect()->back();
        }

        foreach ($order->order_products as $order_product) {
            $order_product->update([
                "status" => "inprogress"
            ]);
        }

        // count all order products
        $order_counter =  OrderProduct::where("order_number", $id)->count();

        $inprogress_counter = OrderProduct::where([
            ["order_number", $id],
            ["status", "inprogress"]
        ])->count();

        if ($inprogress_counter == $order_counter) {
            $updated = $order->update([
                "status" => "inprogress"
            ]);
        }

        $request->session()->flash('success', 'Order Now In Progress ');


        return redirect()->back();
    }


    public function deliveredAction(Request $request, $id)
    {

        $product_price = 0;
        $event_commission = 0;
        $final_price = 0;
        $final_event_commission = 0;
        $all_price_without_any_thing = 0;

        if (auth()->guard('admin')->user()->getRoles()[0] == "vendor-admin") {
            $order = Order::latest()->with(["order_products" => function ($order_products) {
                $order_products->where("vendor_id", auth()->guard('admin')->user()->vendor->id);
            }])->where("order_number", $id)->first();
        } else {
            $order = Order::latest()->with(["order_products" => function ($order_products) {
                $order_products->where("vendor_id", auth()->guard('admin')->user()->id);
            }])->where("order_number", $id)->first();
        }

        if (!$order) {
            $request->session()->flash('failed', 'Order Not Found');
            return redirect()->back();
        }
        $order_products_count = count($order->order_products);
        // calculate
        if ($order->order_products->count() > 0) {
            foreach ($order->order_products as $order_product) {

                // total product price with quantity
                $product_price = $order_product->price * $order_product->product_quantity;

                $all_price_without_any_thing += $product_price;

                // minus promo code from it
                if ($order->customer_promo_code_type) {
                    if ($order->customer_promo_code_type == "percent") {
                        $product_price = $product_price * (($order->customer_promo_code_value / $order_products_count) / 100);
                    } elseif ($order->customer_promo_code_type == "amount") {

                        $product_price = $product_price - ($order->customer_promo_code_value / $order_products_count);
                    }
                }

                // check commission if have

                if (auth()->guard('admin')->user()->vendor) {
                    $event_commission = auth()->guard('admin')->user()->vendor->commission;
                } else {
                    $event_commission = 0;
                }

                $final_event_commission += ($product_price * ($event_commission / 100));

                $product_price = $product_price - ($product_price * ($event_commission / 100));

                $final_price += $product_price;
            }

            // check shipping
            $shipping = Shipping::where("city_id", $order->city_id)->first();

            if ($shipping) {
                $final_price = $final_price + $shipping->cost;
                $all_price_without_any_thing += $shipping->cost ;
            }
        }

        $with_draw = WithDraw::create([
            "vendor_name" => auth()->guard('admin')->user()->vendor ? auth()->guard('admin')->user()->vendor->title_en : "Events" ,
            "vendor_phone" => auth()->guard('admin')->user()->vendor ? auth()->guard('admin')->user()->vendor->phone : null,
            "money_type" => "Product Order",
            "order_number" => $order->order_number,
            "action_id" => $order->id,
            "total" => $all_price_without_any_thing,
            "have" => $final_price,
            "our_commission" => $final_event_commission
        ]);

        if ($order->order_products->count() > 0) {
            foreach ($order->order_products as $order_product) {
                // stock minus one
                $product = Product::where("id", $order_product->product->id)->orWhere("title_en", $order_product->product_title)->first();
                $product->update([
                    "stock" => $product->stock - $order_product->product_quantity
                ]);
            }
        }

        foreach ($order->order_products as $order_product) {
            $order_product->update([
                "status" => "delivered"
            ]);
        }

        // count all order products
        $order_counter =  OrderProduct::where("order_number", $id)->count(); // all order_products

        $inprogress_counter = OrderProduct::where([
            ["order_number", $id],
            ["status", "delivered"]
        ])->count(); // delivered order_products


        if ($inprogress_counter == $order_counter) {
            $updated = $order->update([
                "status" => "delivered"
            ]);
        }





        $request->session()->flash('success', 'Order delivered SuccessFully');


        return redirect()->back();
    }

    public function cancelledAction(Request $request, $id)
    {
        if (auth()->guard('admin')->user()->getRoles()[0] == "vendor-admin") {
            $order = Order::latest()->with(["order_products" => function ($order_products) {
                $order_products->where("vendor_id", auth()->guard('admin')->user()->vendor->id);
            }])->where("order_number", $id)->first();
        } else {
            $order = Order::latest()->with(["order_products" => function ($order_products) {
                $order_products->where("vendor_id", auth()->guard('admin')->user()->id);
            }])->where("order_number", $id)->first();
        }

        if (!$order) {
            $request->session()->flash('failed', 'Order Not Found');
            return redirect()->back();
        }


        foreach ($order->order_products as $order_product) {
            $order_product->update([
                "status" => "cancelled"
            ]);
        }

        // count all order products
        $order_counter =  OrderProduct::where("order_number", $id)->count();

        $inprogress_counter = OrderProduct::where([
            ["order_number", $id],
            ["status", "cancelled"]
        ])->count();

        if ($inprogress_counter == $order_counter) {
            $updated = $order->update([
                "status" => "cancelled"
            ]);
        }

        $request->session()->flash('success', 'Order Cancelled SuccessFully');

        return redirect()->back();
    }

    public function AddExtraFees(Request $request, $id)
    {
        $order = $this->orderService->getById($id);
        if (!$order) {
            $request->session()->flash('failed', 'Order Not Found');
            return redirect()->back();
        }



        $validator = \Validator::make($request->all(), [
            'cost' => ['required', 'numeric'],
            'note' => ['required', 'string'],

        ]);

        if ($validator->fails()) {

            $request->session()->flash('failed', 'Something Wrong');
            return redirect()->back();
        }
        $updated = $this->orderService->AddExtraFees($order, $request);

        if ($updated) {
            $request->session()->flash('success', 'Extra Fees Added SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }


        return redirect()->back();
    }


    public function AddSpecialDiscount(Request $request, $id)
    {
        $order = $this->orderService->getById($id);
        if (!$order) {
            $request->session()->flash('failed', 'Order Not Found');
            return redirect()->back();
        }



        $validator = \Validator::make($request->all(), [
            'cost' => ['required', 'numeric'],
            'note' => ['required', 'string'],

        ]);

        if ($validator->fails()) {
            $request->session()->flash('failed', 'Something Wrong');
            return redirect()->back();
        }
        $updated = $this->orderService->AddSpecialDiscount($order, $request);

        if ($updated) {
            $request->session()->flash('success', 'Special Discount Added SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }


        return redirect()->back();
    }



    public function updateComment(Request $request, $id)
    {
        $order = $this->orderService->getById($id);
        if (!$order) {
            $request->session()->flash('failed', 'Order Not Found');
            return redirect()->back();
        }
        $request->validate([
            'comment' => [
                'required', 'string',
            ],
        ]);

        $updated = $this->orderService->updateComment($order, $request);

        if ($updated) {
            $request->session()->flash('success', 'Order Comment Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();
    }


    public function updateCustomAddressFromAdmin(Request $request, $id)
    {
        $order = $this->orderService->getById($id);
        if (!$order) {
            $request->session()->flash('failed', 'Order Not Found');
            return redirect()->back();
        }
        $request->validate([
            'custom_address_from_admin' => [
                'required', 'string',
            ],
        ]);

        $updated = $this->orderService->updateCustomAddressFromAdmin($order, $request);

        if ($updated) {
            $request->session()->flash('success', 'Order Custom Address Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();
    }



    public function deleteExtraFees(Request $request, $orderId, $id)
    {
        $order = $this->orderService->getById($orderId);
        if (!$order) {
            $request->session()->flash('failed', 'Order Not Found');
            return redirect()->back();
        }


        $deleted = $this->orderService->deleteExtraFees($order, $id);

        if ($deleted) {
            $request->session()->flash('success', 'Extra Fees Deleted SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }


        return redirect()->back();
    }


    public function deleteSpecialDiscount(Request $request, $orderId, $id)
    {
        $order = $this->orderService->getById($orderId);
        if (!$order) {
            $request->session()->flash('failed', 'Order Not Found');
            return redirect()->back();
        }


        $deleted = $this->orderService->deleteSpecialDiscount($order, $id);

        if ($deleted) {
            $request->session()->flash('success', 'Special Discount Deleted SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }


        return redirect()->back();
    }
}
