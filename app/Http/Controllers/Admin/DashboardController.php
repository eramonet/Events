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
            $products = Product::where('accept','accepted')->count();
            $productsInStock = Product::where('stock', '>', 0)->where('accept','accepted')->count();
            $productsOutStock = Product::where('stock', '<=', 0)->where('accept','accepted')->count();
            $promoCodes = PromoCode::count();
            $messages = ContactMessage::count();
            $newOrdersCount = Order::where('status', 'pending')->count();
            $inprogressOrdersCount = Order::where('status', 'inprogress')->count();
            $deliveredOrdersCount = Order::where('status', 'delivered')->count();
            $cancelledOrdersCount = Order::where('status', 'cancelled')->count();
            $successfullHallsBookings = Hall_booking::where('status', 'success')->count();
            $cancelledHallsBookings = Hall_booking::where('status', 'cancelled')->count();
            $NewHallsBookings = Hall_booking::where('status', 'pending')->count();
            $vendorsCompanyCount = Vendor::where('account', 'company')->count();
            $vendorsIndividualCount = Vendor::where('account', 'individual')->count();

            $today = Carbon::now();
            $firstday = $today->startOfMonth();
            $dateDiff = today()->diffInDays($firstday);



            $ordersChart = DB::table('orders')
            ->select('id', DB::raw('count(*) as count'), DB::raw('date(created_at) as date'))
            ->whereRaw('date(created_at) >= DATE(NOW()) - INTERVAL ? DAY', [$dateDiff])
            ->groupBy(DB::raw('date(created_at)'))
            ->get();


            // $ordersChart=

            // DB::SELECT("select id, count(*) as count, date(created_at) as date from orders WHERE date(created_at) >= DATE(NOW())
            // - INTERVAL $dateDiff DAY GROUP BY date(created_at)");

            // $thisMonth =  count($ordersChart);

            $firstDay = date('Y-m-01');
            $lastDay = date('Y-m-t');

            $ordersChart_count = DB::table('orders')
            ->whereBetween('created_at', [$firstDay, $lastDay])
            ->count();

            $hall_bookings_Chart_count = DB::table('hall_bookings')
            ->whereBetween('created_at', [$firstDay, $lastDay])
            ->count();



            $ordersChart = DB::table('orders')->select('id', DB::raw('count(*) as count'), DB::raw('date(created_at) as date'))
            ->whereBetween('created_at', [$firstDay, $lastDay])
            ->whereRaw('date(created_at) >= DATE(NOW()) - INTERVAL ? DAY', [$dateDiff])
            ->groupBy(DB::raw('date(created_at)'))
            ->get();

            $hakl_bookings_Chart = DB::table('hall_bookings')->select('id', DB::raw('count(*) as count'), DB::raw('date(created_at) as date'))
            ->whereBetween('created_at', [$firstDay, $lastDay])
            ->whereRaw('date(created_at) >= DATE(NOW()) - INTERVAL ? DAY', [$dateDiff])
            ->groupBy(DB::raw('date(created_at)'))
            ->get();




            // return $ordersChart;








                $allordersChart =

                DB::SELECT("select id, count(*) as count, date(created_at) as date from orders GROUP BY date(created_at)");
                // return $allordersChart;

                $all_hall_booking_Chart =

                DB::SELECT("select id, count(*) as count, date(created_at) as date from hall_bookings GROUP BY date(created_at)");


            //   return $ordersChart;

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


            $success_bookings = Hall_booking::where('status', 'success')->count();
            $cancelled_bookings = Hall_booking::where('status', 'cancelled')->count();
            $pending_bookings = Hall_booking::where('status', 'pending')->count();
            $all_bookings_count = Hall_booking::count();




            return \view('admin.Dashboard', compact(

                'usersCount',
                'adminsCount',
                'adsCount',
                'vendors',
                'hallCategories',
                'hakl_bookings_Chart',
                'hall_bookings_Chart_count',
                'halls',
                'all_hall_booking_Chart',
                'taxes',
                'shippings',
                'ordersChart_count',
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
                'NewHallsBookings',
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
                // 'orderSum',
                'allordersChart',
                'cancelled_bookings',
                'success_bookings',
                'pending_bookings',
                'all_bookings_count',
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


            $products = Product::where('admin_id', $useradmin->vendor->id)->where('accept','accepted')->count();
            $productCategories = ProductCategory::where('admin_id', $useradmin->vendor->id)->count();
            $productsInStock = Product::where('admin_id', $useradmin->vendor->id)->where('accept','accepted')->where('stock', '>', 0)->count();
            $productsOutStock = Product::where('admin_id', $useradmin->vendor->id)->where('accept','accepted')->where('stock', '<=', 0)->count();


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
            $firstDay = date('Y-m-01');
            $lastDay = date('Y-m-t');

            $product_orders = DB::table('order_products')->select('id')
                ->where('vendor_id', $useradmin->vendor->id)

            // ->whereBetween('created_at', [$firstDay, $lastDay])
            // ->whereRaw('date(created_at) >= DATE(NOW()) - INTERVAL ? DAY', [$dateDiff])
            // ->groupBy(DB::raw('date(created_at)'))
            ->get();

          $ides=[];
          foreach($product_orders as $order){
            $ides[]=$order->id;
            }

            $all_orders_tabel = DB::table('orders')
            ->whereIn('id', $ides)
            ->limit(10)->latest()->get();
            // orders



            // $all_orders_tabel = [];

            // foreach ($product_orders as $order) {
            //  $all_orders_tabel[] = Order::where('id', $order->id)->get();
            // }
            // return $all_orders_tabel;


            // return $all_orders_tabel;

            $ordersChart = DB::table('orders')
            ->select('id', DB::raw('count(*) as count'), DB::raw('date(created_at) as date'))
            ->whereIn('id', $ides)
            ->whereRaw('date(created_at) >= DATE(NOW()) - INTERVAL ? DAY', [$dateDiff])
            ->groupBy(DB::raw('date(created_at)'))
            ->get();









            // return $order_ids;
            // whereIn("id" , [])

                $allordersChart =$results = DB::table('orders')
                ->select('id', DB::raw('count(*) as count'), DB::raw('date(created_at) as date'))
                ->whereIn('id',$ides)
                ->groupBy(DB::raw('date(created_at)'))
                ->get();

                $all_order_vendor_count= count($allordersChart);
                // return $all_order_vendor_count;

                // DB::SELECT("select id, count(*) as count, date(created_at) as date from orders GROUP BY date(created_at)")->whereIn('id',$ides);

                // return $allordersChart;



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





            $orderSum =0;


                $hakl_bookings_Chart = DB::table('hall_bookings')->select('id', DB::raw('count(*) as count'), DB::raw('date(created_at) as date'))
                ->whereBetween('created_at', [$firstDay, $lastDay])
                ->where('vendor_id', $vendor->id)
                ->whereRaw('date(created_at) >= DATE(NOW()) - INTERVAL ? DAY', [$dateDiff])
                ->groupBy(DB::raw('date(created_at)'))
                ->get();

                $hall_bookings_Chart_count = DB::table('hall_bookings')
                ->whereBetween('created_at', [$firstDay, $lastDay])
                ->where('vendor_id', $vendor->id)
                ->count();




                $all_hall_booking_Chart =

                DB::table('hall_bookings')
                ->select('id', DB::raw('count(*) as count'), DB::raw('date(created_at) as date'))
                ->where('vendor_id', $vendor->id)
                ->groupBy(DB::raw('date(created_at)'))
                ->get();

                $all_hall_bookingcount= Hall_booking::where('vendor_id', $vendor->id)->count();
                $ordersChart_count= count($ordersChart);

                $thisVendororders=[];



                $success_bookings = Hall_booking::where('vendor_id', $vendor->id)->where('status', 'success')->count();
                $cancelled_bookings = Hall_booking::where('vendor_id', $vendor->id)->where('status', 'cancelled')->count();
                $pending_bookings = Hall_booking::where('vendor_id', $vendor->id)->where('status', 'pending')->count();
                $all_bookings_count = Hall_booking::where('vendor_id', $vendor->id)->count();

            return \view('admin.Dashboard', compact(
                'adsCount',
                'all_orders_tabel',
                'all_hall_booking_Chart',
                'all_hall_bookingcount',
                'hakl_bookings_Chart',
                'hall_bookings_Chart_count',
                'vendors',
                'hallCategories',
                'halls',
                'taxes',
                'shippings',
                'products',
                'ordersChart_count',
                'all_order_vendor_count',
                // 'all_orders',
                'allordersChart',
                'cancelled_bookings',
                'success_bookings',
                'pending_bookings',
                'all_bookings_count',
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
