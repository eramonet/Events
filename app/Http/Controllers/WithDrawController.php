<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Order;
use App\Models\Vendor;
use App\Models\WithDraw;
use App\Models\WithDrawRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithDrawController extends Controller
{
    public function send_to_vendor()
    {
        $all_vendors = Vendor::latest()->get();

        return view('admin.send_with_draw_request.send_to_vendor', compact('all_vendors'));
    }

    public function send_money(Request $request)
    {
        // check if budget is valid or not
        $check = WithDraw::where("vendor_name", $request->vendor_email)->first();

        $check["admin"] = Vendor::first();

        $with_draw_requests = WithDrawRequest::where("vendor_id", $check->admin->id)->get();

        $total_sent_money = 0;

        if (count($with_draw_requests) > 0) {
            foreach ($with_draw_requests as $requests) {
                $total_sent_money += $requests->budget;
            }
        }

        $vendor_current_balance = $check->have - $total_sent_money;

        if ($check) {
            if (((float) $request->value) > $vendor_current_balance) {
                $request->session()->flash('failed', 'Value is Invalid With This Vendor');
                return redirect()->back();
            }
        }
        $created = WithDrawRequest::create([
            "vendor_id" => $request->vendor_id,
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
        $withdraw = WithDrawRequest::latest()->fromAdmin()->accepted()->get();

        if (count($withdraw) > 0) {
            foreach ($withdraw as $item) {
                $total += $item->budget;
            }
        }

        if (count($withdraw) > 0) {
            foreach ($withdraw as $withdrawItem) {
                $withdrawItem["vendor"] = Vendor::where("id", $withdrawItem->vendor_id)->first();
            }
        }


        return view('admin.send_with_draw_request.from_u', compact('withdraw', 'total'));
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
            "budget" => $with_draw_requests->budget,
            "type" => "from_admin",
            "status" => "accepted"
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

    public function get_vendor_balance($vendor_email)
    {
        $total_sent_money = 0;
        if ($vendor_email == "empty") {
            return "empty";
        }

        $vendor = WithDraw::where('vendor_name', $vendor_email)->first();

        $vendor["admin"] = Vendor::where("email", $vendor->vendor_name)->first();

        $with_draw_requests = WithDrawRequest::where("vendor_id", $vendor->admin->id)->fromAdmin()->accepted()->get();


        foreach ($with_draw_requests as $requests) {
            $total_sent_money += $requests->budget;
        }

        return [$vendor->have - $total_sent_money, $vendor];
    }

    public function total_withdraw()
    {
        $withdraw = WithDraw::latest()->get();

        if (count($withdraw) > 0) {
            foreach ($withdraw as $item) {
                $item["vendor"] = Vendor::where("email", $item->vendor_name)->first();

                // getting total sent money
                $item["sent_money"] = WithDrawRequest::where("vendor_id", $item->vendor->id)->fromAdmin()->accepted()->sum('budget');
            }
        }

        // return $withdraw ;

        return view('admin.send_with_draw_request.tota_withdraw', compact('withdraw'));
    }

    public function filter_total_withdraw(Request $request)
    {
        $withdraw = WithDraw::latest()->get();

        if (count($withdraw) > 0) {
            foreach ($withdraw as $item) {
                $item["vendor"] = Vendor::where("email", $item->vendor_name)->first();

                // getting total sent money
                $item["sent_money"] = WithDrawRequest::where("vendor_id", $item->vendor->id)->whereBetween('created_at', [$request->from, $request->to])->fromAdmin()->accepted()->sum('budget');
            }
        }

        return view('admin.send_with_draw_request.tota_withdraw', compact('withdraw'));
    }

    public function total_withdraw_per_month()
    {
        $withdraw = WithDraw::latest()->get();

        if (count($withdraw) > 0) {
            foreach ($withdraw as $item) {
                $item["vendor"] = Vendor::where("email", $item->vendor_name)->first();

                // getting total sent money
                $item["sent_money"] = WithDrawRequest::where("vendor_id", $item->vendor->id)->fromAdmin()->accepted()->sum('budget');
            }
        }

        // return $withdraw ;

        return view('admin.send_with_draw_request.total_with_draw_per_month', compact('withdraw'));
    }

    // vendor functionality
    public function send_request()
    {
        $our_balance = 0;
        // getting current vendor
        $vendor = Auth::guard('admin')->user();

        $vendor["admin"] = Vendor::where("id", $vendor->vendor_id)->first();

        $our_total_money = WithDraw::where("vendor_name", $vendor->admin->email)->first(); // have

        if ($our_total_money) {
            $sent_money_from_events = WithDrawRequest::where("vendor_id", $vendor->admin->id)->fromAdmin()->accepted()->get();


            $total_money_in_our_stock = 0;

            foreach ($sent_money_from_events as $money) {
                $total_money_in_our_stock += $money->budget;
            }

            $our_balance = $our_total_money->have - $total_money_in_our_stock;
        }



        return view('admin.send_with_draw_request.send_request', compact('our_balance'));
    }

    public function send_money_request(Request $request)
    {
        $our_balance = 0;

        $vendor = Auth::guard('admin')->user();

        $vendor["admin"] = Vendor::where("id", $vendor->vendor_id)->first();


        $our_total_money = WithDraw::where("vendor_name", $vendor->admin->email)->first(); // have


        if ($our_total_money) {

            if ($our_total_money->have < $request->value) {
                $request->session()->flash('failed', 'Money Request is Out Of Your Balance');
                return redirect()->back();
            }

            $sent_money_from_events = WithDrawRequest::where("vendor_id", $vendor->id)->fromAdmin()->Accepted()->get();


            $total_money_in_our_stock = 0;

            foreach ($sent_money_from_events as $money) {
                $total_money_in_our_stock += $money->budget;
            }

            $our_balance = $our_total_money->have - $total_money_in_our_stock;
        }

        if ($our_balance < $request->value) {
            $request->session()->flash('failed', 'Money Request is Out Of Your Balance');
            return redirect()->back();
        }

        $created = WithDrawRequest::create([
            "vendor_id" => $vendor->admin->id,
            "budget" => $request->value,
            "type" => "from_vendor",
            "status" => "pending",
            "notes" => $request->notes ? $request->notes : null
        ]);

        if ($created) {
            $request->session()->flash('success', 'Money Request Is Sent SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();
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
}
