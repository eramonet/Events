<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\ClientsAd;
use App\Models\OuterClients;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvertisementController extends Controller
{

    function store_image(Request $request, $file_name, $path)
    {
        $file = $request->file($file_name);

        $FileName = date('YmdHi') . $file->getClientOriginalName();

        $file->move(public_path($path), $FileName);
        return $FileName;
    }

    public function outer_clients()
    {
        $clients = OuterClients::latest()->get();
        return view("admin.advertisements.outer_clients", compact('clients'));
    }

    public function add_outer_clients(Request $request)
    {
        $request->validate([
            'image' => ['sometimes'],
            'name' => ['required', 'string'],
            'phone' => ['required', 'numeric'],
            'address' => ['required', 'string'],
        ]);


        $created = OuterClients::create([
            "image" => $request->image ? $this->store_image($request, "image", "user_assets/uploads/ads") :  "empty.png",
            "name" => $request->name,
            "phone" => $request->phone,
            "address" => $request->address,
        ]);

        if ($created) {
            $request->session()->flash('success', 'Outer Client Created SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();
    }

    public function edit_outer_clients(Request $request, $id)
    {
        $request->validate([
            'image' => ['sometimes'],
            'name' => ['required', 'string'],
            'phone' => ['required', 'numeric'],
            'address' => ['required', 'string'],
        ]);


        $created = OuterClients::find($id)->update([
            "image" => $request->image ? $this->store_image($request, "image", "user_assets/uploads/ads") :  OuterClients::find($id)->image,
            "name" => $request->name,
            "phone" => $request->phone,
            "address" => $request->address,
        ]);

        if ($created) {
            $request->session()->flash('success', 'Item Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();
    }

    public function delete_outer_clients(Request $request, $id)
    {
        // check if found
        $check = OuterClients::find($id);
        if (!$check) {
            $request->session()->flash('failed', 'Client Not Found');
            return redirect()->back();
        }

        $delete = OuterClients::find($id)->delete();

        if ($delete) {
            $request->session()->flash('success', 'Item Deleted SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();
    }

    public function advertisements()
    {
        $advertisements = Advertisement::latest()->get();
        return view('admin.advertisements.advertisements', compact('advertisements'));
    }

    public function add_advertisements(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'image' => ['required'],
            'title_ar' => ['sometimes'],
            'title_en' => ['sometimes'],
            'description_ar' => ['sometimes'],
            'description_en' => ['sometimes'],
            'link' => ['required', 'string'],
        ]);

        $created = Advertisement::create([
            "name" => $request->name,
            "image" => $request->image ? $this->store_image($request, "image", "user_assets/uploads/ads") :  "empty.png",
            "title_ar" => $request->title_ar ? $request->title_ar : null,
            "title_en" => $request->title_en ? $request->title_en : null,
            "description_ar" => $request->description_ar ? $request->description_ar : null,
            "description_en" => $request->description_en ? $request->description_en : null,
            "link" => $request->link,
        ]);

        if ($created) {
            $request->session()->flash('success', 'Outer Client Created SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();
    }

    public function edit_advertisements(Request $request, $id)
    {
        $request->validate([
            'name' => ['required'],
            'title_ar' => ['sometimes'],
            'title_en' => ['sometimes'],
            'description_ar' => ['sometimes'],
            'description_en' => ['sometimes'],
            'link' => ['required', 'string'],
        ]);


        $created = Advertisement::find($id)->update([
            "name" => $request->name,
            "image" => $request->image ? $this->store_image($request, "image", "user_assets/uploads/ads") :  Advertisement::find($id)->image,
            "title_ar" => $request->title_ar ? $request->title_ar : null,
            "title_en" => $request->title_en ? $request->title_en : null,
            "description_ar" => $request->description_ar ? $request->description_ar : null,
            "description_en" => $request->description_en ? $request->description_en : null,
            "link" => $request->link,
        ]);

        if ($created) {
            $request->session()->flash('success', 'Item Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();
    }

    public function delete_advertisements(Request $request, $id)
    {
        // check if found
        $check = Advertisement::find($id);
        if (!$check) {
            $request->session()->flash('failed', 'Advertisement Not Found');
            return redirect()->back();
        }

        $delete = Advertisement::find($id)->delete();

        if ($delete) {
            $request->session()->flash('success', 'Advertisement Deleted SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();
    }

    public function clients_ads()
    {
        $items = ClientsAd::latest()->get();

        // calc days for exp
        foreach ($items as $item) {
            $toDate = Carbon::parse($item->to);
            $fromDate = Carbon::parse($item->from);
            $days = $toDate->diffInDays($fromDate);
            $item["days"] = $days;
        }

        return view('admin.advertisements.client_ads', compact('items'));
    }

    public function assign_client_ad(Request $request)
    {
        $request->validate([
            'client_id' => ['required'],
            'client_type' => ['required'],
            'ad_id' => ['required'],
            "location" => ['required'],
            "from" => ['required'],
            "to" => ['required'],
            "activation" => ['required'],
        ]);

        // validate to , from
        if ($request->from > $request->to || Carbon::now() > $request->to) {
            $request->session()->flash('failed', 'invalid dates');
            return redirect()->back();
        }

        // check locations which should have single image not sliders [ "sub home 1 , sub home 2" ]

        if ($request->location == "Sub Home 1" || $request->location == "Sub Home 2") {
            $exist = ClientsAd::where("location", $request->location)->count();

            if ($exist > 0) {
                $request->session()->flash('failed', 'this location should contain only single advertisement');
                return redirect()->back();
            }
        }

        // check assign before
        $exist = [];
        if ($request->client_type == "outer") {
            $exist = ClientsAd::where([
                ["client_id", $request->client_id],
                ["client_type", "outer"],
                ["ad_id", $request->ad_id],
                ["location", $request->location]
            ])->first();
        } else {
            $exist = ClientsAd::where([
                ["client_id", $request->client_id],
                ["client_type", "inner"],
                ["ad_id", $request->ad_id],
                ["location", $request->location]
            ])->first();
        }

        if ($exist) {
            $request->session()->flash('failed', 'assigned before');
            return redirect()->back();
        }

        $created = ClientsAd::create([
            "client_id" => $request->client_id,
            "client_type" => $request->client_type,
            "ad_id" => $request->ad_id,
            "location" => $request->location,
            "from" => $request->from,
            "to" => $request->to,
            "activation" => $request->activation,
            "status" => Carbon::now() > $request->to ? "in_active" : "active",
        ]);

        if ($created) {
            $request->session()->flash('success', 'Assigned SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();
    }

    public function edit_client_ad(Request $request, $id)
    {
        $request->validate([
            "from" => ['required'],
            "to" => ['required'],
            "activation" => ['required'],
        ]);

        // validate to , from
        if ($request->from > $request->to || Carbon::now() > $request->to) {
            $request->session()->flash('failed', 'invalid dates');
            return redirect()->back();
        }

        $updated = ClientsAd::find($id)->update([
            "from" => $request->from,
            "to" => $request->to,
            "activation" => $request->activation,
        ]);

        if ($updated) {
            $request->session()->flash('success', 'Client Ad Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }
        return redirect()->back();
    }

    public function delete_client_ad(Request $request, $id)
    {
        // check if found
        $check = ClientsAd::find($id);
        if (!$check) {
            $request->session()->flash('failed', 'Advertisement Not Found');
            return redirect()->back();
        }

        $delete = ClientsAd::find($id)->delete();

        if ($delete) {
            $request->session()->flash('success', 'Client Ad Deleted SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();
    }

    public function vendor_show_advertisements(Request $request)
    {
        $loggned_user = Auth::guard('admin')->user();

        if (!$loggned_user->vendor) {
            $request->session()->flash('failed', 'you not have permission for this');
            return redirect()->back();
        }

        $items = ClientsAd::where([
            ["client_id", $loggned_user->vendor->id],
            ["client_type", "inner"]
        ])->latest()->get();

        // calc days for exp
        foreach ($items as $item) {
            $toDate = Carbon::parse($item->to);
            $fromDate = Carbon::parse($item->from);
            $days = $toDate->diffInDays($fromDate);
            $item["days"] = $days;
        }

        return view('admin.advertisements.show_my_ads', compact('items'));
    }
}