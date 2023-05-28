 
  <!-- loader start -->
  <div class="loader_skeleton">
    <div class="top-panel-adv">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-10">
                    <div class="panel-left-content">
                        <h4 class="mb-0">{{ __('trans.Welcome to') }}{{ App\Models\TopNavbar::first()->welcome_to }}!! Delivery in <span>{{ App\Models\TopNavbar::first()->deliver_in }}.</span> </h4>
                        <div class="delivery-area d-md-block d-none">
                            <div>
                                <h5>{{ __('trans.Limited Time offer') }}</h5>
                                <h4>{{ __('trans.code') }}: {{ App\Models\TopNavbar::first()->code }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <a href="javascript:void(0)" class="close-btn"><i data-feather="x"></i></a>
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
                                <li>{{ __('trans.Welcome to Our store') }} {{ App\Models\TopNavbar::first()->welcome_to }}</li>
                                <li><a href="become-vendor.html" class="text-white fw-bold">Become a Vendor</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 text-end">
                        <ul class="header-dropdown">
                            <li class="mobile-wishlist pe-0"><a href="{{ route('wishlists') }}"><i class="fa fa-heart"
                                        aria-hidden="true"></i></a>
                            </li>
                            <li class="onhover-dropdown mobile-account"><i class="fa fa-user" aria-hidden="true"></i>
                                {{ __('trans.My Account') }} 
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
                                <a href="index.html"><img src="{{ asset(''. App\Models\Navbar::first()->logo .'') }}" width="100px"
                                        class="img-fluid blur-up lazyload" alt=""></a>
                            </div>
                        </div>
                        <div>
                            <form class="form_search" role="form">
                                <input id="query search-autocomplete" type="search"
                                    placeholder="Search any Device or Gadgets..." class="nav-search nav-search-field"
                                    aria-expanded="true">
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
                                                    class="img-fluid blur-up lazyload" alt=""><i class="ti-search"
                                                    onclick="openSearch()"></i></div>
                                        </li>
                                        <li class="onhover-div mobile-setting d-sm-inline-block d-none">
                                            <div><img src="../assets/images/icon/setting.png"
                                                    class="img-fluid blur-up lazyload" alt=""><i
                                                    class="ti-settings"></i></div>
                                            <div class="show-div setting">
                                                <h6>language</h6>
                                                <ul>
                                                <li><a href="{{url('/language/en')}}">{{__('trans.english') }}<img src="{{ asset('assets/images/flags/united-kingdom.png') }}" style="margin-left: 5px"></a></li>
                                                    <li><a href="{{url('/language/ar')}}">{{__('trans.arabic') }}<img src="{{ asset('assets/images/flags/egypt.png') }}" style="margin-left: 25px"></a></li>
                                                </ul>
                                                {{-- <h6>currency</h6>
                                                <ul class="list-inline">
                                                    <li><a href="#">euro</a></li>
                                                    <li><a href="#">rupees</a></li>
                                                    <li><a href="#">pound</a></li>
                                                    <li><a href="#">doller</a></li>
                                                </ul> --}}
                                            </div>
                                        </li>
                                        <li class="onhover-div mobile-cart d-sm-inline-block d-none">
                                            <div><img src="../assets/images/icon/cart.png"
                                                    class="img-fluid blur-up lazyload" alt=""><i
                                                    class="ti-shopping-cart"></i></div>
                                            <span class="cart_qty_cls">0</span>
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
                        <div data-bs-toggle="modal" data-bs-target="#deliveryarea" class="delivery-area d-md-flex d-none">
                            <i data-feather="map-pin"></i>
                            <div>
                                <h6>{{ __('trans.Delivery to') }} </h6>
                                {{-- <h5>400520</h5> --}}
                            </div>
                        </div>
                        <div class="main-nav-center">
                            <nav class="text-start">
                                <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                <ul class="sm pixelstrap sm-horizontal">
                                    <li>
                                        <div class="mobile-back text-end">{{ __('trans.Back') }}<i class="fa fa-angle-right ps-2"
                                                aria-hidden="true"></i></div>
                                    </li>
                                    <li><a href="#">{{__('trans.Home') }}</a></li>
                                    <li class="mega" id="hover-cls">
                                        <a href="#">{{__('trans.feature') }}</a>
                                    </li>
                                    <li><a href="#">{{__('trans.shop') }}</a></li>
                                    <li><a href="#">{{__('trans.product') }}</a></li>
                                    <li><a href="#">{{__('trans.pages') }}</a></li>
                                    <li><a href="{{ route('blogs') }}">{{__('trans.blog') }}</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="delivery-area d-xl-flex d-none ms-auto me-0">
                            <div>
                                <h5>{{__('trans.Call us') }}: {{  App\Models\Navbar::first()->call_us }}</h5>
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
                    <h4 class="mb-0"> {{ __('trans.Welcome to') }} {{ App\Models\TopNavbar::first()->welcome_to }}!! Delivery in <span>{{ App\Models\TopNavbar::first()->deliver_in }}.</span> </h4>
                    <div class="delivery-area d-md-block d-none">
                        <div>
                            <h5>{{ __('trans.Limited Time offer') }}</h5>
                            <h4>{{ __('trans.code') }}: {{ App\Models\TopNavbar::first()->code }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <a href="javascript:void(0)" class="close-btn"><i data-feather="x"></i></a>
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
                            <li>{{ __('trans.Welcome to Our store') }} {{ App\Models\TopNavbar::first()->welcome_to }}</li>
                            <li><a href="become-vendor.html" class="text-white fw-bold">{{ __('trans.Become a Vendor') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 text-end">
                    <ul class="header-dropdown">
                        <li class="mobile-wishlist pe-0"><a href="{{ route('wishlists') }}"><i class="fa fa-heart"
                                    aria-hidden="true"></i></a>
                        </li>
                        <li class="onhover-dropdown mobile-account"><i class="fa fa-user" aria-hidden="true"></i>
                            {{ __('trans.My Account') }} 
                            <ul class="onhover-show-div">
                                <li><a href="login.html">{{ __('trans.Login') }}</a></li>
                                <li><a href="register.html">{{ __('trans.register') }}</a></li>
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
                            <a href="index.html"><img src="{{ asset(''. App\Models\Navbar::first()->logo .'') }}"
                                    class="img-fluid blur-up lazyload" alt=""></a>
                        </div>
                    </div>
                    <div>
                        <form class="form_search" role="form">
                            <input id="query search-autocomplete" type="search"
                                placeholder="Search any Device or Gadgets..." class="nav-search nav-search-field"
                                aria-expanded="true">
                            <button type="submit" name="nav-submit-button" class="btn-search">
                                <i class="ti-search"></i>
                            </button>
                        </form>
                    </div>
                    <div class="menu-right pull-right">
                        <div>
                            <div class="icon-nav">
                                <ul>
                                    <li class="onhover-div mobile-search d-xl-none d-inline-block">
                                        <div><img src="../assets/images/icon/search.png" onclick="openSearch()"
                                                class="img-fluid blur-up lazyload" alt=""><i class="ti-search"
                                                onclick="openSearch()"></i></div>
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
                                                                            placeholder="{{ __('trans.Search a Product') }}">
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
                                        <div><img src="../assets/images/icon/setting.png"
                                                class="img-fluid blur-up lazyload" alt=""><i
                                                class="ti-settings"></i></div>
                                        <div class="show-div setting">
                                            <h6>{{ __('trans.language') }}</h6>
                                            <ul>
                                                  <li><a href="{{url('/language/en')}}">{{__('trans.english') }} <img src="{{ asset('assets/images/flags/united-kingdom.png') }}" style="margin-left: 5px"></a></li>
                                                    <li><a href="{{url('/language/ar')}}">{{__('trans.arabic') }} <img src="{{ asset('assets/images/flags/egypt.png') }}" style="margin-left: 25px"></a></li>
                                            </ul>
                                            {{-- <h6>currency</h6>
                                            <ul class="list-inline">
                                                <li><a href="#">euro</a></li>
                                                <li><a href="#">rupees</a></li>
                                                <li><a href="#">pound</a></li>
                                                <li><a href="#">doller</a></li>
                                            </ul> --}}
                                        </div>
                                    </li>
                                    <li class="onhover-div mobile-cart">
                                        <div><img src="../assets/images/icon/cart.png"
                                                class="img-fluid blur-up lazyload" alt=""><i
                                                class="ti-shopping-cart"></i></div>
                                        <span class="cart_qty_cls">0</span>
                                        <ul class="show-div shopping-cart">
                                            <li>
                                                <div class="media">
                                                    <a href="#"><img alt="" class="me-3"
                                                            src="../assets/images/fashion/product/1.jpg"></a>
                                                    <div class="media-body">
                                                        <a href="#">
                                                            <h4>item name</h4>
                                                        </a>
                                                        <h4><span>1 x $ 299.00</span></h4>
                                                    </div>
                                                </div>
                                                <div class="close-circle"><a href="#"><i class="fa fa-times"
                                                            aria-hidden="true"></i></a></div>
                                            </li>
                                            <li>
                                                <div class="media">
                                                    <a href="#"><img alt="" class="me-3"
                                                            src="../assets/images/fashion/product/2.jpg"></a>
                                                    <div class="media-body">
                                                        <a href="#">
                                                            <h4>item name</h4>
                                                        </a>
                                                        <h4><span>1 x $ 299.00</span></h4>
                                                    </div>
                                                </div>
                                                <div class="close-circle"><a href="#"><i class="fa fa-times"
                                                            aria-hidden="true"></i></a></div>
                                            </li>
                                            <li>
                                                <div class="total">
                                                    <h5>subtotal : <span>$299.00</span></h5>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="buttons"><a href="cart.html" class="view-cart">view
                                                        cart</a> <a href="#" class="checkout">checkout</a></div>
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
                    <div data-bs-toggle="modal" data-bs-target="#deliveryarea" class="delivery-area d-md-flex d-none">
                        <i data-feather="map-pin"></i>
                        <div>
                            <h6>{{ __('trans.Delivery to') }}</h6>
                            {{-- <h5>400520</h5> --}}
                        </div>
                    </div>
                    <div class="main-nav-center">
                        <nav id="main-nav" class="text-start">
                            <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                            <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                <li>
                                    <div class="mobile-back text-end">Back<i class="fa fa-angle-right ps-2"
                                            aria-hidden="true"></i></div>
                                </li>
                                <li><a href="#">{{__('trans.Home') }}</a></li>
                                <li class="mega" id="hover-cls">
                                    <a href="#">{{__('trans.feature') }}</a>
                                    <ul class="mega-menu full-mega-menu">
                                        <li>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col mega-box">
                                                        <div class="link-section">
                                                            <div class="menu-title">
                                                                <h5>{{ __('trans.invoice template') }}</h5>
                                                            </div>
                                                            <div class="menu-content">
                                                                <ul>
                                                                    <li><a target="_blank"
                                                                            href="invoice-1.html">invoice
                                                                            1</a></li>
                                                                    <li><a target="_blank"
                                                                            href="invoice-2.html">invoice
                                                                            2</a></li>
                                                                    <li><a target="_blank"
                                                                            href="invoice-3.html">invoice
                                                                            3</a></li>
                                                                    <li><a target="_blank"
                                                                            href="invoice-4.html">invoice
                                                                            4</a></li>
                                                                    <li><a target="_blank"
                                                                            href="invoice-5.html">invoice
                                                                            5</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="menu-title mt-2">
                                                                <h5>elements</h5>
                                                            </div>
                                                            <div class="menu-content">
                                                                <ul>
                                                                    <li><a href="elements.html">
                                                                            elements page<i
                                                                                class="ms-2 fa fa-bolt icon-trend"
                                                                                aria-hidden="true"></i>
                                                                        </a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col mega-box">
                                                        <div class="link-section">
                                                            <div class="menu-title">
                                                                <h5>email template</h5>
                                                            </div>
                                                            <div class="menu-content">
                                                                <ul>
                                                                    <li><a target="_blank"
                                                                            href="../email-template/welcome.html">welcome</a>
                                                                    </li>
                                                                    <li><a target="_blank"
                                                                            href="../email-template/new-product-announcement.html">announcement</a>
                                                                    </li>
                                                                    <li><a target="_blank"
                                                                            href="../email-template/abandonment-email.html">abandonment</a>
                                                                    </li>
                                                                    <li><a target="_blank"
                                                                            href="../email-template/offer.html">offer</a>
                                                                    </li>
                                                                    <li><a target="_blank"
                                                                            href="../email-template/offer-2.html">offer
                                                                            2</a></li>
                                                                    <li><a target="_blank"
                                                                            href="../email-template/product-review.html">review</a>
                                                                    </li>
                                                                    <li><a target="_blank"
                                                                            href="../email-template/featured-products.html">featured
                                                                            product</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col mega-box">
                                                        <div class="link-section">
                                                            <div class="menu-title">
                                                                <h5>email template</h5>
                                                            </div>
                                                            <div class="menu-content">
                                                                <ul>
                                                                    <li><a target="_blank"
                                                                            href="../email-template/black-friday.html">black
                                                                            friday</a></li>
                                                                    <li><a target="_blank"
                                                                            href="../email-template/christmas.html">christmas</a>
                                                                    </li>
                                                                    <li><a target="_blank"
                                                                            href="../email-template/cyber-monday.html">cyber-monday</a>
                                                                    </li>
                                                                    <li><a target="_blank"
                                                                            href="../email-template/flash-sale.html">flash
                                                                            sale</a></li>
                                                                    <li><a target="_blank"
                                                                            href="../email-template/email-order-success.html">order
                                                                            success</a></li>
                                                                    <li><a target="_blank"
                                                                            href="../email-template/email-order-success-two.html">order
                                                                            success 2</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col mega-box">
                                                        <div class="link-section">
                                                            <div class="menu-title">
                                                                <h5>cookie bar</h5>
                                                            </div>
                                                            <div class="menu-content">
                                                                <ul>
                                                                    <li><a href="index.html">bottom<i
                                                                                class="ms-2 fa fa-bolt icon-trend"
                                                                                aria-hidden="true"></i></a></li>
                                                                    <li><a href="fashion-4.html">bottom left</a>
                                                                    </li>
                                                                    <li><a href="bicycle.html">bottom right</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="menu-title mt-2">
                                                                <h5>search</h5>
                                                            </div>
                                                            <div class="menu-content">
                                                                <ul>
                                                                    <li><a href="marketplace-demo-2.html">ajax
                                                                            search<i
                                                                                class="ms-2 fa fa-bolt icon-trend"
                                                                                aria-hidden="true"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col mega-box">
                                                        <div class="link-section">
                                                            <div class="menu-title">
                                                                <h5>model</h5>
                                                            </div>
                                                            <div class="menu-content">
                                                                <ul>
                                                                    <li><a href="index.html">Newsletter</a></li>
                                                                    <li><a href="index.html">exit<i
                                                                                class="ms-2 fa fa-bolt icon-trend"
                                                                                aria-hidden="true"></i></a></li>
                                                                    <li><a href="christmas.html">christmas</a>
                                                                    </li>
                                                                    <li><a href="furniture-3.html">black
                                                                            friday</a></li>
                                                                    <li><a href="fashion-4.html">cyber
                                                                            monday</a></li>
                                                                    <li><a href="marketplace-demo-3.html">new
                                                                            year</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col mega-box">
                                                        <div class="link-section">
                                                            <div class="menu-title">
                                                                <h5>add to cart</h5>
                                                            </div>
                                                            <div class="menu-content">
                                                                <ul>
                                                                    <li><a href="nursery.html">cart modal
                                                                            popup</a></li>
                                                                    <li><a href="vegetables.html">qty. counter
                                                                            <i class="fa fa-bolt icon-trend"
                                                                                aria-hidden="true"></i></a></li>
                                                                    <li><a href="bags.html">cart top</a></li>
                                                                    <li><a href="shoes.html">cart bottom</a>
                                                                    </li>
                                                                    <li><a href="watch.html">cart left</a></li>
                                                                    <li><a href="tools.html">cart right</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <img src="../assets/images/menu-banner.jpg"
                                                            class="img-fluid mega-img">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">{{__('trans.shop') }}</a>
                                    <ul>
                                        <li><a href="category-page(vegetables).html">tab style<span
                                            class="new-tag">new</span></a></li>
                                        <li><a href="category-page(top-filter).html">top filter</a></li>
                                        <li><a href="category-page(modern).html">modern</a></li>
                                        <li><a href="category-page.html">left sidebar</a></li>
                                        <li><a href="category-page(right).html">right sidebar</a></li>
                                        <li><a href="category-page(no-sidebar).html">no sidebar</a></li>
                                        <li><a href="category-page(sidebar-popup).html">sidebar popup</a>
                                        </li>
                                        <li><a href="category-page(metro).html">metro</a></li>
                                        <li><a href="category-page(full-width).html">full width</a></li>
                                        <li><a href="category-page(infinite-scroll).html">infinite
                                                scroll</a></li>
                                        <li><a href=category-page(3-grid).html>three grid</a></li>
                                        <li><a href="category-page(6-grid).html">six grid</a></li>
                                        <li><a href="category-page(list-view).html">list view</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">{{__('trans.product') }}</a>
                                    <ul>
                                        <li><a href="product-page(360-view).html">360 view <span
                                                    class="new-tag">new</span></a></li>
                                        <li><a href="product-page(video-thumbnail).html">video
                                                thumbnail<span class="new-tag">new</span></a></li>
                                        <li>
                                            <a href="#">sidebar</a>
                                            <ul>
                                                <li><a href="product-page.html">left sidebar</a></li>
                                                <li><a href="product-page(right-sidebar).html">right
                                                        sidebar</a>
                                                </li>
                                                <li><a href="product-page(no-sidebar).html">no sidebar</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">thumbnail image</a>
                                            <ul>
                                                <li><a href="product-page(left-image).html">left image</a>
                                                </li>
                                                <li><a href="product-page(right-image).html">right image</a>
                                                </li>
                                                <li><a href="product-page(image-outside).html">image
                                                        outside</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">three column</a>
                                            <ul>
                                                <li><a href="product-page(3-col-left).html">thumbnail
                                                        left</a>
                                                </li>
                                                <li><a href="product-page(3-col-right).html">thumbnail
                                                        right</a>
                                                </li>
                                                <li><a href="product-page(3-column).html">thubnail
                                                        bottom</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="product-page(4-image).html">four image</a></li>
                                        <li><a href="product-page(sticky).html">sticky</a></li>
                                        <li><a href="product-page(accordian).html">accordian</a></li>
                                        <li><a href="product-page(bundle).html">bundle</a></li>
                                        <li><a href="product-page(image-swatch).html">image swatch </a></li>
                                        <li><a href="product-page(vertical-tab).html">vertical tab</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">{{__('trans.pages') }}</a>
                                    <ul>
                                        <li>
                                            <a href="#">vendor</a>
                                            <ul>
                                                <li><a href="vendor-dashboard.html">vendor dashboard</a>
                                                </li>
                                                <li><a href="vendor-profile.html">vendor profile</a></li>
                                                <li><a href="become-vendor.html">become vendor</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">account</a>
                                            <ul>
                                                <li><a href="{{ route('wishlists') }}">{{ __('trans.wishlist') }}</a></li>
                                                <li><a href="cart.html">cart</a></li>
                                                <li><a href="dashboard.html">Dashboard</a></li>
                                                <li><a href="login.html">login</a></li>
                                                <li><a href="register.html">register</a></li>
                                                <li><a href="contact.html">contact</a></li>
                                                <li><a href="forget_pwd.html">forget password</a></li>
                                                <li><a href="profile.html">profile</a></li>
                                                <li><a href="checkout.html">checkout</a></li>
                                                <li><a href="order-success.html">order success</a></li>
                                                <li><a href="order-tracking.html">order tracking<span
                                                            class="new-tag">new</span></a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">portfolio</a>
                                            <ul>
                                                <li><a href="">grid</a>
                                                    <ul>
                                                        <li><a href="grid-2-col.html">grid
                                                                2</a></li>
                                                        <li><a href="grid-3-col.html">grid
                                                                3</a></li>
                                                        <li><a href="grid-4-col.html">grid
                                                                4</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="">masonry</a>
                                                    <ul>
                                                        <li><a href="masonary-2-grid.html">grid 2</a></li>
                                                        <li><a href="masonary-3-grid.html">grid 3</a></li>
                                                        <li><a href="masonary-4-grid.html">grid 4</a></li>
                                                        <li><a href="masonary-fullwidth.html">full width</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="about-page.html">about us</a></li>
                                        <li><a href="search.html">search</a></li>
                                        <li><a href="review.html">review</a>
                                        </li>
                                        <li>
                                            <a href="#">compare</a>
                                            <ul>
                                                <li><a href="compare.html">compare</a></li>
                                                <li><a href="compare-2.html">compare-2</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="collection.html">collection</a></li>
                                        <li><a href="lookbook.html">lookbook</a></li>
                                        <li><a href="sitemap.html">site map</a>
                                        </li>
                                        <li><a href="404.html">404</a></li>
                                        <li><a href="coming-soon.html">coming soon</a></li>
                                        <li><a href="faq.html">FAQ</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('blogs') }}">{{__('trans.blog') }}</a>
                                    <ul>
                                        <li><a href="blog-page.html">left sidebar</a></li>
                                        <li><a href="blog(right-sidebar).html">right sidebar</a></li>
                                        <li><a href="blog(no-sidebar).html">no sidebar</a></li>
                                        <li><a href="blog-details.html">blog details</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="delivery-area d-xl-flex d-none ms-auto me-0">
                        <div>
                            <h5>{{__('trans.Call us') }}: {{  App\Models\Navbar::first()->call_us }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header end -->
