<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Become_vendor;
use Illuminate\Http\Request;

class BecomeVendorController extends Controller
{
    public function index($status){



            $become_vendor = Become_vendor::where('status',$status)->paginate(10);





        return view('admin.become_vendor.index',[
            'becomes' => $become_vendor,
            'status' => $status
        ]);

    }

    public function update_accept($id){


        $become= Become_vendor::where('id',$id)->first();
        $become->update([
            'status' => 'accepted',
        ]);
        session()->flash('success', 'vendor accepted SuccessFully');

        return redirect('acp/become/pending');

    }

    public function update_Reject($id){

        $become= Become_vendor::where('id',$id)->first();
        $become->update([
            'status' => 'canceled',
        ]);
        session()->flash('success', 'vendor Reject SuccessFully');
        return redirect('acp/become/pending');
    }


    public function show(Request $request, $id)
    {

        $become = Become_vendor::where('id', $id)->first();
        
        if (!$become) {
            $request->session()->flash('failed', 'Become Vendor Request Not Found');
            return redirect()->back();
        }


        return \view('admin.become_vendor.show', \compact('become'));
    }
}
