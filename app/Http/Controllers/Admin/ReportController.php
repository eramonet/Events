<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\ContactMessage;
use App\Models\ContactUs;
use App\Models\Country;
use App\Models\Region;
use App\Models\FAQ;
use App\Models\Hall;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\ProductRegion;
use App\Models\ProductDetails;
use App\Models\ProductCategory;
use App\Models\AdminCategory;
use App\Models\PromoCode;
use App\Models\Shipping;
use App\Models\Tax;
use App\Models\City;
use App\Models\User;
use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function indexRegisteredUsers()
    {
        return view('admin.report.registered-users');
    }

    public function dataRegisteredUsers(Request $request)
    {
        $date_from = $request->from;
        $date_to = $request->to;

        $allUsersCount = User::whereBetween('created_at', [$date_from, $date_to])->count();

        $allMaleUsersCount = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('gender', 'male')
            ->count();

        $allFemaleUsersCount = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('gender', 'female')
            ->count();

        $allWebUsersCount = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('sign_from', 'web')
            ->count();

        $allAdnoidUsersCount = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('sign_from', 'android')
            ->count();

        $allIosUsersCount = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('sign_from', 'ios')
            ->count();

        $lastTweentyUsers = User::whereBetween('created_at', [$date_from, $date_to])
            ->take(20)->latest()->get();

        $lastTweentyMaleUsers = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('gender', 'male')
            ->take(20)->latest()->get();

        $lastTweentyFemaleUsers = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('gender', 'female')
            ->take(20)->latest()->get();

        $lastTweentyWebUsers = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('sign_from', 'web')
            ->take(20)->latest()->get();

        $lastTweentyWebUsers = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('sign_from', 'web')
            ->take(20)->latest()->get();

        $lastTweentyAndoridUsers = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('sign_from', 'android')
            ->take(20)->latest()->get();

        $lastTweentyIosUsers = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('sign_from', 'ios')
            ->take(20)->latest()->get();

        return view('admin.report.registered-users-data', compact(
            'allUsersCount',
            'allMaleUsersCount',
            'allFemaleUsersCount',
            'allWebUsersCount',
            'allAdnoidUsersCount',
            'allIosUsersCount',
            'lastTweentyUsers',
            'lastTweentyMaleUsers',
            'lastTweentyFemaleUsers',
            'lastTweentyWebUsers',
            'lastTweentyAndoridUsers',
            'lastTweentyIosUsers'

        ));
    }

    public function indexAreaUsers()
    {
        $cities = City::all();
        return view('admin.report.area-users', compact('cities'));
    }

    public function dataAreaUsers(Request $request)
    {
        $date_from = $request->from;
        $date_to = $request->to;
        $city_id = $request->city_id;

        $allUsersCount = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('city_id', $city_id)
            ->count();

        $allMaleUsersCount = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('city_id', $city_id)
            ->where('gender', 'male')
            ->count();

        $allFemaleUsersCount = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('city_id', $city_id)
            ->where('gender', 'female')
            ->count();

        $allWebUsersCount = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('city_id', $city_id)
            ->where('sign_from', 'web')
            ->count();

        $allAdnoidUsersCount = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('city_id', $city_id)
            ->where('sign_from', 'android')
            ->count();

        $allIosUsersCount = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('city_id', $city_id)
            ->where('sign_from', 'ios')
            ->count();

        $lastTweentyUsers = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('city_id', $city_id)
            ->take(20)->latest()->get();

        $lastTweentyMaleUsers = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('city_id', $city_id)
            ->where('gender', 'male')
            ->take(20)->latest()->get();

        $lastTweentyFemaleUsers = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('city_id', $city_id)
            ->where('gender', 'female')
            ->take(20)->latest()->get();

        $lastTweentyWebUsers = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('city_id', $city_id)
            ->where('sign_from', 'web')
            ->take(20)->latest()->get();

        $lastTweentyWebUsers = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('city_id', $city_id)
            ->where('sign_from', 'web')
            ->take(20)->latest()->get();

        $lastTweentyAndoridUsers = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('city_id', $city_id)
            ->where('sign_from', 'android')
            ->take(20)->latest()->get();

        $lastTweentyIosUsers = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('city_id', $city_id)
            ->where('sign_from', 'ios')
            ->take(20)->latest()->get();

        return view('admin.report.area-users-data', compact(
            'allUsersCount',
            'allMaleUsersCount',
            'allFemaleUsersCount',
            'allWebUsersCount',
            'allAdnoidUsersCount',
            'allIosUsersCount',
            'lastTweentyUsers',
            'lastTweentyMaleUsers',
            'lastTweentyFemaleUsers',
            'lastTweentyWebUsers',
            'lastTweentyAndoridUsers',
            'lastTweentyIosUsers'

        ));
    }

    public function indexGenderUsers()
    {
        return view('admin.report.gender-users');
    }

    public function dataGenderUsers(Request $request)
    {
        $date_from = $request->from;
        $date_to = $request->to;
        $gender = $request->gender;

        $allUsersCount = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('gender', $gender)
            ->count();

        $allMaleUsersCount = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('gender', $gender)
            ->count();

        $allFemaleUsersCount = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('gender', $gender)
            ->count();

        $allWebUsersCount = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('gender', $gender)
            ->where('sign_from', 'web')
            ->count();

        $allAdnoidUsersCount = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('gender', $gender)
            ->where('sign_from', 'android')
            ->count();

        $allIosUsersCount = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('gender', $gender)
            ->where('sign_from', 'ios')
            ->count();

        $lastTweentyUsers = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('gender', $gender)
            ->take(20)->latest()->get();

        $lastTweentyMaleUsers = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('gender', $gender)
            ->take(20)->latest()->get();

        $lastTweentyFemaleUsers = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('gender', $gender)
            ->take(20)->latest()->get();

        $lastTweentyWebUsers = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('gender', $gender)
            ->take(20)->latest()->get();

        $lastTweentyWebUsers = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('gender', $gender)
            ->where('sign_from', 'web')
            ->take(20)->latest()->get();

        $lastTweentyAndoridUsers = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('gender', $gender)
            ->where('sign_from', 'android')
            ->take(20)->latest()->get();

        $lastTweentyIosUsers = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('gender', $gender)
            ->where('sign_from', 'ios')
            ->take(20)->latest()->get();

        return view('admin.report.gender-users-data', compact(
            'allUsersCount',
            'allMaleUsersCount',
            'allFemaleUsersCount',
            'allWebUsersCount',
            'allAdnoidUsersCount',
            'allIosUsersCount',
            'lastTweentyUsers',
            'lastTweentyMaleUsers',
            'lastTweentyFemaleUsers',
            'lastTweentyWebUsers',
            'lastTweentyAndoridUsers',
            'lastTweentyIosUsers',
            'gender'

        ));
    }

    public function indexAreaStatistics()
    {
        $cities = City::all();
        return view('admin.report.area-statistics', compact('cities'));
    }

    public function dataAreaStatistics(Request $request)
    {
        $date_from = $request->from;
        $date_to = $request->to;
        $city_id = $request->city_id;

        $allUsersCount = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('city_id', $city_id)
            ->count();

        $allMaleUsersCount = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('city_id', $city_id)
            ->where('gender', 'male')
            ->count();

        $allFemaleUsersCount = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('city_id', $city_id)
            ->where('gender', 'female')
            ->count();

        $allWebUsersCount = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('city_id', $city_id)
            ->where('sign_from', 'web')
            ->count();

        $allAdnoidUsersCount = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('city_id', $city_id)
            ->where('sign_from', 'android')
            ->count();

        $allIosUsersCount = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('city_id', $city_id)
            ->where('sign_from', 'ios')
            ->count();

        $lastTweentyUsers = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('city_id', $city_id)
            ->take(20)->latest()->get();

        $lastTweentyMaleUsers = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('city_id', $city_id)
            ->where('gender', 'male')
            ->take(20)->latest()->get();

        $lastTweentyFemaleUsers = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('city_id', $city_id)
            ->where('gender', 'female')
            ->take(20)->latest()->get();

        $lastTweentyWebUsers = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('city_id', $city_id)
            ->where('sign_from', 'web')
            ->take(20)->latest()->get();

        $lastTweentyWebUsers = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('city_id', $city_id)
            ->where('sign_from', 'web')
            ->take(20)->latest()->get();

        $lastTweentyAndoridUsers = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('city_id', $city_id)
            ->where('sign_from', 'android')
            ->take(20)->latest()->get();

        $lastTweentyIosUsers = User::whereBetween('created_at', [$date_from, $date_to])
            ->where('city_id', $city_id)
            ->where('sign_from', 'ios')
            ->take(20)->latest()->get();

        $regionsCount = Region::where('city_id', $city_id)->count();

        $regions = Region::where('city_id', $city_id)->get();

        $getregionsIds = Region::where('city_id', $city_id)->pluck('id');
        $getProductsIds = ProductRegion::whereIn('region_id', $getregionsIds)->pluck('product_id');
        $productsCount = Product::whereIn('id', $getProductsIds)->count();
        $products = Product::whereIn('id', $getProductsIds)->take(20)->latest()->get();

        $hallsCount = Hall::where('city_id', $city_id)->count();
        $halls = Hall::where('city_id', $city_id)->take(20)->latest()->get();

        $ordersCount = Order::where('city_id', $city_id)->count();
        $orders = Order::where('city_id', $city_id)->take(20)->latest()->get();

        $vendorsCount = Vendor::where('city_id', $city_id)->count();
        $vendors = Vendor::where('city_id', $city_id)->take(20)->latest()->get();
        return view('admin.report.area-statistics-data', compact(
            'allUsersCount',
            'allMaleUsersCount',
            'allFemaleUsersCount',
            'allWebUsersCount',
            'allAdnoidUsersCount',
            'allIosUsersCount',
            'lastTweentyUsers',
            'lastTweentyMaleUsers',
            'lastTweentyFemaleUsers',
            'lastTweentyWebUsers',
            'lastTweentyAndoridUsers',
            'lastTweentyIosUsers',
            'regionsCount',
            'productsCount',
            'hallsCount',
            'ordersCount',
            'vendorsCount',
            'regions',
            'products',
            'halls',
            'orders',
            'vendors'

        ));
    }

    public function indexOrdersStatistics()
    {
        return view('admin.report.orders-statistics');
    }

    public function dataOrdersStatistics(Request $request)
    {
        $date_from = $request->from;
        $date_to = $request->to;
        $useradmin = Admin::where('id', Auth::guard('admin')->id())->first();
        if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')) {


            $allOrdersCount = Order::whereBetween('created_at', [$date_from, $date_to])
                ->count();

            $allPendingOrdersCount = Order::whereBetween('created_at', [$date_from, $date_to])
                ->where('status', 'pending')
                ->count();

            $allInProgressOrdersCount = Order::whereBetween('created_at', [$date_from, $date_to])
                ->where('status', 'inProgress')
                ->count();

            $allDeliveredOrdersCount = Order::whereBetween('created_at', [$date_from, $date_to])
                ->where('status', 'delivered')
                ->count();

            $allCancelledOrdersCount = Order::whereBetween('created_at', [$date_from, $date_to])
                ->where('status', 'cancelled')
                ->count();

            $getOrders = Order::whereBetween('created_at', [$date_from, $date_to])
                ->pluck('customer_email');


            $getFemaleOrdersCount = User::whereIn('email', $getOrders)
                ->where('gender', 'female')
                ->count();

            $getMaleOrdersCount = User::whereIn('email', $getOrders)
                ->where('gender', 'male')
                ->count();


            $getOrdersCities = Order::whereBetween('created_at', [$date_from, $date_to])
                ->pluck('city_id');

            $getCitiesOrdersCount = City::whereIn('id', $getOrdersCities)
                ->count();

            return view('admin.report.orders-statistics-data', compact(
                'allOrdersCount',
                'allPendingOrdersCount',
                'allInProgressOrdersCount',
                'allDeliveredOrdersCount',
                'allCancelledOrdersCount',
                'getFemaleOrdersCount',
                'getMaleOrdersCount',
                'getCitiesOrdersCount'

            ));
        } else {
            $getProducts = Product::where('admin_id', $useradmin->id)->pluck('id');
            $getOrdersProducts = OrderProduct::whereIn('product_id', $getProducts)
                ->pluck('order_id');
            $allOrdersCount = Order::whereIn('id', $getOrdersProducts)
                ->whereBetween('created_at', [$date_from, $date_to])
                ->count();

            $allPendingOrdersCount = Order::whereIn('id', $getOrdersProducts)
                ->whereBetween('created_at', [$date_from, $date_to])
                ->where('status', 'pending')
                ->count();

            $allInProgressOrdersCount = Order::whereIn('id', $getOrdersProducts)
                ->whereBetween('created_at', [$date_from, $date_to])
                ->where('status', 'inProgress')
                ->count();

            $allDeliveredOrdersCount = Order::whereIn('id', $getOrdersProducts)
                ->whereBetween('created_at', [$date_from, $date_to])
                ->where('status', 'delivered')
                ->count();

            $allCancelledOrdersCount = Order::whereIn('id', $getOrdersProducts)
                ->whereBetween('created_at', [$date_from, $date_to])
                ->where('status', 'cancelled')
                ->count();

            $getOrders = Order::whereIn('id', $getOrdersProducts)
                ->whereBetween('created_at', [$date_from, $date_to])
                ->pluck('customer_email');


            $getFemaleOrdersCount = User::whereIn('email', $getOrders)
                ->where('gender', 'female')
                ->count();

            $getMaleOrdersCount = User::whereIn('email', $getOrders)
                ->where('gender', 'male')
                ->count();


            $getOrdersCities = Order::whereIn('id', $getOrdersProducts)
                ->whereBetween('created_at', [$date_from, $date_to])
                ->pluck('city_id');

            $getCitiesOrdersCount = City::whereIn('id', $getOrdersCities)
                ->count();

            return view('admin.report.orders-statistics-data', compact(
                'allOrdersCount',
                'allPendingOrdersCount',
                'allInProgressOrdersCount',
                'allDeliveredOrdersCount',
                'allCancelledOrdersCount',
                'getFemaleOrdersCount',
                'getMaleOrdersCount',
                'getCitiesOrdersCount'

            ));
        }
    }


    public function indexOrdersReports()
    {
        return view('admin.report.orders-reports');
    }

    public function dataOrdersReports(Request $request)
    {
        $date_from = $request->from;
        $date_to = $request->to;
        $useradmin = Admin::where('id', Auth::guard('admin')->id())->first();
        if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')) {
            $orders = Order::whereBetween('created_at', [$date_from, $date_to])
                ->take(20)->latest()->get();

            $ordersPending = Order::whereBetween('created_at', [$date_from, $date_to])
                ->where('status', 'pending')
                ->take(20)->latest()->get();

            $ordersInprogress = Order::whereBetween('created_at', [$date_from, $date_to])
                ->where('status', 'inProgress')
                ->take(20)->latest()->get();

            $ordersDelivered = Order::whereBetween('created_at', [$date_from, $date_to])
                ->where('status', 'delivered')
                ->take(20)->latest()->get();

            $ordersCancelled = Order::whereBetween('created_at', [$date_from, $date_to])
                ->where('status', 'cancelled')
                ->take(20)->latest()->get();

            return view('admin.report.orders-reports-data', compact(
                'orders',
                'ordersPending',
                'ordersInprogress',
                'ordersDelivered',
                'ordersCancelled'
            ));
        } else {
            $getProducts = Product::where('admin_id', $useradmin->id)->pluck('id');
            $getOrdersProducts = OrderProduct::whereIn('product_id', $getProducts)
                ->pluck('order_id');
            $orders = Order::whereIn('id', $getOrdersProducts)
                ->whereBetween('created_at', [$date_from, $date_to])
                ->take(20)->latest()->get();

            $ordersPending = Order::whereIn('id', $getOrdersProducts)
                ->whereBetween('created_at', [$date_from, $date_to])
                ->where('status', 'pending')
                ->take(20)->latest()->get();

            $ordersInprogress = Order::whereIn('id', $getOrdersProducts)
                ->whereBetween('created_at', [$date_from, $date_to])
                ->where('status', 'inProgress')
                ->take(20)->latest()->get();

            $ordersDelivered = Order::whereIn('id', $getOrdersProducts)
                ->whereBetween('created_at', [$date_from, $date_to])
                ->where('status', 'delivered')
                ->take(20)->latest()->get();

            $ordersCancelled = Order::whereIn('id', $getOrdersProducts)
                ->whereBetween('created_at', [$date_from, $date_to])
                ->where('status', 'cancelled')
                ->take(20)->latest()->get();

            return view('admin.report.orders-reports-data', compact(
                'orders',
                'ordersPending',
                'ordersInprogress',
                'ordersDelivered',
                'ordersCancelled'
            ));
        }
    }

    public function indexOrdersAreas()
    {
        $cities = City::all();
        return view('admin.report.orders-areas', compact('cities'));
    }

    public function dataOrdersAreas(Request $request)
    {
        $date_from = $request->from;
        $date_to = $request->to;
        $city_id = $request->city_id;
        $useradmin = Admin::where('id', Auth::guard('admin')->id())->first();
        if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')) {
            $orders = Order::where('city_id', $city_id)->take(20)->latest()->get();
            return view('admin.report.data-orders-areas', compact('orders'));
        } else {
            $getProducts = Product::where('admin_id', $useradmin->id)->pluck('id');
            $getOrdersProducts = OrderProduct::whereIn('product_id', $getProducts)
                ->pluck('order_id');
            $orders = Order::whereIn('id', $getOrdersProducts)->where('city_id', $city_id)->take(20)->latest()->get();
            return view('admin.report.data-orders-areas', compact('orders'));
        }
    }

    public function indexHallsStatistics()
    {
        $cities = City::all();
        return view('admin.report.halls', compact('cities'));
    }

    public function dataHallsStatistics(Request $request)
    {
        $date_from = $request->from;
        $date_to = $request->to;
        $city_id = $request->city_id;
        $useradmin = Admin::where('id', Auth::guard('admin')->id())->first();
        if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')) {
            $hallsCount = Hall::where('city_id', $city_id)->count();
            $hallsActiveCount = Hall::where('city_id', $city_id)->where('status', '1')->count();
            $hallsUnActiveCount = Hall::where('city_id', $city_id)->where('status', '0')->count();

            return view('admin.report.halls-statistics', compact(
                'hallsCount',
                'hallsActiveCount',
                'hallsUnActiveCount'
            ));
        } else {
            $hallsCount = Hall::where('vendor_id', $useradmin->id)->where('city_id', $city_id)->count();
            $hallsActiveCount = Hall::where('vendor_id', $useradmin->id)->where('city_id', $city_id)->where('status', '1')->count();
            $hallsUnActiveCount = Hall::where('vendor_id', $useradmin->id)->where('city_id', $city_id)->where('status', '0')->count();

            return view('admin.report.halls-statistics', compact(
                'hallsCount',
                'hallsActiveCount',
                'hallsUnActiveCount'
            ));
        }
    }

    public function indexHallsReports()
    {
        $cities = City::all();
        return view('admin.report.halls-reports', compact('cities'));
    }

    public function dataHallsReports(Request $request)
    {
        $date_from = $request->from;
        $date_to = $request->to;
        $city_id = $request->city_id;
        $useradmin = Admin::where('id', Auth::guard('admin')->id())->first();
        if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')) {
            $halls = Hall::whereBetween('created_at', [$date_from, $date_to])
                ->where('city_id', $city_id)
                ->take(20)->latest()->get();

            $hallsActive = Hall::whereBetween('created_at', [$date_from, $date_to])
                ->where('city_id', $city_id)
                ->where('status', '1')
                ->take(20)->latest()->get();

            $hallsUnActive = Hall::whereBetween('created_at', [$date_from, $date_to])
                ->where('city_id', $city_id)
                ->where('status', '0')
                ->take(20)->latest()->get();

            return view('admin.report.halls-reports-data', compact(
                'halls',
                'hallsActive',
                'hallsUnActive'
            ));
        } else {
            $halls = Hall::where('vendor_id', $useradmin->id)->whereBetween('created_at', [$date_from, $date_to])
                ->where('city_id', $city_id)
                ->take(20)->latest()->get();

            $hallsActive = Hall::where('vendor_id', $useradmin->id)->whereBetween('created_at', [$date_from, $date_to])
                ->where('city_id', $city_id)
                ->where('status', '1')
                ->take(20)->latest()->get();

            $hallsUnActive = Hall::where('vendor_id', $useradmin->id)->whereBetween('created_at', [$date_from, $date_to])
                ->where('city_id', $city_id)
                ->where('status', '0')
                ->take(20)->latest()->get();

            return view('admin.report.halls-reports-data', compact(
                'halls',
                'hallsActive',
                'hallsUnActive'
            ));
        }
    }

    public function indexRegisteredVendorsStatistics()
    {
        return view('admin.report.registered-vendors-statistics');
    }

    public function dataRegisteredVendorsStatistics(Request $request)
    {
        $date_from = $request->from;
        $date_to = $request->to;
        $account = $request->account;

        $allregisteredv = Admin::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'vendor-admin');
            }
        )->where('status', '1')
            ->whereBetween('created_at', [$date_from, $date_to])
            ->pluck('id');

        $allRegisteredVendorsCount = Vendor::whereIn('admin_id', $allregisteredv)
            ->where('account', $account)->count();

        $allregisteredmv = Admin::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'vendor-admin');
            }
        )->where('status', '1')
            ->where('gender', 'male')
            ->whereBetween('created_at', [$date_from, $date_to])
            ->pluck('id');

        $allRegisteredVendorsMaleCount = Vendor::whereIn('admin_id', $allregisteredmv)
            ->where('account', $account)->count();

        $allregisteredfv = Admin::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'vendor-admin');
            }
        )->where('status', '1')
            ->where('gender', 'female')
            ->whereBetween('created_at', [$date_from, $date_to])
            ->pluck('id');

        $allRegisteredVendorsFemaleCount = Vendor::whereIn('admin_id', $allregisteredfv)
            ->where('account', $account)->count();

        return view('admin.report.registered-vendors-statistics-data', compact(
            'allRegisteredVendorsCount',
            'allRegisteredVendorsMaleCount',
            'allRegisteredVendorsFemaleCount'
        ));
    }


    public function indexVendorsAreas()
    {
        $cities = City::all();
        return view('admin.report.area-vendors', compact('cities'));
    }

    public function dataVendorsAreas(Request $request)
    {
        $date_from = $request->from;
        $date_to = $request->to;
        $city_id = $request->city_id;
        $getvendors = Admin::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'vendor-admin');
            }
        )->whereBetween('created_at', [$date_from, $date_to])
            ->pluck('id');
        $vendors = Vendor::whereIn('admin_id', $getvendors)->where('city_id', $city_id)->get();
        return view('admin.report.area-vendors-data', compact('vendors'));
    }

    public function indexProductsStatistics()
    {
        $categories = ProductCategory::whereStatus(1)->whereNull('parent_id')->get();
        $subcategories = ProductCategory::whereStatus(1)->whereNotNull('parent_id')->get();
        return view(
            'admin.report.index-products-statistics',
            compact('categories', 'subcategories')
        );
    }

    public function dataProductsStatistics(Request $request)
    {
        $date_from = $request->from;
        $date_to = $request->to;
        $category_id = $request->category_id;
        $subcategory_id = $request->subcategory_id;
        $useradmin = Admin::where('id', Auth::guard('admin')->id())->first();
        if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')) {
            if ($subcategory_id == null) {
                $productsIds = ProductCategory::whereParentId($category_id)->pluck('id');
                $products = Product::whereIn('category_id', $productsIds)
                    ->whereBetween('created_at', [$date_from, $date_to])
                    ->get();
                $allProductsCount
                    = Product::whereIn('category_id', $productsIds)
                    ->whereBetween('created_at', [$date_from, $date_to])
                    ->count();
                $allProductsInStockCount
                    = Product::whereIn('category_id', $productsIds)
                    ->whereBetween('created_at', [$date_from, $date_to])
                    ->where('stock', '>', 0)
                    ->count();
                $allProductsOutStockCount
                    = Product::whereIn('category_id', $productsIds)
                    ->whereBetween('created_at', [$date_from, $date_to])
                    ->where('stock', '<', 1)
                    ->count();
            } else {
                $products = Product::where('category_id', $subcategory_id)
                    ->whereBetween('created_at', [$date_from, $date_to])
                    ->get();
                $allProductsCount
                    = Product::where('category_id', $subcategory_id)
                    ->whereBetween('created_at', [$date_from, $date_to])
                    ->count();
                $allProductsInStockCount
                    = Product::where('category_id', $subcategory_id)
                    ->whereBetween('created_at', [$date_from, $date_to])
                    ->where('stock', '>', 0)
                    ->count();
                $allProductsOutStockCount
                    = Product::where('category_id', $subcategory_id)
                    ->whereBetween('created_at', [$date_from, $date_to])
                    ->where('stock', '<', 1)
                    ->count();
            }
            return view('admin.report.products-statistics-data', compact(
                'products',
                'allProductsCount',
                'allProductsInStockCount',
                'allProductsOutStockCount'

            ));
        } else {
            if ($subcategory_id == null) {
                $productsIds = ProductCategory::where('admin_id', $useradmin->id)->whereParentId($category_id)->pluck('id');
                $products = Product::whereIn('category_id', $productsIds)
                    ->where('admin_id', $useradmin->id)
                    ->whereBetween('created_at', [$date_from, $date_to])
                    ->get();
                $allProductsCount
                    = Product::whereIn('category_id', $productsIds)
                    ->where('admin_id', $useradmin->id)
                    ->whereBetween('created_at', [$date_from, $date_to])
                    ->count();
                $allProductsInStockCount
                    = Product::whereIn('category_id', $productsIds)
                    ->where('admin_id', $useradmin->id)
                    ->whereBetween('created_at', [$date_from, $date_to])
                    ->where('stock', '>', 0)
                    ->count();
                $allProductsOutStockCount
                    = Product::whereIn('category_id', $productsIds)
                    ->where('admin_id', $useradmin->id)
                    ->whereBetween('created_at', [$date_from, $date_to])
                    ->where('stock', '<', 1)
                    ->count();
            } else {
                $products = Product::where('category_id', $subcategory_id)
                    ->where('admin_id', $useradmin->id)
                    ->whereBetween('created_at', [$date_from, $date_to])
                    ->get();
                $allProductsCount
                    = Product::where('category_id', $subcategory_id)
                    ->where('admin_id', $useradmin->id)
                    ->whereBetween('created_at', [$date_from, $date_to])
                    ->count();
                $allProductsInStockCount
                    = Product::where('category_id', $subcategory_id)
                    ->where('admin_id', $useradmin->id)
                    ->whereBetween('created_at', [$date_from, $date_to])
                    ->where('stock', '>', 0)
                    ->count();
                $allProductsOutStockCount
                    = Product::where('category_id', $subcategory_id)
                    ->where('admin_id', $useradmin->id)
                    ->whereBetween('created_at', [$date_from, $date_to])
                    ->where('stock', '<', 1)
                    ->count();
            }
            return view('admin.report.products-statistics-data', compact(
                'products',
                'allProductsCount',
                'allProductsInStockCount',
                'allProductsOutStockCount'

            ));
        }
    }
}