<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Hall_booking;
use App\Models\HallBookingTaxe;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Tax;
use App\Models\Vendor;
use App\Models\WithDraw;
use App\Models\WithDrawRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithDrawController extends Controller
{
    public function send_to_vendor()
    {
        $all_vendors = Vendor::with(["orders_products" => function ($order_product) {
            $order_product->with("order");
        }])->latest()->get();

        $vendor_orders = [];

        foreach ($all_vendors as $vendor) {
            if ($vendor->orders_products->count() > 0) {
                foreach ($vendor->orders_products as $order_product) {
                    if (!in_array($order_product->order, $vendor_orders)) {
                        $vendor_orders[] = $order_product->order;
                    }
                }
                $vendor["my_orders"] = $vendor_orders;
            } else {
                $vendor["my_orders"] = [];
            }
        }


        return view('admin.send_with_draw_request.send_to_vendor', compact('all_vendors'));
    }

    public function get_vendor_balance($vendor_email, $key)
    {
        $total_sent_money = 0;
        if ($vendor_email == "empty" || $key == "empty") {
            return "empty";
        }

        $vendor = [];
        $total_have = 0;



        if ($key == "order") {
            $vendor = Vendor::with(["orders_products" => function ($order_product) {
                $order_product->with(["order" => function ($order) {
                    $order->delivered();
                }]);
            }])->where("title_en", $vendor_email)->with("with_draws")->first();

            $vendor_orders = [];




            if ($vendor->orders_products->count() > 0) {
                foreach ($vendor->orders_products as $order_product) {
                    $order = Order::where("order_number" , $order_product->order_number)->first() ;
                    if ($order) {
                        if (!in_array($order, $vendor_orders)) {
                            $vendor_orders[] = $order;
                        }
                    }
                }
                $vendor["my_orders"] = $vendor_orders;
            }

        } else if ($key == "hall") {
            $vendor = Vendor::with(["halls" => function ($hall) {
                $hall->with("booking");
            }])->where("title_en", $vendor_email)->with("with_draws")->first();

            $all_bookings = [];

            if (count($vendor->halls) > 0) {
                foreach ($vendor->halls as $hall) {
                    if (count($hall->booking) > 0) {
                        foreach ($hall->booking as $book) {
                            if (!in_array($book, $all_bookings)) {
                                $all_bookings[] = $book;
                            }
                        }
                    }
                }
                $vendor["my_orders"] = $all_bookings;
            }
        } else {
            $vendor = Vendor::with(["orders_products" => function ($order_product) {
                $order_product->with(["order" => function ($order) {
                    $order->delivered();
                }]);
            }])->where("title_en", $vendor_email)->with("with_draws")->first();
        }


        $with_draw_requests = WithDrawRequest::where("vendor_id", $vendor->id)->fromAdmin()->accepted()->get();


        foreach ($with_draw_requests as $requests) {
            $total_sent_money += $requests->budget;
        }

        // calculate have
        if (count($vendor->with_draws) > 0) {
            foreach ($vendor->with_draws as $with_draw) {
                $total_have += $with_draw->have;
            }
        }
        return [$total_have - $total_sent_money, $vendor];
    }

    public function booking_budget($booking)
    {
        $package_price = 0;
        $extra_guest_price = 0;
        $extras_price = 0;
        $commission = 0;
        $taxes = 0;
        $promo_code_name = "";
        $promo_code_type = "";
        $promo_code_value = 0;

        $total_taxes_value = 0;
        $total_commission_value = 0;

        $final_price = 0;

        $package_price = $booking->packge->real_price;
        $extra_guest_price = $booking->extra_guest * $booking->packge->extra_guest_price;

        $price_without_commission = 0;

        if ($booking->options->count() > 0) {
            foreach ($booking->options as $item) {
                $extras_price += $item->quantity * $item->option->price;
            }
        }

        // getting booking vendor
        if ($booking->vendor) {
            $commission = $booking->vendor->commission;
        } else if ($booking->admin) {
            $commission = 0;
        }

        // return $booking->taxes ;



        $getTaxes = HallBookingTaxe::where('booking_id', $booking->id)->pluck('tax_name');
        $Taxes = Tax::whereIn('title_en', $getTaxes)->get();

        // taxes
        if (count($Taxes) > 0) {
            foreach ($Taxes as $tax) {
                $taxes += $tax->percentage;
            }
        }


        // return $booking->taxes ;

        $total_taxes_value = ($package_price * ($taxes / 100));

        $final_price =
            (($package_price + $extra_guest_price + $extras_price) -  (($package_price + $extra_guest_price + $extras_price) * ($commission / 100)))
            +
            ($package_price * ($taxes / 100));

        if ($commission != 0) {
            $total_commission_value = ((($package_price + $extra_guest_price + $extras_price) * ($commission / 100)));
        }

        $price_without_commission =
            (($package_price + $extra_guest_price + $extras_price))
            +
            ($package_price * ($taxes / 100));


        // check promo code
        if ($booking->promo_code_title) {
            $promo_code_name = $booking->promo_code_title;
            $promo_code_type = $booking->promo_code_type;
            $promo_code_value = $booking->promo_code_value;
            if ($booking->promo_code_type = "amount") {
                $final_price = $final_price - $booking->promo_code_value;
                $price_without_commission = $price_without_commission - $booking->promo_code_value;
            } else if ($booking->promo_code_type = "percent") {
                $final_price = $final_price - ($booking->promo_code_value / 100);
                $price_without_commission = $price_without_commission - ($booking->promo_code_value / 100);
            }
        }



        return [$final_price];
    }

    public function get_vendor_order_balance($vendor_email, $key, $order_number)
    {
        if ($order_number == "empty") {
            return "empty";
        } else {
            if ($key == "order") {

                $total_product_price = 0;

                $total_sent = 0;

                // getting this vendor
                $vendor = Vendor::where("title_en", $vendor_email)->first();


                // getting with draw requests
                $withdraw_requests = WithDraw::where([
                    ["money_type", "Product Order"],
                    ["vendor_name", $vendor->title_en],
                    ["action_id", $order_number]
                ])->with(["with_draw_requests" => function ($with_draw_requests) {
                    $with_draw_requests->fromAdmin()->accepted();
                }])->first();

                if (count($withdraw_requests->with_draw_requests) > 0) {
                    foreach ($withdraw_requests->with_draw_requests as $with_draw_request) {
                        $total_sent += $with_draw_request->budget;
                    }
                }


                return [$withdraw_requests->have - $total_sent];
            } else if ($key == "hall") {

                $total_sent = 0;



                // getting this vendor
                $vendor = Vendor::where("title_en", $vendor_email)->first();

                // getting with draw requests
                $withdraw_requests = WithDraw::where([
                    ["money_type", "Hall Booking"],
                    ["vendor_name", $vendor->title_en],
                    ["action_id", $order_number]
                ])->with(["with_draw_requests" => function ($with_draw_requests) {
                    $with_draw_requests->fromAdmin()->accepted();
                }])->first();

                if (count($withdraw_requests->with_draw_requests) > 0) {
                    foreach ($withdraw_requests->with_draw_requests as $with_draw_request) {
                        $total_sent += $with_draw_request->budget;
                    }
                }


                // getting this order
                $this_booking = Hall_booking::find($order_number);

                $final_price = $this->booking_budget($this_booking);



                return [($final_price[0] - $total_sent)];
            }
        }
    }

    public function send_money(Request $request)
    {
        if (
            !$request->client_email_inpt ||
            !$request->client_order_balance_inpt ||
            !$request->key_for_filter ||
            !$request->vendor_email ||
            !$request->hall_order
        ) {
            $request->session()->flash('failed', 'Please Complete Your Data');
            return redirect()->back();
        }

        $vendor = Vendor::where("title_en", $request->client_email_inpt)->first();

        if (!$vendor) {
            $request->session()->flash('failed', 'This Vendor not found');
            return redirect()->back();
        }

        // check the availability of money
        if ($request->client_order_balance_inpt < $request->value) {
            $request->session()->flash('failed', 'Value is Invalid With This Vendor');

            return redirect()->back();
        }

        if ($request->key_for_filter == "hall") {

            $with_draw = WithDraw::where([
                ["vendor_name", $vendor->title_en],
                ["money_type", "Hall Booking"],
                ["action_id", $request->client_order]
            ])->first();

            $total_sent = 0;

            if (count($with_draw->with_draw_requests) > 0) {
                foreach ($with_draw->with_draw_requests as $sent_money) {
                    if( $sent_money->type == "from_admin" && $sent_money->status == "accepted" ){
                        $total_sent += $sent_money->budget;
                    }

                }
            }

            $created = WithDrawRequest::create([
                "vendor_id" => $vendor->id,
                "with_draw_id" => $with_draw->id,
                "budget_before" => $with_draw->have - $total_sent,
                "budget" => $request->value,
                "type" => "from_admin",
                "status" => "accepted",
                "notes" => $request->notes ? $request->notes : null
            ]);

            if ($created) {
                $request->session()->flash('success', 'Money is Sent SuccessFully');
            } else {
                $request->session()->flash('failed', 'Something Wrong');
            }

            return redirect()->back();
        } else if ($request->key_for_filter == "order") {

            $with_draw = WithDraw::where([
                ["vendor_name", $vendor->title_en],
                ["money_type", "Product Order"],
                ["action_id", $request->client_order]
            ])->first();

            $total_sent = 0;

            if (count($with_draw->with_draw_requests) > 0) {
                foreach ($with_draw->with_draw_requests as $sent_money) {
                    if( $sent_money->type == "from_admin" && $sent_money->status == "accepted" ){
                        $total_sent += $sent_money->budget;
                    }
                }
            }

            $created = WithDrawRequest::create([
                "vendor_id" => $vendor->id,
                "with_draw_id" => $with_draw->id,
                "budget_before" => $with_draw->have - $total_sent,
                "budget" => $request->value,
                "type" => "from_admin",
                "status" => "accepted",
                "notes" => $request->notes ? $request->notes : null
            ]);

            if ($created) {
                $request->session()->flash('success', 'Money is Sent SuccessFully');
            } else {
                $request->session()->flash('failed', 'Something Wrong');
            }

            return redirect()->back();
        }
        // getting vendor


        // check if budget is valid or not
        $check = WithDraw::where("vendor_name", $request->client_email_inpt)->get();

        $check["admin"] = Vendor::first();

        return $check;


        $with_draw_requests = WithDrawRequest::where("vendor_id", $check->admin->id)->get();



        $total_sent_money = 0;

        if (count($with_draw_requests) > 0) {
            foreach ($with_draw_requests as $requests) {
                $total_sent_money += $requests->budget;
            }
        }

        $vendor_current_balance = $check->have - $total_sent_money;

        return $vendor_current_balance;
    }

    public function all()
    {
        $total = 0;
        $withdraw = WithDrawRequest::latest()->get();

        foreach ($withdraw as $with_draw) {
            $with_draw["admin"] = Vendor::where("id", $with_draw->vendor_id)->first();
        }

        if (count($withdraw) > 0) {
            foreach ($withdraw as $item) {
                $total += $item->budget;
            }
        }

        return view('admin.send_with_draw_request.all', compact('withdraw', 'total'));
    }

    public function filter_all(Request $request)
    {
        $total = 0;

        $withdraw = [];

        if (!$request->from || !$request->to) {
            $request->session()->flash('failed', 'Please Choose From And To Dates');
            return redirect()->back();
        }

        if ($request->status) {
            $withdraw = WithDrawRequest::with("vendor")->latest()->whereBetween('created_at', [$request->from, $request->to])->where("status", $request->status)->get();
        } else {
            $withdraw = WithDrawRequest::with("vendor")->latest()->whereBetween('created_at', [$request->from, $request->to])->get();
        }

        if (count($withdraw) > 0) {
            foreach ($withdraw as $item) {
                $total += $item->budget;
            }
        }


        return view('admin.send_with_draw_request.all', compact('withdraw', 'total'));
    }

    public function from_you()
    {
        $total = 0;
        $withdraws = WithDrawRequest::with("with_draw")->latest()->fromAdmin()->accepted()->get();




        foreach ($withdraws as $withdraw) {
            if ($withdraw->with_draw->money_type == "Hall Booking") { // halls
                $withdraw["source"] = Hall_booking::find($withdraw->with_draw->action_id);
            } else if ($withdraw->with_draw->money_type == "Product Order") { // products
                $withdraw["source"] = Order::find($withdraw->with_draw->action_id);
            }
        }

        if (count($withdraws) > 0) {
            foreach ($withdraws as $item) {
                $total += $item->budget;
            }
        }

        if (count($withdraws) > 0) {
            foreach ($withdraws as $withdrawItem) {
                $withdrawItem["vendor"] = Vendor::where("id", $withdrawItem->vendor_id)->first();
            }
        }


        return view('admin.send_with_draw_request.from_u', compact('withdraws', 'total'));
    }

    public function filter_from_you(Request $request)
    {
        $withdraw = [];

        if (!$request->from || !$request->to) {
            $request->session()->flash('failed', 'Please Choose From And To Dates');
            return redirect()->back();
        }

        $withdraw = WithDrawRequest::with("vendor")->latest()->fromVendor()->whereBetween('created_at', [$request->from, $request->to])->get();


        return view('admin.send_with_draw_request.from_u', compact('withdraw'));
    }

    public function to_you(Request $request)
    {
        $withdraw = WithDrawRequest::with("vendor")->latest()->fromVendor()->get();

        $total = 0;

        if (count($withdraw) > 0) {
            foreach ($withdraw as $item) {
                $total += $item->budget;
            }
        }
        $final = 0;

        if (count($withdraw) > 0) {
            foreach ($withdraw as $withdrawItem) {
                $withdrawItem["vendor"] = Vendor::where("id", $withdrawItem->vendor_id)->first();
                WithDrawRequest::where("vendor_id", $withdrawItem->vendor->id)->get();
            }
        }

        if (count($withdraw) > 0) {
            foreach ($withdraw as $withdrawItem) {
                $withdrawItem["sent_money"] = WithDrawRequest::where("vendor_id", $withdrawItem->vendor->id)->fromAdmin()->Accepted()->sum("budget");
                $withdrawItem["have"] =
                    WithDraw::where("vendor_name", $withdrawItem->vendor->email)->first() ?
                    WithDraw::where("vendor_name", $withdrawItem->vendor->email)->first()->have :
                    0;
            }
        }



        return view('admin.send_with_draw_request.to_u', compact('withdraw'));
    }

    public function filter_to_you(Request $request)
    {
        $withdraw = [];

        if (!$request->from || !$request->to) {
            $request->session()->flash('failed', 'Please Choose From And To Dates');
            return redirect()->back();
        }

        if ($request->status) {
            $withdraw = WithDrawRequest::with("vendor")->latest()->fromVendor()->whereBetween('created_at', [$request->from, $request->to])->where("status", $request->status)->get();
        } else {
            $withdraw = WithDrawRequest::with("vendor")->latest()->fromVendor()->whereBetween('created_at', [$request->from, $request->to])->get();
        }


        return view('admin.send_with_draw_request.to_u', compact('withdraw'));
    }

    public function accept_money(Request $request, $request_id)
    {
        $with_draw_requests = WithDrawRequest::find($request_id);



        $with_draw_requests->update([
            "status" => "accepted"
        ]);



        $created = WithDrawRequest::create([
            "vendor_id" => $with_draw_requests->vendor_id,
            "budget_before" => $with_draw_requests->budget_before,
            "budget" => $with_draw_requests->budget,
            "type" => "from_admin",
            "status" => "accepted",
            "with_draw_id" => $with_draw_requests->with_draw_id,
        ]);

        if ($created) {
            $request->session()->flash('success', 'Money is Sent SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();
    }

    public function reject_money(Request $request, $request_id)
    {
        $with_draw_requests = WithDrawRequest::find($request_id);

        $created = $with_draw_requests->update([
            "status" => "rejected"
        ]);

        if ($created) {
            $request->session()->flash('success', 'Rejected SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();
    }

    public function total_withdraw()
    {
        $vendors = Vendor::with(["with_draws" => function ($with_draw) {
            $with_draw->with([ "with_draw_requests" => function($request){
                $request->fromAdmin()->accepted();
            }]);
        }])->get();

        return view('admin.send_with_draw_request.tota_withdraw', compact('vendors'));
    }

    public function filter_total_withdraw(Request $request)
    {

        $vendors = Vendor::with(["with_draws" => function ($with_draw) use ($request) {
            $with_draw->whereBetween('created_at', [$request->from, $request->to])->with("with_draw_requests");
        }])->get();


        return view('admin.send_with_draw_request.tota_withdraw', compact('vendors'));
    }

    public function total_withdraw_per_month()
    {
        $vendors = Vendor::with(["with_draws" => function ($with_draw) {
            $with_draw->with([ "with_draw_requests" => function($request){
                $request->fromAdmin()->accepted();
            }])->whereMonth('created_at', '=',  Carbon::now()->month);
        }])->get();

        return view('admin.send_with_draw_request.total_with_draw_per_month', compact('vendors'));
    }

    // vendor functionality
    public function send_request()
    {
        $our_balance = 0;
        // getting current vendor
        $vendor = Auth::guard('admin')->user();

        $vendor["admin"] = Vendor::where("id", $vendor->vendor_id)->first();


        $our_total_money = WithDraw::with(["with_draw_requests" => function ($requests) use ($vendor) {
            $requests->fromAdmin()->accepted();
        }])->where("vendor_name", $vendor->admin->title_en)->get(); // have


        $vendor_have_money = 0;
        $total_sent_money = 0;

        if (count($our_total_money) > 0) {
            foreach ($our_total_money as $total_money) {
                $vendor_have_money += $total_money->have;

                if ($total_money->with_draw_requests->count() > 0) {
                    foreach ($total_money->with_draw_requests as $request) {
                        if( $request->type == "from_admin" && $request->status == "accepted" ){
                            $total_sent_money += $request->budget;
                        }
                    }
                }
            }
        }

        $our_balance = $vendor_have_money - $total_sent_money;

        return view('admin.send_with_draw_request.send_request', compact('our_balance'));
    }

    public function send_money_request(Request $request)
    {
        if (
            !$request->selected_key ||
            !$request->selected_order ||
            !$request->order_price ||
            !$request->key ||
            !$request->value
        ) {
            $request->session()->flash('failed', 'Please Complete Your Data');
            return redirect()->back();
        }

        $vendor = Auth::guard('admin')->user();

        $vendor["admin"] = Vendor::where("id", $vendor->vendor_id)->first();

        if (!$vendor) {
            $request->session()->flash('failed', 'This Vendor not found');
            return redirect()->back();
        }

        // check the availability of money
        if ($request->order_price < $request->value) {
            $request->session()->flash('failed', 'Value is Invalid With This Vendor');
            return redirect()->back();
        }


        if ($request->selected_key == "hall") {

            $with_draw = WithDraw::where([
                ["vendor_name", $vendor->admin->title_en],
                ["money_type", "Hall Booking"],
                ["action_id", $request->selected_order]
            ])->first();

            $total_sent = 0;

            if (count($with_draw->with_draw_requests) > 0) {
                foreach ($with_draw->with_draw_requests as $sent_money) {
                    if( $sent_money->type == "from_admin" && $sent_money->status == "accepted" ){
                        $total_sent += $sent_money->budget;
                    }

                }
            }

            $created = WithDrawRequest::create([
                "vendor_id" => $vendor->admin->id,
                "with_draw_id" => $with_draw->id,
                "budget_before" => $with_draw->have - $total_sent,
                "budget" => $request->value,
                "type" => "from_vendor",
                "status" => "pending",
                "notes" => $request->notes ? $request->notes : null
            ]);

            if ($created) {
                $request->session()->flash('success', 'Money is Sent SuccessFully');
            } else {
                $request->session()->flash('failed', 'Something Wrong');
            }

            return redirect()->back();
        } else if ($request->selected_key == "order") {

            $with_draw = WithDraw::where([
                ["vendor_name", $vendor->admin->title_en],
                ["money_type", "Product Order"],
                ["action_id", $request->selected_order]
            ])->first();

            $total_sent = 0;

            if (count($with_draw->with_draw_requests) > 0) {
                foreach ($with_draw->with_draw_requests as $sent_money) {
                    $total_sent += $sent_money->budget;
                }
            }

            $created = WithDrawRequest::create([
                "vendor_id" => $vendor->admin->id,
                "with_draw_id" => $with_draw->id,
                "budget_before" => $with_draw->have - $total_sent,
                "budget" => $request->value,
                "type" => "from_vendor",
                "status" => "pending",
                "notes" => $request->notes ? $request->notes : null
            ]);

            if ($created) {
                $request->session()->flash('success', 'Money is Sent SuccessFully');
            } else {
                $request->session()->flash('failed', 'Something Wrong');
            }

            return redirect()->back();
        }
        // getting vendor
    }

    public function withdraw_requests(Request $request, $status)
    {
        // getting current vendor
        $vendor = Auth::guard('admin')->user();

        $withdraw = [];

        if ($status == "new") {
            $withdraw = WithDrawRequest::where("vendor_id", $vendor->vendor->id)->fromVendor()->new()->get();
        } elseif ($status == "accepted") {
            $withdraw = WithDrawRequest::where("vendor_id", $vendor->vendor->id)->fromAdmin()->accepted()->get();
        } elseif ($status == "rejected") {
            $withdraw = WithDrawRequest::where("vendor_id", $vendor->vendor->id)->fromVendor()->rejected()->get();
        } else {
            $request->session()->flash('failed', 'This option not found');
            return redirect()->back();
        }

        return view('admin.send_with_draw_request.all_requests', compact('withdraw'));
    }

    public function resend_money_requests(Request $request, $request_id)
    {
        $exist = WithDrawRequest::find($request_id);

        if (!$exist) {
            $request->session()->flash('failed', 'This request is not exist');
            return redirect()->back();
        }

        $created = WithDrawRequest::create([
            "vendor_id" => $exist->vendor_id,
            "budget" => $exist->budget,
            "type" => "from_vendor",
            "status" => "pending",
            "notes" => $request->notes ? $request->notes : null
        ]);


        $request->session()->flash('success', 'This request is Sent Again');
        return redirect()->back();
    }

    public function filter_sent_request(Request $request)
    {
        $withdraw = [];

        if (!$request->from || !$request->to) {
            $request->session()->flash('failed', 'Please Choose From And To Dates');
            return redirect()->back();
        }

        $withdraw = WithDrawRequest::with("vendor")->latest()->fromVendor()->whereBetween('created_at', [$request->from, $request->to])->where("status", $request->status == "New" ? "pending" : $request->status)->get();


        return view('admin.send_with_draw_request.all_requests', compact('withdraw'));
    }

    public function get_orders_based_on_key($key)
    {
        $vendor = Auth::guard('admin')->user();
        $vendor["admin"] = Vendor::where("id", $vendor->vendor_id)->first();

        if ($key == "order") {
            $vendor = Vendor::with(["orders_products" => function ($order_product) {
                $order_product->with(["order" => function ($order) {
                    $order->delivered();
                }]);
            }])->where("email", $vendor->admin->email)->with("with_draws")->first();




            $vendor_orders = [];


            if ($vendor->orders_products->count() > 0) {
                foreach ($vendor->orders_products as $order_product) {
                    $order = Order::where("order_number" , $order_product->order_number)->first() ;
                    if ($order) {
                        if (!in_array($order, $vendor_orders)) {
                            $vendor_orders[] = $order;
                        }
                    }
                }
                $vendor["my_orders"] = $vendor_orders;
            }
        } else if ($key == "hall") {
            $vendor = Vendor::with(["halls" => function ($hall) {
                $hall->with("booking");
            }])->where("email", $vendor->admin->email)->with("with_draws")->first();

            $all_bookings = [];

            if (count($vendor->halls) > 0) {
                foreach ($vendor->halls as $hall) {
                    if (count($hall->booking) > 0) {
                        foreach ($hall->booking as $book) {
                            if (!in_array($book, $all_bookings)) {
                                $all_bookings[] = $book;
                            }
                        }
                    }
                }
                $vendor["my_orders"] = $all_bookings;
            }
        }
        return $vendor;
    }

    public function get_order_price($key, $order)
    {



        $vendor = Auth::guard('admin')->user();

        $vendor["admin"] = Vendor::where("id", $vendor->vendor_id)->first();

        if ($key == "order") {

            $total_product_price = 0;

            $total_sent = 0;

            // getting this vendor
            $vendor = Vendor::where("email", $vendor->admin->email)->first();

            // getting with draw requests
            $withdraw_requests = WithDraw::where([
                ["money_type", "Product Order"],
                ["vendor_name", $vendor->title_en],
                ["action_id", $order]
            ])->with(["with_draw_requests" => function ($with_draw_request) {
                $with_draw_request->fromAdmin()->accepted();
            }])->first();

            if ($withdraw_requests) {
                if (count($withdraw_requests->with_draw_requests) > 0) {
                    foreach ($withdraw_requests->with_draw_requests as $with_draw_request) {
                        $total_sent += $with_draw_request->budget;
                    }
                }
            }



            return [$withdraw_requests->have - $total_sent];
        } else if ($key == "hall") {

            $total_sent = 0;

            // getting this vendor
            $vendor = Vendor::where("email", $vendor->admin->email)->first();

            // getting with draw requests
            $withdraw_requests = WithDraw::where([
                ["money_type", "Hall Booking"],
                ["vendor_name", $vendor->title_en],
                ["action_id", $order]
            ])->with(["with_draw_requests" => function ($with_draw_request) {
                $with_draw_request->fromAdmin()->accepted();
            }])->first();

            if (count($withdraw_requests->with_draw_requests) > 0) {
                foreach ($withdraw_requests->with_draw_requests as $with_draw_request) {
                    $total_sent += $with_draw_request->budget;
                }
            }

            // getting this order
            $this_booking = Hall_booking::find($order);

            $final_price = $this->booking_budget($this_booking);

            return [($final_price[0] - $total_sent)];
        }
    }
}
