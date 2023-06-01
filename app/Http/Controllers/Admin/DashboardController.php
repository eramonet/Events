<?php

namespace App\Http\Controllers\Admin;

use App\Events\TestEvent;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\Admin;
use App\Models\ContactMessage;
use App\Models\Hall;
use App\Models\Hall_booking;
use App\Models\HallCategory;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderProduct;
use App\Models\Advertisement;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\PromoCode;
use App\Models\Shipping;
use App\Models\Tax;
use App\Models\Vendor;
use App\Models\WithDraw;
use App\Models\WithDrawRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index(Request $request)
    {
        $useradmin = Admin::where('id', Auth::guard('admin')->id())->first();
        if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')) {
            $usersCount = User::count();
            $adminsCount
                = Admin::whereHas(
                    'roles',
                    function ($q) {
                        $q->where('name', '!=', 'vendor-admin');
                    }
                )->count();
            $adsCount = Advertisement::count();
            $vendors = Admin::whereHas(
                'roles',
                function ($q) {
                    $q->where('name', 'vendor-admin');
                }
            )->count();
            $hallCategories = HallCategory::count();
            $halls = Hall::count();
            $taxes = Tax::count();
            $shippings = Shipping::sum('cost');
            $products = Product::count();
            $productsInStock = Product::where('stock', '>', 0)->count();
            $productsOutStock = Product::where('stock', '<=', 0)->count();
            $promoCodes = PromoCode::count();
            $messages = ContactMessage::count();
            $newOrdersCount = Order::where('status', 'pending')->count();
            $inprogressOrdersCount = Order::where('status', 'inprogress')->count();
            $deliveredOrdersCount = Order::where('status', 'delivered')->count();
            $cancelledOrdersCount = Order::where('status', 'cancelled')->count();
            $successfullHallsBookings = Hall_booking::where('status', 'success')->count();
            $cancelledHallsBookings = Hall_booking::where('status', 'cancelled')->count();
            $vendorsCompanyCount = Vendor::where('account', 'company')->count();
            $vendorsIndividualCount = Vendor::where('account', 'individual')->count();

            $today = Carbon::now();
            $firstday = $today->startOfMonth();
            $dateDiff = today()->diffInDays($firstday);


           $ordersChart=

                DB::SELECT("select id, count(*) as count, date(created_at) as date from orders WHERE date(created_at) >= DATE(NOW())
                - INTERVAL $dateDiff DAY GROUP BY date(created_at)");

            $allordersChart =

                DB::SELECT("select id, count(*) as count, date(created_at) as date from orders GROUP BY date(created_at)");

                $orderSum=Order::whereDate('created_at', '>=', $today)
                ->whereDate('created_at', '<=', $firstday)
                ->sum('product_total_price');



            // withdraw Per This Month budgets
            // Total Purchase Order / Halls
            $total_order_budget = WithDraw::where("vendor_name" , "!=" , Auth::guard('admin')->user()->email)->whereMonth('created_at', '=', Carbon::now()->month)->sum('total');
            // Our Commission From Vendors
            $total_commission_budget = WithDraw::whereMonth('created_at', '=',  Carbon::now()->month)->sum('our_commission');
            // Total Sent Money
            $total_sent_money = WithDrawRequest::where("status" , "accepted")->fromAdmin()->whereMonth('created_at', '=',  Carbon::now()->month)->sum("budget");
            // Total Vendors Credit
            $total_vendor_credit = WithDraw::where("vendor_name", '!=', auth()->guard('admin')->user()->email)->sum('have');


            // withdraw budgets
            // Total Purchase Order / Halls
            $total_order_budget_all_times = WithDraw::where("vendor_name" , "!=" , Auth::guard('admin')->user()->email)->sum('total');
            // Our Commission From Vendors
            $total_commission_budget_all_times = WithDraw::sum('our_commission');


            return \view('admin.Dashboard', compact(
                'usersCount',
                'adminsCount',
                'adsCount',
                'vendors',
                'hallCategories',
                'halls',
                'taxes',
                'shippings',
                'products',
                'productsInStock',
                'productsOutStock',
                'promoCodes',
                'messages',
                'newOrdersCount',
                'inprogressOrdersCount',
                'deliveredOrdersCount',
                'cancelledOrdersCount',
                'successfullHallsBookings',
                'cancelledHallsBookings',
                'vendorsCompanyCount',
                'vendorsIndividualCount',
                'total_order_budget',
                'total_commission_budget',
                'total_sent_money' ,
                'total_vendor_credit' ,
                'total_order_budget_all_times',
                'total_commission_budget_all_times',
                'ordersChart',
                'orderSum',
                'allordersChart'
            ));

        } else {

            $getVendorProducts = Product::where('admin_id', $useradmin->id)->pluck('id');
            $vendor = Vendor::where('id', $useradmin->vendor_id)->first();
            $vendors = Vendor::where('country_id', $vendor->country_id)->where('city_id', $vendor->city_id)->where('region_id', $vendor->region_id)->where('id', '!=', $vendor->id)->count();
            $adsCount = Ad::where('admin_id', $useradmin->id)->count();
            $hallCategories = HallCategory::where('admin_id', $useradmin->vendor->id)->count();
            $halls = Hall::where('vendor_id', $vendor->id)->count();

            $taxes = Tax::where('admin_id', $useradmin->vendor->id)->count();

            $shippings = Shipping::where('admin_id', $useradmin->vendor->id)->sum('cost');
            $products = Product::where('admin_id', $useradmin->vendor->id)->count();
            $productCategories = ProductCategory::where('admin_id', $useradmin->vendor->id)->count();
            $productsInStock = Product::where('admin_id', $useradmin->vendor->id)->where('stock', '>', 0)->count();
            $productsOutStock = Product::where('admin_id', $useradmin->vendor->id)->where('stock', '<=', 0)->count();
            $promoCodes = PromoCode::where('admin_id', $useradmin->vendor->id)->count();
            $getProductsIds = OrderDetail::whereIn('product_id', $getVendorProducts)->pluck('order_id');


            $counter_new = 0;
            $counter_delivered = 0;
            $counter_inprogress = 0;
            $counter_canceled = 0;
            $counter_pending = 0;

            foreach (Order::pending() as $order) {

                foreach ($order->order_products as $product) {
                    if ($product->vendor_id == $useradmin->vendor->id) {
                        $counter_pending++;
                    }
                }
            }

            foreach (Order::inProgress() as $order) {

                foreach ($order->order_products as $product) {
                    if ($product->vendor_id == $useradmin->vendor->id) {
                        $counter_inprogress++;
                    }
                }
            }

            foreach (Order::delivered() as $order) {

                foreach ($order->order_products as $product) {
                    if ($product->vendor_id == $useradmin->vendor->id) {
                        $counter_delivered++;
                    }
                }
            }

            foreach (Order::canceled() as $order) {

                foreach ($order->order_products as $product) {
                    if ($product->vendor_id == $useradmin->id) {
                        $counter_canceled++;
                    }
                }
            }

            $newOrdersCount = $counter_pending;
            $inprogressOrdersCount = $counter_inprogress;
            $deliveredOrdersCount = $counter_delivered;
            $cancelledOrdersCount = $counter_canceled;
            $successfullHallsBookings = Hall_booking::where('vendor_id', $vendor->id)->where('status', 'success')->count();
            $cancelledHallsBookings = Hall_booking::where('vendor_id', $vendor->id)->where('status', 'cancelled')->count();
            $prodcats = ProductCategory::where('admin_id', $useradmin->id)->count();

            // if vendor should appear this
            $total_this_vendor_budget = WithDraw::where("vendor_name", $useradmin->vendor->email)->sum('have');

            $our_store_budget = WithDrawRequest::where("vendor_id" , $useradmin->vendor->id)->fromAdmin()->sum("budget") ;
            $our_store_budget_this_month = WithDrawRequest::where("vendor_id" , $useradmin->vendor->id)->fromAdmin()->whereMonth('created_at', '=', Carbon::now()->month)->sum("budget") ;


            $today = Carbon::now();
            $firstday = $today->startOfMonth();
            $dateDiff = today()->diffInDays($firstday);

            $ids = implode(',', array_map('intval', explode(',', $getProductsIds)));

            $ordersChart =

                DB::SELECT("select id, order_number , count(*) as count, date(created_at) as date from orders
                WHERE date(created_at) >= DATE(NOW())
                - INTERVAL $dateDiff DAY GROUP BY date(created_at)");

            // $vendor_chart_arr = [] ;

            // if( count($ordersChart) > 0 ){
            //     foreach( $ordersChart as $orderItem ){

            //         $order_product_of_this_vendor = OrderProduct::where([
            //             [ "order_number" , $orderItem->order_number ] ,
            //             [ "vendor_id" , $vendor->id ]
            //         ])->get() ;

            //         foreach( $order_product_of_this_vendor as $order_prods_vendor ){
            //             if( $order_prods_vendor->order_number == $orderItem->order_number ){
            //                 if( ! in_array( $orderItem , $vendor_chart_arr ) ){
            //                     $vendor_chart_arr[] = $orderItem ;
            //                 }
            //             }
            //         }

            //     }
            // }

            // return $vendor_chart_arr ;

            $allordersChart =

                DB::SELECT("select id, count(*) as count, date(created_at) as date from orders GROUP BY date(created_at)");



            $orderSum = Order::whereIn('id', $getProductsIds)->whereDate('created_at', '>=', $today)
                ->whereDate('created_at', '<=', $firstday)
                ->sum('product_total_price');




            return \view('admin.Dashboard', compact(
                'adsCount',
                'vendors',
                'hallCategories',
                'halls',
                'taxes',
                'shippings',
                'products',
                'productsInStock',
                'productsOutStock',
                'promoCodes',
                'newOrdersCount',
                'inprogressOrdersCount',
                'deliveredOrdersCount',
                'cancelledOrdersCount',
                'successfullHallsBookings',
                'cancelledHallsBookings',
                'prodcats',
                'total_this_vendor_budget' ,
                'our_store_budget',
                'our_store_budget_this_month',
                'ordersChart',
                'orderSum',
                'allordersChart' ,
                'productCategories',
            ));
        }
    }
}
