@php
    $useradmin = App\Models\Admin::where('id', Auth::guard('admin')->id())->first();
    $getProducts = App\Models\Product::where('admin_id', $useradmin->id)->pluck('id');
<<<<<<< HEAD
    $getOrdersProducts = App\Models\OrderProduct::whereIn('product_id', $getProducts)->pluck('order_number');
    $vendor = App\Models\Vendor::where('id', $useradmin->vendor_id)->first();

=======
    $getOrdersProducts = App\Models\OrderProduct::whereIn('product_id', $getProducts)->pluck('order_id');
    $vendor = App\Models\Vendor::where('id', $useradmin->vendor_id)->first();
    
>>>>>>> d36cbbda453e24bf36fa2ba7c87f57a3db5f1ab4
@endphp

@extends('layouts.admin.master')

@section('content')


    <div class="py-4">

        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4"> <i class="fa fa-house"></i> {{ config('app.name') }} Admin Dashboard </h1>

            </div>

        </div>
    </div>

    <div class="row dashboard-home-top">


        @php
            $colores = collect(['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'tertiary']);
<<<<<<< HEAD

=======
            
>>>>>>> d36cbbda453e24bf36fa2ba7c87f57a3db5f1ab4
        @endphp

        @if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin'))
            <div class="col-12 col-sm-6 col-xl-3 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div
                                class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                    <i class="fas fa-users icon"></i>
                                </div>
                                <div class="d-sm-none">

                                    <h2 class="h5">Users</h2>

                                    <div class="fw-extrabold mb-1"> <a href="#">{{ $usersCount }}</a></div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h6 text-gray-400 mb-0">Users</h2>
                                    <a href="{{ route('admin.users.index') }}">
                                        <div class="fw-extrabold mb-1">{{ $usersCount }}</div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12 col-sm-6 col-xl-3 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div
                                class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                    <i class="fas fa-users-cog icon"></i>
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="h5">System Admins</h2>
                                    <div class="fw-extrabold mb-1">{{ $adminsCount }}</div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h6 text-gray-400 mb-0">System Admins</h2>
                                    <a href="{{ route('admin.system-admins.index') }}">
                                        <div class="fw-extrabold mb-2">{{ $adminsCount }}</div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12 col-sm-6 col-xl-3 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div
                                class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                    <i class="fas fa-ad"></i>
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="h5">Ads</h2>
                                    <div class="fw-extrabold mb-1">{{ $adsCount }}</div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h6 text-gray-400 mb-0">Ads</h2>
                                    <a href="{{ route('admin.advertisements.advertisements') }}">
                                        <div class="fw-extrabold mb-2">{{ $adsCount }}</div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12 col-sm-6 col-xl-3 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div
                                class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                    <i class="fas fa-briefcase icon"></i>
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="h5">Vendors </h2>
                                    <div class="fw-extrabold mb-1">{{ $vendors }}</div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h6 text-gray-400 mb-0">Vendors </h2>
                                    <a href="{{ route('admin.vendor-admins.index') }}">
                                        <div class="fw-extrabold mb-2">{{ $vendors }}</div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{-- <div class="col-12 col-sm-6 col-xl-3 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div
                                class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                    <i class="fa-solid fa-bars-staggered icon"></i>
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="h5">Halls Categories</h2>
                                    <div class="fw-extrabold mb-1">{{ $hallCategories }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}


            <div class="col-12 col-sm-6 col-xl-3 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div
                                class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                    <i class="fa-solid fa-wand-sparkles icon"></i>
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="h5">Halls</h2>
                                    <div class="fw-extrabold mb-1">{{ $halls }}</div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h6 text-gray-400 mb-0">Halls</h2>
                                    <a href="{{ route('admin.halls.index') }}">
                                        <div class="fw-extrabold mb-2">{{ $halls }}</div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12 col-sm-6 col-xl-3 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div
                                class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                    <i class="fa-solid fa-money-bills icon"></i>
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="h5">Total Taxes</h2>
                                    <div class="fw-extrabold mb-1">{{ $taxes }}</div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h6 text-gray-400 mb-0">Total Taxes</h2>
                                    <a href="{{ route('admin.taxes.index') }}">
                                        <div class="fw-extrabold mb-2">{{ $taxes }}</div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{-- <div class="col-12 col-sm-6 col-xl-3 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div
                                class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                    <i class="fa-solid fa-truck-fast icon"></i>
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="h5">Total Shippings Fees</h2>
                                    <div class="fw-extrabold mb-1">{{ $shippings }}</div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h6 text-gray-400 mb-0"> Total Shippings Fees</h2>
                                    <a href="{{ route('admin.shippings.index') }}">
                                        <div class="fw-extrabold mb-2">{{ $shippings }}</div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="col-12 col-sm-6 col-xl-3 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div
                                class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                    <i class="fas fa-shopping-cart icon"></i>
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="h5"> Total Products</h2>
                                    <div class="fw-extrabold mb-1">{{ $products }}</div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h6 text-gray-400 mb-0"> Total Products</h2>
                                    <a href="{{ route('admin.products.index') }}">
                                        <div class="fw-extrabold mb-2">{{ $products }}</div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12 col-sm-6 col-xl-3 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div
                                class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                    <i class="fas fa-check-double icon"></i>
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="h5">Products In Stock</h2>
                                    <div class="fw-extrabold mb-1">{{ $productsInStock }}</div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h6 text-gray-400 mb-0"> Products In Stock</h2>
                                    <a href="{{ route('admin.products.index', ['type' => 'in-stock']) }}">
                                        <div class="fw-extrabold mb-2">{{ $productsInStock }}</div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12 col-sm-6 col-xl-3 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div
                                class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                    <i class="fas fa-times icon"></i>
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="h5">Products Out Of Stock</h2>
                                    <div class="fw-extrabold mb-1">{{ $productsOutStock }}</div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h6 text-gray-400 mb-0">Products Out Of Stock</h2>
                                    <a href="{{ route('admin.products.index', ['type' => 'out-of-stock']) }}">
                                        <div class="fw-extrabold mb-2">{{ $productsOutStock }}</div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12 col-sm-6 col-xl-3 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div
                                class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                    <i class="fas fa-gifts icon"></i>
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="h5">Promo Codes</h2>
                                    <div class="fw-extrabold mb-1">{{ $promoCodes }}</div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h6 text-gray-400 mb-0">Promo Codes</h2>
                                    <a href="{{ route('admin.promo-codes.index') }}">
                                        <div class="fw-extrabold mb-2">{{ $promoCodes }}</div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div
                                class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                    <i class="fas fa-envelope-open-text icon"></i>
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="h5">New Messages</h2>
                                    <div class="fw-extrabold mb-1">{{ $messages }}</div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h6 text-gray-400 mb-0">New Messages</h2>
                                    <a href="{{ route('admin.contact-messages.index') }}">
                                        <div class="fw-extrabold mb-2">{{ $messages }}</div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div
                                class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                    <i class="fas fa-envelope-open-text icon"></i>
                                </div>
                                <div class="d-sm-none">
<<<<<<< HEAD
                                    <h2 class="h5">Vendors type ... Company</h2>
=======
                                    <h2 class="h5">Vendors type : Company</h2>
>>>>>>> d36cbbda453e24bf36fa2ba7c87f57a3db5f1ab4
                                    <div class="fw-extrabold mb-1">{{ $vendorsCompanyCount }}</div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="d-none d-sm-block">
<<<<<<< HEAD
                                    <h2 class="h6 text-gray-400 mb-0">Vendors type ... Company</h2>
=======
                                    <h2 class="h6 text-gray-400 mb-0">Vendors type : Company</h2>

>>>>>>> d36cbbda453e24bf36fa2ba7c87f57a3db5f1ab4
                                    <a href="{{ route('admin.vendors.company') }}">
                                        <div class="fw-extrabold mb-2">{{ $vendorsCompanyCount }}</div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div
                                class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                    <i class="fas fa-envelope-open-text icon"></i>
                                </div>
                                <div class="d-sm-none">
<<<<<<< HEAD
                                    <h2 class="h5">Vendors type ... Individual</h2>
=======
                                    <h2 class="h5">Vendors type : Individual</h2>
>>>>>>> d36cbbda453e24bf36fa2ba7c87f57a3db5f1ab4
                                    <div class="fw-extrabold mb-1">{{ $vendorsIndividualCount }}</div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="d-none d-sm-block">
<<<<<<< HEAD
                                    <h2 class="h6 text-gray-400 mb-0">Vendors type ... Individual</h2>
=======
                                    <h2 class="h6 text-gray-400 mb-0">Vendors type : Individual</h2>
>>>>>>> d36cbbda453e24bf36fa2ba7c87f57a3db5f1ab4
                                    <a href="{{ route('admin.vendors.individual') }}">
                                        <div class="fw-extrabold mb-2">{{ $vendorsIndividualCount }}</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            {{-- With Draw From Day 1 --}}
            <div class="card my-4">

                <div class="card-header">
                    Total With Draw Balance
                </div>
                <div class=" card-body ">

                    <div class="d-flex justify-content-center align-items-center flex-wrap">


                        <div
                            class="card card-body px-1 py-3 mx-4 p bg-success   rounded my-3 order-statistics  position-relative">

                            <h1 style="color: #fff; font-size: 30px;">
                                {{ explode('.', number_format($total_order_budget_all_times, 2))[1] == 00 ? number_format($total_order_budget_all_times) : number_format($total_order_budget_all_times, 2) }}
                                AED</h1>


                            <a href="{{ route('admin.with-draw-request.total_withdraw') }}">
                                <span class="d-block " style=" font-size:13px ; color:#fff">Total Purchase Order /
                                    Halls</span>
                            </a>
                        </div>


                        <div
                            class="card card-body px-1 py-3 mx-4 p bg-info   rounded my-3 order-statistics  position-relative">

                            <h1 style="color: #fff; font-size: 30px;">
                                {{ explode('.', number_format($total_commission_budget_all_times, 2))[1] == 00 ? number_format($total_commission_budget_all_times) : number_format($total_commission_budget_all_times, 2) }}
                                AED</h1>


                            <a href="{{ route('admin.with-draw-request.total_withdraw') }}"><span class="d-block "
                                    style=" font-size:13px ; color:#fff">Our Commission From Vendors</span></a>
                        </div>

                    </div>
                </div>
            </div>

            {{-- With Draw This Month --}}

            <div class="card my-4">

                <div class="card-header">
                    With Draw Balance Per
                    {{ date('F', mktime(0, 0, 0, Carbon\Carbon::now()->month, 1)) . ' / ' . Carbon\Carbon::now()->year }}
                </div>
                <div class="card-body ">

                    <div class="d-flex justify-content-center align-items-center flex-wrap">


                        <div
                            class="card card-body px-1 py-3 mx-4 p bg-success   rounded my-3 order-statistics  position-relative">

                            <h1 style="color: #fff; font-size: 30px;">
                                {{ explode('.', number_format($total_order_budget, 2))[1] == 00 ? number_format($total_order_budget) : number_format($total_order_budget, 2) }}
                                AED</h1>


                            <a href="{{ route('admin.with-draw-request.total_withdraw_per_month') }}">
                                <span class="d-block " style=" font-size:13px ; color:#fff">Total Purchase Order /
                                    Halls</span>
                            </a>
                        </div>


                        <div
                            class="card card-body px-1 py-3 mx-4 p bg-info   rounded my-3 order-statistics  position-relative">

                            <h1 style="color: #fff; font-size: 30px;">
                                {{ explode('.', number_format($total_commission_budget, 2))[1] == 00 ? number_format($total_commission_budget) : number_format($total_commission_budget, 2) }}
                                AED</h1>


                            <a href="{{ route('admin.with-draw-request.total_withdraw_per_month') }}"><span
                                    class="d-block " style=" font-size:13px ; color:#fff">Our Commission From
                                    Vendors</span></a>
                        </div>



                        <div
                            class="card card-body px-1 py-3 mx-4 p bg-primary   rounded my-3 order-statistics  position-relative">

                            <h1 style="color: #fff; font-size: 25px;">
<<<<<<< HEAD
                                {{ number_format($total_vendor_credit) }}
=======
                                {{ explode('.', number_format($total_order_budget - $total_commission_budget, 2))[1] == 00 ? number_format($total_order_budget - $total_commission_budget) : number_format($total_order_budget - $total_commission_budget, 2) }}
>>>>>>> d36cbbda453e24bf36fa2ba7c87f57a3db5f1ab4
                                AED</h1>


                            <a href="{{ route('admin.with-draw-request.total_withdraw_per_month') }}"><span
                                    class="d-block " style=" font-size:13px ; color:#fff">Total Vendors Balance</span></a>
                        </div>
                        <!---->
                        <div
                            class="card card-body px-1 py-3 mx-4 p bg-warning   rounded my-3 order-statistics  position-relative">

                            <h1 style="color: #fff; font-size: 30px;">
                                {{ explode('.', number_format($total_sent_money, 2))[1] == 00 ? number_format($total_sent_money) : number_format($total_sent_money, 2) }}
                                AED</h1>


                            <a href="{{ route('admin.with-draw-request.total_withdraw_per_month') }}"><span
                                    class="d-block " style=" font-size:13px ; color:#fff">Total Sent Money</span></a>
                        </div>

                        <div
                            class="card card-body px-1 py-3 mx-4 p bg-danger   rounded my-3 order-statistics  position-relative">

                            <h1 style="color: #fff; font-size: 30px;">
                                {{ explode('.', number_format($total_vendor_credit - $total_sent_money, 2))[1] == 00
                                    ? number_format($total_vendor_credit - $total_sent_money)
                                    : number_format($total_vendor_credit - $total_sent_money, 2) }}
                                AED</h1>


                            <a href="{{ route('admin.with-draw-request.total_withdraw_per_month') }}"><span
                                    class="d-block " style=" font-size:13px ; color:#fff">Total Vendors Credit</span></a>
                        </div>





                    </div>
                </div>
            </div>

            <div class="card my-4">

                <div class="card-header">
                    Products Orders
                </div>
                <div class=" card-body ">

                    <div class="d-flex justify-content-center align-items-center flex-wrap">


                        <div
                            class="card card-body px-1 py-3 mx-4 p bg-info   rounded my-3 order-statistics  position-relative">

                            <i class="far fa-plus-square" style="margin-bottom: 10px ; font-size:30px"></i>


                            <a href="{{ route('admin.orders.newOrders') }}"><span class="d-block "
                                    style=" font-size:20px ; color:#fff">New Orders</span></a>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ $newOrdersCount }}
                            </span>
                        </div>



                        <div
                            class="card card-body px-1 py-3 mx-4 p bg-primary   rounded my-3 order-statistics  position-relative">

                            <i class="fas fa-spinner spine" style="margin-bottom: 10px ; font-size:30px"></i>


                            <a href="{{ route('admin.orders.inprogressOrders') }}"><span class="d-block "
                                    style=" font-size:20px ; color:#fff">Inprogress Orders</span></a>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ $inprogressOrdersCount }}
                            </span>
                        </div>



                        <div
                            class="card card-body px-1 py-3 mx-4 p bg-success   rounded my-3 order-statistics  position-relative">

                            <i class="fas fa-check-double" style="margin-bottom: 10px ; font-size:30px"></i>



                            <a href="{{ route('admin.orders.deliveredOrders') }}"><span class="d-block "
                                    style=" font-size:20px ; color:#fff">Delivered Orders</span></a>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ $deliveredOrdersCount }}
                            </span>
                        </div>



                        <div
                            class="card card-body px-1 py-3 mx-4 p bg-danger   rounded my-3 order-statistics  position-relative">

                            <i class="fas fa-window-close" style="margin-bottom: 10px ; font-size:30px"></i>

                            <a href="{{ route('admin.orders.cancelledOrders') }}"><span class="d-block "
                                    style=" font-size:20px ; color:#fff">Cancelled Orders</span></a>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">
                                {{ $cancelledOrdersCount }}
                            </span>
                        </div>



                    </div>
                </div>
            </div>




            {{-- orders --}}



            {{-- bookings --}}

            <div class="card my-4">

                <div class="card-header">
                    Halls Bookings
                </div>

                <div class=" card-body ">

                    <div class="d-flex justify-content-center align-items-center flex-wrap">


