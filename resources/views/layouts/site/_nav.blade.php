@php
    $lang = session()->get('locale');
@endphp
<div class="allNavs" id="allNavCustom">
    <!-- ------------------------- start upper navbar ---- -------------------- -->
    <div class="upperNav" id="upperNavCustom">
        <div class="container">
            <div class="row">
                @if ($lang == 'en')
                    <div class="col-md-6">
                        <div class="discount">
                            @if ($lang == 'ar')
                                <p style="background-color: #f3a095; direction: rtl">
                                @else
                                <p style="background-color: #f3a095; direction: ltr">
                            @endif
                            {{ $lang == 'en' ? \App\Models\TopNavbar::first()->title_en : \App\Models\TopNavbar::first()->title_ar }}

                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="callUs">

                            @if ($lang == 'en')
                                <a href="{{ url('language/ar') }}" style="text-decoration: none">
                                    <span id="change_lang" style="font-weight: bold; cursor: pointer"> ع : </span>
                                    <span id="change_lang_image" style="cursor: pointer"><img
                                            src="{{ asset('user_assets/images/flags/emaratFlag.webp') }}"
                                            style="width: 20px" /></span>
                                </a>
                            @else
                                <a href="{{ url('language/en') }}" style="text-decoration: none">
                                    <span id="change_lang" style="font-weight: bold; cursor: pointer"> En : </span>
                                    <span id="change_lang_image" style="cursor: pointer"><img
                                            src="{{ asset('user_assets/images/flags/bretania.png') }}"
                                            style="width: 20px" /></span>
                                </a>
                            @endif

                            @if (auth()->user())
                                <a href="{{ url('login') }}" style="color: #000; margin-left: 20px">
                                    <img src="{{ asset('user_assets/uploads/users_profile/' . auth()->user()->image) }}"
                                        style="width: 30px; border-radius: 50%">
                                    {{ auth()->user()->name }}
                                </a>
                                |
                                <a href="{{ url('logout') }}"
                                    style="color: #fff; background-color: #f3a095; padding: 5px 15px;">
                                    {{ trans('trans.logout') }}
                                </a>
                            @else
                                <a href="{{ url('login') }}" style="color: #000; margin-left: 20px">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    {{ trans('trans.auth_title') }}
                                </a>
                            @endif

                        </div>
                    </div>
                @else
                    <div class="col-md-6">
                        <div class="callUs" style="text-align: left">

                            @if ($lang == 'en')
                                <a href="{{ url('language/ar') }}" style="text-decoration: none">
                                    <span id="change_lang" style="font-weight: bold; cursor: pointer"> ع : </span>
                                    <span id="change_lang_image" style="cursor: pointer"><img
                                            src="{{ asset('user_assets/images/flags/emaratFlag.webp') }}"
                                            style="width: 20px" /></span>
                                </a>
                            @else
                                <a href="{{ url('language/en') }}" style="text-decoration: none">
                                    <span id="change_lang" style="font-weight: bold; cursor: pointer"> En : </span>
                                    <span id="change_lang_image" style="cursor: pointer"><img
                                            src="{{ asset('user_assets/images/flags/bretania.png') }}"
                                            style="width: 20px" /></span>
                                </a>
                            @endif




                            @if (auth()->user())
                                <a href="{{ url('login') }}" style="color: #000; margin-left: 20px">
                                    <img src="{{ asset('user_assets/uploads/users_profile/' . auth()->user()->image) }}"
                                        style="width: 30px; border-radius: 50%">
                                    {{ auth()->user()->name }}
                                </a>
                                |
                                <a href="{{ url('logout') }}"
                                    style="color: #fff; background-color: #f3a095; padding: 5px 15px;">
                                    {{ trans('trans.logout') }}
                                </a>
                            @else
                                <a href="{{ url('login') }}" style="color: #000; margin-left: 20px">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    {{ trans('trans.auth_title') }}
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="discount" style="text-align: right">
                            @if ($lang == 'ar')
                                <p style="background-color: #f3a095; direction: rtl">
                                @else
                                <p style="background-color: #f3a095; direction: ltr">
                            @endif
                            {{ $lang == 'en' ? \App\Models\TopNavbar::first()->title_en : \App\Models\TopNavbar::first()->title_ar }}

                            </p>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
    <!-- ------------------------- end upper navbar ---- -------------------- -->

    <!-- ------------------ start navbar ---------------------------- -->
    <nav class="navbar" id="main_navbar" style="padding: 0px">
        <div class="container">
            <div class="row">


                @if ($lang == 'en')
                    <!--left-->
                    <div class="col-lg-5 col-md-12 col-12" id="big_screen_navbar">
                        <nav class="navbar navbar-expand-lg navbar-dark"
                            style="background-color: #fff; padding: 40px 0px; text-align: left">
                            <button class="navbar-toggler form-control" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation"
                                style="border: 1px solid red; color: #000">
                                Menu
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" style="color: #000"
                                            href="index.html">{{ trans('trans.Home') }}</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a style="color: #000" class="nav-link dropdown-toggle" href="#"
                                            id="navbarDropdown" role="button" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            {{ trans('trans.Pages') }}
                                        </a>
                                        @if ($lang == 'en')
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown"
                                                style="text-align: left">
                                            @else
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdown"
                                                    style="text-align: right">
                                        @endif
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <ul class="nav flex-column">
                                                        <p style="font-weight: bold">

                                                            {{ trans('trans.Products And Halls') }}
                                                        </p>
                                                        <li class="nav-item">
                                                            <a class="nav-link" style="color: #000"
                                                                href="chocalates.html">{{ trans('trans.Chocalates') }}</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" style="color: #000"
                                                                href="latest_product.html">{{ trans('trans.Latest Products') }}</a>
                                                        </li>

                                                        <li class="nav-item">
                                                            <a class="nav-link" style="color: #000"
                                                                href="WeadingHalls.html">{{ trans('trans.Wedding Halls') }}</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" style="color: #000"
                                                                href="Wishlist.html">{{ trans('trans.Wishlist') }}</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link active" style="color: #000"
                                                                href="orderDetails.html">{{ trans('trans.Order Details') }}</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" style="color: #000"
                                                                href="querys.html">{{ trans('trans.querys') }}</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-6">
                                                    <ul class="nav flex-column">
                                                        <p style="font-weight: bold">{{ trans('trans.Settings') }}</p>
                                                        <li class="nav-item">
                                                            <a class="nav-link" style="color: #000"
                                                                href="news.html">{{ trans('trans.News') }}</a>
                                                        </li>

                                                        <li class="nav-item">
                                                            <a class="nav-link" style="color: #000"
                                                                href="privacy.html">{{ trans('trans.Privacy') }}</a>
                                                        </li>

                                                        <li class="nav-item">
                                                            <a class="nav-link" style="color: #000"
                                                                href="terms.html">{{ trans('trans.Terms And Conditions') }}</a>
                                                        </li>

                                                        <li class="nav-item">
                                                            <a class="nav-link active" style="color: #000"
                                                                href="profile.html">{{ trans('trans.Profile') }}</a>
                                                        </li>

                                                        <li class="nav-item">
                                                            <a class="nav-link" style="color: #000"
                                                                href="terms.html">{{ trans('trans.Account') }}</a>
                                                        </li>

                                                        <li class="nav-item">
                                                            <a class="nav-link active" style="color: #000"
                                                                href="profile.html">{{ trans('trans.User Information') }}</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- /.col-md-4  -->
                                            </div>
                                        </div>
                                        <!--  /.container  -->
                            </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a style="color: #000" class="nav-link dropdown-toggle" href="#"
                                    id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    {{ trans('trans.Brands') }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" style="color: #000"
                                                            href="#">Brand 1</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" style="color: #000" href="#">Brand
                                                            2</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" style="color: #000" href="#">Brand
                                                            3</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6" style="text-align: right">
                                                @if (App\Models\ClientsAd::brandMenu()->first())
                                                    <a
                                                        href="{{ App\Models\ClientsAd::brandMenu()->first()->ad->link }}">
                                                        <img style="width: 100%; margin: auto"
                                                            src="{{ asset('user_assets/uploads/ads/' . App\Models\ClientsAd::brandMenu()->first()->ad->image) }}"
                                                            alt="" class="img-fluid" />
                                                    </a>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                    <!--  /.container  -->
                                </div>
                            </li>
                            </ul>
                    </div>
    </nav>
</div>
<!--logo-->
<div class="col-lg-2 col-12">
    <div class="logo" style="padding-bottom: 20px">
        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
        <img src="{{ asset('user_assets/images/logo/logo.png') }}" />
    </div>
</div>
<!-- right -->
<div class="col-lg-5" style="">
    <div class="favorit" id="choose_city_fav_bag" style="width: 400px; padding: 30px">
        <ul class="list-unstyled nav2 d-flex">
            <li id="search_icon">
                <i class="fas fa-search"></i>
            </li>
            <li class="user" class="btn btn-primary" data-toggle="modal" data-target="#openCities"
                style="cursor: pointer">
                <p>
                    <img src="{{ asset('user_assets/images/flags/emaratFlag.webp') }}" width="25px" />
                    {{ trans('trans.AbuDabhi') }}
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                </p>
            </li>

            <!-- Modal For Open cities -->
            <div class="modal fade" id="openCities" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" id="modal_diaglog_show_cities" role="document">
                    <div class="modal-content" id="modal_content_show_citites" style="width: 600px">
                        <div class="modal-header" style="background: none">
                            <button style="outline: none" type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="modal_body_show_cities"
                            style="
                                                    padding: 10px;
                                                    background-color: #fff;
                                                    width: 598px;
                                                    z-index: 1;
                                                ">
                            <img src="{{ asset('user_assets/images/bestSales/photo-1546548729-375ff057ec22.jpg') }}"
                                style="width: 100%" />
                            <h4
                                style="
                                                    text-align: center;
                                                    font-family: Sulphur Point;
                                                    margin-bottom: 30px;
                                                    ">
                                Which Country Would You Like To Send A Gift To ?
                            </h4>
                            <div class="container">
                                <div class="row" style="text-align: center">
                                    <div class="col-lg-3 col-6" style="cursor: pointer">
                                        <img src="{{ asset('user_assets/images/flags/egypt.webp') }}" id="egypt_flag"
                                            width="80px" />
                                        <p style="font-weight: bold">Egypt</p>
                                    </div>
                                    <div class="col-lg-3 col-6" style="cursor: pointer">
                                        <img src="{{ asset('user_assets/images/flags/reaq.png') }}" id="eraq_flage"
                                            width="80px" />
                                        <p style="font-weight: bold">Eraq</p>
                                    </div>
                                    <div class="col-lg-3 col-6" style="cursor: pointer">
                                        <img src="{{ asset('user_assets/images/flags/emaratFlag.webp') }}"
                                            id="emarat_flag" width="80px" />
                                        <p style="font-weight: bold">Emarat</p>
                                    </div>
                                    <div class="col-lg-3 col-6" style="cursor: pointer">
                                        <img src="{{ asset('user_assets/images/flags/tunis.png') }}" id="tunis_flag"
                                            width="80px" />
                                        <p style="font-weight: bold">Tunis</p>
                                    </div>
                                </div>
                                <div id="flag_cities" class="container"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <li class="user" class="btn btn-primary" hidden>
                <i class="far fa-user"></i>
                <div class="userProfile">
                    <ul class="list-unstyled">
                        <li>
                            <a href="./userInformation.html">user information</a>
                        </li>
                        <li>
                            <a href="./forgetPassword.htm">forget Password</a>
                        </li>
                        <li>
                            <a href="./login.html">sign in</a>
                        </li>
                        <li>
                            <a href="./signUp.html">sign up</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="favorit">
                <i class="far fa-heart favoritCartIcon"></i>
                <span>0</span>
            </li>
            <li>
                <img src="{{ asset('user_assets/images/logo/shopping-bag.png') }}" class="shoppingCurtIcon"
                    alt="" />
                <span></span>
            </li>
        </ul>
        <div class="shoppingCurt" style="width: 100% !important ; right: 0px">
            <h2>My Shopping Cart</h2>
            <ul class="list-unstyled" id="list-unstyled">
                <li>
                    hello
                </li>
            </ul>
            <div class="totalPrice d-flex">
                <span>Total</span>
                <span>1,387 AED</span>
            </div>
            <a href="{{ url('my-cart') }}" id="checkout-btn" style="visibility: hidden">checkout</a>
        </div>
        <div class="favoritCart" style="width: 100% !important; right: 0px !important">
            <h2>My favorit Cart</h2>
            <form action="">
                <ul class="list-unstyled"></ul>
            </form>
        </div>
    </div>
    <div id="search_input" style="display: none">
        <input id="input_search_input" type="text"
            style="
                                    width: 84%;
                                    border-radius: 10px 0px 0px 10px;
                                    padding: 5px;
                                    border: 1px solid #f3a095;
                                    outline: none;
                                    color: #f3a095;
                                    margin-bottom: 20px;
                                " />
        <a href="SearchResult.html"
            style="
                                    background-color: #f3a095;
                                    color: #fff;
                                    border-radius: 0px 10px 10px 0px;
                                    display: inline-block;
                                    padding: 6px 10px;
                                ">
            {{ trans('trans.Search') }}
        </a>
    </div>
</div>
@else
<!-- right -->
<div class="col-lg-5" style="">
    <div class="favorit" id="choose_city_fav_bag" style="width: 400px; padding: 30px; direction: rtl">
        <ul class="list-unstyled nav2 d-flex">
            <li id="search_icon">
                <i class="fas fa-search"></i>
            </li>
            <li class="user" class="btn btn-primary" data-toggle="modal" data-target="#openCities"
                style="cursor: pointer">
                <p>
                    <img src="{{ asset('user_assets/images/flags/emaratFlag.webp') }}" width="25px" />
                    {{ trans('trans.AbuDabhi') }}
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                </p>
            </li>

            <!-- Modal For Open cities -->
            <div class="modal fade" id="openCities" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" id="modal_diaglog_show_cities" role="document">
                    <div class="modal-content" id="modal_content_show_citites" style="width: 600px">
                        <div class="modal-header" style="background: none">
                            <button style="outline: none" type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="modal_body_show_cities"
                            style="
                                                    padding: 10px;
                                                    background-color: #fff;
                                                    width: 598px;
                                                    z-index: 1;
                                                ">
                            <img src="{{ asset('user_assets/images/bestSales/photo-1546548729-375ff057ec22.jpg') }}"
                                style="width: 100%" />
                            <h4
                                style="
                                                    text-align: center;
                                                    font-family: Sulphur Point;
                                                    margin-bottom: 30px;
                                                    ">
                                {{ trans('trans.choose_city') }}
                            </h4>
                            <div class="container">
                                <div class="row" style="text-align: center">
                                    <div class="col-lg-3 col-6" style="cursor: pointer">
                                        <img src="{{ asset('user_assets/images/flags/egypt.webp') }}" id="egypt_flag"
                                            width="80px" />
                                        <p style="font-weight: bold">Egypt</p>
                                    </div>
                                    <div class="col-lg-3 col-6" style="cursor: pointer">
                                        <img src="{{ asset('user_assets/images/flags/reaq.png') }}" id="eraq_flage"
                                            width="80px" />
                                        <p style="font-weight: bold">Eraq</p>
                                    </div>
                                    <div class="col-lg-3 col-6" style="cursor: pointer">
                                        <img src="{{ asset('user_assets/images/flags/emaratFlag.webp') }}"
                                            id="emarat_flag" width="80px" />
                                        <p style="font-weight: bold">Emarat</p>
                                    </div>
                                    <div class="col-lg-3 col-6" style="cursor: pointer">
                                        <img src="{{ asset('user_assets/images/flags/tunis.png') }}" id="tunis_flag"
                                            width="80px" />
                                        <p style="font-weight: bold">Tunis</p>
                                    </div>
                                </div>
                                <div id="flag_cities" class="container"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <li class="user" class="btn btn-primary" hidden>
                <i class="far fa-user"></i>
                <div class="userProfile">
                    <ul class="list-unstyled">
                        <li>
                            <a href="./userInformation.html">user information</a>
                        </li>
                        <li>
                            <a href="./forgetPassword.htm">forget Password</a>
                        </li>
                        <li>
                            <a href="./login.html">sign in</a>
                        </li>
                        <li>
                            <a href="./signUp.html">sign up</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="favorit">
                <i class="far fa-heart favoritCartIcon"></i>
                <span>0</span>
            </li>
            <li>
                <img src="{{ asset('user_assets/images/logo/shopping-bag.png') }}" class="shoppingCurtIcon"
                    alt="" />
                <span></span>
            </li>
        </ul>
        <div class="shoppingCurt" style="width: 100% !important ; right: 0px">
            <h2>My Shopping Cart</h2>
            <ul class="list-unstyled" id="list-unstyled">
            </ul>
            <div class="totalPrice d-flex">
                <span>Total</span>
                <span>1,387 AED</span>
            </div>
            <a href="{{ url('my-cart') }}" id="checkout-btn" style="visibility: hidden">checkout</a>

        </div>
        <div class="favoritCart" style="width: 100% !important; right: 0px !important">
            <h2>My favorit Cart</h2>
            <form action="">
                <ul class="list-unstyled"></ul>
            </form>
        </div>
    </div>
    <div id="search_input" style="display: none">
        <input id="input_search_input" type="text"
            style="
                                    width: 84%;
                                    border-radius: 10px 0px 0px 10px;
                                    padding: 5px;
                                    border: 1px solid #f3a095;
                                    outline: none;
                                    color: #f3a095;
                                    margin-bottom: 20px;
                                " />
        <a href="SearchResult.html"
            style="
                                    background-color: #f3a095;
                                    color: #fff;
                                    border-radius: 0px 10px 10px 0px;
                                    display: inline-block;
                                    padding: 6px 10px;
                                ">
            {{ trans('trans.Search') }}
        </a>
    </div>
</div>
<!--logo-->
<div class="col-lg-2 col-12">
    <div class="logo" style="padding-bottom: 20px">
        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
        <img src="{{ asset('user_assets/images/logo/logo.png') }}" />
    </div>
</div>
<!--left-->
<div class="col-lg-5 col-md-12 col-12" id="big_screen_navbar">
    <nav class="navbar navbar-expand-lg navbar-dark"
        style="background-color: #fff; padding: 40px 0px; direction: ltr">
        <button class="navbar-toggler form-control" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation" style="border: 1px solid red; color: #000">
            Menu
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="direction: rtl;">
            <ul class="navbar-nav mr-auto" style="display: contents;">
                <li class="nav-item">
                    <a class="nav-link" style="color: #000" href="index.html">{{ trans('trans.Home') }}</a>
                </li>
                <li class="nav-item dropdown">
                    <a style="color: #000" class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ trans('trans.Pages') }}
                    </a>
                    @if ($lang == 'en')
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="text-align: left">
                        @else
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="text-align: left">
                    @endif
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="nav flex-column">
                                    <p style="font-weight: bold">

                                        {{ trans('trans.Products And Halls') }}
                                    </p>
                                    <li class="nav-item">
                                        <a class="nav-link" style="color: #000"
                                            href="chocalates.html">{{ trans('trans.Chocalates') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" style="color: #000"
                                            href="latest_product.html">{{ trans('trans.Latest Products') }}</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" style="color: #000"
                                            href="WeadingHalls.html">{{ trans('trans.Wedding Halls') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" style="color: #000"
                                            href="Wishlist.html">{{ trans('trans.Wishlist') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" style="color: #000"
                                            href="orderDetails.html">{{ trans('trans.Order Details') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" style="color: #000"
                                            href="querys.html">{{ trans('trans.querys') }}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="nav flex-column">
                                    <p style="font-weight: bold">{{ trans('trans.Settings') }}</p>
                                    <li class="nav-item">
                                        <a class="nav-link" style="color: #000"
                                            href="news.html">{{ trans('trans.News') }}</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" style="color: #000"
                                            href="privacy.html">{{ trans('trans.Privacy') }}</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" style="color: #000"
                                            href="terms.html">{{ trans('trans.Terms And Conditions') }}</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link active" style="color: #000"
                                            href="profile.html">{{ trans('trans.Profile') }}</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" style="color: #000"
                                            href="terms.html">{{ trans('trans.Account') }}</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link active" style="color: #000"
                                            href="profile.html">{{ trans('trans.User Information') }}</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.col-md-4  -->
                        </div>
                    </div>
                    <!--  /.container  -->
        </div>
        </li>
        <li class="nav-item dropdown">
            <a style="color: #000" class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ trans('trans.Brands') }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link active" style="color: #000" href="#">Brand 1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="color: #000" href="#">Brand 2</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="color: #000" href="#">Brand 3</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6" style="text-align: right">
                            @if (App\Models\ClientsAd::brandMenu()->first())
                                <a href="{{ App\Models\ClientsAd::brandMenu()->first()->ad->link }}">
                                    <img style="width: 100%; margin: auto"
                                        src="{{ asset('user_assets/uploads/ads/' . App\Models\ClientsAd::brandMenu()->first()->ad->image) }}"
                                        alt="" class="img-fluid" />
                                </a>
                            @endif

                        </div>
                    </div>
                </div>
                <!--  /.container  -->
            </div>
        </li>
        </ul>
</div>
</nav>
</div>
@endif
</div>
</div>
</nav>
<!-- ------------------ end navbar ---------------------------- -->
</div>
