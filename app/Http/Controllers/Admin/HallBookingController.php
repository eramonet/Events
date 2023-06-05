<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Hall_booking;
use App\Models\HallBookingTaxe;
use App\Models\PromoCode;
use App\Models\Tax;
use App\Models\Vendor;
use App\Models\WithDraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HallBookingController extends Controller
{

    public function all_bookings_budget($bookings)
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

        $total_index_price = 0 ;

        $useradmin = Admin::where('id', Auth::guard('admin')->id())->first();
        $login_id = "";

        if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')) {
            $login_id = $useradmin->id;
        } else {
            $vendor = Vendor::where("id", $useradmin->vendor_id)->first();
            $login_id = $vendor->id;
        }


        foreach ($bookings as $booking) {

            if ($booking->vendor_id == $login_id) {
                $booking["current_login_action"] = $booking->status;
            } else {
                $booking["current_login_action"] = "no_action";
            }


            $package_price = $booking->packge->real_price;
            $extra_guest_price = $booking->extra_guest * $booking->packge->extra_guest_price;

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
                $total_commission_value = (($package_price + $extra_guest_price + $extras_price) -  (($package_price + $extra_guest_price + $extras_price) * ($commission / 100)));
            }


            // check promo code
            if ($booking->promo_code_title) {
                $promo_code_name = $booking->promo_code_title;
                $promo_code_type = $booking->promo_code_type;
                $promo_code_value = $booking->promo_code_value;
                if ($booking->promo_code_type = "amount") {
                    $final_price = $final_price - $booking->promo_code_value;
                } else if ($booking->promo_code_type = "percent") {
                    $final_price = $final_price - ($booking->promo_code_value / 100);
                }
            }

            $booking["total_booking_price"] = $final_price ;

            $total_index_price += $final_price ;
        }

        return [ $bookings , $total_index_price ];
    }

    public function index()
    {
        $bookings = Hall_booking::paginate(10);

        // set total price of bookings
        $total_price = 0;
        foreach ($bookings as $booking) {
            $total_price += $booking->total;
        }

        return  view('admin.booking.index', [
            'bookings' => $bookings,
        ], compact('total_price'));
    }

    public function cancelledBookings(Request $request)
    {
        $type = 'cancelled';
        $order_by = 'cancelled_at';
        $useradmin = Admin::where('id', Auth::guard('admin')->id())->first();
        if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')) {
            $bookings = Hall_booking::canceled();

            $total_price = $this->all_bookings_budget($bookings)[1] ;

            return \view('admin.booking.index', \compact('bookings', 'total_price'));
        } else {
            $bookings = Hall_booking::where('vendor_id', $useradmin->vendor_id)->canceled();

            $total_price = $this->all_bookings_budget($bookings)[1] ;

            return \view('admin.booking.index', compact('bookings', 'total_price'));
        }
    }


    public function successfullBookings(Request $request)
    {
        $type = 'successfull';
        $order_by = 'successfull';
        $useradmin = Admin::where('id', Auth::guard('admin')->id())->first();
        if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')) {
            $bookings = Hall_booking::successfull();

            $total_price = $this->all_bookings_budget($bookings)[1] ;
            return \view('admin.booking.index', \compact('bookings', 'total_price'));
        } else {
            $bookings = Hall_booking::where('vendor_id', $useradmin->vendor_id)->successfull();

            $total_price = $this->all_bookings_budget($bookings)[1] ;

            return \view('admin.booking.index', compact('bookings', 'total_price'));
        }
    }

    public function pendingBookings(Request $request)
    {
        // getting current vendor or admin login
        $type = 'pending';
        $order_by = 'pending';
        $useradmin = Admin::where('id', Auth::guard('admin')->id())->first();
        if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')) {
            $bookings = Hall_booking::pending();

            $total_price = $this->all_bookings_budget($bookings)[1] ;

            return \view('admin.booking.index', \compact('bookings' , 'total_price'));
        } else {
            $bookings = Hall_booking::where('vendor_id', $useradmin->vendor_id)->pending();
            $total_price = $this->all_bookings_budget($bookings)[1] ;

            return \view('admin.booking.index', compact('bookings', 'total_price'));
        }
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

        $useradmin = Admin::where('id', Auth::guard('admin')->id())->first();
        $login_id = "";

        if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')) {
            $login_id = $useradmin->id;
        } else {
            $vendor = Vendor::where("id", $useradmin->vendor_id)->first();
            $login_id = $vendor->id;
        }

        if ($booking->vendor_id == $login_id) {
            $booking["current_login_action"] = $booking->status;
        } else {
            $booking["current_login_action"] = "no_action";
        }

        $package_price = $booking->packge->real_price;
        $extra_guest_price = $booking->extra_guest * $booking->packge->extra_guest_price;

        $price_without_commission = 0 ;

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
            $total_commission_value = ( (($package_price + $extra_guest_price + $extras_price) * ($commission / 100)));
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
                $price_without_commission = $price_without_commission - $booking->promo_code_value ;
            } else if ($booking->promo_code_type = "percent") {
                $final_price = $final_price - ($booking->promo_code_value / 100);
                $price_without_commission = $price_without_commission - ($booking->promo_code_value / 100) ;
            }
        }



        return [$package_price, $extra_guest_price, $extras_price, $total_commission_value, $total_taxes_value, $promo_code_type, $promo_code_value, $final_price, $promo_code_name , $price_without_commission];
    }

    public function show(Request $request, $id)
    {
        $booking = Hall_booking::find($id);

        // return $booking->packge->options[0]->category ;
        if (!$booking) {
            $request->session()->flash('failed', 'Hall Booking Not Found');
            return redirect()->back();
        }


        $booking["package_price"] = $this->booking_budget($booking)[0];
        $booking["extra_guest_price"] = $this->booking_budget($booking)[1];
        $booking["extras_price"] = $this->booking_budget($booking)[2];
        $booking["commission"] = $this->booking_budget($booking)[3];
        $booking["taxes"] = $this->booking_budget($booking)[4];
        $booking["promo_code_type"] = $this->booking_budget($booking)[5];
        $booking["promo_code_value"] = $this->booking_budget($booking)[6];
        $booking["final_price"] = $this->booking_budget($booking)[7];
        $booking["promo_code_name"] = $this->booking_budget($booking)[8];


        // return $booking->options[0]->option->category ;
        return \view('admin.booking.show', \compact('booking'));
    }

    public function successAction(Request $request, $id)
    {
        $booking =  Hall_booking::where("id", $id)->first();

        if (!$booking) {
            $request->session()->flash('failed', 'Hall Booking Not Found');
            return redirect()->back();
        }

        $updated = $booking->update([
            "status" => "success"
        ]);


        WithDraw::create([
            "vendor_name" => $booking->hall->admin ? "Events" : $booking->hall->vendor->title_en,
            "vendor_phone" => $booking->hall->admin ? null : $booking->hall->vendor->phone,
            "money_type" => "Hall Booking",
            "action_id" => $booking->id,
            "total" => $this->booking_budget($booking)[9],
            "have" => $this->booking_budget($booking)[7],
            "our_commission" => $this->booking_budget($booking)[3]
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
