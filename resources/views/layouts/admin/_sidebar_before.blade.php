@php
    $useradmin = App\Models\Admin::where('id', Auth::guard('admin')->id())->first();
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

<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
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
            <li class="nav-item {{ Route::is('admin.digital-cart.*') ? 'active' : '' }}">
                <a href="{{ route('admin.digital-cart.index') }}" class="nav-link ">
                    <span class="sidebar-icon">
                        <i class="fa-solid fa-truck-fast icon icon-xs me-2"></i>
                    </span>
                    <span class="sidebar-text">Digital Cards</span>
                </a>
            </li>
            <li class="nav-item {{ Route::is('admin.shippings.*') ? 'active' : '' }}">
                <a href="{{ route('admin.shippings.index') }}" class="nav-link ">
                    <span class="sidebar-icon">
                        <i class="fa-solid fa-truck-fast icon icon-xs me-2"></i>
                    </span>
                    <span class="sidebar-text">Shippings</span>
                </a>
            </li>



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
                            <a href="{{ route('admin.with-draw-request.index') }}" class="nav-link ">
                                <span class="sidebar-icon">
                                    <i class="fas fa-spinner icon icon-xs me-2 text-info"></i>
                                </span>
                                <span class="sidebar-text"> All Commissions </span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                <span class="sidebar-icon">
                                    <i class="fas fa-spinner icon icon-xs me-2 text-info"></i>
                                </span>
                                <span class="sidebar-text"> Send To Vendor </span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                <span class="sidebar-icon">
                                    <i class="fas fa-spinner icon icon-xs me-2 text-info"></i>
                                </span>
                                <span class="sidebar-text"> Withdraw Sent From U </span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                <span class="sidebar-icon">
                                    <i class="fas fa-spinner icon icon-xs me-2 text-info"></i>
                                </span>
                                <span class="sidebar-text"> Withdraw needed From U </span>
                            </a>
                        </li>



                    </ul>
                </div>
            </li>

            <li class="nav-item ">
                <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse" data-bs-target="#with_draw_vendor" aria-expanded="false">
                    <span>
                        <span class="sidebar-icon">
                            <i class="fa-solid fa-cart-arrow-down icon-xs me-2"></i>
                        </span>
                        <span class="sidebar-text">With Draw Vendor
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
                            <a href="#" class="nav-link ">
                                <span class="sidebar-icon">
                                    <i class="fas fa-spinner icon icon-xs me-2 text-info"></i>
                                </span>
                                <span class="sidebar-text"> Send Request </span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                <span class="sidebar-icon">
                                    <i class="fas fa-spinner icon icon-xs me-2 text-info"></i>
                                </span>
                                <span class="sidebar-text"> Success Requests </span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                <span class="sidebar-icon">
                                    <i class="fas fa-spinner icon icon-xs me-2 text-info"></i>
                                </span>
                                <span class="sidebar-text"> Rejected Requests </span>
                            </a>
                        </li>



                    </ul>
                </div>
            </li>

            <li
                class="nav-item  {{ Route::is('admin.contact-messages.*') && request()->type && request()->type == 'main' ? 'active' : '' }}">
                <a href="{{ route('admin.contact-messages.index', ['type' => 'main']) }}" class="nav-link ">
                    <span class="sidebar-icon">
                        <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                    </span>
                    <span class="sidebar-text">Contact Us</span>
                </a>
            </li>



            {{-- shippings --}}
            {{-- @if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin'))
            @if (Auth::guard('admin')->user()->hasPermission('shippings-read'))
         <li class="nav-item {{ Route::is('admin.shippings.*')?'active':'' }}">
             <a href="{{ route('admin.shippings.index') }}" class="nav-link ">
               <span class="sidebar-icon">
                 <i class="fa-solid fa-truck-fast icon icon-xs me-2"></i>
               </span>
               <span class="sidebar-text">Shippings</span>
             </a>
           </li>
         @endif
          @endif --}}
            {{-- shippings --}}

            {{-- promo-codes --}}

            @if (Auth::guard('admin')->user()->hasPermission('promo-codes-read'))
                <li class="nav-item {{ Route::is('admin.promo-codes.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.promo-codes.index') }}" class="nav-link ">
                        <span class="sidebar-icon">
                            <i class="fa-solid fa-gifts icon icon-xs me-2"></i>
                        </span>
                        <span class="sidebar-text">Promo Codes</span>
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
                    </a>
                </li>
            @endif

            {{-- vendors --}}




            {{-- test --}}



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
                                    <span class="sidebar-text">Main Categories</span>
                                </a>
                            </li>


                            <li
                                class="nav-item  {{ Route::is('admin.products-categories.*') && request()->type && request()->type == 'sub' ? 'active' : '' }}">
                                <a href="{{ route('admin.products-categories.index', ['type' => 'sub']) }}"
                                    class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text"> Sub Categories</span>
                                </a>
                            </li>




                        </ul>
                    </div>
                </li>
            @endif

            {{-- Products Categories --}}



            {{-- Products  --}}

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
                                <a href="{{ route('admin.products.index', ['type' => 'all']) }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text">All Products</span>
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
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif

            {{-- Products  --}}













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
                                        style="border: 1px solid red ; padding: 5px; border-radius: 20px; background-color: red">
                                        {{ App\Models\Order::count() }}
                                    </span>
                                @else
                                    <?php $all_orders = 0; ?>
                                    @foreach (App\Models\Order::get() as $item)
                                        @foreach ($item->order_products as $order_product)
                                            @if (
                                                $order_product->vendor_id ==
                                                    auth()->guard('admin')->user()->id)
                                                <?php $all_orders++; ?>
                                            @endif
                                        @endforeach
                                    @endforeach
                                    <span
                                        style="border: 1px solid red ; padding: 5px; border-radius: 20px; background-color: red">
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
                                            style="border: 1px solid red ; padding: 5px; border-radius: 20px; background-color: red">
                                            {{ App\Models\Order::pending()->count() }}
                                        </span>
                                    @else
                                        <?php $pending_orders = 0; ?>
                                        @foreach (App\Models\Order::pending() as $item)
                                            @foreach ($item->order_products as $order_product)
                                                @if (
                                                    $order_product->vendor_id ==
                                                        auth()->guard('admin')->user()->id)
                                                    <?php $pending_orders++; ?>
                                                @endif
                                            @endforeach
                                        @endforeach
                                        <span
                                            style="border: 1px solid red ; padding: 5px; border-radius: 20px; background-color: red">
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
                                            style="border: 1px solid red ; padding: 5px; border-radius: 20px; background-color: red">
                                            {{ App\Models\Order::inProgress()->count() }}
                                        </span>
                                    @else
                                        <?php $inprogress_order = 0; ?>
                                        @foreach (App\Models\Order::inProgress() as $item)
                                            @foreach ($item->order_products as $order_product)
                                                @if (
                                                    $order_product->vendor_id ==
                                                        auth()->guard('admin')->user()->id)
                                                    <?php $inprogress_order++; ?>
                                                @endif
                                            @endforeach
                                        @endforeach
                                        <span
                                            style="border: 1px solid red ; padding: 5px; border-radius: 20px; background-color: red">
                                            {{ $inprogress_order }}
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
                                            style="border: 1px solid red ; padding: 5px; border-radius: 20px; background-color: red">
                                            {{ App\Models\Order::delivered()->count() }}
                                        </span>
                                    @else
                                        <?php $delievered_orders = 0; ?>
                                        @foreach (App\Models\Order::delivered() as $item)
                                            @foreach ($item->order_products as $order_product)
                                                @if (
                                                    $order_product->vendor_id ==
                                                        auth()->guard('admin')->user()->id)
                                                    <?php $delievered_orders++; ?>
                                                @endif
                                            @endforeach
                                        @endforeach
                                        <span
                                            style="border: 1px solid red ; padding: 5px; border-radius: 20px; background-color: red">
                                            {{ $delievered_orders }}
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
                                            style="border: 1px solid red ; padding: 5px; border-radius: 20px; background-color: red">
                                            {{ App\Models\Order::canceled()->count() }}
                                        </span>
                                    @else
                                        <?php $canceled_orders = 0; ?>
                                        @foreach (App\Models\Order::canceled() as $item)
                                            @foreach ($item->order_products as $order_product)
                                                @if (
                                                    $order_product->vendor_id ==
                                                        auth()->guard('admin')->user()->id)
                                                    <?php $canceled_orders++; ?>
                                                @endif
                                            @endforeach
                                        @endforeach
                                        <span
                                            style="border: 1px solid red ; padding: 5px; border-radius: 20px; background-color: red">
                                            {{ $canceled_orders }}
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

            @if (Auth::guard('admin')->user()->hasPermission('halls-read'))

                <li class="nav-item ">
                    <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" data-bs-target="#halls"
                        aria-expanded="{{ Route::is('admin.halls-categories.') || Route::is('admin.halls.') ? 'true' : 'false' }}">
                        <span>
                            <span class="sidebar-icon">
                                <i class="fa-solid fa-wand-sparkles icon-xs me-2"></i>
                            </span>
                            <span class="sidebar-text">Halls</span>
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
                                    </a>
                                </li>
                            @endif
                            {{-- halls --}}

                            {{-- halls-categories --}}

                            @if (Auth::guard('admin')->user()->hasPermission('halls-categories-read'))
                                <li class="nav-item {{ Route::is('admin.halls-categories.*') ? 'active' : '' }}">
                                    <a href="{{ route('admin.halls-categories.index') }}" class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text"> Halls Categories </span>
                                    </a>
                                </li>
                            @endif
                            {{-- halls-categories --}}



                        </ul>
                    </div>
                </li>

            @endif


            {{-- Halls  --}}
            {{-- @endif --}}


            @if (Auth::guard('admin')->user()->hasPermission('packages-read'))

                {{-- Hall Packages Options  --}}
                <li class="nav-item ">
                    <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" data-bs-target="#halls-packages-options"
                        aria-expanded="{{ Route::is('admin.packages-options.') || Route::is('admin.packages-options-categories.') ? 'true' : 'false' }}">
                        <span>
                            <span class="sidebar-icon">
                                <i class="fas fa-stream  icon-xs me-2"></i>
                            </span>
                            <span class="sidebar-text">Hall Packages Options</span>
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

                    <div class="multi-level collapse {{ Route::is('admin.packages-options.') || Route::is('admin.packages-options-categories.') ? 'show' : '' }}"
                        role="list" id="halls-packages-options" aria-expanded="true">
                        <ul class="flex-column nav">





                            {{-- packages-options-categories --}}

                            @if (Auth::guard('admin')->user()->hasPermission('packages-options-categories-read'))
                                <li
                                    class="nav-item {{ Route::is('admin.packages-options-categories.*') ? 'active' : '' }}">
                                    <a href="{{ route('admin.packages-options-categories.index') }}"
                                        class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text"> Options Categories</span>
                                    </a>
                                </li>
                            @endif
                            {{-- packages-options-categories --}}

                            {{-- packages-options --}}

                            @if (Auth::guard('admin')->user()->hasPermission('packages-options-read'))
                                <li class="nav-item {{ Route::is('admin.packages-options.*') ? 'active' : '' }}">
                                    <a href="{{ route('admin.packages-options.index') }}" class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text"> All Options </span>
                                    </a>
                                </li>
                            @endif
                            {{-- packages-options --}}



                        </ul>
                    </div>
                </li>


                {{-- Hall Packages Options  --}}
            @endif


            @if (Auth::guard('admin')->user()->hasPermission('packages-read'))
                <li class="nav-item ">
                    <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" data-bs-target="#backage" aria-expanded="false">
                        <span>
                            <span class="sidebar-icon">
                                <i class="fa-solid fa-box icon-xs me-2"></i>
                            </span>
                            <span class="sidebar-text">Halls Backages</span>
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

                    <div class="multi-level collapse " role="list" id="backage" aria-expanded="true">
                        <ul class="flex-column nav">



                            <li class="nav-item">
                                <a href="{{ route('admin.packages.index') }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text">All Backages </span>
                                </a>
                            </li>

                            @if (Auth::guard('admin')->user()->hasPermission('packages-available-dates-and-times-read'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.availabel_date.index') }}" class="nav-link ">
                                        <span class="sidebar-icon">
                                            <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                        </span>
                                        <span class="sidebar-text">Available Dates</span>
                                    </a>
                                </li>
                            @endif


                        </ul>
                    </div>
                </li>
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
                                <a href="{{ route('admin.hall-booking.successfullBookings') }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular text-success fa-circle-check icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text">SuccessFull Bookings </span>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="{{ route('admin.hall-booking.cancelledBookings') }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle-xmark text-danger icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text"> Cancelled Bookings</span>
                                </a>
                            </li>


                        </ul>
                    </div>
                </li>
            @endif



            {{--
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                      <span class="sidebar-icon">
                        <i class="fa-solid fa-truck-fast icon icon-xs me-2"></i>
                      </span>
                      <span class="sidebar-text">Shippings</span>
                    </a>
                  </li> --}}

            {{-- @if (Auth::guard('admin')->user()->hasPermission('promocodes-read'))
                <li class="nav-item {{ Route::is('admin.promo-codes.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.promo-codes.index') }}" class="nav-link ">
                        <span class="sidebar-icon">
                            <i class="fa-solid fa-money-bill-wheat icon icon-xs me-2"></i>
                        </span>
                        <span class="sidebar-text">Promo Codes</span>
                    </a>
                </li>
            @endif --}}


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



                        <li class="nav-item">
                            <a href="{{ route('admin.reports.users') }}" class="nav-link ">
                                <span class="sidebar-icon">
                                    <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                </span>
                                <span class="sidebar-text">users reports</span>
                            </a>
                        </li>

                        {{--
                        <li class="nav-item">
                            <a href="{{ route('admin.reports.users.week') }}" class="nav-link ">
                                <span class="sidebar-icon">
                                    <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                </span>
                                <span class="sidebar-text">users in week</span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('admin.reports.users.month') }}" class="nav-link ">
                                <span class="sidebar-icon">
                                    <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                </span>
                                <span class="sidebar-text">users in month</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.reports.users.year') }}" class="nav-link ">
                                <span class="sidebar-icon">
                                    <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                </span>
                                <span class="sidebar-text">users in year</span>
                            </a>
                        </li>









                        <li class="nav-item">
                            <a href="{{ route('admin.reports.orders.today') }}" class="nav-link ">
                                <span class="sidebar-icon">
                                    <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                </span>
                                <span class="sidebar-text">orders in today</span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('admin.reports.orders.week') }}" class="nav-link ">
                                <span class="sidebar-icon">
                                    <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                </span>
                                <span class="sidebar-text">orders in week</span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('admin.reports.orders.month') }}" class="nav-link ">
                                <span class="sidebar-icon">
                                    <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                </span>
                                <span class="sidebar-text">orders in month</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.reports.orders.year') }}" class="nav-link ">
                                <span class="sidebar-icon">
                                    <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                </span>
                                <span class="sidebar-text">orders in year</span>
                            </a>
                        </li> --}}
                    </ul>
                </div>
            </li>




            @if (Auth::guard('admin')->user()->hasPermission('pages-read'))
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <span class="sidebar-icon">
                            <i class="far fa-file-alt icon icon-xs me-2"></i>
                        </span>
                        <span class="sidebar-text">Pages</span>
                    </a>
                </li>
            @endif

            {{-- <li class="nav-item ">
                    <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" data-bs-target="#fqa" aria-expanded="false">
                        <span>
                            <span class="sidebar-icon">
                                <i class="fa-solid fa-question icon-xs me-2"></i>
                            </span>
                            <span class="sidebar-text">FAQ</span>
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

                    <div class="multi-level collapse " role="list" id="fqa" aria-expanded="true">
                        <ul class="flex-column nav">



                            <li class="nav-item">
                                <a href="#" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text">All FAQ`s</span>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="#" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text"> FAQ Categories</span>
                                </a>
                            </li>





                        </ul>
                    </div>
                </li> --}}



            {{-- @if (Auth::guard('admin')->user()->hasPermission('reports-read'))
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



                            <li class="nav-item">
                                <a href="{{ route('admin.reports.today') }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text">reports of today</span>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="{{ route('admin.reports.week') }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text">reports of week</span>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="{{ route('admin.reports.month') }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text">reports of month</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.reports.year') }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text">reports of year</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
            @endif --}}
            {{-- test --}}


            {{-- taxes --}}
            @if (Auth::guard('admin')->user()->hasPermission('taxes-read'))
                <li class="nav-item {{ Route::is('admin.taxes.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.taxes.index') }}" class="nav-link ">
                        <span class="sidebar-icon">
                            <i class="fa-solid fa-money-bill-wheat icon icon-xs me-2"></i>
                        </span>
                        <span class="sidebar-text">Taxes</span>
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
            @if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin'))
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
                    <a href="{{ route('admin.settings.index') }}" class="nav-link ">
                        <span class="sidebar-icon">
                            <i class="fa-solid fa-gears icon icon-xs me-2"></i>
                        </span>
                        <span class="sidebar-text">App Settings</span>
                    </a>
                </li>
            @endif
            <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>

        </ul>
    </div>
</nav>
