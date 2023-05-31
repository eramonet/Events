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
use App\Models\Shipping;
use App\Models\Vendor;
use App\Models\WithDraw;
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

    public function newOrders(Request $request)
    {
        $useradmin = Admin::where('id', Auth::guard('admin')->id())->first();
        if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')) {
            $orders = Order::pending();
            $total_order_price = 0;
            foreach ($orders as $order) {
                $total_order_price += $order->product_total_price + $order->total_taxes_price;
            }

            foreach ($orders as $order) {
                $total_products_final = 0;
                $total_commissions = 0;
                $total_taxes = 0;
                $total_taxes_value = 0;
                $arr = [];

                $total_product_with_taxes = 0;

                foreach ($orders as $order) {
                    if (count($order->order_products) > 0) {
                        foreach ($order->order_products as $item) {
                            $total_products_final += ($item->product->real_price * $item->product_quantity);
                            $total_commissions += $item->product->owner ? (($item->product->owner->commission / 100) * $total_products_final) : 0;

                            if ($item->product->taxes->count() > 0) {
                                foreach ($item->product->taxes as $tax) {
                                    $total_taxes += $tax->tax->percentage;
                                    $total_taxes_value +=
                                        (
                                            (
                                                ($item->product->real_price * $item->product_quantity) -
                                                ($item->product->owner ? (($item->product->owner->commission / 100)
                                                    *
                                                    $item->product->real_price * $item->product_quantity
                                                ) : 0
                                                )
                                            )
                                        ) * ($tax->tax->percentage / 100);
                                }
                            }

                            $total_product_with_taxes +=
                                (
                                    (
                                        ($item->product->real_price * $item->product_quantity) -
                                        ($item->product->owner ? (($item->product->owner->commission / 100)
                                            *
                                            $item->product->real_price * $item->product_quantity
                                        ) : 0
                                        )
                                    )
                                )
                                +
                                (
                                    ($item->product->real_price * $item->product_quantity) -
                                    ($item->product->owner ? (($item->product->owner->commission / 100) * $item->product->real_price * $item->product_quantity) : 0)
                                ) * ($total_taxes / 100);

                            $total_taxes = 0;
                        }
                    }



                    $shippings = Shipping::where("city_id", $order->city_id)->first() ? Shipping::where("city_id", $order->city_id)->first()->cost : "0";

                    $total_product_with_taxes += $shippings;
                }
            }

            $order["total_price_for_this"] = $total_product_with_taxes ;
            
            return \view('admin.order.index', compact('orders', 'total_product_with_taxes'));
        } else {
            $vendor = Vendor::where("id", $useradmin->vendor_id)->first();

            $getOrders = OrderProduct::where('vendor_id', $vendor->id)->pluck('order_number');
            $orders = Order::whereIn('order_number', $getOrders)->pending();
            $total_order_price = 0;
            foreach ($orders as $order) {
                $total_order_price += $order->product_total_price + $order->total_taxes_price;
            }

            $total_products_final = 0;
            $total_commissions = 0;
            $total_taxes = 0;
            $total_taxes_value = 0;
            $arr = [];

            $total_product_with_taxes = 0;

            foreach ($orders as $order) {
                if (count($order->order_products) > 0) {
                    foreach ($order->order_products as $item) {
                        if ($item->vendor_id == $vendor->id) {
                            $total_products_final += ($item->product->real_price * $item->product_quantity);
                            $total_commissions += $item->product->owner ? (($item->product->owner->commission / 100) * $total_products_final) : 0;

                            if ($item->product->taxes->count() > 0) {
                                foreach ($item->product->taxes as $tax) {
                                    $total_taxes += $tax->tax->percentage;
                                    $total_taxes_value +=
                                        (
                                            (
                                                ($item->product->real_price * $item->product_quantity) -
                                                ($item->product->owner ? (($item->product->owner->commission / 100)
                                                    *
                                                    $item->product->real_price * $item->product_quantity
                                                ) : 0
                                                )
                                            )
                                        ) * ($tax->tax->percentage / 100);
                                }
                            }

                            $total_product_with_taxes +=
                                (
                                    (
                                        ($item->product->real_price * $item->product_quantity) -
                                        ($item->product->owner ? (($item->product->owner->commission / 100)
                                            *
                                            $item->product->real_price * $item->product_quantity
                                        ) : 0
                                        )
                                    )
                                )
                                +
                                (
                                    ($item->product->real_price * $item->product_quantity) -
                                    ($item->product->owner ? (($item->product->owner->commission / 100) * $item->product->real_price * $item->product_quantity) : 0)
                                ) * ($total_taxes / 100);

                            $total_taxes = 0;
                        }
                    }
                }



                $shippings = Shipping::where("city_id", $order->city_id)->first() ? Shipping::where("city_id", $order->city_id)->first()->cost : "0";

                $total_product_with_taxes += $shippings;

                $order["total_price_for_this"] = $total_product_with_taxes ;
            }

            return \view('admin.order.index', compact('orders', 'total_product_with_taxes'));
        }
    }


    public function inprogressOrders(Request $request)
    {
        $type = 'inprogress';
        $order_by = 'inprogress_at';
        $useradmin = Admin::where('id', Auth::guard('admin')->id())->first();
        if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')) {
            $orders = Order::inProgress();
            // return $orders;
            $total_order_price = 0;
            foreach ($orders as $order) {
                $total_order_price += $order->product_total_price + $order->total_taxes_price;
            }
            return \view('admin.order.index', \compact('orders', 'type', 'total_order_price'));
        } else {
            $vendor = Vendor::where("id", $useradmin->vendor_id)->first();
            $getOrders = OrderProduct::where('vendor_id', $vendor->id)->pluck('order_number');
            $orders = Order::whereIn('order_number', $getOrders)->inProgress();
            $total_order_price = 0;
            foreach ($orders as $order) {
                $total_order_price += $order->product_total_price + $order->total_taxes_price;
            }
            return \view('admin.order.index', compact('orders', 'total_order_price'));
        }
    }

    public function deliveredOrders(Request $request)
    {
        $type = 'delivered';
        $order_by = 'delivered_at';
        $useradmin = Admin::where('id', Auth::guard('admin')->id())->first();
        if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')) {
            $orders = Order::delivered();
            $total_order_price = 0;
            foreach ($orders as $order) {
                $total_order_price += $order->product_total_price + $order->total_taxes_price;
            }
            return \view('admin.order.index', \compact('orders', 'type', 'total_order_price'));
        } else {
            $vendor = Vendor::where("id", $useradmin->vendor_id)->first();
            $getOrders = OrderProduct::where('vendor_id', $vendor->id)->pluck('order_number');
            $orders = Order::whereIn('order_number', $getOrders)->delivered();

            $total_order_price = 0;
            foreach ($orders as $order) {
                $total_order_price += $order->product_total_price + $order->total_taxes_price;
            }
            return \view('admin.order.index', compact('orders', 'total_order_price'));
        }
    }

    public function cancelledOrders(Request $request)
    {



        $type = 'cancelled';
        $order_by = 'cancelled_at';
        $useradmin = Admin::where('id', Auth::guard('admin')->id())->first();
        if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')) {
            $orders = Order::canceled();
            $total_order_price = 0;
            foreach ($orders as $order) {
                $total_order_price += $order->product_total_price + $order->total_taxes_price;
            }
            return \view('admin.order.index', \compact('orders', 'type', 'total_order_price'));
        } else {
            $getOrders = OrderProduct::where('vendor_id', $useradmin->vendor->id)->pluck('order_number');
            $orders = Order::whereIn('order_number', $getOrders)->canceled();
            $total_order_price = 0;
            foreach ($orders as $order) {
                $total_order_price += $order->product_total_price + $order->total_taxes_price;
            }
            return \view('admin.order.index', compact('orders', 'total_order_price'));
        }
    }

    public function export($type)
    {
        ob_end_clean();
        ob_start();

        return Excel::download(new OrderExport($type), Carbon::now() . '-' . $type . '-orders.xlsx');
    }



    public function show(Request $request, $id)
    {

        $useradmin = Admin::where('id', Auth::guard('admin')->id())->first();

        $order = [];

        if (auth()->guard('admin')->user()->getRoles()[0] == "vendor-admin") {
            $order = Order::latest()->with(["order_products" => function ($order_products) {
                $order_products->where("vendor_id", auth()->guard('admin')->user()->vendor->id);
            }])->where("order_number", $id)->first();
        } else {
            $order = Order::latest()->with("order_products")->where("order_number", $id)->first();
        }


        $checkorder = [];

        if (auth()->guard('admin')->user()->getRoles()[0] == "vendor-admin") {
            $checkorder = Order::latest()->with(["order_products" => function ($order_products) {
                $order_products->where("vendor_id", auth()->guard('admin')->user()->vendor->id);
            }])->where("order_number", $id)->first();
        } else {
            $checkorder = Order::latest()->with(["order_products" => function ($order_products) {
                $order_products->where("vendor_id", auth()->guard('admin')->user()->id);
            }])->where("order_number", $id)->first();
        }

        $order["final_status"] = $checkorder->order_products[0]->status;


        if (!$order) {
            $request->session()->flash('failed', 'Order Not Found');
            return redirect()->back();
        }

        $total_products_final = 0;
        $total_commissions = 0;
        $total_taxes = 0;
        $total_taxes_value = 0;
        $arr = [];

        $total_product_with_taxes = 0;

        if (count($order->order_products) > 0) {
            foreach ($order->order_products as $item) {
                $total_products_final += ($item->product->real_price * $item->product_quantity);
                $total_commissions += $item->product->owner ? (($item->product->owner->commission / 100) * $total_products_final) : 0;

                if ($item->product->taxes->count() > 0) {
                    foreach ($item->product->taxes as $tax) {
                        $total_taxes += $tax->tax->percentage;
                        $total_taxes_value +=
                            (
                                (
                                    ($item->product->real_price * $item->product_quantity) -
                                    ($item->product->owner ? (($item->product->owner->commission / 100)
                                        *
                                        $item->product->real_price * $item->product_quantity
                                    ) : 0
                                    )
                                )
                            ) * ($tax->tax->percentage / 100);
                    }
                }

                $total_product_with_taxes +=
                    (
                        (
                            ($item->product->real_price * $item->product_quantity) -
                            ($item->product->owner ? (($item->product->owner->commission / 100)
                                *
                                $item->product->real_price * $item->product_quantity
                            ) : 0
                            )
                        )
                    )
                    +
                    (
                        ($item->product->real_price * $item->product_quantity) -
                        ($item->product->owner ? (($item->product->owner->commission / 100) * $item->product->real_price * $item->product_quantity) : 0)
                    ) * ($total_taxes / 100);

                $total_taxes = 0;
            }
        }



        $shippings = Shipping::where("city_id", $order->city_id)->first() ? Shipping::where("city_id", $order->city_id)->first()->cost : "0";

        $total_product_with_taxes += $shippings;

        $order->load([
            'products',
            'country',
            'city',
            'inprogress_admin',
            'delivered_admin',
            'cancelled_admin'
        ]);
        return \view('admin.order.show', \compact('order', 'total_products_final', 'total_commissions', 'total_product_with_taxes', 'shippings', 'total_taxes_value'));
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
        $order_counter =  OrderProduct::where("order_number", $id)->count();

        $inprogress_counter = OrderProduct::where([
            ["order_number", $id],
            ["status", "delivered"]
        ])->count();

        if ($inprogress_counter == $order_counter) {
            $updated = $order->update([
                "status" => "delivered"
            ]);


            $order = [];

            if (auth()->guard('admin')->user()->vendor) {
                $order = Order::latest()->with(["order_products" => function ($order_products) {
                    $order_products->where("vendor_id",  auth()->guard('admin')->user()->vendor->id);
                }])->where("order_number", $id)->first();
            } else {
                $order = Order::latest()->with(["order_products" => function ($order_products) {
                    $order_products->where("vendor_id", "!=",  auth()->guard('admin')->user()->id);
                }])->where("order_number", $id)->first();
            }

            $our_commission = 0;
            $final_price = 0;

            foreach ($order->order_products as $order_product) {

                $total_taxes = 0;

                if ($order_product->product->taxes->count() > 0) {
                    foreach ($order_product->product->taxes as $taxe) {
                        $total_taxes += $order_product->price * ($taxe->tax->percentage / 100);
                    }
                }

                $our_commission += $order_product->price * $order_product->product_quantity * ($order_product->product->admin->commission / 100);

                $final_price += ($order_product->price  + ($total_taxes)) * $order_product->product_quantity;


                $total_taxes = 0;
            }

            WithDraw::create([
                "vendor_name" => $order_product->product->owner->email,
                "vendor_phone" => $order_product->product->owner->phone,
                "money_type" => "Product Order",
                "order_number" => $order->order_number,
                "action_id" => $order->id,
                "total" => $final_price,
                "have" => $final_price - $our_commission,
                "our_commission" => $our_commission
            ]);
        }

        $total_vendor_budget = 0;


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
