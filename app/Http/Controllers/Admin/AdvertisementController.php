<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\ClientsAd;
use App\Models\OuterClients;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


USE Illuminate\Support\Facades\Hash;

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
        // return $clients[0]->image ;
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
        $data = $request->all();

        $imageName = time() . Hash::make($request->name) .'.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('user_assets/uploads/ads/'), $imageName);
        $data['image'] = $imageName;

        $created = OuterClients::create($data);

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
        $data = $request->all();

                $imageName = time() . Hash::make($request->name) .'.' . $request->image->getClientOriginalExtension();

                 $request->image->move(public_path('user_assets/uploads/ads/'), $imageName);
              $data['image'] = $imageName;



        $created = OuterClients::find($id)->update($data);

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

        if( $check->client_ads->count() > 0 ){
            foreach( $check->client_ads as $ad ){
                $ad->delete() ;
            }
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

    public function add_advertisements_page()
    {
        return view('admin.advertisements.create_advertisments');
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
        $data = $request->all();

                $imageName = time() . Hash::make($request->name) .'.' . $request->image->getClientOriginalExtension();

        $request->image->move(public_path('user_assets/uploads/ads/'), $imageName);
        $data['image'] = $imageName;


        

        $created = Advertisement::create($data);

        if ($created) {
            $request->session()->flash('success', 'Outer Client Created SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->route('admin.advertisements.advertisements');
    }

    public function edit_advertisements_page( $id )
    {
        $advertisement = Advertisement::find($id) ;
        return view('admin.advertisements.edit_advertisments' , compact('advertisement'));
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

        $data = $request->all();
                $imageName = time() . Hash::make($request->name) .'.' . $request->image->getClientOriginalExtension();

        $request->image->move(public_path('user_assets/uploads/ads/'), $imageName);
        $data['image'] = $imageName;
        $created = Advertisement::find($id)->update($data);

        if ($created) {
            $request->session()->flash('success', 'Item Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->route('admin.advertisements.advertisements');
    }

    public function delete_advertisements(Request $request, $id)
    {
        // check if found
        $check = Advertisement::find($id);
        if (!$check) {
            $request->session()->flash('failed', 'Advertisement Not Found');
            return redirect()->back();
        }

        // delete all childrens
        if( $check->clients_ads->count() > 0 ){
            foreach( $check->clients_ads as $client_ad ){
                $client_ad->delete();
            }
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

        $today = Carbon::now();

        // check activation by date
        foreach( $items as $item){
            if( $item->from > $today || $item->to < $today ){
               $item->update([ "status" => "in_active" ]) ;
            }
        }

        // calc days for exp
        foreach ($items as $item) {
            $toDate = Carbon::parse($item->to);
            $fromDate = Carbon::parse($item->from);
            $days = $toDate->diffInDays($fromDate);
            $item["days"] = $days;
        }

        return view('admin.advertisements.client_ads', compact('items'));
    }

    public function assign_outer_client_ad_page()
    {
        return view('admin.advertisements.assign_outer_client_ads');
    }

    public function assign_inner_client_ad_page()
    {
        return view('admin.advertisements.assign_inner_client_ads');
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
