<style>
    #toast-container>.toast-custom {
        content: "\f00C";
    }

    /* this will set the toastr style */
    .toast-custom {
        background-color: #206664;
    }
</style>

@php
    $lang = app()->getlocale();
@endphp

<!-- loader start -->
<input type="text" id="product_id_compare_list" hidden>
<input type="text" id="product_id_cart_list" hidden>
<input type="text" id="product_id_wishlist" hidden>
<input type="text" id="qunatity_of_product_in_quck_view_add_to_cart" hidden>
<input type="text" id="product_id_in_quck_view_add_to_cart" hidden>
<input type="text" id="selected_color" hidden>
<input type="text" id="selected_size" hidden>
<input type="text" id="qunatity_of_product_in_product_details_add_to_cart" hidden>
<input type="text" id="choose_color_from_filteration" hidden>

<div class="loader_skeleton">
    <div class="top-panel-adv">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-10">
                    <div class="panel-left-content">
                        <h4 class="mb-0">{{ __('trans.Welcome to Our store') }}
                            {{ App\Models\TopNavbar::first()->welcome_to }}!! Delivery in
                            <span>{{ App\Models\TopNavbar::first()->deliver_in }}.</span>
                        </h4>
                        <div class="delivery-area d-md-block d-none">
                            <div>
                                <h5>{{ __('trans.Limited Time offer') }} </h5>
                                <h4>{{ __('trans.code') }}: {{ App\Models\TopNavbar::first()->code }}</h4>
                                <input type="text"
                                    value="{{ App\Models\Product::orderBy('real_price', 'desc')->first() ? App\Models\Product::orderBy('real_price', 'desc')->first()->real_price : '' }}"
                                    id="highest_price" hidden>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <a href="javascript:void(0)" class="close-btn"><i style="font-size: 30px; color:#000"
                            class="fa fa-times" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
    <header class="style-light header-compact">
        <div class="top-header top-header-theme">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header-contact">
                            <ul>
                                <li>{{ __('trans.Welcome to Our store') }}
                                    {{ App\Models\TopNavbar::first()->welcome_to }}</li>
                                {{-- <li><a href="become-vendor.html" class="text-white fw-bold">Become a Vendor</a></li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 text-end">
                        <ul class="header-dropdown">
                            <li class="mobile-wishlist pe-0" style="direction: ltr;" style="direction: ltr;"><a
                                    href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
                            </li>
                            <li class="onhover-dropdown mobile-account">
                                @if (auth()->user())
                                    <img src="{{ '' . auth()->user()->image_url . '' }}" width="25px"
                                        style="height: 25px; border-radius: 50%">
                                    {{ auth()->user()->name }}
                                @else
                                    <i class="fa fa-user" aria-hidden="true"></i>

                                    {{ __('trans.My Account') }}
                                @endif

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="main-menu">
                        <div class="menu-left">
                            <div class="brand-logo">
                                <a href="index.html"><img
                                        src="{{ asset('' . App\Models\AppSetting::first()->logo . '') }}"
                                        width="100px" class="img-fluid blur-up lazyload" alt=""></a>
                            </div>
                        </div>
                        <div>
                            <form class="form_search" role="form" method="POST" action="{{ url('search') }}">
                                @csrf
                                <input id="query search-autocomplete" type="search"
                                    placeholder="{{ __('trans.Search any Device or Gadgets...') }} "
                                    class="nav-search nav-search-field" aria-expanded="true" name="term">
                                <button type="submit" name="nav-submit-button" class="btn-search">
                                    <i class="ti-search"></i>
                                </button>
                            </form>
                        </div>
                        <div class="menu-right pull-right">
                            <div>
                                <div class="icon-nav">
                                    <ul>
                                        <li class="onhover-div mobile-search d-xl-none d-sm-inline-block d-none">
                                            <div><img src="../assets/images/icon/search.png" onclick="openSearch()"
                                                    class="img-fluid blur-up lazyload" alt=""><i
                                                    class="ti-search" onclick="openSearch()"></i></div>
                                        </li>
                                        <li class="onhover-div mobile-setting d-sm-inline-block d-none">
                                            <div><img src="../assets/images/icon/setting.png"
                                                    class="img-fluid blur-up lazyload" alt=""><i
                                                    class="ti-settings"></i></div>
                                            <div class="show-div setting">
                                                <h6>language</h6>
                                                <ul>
                                                    <li><a href="{{ url('/language/en') }}">{{ __('trans.english') }}<img
                                                                src="{{ asset('assets/images/flags/united-kingdom.png') }}"
                                                                style="margin-left: 5px"></a></li>
                                                    <li><a href="{{ url('/language/ar') }}">{{ __('trans.arabic') }}<img
                                                                src="{{ asset('assets/images/flags/egypt.png') }}"
                                                                style="margin-left: 25px"></a></li>
                                                </ul>
                                                {{--  <h6>currency</h6>
                                                <ul class="list-inline">
                                                    <li><a href="#">euro</a></li>
                                                    <li><a href="#">rupees</a></li>
                                                    <li><a href="#">pound</a></li>
                                                    <li><a href="#">doller</a></li>
                                                </ul>  --}}
                                            </div>
                                        </li>
                                        <li class="onhover-div mobile-cart d-sm-inline-block d-none">
                                            <div><img src="../assets/images/icon/cart.png"
                                                    class="img-fluid blur-up lazyload" alt=""><i
                                                    class="ti-shopping-cart"></i></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-part bottom-light">
            <div class="container">
                <div class="row">
                    <div class="col-12 menu-row">
                        <div data-bs-toggle="modal" data-bs-target="#deliveryarea"
                            class="delivery-area d-md-flex d-none">
                            <i data-feather="map-pin"></i>
                            <div>
                                <h6>{{ __('trans.Delivery to') }}</h6>
                                {{-- <h5>400520</h5> --}}
                            </div>
                        </div>
                        <div class="delivery-area d-xl-flex d-none ms-auto me-0">
                            <div>
                                <h5>{{ __('trans.Call us') }}: {{ App\Models\Navbar::first()->call_us }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="small-slider">
        <div class="home-slider">
            <div class="home"></div>
        </div>
    </div>
    <section class="vegetables-category">
        <div class="container">
            <div class="vector-slide-8 no-arrow slick-default-margin ratio_square">
                <div class="">
                    <div class="category-boxes">
                    </div>
                </div>
                <div class="">
                    <div class="category-boxes">
                    </div>
                </div>
                <div class="">
                    <div class="category-boxes">
                    </div>
                </div>
                <div class="">
                    <div class="category-boxes">
                    </div>
                </div>
                <div class="">
                    <div class="category-boxes">
                    </div>
                </div>
                <div class="">
                    <div class="category-boxes">
                    </div>
                </div>
                <div class="">
                    <div class="category-boxes">
                    </div>
                </div>
                <div class="">
                    <div class="category-boxes">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="collection-banner banner-padding">
        <div class="container">
            <div class="row partition3">
                <div class="col-md-4">
                    <div class="ldr-bg">
                        <div class="contain-banner banner-3">
                            <div>
                                <h4></h4>
                                <h2></h2>
                                <h6></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ldr-bg">
                        <div class="contain-banner banner-3">
                            <div>
                                <h4></h4>
                                <h2></h2>
                                <h6></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ldr-bg">
                        <div class="contain-banner banner-3">
                            <div>
                                <h4></h4>
                                <h2></h2>
                                <h6></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- loader end -->


<!-- top panel start -->
<div class="top-panel-adv">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-10">
                <div class="panel-left-content">
                    <h4 class="mb-0">{{ __('trans.Welcome to Our store') }}
                        {{ App\Models\TopNavbar::first()->welcome_to }} {{ __('trans.Delivery in') }}
                        <span>{{ App\Models\TopNavbar::first()->deliver_in }}.</span>
                    </h4>
                    <div class="delivery-area d-md-block d-none">
                        <div>
                            <h5>{{ __('trans.Limited Time offer') }}</h5>
                            <h4>{{ __('trans.code') }}: {{ App\Models\TopNavbar::first()->code }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <a href="javascript:void(0)" class="close-btn"><i style="font-size: 30px; color:#000"
                        class="fa fa-times" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- top panel end -->


<!-- header start -->
<header id="sticky-header" class="style-light header-compact">
    <div class="mobile-fix-option"></div>
    <div class="top-header top-header-theme">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="header-contact">
                        <ul>
                            <li>{{ __('trans.Welcome to Our store ') }}
                                {{ App\Models\TopNavbar::first()->welcome_to }}</li>
                            {{-- <li><a href="become-vendor.html" class="text-white fw-bold">Become a Vendor</a></li> --}}
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 text-end">
                    <ul class="header-dropdown" style="text-align: end;">
                        @if (auth()->user())
                            <li class="mobile-wishlist pe-0" style="direction: ltr;" style="direction: ltr;">
                                <a href="{{ url('wishlist') }}">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                    <span class=""
                                        style="background-color: red; border-radius: 20px; padding: 6px; font-weight: bold"
                                        id="wishlist_count">
                                        {{ App\Models\Wishlist::where('user_id', auth()->user()->id)->count() }}
                                    </span>
                                </a>
                            </li>
                        @else
                            <li class="mobile-wishlist pe-0" style="direction: ltr;" style="direction: ltr;">
                                <a href="{{ url('wishlist') }}">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                    <span class=""
                                        style="background-color: red; border-radius: 20px; padding: 6px; font-weight: bold"
                                        id="wishlist_count">
                                        {{ App\Models\Wishlist::where('user_id', \Request::ip())->count() }}
                                    </span>
                                </a>
                            </li>
                        @endif
                        @if (auth()->user())
                            <li class="mobile-wishlist pe-0" style="direction: ltr;" style="direction: ltr;">
                                <a href="{{ url('compare') }}">
                                    <i class="ti-reload" aria-hidden="true"></i>
                                    <span class=""
                                        style="background-color: red;  border-radius: 20px; padding: 6px; font-weight: bold"
                                        id="compare_list_count">
                                        {{ App\Models\CompareList::where('user_id', auth()->user()->id)->count() }}
                                    </span>
                                @else
                            <li class="mobile-wishlist pe-0" style="direction: ltr;" style="direction: ltr;">
                                <a href="{{ url('compare') }}">
                                    <i class="ti-reload" aria-hidden="true"></i>
                                    <span class=""
                                        style="background-color: red; border-radius: 20px; padding: 6px; font-weight: bold"
                                        id="compare_list_count">
                                        {{ App\Models\CompareList::where('user_id', \Request::ip())->count() }}
                                    </span>
                                </a>
                        @endif
                        </li>
                        <style>
                            .header-compact .top-header .header-dropdown li {
                                padding: 10px;
                            }

                            .header-compact .top-header .header-dropdown li ul {
                                padding: 10px 0px;
                            }
                        </style>
                        <li class="onhover-dropdown mobile-account"
                            style="font-size: 17px;
                        font-weight: 800;">
                            @if (auth()->user())
                                <img src="{{ '' . auth()->user()->image_url . '' }}" width="25px"
                                    style="height: 25px; border-radius: 50%">
                                {{ auth()->user()->name }}
                            @else
                                <i class="fa fa-user" aria-hidden="true" style="margin-left: 10px"></i>

                                {{ __('trans.My Account') }}
                            @endif
                            <ul style="padding: 20px;" class="onhover-show-div">
                                @if (auth()->user())
                                    <li style="padding-right: 0px;"><a
                                            href="{{ url('/user-dashboard') }}">{{ __('trans.Profile') }}</a></li>
                                    <li><a href="{{ url('logout') }}">{{ __('trans.Logout') }}</a></li>
                                @else
                                    <li style="padding-right: 0px;"><a
                                            href="{{ url('/login') }}">{{ __('trans.Login') }}</a></li>
                                    <li><a href="{{ url('sign-up') }}">{{ __('trans.Register') }}</a></li>
                                @endif

                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="main-menu">
                    <div class="menu-left">
                        <div class="brand-logo">
                            <a href="{{ url('/') }}"><img
                                    src="{{ asset('' . App\Models\Navbar::first()->logo . '') }}"
                                    class="img-fluid blur-up lazyload" alt=""></a>
                        </div>
                    </div>
                    <div>
                        <form class="form_search" role="form" method="GET" action="{{ url('search') }}">
                            @csrf
                            <input id="query search-autocomplete" type="text"
                                placeholder="{{ __('trans.Search any Device or Gadgets...') }}"
                                class="nav-search nav-search-field" aria-expanded="true" name="term">
                            {{-- <button type="submit" name="nav-submit-button" class="btn-search">
                                <i class="ti-search"></i>
                            </button> --}}
                        </form>
                    </div>
                    <div class="menu-right pull-right">
                        <div>
                            <div class="icon-nav">
                                <ul>
                                    <li class="onhover-div mobile-search d-xl-none d-inline-block">
                                        <div><img src="../assets/images/icon/search.png" onclick="openSearch()"
                                                class="img-fluid blur-up lazyload" alt=""><i
                                                class="ti-search" onclick="openSearch()"></i></div>
                                        <div id="search-overlay" class="search-overlay">
                                            <div><span class="closebtn" onclick="closeSearch()"
                                                    title="Close Overlay">×</span>
                                                <div class="overlay-content">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <form>
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control"
                                                                            id="exampleInputPassword1"
                                                                            placeholder="Search a Product">
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary"><i
                                                                            class="fa fa-search"></i></button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="onhover-div mobile-setting">
                                        @if ($lang == 'en')
                                            <a href="{{ url('/language/ar') }}"><img
                                                    src="{{ asset('assets/images/flags/egypt.png') }}" width="30px"
                                                    style="margin-left: 25px"></a>
                                        @elseif ($lang == 'ar')
                                            <a href="{{ url('/language/en') }}"><img
                                                    src="{{ asset('assets/images/flags/united-kingdom.png') }}"
                                                    width="30px" style="margin-left: 5px"></a>
                                        @endif
                                    </li>
                                    <li class="onhover-div mobile-cart">
                                        <div><img src="../assets/images/icon/cart.png"
                                                class="img-fluid blur-up lazyload" alt=""><i
                                                class="ti-shopping-cart"></i>
                                            @if (auth()->user())
                                                <span id="cart_list_count"
                                                    style="background-color: red; color:#fff ; padding: 5px 10px; border-radius: 10px">{{ App\Models\Cart::where('user_id', auth()->user()->id)->count() }}</span>
                                            @else
                                                <span id="cart_list_count"
                                                    style="background-color: red; color:#fff ; padding: 5px 10px; border-radius: 10px">{{ App\Models\Cart::where('user_id', \Request::ip())->count() }}</span>
                                            @endif

                                        </div>
                                        <ul class="show-div shopping-cart" style="right: -100px;">
                                            <div id="my_cart_pop_up">
                                                @if (auth()->user())
                                                    <?php $x = 0; ?>
                                                    @if (App\Models\Cart::where('user_id', auth()->user()->id)->latest()->count() > 0)
                                                        @foreach (App\Models\Cart::where('user_id', auth()->user()->id)->latest()->get() as $item)
                                                            <li>
                                                                <div class="media" style="direction: ltr">

                                                                    <a
                                                                        href="@if (session()->get('locale') == 'en') {{ url('product/' . $item->product->slug_en) }}@else{{ url('product/' . $item->product->slug_ar) }} @endif"><img
                                                                            alt="" class="me-3"
                                                                            src="{{ $item->product->primary_image_url }}"
                                                                            width="50px;"
                                                                            style="height:50px !important;"></a>
                                                                    <div class="media-body" style="direction: ltr">
                                                                        <a
                                                                            href="@if (session()->get('locale') == 'en') {{ url('product/' . $item->product->slug_en) }}@else{{ url('product/' . $item->product->slug_ar) }} @endif">
                                                                            <h4>
                                                                                @if (session()->get('locale') == 'en')
                                                                                    {{ $item->product->title_en }}@else{{ $item->product->title_ar }}
                                                                                @endif
                                                                            </h4>
                                                                        </a>
                                                                        <h4> {{ $item->quantity }} X
                                                                            {{ $item->product->real_price . ' ' . trans('trans.EGP') }}<span>
                                                                            </span> </h4> <br>
                                                                    </div>
                                                                </div>
                                                                <?php $x += $item->quantity * $item->product->real_price; ?>
                                                                <div class="close-circle"><a
                                                                        onclick="remove_item_from_cart({{ $item->id }})"><i
                                                                            class="fa fa-times"
                                                                            aria-hidden="true"></i></a></div>
                                                            </li>
                                                            <hr>
                                                        @endforeach
                                                    @else
                                                        <h4 style="text-align: center">{{ __('trans.Cart is Empty') }}
                                                        </h4>
                                                    @endif
                                                @else
                                                    <?php $x = 0; ?>
                                                    @if (App\Models\Cart::where('user_id', \Request::ip())->latest()->count() > 0)
                                                        @foreach (App\Models\Cart::where('user_id', \Request::ip())->latest()->get() as $item)
                                                            <li>
                                                                <div class="media" style="direction: ltr">

                                                                    <a
                                                                        href="@if (session()->get('locale') == 'en') {{ url('product/' . $item->product->slug_en) }}@else{{ url('product/' . $item->product->slug_ar) }} @endif"><img
                                                                            alt="" class="me-3"
                                                                            src="{{ $item->product->primary_image_url }}"
                                                                            width="50px"
                                                                            style="height:50px !important;"></a>
                                                                    <div class="media-body">
                                                                        <a
                                                                            href="@if (session()->get('locale') == 'en') {{ url('product/' . $item->product->slug_en) }}@else {{ url('product/' . $item->product->slug_ar) }} @endif">
                                                                            <h4>
                                                                                @if (session()->get('locale') == 'en')
                                                                                    {{ $item->product->title_en }}@else{{ $item->product->title_ar }}
                                                                                @endif
                                                                            </h4>
                                                                        </a>
                                                                        <h4> {{ $item->quantity }} X
                                                                            {{ $item->product->real_price . ' ' . trans('trans.EGP') }}<span>
                                                                            </span> </h4> <br>
                                                                    </div>
                                                                </div>
                                                                <?php $x += $item->quantity * $item->product->real_price; ?>
                                                                <div class="close-circle"><a
                                                                        onclick="remove_item_from_cart({{ $item->id }})"><i
                                                                            class="fa fa-times"
                                                                            aria-hidden="true"></i></a></div>
                                                            </li>
                                                            <hr>
                                                        @endforeach
                                                    @else
                                                        <h4 style="text-align: center">{{ __('trans.Cart is Empty') }}
                                                        </h4>
                                                    @endif
                                                @endif
                                            </div>

                                            <li>
                                                <div class="total">
                                                    <h5>{{ trans('trans.Subtotal') }} <span class="sub_total_model"
                                                            style="color: #000; font-weight: bold">{{ $x }}
                                                            {{ __('trans.EGP') }}</span></h5>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="buttons">
                                                    <a href="{{ url('cart') }}"
                                                        class="view-cart">{{ __('trans.view cart') }}</a>
                                                    {{-- <a href="#" class="checkout">checkout</a> --}}
                                                </div>
                                            </li>

                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-part bottom-light">
        <div class="container">
            <div class="row">
                <div class="col-12 menu-row">
                    <div style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#deliveryarea"
                        class="delivery-area d-md-flex d-none">
                        <i data-feather="map-pin"></i>
                        <div>
                            <h6>{{ __('trans.Delivery to') }}</h6>
                            {{-- <h5>400520</h5> --}}
                        </div>
                    </div>
                    <div class="main-nav-center">
                        @if (session()->get('locale') == "en")
                        <nav id="main-nav" class="text-start">
                            <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>

                            <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                <li>
                                    <div class="mobile-back text-end">Back<i class="fa fa-angle-right ps-2"
                                            aria-hidden="true"></i></div>
                                </li>
                                <li style="margin-left: 20px"><a style="font-weight: 800; font-size: 12px;"
                                        href="{{ url('/') }}">{{ __('trans.Home') }}</a></li>
                                <li>
                                    <a
                                        style="cursor: pointer; font-weight: 800; font-size: 12px;">{{ __('trans.categories') }}</a>
                                    <ul style="width: 1000px;">

                                        @foreach (App\Models\ProductCategory::get() as $category)

                                            @if ($category->sub_catagories->count() > 0)

                                                <li @if (session()->get('locale') == 'ar') style="text-align:right !importent;" @endif>
                                                    <a href="@if (session()->get('locale') == 'en') {{ url('category/' . $category->slug_en) }}@else{{ url('category/' . $category->slug_ar) }} @endif"
                                                        style="cursor: pointer">
                                                        @if (session()->get('locale') == 'en')
                                                            {{ $category->title_en }}@else{{ $category->title_ar }}
                                                        @endif
                                                    </a>
                                                    <ul >
                                                        @foreach ($category->sub_catagories as $sub)
                                                            <li @if (session()->get('locale') == 'ar') style="text-align:right" @endif><a
                                                                    href="@if (session()->get('locale') == 'en') {{ url('sub-category/' . $sub->slug_en) }}@else{{ url('sub-category/' . $sub->slug_ar) }} @endif">
                                                                    @if (session()->get('locale') == 'en')
                                                                        {{ $sub->title_en }}@else{{ $sub->title_ar }}
                                                                    @endif
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                                <li style="margin-left: 20px"><a style="font-weight: 800; font-size: 12px;"
                                        href="{{ url('about-us') }}">{{ __('trans.About Store') }}</a></li>
                                <li style="margin-left: 20px"><a style="font-weight: 800; font-size: 12px;"
                                        href="{{ url('contact-us') }}">{{ __('trans.Contact Us') }}</a></li>
                            </ul>
                        </nav>
                        @else
                        <nav id="main-nav" class="text-start">
                            <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>

                            <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                <li>
                                    <div class="mobile-back text-end">Back<i class="fa fa-angle-right ps-2"
                                            aria-hidden="true"></i></div>
                                </li>


                                <li style="margin-left: 20px"><a style="font-weight: 800; font-size: 12px;"
                                        href="{{ url('about-us') }}">{{ __('trans.About Store') }}</a></li>
                                <li style="margin-left: 20px"><a style="font-weight: 800; font-size: 12px;"
                                        href="{{ url('contact-us') }}">{{ __('trans.Contact Us') }}</a></li>
                                        <li>
                                            <a
                                                style="cursor: pointer; font-weight: 800; font-size: 12px;">{{ __('trans.categories') }}</a>
                                            <ul style="width: 1000px !important ;">
                                                @foreach (App\Models\ProductCategory::get() as $category)
                                                    @if ($category->sub_catagories->count() > 0)
                                                        <li @if (session()->get('locale') == 'ar')style="text-align:right" @endif>
                                                            <a href="@if (session()->get('locale') == 'en') {{ url('category/' . $category->slug_en) }}@else{{ url('category/' . $category->slug_ar) }} @endif"
                                                                style="cursor: pointer">
                                                                @if (session()->get('locale') == 'en')
                                                                    {{ $category->title_en }}@else{{ $category->title_ar }}
                                                                @endif
                                                            </a>
                                                            <ul>
                                                                @foreach ($category->sub_catagories as $sub)
                                                                    <li @if (session()->get('locale') == 'ar')style="text-align:right" @endif ><a
                                                                            href="@if (session()->get('locale') == 'en') {{ url('sub-category/' . $sub->slug_en) }}@else{{ url('sub-category/' . $sub->slug_ar) }} @endif">
                                                                            @if (session()->get('locale') == 'en')
                                                                                {{ $sub->title_en }}@else{{ $sub->title_ar }}
                                                                            @endif
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                <li style="margin-left: 20px"><a style="font-weight: 800; font-size: 12px;"
                                        href="{{ url('/') }}">{{ __('trans.Home') }}</a></li>
                            </ul>
                        </nav>
                        @endif
                    </div>
                    <div style="width: 400px;">
                        <div class="delivery-area d-xl-flex d-none ms-auto me-0" style="width: 55%; float: left;">
                            <div>
                                <h5>{{ __('trans.Call us') }}: {{ App\Models\Navbar::first()->call_us }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header end -->
<input type="text" id="our_locale_site" value="{{ session()->get('locale') }}" hidden>
<div class="modal fade" id="deliveryarea" tabindex="-1" aria-labelledby="deliveryareaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">{{ __('trans.Delivery Address') }}</h5>
                {{-- <button type="button" class="btn-close position-relative h-auto" data-bs-dismiss="modal"
                    aria-label="Close"><span aria-hidden="true">×</span></button> --}}
            </div>
            <div class="modal-body">
                <form method="get" action="{{ route('filter.city') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="name">{{ __('trans.Select your city to start shopping') }}</label>
                            <select class="form-select" aria-label="Default select example" name="city_id">
                                <option selected>{{ __('trans.Select City') }}</option>
                                @foreach (App\Models\City::get() as $city)
                                    <option value="{{ $city->id }}">
                                        @if (session()->get('locale') == 'en')
                                            {{ $city->title_en }}@else{{ $city->title_ar }}
                                        @endif
                                    </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn-solid btn">{{ __('trans.Filter') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