<<<<<<< HEAD
=======
                        <div style="min-width: 300px"
                        class="card card-body  py-3  p bg-info   rounded my-3 order-statistics  booking-statistics position-relative mx-4">

                        <i class="fa-regular fa-circle-check" style="margin-bottom: 10px ; font-size:30px"></i>

                        <a href="{{ route('admin.bookings.pinddingdBookings') }}"><span class="d-block "
                                style=" font-size:20px ; color:#fff">New Halls Bookings</span></a>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ $pending_bookings }}
                        </span>
                    </div>
                        

                        <div style="min-width: 300px"
                        class="card card-body  py-3  p bg-success   rounded my-3 order-statistics  booking-statistics position-relative mx-4">

                        <i class="fa-regular fa-circle-check" style="margin-bottom: 10px ; font-size:30px"></i>

                        <a href="{{ route('admin.bookings.successfullBookings') }}"><span class="d-block "
                                style=" font-size:20px ; color:#fff">Successful Halls Bookings</span></a>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ $successfullHallsBookings }}
                        </span>
                    </div>
>>>>>>> d36cbbda453e24bf36fa2ba7c87f57a3db5f1ab4






<<<<<<< HEAD
                        <div
                            class="card card-body  py-3  p bg-success   rounded my-3 order-statistics  booking-statistics position-relative mx-4">

                            <i class="fa-regular fa-circle-check" style="margin-bottom: 10px ; font-size:30px"></i>

                            <a href="{{ route('admin.bookings.successfullBookings') }}"><span class="d-block "
                                    style=" font-size:20px ; color:#fff">Successful Halls Bookings</span></a>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ $successfullHallsBookings }}
                            </span>
                        </div>



                        <div
