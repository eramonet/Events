@php
    $useradmin = App\Models\Admin::where('id', Auth::guard('admin')->id())->first();

    $current_login = Auth::guard('admin')->user()->vendor;

    $shippings = $current_login
        ? App\Models\Shipping::where('status', 1)
            ->where('admin_id', $current_login->id)
            ->count()
        : App\Models\Shipping::where('status', 1)->count();

    $promocode = $current_login ? App\Models\PromoCode::where('admin_id', $current_login->id)->count() : App\Models\PromoCode::count();

    $all_categories = $current_login
        ? \App\Models\ProductCategory::main()
            ->where('admin_id', $current_login->id)
            ->count()
        : //      +

        // \App\Models\ProductCategory::sub()
        //     ->where('admin_id', $current_login->id)
        //     ->count()
        \App\Models\ProductCategory::main()->count();
    // + \App\Models\ProductCategory::sub()->count()

    $main_categories = $current_login
        ? \App\Models\ProductCategory::main()
            ->where('admin_id', $current_login->id)
            ->count()
        : \App\Models\ProductCategory::main()->count();

    $sub_categories = $current_login
        ? \App\Models\ProductCategory::sub()
            ->where('admin_id', $current_login->id)
            ->count()
        : \App\Models\ProductCategory::sub()->count();

    $products = $current_login
        ? \App\Models\Product::where('admin_id', $current_login->id)
            ->accept()
            ->count()
        : \App\Models\Product::accept()->count();

    $in_stock = $current_login
        ? \App\Models\Product::where('admin_id', $current_login->id)
            ->inStock()
            ->count()
        : \App\Models\Product::accept()
            ->inStock()
            ->count();

    $out_stock = $current_login
        ? \App\Models\Product::where('admin_id', $current_login->id)
            ->outOfStock()
            ->count()
        : \App\Models\Product::accept()
            ->outOfStock()
            ->count();

    $accept_products = \App\Models\Product::accept()->count();

    $all_orders_count_for_vendor = 0;
    if ($current_login) {
        foreach (App\Models\Order::get() as $item) {
            foreach ($item->order_products as $order_product) {
                if ($order_product->vendor_id == $current_login->id) {
                    $all_orders_count_for_vendor++;
                }
            }
        }
    }

    $all_orders = $current_login ? $all_orders_count_for_vendor : App\Models\Order::count();

    $pending_orders_count = 0;
    if ($current_login) {
        foreach (App\Models\Order::pending() as $item) {
            foreach ($item->order_products as $order_product) {
                if ($order_product->vendor_id == $current_login->id) {
                    $pending_orders_count++;
                }
            }
        }
    }

    $pending_orders = $current_login ? $pending_orders_count : App\Models\Order::pending()->count();

    $in_progress_count = 0;
    if ($current_login) {
        foreach (App\Models\Order::inProgress() as $item) {
            foreach ($item->order_products as $order_product) {
                if ($order_product->vendor_id == $current_login->id) {
                    $in_progress_count++;
                }
            }
        }
    }

    $in_progress = $current_login ? $in_progress_count : App\Models\Order::inProgress()->count();

    $delivered_count = 0;
    if ($current_login) {
        foreach (App\Models\Order::delivered() as $item) {
            foreach ($item->order_products as $order_product) {
                if ($order_product->vendor_id == $current_login->id) {
                    $delivered_count++;
                }
            }
        }
    }

    $delivered = $current_login ? $delivered_count : App\Models\Order::delivered()->count();

    $canceled_counter = 0;
    if ($current_login) {
        foreach (App\Models\Order::canceled() as $item) {
            foreach ($item->order_products as $order_product) {
                if ($order_product->vendor_id == $current_login->id) {
                    $canceled_counter++;
                }
            }
        }
    }

    $canceled = $current_login ? $canceled_counter : App\Models\Order::canceled()->count();

    $colors = \App\Models\Color::count();

    $tax = $current_login ? App\Models\Tax::where('admin_id', $current_login->id)->count() : App\Models\Tax::count();

@endphp
<nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
    <a class="navbar-brand me-lg-5" href="../../index.html">
        <img class="navbar-brand-dark" src="{{ asset('uploads/app/logo.png') }}" alt="Volt logo" /> <img
            class="navbar-brand-light" src="../../assets/img/brand/dark.svg" alt="Volt logo" />
    </a>
    <div class="d-flex align-items-center">
        <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar
    style="
    max-width: 269px;
