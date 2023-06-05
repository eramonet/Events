<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Hall_booking;
use App\Models\WithDraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HallBookingController extends Controller
{

    public function index(){
       $bookings= Hall_booking::paginate(10);

          return  view('admin.booking.index',[
            'bookings' => $bookings,
          ]);

    }

    public function cancelledBookings(Request $request)
    {
        $type = 'cancelled';
        $order_by = 'cancelled_at';
        $useradmin = Admin::where('id', Auth::guard('admin')->id())->first();
        if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')) {
            $bookings = Hall_booking::canceled();

            // return $orders;
            return \view('admin.booking.index', \compact('bookings'));
        } else {
            $bookings = Hall_booking::where('vendor_id', $useradmin->vendor->id)->canceled();

            return \view('admin.booking.index', compact('bookings'));
        }
    }


    public function successfullBookings(Request $request)
    {
        $type = 'successfull';
        $order_by = 'successfull';
        $useradmin = Admin::where('id', Auth::guard('admin')->id())->first();
        if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')) {
            $bookings = Hall_booking::successfull();
            // return $orders;
            return \view('admin.booking.index', \compact('bookings'));
        } else {
            $bookings = Hall_booking::where('vendor_id', $useradmin->vendor->id)->successfull();
            return \view('admin.booking.index', compact('bookings'));
        }
    }

    public function pendingBookings(Request $request)
    {
        $type = 'pending';
        $order_by = 'pending';

        $useradmin = Admin::where('id', Auth::guard('admin')->id())->first();
        

        if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')) {

            $bookings = Hall_booking::pending();

            return \view('admin.booking.index', \compact('bookings'));
        } else {

            $bookings = Hall_booking::where('vendor_id', $useradmin->vendor->id)->where('status', 'pending')->get();
         
            return \view('admin.booking.index', compact('bookings'));
        }
    }

    public function show(Request $request, $id)
    {
        $booking = Hall_booking::find($id);

        // return $booking->packge->options[0]->category ;
        if (!$booking) {
            $request->session()->flash('failed', 'Hall Booking Not Found');
            return redirect()->back();
        }
        return \view('admin.booking.show', \compact('booking'));
    }

    public function successAction(Request $request, $id)
    {
        $booking =  Hall_booking::where("id", $id)->first();

        if (!$booking) {
            $request->session()->flash('failed', 'Hall Booking Not Found');
            return redirect()->back();
        }
        $total_extras = 0 ;
        foreach ( $booking->packge->options as $option){
            $total_extras += $option->quantity * $option->price ;
        }

        $total_booking = ($booking->extra_guest * $booking->packge->extra_guest_price) + $booking->packge->real_price + $total_extras ;

        // set it in withdraw

        $getting_current_balance_of_this_vendor = WithDraw::where("vendor_name" , $booking->hall->vendor->email)->first();

        WithDraw::create([
            "vendor_name" => $booking->hall->vendor->email,
            "vendor_phone" => $booking->hall->vendor->phone,
            "money_type" => "Hall Booking",
            "action_id" => $booking->id ,
            "total" => $total_booking ,
            "have" => ( $total_booking * ($booking->hall->vendor->commission / 100) ),
            "our_commission" => ( $total_booking * ($booking->hall->vendor->commission / 100) )
        ]);


        $updated = $booking->update([
            "status" => "success"
        ]);

        if ($updated) {
            $request->session()->flash('success', 'Hall Booking Success ');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }


        return redirect()->back();
    }

    public function cancelledAction(Request $request, $id)
    {
        $booking =  Hall_booking::where("id", $id)->first();
        if (!$booking) {
            $request->session()->flash('failed', 'Hall Booking Not Found');
            return redirect()->back();
        }


        $updated = $booking->update([
            "status" => "cancelled"
        ]);

        if ($updated) {
            $request->session()->flash('success', 'Hall Booking Cancelled SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }


        return redirect()->back();
    }

}