=======
                        <div style="min-width: 300px"
>>>>>>> d36cbbda453e24bf36fa2ba7c87f57a3db5f1ab4
                            class="card card-body  py-3  p bg-danger   rounded my-3 order-statistics  booking-statistics position-relative mx-4">

                            <i class="fa-regular fa-circle-xmark" style="margin-bottom: 10px ; font-size:30px"></i>
                            <a href="{{ route('admin.bookings.cancelledBookings') }}"><span class="d-block "
                                    style=" font-size:20px ; color:#fff">Cancelled Halls Bookings</span></a>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">
                                {{ $cancelledHallsBookings }}
                            </span>
                        </div>



                    </div>
                </div>
            </div>
        @else
            {{-- <!--<div class="col-12 col-sm-6 col-xl-3 mb-4">-->
            <!--    <div class="card border-0 shadow">-->
            <!--        <div class="card-body">-->
            <!--            <div class="row d-block d-xl-flex align-items-center">-->
            <!--                <div-->
            <!--                    class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">-->
            <!--                    <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">-->

            <!--                        <i class="fas fa-briefcase icon"></i>-->
            <!--                    </div>-->
            <!--                    <div class="d-sm-none">-->
            <!--                        <h2 class="h5">Vendors </h2>-->
            <!--                        <div class="fw-extrabold mb-1">{{ $vendors }}</div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="col-12 col-xl-7 px-xl-0">-->
            <!--                    <div class="d-none d-sm-block">-->
            <!--                        <h2 class="h6 text-gray-400 mb-0">Vendors </h2>-->
            <!--                        <a href="{{ route('admin.vendor-admins.index') }}">-->
            <!--                            <div class="fw-extrabold mb-2">{{ $vendors }}</div>-->
            <!--                        </a>-->
            <!--                    </div>-->

            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>--> --}}


            @if ($vendor->type == 'hall' || $vendor->type == 'product_hall')
                <div class="col-12 col-sm-6 col-xl-3 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div class="row d-block d-xl-flex align-items-center">
                                <div
                                    class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                    <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                        <i class="fa-solid fa-bars-staggered icon"></i>
                                    </div>
                                    <div class="d-sm-none">
                                        <h2 class="h5">Halls Categories</h2>
                                        <div class="fw-extrabold mb-1">{{ $hallCategories }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif



            @if ($vendor->type == 'hall' || $vendor->type == 'product_hall')
                <div class="col-12 col-sm-6 col-xl-3 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div class="row d-block d-xl-flex align-items-center">
                                <div
                                    class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                    <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                        <i class="fa-solid fa-wand-sparkles icon"></i>
                                    </div>
                                    <div class="d-sm-none">
                                        <h2 class="h5">Halls</h2>
                                        <div class="fw-extrabold mb-1">{{ $halls }}</div>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-7 px-xl-0">
                                    <div class="d-none d-sm-block">
                                        <h2 class="h6 text-gray-400 mb-0">Halls</h2>
                                        <a href="{{ route('admin.halls.index') }}">
                                            <div class="fw-extrabold mb-2">{{ $halls }}</div>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="col-12 col-sm-6 col-xl-3 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div
                                class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                    <i class="fa-solid fa-money-bills icon"></i>
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="h5">Total Taxes</h2>
                                    <div class="fw-extrabold mb-1">{{ $taxes }}</div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h6 text-gray-400 mb-0">Total Taxes</h2>
                                    <a href="{{ route('admin.taxes.index') }}">
                                        <div class="fw-extrabold mb-2">{{ $taxes }}</div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12 col-sm-6 col-xl-3 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div
                                class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                    <i class="fa-solid fa-truck-fast icon"></i>
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="h5">Total Shippings Fees</h2>
                                    <div class="fw-extrabold mb-1">{{ $shippings }}</div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h6 text-gray-400 mb-0"> Total Shippings Fees</h2>
                                    <a href="{{ route('admin.shippings.index') }}">
                                        <div class="fw-extrabold mb-2">{{ $shippings }}</div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if ($vendor->type == 'product' || $vendor->type == 'product_hall')
                <div class="col-12 col-sm-6 col-xl-3 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div class="row d-block d-xl-flex align-items-center">
                                <div
                                    class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                    <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                        <i class="fas fa-shopping-cart icon"></i>
                                    </div>
                                    <div class="d-sm-none">
                                        <h2 class="h5"> Total Products</h2>
                                        <div class="fw-extrabold mb-1">{{ $products }}</div>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-7 px-xl-0">
                                    <div class="d-none d-sm-block">
                                        <h2 class="h6 text-gray-400 mb-0"> Total Products</h2>
                                        <a href="{{ route('admin.products.index') }}">
                                            <div class="fw-extrabold mb-2">{{ $products }}</div>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($vendor->type == 'product' || $vendor->type == 'product_hall')
                <div class="col-12 col-sm-6 col-xl-3 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div class="row d-block d-xl-flex align-items-center">
                                <div
                                    class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                    <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                        <i class="fas fa-shopping-cart icon"></i>
                                    </div>
                                    <div class="d-sm-none">
                                        <h2 class="h5"> Products Categories</h2>
                                        <div class="fw-extrabold mb-1">{{ $productCategories }}</div>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-7 px-xl-0">
                                    <div class="d-none d-sm-block">
                                        <h2 class="h6 text-gray-400 mb-0"> Products Categories</h2>
                                        <a href="{{ route('admin.products-categories.index') }}">
                                            <div class="fw-extrabold mb-2">{{ $productCategories }}</div>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($vendor->type == 'product' || $vendor->type == 'product_hall')
                <div class="col-12 col-sm-6 col-xl-3 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div class="row d-block d-xl-flex align-items-center">
                                <div
                                    class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                    <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                        <i class="fas fa-check-double icon"></i>
                                    </div>
                                    <div class="d-sm-none">
                                        <h2 class="h5">Products In Stock</h2>
                                        <div class="fw-extrabold mb-1">{{ $productsInStock }}</div>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-7 px-xl-0">
                                    <div class="d-none d-sm-block">
                                        <h2 class="h6 text-gray-400 mb-0"> Products In Stock</h2>
                                        <a href="{{ route('admin.products.index', ['type' => 'in-stock']) }}">
                                            <div class="fw-extrabold mb-2">{{ $productsInStock }}</div>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-12 col-sm-6 col-xl-3 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div class="row d-block d-xl-flex align-items-center">
                                <div
                                    class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                    <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                        <i class="fas fa-times icon"></i>
                                    </div>
                                    <div class="d-sm-none">
                                        <h2 class="h5">Products Out Of Stock</h2>
                                        <div class="fw-extrabold mb-1">{{ $productsOutStock }}</div>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-7 px-xl-0">
                                    <div class="d-none d-sm-block">
                                        <h2 class="h6 text-gray-400 mb-0">Products Out Of Stock</h2>
                                        <a href="{{ route('admin.products.index', ['type' => 'out-stock']) }}">
                                            <div class="fw-extrabold mb-2">{{ $productsOutStock }}</div>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif


            <div class="col-12 col-sm-6 col-xl-3 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div
                                class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                    <i class="fas fa-gifts icon"></i>
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="h5">Promo Codes</h2>
                                    <div class="fw-extrabold mb-1">{{ $promoCodes }}</div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h6 text-gray-400 mb-0">Promo Codes</h2>
                                    <a href="{{ route('admin.promo-codes.index') }}">
                                        <div class="fw-extrabold mb-2">{{ $promoCodes }}</div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>





            {{-- orders --}}
            @if ($vendor->type == 'product' || $vendor->type == 'product_hall')
                <div class="card my-4">

                    <div class="card-header">
                        Products Orders
                    </div>
                    <div class=" card-body ">

                        <div class="d-flex justify-content-center align-items-center flex-wrap">


                            <div
                                class="card card-body px-1 py-3 mx-4 p bg-info   rounded my-3 order-statistics  position-relative">

                                <i class="far fa-plus-square" style="margin-bottom: 10px ; font-size:30px"></i>


                                <a href="{{ route('admin.orders.newOrders') }}"><span class="d-block "
                                        style=" font-size:20px ; color:#fff">New Orders</span></a>
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ $newOrdersCount }}
                                </span>
                            </div>



                            <div
                                class="card card-body px-1 py-3 mx-4 p bg-primary   rounded my-3 order-statistics  position-relative">

                                <i class="fas fa-spinner spine" style="margin-bottom: 10px ; font-size:30px"></i>


                                <a href="{{ route('admin.orders.inprogressOrders') }}"><span class="d-block "
                                        style=" font-size:20px ; color:#fff">Inprogress Orders</span></a>
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ $inprogressOrdersCount }}
                                </span>
                            </div>



                            <div
                                class="card card-body px-1 py-3 mx-4 p bg-success   rounded my-3 order-statistics  position-relative">

                                <i class="fas fa-check-double" style="margin-bottom: 10px ; font-size:30px"></i>



                                <a href="{{ route('admin.orders.deliveredOrders') }}"><span class="d-block "
                                        style=" font-size:20px ; color:#fff">Delivered Orders</span></a>
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ $deliveredOrdersCount }}
                                </span>
                            </div>



                            <div
                                class="card card-body px-1 py-3 mx-4 p bg-danger   rounded my-3 order-statistics  position-relative">

                                <i class="fas fa-window-close" style="margin-bottom: 10px ; font-size:30px"></i>

                                <a href="{{ route('admin.orders.cancelledOrders') }}"><span class="d-block "
                                        style=" font-size:20px ; color:#fff">Cancelled Orders</span></a>
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">
                                    {{ $cancelledOrdersCount }}
                                </span>
                            </div>



                        </div>
                    </div>
                </div>
            @endif