">
    <div class="sidebar-inner px-3 pt-3">
        <div
            class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
            <div class="d-flex align-items-center">
                <div class="avatar-lg me-4">
                    <img src="{{ asset('uploads/app/logo.png') }}" class="card-img-top rounded-circle border-white"
                        alt="Bonnie Green">
                </div>
                <div class="d-block">
                    <h2 class="h5 mb-3">Hi, {{ Auth::guard('admin')->user()->name }}</h2>

                </div>
            </div>
            <div class="collapse-close d-md-none">
                <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
                    aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation">
                    <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>
        <ul class="nav flex-column pt-3 pt-md-0">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link d-flex align-items-center">
                    <span class="sidebar-icon">
                        <img src="{{ asset('uploads/app/logo.png') }}" height="20" width="20" alt="Volt Logo">
                    </span>
                    <span class="mt-1 ms-1 sidebar-text">{{ Auth::guard('admin')->user()->roles[0]->name }}</span>
                </a>
            </li>

            <li class="nav-item    {{ Route::is('admin.dashboard') ? 'active' : '' }} ">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <span class="sidebar-icon">

                        <i class="fa-solid fa-house-chimney-crack icon icon-xs me-2"></i>

                    </span>
                    <span class="sidebar-text">Dashboard</span>
                </a>
            </li>

            @if (Auth::guard('admin')->user()->hasPermission('shippings-read'))
                <li class="nav-item {{ Route::is('admin.shippings.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.shippings.index') }}" class="nav-link ">
                        <span class="sidebar-icon">
                            <i class="fa-solid fa-truck-fast icon icon-xs me-2"></i>
                        </span>
                        <span class="sidebar-text">Shippings</span>
                        <span
                            style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                            {{ $shippings }}
                        </span>
                    </a>
                </li>
            @endif


            @if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin'))
                @if (Auth::guard('admin')->user()->hasPermission('digital_cart-read'))
                    <li class="nav-item {{ Route::is('admin.digital-cart.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.digital-cart.index') }}" class="nav-link ">
                            <span class="sidebar-icon">
                                <i class="fa-solid fa-truck-fast icon icon-xs me-2"></i>
                            </span>
                            <span class="sidebar-text">Digital Cards</span>
                            <span
                                style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                {{ App\Models\DigitalCard::count() }}
                            </span>
                        </a>
                    </li>
                @endif
            @endif

            @if ($useradmin->hasRole('super-admin'))
                <li class="nav-item {{ Route::is('admin.contact-messages.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.contact-messages.index') }}" class="nav-link ">
                        <span class="sidebar-icon">
                            <i class="fa-solid fa-list icon-xs me-2"></i>
                        </span>
                        <span class="sidebar-text">Contact Messages</span>
                        <span
                            style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                            {{ App\Models\ContactMessage::count() }}
                        </span>
                    </a>
                </li>
            @endif


            @if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin'))
                @if (Auth::guard('admin')->user()->hasPermission('with-darw-read'))
                    <li class="nav-item ">
                        <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                            data-bs-toggle="collapse" data-bs-target="#with_draw" aria-expanded="false">
                            <span>
                                <span class="sidebar-icon">
                                    <i class="fa-solid fa-cart-arrow-down icon-xs me-2"></i>
                                </span>
                                <span class="sidebar-text">With Draw
                                </span>
                            </span>
                            <span class="link-arrow">
                                <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </span>

                        <div class="multi-level collapse " role="list" id="with_draw" aria-expanded="true">
                            <ul class="flex-column nav">
                                <li class="nav-item">
                                    <a href="{{ route('admin.with-draw-request.send_to_vendor') }}"
                                        class="nav-link ">
                                        <!--<span class="sidebar-icon">-->
                                        <!--    <i class="fas fa-spinner icon icon-xs me-2 text-info"></i>-->
                                        <!--</span>-->
                                        <span class="sidebar-text"> Send To Vendor </span>

                                    </a>

                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admin.with-draw-request.all') }}" class="nav-link ">
                                        <span class="sidebar-text"> All WithDraw Transactions </span>
                                        <span
                                            style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                            {{ App\Models\WithDrawRequest::fromAdmin()->count() }}
                                        </span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admin.with-draw-request.from_you') }}" class="nav-link ">
                                        <span class="sidebar-text"> Withdraw Sent From you </span>
                                        <span
                                            style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                            {{ App\Models\WithDrawRequest::fromAdmin()->count() }}
                                        </span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admin.with-draw-request.to_you') }}" class="nav-link ">
                                        <!--<span class="sidebar-icon">-->
                                        <!--    <i class="fas fa-spinner icon icon-xs me-2 text-info"></i>-->
                                        <!--</span>-->
                                        <span class="sidebar-text"> Withdraw needed From you </span>
                                        <span
                                            style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                            {{ App\Models\WithDrawRequest::fromVendor()->count() }}
                                        </span>
                                    </a>
                                </li>



                            </ul>
                        </div>
                    </li>
                @endif
            @endif
            @if ($useradmin->hasRole('vendor-admin'))
                @if (Auth::guard('admin')->user()->hasPermission('with-darw-read'))
                <li class="nav-item ">
                    <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" data-bs-target="#with_draw_vendor" aria-expanded="false">
                        <span>
                            <span class="sidebar-icon">
                                <i class="fa-solid fa-cart-arrow-down icon-xs me-2"></i>
                            </span>
                            <span class="sidebar-text">With Draw
                            </span>
                        </span>
                        <span class="link-arrow">
                            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </span>

                    <div class="multi-level collapse " role="list" id="with_draw_vendor" aria-expanded="true">
                        <ul class="flex-column nav">

                            <li class="nav-item">
                                <a href="{{ route('admin.with-draw-request.send_request') }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fas fa-spinner icon icon-xs me-2 text-info"></i>
                                    </span>
                                    <span class="sidebar-text"> Send Request </span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.with-draw-request.withdraw_requests', 'new') }}"
                                    class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fas fa-spinner icon icon-xs me-2 text-info"></i>
                                    </span>
                                    <span class="sidebar-text"> New Requests </span>

                                    <span
                                        style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                        {{ App\Models\WithDrawRequest::where('vendor_id', Auth::guard('admin')->user()->vendor->id)->fromVendor()->new()->count() }}
                                    </span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.with-draw-request.withdraw_requests', 'accepted') }}"
                                    class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fas fa-spinner icon icon-xs me-2 text-info"></i>
                                    </span>
                                    <span class="sidebar-text"> Success Requests </span>
                                    <span
                                        style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                        {{ App\Models\WithDrawRequest::where('vendor_id', Auth::guard('admin')->user()->vendor->id)->fromAdmin()->accepted()->count() }}
                                    </span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.with-draw-request.withdraw_requests', 'rejected') }}"
                                    class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fas fa-spinner icon icon-xs me-2 text-info"></i>
                                    </span>
                                    <span class="sidebar-text"> Rejected Requests </span>
                                    <span
                                        style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                        {{ App\Models\WithDrawRequest::where('vendor_id', Auth::guard('admin')->user()->vendor->id)->fromVendor()->rejected()->count() }}
                                    </span>
                                </a>
                            </li>



                        </ul>
                    </div>
                </li>
                @endif
            @endif

            {{-- promo-codes --}}

            @if (Auth::guard('admin')->user()->hasPermission('promo-codes-read'))
                <li class="nav-item {{ Route::is('admin.promo-codes.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.promo-codes.index') }}" class="nav-link ">
                        <span class="sidebar-icon">
                            <i class="fa-solid fa-gifts icon icon-xs me-2"></i>
                        </span>
                        <span class="sidebar-text">Promo Codes</span>
                        <span
                            style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                            {{ $promocode }}
                        </span>
                    </a>
                </li>
            @endif
            {{-- promo-codes --}}

            {{-- vendors --}}

            @if (Auth::guard('admin')->user()->hasPermission('vendors-read'))
                <li class="nav-item {{ Route::is('admin.vendors.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.vendors.index') }}" class="nav-link ">
                        <span class="sidebar-icon">
                            <i class="fas fa-toolbox icon icon-xs me-2"></i>
                        </span>
                        <span class="sidebar-text">Vendors</span>
                        <span
                            style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                            {{ \App\Models\Vendor::count() }}
                        </span>
                    </a>
                </li>
            @endif

            {{-- vendors --}}

            {{-- Products Categories --}}

            @if (Auth::guard('admin')->user()->hasPermission('products-categories-read'))
                <li class="nav-item ">
                    <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" data-bs-target="#product_categories"
                        aria-expanded="{{ Route::is('admin.products-categories.*') ? 'true' : 'false' }}">
                        <span>
                            <span class="sidebar-icon">
                                <i class="fa-solid fa-list icon-xs me-2"></i>
                            </span>
                            <span class="sidebar-text">Products Categories</span>
                            <span
                                style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                {{ $all_categories }}
                            </span>
                        </span>
                        <span class="link-arrow">
                            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </span>

                    <div class="multi-level collapse {{ Route::is('admin.products-categories.*') ? 'show' : '' }}"
                        role="list" id="product_categories" aria-expanded="true">
                        <ul class="flex-column nav">



                            <li
                                class="nav-item  {{ Route::is('admin.products-categories.*') && request()->type && request()->type == 'main' ? 'active' : '' }}">
                                <a href="{{ route('admin.products-categories.index', ['type' => 'main']) }}"
                                    class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text">Categories</span>
                                    <span
                                        style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                        {{ $main_categories }}
                                    </span>
                                </a>
                            </li>


                            {{-- <li
                                class="nav-item  {{ Route::is('admin.products-categories.*') && request()->type && request()->type == 'sub' ? 'active' : '' }}">
                                <a href="{{ route('admin.products-categories.index', ['type' => 'sub']) }}"
                                    class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text"> Sub Categories</span>
                                    <span
                                        style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                        {{ $sub_categories }}
                                    </span>
                                </a>
                            </li> --}}




                        </ul>
                    </div>
                </li>
            @endif

            {{-- Products Categories --}}

            @if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin'))
                <li class="nav-item ">
                    <a href="{{ route('admin.occasion.index') }}" class="nav-link ">
                        <span class="sidebar-icon">
                            <i class="far fa-file-alt icon icon-xs me-2"></i>
                        </span>
                        <span class="sidebar-text"> Occasions</span>
                        <span
                            style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                            {{ \App\Models\Occasion::count() }}
                        </span>
                    </a>
                </li>
            @endif

            {{-- test --}}

            {{-- Products  --}}
            @if (Auth::guard('admin')->user()->vendor)
                @if (Auth::guard('admin')->user()->vendor->type == 'product' ||
                        Auth::guard('admin')->user()->vendor->type == 'product_hall')

                    @if (Auth::guard('admin')->user()->hasPermission('products-read'))
                        <li class="nav-item ">
                            <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                                data-bs-toggle="collapse" data-bs-target="#products"
                                aria-expanded="{{ Route::is('admin.products.*') ? 'true' : 'false' }}">
                                <span>
                                    <span class="sidebar-icon">
                                        <i class="fa-sharp fa-solid fa-bag-shopping icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text">Products </span>
                                    <span
                                        style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                        {{ $products }}
                                    </span>
                                </span>
                                <span class="link-arrow">
                                    <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </span>

                            <div class="multi-level collapse {{ Route::is('admin.products.*') ? 'show' : '' }}"
                                role="list" id="products" aria-expanded="true">
                                <ul class="flex-column nav">
                                    <li
                                        class="nav-item  {{ (Route::is('admin.products.*') && !request()->type) || (request()->type != 'in-stock' && request()->type != 'out-of-stock') ? 'active' : '' }}">
                                        <a href="{{ route('admin.products.index', ['type' => 'all']) }}"
                                            class="nav-link ">
                                            <span class="sidebar-icon">
                                                <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                            </span>
                                            <span class="sidebar-text">All Products</span>
                                            <span
                                                style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                                {{ $products }}
                                            </span>
                                        </a>
                                    </li>
                                    <li
                                        class="nav-item  {{ Route::is('admin.products.*') && request()->type && request()->type == 'in-stock' ? 'active' : '' }}">
                                        <a href="{{ route('admin.products.index', ['type' => 'in-stock']) }}"
                                            class="nav-link ">
                                            <span class="sidebar-icon">
                                                <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                            </span>
                                            <span class="sidebar-text">In Stock</span>
                                            <span
                                                style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                                {{ $in_stock }}
                                            </span>
                                        </a>
                                    </li>
                                    <li
                                        class="nav-item  {{ Route::is('admin.products.*') && request()->type && request()->type == 'out-of-stock' ? 'active' : '' }}">
                                        <a href="{{ route('admin.products.index', ['type' => 'out-of-stock']) }}"
                                            class="nav-link ">
                                            <span class="sidebar-icon">
                                                <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                            </span>
                                            <span class="sidebar-text"> Out Of Stock</span>
                                            <span
                                                style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                                {{ $out_stock }}
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif

                @endif
            @else
                @if (Auth::guard('admin')->user()->hasPermission('products-read'))
                    <li class="nav-item ">
                        <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                            data-bs-toggle="collapse" data-bs-target="#products"
                            aria-expanded="{{ Route::is('admin.products.*') ? 'true' : 'false' }}">
                            <span>
                                <span class="sidebar-icon">
                                    <i class="fa-sharp fa-solid fa-bag-shopping icon-xs me-2"></i>
                                </span>
                                <span class="sidebar-text">Products </span>
                                <span
                                    style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                    {{ $products }}
                                </span>
                            </span>
                            <span class="link-arrow">
                                <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </span>

                        <div class="multi-level collapse {{ Route::is('admin.products.*') ? 'show' : '' }}"
                            role="list" id="products" aria-expanded="true">
                            <ul class="flex-column nav">
                                <li
                                    class="nav-item  {{ (Route::is('admin.products.*') && !request()->type) || (request()->type != 'in-stock' && request()->type != 'out-of-stock') ? 'active' : '' }}">
                                    <a href="{{ route('admin.products.index', ['type' => 'all']) }}"
                                        class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text">All Products</span>
                                        <span
                                            style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                            {{ $accept_products }}
                                        </span>
                                    </a>
                                </li>
                                <li
                                    class="nav-item  {{ Route::is('admin.products.*') && request()->type && request()->type == 'in-stock' ? 'active' : '' }}">
                                    <a href="{{ route('admin.products.index', ['type' => 'in-stock']) }}"
                                        class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text">In Stock</span>
                                        <span
                                            style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                            {{ $in_stock }}
                                        </span>
                                    </a>
                                </li>
                                <li
                                    class="nav-item  {{ Route::is('admin.products.*') && request()->type && request()->type == 'out-of-stock' ? 'active' : '' }}">
                                    <a href="{{ route('admin.products.index', ['type' => 'out-of-stock']) }}"
                                        class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text"> Out Of Stock</span>
                                        <span
                                            style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                            {{ $out_stock }}
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
            @endif
            {{-- Products  --}}

            @if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin'))

                @if (Auth::guard('admin')->user()->hasPermission('product_request-read'))
                    <li class="nav-item ">
                        <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                            data-bs-toggle="collapse" data-bs-target="#products_reqests"
                            aria-expanded="{{ Route::is('admin.products.*') ? 'true' : 'false' }}">
                            <span>
                                <span class="sidebar-icon">
                                    <i class="fa-sharp fa-solid fa-bag-shopping icon-xs me-2"></i>
                                </span>
                                <span class="sidebar-text">Products Requests </span>
                                <span
                                    style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                    {{ \App\Models\Product::new()->count() }}
                                </span>
                            </span>
                            <span class="link-arrow">
                                <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </span>

                        <div class="multi-level collapse" role="list" id="products_reqests" aria-expanded="true">
                            <ul class="flex-column nav">
                                <li class="nav-item">

                                    <a href="{{ route('admin.product_request.product_request', 'new') }}"
                                        class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text">New</span>
                                        <span
                                            style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">

                                            {{ \App\Models\Product::new()->Where('accept', 'new')->count() }}
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="{{ route('admin.product_request.product_request', 'accepted') }}"
                                        class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text">Accepted</span>
                                        <span
                                            style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                            {{ \App\Models\Product::accept()->count() }}
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="{{ route('admin.product_request.product_request', 'rejected') }}"
                                        class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text">Rejected</span>
                                        <span
                                            style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                            {{ \App\Models\Product::reject()->count() }}
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif

            @endif


            @if (Auth::guard('admin')->user()->hasPermission('orders-read'))
                <li class="nav-item ">
                    <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" data-bs-target="#orders" aria-expanded="false">
                        <span>
                            <span class="sidebar-icon">
                                <i class="fa-solid fa-cart-arrow-down icon-xs me-2"></i>
                            </span>
                            <span class="sidebar-text">Products Orders
                                @if (auth()->guard('admin')->user()->getRoles()[0] != 'vendor-admin')
                                    <span
                                        style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                        {{ $all_orders }}
                                    </span>
                                @else
                                    <span
                                        style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                        {{ $all_orders }}
                                    </span>
                                @endif
                            </span>
                        </span>
                        <span class="link-arrow">
                            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </span>

                    <div class="multi-level collapse " role="list" id="orders" aria-expanded="true">
                        <ul class="flex-column nav">
                            <li class="nav-item">
                                <a href="{{ route('admin.orders.newOrders', 'new') }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="far fa-plus-square icon icon-xs me-2 text-warning"></i>
                                    </span>
                                    <span class="sidebar-text">New Orders </span>
                                    @if (auth()->guard('admin')->user()->getRoles()[0] != 'vendor-admin')
                                        <span
                                            style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                            {{ $pending_orders }}
                                        </span>
                                    @else
                                        <span
                                            style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                            {{ $pending_orders }}
                                        </span>
                                    @endif


                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.orders.inprogressOrders', 'inprogress') }}"
                                    class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fas fa-spinner icon icon-xs me-2 text-info"></i>
                                    </span>
                                    <span class="sidebar-text"> Inprogress Orders </span>
                                    @if (auth()->guard('admin')->user()->getRoles()[0] != 'vendor-admin')
                                        <span
                                            style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                            {{ $in_progress }}
                                        </span>
                                    @else
                                        <span
                                            style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                            {{ $in_progress }}
                                        </span>
                                    @endif
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.orders.deliveredOrders', 'delivered') }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fas fa-check-double icon icon-xs me-2 text-success"></i>
                                    </span>
                                    <span class="sidebar-text"> Delivered Orders </span>
                                    @if (auth()->guard('admin')->user()->getRoles()[0] != 'vendor-admin')
                                        <span
                                            style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                            {{ $delivered }}
                                        </span>
                                    @else
                                        <span
                                            style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                            {{ $delivered }}
                                        </span>
                                    @endif
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="{{ route('admin.orders.cancelledOrders', 'cancelled') }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fas fa-window-close icon icon-xs me-2 text-danger"></i>
                                    </span>
                                    <span class="sidebar-text"> Cancelled Orders </span>
                                    @if (auth()->guard('admin')->user()->getRoles()[0] != 'vendor-admin')
                                        <span
                                            style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                            {{ $canceled }}
                                        </span>
                                    @else
                                        <span
                                            style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                            {{ $canceled }}
                                        </span>
                                    @endif
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif

            {{-- Halls  --}}
            {{-- @if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')) --}}


            @if (Auth::guard('admin')->user()->vendor)

                @if (Auth::guard('admin')->user()->vendor->type == 'hall' ||
                        Auth::guard('admin')->user()->vendor->type == 'product_hall')

                    @if (Auth::guard('admin')->user()->hasPermission('halls-read'))

                        <li class="nav-item ">
                            <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                                data-bs-toggle="collapse" data-bs-target="#halls"
                                aria-expanded="{{ Route::is('admin.halls.') ? 'true' : 'false' }}">
                                <span>
                                    <span class="sidebar-icon">
                                        <i class="fa-solid fa-wand-sparkles icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text">Halls</span>
                                    <span
                                        style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                        {{ \App\Models\Hall::count() }}
                                    </span>
                                </span>
                                <span class="link-arrow">
                                    <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </span>

                            <div class="multi-level collapse {{ Route::is('admin.halls-categories.') || Route::is('admin.halls.') ? 'show' : '' }}"
                                role="list" id="halls" aria-expanded="true">
                                <ul class="flex-column nav">





                                    {{-- halls --}}

                                    @if (Auth::guard('admin')->user()->hasPermission('halls-read'))
                                        <li class="nav-item {{ Route::is('admin.halls.*') ? 'active' : '' }}">
                                            <a href="{{ route('admin.halls.index') }}" class="nav-link ">
                                                <span class="sidebar-icon">
                                                    <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                                </span>
                                                <span class="sidebar-text"> All Halls </span>
                                                <span
                                                    style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                                    {{ \App\Models\Hall::count() }}
                                                </span>
                                            </a>
                                        </li>
                                    @endif
                                    {{-- halls --}}




                                </ul>
                            </div>
                        </li>


                    @endif
                @endif
            @else
                @if (Auth::guard('admin')->user()->hasPermission('halls-read'))

                    <li class="nav-item ">
                        <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                            data-bs-toggle="collapse" data-bs-target="#halls"
                            aria-expanded=" Route::is('admin.halls.') ? 'true' : 'false' }}">
                            <span>
                                <span class="sidebar-icon">
                                    <i class="fa-solid fa-wand-sparkles icon-xs me-2"></i>
                                </span>
                                <span class="sidebar-text">Halls</span>
                                <span
                                    style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                    {{ \App\Models\Hall::count() }}
                                </span>
                            </span>
                            <span class="link-arrow">
                                <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </span>

                        <div class="multi-level collapse {{ Route::is('admin.halls.') ? 'show' : '' }}"
                            role="list" id="halls" aria-expanded="true">
                            <ul class="flex-column nav">
                                @if (Auth::guard('admin')->user()->hasPermission('halls-read'))
                                    <li class="nav-item {{ Route::is('admin.halls.*') ? 'active' : '' }}">
                                        <a href="{{ route('admin.halls.index') }}" class="nav-link ">
                                            <span class="sidebar-icon">
                                                <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                            </span>
                                            <span class="sidebar-text"> All Halls </span>
                                            <span
                                                style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                                {{ \App\Models\Hall::count() }}
                                            </span>
                                        </a>
                                    </li>
                                @endif

                                <li class="nav-item">
                                    <a href="{{ route('admin.packages.index') }}" class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text">Halls Packages </span>
                                        <span
                                            style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                            {{ \App\Models\Package::count() }}
                                        </span>
                                    </a>
                                </li>

                                @if (Auth::guard('admin')->user()->hasPermission('packages-options-categories-read'))
                                    <li
                                        class="nav-item {{ Route::is('admin.packages-options-categories.*') ? 'active' : '' }}">
                                        <a href="{{ route('admin.packages-options-categories.index') }}"
                                            class="nav-link ">
                                            <span class="sidebar-icon">
                                                <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                            </span>
                                            <span class="sidebar-text"> Extra Decorations</span>
                                            <span
                                                style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                                {{ \App\Models\PackageOptionCategory::count() }}
                                            </span>

                                        </a>
                                    </li>
                                @endif

                                @if (Auth::guard('admin')->user()->hasPermission('packages-options-read'))
                                    <li class="nav-item {{ Route::is('admin.packages-options.*') ? 'active' : '' }}">
                                        <a href="{{ route('admin.packages-options.index') }}" class="nav-link ">
                                            <span class="sidebar-icon">
                                                <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                            </span>
                                            <span class="sidebar-text"> Options </span>
                                        </a>
                                    </li>
                                @endif

                                @if (Auth::guard('admin')->user()->hasPermission('packages-available-dates-and-times-read'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.availabel_date.index') }}" class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text">Available Dates</span>
                                        <span
                                            style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                            {{ \App\Models\Available_date::count() }}
                                        </span>

                                    </a>
                                </li>
                            @endif

                            </ul>
                        </div>
                    </li>



                @endif
            @endif





            @if (Auth::guard('admin')->user()->hasPermission('bookings-read'))
                <li class="nav-item ">
                    <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" data-bs-target="#booking" aria-expanded="false">
                        <span>
                            <span class="sidebar-icon">
                                <i class="fa-solid fa-lines-leaning icon-xs me-2"></i>
                            </span>
                            <span class="sidebar-text">Halls Bookings</span>
                            <span
                                style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                {{ \App\Models\Hall_booking::count() }}
                            </span>

                        </span>
                        <span class="link-arrow">
                            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </span>

                    <div class="multi-level collapse " role="list" id="booking" aria-expanded="true">
                        <ul class="flex-column nav">


                            <li class="nav-item">
                                <a href="{{ route('admin.hall-booking.pendingBookings') }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular text-success fa-circle-check icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text">New Bookings </span>
                                    <span
                                        style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                        {{ \App\Models\Hall_booking::pending()->count() }}
                                    </span>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="{{ route('admin.hall-booking.successfullBookings') }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular text-success fa-circle-check icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text">SuccessFull Bookings </span>
                                    <span
                                        style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                        {{ \App\Models\Hall_booking::successfull()->count() }}
                                    </span>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="{{ route('admin.hall-booking.cancelledBookings') }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle-xmark text-danger icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text"> Cancelled Bookings</span>
                                    <span
                                        style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                        {{ \App\Models\Hall_booking::canceled()->count() }}
                                    </span>
                                </a>
                            </li>


                        </ul>
                    </div>
                </li>
            @endif

            @if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin'))

                @if (Auth::guard('admin')->user()->hasPermission('hall_request-read'))
                    <li class="nav-item ">
                        <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                            data-bs-toggle="collapse" data-bs-target="#hall_reqests"
                            aria-expanded="{{ Route::is('admin.products.*') ? 'true' : 'false' }}">
                            <span>
                                <span class="sidebar-icon">
                                    <i class="fa-sharp fa-solid fa-bag-shopping icon-xs me-2"></i>
                                </span>
                                <span class="sidebar-text">Hall Requests </span>
                                <span
                                    style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                    {{ \App\Models\Hall::count() }}
                                </span>
                            </span>
                            <span class="link-arrow">
                                <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </span>

                        <div class="multi-level collapse" role="list" id="hall_reqests" aria-expanded="true">
                            <ul class="flex-column nav">
                                <li class="nav-item">

                                    <a href="{{ route('admin.hall_request.hall_request', 'new') }}"
                                        class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text">New</span>
                                        <span
                                            style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">

                                            {{ \App\Models\Hall::Where('accept', 'new')->count() }}
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="{{ route('admin.hall_request.hall_request', 'accepted') }}"
                                        class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text">Accepted</span>
                                        <span
                                            style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                            {{ \App\Models\Hall::Where('accept', 'accepted')->count() }}
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="{{ route('admin.hall_request.hall_request', 'rejected') }}"
                                        class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text">Rejected</span>
                                        <span
                                            style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                            {{ \App\Models\Hall::Where('accept', 'rejected')->count() }}
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif

            @endif


            @if (Auth::guard('admin')->user()->hasPermission('become_vendor-read'))
                @if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin'))
                    <li class="nav-item ">
                        <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                            data-bs-toggle="collapse" data-bs-target="#become_vendor"
                            aria-expanded="{{ Route::is('admin.become.index', 'pending') ? 'true' : 'false' }}">
                            <span>
                                <span class="sidebar-icon">
                                    <i class="fa-solid fa-list icon-xs me-2"></i>
                                </span>
                                <span class="sidebar-text">Become Vendor</span>
                                <span
                                    style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                    {{ App\Models\Become_vendor::count() }}
                                </span>
                            </span>
                            <span class="link-arrow">
                                <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </span>

                        <div class="multi-level collapse {{ Route::is('admin.become.index', 'pending') ? 'show' : '' }}"
                            role="list" id="become_vendor" aria-expanded="true">
                            <ul class="flex-column nav">



                                <li
                                    class="nav-item  {{ Route::is('admin.become.index', 'pending') && request()->type && request()->type == 'main' ? 'active' : '' }}">
                                    <a href="{{ route('admin.become.index', 'pending') }}" class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text">Pending</span>

                                        <span
                                            style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                            {{ App\Models\Become_vendor::where('status', 'pending')->count() }}
                                        </span>
                                    </a>
                                </li>

                                <li
                                    class="nav-item  {{ Route::is('admin.become', 'accepted') && request()->type && request()->type == 'main' ? 'active' : '' }}">
                                    <a href="{{ route('admin.become.index', 'accepted') }}" class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text">Accepted</span>
                                        <span
                                            style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                            {{ App\Models\Become_vendor::where('status', 'accepted')->count() }}
                                        </span>

                                    </a>
                                </li>

                                <li
                                    class="nav-item  {{ Route::is('admin.become', 'canceled') && request()->type && request()->type == 'main' ? 'active' : '' }}">
                                    <a href="{{ route('admin.become.index', 'canceled') }}" class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text">Rejected</span>
                                        <span
                                            style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                            {{ App\Models\Become_vendor::where('status', 'canceled')->count() }}
                                        </span>

                                    </a>
                                </li>





                            </ul>
                        </div>
                    </li>
                @endif
            @endif

            @if (Auth::guard('admin')->user()->hasPermission('reports-read'))
                <li class="nav-item ">
                    <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" data-bs-target="#reports" aria-expanded="false">
                        <span>
                            <span class="sidebar-icon">
                                <i class="fa-solid fa-chart-line icon-xs me-2"></i>
                            </span>
                            <span class="sidebar-text">Reports</span>
                        </span>
                        <span class="link-arrow">
                            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </span>

                    <div class="multi-level collapse " role="list" id="reports" aria-expanded="true">
                        <ul class="flex-column nav">
                            @if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.reports.registered-users') }}" class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text">Registered users</span>
                                    </a>
                                </li>
                            @endif
                            @if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.reports.area-users') }}" class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text">Area users</span>
                                    </a>
                                </li>
                            @endif
                            @if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.reports.gender-users') }}" class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text">Gender users</span>
                                    </a>
                                </li>
                            @endif
                            @if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.reports.area-statistics') }}" class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text">Area Statistics</span>
                                    </a>
                                </li>
                            @endif

                            <li class="nav-item">
                                <a href="{{ route('admin.reports.orders-statistics') }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text">Orders Statistics</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.reports.orders-reports') }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text">Orders Report</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.reports.orders-areas') }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text">Orders areas</span>
                                </a>
                            </li>
                            @if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.reports.halls-statistics') }}" class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text">Halls Statistics</span>
                                    </a>
                                </li>
                            @endif
                            @if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.reports.halls-reports') }}" class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text">Halls Reports</span>
                                    </a>
                                </li>
                            @endif

                            @if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.reports.registered-vendors-statistics') }}"
                                        class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text">Registered vendors</span>
                                    </a>
                                </li>
                            @endif

                            @if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.reports.vendors-areas') }}" class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text">Vendors according to <br>areas</span>
                                    </a>
                                </li>
                            @endif

                            @if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.reports.vendors-areas') }}" class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text">Vendors According to <br>Areas</span>
                                    </a>
                                </li>
                            @endif


                            <li class="nav-item">
                                <a href="{{ route('admin.reports.products-statistics') }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text">Product statistics based <br>on categories)<br>Main
                                        category –
                                        Sub category)
                                    </span>
                                </a>
                            </li>



                        </ul>
                    </div>
                </li>
            @endif
            {{-- test --}}

            @if (Auth::guard('admin')->user()->hasPermission('colors-read'))
                <li class="nav-item ">
                    <a href="{{ route('admin.colors.index') }}" class="nav-link ">
                        <span class="sidebar-icon">
                            <i class="far fa-file-alt icon icon-xs me-2"></i>
                        </span>
                        <span class="sidebar-text">Colors</span>
                        <span
                            style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                            {{ $colors }}
                        </span>
                    </a>
                </li>
            @endif

            @if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin'))
                @if (Auth::guard('admin')->user()->hasPermission('ads-read'))
                    <li class="nav-item ">
                        <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                            data-bs-toggle="collapse" data-bs-target="#advertisements"
                            aria-expanded="{{ Route::is('admin.countries.') || Route::is('admin.cities.') || Route::is('admin.regions.*') ? 'true' : 'false' }}">
                            <span>
                                <span class="sidebar-icon">
                                    <i class="fa-solid fa-map-location-dot icon icon-xs me-2"></i>
                                </span>
                                <span class="sidebar-text">Advertisements</span>
                                <span
                                    style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                    {{ App\Models\Advertisement::count() }}
                                </span>
                            </span>
                            <span class="link-arrow">
                                <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </span>

                        <div class="multi-level collapse {{ Route::is('admin.countries.') || Route::is('admin.cities.') || Route::is('admin.regions.*') ? 'show' : '' }} "
                            role="list" id="advertisements" aria-expanded="true">
                            <ul class="flex-column nav">



                                @if (Auth::guard('admin')->user()->hasPermission('settings-read'))
                                    <li class="nav-item {{ Route::is('admin.countries.*') ? 'active' : '' }}">
                                        <a href="{{ route('admin.advertisements.outer_clients') }}"
                                            class="nav-link ">
                                            <span class="sidebar-icon">
                                                <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                            </span>
                                            <span class="sidebar-text"> Outer Clients</span>
                                            <span
                                                style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                                {{ App\Models\OuterClients::count() }}
                                            </span>
                                        </a>
                                    </li>
                                @endif

                                @if (Auth::guard('admin')->user()->hasPermission('settings-read'))
                                    <li class="nav-item {{ Route::is('admin.countries.*') ? 'active' : '' }}">
                                        <a href="{{ route('admin.advertisements.advertisements') }}"
                                            class="nav-link ">
                                            <span class="sidebar-icon">
                                                <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                            </span>
                                            <span class="sidebar-text"> All Ads</span>
                                            <span
                                                style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                                {{ App\Models\Advertisement::count() }}
                                            </span>
                                        </a>
                                    </li>
                                @endif


                                @if (Auth::guard('admin')->user()->hasPermission('settings-read'))
                                    <li class="nav-item {{ Route::is('admin.countries.*') ? 'active' : '' }}">
                                        <a href="{{ route('admin.advertisements.clients_ads') }}" class="nav-link ">
                                            <span class="sidebar-icon">
                                                <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                            </span>
                                            <span class="sidebar-text"> All Clients Ads</span>
                                            <span
                                                style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                                {{ App\Models\ClientsAd::count() }}
                                            </span>
                                        </a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </li>

                @endif
            @endif

            @if ($useradmin->hasRole('vendor-admin'))
                @if (Auth::guard('admin')->user()->hasPermission('my-advertisements-read'))
                    <li class="nav-item ">
                        <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                            data-bs-toggle="collapse" data-bs-target="#myadvertisements"
                            aria-expanded="{{ Route::is('admin.countries.') || Route::is('admin.cities.') || Route::is('admin.regions.*') ? 'true' : 'false' }}">
                            <span>
                                <span class="sidebar-icon">
                                    <i class="fa-solid fa-map-location-dot icon icon-xs me-2"></i>
                                </span>
                                <span class="sidebar-text">My Advertisements</span>
                                <span
                                    style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                    {{ App\Models\ClientsAd::where([
                                        ['client_id', Auth::guard('admin')->user()->vendor->id],
                                        ['client_type', 'inner'],
                                    ])->count() }}
                                </span>

                            </span>
                            <span class="link-arrow">
                                <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </span>

                        <div class="multi-level collapse {{ Route::is('admin.countries.') || Route::is('admin.cities.') || Route::is('admin.regions.*') ? 'show' : '' }} "
                            role="list" id="myadvertisements" aria-expanded="true">
                            <ul class="flex-column nav">



                                {{-- @if (Auth::guard('admin')->user()->hasPermission('settings-read')) --}}
                                <li class="nav-item {{ Route::is('admin.countries.*') ? 'active' : '' }}">
                                    <a href="{{ route('admin.advertisements.vendor_show_advertisements') }}"
                                        class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text"> Advertisements</span>
                                        <span
                                            style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                            {{ App\Models\ClientsAd::where([
                                                ['client_id', Auth::guard('admin')->user()->vendor->id],
                                                ['client_type', 'inner'],
                                            ])->count() }}
                                        </span>
                                    </a>
                                </li>
                                {{-- @endif --}}

                            </ul>
                        </div>
                    </li>
                @endif
            @endif

            {{-- taxes --}}
            @if (Auth::guard('admin')->user()->hasPermission('taxes-read'))
                <li class="nav-item {{ Route::is('admin.taxes.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.taxes.index') }}" class="nav-link ">
                        <span class="sidebar-icon">
                            <i class="fa-solid fa-money-bill-wheat icon icon-xs me-2"></i>
                        </span>
                        <span class="sidebar-text">Taxes</span>
                        <span
                            style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                            {{ $tax }}
                        </span>
                    </a>
                </li>
            @endif
            {{-- taxes --}}
            {{-- users --}}


            @if (Auth::guard('admin')->user()->hasPermission('users-read'))
                <li class="nav-item {{ Route::is('admin.users.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.users.index') }}" class="nav-link ">
                        <span class="sidebar-icon">
                            <i class="fa-solid fa-users icon icon-xs me-2"></i>
                        </span>
                        <span class="sidebar-text">Users Management</span>
                    </a>
                </li>
            @endif

            {{-- users --}}






            {{-- admin-management --}}
            {{-- @if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')) --}}
            @if (Auth::guard('admin')->user()->hasPermission('vendor-admins-read'))
                <li class="nav-item ">
                    <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" data-bs-target="#admin-management"
                        aria-expanded="{{ Route::is('admin.admin-categories.') || Route::is('admin.system-admins.') || Route::is('admin.vendor-admins.*') ? 'true' : 'false' }}">
                        <span>
                            <span class="sidebar-icon">
                                <i class="fas fa-users-cog icon icon-xs me-2"></i>
                            </span>
                            <span class="sidebar-text">Admin Management </span>
                        </span>
                        <span class="link-arrow">
                            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </span>

                    <div class="multi-level collapse {{ Route::is('admin.admin-categories.') || Route::is('admin.system-admins.') || Route::is('admin.vendor-admins.*') ? 'show' : '' }} "
                        role="list" id="admin-management" aria-expanded="true">
                        <ul class="flex-column nav">




                            {{-- admin-categories --}}


                            @if (Auth::guard('admin')->user()->hasPermission('admin-categories-read'))
                                <li class="nav-item {{ Route::is('admin.admin-categories.*') ? 'active' : '' }}">
                                    <a href="{{ route('admin.admin-categories.index') }}" class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text"> Admins Categories </span>
                                    </a>
                                </li>
                            @endif

                            {{-- admin-categories --}}


                            {{-- system-admins --}}

                            @if (Auth::guard('admin')->user()->hasPermission('system-admins-read'))
                                <li class="nav-item {{ Route::is('admin.system-admins.*') ? 'active' : '' }}">
                                    <a href="{{ route('admin.system-admins.index') }}" class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text">System Admins </span>
                                    </a>
                                </li>
                            @endif


                            {{-- system-admins --}}

                            {{-- vendor-admins --}}

                            @if (Auth::guard('admin')->user()->hasPermission('vendor-admins-read'))
                                <li class="nav-item {{ Route::is('admin.vendor-admins.*') ? 'active' : '' }}">
                                    <a href="{{ route('admin.vendor-admins.index') }}" class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text">Vendor Admins </span>
                                    </a>
                                </li>
                            @endif

                            {{-- vendor-admins --}}




                        </ul>
                    </div>
                </li>
            @endif
            {{-- @endif --}}

            {{-- admin-management --}}



            @if (Auth::guard('admin')->user()->hasPermission('area-read'))
                {{-- area --}}
                <li class="nav-item ">
                    <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" data-bs-target="#area"
                        aria-expanded="{{ Route::is('admin.countries.') || Route::is('admin.cities.') || Route::is('admin.regions.*') ? 'true' : 'false' }}">
                        <span>
                            <span class="sidebar-icon">
                                <i class="fa-solid fa-map-location-dot icon icon-xs me-2"></i>
                            </span>
                            <span class="sidebar-text">Area Settings</span>
                        </span>
                        <span class="link-arrow">
                            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </span>

                    <div class="multi-level collapse {{ Route::is('admin.countries.') || Route::is('admin.cities.') || Route::is('admin.regions.*') ? 'show' : '' }} "
                        role="list" id="area" aria-expanded="true">
                        <ul class="flex-column nav">



                            @if (Auth::guard('admin')->user()->hasPermission('countries-read'))
                                <li class="nav-item {{ Route::is('admin.countries.*') ? 'active' : '' }}">
                                    <a href="{{ route('admin.countries.index') }}" class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text"> Countries</span>
                                        <span
                                            style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                            {{ App\Models\Country::count() }}
                                        </span>
                                    </a>
                                </li>
                            @endif



                            @if (Auth::guard('admin')->user()->hasPermission('cities-read'))
                                <li class="nav-item {{ Route::is('admin.cities.*') ? 'active' : '' }}">
                                    <a href="{{ route('admin.cities.index') }}" class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text"> Cities</span>
                                        <span
                                            style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                            {{ App\Models\City::count() }}
                                        </span>
                                    </a>
                                </li>
                            @endif



                            @if (Auth::guard('admin')->user()->hasPermission('regions-read'))
                                <li class="nav-item {{ Route::is('admin.regions.*') ? 'active' : '' }}">
                                    <a href="{{ route('admin.regions.index') }}" class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text"> Regions</span>
                                        <span
                                            style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                            {{ App\Models\Region::count() }}
                                        </span>
                                    </a>
                                </li>
                            @endif



                        </ul>
                    </div>
                </li>
            @endif

            {{-- area --}}
            @if (Auth::guard('admin')->user()->hasPermission('notifications-read'))
                <li class="nav-item {{ Route::is('admin.notifications.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.notifications.index') }}" class="nav-link ">
                        <span class="sidebar-icon">
                            <i class="fa-regular fa-bell icon icon-xs me-2"></i>
                        </span>
                        <span class="sidebar-text"> Notifications</span>
                    </a>
                </li>
            @endif

            @if (Auth::guard('admin')->user()->hasPermission('settings-read'))
                <li class="nav-item ">
                    <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" data-bs-target="#app_settings"
                        aria-expanded="{{ Route::is('admin.countries.') || Route::is('admin.cities.') || Route::is('admin.regions.*') ? 'true' : 'false' }}">
                        <span>
                            <span class="sidebar-icon">
                                <i class="fa-solid fa-map-location-dot icon icon-xs me-2"></i>
                            </span>
                            <span class="sidebar-text">App Settings</span>
                        </span>
                        <span class="link-arrow">
                            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </span>

                    <div class="multi-level collapse {{ Route::is('admin.countries.') || Route::is('admin.cities.') || Route::is('admin.regions.*') ? 'show' : '' }} "
                        role="list" id="app_settings" aria-expanded="true">
                        <ul class="flex-column nav">



                            @if (Auth::guard('admin')->user()->hasPermission('settings-read'))
                                <li class="nav-item {{ Route::is('admin.countries.*') ? 'active' : '' }}">
                                    <a href="{{ route('admin.front-settings.top_navbar') }}" class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text"> Top Navbar</span>
                                    </a>
                                </li>
                            @endif



                            @if (Auth::guard('admin')->user()->hasPermission('settings-read'))
                                <li class="nav-item {{ Route::is('admin.countries.*') ? 'active' : '' }}">
                                    <a href="{{ route('admin.front-settings.view_all_products') }}"
                                        class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text"> View All Products </span>
                                    </a>
                                </li>
                            @endif

                            @if (Auth::guard('admin')->user()->hasPermission('settings-read'))
                                <li class="nav-item {{ Route::is('admin.countries.*') ? 'active' : '' }}">
                                    <a href="{{ route('admin.front-settings.latest_wedding_halls_section') }}"
                                        class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text"> Latest Widding Halls </span>
                                    </a>
                                </li>
                            @endif


                            @if (Auth::guard('admin')->user()->hasPermission('settings-read'))
                                <li class="nav-item {{ Route::is('admin.countries.*') ? 'active' : '' }}">
                                    <a href="{{ route('admin.front-settings.latest_products_section') }}"
                                        class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text"> Latest Products </span>
                                    </a>
                                </li>
                            @endif


                            @if (Auth::guard('admin')->user()->hasPermission('settings-read'))
                                <li class="nav-item {{ Route::is('admin.countries.*') ? 'active' : '' }}">
                                    <a href="{{ route('admin.front-settings.explore_category') }}"
                                        class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text"> Explore Category </span>
                                    </a>
                                </li>
                            @endif


                            @if (Auth::guard('admin')->user()->hasPermission('settings-read'))
                                <li class="nav-item {{ Route::is('admin.countries.*') ? 'active' : '' }}">
                                    <a href="{{ route('admin.front-settings.best_sellers') }}" class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text"> Best Sellers </span>
                                    </a>
                                </li>
                            @endif

                            @if (Auth::guard('admin')->user()->hasPermission('settings-read'))
                                <li class="nav-item {{ Route::is('admin.countries.*') ? 'active' : '' }}">
                                    <a href="{{ route('admin.front-settings.shop_by_occasion') }}"
                                        class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text"> Shop By Occasion </span>
                                    </a>
                                </li>
                            @endif

                            @if (Auth::guard('admin')->user()->hasPermission('settings-read'))
                                <li class="nav-item {{ Route::is('admin.countries.*') ? 'active' : '' }}">
                                    <a href="{{ route('admin.front-settings.shop_by_brands') }}" class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text"> Shop By Brands </span>
                                    </a>
                                </li>
                            @endif


                            @if (Auth::guard('admin')->user()->hasPermission('settings-read'))
                                <li class="nav-item {{ Route::is('admin.countries.*') ? 'active' : '' }}">
                                    <a href="{{ route('admin.front-settings.hints') }}" class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text"> Hint Section </span>
                                    </a>
                                </li>
                            @endif

                            @if (Auth::guard('admin')->user()->hasPermission('settings-read'))
                                <li class="nav-item {{ Route::is('admin.countries.*') ? 'active' : '' }}">
                                    <a href="{{ route('admin.front-settings.latest_engagments_halls') }}"
                                        class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text"> Latest Engagments Halls</span>
                                    </a>
                                </li>
                            @endif

                            @if (Auth::guard('admin')->user()->hasPermission('settings-read'))
                                <li class="nav-item {{ Route::is('admin.countries.*') ? 'active' : '' }}">
                                    <a href="{{ route('admin.front-settings.latest_birthday_halls') }}"
                                        class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text"> Latest BirthDay Halls</span>
                                    </a>
                                </li>
                            @endif

                            @if (Auth::guard('admin')->user()->hasPermission('settings-read'))
                                <li class="nav-item {{ Route::is('admin.countries.*') ? 'active' : '' }}">
                                    <a href="{{ route('admin.front-settings.features_section') }}"
                                        class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text"> Features Section</span>
                                    </a>
                                </li>
                            @endif

                            @if (Auth::guard('admin')->user()->hasPermission('settings-read'))
                                <li class="nav-item {{ Route::is('admin.countries.*') ? 'active' : '' }}">
                                    <a href="{{ route('admin.front-settings.news_section') }}" class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text"> News Section</span>
                                    </a>
                                </li>
                            @endif

                            @if (Auth::guard('admin')->user()->hasPermission('settings-read'))
                                <li class="nav-item {{ Route::is('admin.countries.*') ? 'active' : '' }}">
                                    <a href="{{ route('admin.front-settings.top_footer') }}" class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text"> Top Footer</span>
                                    </a>
                                </li>
                            @endif

                            @if (Auth::guard('admin')->user()->hasPermission('settings-read'))
                                <li class="nav-item {{ Route::is('admin.countries.*') ? 'active' : '' }}">
                                    <a href="{{ route('admin.front-settings.footer_main_section') }}"
                                        class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text"> Footer Main Section</span>
                                    </a>
                                </li>
                            @endif

                            @if (Auth::guard('admin')->user()->hasPermission('settings-read'))
                                <li class="nav-item {{ Route::is('admin.countries.*') ? 'active' : '' }}">
                                    <a href="{{ route('admin.front-settings.footer_fast_links_section') }}"
                                        class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text"> Footer Fast Links Section</span>
                                    </a>
                                </li>
                            @endif

                            @if (Auth::guard('admin')->user()->hasPermission('settings-read'))
                                <li class="nav-item {{ Route::is('admin.countries.*') ? 'active' : '' }}">
                                    <a href="{{ route('admin.front-settings.footer_find_us_section') }}"
                                        class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text"> Footer Find Us Section</span>
                                    </a>
                                </li>
                            @endif

                            @if (Auth::guard('admin')->user()->hasPermission('settings-read'))
                                <li class="nav-item {{ Route::is('admin.countries.*') ? 'active' : '' }}">
                                    <a href="{{ route('admin.front-settings.contact_us_footer') }}"
                                        class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text"> Contact Us Footer</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif



            <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>

        </ul>
    </div>
</nav>