<<<<<<< HEAD
            @if ($vendor->type == 'product' || $vendor->type == 'product_hall' || $vendor->type == 'hall' )
=======
            @if ($vendor->type == 'product' || $vendor->type == 'product_hall')
>>>>>>> d36cbbda453e24bf36fa2ba7c87f57a3db5f1ab4
                <div class="card my-4">

                    <div class="card-header">
                        Total With Draw Balance
                    </div>
                    <div class=" card-body ">

                        <div class="d-flex justify-content-center align-items-center flex-wrap">


                            <div
                                class="card card-body px-1 py-3 mx-4 p bg-success   rounded my-3 order-statistics  position-relative">

                                <h1 style="color: #fff; font-size: 30px;">
                                    {{ number_format($total_this_vendor_budget) }}
                                    AED</h1>


                                <a style="cursor: text">
                                    <span class="d-block " style=" font-size:13px ; color:#fff">Total Purchase Order /
                                        Halls</span>
                                </a>
                            </div>


                            <div
                                class="card card-body px-1 py-3 mx-4 p bg-info   rounded my-3 order-statistics  position-relative">

                                <h1 style="color: #fff; font-size: 30px;">
                                    {{ number_format($our_store_budget) }}
                                    AED</h1>


                                <a style="cursor: text"><span class="d-block " style=" font-size:13px ; color:#fff">Our
                                        Credit</span></a>
                            </div>

                            <div
                                class="card card-body px-1 py-3 mx-4 p bg-danger   rounded my-3 order-statistics  position-relative">

                                <h1 style="color: #fff; font-size: 30px;">
                                    {{ number_format($total_this_vendor_budget - $our_store_budget) }}
                                    AED</h1>


                                <a style="cursor: text"><span class="d-block " style=" font-size:13px ; color:#fff">Our
                                        Money In
                                        Events</span></a>
                            </div>

                        </div>
                    </div>
                </div>
            @endif

            @if ($vendor->type == 'product' || $vendor->type == 'product_hall')
                <div class="card my-4">

                    <div class="card-header">
                        Total With Draw Balance Per
                        {{ date('F', mktime(0, 0, 0, Carbon\Carbon::now()->month, 1)) . ' / ' . Carbon\Carbon::now()->year }}
                    </div>
                    <div class=" card-body ">

                        <div class="d-flex justify-content-center align-items-center flex-wrap">


                            <div
                                class="card card-body px-1 py-3 mx-4 p bg-success   rounded my-3 order-statistics  position-relative">

                                <h1 style="color: #fff; font-size: 30px;">
                                    {{ number_format($total_this_vendor_budget) }}
                                    AED</h1>


                                <a style="cursor: text">
                                    <span class="d-block " style=" font-size:13px ; color:#fff">Total Purchase Order /
                                        Halls</span>
                                </a>
                            </div>


                            <div
                                class="card card-body px-1 py-3 mx-4 p bg-info   rounded my-3 order-statistics  position-relative">

                                <h1 style="color: #fff; font-size: 30px;">
                                    {{ number_format($our_store_budget) }}
                                    AED</h1>


                                <a style="cursor: text"><span class="d-block " style=" font-size:13px ; color:#fff">Our
                                        Credit</span></a>
                            </div>

                            <div
                                class="card card-body px-1 py-3 mx-4 p bg-danger   rounded my-3 order-statistics  position-relative">

                                <h1 style="color: #fff; font-size: 30px;">
                                    {{ number_format($total_this_vendor_budget - $our_store_budget) }}
                                    AED</h1>


                                <a style="cursor: text"><span class="d-block " style=" font-size:13px ; color:#fff">Our
                                        Money In
                                        Events</span></a>
                            </div>

                        </div>
                    </div>
                </div>
            @endif



            {{-- orders --}}



            {{-- bookings --}}
            @if ($vendor->type == 'hall' || $vendor->type == 'product_hall')
                <div class="card my-4">

                    <div class="card-header">
                        Halls Bookings
                    </div>

                    <div class=" card-body ">

                        <div class="d-flex justify-content-center align-items-center flex-wrap">




<<<<<<< HEAD

=======
                            <div style="min-width: 300px"
                            class="card card-body  py-3  p bg-info   rounded my-3 order-statistics  booking-statistics position-relative mx-4">
    
                            <i class="fa-regular fa-circle-check" style="margin-bottom: 10px ; font-size:30px"></i>
    
                            <a href="{{ route('admin.bookings.pinddingdBookings') }}"><span class="d-block "
                                    style=" font-size:20px ; color:#fff">New Halls Bookings</span></a>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ $pending_bookings }}
                            </span>
                        </div>
>>>>>>> d36cbbda453e24bf36fa2ba7c87f57a3db5f1ab4



                            <div
                                class="card card-body  py-3  p bg-success   rounded my-3 order-statistics  booking-statistics position-relative mx-4">

                                <i class="fa-regular fa-circle-check" style="margin-bottom: 10px ; font-size:30px"></i>

                                <a href="{{ route('admin.bookings.successfullBookings') }}"><span class="d-block "
                                        style=" font-size:20px ; color:#fff">Successful Halls Bookings</span></a>
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ $successfullHallsBookings }}
                                </span>
                            </div>



                            <div
                                class="card card-body  py-3  p bg-danger   rounded my-3 order-statistics  booking-statistics position-relative mx-4">

                                <i class="fa-regular fa-circle-xmark" style="margin-bottom: 10px ; font-size:30px"></i>
                                <a href="{{ route('admin.bookings.cancelledBookings') }}"><span class="d-block "
                                        style=" font-size:20px ; color:#fff">Cancelled Halls Bookings</span></a>
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">
                                    {{ $cancelledHallsBookings }}
                                </span>
                            </div>



                        </div>
                    </div>
                </div>
            @endif
        @endif
    </div>




<<<<<<< HEAD
    {{-- Current Month Income from Products --}}
=======
    {{-- start all orders chart --}}
>>>>>>> d36cbbda453e24bf36fa2ba7c87f57a3db5f1ab4
    <div class="row">

        <div class="col-xl-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header d-flex flex-row align-items-center flex-0 border-bottom">

                    <div class="d-block">
<<<<<<< HEAD
                        <div class="h5 fw-normal text-gray mb-2">Current Month Orders</div>
=======
                        <div class="h5 fw-normal text-gray mb-2">All Orders</div>
>>>>>>> d36cbbda453e24bf36fa2ba7c87f57a3db5f1ab4
                        <div class="h4 fw-extrabold text-success">
                            @if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin'))
                                {{ App\Models\Order::count() }}
                            @else
<<<<<<< HEAD
                                {{ App\Models\Order::whereIn('id', $getOrdersProducts)->count() }}
=======
                                {{ $all_order_vendor_count }}
>>>>>>> d36cbbda453e24bf36fa2ba7c87f57a3db5f1ab4
                            @endif Order
                        </div>
                    </div>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area my-3">
                        <canvas id="productsIncome"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
=======
    {{-- end all orders chart --}}

    {{-- start all hall bokings chart --}}

    <div class="row">

        <div class="col-xl-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header d-flex flex-row align-items-center flex-0 border-bottom">

                    <div class="d-block">
                        <div class="h5 fw-normal text-gray mb-2">All Hall Bookings</div>
                        <div class="h4 fw-extrabold text-success">
                            @if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin'))
                                {{ App\Models\Hall_booking::count() }}
                            @else
                                {{ App\Models\Hall_booking::where('vendor_id', App\Models\Admin::where('id', Auth::guard('admin')->id())->first()->vendor->id)->count() }}
                            @endif Hall Bookings
                        </div>
                    </div>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area my-3">
                        <canvas id="hallbokingschatt"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>




    {{-- end all hall bokings chart --}}

>>>>>>> d36cbbda453e24bf36fa2ba7c87f57a3db5f1ab4







    <div class="row">
<<<<<<< HEAD
        <div class="col-12 col-xl-8">
            <div class="row">
                <div class="col-12">
=======

        <div class="col-12 col-xl-8">
            <div class="row">
                <div class="col-12">

>>>>>>> d36cbbda453e24bf36fa2ba7c87f57a3db5f1ab4
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->

                        <div class="card-header d-flex flex-row align-items-center flex-0 border-bottom">

                            <div class="d-block">
                                <div class="h3 fw-normal text-gray mb-2">Current Month Orders</div>
                                <div class="h3 fw-extrabold text-success">
                                    @if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin'))
<<<<<<< HEAD
                                        {{ App\Models\Order::count() }}
                                    @else
                                        {{ App\Models\Order::whereIn('id', $getOrdersProducts)->count() }}
=======
                                        {{ $ordersChart_count }}
                                    @else
                                        {{ $ordersChart_count }}
>>>>>>> d36cbbda453e24bf36fa2ba7c87f57a3db5f1ab4
                                    @endif Order
                                </div>
                            </div>

                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="ordersChart"></canvas>
                            </div>
                        </div>
                    </div>
<<<<<<< HEAD
                </div>
                {{--  Current Month Orders --}}



                {{-- latest orders --}}

                @if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin'))
=======


                </div>
                <div class="col-12">

                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->

                        <div class="card-header d-flex flex-row align-items-center flex-0 border-bottom">

                            <div class="d-block">
                                <div class="h3 fw-normal text-gray mb-2">Current Month Hall Bookings</div>
                                <div class="h3 fw-extrabold text-success">
                                    @if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin'))
                                        {{ $hall_bookings_Chart_count }}
                                    @else
                                        {{ $hall_bookings_Chart_count }}
                                    @endif Hall Bookings
                                </div>
                            </div>

                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="hallBookingschat"></canvas>
                            </div>
                        </div>
                    </div>


                </div>


                {{--  Current Month Orders --}}

                {{--  Current Month Hall Bookings --}}

                {{-- latest orders --}}

                {{-- @if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin'))
>>>>>>> d36cbbda453e24bf36fa2ba7c87f57a3db5f1ab4
                    <div class="col-12 mb-4">
                        <div class="card border-0 shadow">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h2 class="fs-5 fw-bold mb-0">Latest Orders</h2>
                                    </div>

                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="border-gray-200">ID</th>
                                            <th class="border-gray-200">Order Number</th>
                                            <th class="border-gray-200">Total Price</th>
                                            <th class="border-gray-200">Payment Type</th>
                                            <th class="border-gray-200">User</th>
                                            <th class="border-gray-200">Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (App\Models\Order::take(10)->latest()->get() as $key => $order)
                                            <tr>

                                                <td>
                                                    <p class="text-nowrap">{{ $key + 1 }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-nowrap">{{ $order->id }}</p>
                                                </td>
                                                <td> <span class="badge bg-success text-nowrap"
<<<<<<< HEAD
                                                        style="font-size: 16px">{{ 11 }}
=======
                                                        style="font-size: 16px">{{ number_format($order->product_total_price + $order->total_taxes_price) }}
>>>>>>> d36cbbda453e24bf36fa2ba7c87f57a3db5f1ab4
                                                        AED</span></td>

                                                <td> <span class="badge bg-info text-nowrap"
                                                        style="font-size: 16px">{{ $order->payment_type }}</span>
                                                </td>

                                                <td>

                                                    @if ($order->user)
                                                        <strong>


                                                            <p class="text-nowrap"><i class="fas fa-user text-info"></i>
                                                                <a class="mx-1 text-info"
                                                                    href="{{ route('admin.users.index', ['user_id' => $order->user->id]) }}">{{ $order->user->name }}</a>
                                                            </p>
                                                        </strong>
                                                    @else
                                                        <p class="text-nowrap"><i class="fas fa-user text-info"></i>
                                                            {{ $order->customer_name }}
                                                        </p>
                                                    @endif
                                                </td>


                                                <td>
                                                    <p class="text-nowrap">
                                                        {{ $order->created_at }}
                                                    </p>
                                                </td>

                                                <td>


                                                    <div
                                                        class="d-flex  align-items-center justify-content-center flex-md-nowrap">


                                                        <div class="">
                                                            <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Show Details">


                                                                <a class="btn btn-primary  m-1" style="font-size: 16px"
                                                                    href="{{ route('admin.orders.show', $order->order_number) }}">
                                                                    <span class="fas fa-eye "></span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-12 mb-4">
                        <div class="card border-0 shadow">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h2 class="fs-5 fw-bold mb-0">Latest Orders</h2>
                                    </div>

                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="border-gray-200">ID</th>
                                            <th class="border-gray-200">Order Number</th>
                                            <th class="border-gray-200">Total Price</th>
                                            <th class="border-gray-200">Payment Type</th>
                                            <th class="border-gray-200">User</th>
                                            <th class="border-gray-200">Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (App\Models\Order::whereIn('id', $getOrdersProducts)->take(10)->latest()->get() as $key => $order)
                                            <tr>

                                                <td>
                                                    <p class="text-nowrap">{{ $key + 1 }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-nowrap">{{ $order->id }}</p>
                                                </td>
                                                <td> <span class="badge bg-success text-nowrap"
                                                        style="font-size: 16px">{{ number_format($order->product_total_price + $order->total_taxes_price) }}
                                                        EGP</span></td>

                                                <td> <span class="badge bg-info text-nowrap"
                                                        style="font-size: 16px">{{ $order->payment_type }}</span>
                                                </td>

                                                <td>

                                                    @if ($order->user)
                                                        <strong>


                                                            <p class="text-nowrap"><i class="fas fa-user text-info"></i>
                                                                <a class="mx-1 text-info"
                                                                    href="{{ route('admin.users.index', ['user_id' => $order->user->id]) }}">{{ $order->user->name }}</a>
                                                            </p>
                                                        </strong>
                                                    @else
                                                        <p class="text-nowrap"><i class="fas fa-user text-info"></i>
                                                            {{ $order->customer_name }}
                                                        </p>
                                                    @endif
                                                </td>


                                                <td>
                                                    <p class="text-nowrap">
                                                        {{ $order->created_at }}
                                                    </p>
                                                </td>

                                                <td>


                                                    <div
                                                        class="d-flex  align-items-center justify-content-center flex-md-nowrap">


                                                        <div class="">
                                                            <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Show Details">


                                                                <a class="btn btn-primary  m-1" style="font-size: 16px"
                                                                    href="{{ route('admin.orders.show', $order->order_number) }}">
                                                                    <span class="fas fa-eye "></span></a>
                                                            </div>
                                                        </div>








                                                    </div>






                                                </td>




                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
<<<<<<< HEAD
                @endif
=======
                @endif --}}
>>>>>>> d36cbbda453e24bf36fa2ba7c87f57a3db5f1ab4

                {{-- latest orders --}}






            </div>
<<<<<<< HEAD
        </div>
=======

        </div>

>>>>>>> d36cbbda453e24bf36fa2ba7c87f57a3db5f1ab4
        <div class="col-12 col-xl-4">



            <div class="col-12 px-0 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-header d-flex flex-row align-items-center flex-0 border-bottom">
                        <div class="d-block">
                            <div class="h6 fw-normal text-gray mb-2">Orders Status</div>

                        </div>

                    </div>
                    <div class="card-body py-4">

                        <div class="chart-area">
                            <canvas id="ordersStatusChart"></canvas>
                        </div>

                    </div>
                </div>
            </div>

<<<<<<< HEAD

=======
            <div class="col-12 px-0 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-header d-flex flex-row align-items-center flex-0 border-bottom">
                        <div class="d-block">
                            <div class="h6 fw-normal text-gray mb-2">All Hall Bookings</div>
                            <div class="h3 fw-extrabold text-warning">{{ $all_bookings_count }} Hall Bookings</div>

                        </div>

                    </div>
                    <div class="card-body py-4">

                        <div class="chart-area">
                            <canvas id="hallbookingschart"></canvas>
                        </div>

                    </div>
                </div>
            </div>
>>>>>>> d36cbbda453e24bf36fa2ba7c87f57a3db5f1ab4


            <div class="col-12 px-0 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-header d-flex flex-row align-items-center flex-0 border-bottom">
                        <div class="d-block">
                            <div class="h6 fw-normal text-gray mb-2">All Products</div>
                            <div class="h3 fw-extrabold text-warning">{{ $products }} Product</div>

                        </div>

                    </div>
                    <div class="card-body py-4">

                        <div class="chart-area">
                            <canvas id="productsChart"></canvas>
                        </div>

                    </div>
                </div>
            </div>


<<<<<<< HEAD
        </div>
    </div>

=======


        </div>
    </div>



    {{-- latest orders --}}

    @if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin'))
        <div class="col-12 mb-4">
            <div class="card border-0 shadow">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="fs-5 fw-bold mb-0">Latest Orders</h2>
                        </div>

                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>

                                <th class="border-gray-200"style="text-align: center">Order Number</th>
                                <th class="border-gray-200"style="text-align: center">Total Price</th>
                                <th class="border-gray-200"style="text-align: center">Payment Type</th>
                                <th class="border-gray-200"style="text-align: center">User</th>
                                <th class="border-gray-200"style="text-align: center">Created At</th>
                                <th class="border-gray-200"style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (App\Models\Order::take(10)->latest()->get() as $key => $order)
                                <tr>



                                    <td style="text-align: center">
                                        <p class="text-nowrap">{{ $order->order_number }}</p>
                                    </td>

                                    <td style="text-align: center"> <span class="badge bg-success text-nowrap"
                                            style="font-size: 16px">{{ number_format($order->product_total_price + $order->total_taxes_price) }}
                                            AED</span></td>

                                    <td style="text-align: center"> <span class="badge bg-info text-nowrap"
                                            style="font-size: 16px">{{ $order->payment_type }}</span>
                                    </td>

                                    <td style="text-align: center">

                                        @if ($order->user)
                                            <strong>


                                                <p class="text-nowrap"><i class="fas fa-user text-info"></i>
                                                    <a class="mx-1 text-info"
                                                        href="{{ route('admin.users.index', ['user_id' => $order->user->id]) }}">{{ $order->user->name }}</a>
                                                </p>
                                            </strong>
                                        @else
                                            <p class="text-nowrap"><i class="fas fa-user text-info"></i>
                                                {{ $order->customer_name }}
                                            </p>
                                        @endif
                                    </td>


                                    <td style="text-align: center">
                                        <p class="text-nowrap">
                                            {{ $order->created_at }}
                                        </p>
                                    </td>

                                    <td style="text-align: center">


                                        <div class="d-flex  align-items-center justify-content-center flex-md-nowrap">


                                            <div class="">
                                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Show Details">


                                                    <a class="btn btn-primary  m-1" style="font-size: 16px"
                                                        href="{{ route('admin.orders.show', $order->order_number) }}">
                                                        <span class="fas fa-eye "></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <div class="col-12 mb-4">
            <div class="card border-0 shadow">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="fs-5 fw-bold mb-0">Latest Orders</h2>
                        </div>

                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>

                                <th class="border-gray-200"style="text-align: center">Order Number</th>
                                <th class="border-gray-200"style="text-align: center">Total Price</th>
                                <th class="border-gray-200"style="text-align: center">Payment Type</th>
                                <th class="border-gray-200"style="text-align: center">User</th>
                                <th class="border-gray-200"style="text-align: center">Created At</th>
                                <th class="border-gray-200"style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($all_orders_tabel as $order)
                                <tr>
                                    <td style="text-align: center">
                                        <p class="text-nowrap">{{ $order->order_number }}</p>
                                    </td>

                                    <td style="text-align: center"> <span class="badge bg-success text-nowrap"
                                            style="font-size: 16px">{{ number_format($order->product_total_price + $order->total_taxes_price) }}
                                            AED</span></td>

                                    <td style="text-align: center"> <span class="badge bg-info text-nowrap"
                                            style="font-size: 16px">{{ $order->payment_type }}</span>
                                    </td>

                                    <td style="text-align: center">
                                        <p class="text-nowrap"><i class="fas fa-user text-info"></i>
                                            {{ $order->customer_name }}
                                        </p>
                                    </td>
                                    <td style="text-align: center">
                                        <p class="text-nowrap">
                                            {{ $order->created_at }}
                                        </p>
                                    </td>

                                    <td style="text-align: center">


                                        <div class="d-flex  align-items-center justify-content-center flex-md-nowrap">


                                            <div class="">
                                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Show Details">


                                                    <a class="btn btn-primary  m-1" style="font-size: 16px"
                                                        href="{{ route('admin.orders.show', $order->order_number) }}">
                                                        <span class="fas fa-eye "></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

    {{-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
    @if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin'))
        <div class="col-12 mb-4">
            <div class="card border-0 shadow">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="fs-5 fw-bold mb-0">Latest Hall Bookings</h2>
                        </div>

                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>

                                <th class="border-gray-200"style="text-align: center">Hall Name</th>
                                <th class="border-gray-200"style="text-align: center">Total Price</th>
                                <th class="border-gray-200"style="text-align: center">status</th>
                                <th class="border-gray-200"style="text-align: center">Created At</th>
                                <th class="border-gray-200"style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (App\Models\Hall_booking::take(10)->latest()->get() as $key => $boking)
                                <tr>



                                    <td style="text-align: center">
                                        <p class="text-nowrap">{{ $boking->hall->title_en }}</p>

                                        <p class="text-nowrap">{{ $boking->hall->title_ar }}</p>
                                    </td>



                                    <td style="text-align: center"> <span class="badge bg-success text-nowrap"
                                            style="font-size: 16px">{{ number_format($boking->total) }}
                                            AED</span></td>

                                    <td style="text-align: center"> <span class="badge bg-info text-nowrap"
                                            style="font-size: 16px">{{ $boking->status }}</span>
                                    </td>


                                    <td style="text-align: center">
                                        <p class="text-nowrap">
                                            {{ $boking->created_at }}
                                        </p>
                                    </td>

                                    <td style="text-align: center">


                                        <div class="d-flex  align-items-center justify-content-center flex-md-nowrap">


                                            <div class="">
                                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Show Details">


                                                    <a class="btn btn-primary  m-1" style="font-size: 16px"
                                                        href="{{ route('admin.bookings.show', $boking->id) }}">
                                                        <span class="fas fa-eye "></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <div class="col-12 mb-4">
            <div class="card border-0 shadow">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="fs-5 fw-bold mb-0">Latest Hall Bookings</h2>
                        </div>

                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>

                                <th class="border-gray-200"style="text-align: center">Hall Name</th>
                                <th class="border-gray-200"style="text-align: center">Total Price</th>
                                <th class="border-gray-200"style="text-align: center">status</th>
                                <th class="border-gray-200"style="text-align: center">Created At</th>
                                <th class="border-gray-200"style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (App\Models\Hall_booking::where('vendor_id', App\Models\Admin::where('id', Auth::guard('admin')->id())->first()->vendor->id)->take(10)->latest()->get() as $key => $boking)
                                <tr>



                                    <td style="text-align: center">
                                        <p class="text-nowrap">{{ $boking->hall->title_en }}</p>

                                        <p class="text-nowrap">{{ $boking->hall->title_ar }}</p>
                                    </td>



                                    <td style="text-align: center"> <span class="badge bg-success text-nowrap"
                                            style="font-size: 16px">{{ number_format($boking->total) }}
                                            AED</span></td>

                                    <td style="text-align: center"> <span class="badge bg-info text-nowrap"
                                            style="font-size: 16px">{{ $boking->status }}</span>
                                    </td>


                                    <td style="text-align: center">
                                        <p class="text-nowrap">
                                            {{ $boking->created_at }}
                                        </p>
                                    </td>

                                    <td style="text-align: center">


                                        <div class="d-flex  align-items-center justify-content-center flex-md-nowrap">


                                            <div class="">
                                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Show Details">


                                                    <a class="btn btn-primary  m-1" style="font-size: 16px"
                                                        href="{{ route('admin.bookings.show', $boking->id) }}">
                                                        <span class="fas fa-eye "></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

    {{-- latest orders --}}
>>>>>>> d36cbbda453e24bf36fa2ba7c87f57a3db5f1ab4
@endsection


@section('scripts')
<<<<<<< HEAD
<!-- ChartJS -->
{{-- <script src={{ asset('dashboard/js/plugin/Chart.min.js') }}></script> --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>
    // currentMonthIncomFromProducts
    let currentMonthIncomFromProductsCTX = document.getElementById("productsIncome");


    const currentMonthIncomFromProductsData = {
        labels: [
            @foreach ($ordersChart as $ocount)
                '{{ $ocount->date }}',
            @endforeach
        ],
        datasets: [{
            label: 'Count',
            data: [
                @foreach ($ordersChart as $ocount)
                    {{ $ocount->count }},
                @endforeach
            ],

            //   pointStyle: 'star',
            //   pointRadius: 10,
            //   pointHoverRadius: 15
        }]
    };

    const currentMonthIncomFromProductsConfig = {
        type: 'line',
        data: currentMonthIncomFromProductsData,
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: (currentMonthIncomFromProductsCTX) =>
                        'Current Month Total Orders Chart',
                }
            }
        }
    };

    new Chart(currentMonthIncomFromProductsCTX, currentMonthIncomFromProductsConfig);

    // currentMonthIncomFromProducts


    // currentMonthIncomFromBookings
    let currentMonthIncomFromBookingsCTX = document.getElementById("bookinksIncome");



    const currentMonthIncomFromBookingsData = {
        labels: ['1 Jan', '2 Jan', '3 Jan', '4 Jan', '5 Jan', '6 Jan', '7 Jan', '8 Jan', '9 Jan', '10 Jan',
            '11 Jan', '12 Jan', '13 Jan', '14 Jan', '15 Jan', '16 Jan', '17 Jan', '18 Jan', '19 Jan', '20 Jan',
            '21 Jan', '22 Jan', '23 Jan', '24 Jan', '25 Jan', '26 Jan', '27 Jan', '28 Jan', '29 Jan', '30 Jan'
        ],
        datasets: [{
            label: 'AED',
            data: ['30000', '50000', '80000', '20000', '20000', '10000', '20000', '18000', '11000', '29000',
                '11000', '23000', '10000', '90000', '29000', '35000', '3000', '30000', '50000', '80000',
                '20000', '20000', '10000', '20000', '18000', '11000', '29000', '11000', '23000',
                '10000', '90000', '29000', '35000', '3000'
            ],

            //   pointStyle: 'circle',
            //   pointRadius: 10,
            //   pointHoverRadius: 15,

            backgroundColor: [
                '#0d6efd',
                '#0dcaf0',
                '#2ecc71',
                '#dc3545',
            ]
        }]
    };
    const currentMonthIncomFromBookingsConfig = {
        type: 'line',
        data: currentMonthIncomFromBookingsData,
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: (currentMonthIncomFromBookingsCTX) =>
                        'Current Month Total Income From Bookings Is 1,110,500,00  AED',
                }
            }
        }
    };

    new Chart(currentMonthIncomFromBookingsCTX, currentMonthIncomFromBookingsConfig);

    // currentMonthIncomFromProducts




    // currentMonthOrders
    let currentMonthOrdersCTX = document.getElementById("ordersChart");

    const currentMonthOrdersConfig = {
        type: 'bar',
        data: currentMonthOrdersData,
        options: {
            responsive: true,
            plugins: {
                title: {


                    display: true,
                    text: (ctx) =>
                        'Total Orders Is @if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')){{ App\Models\Order::count() }} @else {{ App\Models\Order::whereIn('id', $getOrdersProducts)->count() }} @endif',
                }
            }
        }
    };

    new Chart(currentMonthOrdersCTX, currentMonthOrdersConfig);

    // currentMonthOrders
    // product chart

    let ctx3 = document.getElementById("productsChart");

    const data3 = {
        labels: ['In Stock', 'Out Of Stock', ],
        datasets: [{
            label: 'Products',
            data: [{{ $productsInStock }}, {{ $productsOutStock }}],

            pointStyle: 'circle',
            pointRadius: 10,
            pointHoverRadius: 15
        }]
    };
    const config3 = {
        type: 'pie',
        data: data3,
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: (ctx) => 'Total Products Is {{ $products }} Product ',
                }
            }
        }

    };
    new Chart(ctx3, config3);
    // product chart

    // ordersStatusChart


    let ctx4 = document.getElementById("ordersStatusChart");

    const data4 = {
        labels: ['pending', 'Inprogress', 'Delivered', 'Cancelled'],
        datasets: [{
            label: 'Order',
            data: [{{ $newOrdersCount }}, {{ $inprogressOrdersCount }}, {{ $deliveredOrdersCount }},
                {{ $cancelledOrdersCount }}
            ],

            pointStyle: 'circle',
            pointRadius: 10,
            pointHoverRadius: 15,
            backgroundColor: [
                '#0d6efd',
                '#0dcaf0',
                '#2ecc71',
                '#dc3545',
            ]

        }]
    };
    const config4 = {
        type: 'pie',
        data: data4,
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: (ctx) =>
                        'Total Orders Is @if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')){{ App\Models\Order::count() }} @else {{ App\Models\Order::whereIn('id', $getOrdersProducts)->count() }} @endif Order ',
                },

            }
        }

    };
    new Chart(ctx4, config4);

    // ordersStatusChart
</script>
=======
    <!-- ChartJS -->
    {{-- <script src={{ asset('dashboard/js/plugin/Chart.min.js') }}></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    {{-- sttart this month orders  --}}
    <script>
        let currentMonthOrdersCTX = document.getElementById("ordersChart");

        const currentMonthOrdersData = {
            labels: [
                @foreach ($ordersChart as $allorder)
                    '{{ $allorder->date }}',
                @endforeach
            ],
            datasets: [{
                label: 'Orders',
                data: [
                    @foreach ($ordersChart as $allorder)
                        {{ $allorder->count }},
                    @endforeach
                ],

                pointStyle: 'circle',
                pointRadius: 10,
                pointHoverRadius: 15
            }]
        };

        const currentMonthOrdersConfig = {
            type: 'bar',
            data: currentMonthOrdersData,
            options: {
                responsive: true,
                plugins: {
                    title: {


                        display: true,
                        text: (ctx) =>
                            'Total Orders Is {{ $ordersChart_count }}',
                    }
                }
            }
        };

        new Chart(currentMonthOrdersCTX, currentMonthOrdersConfig);
    </script>
    {{-- end this month orders  --}}

    {{-- sttart this month Hall Bookings  --}}
    <script>
        let currenMonthHaallBookingsCTX = document.getElementById("hallBookingschat");

        const currentMonthHallBookingsData = {
            labels: [
                @foreach ($hakl_bookings_Chart as $allorder)
                    '{{ $allorder->date }}',
                @endforeach
            ],
            datasets: [{
                label: 'Hall Bookings',
                data: [
                    @foreach ($hakl_bookings_Chart as $allorder)
                        {{ $allorder->count }},
                    @endforeach
                ],

                pointStyle: 'circle',
                pointRadius: 10,
                pointHoverRadius: 15
            }]
        };

        const currentMonthHallBookingsConfig = {
            type: 'bar',
            data: currentMonthHallBookingsData,
            options: {
                responsive: true,
                plugins: {
                    title: {


                        display: true,
                        text: (ctx) =>
                            'Total Hall Bookings Is {{ $hall_bookings_Chart_count }}',
                    }
                }
            }
        };

        new Chart(currenMonthHaallBookingsCTX, currentMonthHallBookingsConfig);
    </script>
    {{-- end this month Hall Bookings  --}}


    {{-- start all orderts Chart --}}
    <script>
        let currentMonthIncomFromProductsCTX = document.getElementById("productsIncome");


        const allOrdersData = {
            labels: [
                @foreach ($allordersChart as $allorder)
                    '{{ $allorder->date }}',
                @endforeach
            ],
            datasets: [{
                label: 'Orders',
                data: [
                    @foreach ($allordersChart as $allorder)
                        {{ $allorder->count }},
                    @endforeach
                ],

                pointStyle: 'circle',
                pointRadius: 10,
                pointHoverRadius: 15
            }]
        };

        const allOrdersConfig = {
            type: 'bar',
            data: allOrdersData,
            options: {
                responsive: true,
                plugins: {
                    title: {


                        display: true,
                        text: (ctx) =>
                            'Total Orders Is @if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')){{ App\Models\Order::count() }} @else {{ $all_order_vendor_count }}@endif',
                    }
                }
            }
        };

        new Chart(currentMonthIncomFromProductsCTX, allOrdersConfig);
    </script>
    {{-- end all orderts Chart --}}

    {{-- start all hall_boking Chart --}}
    <script>
        let hallBookingsCTX = document.getElementById("hallbokingschatt");


        const allbookingData = {
            labels: [
                @foreach ($all_hall_booking_Chart as $allorder)
                    '{{ $allorder->date }}',
                @endforeach
            ],
            datasets: [{
                label: 'Hall Bookings',
                data: [
                    @foreach ($all_hall_booking_Chart as $allorder)
                        {{ $allorder->count }},
                    @endforeach
                ],

                pointStyle: 'circle',
                pointRadius: 10,
                pointHoverRadius: 15
            }]
        };

        const bookingsConfig = {
            type: 'bar',
            data: allbookingData,
            options: {
                responsive: true,
                plugins: {
                    title: {


                        display: true,
                        text: (ctx) =>
                            'Total Hall Bookings Is @if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')) {{ App\Models\Hall_booking::count() }} @else {{ $all_hall_bookingcount }} @endif',
                    }
                }
            }
        };

        new Chart(hallBookingsCTX, bookingsConfig);
    </script>
    {{-- end all hall_booking Chart --}}


    <script>
        // currentMonthIncomFromProducts


        // currentMonthIncomFromProducts


        // currentMonthIncomFromBookings

        // let currentMonthIncomFromBookingsCTX = document.getElementById("bookinksIncome");



        // const currentMonthIncomFromBookingsData = {
        //     labels: ['1 Jan', '2 Jan', '3 Jan', '4 Jan', '5 Jan', '6 Jan', '7 Jan', '8 Jan', '9 Jan', '10 Jan',
        //         '11 Jan', '12 Jan', '13 Jan', '14 Jan', '15 Jan', '16 Jan', '17 Jan', '18 Jan', '19 Jan', '20 Jan',
        //         '21 Jan', '22 Jan', '23 Jan', '24 Jan', '25 Jan', '26 Jan', '27 Jan', '28 Jan', '29 Jan', '30 Jan'
        //     ],
        //     datasets: [{
        //         label: 'AED',
        //         data: ['30000', '50000', '80000', '20000', '20000', '10000', '20000', '18000', '11000', '29000',
        //             '11000', '23000', '10000', '90000', '29000', '35000', '3000', '30000', '50000', '80000',
        //             '20000', '20000', '10000', '20000', '18000', '11000', '29000', '11000', '23000',
        //             '10000', '90000', '29000', '35000', '3000'
        //         ],

        //         //   pointStyle: 'circle',
        //         //   pointRadius: 10,
        //         //   pointHoverRadius: 15,

        //         backgroundColor: [
        //             '#0d6efd',
        //             '#0dcaf0',
        //             '#2ecc71',
        //             '#dc3545',
        //         ]
        //     }]
        // };
        // const currentMonthIncomFromBookingsConfig = {
        //     type: 'line',
        //     data: currentMonthIncomFromBookingsData,
        //     options: {
        //         responsive: true,
        //         plugins: {
        //             title: {
        //                 display: true,
        //                 text: (currentMonthIncomFromBookingsCTX) =>
        //                     'Current Month Total Income From Bookings Is 1,110,500,00  AED',
        //             }
        //         }
        //     }
        // };

        // new Chart(currentMonthIncomFromBookingsCTX, currentMonthIncomFromBookingsConfig);

        // currentMonthIncomFromProducts




        // currentMonthOrders


        ///////////////////////////////start this month orders //////////////////////////////////////////////////////////


        ///////////////////////////////end this month orders ///////////////////////////////

        let ctx3 = document.getElementById("productsChart");

        const data3 = {
            labels: ['In Stock', 'Out Of Stock', ],
            datasets: [{
                label: 'Products',
                data: [{{ $productsInStock }}, {{ $productsOutStock }}],

                pointStyle: 'circle',
                pointRadius: 10,
                pointHoverRadius: 15
            }]
        };
        const config3 = {
            type: 'pie',
            data: data3,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: (ctx) => 'Total Products Is {{ $products }} Product ',
                    }
                }
            }

        };
        new Chart(ctx3, config3);


        let ctx14 = document.getElementById("hallbookingschart");

        const data33 = {
            labels: ['pending', 'success', 'cancelled', ],
            datasets: [{
                label: 'Products',
                data: [{{ $pending_bookings }}, {{ $success_bookings }}, {{ $cancelled_bookings }}],

                pointStyle: 'circle',
                pointRadius: 10,
                pointHoverRadius: 15
            }]
        };
        const config343 = {
            type: 'pie',
            data: data33,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: (ctx) => 'Total Products Is {{ $products }} Product ',
                    }
                }
            }

        };
        new Chart(ctx14, config343);
        // product chart

        // ordersStatusChart


        let ctx4 = document.getElementById("ordersStatusChart");

        const data4 = {
            labels: ['pending', 'Inprogress', 'Delivered', 'Cancelled'],
            datasets: [{
                label: 'Order',
                data: [{{ $newOrdersCount }}, {{ $inprogressOrdersCount }}, {{ $deliveredOrdersCount }},
                    {{ $cancelledOrdersCount }}
                ],

                pointStyle: 'circle',
                pointRadius: 10,
                pointHoverRadius: 15,
                backgroundColor: [
                    '#0d6efd',
                    '#0dcaf0',
                    '#2ecc71',
                    '#dc3545',
                ]

            }]
        };
        const config4 = {
            type: 'pie',
            data: data4,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: (ctx) =>
                            'Total Orders Is @if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')){{ App\Models\Order::count() }} @else {{ $all_order_vendor_count }} @endif',
                    },

                }
            }

        };
        new Chart(ctx4, config4);

        // ordersStatusChart
    </script>
>>>>>>> d36cbbda453e24bf36fa2ba7c87f57a3db5f1ab4
@endsection
