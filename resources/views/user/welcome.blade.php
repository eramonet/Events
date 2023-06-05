@extends('layouts.site.master')
@section('title')
    Index | Events
@endsection

@section('content')
    @php
        $lang = session()->get('locale');
    @endphp

    <!-- ------------------ start landing page ---------------------------- -->
    <br /><br />
    <!-- ------------------ start loading page page---------------------------- -->
    <div class="loadingPage active">
        <div class="wrapper">
            <div class="loader"></div>
        </div>
    </div>
    <!-- ------------------ end loading page page---------------------------- -->
    <section id="showDetails" class="showDetails" style="background-color: #fff; padding: 0px; z-index: 100">
        <div class="container" style="">
            <div class="row">

                <div class="col-lg-9 col-md-12 col-12">
                    <header style="border-radius: 10px">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" id="myCarousel" style="border-radius: 10px;">
                                <?php $counter = 0; ?>
                                @if (count($home_page_ads) > 0)
                                    @foreach ($home_page_ads as $home_slider)
                                        @if ($counter == 0)
                                            <div class="carousel-item header-carousel-item bg-cover active"
                                                style="background-image: url({{ asset('user_assets/uploads/ads/' . $home_slider->ad->image . '') }})">
                                            @else
                                                <div class="carousel-item header-carousel-item bg-cover"
                                                    style="background-image: url({{ asset('user_assets/uploads/ads/' . $home_slider->ad->image . '') }})">
                                        @endif
                                        <a href="{{ $home_slider->ad->link }}">
                                            @if (!$home_slider->ad->title_en && !$home_slider->ad->description_en)
                                                <div class="carousel-caption d-none d-md-block px-3"
                                                    style="text-align: left; height: 100%; bottom: 0px;">
                                                @else
                                                    <div class="carousel-caption d-none d-md-block px-3"
                                                        style="text-align: left; height: 100%; background-color: #0000004d; bottom: 0px;">
                                            @endif
                                            <div style=" width: 60%; padding: 20px; padding-top: 40%">
                                                <h3>{{ $home_slider->ad->title_en ? $home_slider->ad->title_en : '' }}
                                                </h3>
                                                <p>{{ $home_slider->ad->description_en ? $home_slider->ad->description_en : '' }}
                                                </p>
                                            </div>
                                        </a>
                                        <?php $counter++; ?>
                                    @endforeach
                                @else
                                    <div class="carousel-item header-carousel-item bg-cover active"
                                        style="background-image: url({{ asset('user_assets/uploads/ads/default_ads.bmp') }})">
                                    </div>
                                @endif


                            </div>


                        </div>
                    </header>
                </div>

                <script>
                    $(document).ready(function() {
                        $('#myCarousel').find('.item').first().addClass('active');
                    });
                </script>


                <div class="col-lg-3 col-md-12 col-12">
                    <div class="images">
                        <ul class="d-flex d-md-block list-unstyled" style="">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-10 col-md-10 col-12">
                                        <li id="images_of_big_slider btn2" class="active" data-aos="zoom-in"
                                            data-aos-duration="1500"
                                            style="
                                                width: 100%;
                                                height: 216px;
                                                border-radius: 10px;
                                                ">
                                            @if (App\Models\ClientsAd::subHome1()->first())
                                                <a href="{{ App\Models\ClientsAd::subHome1()->first()->ad->link }}">
                                                    <img src="{{ asset('user_assets/uploads/ads/' . App\Models\ClientsAd::subHome1()->first()->ad->image) }}"
                                                        style="height: 100%" />
                                                </a>
                                            @else
                                                <a>
                                                    <img src="{{ asset('user_assets/uploads/ads/default_ads.bmp') }}"
                                                        style="height: 100%" />
                                                </a>
                                            @endif

                                        </li>
                                    </div>
                                    <div class="col-lg-2 below_small_image_sliders"></div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-10 col-md-10 col-12">
                                        <li id="images_of_big_slider btn1" class="active" data-aos="zoom-in"
                                            data-aos-duration="1500"
                                            style="
                                width: 100%;
                                height: 216px;
                                border-radius: 10px;
                                ">
                                            @if (App\Models\ClientsAd::subHome1()->first())
                                                <a href="{{ App\Models\ClientsAd::subHome1()->first()->ad->link }}">
                                                    <img src="{{ asset('user_assets/uploads/ads/' . App\Models\ClientsAd::subHome2()->first()->ad->image) }}"
                                                        style="height: 100%" />
                                                </a>
                                            @else
                                                <a>
                                                    <img src="{{ asset('user_assets/uploads/ads/default_ads.bmp') }}"
                                                        style="height: 100%" />
                                                </a>
                                            @endif

                                        </li>
                                    </div>
                                    <div class="col-lg-2 below_small_image_sliders">
                                        <br />
                                        <img src="{{ asset('user_assets/images/flowers/right_small_image_slider.png') }}"
                                            style="width: 100px" />
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div class="container slider_doted_next_prev" style="text-align: center; padding: 30px; width: 100%; margin: auto">
            <div class="row">
                <div class="col-lg-1 left_buttons_flower">
                    <img src="{{ asset('user_assets/images/flowers/left_buttons.png') }}" style="width: 100px" />
                </div>
                @if ($lang == 'en')
                    <div class="col-lg-2 col-md-2 col-2" style="text-align: left;">
                    @else
                        <div class="col-lg-2 col-md-2 col-2" style="text-align: left; direction: ltr;">
                @endif

                <p style="color: #ff6e5a; font-weight: bold">
                    @if ($lang == 'en')
                        <span style="margin-right: 10px; cursor: pointer" id="prev_btn" href="#carouselExampleIndicators"
                            role="button" data-slide="prev"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                            {{ trans('trans.Prev') }}</span>
                        <span style="cursor: pointer" id="next_btn" href="#carouselExampleIndicators" role="button"
                            data-slide="next">{{ trans('trans.NEXT') }} <i class="fa fa-arrow-right"
                                aria-hidden="true"></i></span>
                    @else
                        <span style="margin-right: 10px; cursor: pointer" id="prev_btn" href="#carouselExampleIndicators"
                            role="button" data-slide="prev"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                            {{ trans('trans.Prev') }}</span>
                        <span style="cursor: pointer" id="next_btn" href="#carouselExampleIndicators" role="button"
                            data-slide="next">{{ trans('trans.NEXT') }} <i class="fa fa-arrow-right"
                                aria-hidden="true"></i></span>
                    @endif

                </p>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-5"></div>
        </div>
        </div>
    </section>
    <!--Introdution--starter temple-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        .header-carousel-item {
            height: 450px;
        }

        .bg-cover {
            background-size: cover;
            background-position: center center;
        }

        .carousel-caption {
            height: 50%;
            left: 0;
            text-align: left;
            width: 100%
        }
    </style>
    <!--navbar-->

    <!--optional javascript-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>


    <!-- ------------------ end landing page ---------------------------- -->

    <!-- ------------------ start Events Categories ---------------------------- -->
    <section class="eventsCategories" style="padding: 0px">
        <div class="container">
            <div class="head text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-11">
                            <img class="left_buttons_flower"
                                src="{{ asset('user_assets/images/flowers/left_buttons.png') }}" width="80px" />
                            <h2 data-aos="fade-left" data-aos-offset="0" data-aos-duration="2000"
                                style="display: contents">
                                {{ trans('trans.Events Categories') }}
                            </h2>
                        </div>
                        <div class="col-lg-1 left_buttons_flower">
                            <img src="{{ asset('user_assets/images/flowers/right_event.png') }}" style="width: 60px" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="items eventsCategoriesCarosal owl-carousel owl-theme">
                @foreach ($events_category_section as $events_category_section_item)
                    <div class="item" data-aos="fade-up" data-aos-offset="0" data-aos-duration="1500">
                        <a href="">
                            <div class="image">
                                <img src="{{ asset('' . $events_category_section_item->primary_image) }}"
                                    alt="" />
                            </div>
                            <div class="content">
                                <h5> {{ $lang == 'en' ? $events_category_section_item->title_en : $events_category_section_item->title_ar }}
                                </h5>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- ------------------ end Events Categories ---------------------------- -->
    <!-- ------------------ start of flower ---------------------------- -->
    <section class="start_flower_section" style="text-align: right">
        <img src="{{ asset('user_assets/images/flowers/right_halls.png') }}" class="left_buttons_flower"
            style="width: 80px" />
    </section>

    <!-- ------------------ end of flower ---------------------------- -->
    <!-- ------------------ start Latest Weddings halls ---------------------------- -->
    <section class="WeddingsHalls" style="background-color: #eeeeee">
        <div class="container">
            <div class="head text-center sec2-title" data-aos="fade-left" data-aos-offset="0" data-aos-duration="1500"
                style="width: 100%">
                <span>{{ $lang == 'en' ? \App\Models\LatestWeddingHalls::first()->small_title_en : \App\Models\LatestWeddingHalls::first()->small_title_ar }}</span>
                <a href="WeadingHalls.html" target="_blank">
                    <h2>{{ trans('trans.LATEST WEDDINGS HALLS') }}</h2>
                </a>
                <p>{{ $lang == 'en' ? \App\Models\LatestWeddingHalls::first()->big_title_en : \App\Models\LatestWeddingHalls::first()->big_title_ar }}
                </p>
            </div>
            <input type="text" id="WeddingsHallsCounter" value="{{ count($weddingHallsArray) }}"
                style="visibility: hidden">
            <div class="items WeddingsHallsCarosal owl-carousel owl-theme">
                @foreach ($weddingHallsArray as $wedding_hall)
                    <a href="./hallDetails.html" target="_blank">
                        <div class="item" class="head text-center" data-aos="zoom-in" data-aos-offset="0"
                            data-aos-duration="1500">
                            <div class="image"
                                style="
                                border: 1px solid #000;
                                border-bottom: none;
                                height: 250px;
                                ">
                                <img src="{{ asset('user_assets/images/bestSales/img (1).png') }}" alt="" />
                            </div>
                            <div class="details" style="border: 1px solid #000; border-top: none">
                                <h4>{{ $lang == 'en' ? $wedding_hall->title_en : $wedding_hall->title_ar }}</h4>
                                <div class="rait">
                                    <i class="fas fa-star active"></i>
                                    <i class="fas fa-star active"></i>
                                    <i class="fas fa-star active"></i>
                                    <i class="fas fa-star active"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                @if ($lang == 'ar')
                                    <div class="viewDetails" style="direction: rtl">
                                        <span>{{ trans('trans.view details') }}</span>
                                        <i class="fas fa-arrow-left"></i>
                                    </div>
                                @else
                                    <div class="viewDetails">
                                        <span>{{ trans('trans.view details') }}</span>
                                        <i class="fas fa-arrow-right"></i>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <br />
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ------------------ end Latest Weddings halls ---------------------------- -->

    <!-- ------------------ start LATEST PRODUCTS ---------------------------- -->
    <section class="latestProducts">
        <div class="container">
            <div class="head text-center" data-aos="fade-right" data-aos-offset="0" data-aos-duration="2000">
                <a href="latest_product.html" target="_blank">
                    <h2>{{ trans('trans.LATEST PRODUCTS') }}</h2>
                    <p style="color: #ff6e5a">
                        {{ $lang == 'en' ? \App\Models\LatestProduct::first()->title_en : \App\Models\LatestProduct::first()->title_ar }}
                    </p>
                </a>
                <div class="head text-center" data-aos="fade-right" data-aos-offset="100" data-aos-duration="2000">
                    <ul class="d-flex list-unstyled">
                        <li class="active filte my_foused_class0" data-filter="all">
                            All
                        </li>
                        @foreach ($main_categories as $main_category)
                            @if ($main_category->products->count() > 0)
                                <li class="filte my_foused_class1" data-filter=".item_filter{{ $main_category->id }}">
                                    {{ $lang == 'en' ? $main_category->title_en : $main_category->title_ar }}
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="row products">
                <div class="row" id="containermix" data-aos="fade-left" data-aos-offset="100"
                    data-aos-duration="2000">
                    <div class="container" style="width: 90%">
                        <div class="row">
                            <div class="col-lg-1 col-md-1 col-sm-1"></div>
                            <div class="col-lg-11 col-md-11 col-md-11">
                                <div class="container">
                                    <div class="row">
                                        @foreach ($main_categories as $main_category)
                                            @foreach ($main_category->products as $product)
                                                <div class="col-lg-4 col-md-12 col-sm-12 mix item_filter{{ $product->main_category->id }}"
                                                    onmouseenter="show_options('{{ $product->id }}')"
                                                    onmouseleave="hide_options('{{ $product->id }}')"
                                                    id="ContainerCart">
                                                    <div class="product" id="products_latest_products1"
                                                        style="border: 1px solid #000;border-radius: 0px;height: 425px;">
                                                        <div class="image">
                                                            <a href="./productDetails.html">
                                                                <img src="{{ $product->primary_image_url }}"
                                                                    height="300px" />
                                                            </a>
                                                            <ul class="list-unstyled hoveredCart" id="hoveredCart"
                                                                style="height: 100%;left: 0; width: 100%;padding: 5px; cursor: pointer;">
                                                                <div style="direction: rtl">
                                                                    <li
                                                                        style="
                                                                                margin: revert;
                                                                                border-radius: 0px;
                                                                                right: 34px;
                                                                                left: auto;
                                                                                width: fit-content;
                                                                                margin-bottom: 10px;
                                                                                background-color: #acd4c3;
                                                                            ">
                                                                        New
                                                                    </li>
                                                                </div>
                                                                <div class="my_div_hovered"
                                                                    id="my_div_hovered{{ $product->id }}"
                                                                    style="
                                                                        width: 100%;
                                                                        float: right;
                                                                        height: 100%;
                                                                        display: none;
                                                                        ">
                                                                    <div class="data_option">
                                                                        <i type="button" data-bs-toggle="offcanvas"
                                                                            data-bs-target="#offcanvasTop"
                                                                            aria-controls="offcanvasTop"
                                                                            style="
                                                                                border: 2px solid #000;
                                                                                padding: 15px;
                                                                                border-left: 0;
                                                                                border-right: 0;
                                                                                border-bottom: 0;
                                                                                "
                                                                            class="fa fa-eye"></i>
                                                                        <br />
                                                                        <i onclick="add_to_cart({{ $product->id }} , 1)"
                                                                            style="
                                                                        border: 2px solid #f3a095;
                                                                        padding: 15px;
                                                                        border-left: 0;
                                                                        border-right: 0;
                                                                        background-color: #f3a095;
                                                                        "
                                                                            class="fa fa-shopping-bag"></i>
                                                                    </div>
                                                                </div>
                                                            </ul>
                                                        </div>
                                                        <div class="details" style="padding: 19px 0px">
                                                            <div class="description" style="width: 100%; padding: 0">
                                                                <div class="container">
                                                                    <div class="row">
                                                                        <div class="col-10">
                                                                            <a href=""
                                                                                style="text-decoration: none">
                                                                                <h4 style="color: #000; font-weight: bold">
                                                                                    {{ $lang == 'en' ? substr($product->title_en, 0, 15) : substr($product->title_ar, 0, 15) }}
                                                                                    ....</h4>
                                                                            </a>
                                                                            <p style="color: #aaa; font-weight: bold">
                                                                                {{ substr($product->main_category->title_ar, 0, 100) }}
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-2" style="text-align: right">
                                                                            <span><i class="far fa-heart favorit"
                                                                                    style="font-size: 20px"
                                                                                    id="fav_icon3"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="container">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="price d-flex" style="float: left">
                                                                                <span class="realPrice"
                                                                                    style="
                                                                                    color: #000;
                                                                                    font-weight: bold;
                                                                                    font-size: 18px;
                                                                                    ">{{ $product->real_price }}
                                                                                    AED</span>
                                                                                <span
                                                                                    style="
                                                                                        color: #888888;
                                                                                        font-size: 16px;
                                                                                        text-decoration: line-through;
                                                                                        "
                                                                                    class="descount">
                                                                                    {{ $product->fake_price }} AED</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Start of show all products -->
                <div class="showAll text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-9 view_all_prod" style="text-align: center">
                                <a href="./allProducts.html" style="margin-bottom: 25px; padding: 10px; font-weight: 600"
                                    target="_blank">VIEW
                                    ALL PRODUCTS</a>
                            </div>
                            <div class="col-lg-1">
                                <img src="{{ asset('user_assets/images/flowers/right_view_prod.png') }}"
                                    class="left_buttons_flower" style="width: 50px" />
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid all_products" id="view_all_prod_custom">
                        <div class="row" style="margin: auto">
                            <!-- Cars icon div -->
                            @foreach (\App\Models\ViewAllProduct::get() as $item)
                                <div class="col-lg-4 col-md-12 col-sm-12 col-12 car_container"
                                    style="margin-bottom: 15px">
                                    <img src="{{ asset('user_assets/uploads/view_all_products/' . $item->icon) }}"
                                        style="width: 30px; margin-right: 10px" />
                                    {{ $item->title_en }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- End of show all products -->
            </div>
        </div>
    </section>

    <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel"
        style="background-color: #fff; height: 100%">
        <div class="offcanvas-header">
            <div style="width: 100%">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="images/chocalates/img (4).png" style="margin: auto; width: 40%" />
                        </div>
                        <div class="col-lg-6">
                            <h5 id="offcanvasTopLabel">Product Name : Chocolate1</h5>
                            <br />
                            <h5>Description :</h5>
                            <p>
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                Necessitatibus, nulla provident. Similique accusamus fugit
                                dolor, sapiente eveniet cumque. Maiores modi veritatis ab nisi
                                tempore excepturi veniam illum saepe sit molestiae.
                            </p>

                            <h5 id="offcanvasTopLabel">After Price : 1500</h5>
                            <br />
                            <h5 id="offcanvasTopLabel">
                                Before Price :
                                <span style="text-decoration: line-through">4000</span>
                            </h5>
                            <br />
                            <a href="productDetails.html"
                                style="
                    background: none;
                    border: 3px solid #ff6e5a;
                    padding: 10px 30px;
                    color: #ff6e5a;
                    font-weight: bold;
                  ">Show
                                More</a>
                        </div>
                    </div>
                </div>
            </div>

            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
    </div>
    <!-- ------------------ end LATEST PRODUCTS ---------------------------- -->

    <!-- ------------------ start Explore Categories ---------------------------- -->
    <section class="titleHere container-fluid" style="background-color: #fff">
        <div class="head text-center" data-aos="zoom-out-up" data-aos-offset="0" data-aos-duration="2000">
            <h2 class="explore_categories" id="custom_explore_categories">
                EXPLORE CATEGORIES
            </h2>
            <p class="p_explore_categories">{{ \App\Models\ExploreCategory::first()->title_en }}</p>
        </div>
        <div class="content sider_big_slider" style="">
            <div class="container" style="width: 83%; margin: auto">
                <div class="row">
                    <div class="col-lg-7 col-12" data-aos="zoom-in-right" data-aos-offset="0" data-aos-duration="2000">
                        <div class="image" style="border: 1px solid #000; border-bottom: 0px">
                            <img src="{{ asset('user_assets/images/bestSales/Rectangle 248.png') }}"
                                style="width: 100%; height: 100%" />
                            <span
                                style="
                    position: absolute;
                    bottom: 0;
                    right: 0%;
                    left: 5px;
                    top: 72%;
                    text-align: center;
                    padding: 45px;
                    width: 98.3%;
                    background-color: #fff;
                    color: #000;
                    font-weight: bold;
                    border: 1px solid #000;
                    border-top: 0px;
                  ">
                                Happy Birthday
                            </span>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-5 col-12 small_slider_right" data-aos="zoom-in-left" data-aos-offset="0"
                        data-aos-duration="2000" style="width: 100%">
                        <div class="container">
                            <div class="row" style="width: 100%">
                                <div class="col-lg-6">
                                    <div class="image"
                                        style="
                        height: 150px;
                        position: relative;
                        border: 1px solid #000;
                        margin-bottom: 3px;
                      ">
                                        <img src="{{ asset('user_assets/images/bestSales/Rectangle 310.png') }}"
                                            style="width: 100%" />
                                        <span
                                            style="
                          position: absolute;
                          bottom: 0;
                          right: 0;
                          top: 60%;
                          text-align: center;
                          padding-bottom: 15px;
                          padding-top: 15px;
                          width: 100%;
                          background-color: #fff;
                          color: #000;
                          font-weight: bold;
                        ">
                                            Happy Birthday
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="image"
                                        style="
                        height: 150px;
                        position: relative;
                        border: 1px solid #000;
                        margin-bottom: 3px;
                      ">
                                        <img src="{{ asset('user_assets/images/bestSales/Rectangle 310.png') }}"
                                            style="width: 100%" />
                                        <span
                                            style="
                          position: absolute;
                          bottom: 0;
                          right: 0;
                          top: 60%;
                          text-align: center;
                          padding-bottom: 15px;
                          padding-top: 15px;
                          width: 100%;
                          background-color: #fff;
                          color: #000;
                          font-weight: bold;
                        ">
                                            Happy Birthday
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="image"
                                        style="
                        height: 150px;
                        position: relative;
                        border: 1px solid #000;
                        margin-bottom: 3px;
                      ">
                                        <img src="{{ asset('user_assets/images/bestSales/Rectangle 310.png') }}"
                                            style="width: 100%" />
                                        <span
                                            style="
                          position: absolute;
                          bottom: 0;
                          right: 0;
                          top: 60%;
                          text-align: center;
                          padding-bottom: 15px;
                          padding-top: 15px;
                          width: 100%;
                          background-color: #fff;
                          color: #000;
                          font-weight: bold;
                        ">
                                            Happy Birthday
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="image"
                                        style="
                        height: 150px;
                        position: relative;
                        border: 1px solid #000;
                        margin-bottom: 3px;
                      ">
                                        <img src="{{ asset('user_assets/images/bestSales/Rectangle 310.png') }}"
                                            style="width: 100%" />
                                        <span
                                            style="
                          position: absolute;
                          bottom: 0;
                          right: 0;
                          top: 60%;
                          text-align: center;
                          padding-bottom: 15px;
                          padding-top: 15px;
                          width: 100%;
                          background-color: #fff;
                          color: #000;
                          font-weight: bold;
                        ">
                                            Happy Birthday
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="image"
                                        style="
                        height: 150px;
                        position: relative;
                        border: 1px solid #000;
                        margin-bottom: 3px;
                      ">
                                        <img src="{{ asset('user_assets/images/bestSales/Rectangle 310.png') }}"
                                            style="width: 100%" />
                                        <span
                                            style="
                          position: absolute;
                          bottom: 0;
                          right: 0;
                          top: 60%;
                          text-align: center;
                          padding-bottom: 15px;
                          padding-top: 15px;
                          width: 100%;
                          background-color: #fff;
                          color: #000;
                          font-weight: bold;
                        ">
                                            Happy Birthday
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="image"
                                        style="
                        height: 150px;
                        position: relative;
                        border: 1px solid #000;
                        margin-bottom: 3px;
                      ">
                                        <img src="{{ asset('user_assets/images/bestSales/Rectangle 310.png') }}"
                                            style="width: 100%" />
                                        <span
                                            style="
                          position: absolute;
                          bottom: 0;
                          right: 0;
                          top: 60%;
                          text-align: center;
                          padding-bottom: 15px;
                          padding-top: 15px;
                          width: 100%;
                          background-color: #fff;
                          color: #000;
                          font-weight: bold;
                        ">
                                            Happy Birthday
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br />
            <div class="container" style="width: 83%" id="sub_menus">
                <div class="row" style="width: 100%">
                    <div class="col-lg-2 col-6" data-aos="zoom-in-left" data-aos-offset="0" data-aos-duration="2000">
                        <div class="image"
                            style="
                  height: 150px;
                  position: relative;
                  border: 1px solid #000;
                  margin-bottom: 3px;
                ">
                            <img src="{{ asset('user_assets/images/bestSales/Rectangle 304.png') }}"
                                style="width: 100%" />
                            <span id="hovering_div1"
                                style="
                    position: absolute;
                    bottom: 0;
                    right: 10%;
                    text-align: center;
                    width: 100%;
                    background-color: #fff;
                    color: #000;
                    font-weight: bold;
                    padding: 0px;
                    top: 68%;
                    left: 0px;
                  ">
                                Happy Birthday
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-2 col-6" data-aos="zoom-in-left" data-aos-offset="0" data-aos-duration="2000">
                        <div class="image"
                            style="
                  height: 150px;
                  position: relative;
                  border: 1px solid #000;
                  margin-bottom: 3px;
                ">
                            <img src="{{ asset('user_assets/images/bestSales/Rectangle 304.png') }}"
                                style="width: 100%" />
                            <span id="hovering_div1"
                                style="
                    position: absolute;
                    bottom: 0;
                    right: 10%;
                    text-align: center;
                    width: 100%;
                    background-color: #fff;
                    color: #000;
                    font-weight: bold;
                    padding: 0px;
                    top: 68%;
                    left: 0px;
                  ">
                                Happy Birthday
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-2 col-6" data-aos="zoom-in-left" data-aos-offset="0" data-aos-duration="2000">
                        <div class="image"
                            style="
                  height: 150px;
                  position: relative;
                  border: 1px solid #000;
                  margin-bottom: 3px;
                ">
                            <img src="{{ asset('user_assets/images/bestSales/Rectangle 304.png') }}"
                                style="width: 100%" />
                            <span id="hovering_div1"
                                style="
                    position: absolute;
                    bottom: 0;
                    right: 10%;
                    text-align: center;
                    width: 100%;
                    background-color: #fff;
                    color: #000;
                    font-weight: bold;
                    padding: 0px;
                    top: 68%;
                    left: 0px;
                  ">
                                Happy Birthday
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-2 col-6" data-aos="zoom-in-left" data-aos-offset="0" data-aos-duration="2000">
                        <div class="image"
                            style="
                  height: 150px;
                  position: relative;
                  border: 1px solid #000;
                  margin-bottom: 3px;
                ">
                            <img src="{{ asset('user_assets/images/bestSales/Rectangle 304.png') }}"
                                style="width: 100%" />
                            <span id="hovering_div1"
                                style="
                    position: absolute;
                    bottom: 0;
                    right: 10%;
                    text-align: center;
                    width: 100%;
                    background-color: #fff;
                    color: #000;
                    font-weight: bold;
                    padding: 0px;
                    top: 68%;
                    left: 0px;
                  ">
                                Happy Birthday
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-2 col-6" data-aos="zoom-in-left" data-aos-offset="0" data-aos-duration="2000">
                        <div class="image"
                            style="
                  height: 150px;
                  position: relative;
                  border: 1px solid #000;
                  margin-bottom: 3px;
                ">
                            <img src="{{ asset('user_assets/images/bestSales/Rectangle 304.png') }}"
                                style="width: 100%" />
                            <span id="hovering_div1"
                                style="
                    position: absolute;
                    bottom: 0;
                    right: 10%;
                    text-align: center;
                    width: 100%;
                    background-color: #fff;
                    color: #000;
                    font-weight: bold;
                    padding: 0px;
                    top: 68%;
                    left: 0px;
                  ">
                                Happy Birthday
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-2 col-6" data-aos="zoom-in-left" data-aos-offset="0" data-aos-duration="2000">
                        <div class="image"
                            style="
                  height: 150px;
                  position: relative;
                  border: 1px solid #000;
                  margin-bottom: 3px;
                ">
                            <img src="{{ asset('user_assets/images/bestSales/Rectangle 304.png') }}"
                                style="width: 100%" />
                            <span id="hovering_div1"
                                style="
                    position: absolute;
                    bottom: 0;
                    right: 10%;
                    text-align: center;
                    width: 100%;
                    background-color: #fff;
                    color: #000;
                    font-weight: bold;
                    padding: 0px;
                    top: 68%;
                    left: 0px;
                  ">
                                Happy Birthday
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ------------------ end Explore Categories ---------------------------- -->
    <hr style="border-top: 5px solid rgba(0, 0, 0, 0.1)" />
    <!-- ------------------ start Best Sellers ---------------------------- -->
    <section class="WeddingsHalls">
        <br />
        <div class="container">
            <div class="head text-center" data-aos="fade-left" data-aos-offset="0" data-aos-duration="1500">
                <a href="allProducts.html" target="_blank">
                    <h2>BEST SELLERS</h2>
                </a>
                <p>{{ \App\Models\BestSelleres::first()->title_en }}</p>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12" style="">
                        <div class="items BestSellerCarosal owl-carousel owl-theme"
                            style="padding: 100px; width: 100%; margin: auto">
                            <!-- <a target="_blank"> -->
                            <div class="item myTest" class="head text-center" data-aos="zoom-in" data-aos-offset="0"
                                data-aos-duration="1500" style="width: 100%">
                                <div class="image" style="border: 1px solid #000; border-bottom: none">
                                    <div class="hoveredCart" style="position: absolute; width: 100%; height: 80%">
                                        <div class="" style="height: 80%">
                                            <div class="data_option" style="padding: 149px 0">
                                                <div style="display: none" id="testing_hide">
                                                    <i type="button" data-bs-toggle="offcanvas"
                                                        data-bs-target="#offcanvasTop" aria-controls="offcanvasTop"
                                                        style="
                                border: 2px solid #000;
                                padding: 15px;
                                border-left: 0;
                                border-right: 0;
                                border-bottom: 0;
                              "
                                                        class="fa fa-eye"></i>
                                                    <br />
                                                    <i style="
                                border: 2px solid #f3a095;
                                padding: 15px;
                                border-left: 0;
                                border-right: 0;
                                background-color: #f3a095;
                              "
                                                        class="fa fa-shopping-bag"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        style="
                        text-align: right;
                        margin: revert;
                        right: 0px;
                        left: auto;
                        margin-right: 20px;
                      ">
                                        <p
                                            style="
                          background-color: #ec9dab;
                          display: inline-block;
                          color: #fff;
                          font-size: 10px;
                          text-transform: capitalize;
                          font-weight: 400;
                          padding: 1px 15px;
                          margin-bottom: 0px;
                        ">
                                            SALE
                                        </p>
                                        <p style="background-color: red; margin: 0px"></p>
                                        <p
                                            style="
                          background-color: #ff6e5a;
                          display: inline-block;
                          color: #fff;
                          font-size: 10px;
                          text-transform: capitalize;
                          font-weight: 400;
                          padding: 1px 15px;
                          margin-bottom: 0px;
                        ">
                                            15%
                                        </p>
                                    </div>
                                    <img src="{{ asset('user_assets/images/bestSales/img (2).png') }}" alt="" />
                                </div>
                                <div class="details custom_details"
                                    style="
                      border: 1px solid #000;
                      border-top: none;
                      padding: 16px;
                    ">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-11 col-11">
                                                <h4
                                                    style="
                              font-family: Montserrat;
                              color: #555;
                              text-transform: capitalize;
                              font-size: 16px;
                              margin: 0;
                            ">
                                                    flowers1
                                                </h4>
                                            </div>
                                            <div class="col-lg-1 col-1">
                                                <i style="color: #000" class="far fa-heart favorit"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="viewDetails" style="color: #000">
                                        <!-- <div class="price d-flex col-lg-11"> -->

                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-11 col-12">
                                                    <span class="realPrice"
                                                        style="
                                color: #111;
                                font-size: 12px;
                                margin-right: 5px;
                                font-weight: 500;
                                font-family: Montserrat;
                              ">1,855
                                                        AED
                                                        <span
                                                            style="
                                  color: #888888;
                                  font-size: 10px;
                                  text-decoration: line-through;
                                "
                                                            class="descount">
                                                            2169 AED</span>
                                                    </span>
                                                </div>
                                                <div class="col-lg-1 col-1"></div>
                                            </div>
                                        </div>

                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>
                            <!-- </a> -->
                            <!-- <a target="_blank"> -->
                            <div class="item myTest1" class="head text-center" data-aos="zoom-in" data-aos-offset="0"
                                data-aos-duration="1500" style="width: 100%">
                                <div class="image" style="border: 1px solid #000; border-bottom: none">
                                    <div class="hoveredCart" style="position: absolute; width: 100%; height: 80%">
                                        <div class="" style="height: 80%">
                                            <div class="data_option" style="padding: 149px 0">
                                                <div style="display: none" id="testing_hide1">
                                                    <i type="button" data-bs-toggle="offcanvas"
                                                        data-bs-target="#offcanvasTop" aria-controls="offcanvasTop"
                                                        style="
                                border: 2px solid #000;
                                padding: 15px;
                                border-left: 0;
                                border-right: 0;
                                border-bottom: 0;
                              "
                                                        class="fa fa-eye"></i>
                                                    <br />
                                                    <i style="
                                border: 2px solid #f3a095;
                                padding: 15px;
                                border-left: 0;
                                border-right: 0;
                                background-color: #f3a095;
                              "
                                                        class="fa fa-shopping-bag"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        style="
                        text-align: right;
                        margin: revert;
                        right: 0px;
                        left: auto;
                        margin-right: 20px;
                      ">
                                        <p
                                            style="
                          background-color: #ec9dab;
                          display: inline-block;
                          color: #fff;
                          font-size: 10px;
                          text-transform: capitalize;
                          font-weight: 400;
                          padding: 1px 15px;
                          margin-bottom: 0px;
                        ">
                                            SALE
                                        </p>
                                        <p style="background-color: red; margin: 0px"></p>
                                        <p
                                            style="
                          background-color: #ff6e5a;
                          display: inline-block;
                          color: #fff;
                          font-size: 10px;
                          text-transform: capitalize;
                          font-weight: 400;
                          padding: 1px 15px;
                          margin-bottom: 0px;
                        ">
                                            15%
                                        </p>
                                    </div>
                                    <img src="{{ asset('user_assets/images/bestSales/img (2).png') }}" alt="" />
                                </div>
                                <div class="details custom_details"
                                    style="
                      border: 1px solid #000;
                      border-top: none;
                      padding: 16px;
                    ">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-11 col-11">
                                                <h4
                                                    style="
                              font-family: Montserrat;
                              color: #555;
                              text-transform: capitalize;
                              font-size: 16px;
                              margin: 0;
                            ">
                                                    flowers1
                                                </h4>
                                            </div>
                                            <div class="col-lg-1 col-1">
                                                <i style="color: #000" class="far fa-heart favorit"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="viewDetails" style="color: #000">
                                        <!-- <div class="price d-flex col-lg-11"> -->

                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-11 col-12">
                                                    <span class="realPrice"
                                                        style="
                                color: #111;
                                font-size: 12px;
                                margin-right: 5px;
                                font-weight: 500;
                                font-family: Montserrat;
                              ">1,855
                                                        AED
                                                        <span
                                                            style="
                                  color: #888888;
                                  font-size: 10px;
                                  text-decoration: line-through;
                                "
                                                            class="descount">
                                                            2169 AED</span>
                                                    </span>
                                                </div>
                                                <div class="col-lg-1 col-1"></div>
                                            </div>
                                        </div>

                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>
                            <!-- <br /> -->
                            <!-- </a> -->
                            <!-- <a target="_blank"> -->
                            <div class="item myTest2" class="head text-center" data-aos="zoom-in" data-aos-offset="0"
                                data-aos-duration="1500" style="width: 100%">
                                <div class="image" style="border: 1px solid #000; border-bottom: none">
                                    <div class="hoveredCart" style="position: absolute; width: 100%; height: 80%">
                                        <div class="" style="height: 80%">
                                            <div class="data_option" style="padding: 149px 0">
                                                <div style="display: none" id="testing_hide2">
                                                    <i type="button" data-bs-toggle="offcanvas"
                                                        data-bs-target="#offcanvasTop" aria-controls="offcanvasTop"
                                                        style="
                                border: 2px solid #000;
                                padding: 15px;
                                border-left: 0;
                                border-right: 0;
                                border-bottom: 0;
                              "
                                                        class="fa fa-eye"></i>
                                                    <br />
                                                    <i style="
                                border: 2px solid #f3a095;
                                padding: 15px;
                                border-left: 0;
                                border-right: 0;
                                background-color: #f3a095;
                              "
                                                        class="fa fa-shopping-bag"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        style="
                        text-align: right;
                        margin: revert;
                        right: 0px;
                        left: auto;
                        margin-right: 20px;
                      ">
                                        <p
                                            style="
                          background-color: #ec9dab;
                          display: inline-block;
                          color: #fff;
                          font-size: 10px;
                          text-transform: capitalize;
                          font-weight: 400;
                          padding: 1px 15px;
                          margin-bottom: 0px;
                        ">
                                            SALE
                                        </p>
                                        <p style="background-color: red; margin: 0px"></p>
                                        <p
                                            style="
                          background-color: #ff6e5a;
                          display: inline-block;
                          color: #fff;
                          font-size: 10px;
                          text-transform: capitalize;
                          font-weight: 400;
                          padding: 1px 15px;
                          margin-bottom: 0px;
                        ">
                                            15%
                                        </p>
                                    </div>
                                    <img src="{{ asset('user_assets/images/bestSales/img (2).png') }}" alt="" />
                                </div>
                                <div class="details custom_details"
                                    style="
                      border: 1px solid #000;
                      border-top: none;
                      padding: 16px;
                    ">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-11 col-11">
                                                <h4
                                                    style="
                              font-family: Montserrat;
                              color: #555;
                              text-transform: capitalize;
                              font-size: 16px;
                              margin: 0;
                            ">
                                                    flowers1
                                                </h4>
                                            </div>
                                            <div class="col-lg-1 col-1">
                                                <i style="color: #000" class="far fa-heart favorit"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="viewDetails" style="color: #000">
                                        <!-- <div class="price d-flex col-lg-11"> -->

                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-11 col-12">
                                                    <span class="realPrice"
                                                        style="
                                color: #111;
                                font-size: 12px;
                                margin-right: 5px;
                                font-weight: 500;
                                font-family: Montserrat;
                              ">1,855
                                                        AED
                                                        <span
                                                            style="
                                  color: #888888;
                                  font-size: 10px;
                                  text-decoration: line-through;
                                "
                                                            class="descount">
                                                            2169 AED</span>
                                                    </span>
                                                </div>
                                                <div class="col-lg-1 col-1"></div>
                                            </div>
                                        </div>

                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>
                            <!-- <br /> -->
                            <div class="item myTest3" class="head text-center" data-aos="zoom-in" data-aos-offset="0"
                                data-aos-duration="1500" style="width: 100%">
                                <div class="image" style="border: 1px solid #000; border-bottom: none">
                                    <div class="hoveredCart" style="position: absolute; width: 100%; height: 80%">
                                        <div class="" style="height: 80%">
                                            <div class="data_option" style="padding: 149px 0">
                                                <div style="display: none" id="testing_hide3">
                                                    <i type="button" data-bs-toggle="offcanvas"
                                                        data-bs-target="#offcanvasTop" aria-controls="offcanvasTop"
                                                        style="
                                border: 2px solid #000;
                                padding: 15px;
                                border-left: 0;
                                border-right: 0;
                                border-bottom: 0;
                              "
                                                        class="fa fa-eye"></i>
                                                    <br />
                                                    <i style="
                                border: 2px solid #f3a095;
                                padding: 15px;
                                border-left: 0;
                                border-right: 0;
                                background-color: #f3a095;
                              "
                                                        class="fa fa-shopping-bag"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        style="
                        text-align: right;
                        margin: revert;
                        right: 0px;
                        left: auto;
                        margin-right: 20px;
                      ">
                                        <p
                                            style="
                          background-color: #ec9dab;
                          display: inline-block;
                          color: #fff;
                          font-size: 10px;
                          text-transform: capitalize;
                          font-weight: 400;
                          padding: 1px 15px;
                          margin-bottom: 0px;
                        ">
                                            SALE
                                        </p>
                                        <p style="background-color: red; margin: 0px"></p>
                                        <p
                                            style="
                          background-color: #ff6e5a;
                          display: inline-block;
                          color: #fff;
                          font-size: 10px;
                          text-transform: capitalize;
                          font-weight: 400;
                          padding: 1px 15px;
                          margin-bottom: 0px;
                        ">
                                            15%
                                        </p>
                                    </div>
                                    <img src="{{ asset('user_assets/images/bestSales/img (2).png') }}" alt="" />
                                </div>
                                <div class="details custom_details"
                                    style="
                      border: 1px solid #000;
                      border-top: none;
                      padding: 16px;
                    ">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-11 col-11">
                                                <h4
                                                    style="
                              font-family: Montserrat;
                              color: #555;
                              text-transform: capitalize;
                              font-size: 16px;
                              margin: 0;
                            ">
                                                    flowers1
                                                </h4>
                                            </div>
                                            <div class="col-lg-1 col-1">
                                                <i style="color: #000" class="far fa-heart favorit"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="viewDetails" style="color: #000">
                                        <!-- <div class="price d-flex col-lg-11"> -->

                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-11 col-12">
                                                    <span class="realPrice"
                                                        style="
                                color: #111;
                                font-size: 12px;
                                margin-right: 5px;
                                font-weight: 500;
                                font-family: Montserrat;
                              ">1,855
                                                        AED
                                                        <span
                                                            style="
                                  color: #888888;
                                  font-size: 10px;
                                  text-decoration: line-through;
                                "
                                                            class="descount">
                                                            2169 AED</span>
                                                    </span>
                                                </div>
                                                <div class="col-lg-1 col-1"></div>
                                            </div>
                                        </div>

                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>

                            <div class="item myTest4" class="head text-center" data-aos="zoom-in" data-aos-offset="0"
                                data-aos-duration="1500" style="width: 100%">
                                <div class="image" style="border: 1px solid #000; border-bottom: none">
                                    <div class="hoveredCart" style="position: absolute; width: 100%; height: 80%">
                                        <div class="" style="height: 80%">
                                            <div class="data_option" style="padding: 149px 0">
                                                <div style="display: none" id="testing_hide4">
                                                    <i type="button" data-bs-toggle="offcanvas"
                                                        data-bs-target="#offcanvasTop" aria-controls="offcanvasTop"
                                                        style="
                                border: 2px solid #000;
                                padding: 15px;
                                border-left: 0;
                                border-right: 0;
                                border-bottom: 0;
                              "
                                                        class="fa fa-eye"></i>
                                                    <br />
                                                    <i style="
                                border: 2px solid #f3a095;
                                padding: 15px;
                                border-left: 0;
                                border-right: 0;
                                background-color: #f3a095;
                              "
                                                        class="fa fa-shopping-bag"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        style="
                        text-align: right;
                        margin: revert;
                        right: 0px;
                        left: auto;
                        margin-right: 20px;
                      ">
                                        <p
                                            style="
                          background-color: #ec9dab;
                          display: inline-block;
                          color: #fff;
                          font-size: 10px;
                          text-transform: capitalize;
                          font-weight: 400;
                          padding: 1px 15px;
                          margin-bottom: 0px;
                        ">
                                            SALE
                                        </p>
                                        <p style="background-color: red; margin: 0px"></p>
                                        <p
                                            style="
                          background-color: #ff6e5a;
                          display: inline-block;
                          color: #fff;
                          font-size: 10px;
                          text-transform: capitalize;
                          font-weight: 400;
                          padding: 1px 15px;
                          margin-bottom: 0px;
                        ">
                                            15%
                                        </p>
                                    </div>
                                    <img src="{{ asset('user_assets/images/bestSales/img (2).png') }}" alt="" />
                                </div>
                                <div class="details custom_details"
                                    style="
                      border: 1px solid #000;
                      border-top: none;
                      padding: 16px;
                    ">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-11 col-11">
                                                <h4
                                                    style="
                              font-family: Montserrat;
                              color: #555;
                              text-transform: capitalize;
                              font-size: 16px;
                              margin: 0;
                            ">
                                                    flowers1
                                                </h4>
                                            </div>
                                            <div class="col-lg-1 col-1">
                                                <i style="color: #000" class="far fa-heart favorit"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="viewDetails" style="color: #000">
                                        <!-- <div class="price d-flex col-lg-11"> -->

                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-11 col-12">
                                                    <span class="realPrice"
                                                        style="
                                color: #111;
                                font-size: 12px;
                                margin-right: 5px;
                                font-weight: 500;
                                font-family: Montserrat;
                              ">1,855
                                                        AED
                                                        <span
                                                            style="
                                  color: #888888;
                                  font-size: 10px;
                                  text-decoration: line-through;
                                "
                                                            class="descount">
                                                            2169 AED</span>
                                                    </span>
                                                </div>
                                                <div class="col-lg-1 col-1"></div>
                                            </div>
                                        </div>

                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>
                            <!-- </a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ------------------ end Best Sellers ---------------------------- -->
    <hr style="border-top: 5px solid rgba(0, 0, 0, 0.1)" />
    <!-- ------------------ start Shop By Occasion ---------------------------- -->
    <section class="WeddingsHalls latestEngagments">
        <div class="container">
            <div class="head text-center sec-title" data-aos="fade-right" data-aos-offset="0" data-aos-duration="2500">
                <h2>SHOP BY OCCASION</h2>
                <p>{{ \App\Models\ShopByOccasion::first()->title_en }}</p>
            </div>
            <div class="items Occasions owl-carousel owl-theme">
                <a href="/hallDetails.html">
                    <div class="item" data-aos="fade-down" data-aos-offset="0" data-aos-duration="2500"
                        data-offset="5000" style="">
                        <div class="image" style="height: 150px; position: relative">
                            <img src="{{ asset('user_assets/images/bestSales/Rectangle 304.png') }}"
                                style="border: 2px solid #000; border-radius: 10px" />
                            <span
                                style="
                    border: 1px solid #000;
                    border-radius: 0px 0px 10px 10px;
                    border-top: 0px;
                    position: absolute;
                    bottom: 0;
                    right: 0;
                    text-align: center;
                    padding: 17px;
                    width: 100%;
                    background-color: #ffffffa6;
                    color: #000;
                    font-weight: bold;
                  ">
                                Happy Birthday
                            </span>
                        </div>
                    </div>
                </a>

                <a href="/hallDetails.html">
                    <div class="item" data-aos="fade-up" data-aos-offset="0" data-aos-duration="2500"
                        data-offset="5000">
                        <div class="image" style="height: 150px; position: relative">
                            <img src="{{ asset('user_assets/images/bestSales/Rectangle 310.png') }}"
                                style="border: 2px solid #000; border-radius: 10px" />
                            <span
                                style="
                    border: 1px solid #000;
                    border-radius: 0px 0px 10px 10px;
                    border-top: 0px;
                    position: absolute;
                    bottom: 0;
                    right: 0;
                    text-align: center;
                    padding: 17px;
                    width: 100%;
                    background-color: #ffffffa6;
                    color: #000;
                    font-weight: bold;
                  ">
                                Graduation
                            </span>
                        </div>
                    </div>
                </a>

                <a href="/hallDetails.html">
                    <div class="item" data-aos="fade-down" data-aos-offset="0" data-aos-duration="2500"
                        data-offset="5000">
                        <div class="image" style="height: 150px; position: relative">
                            <img src="{{ asset('user_assets/images/bestSales/Rectangle 303.png') }}"
                                style="border: 2px solid #000; border-radius: 10px" />
                            <span
                                style="
                    border: 1px solid #000;
                    border-radius: 0px 0px 10px 10px;
                    border-top: 0px;
                    position: absolute;
                    bottom: 0;
                    right: 0;
                    text-align: center;
                    padding: 5px;
                    width: 100%;
                    background-color: #ffffffa6;
                    color: #000;
                    font-weight: bold;
                  ">
                                Promotion Congratulations
                            </span>
                        </div>
                    </div>
                </a>

                <a href="/hallDetails.html">
                    <div class="item" data-aos="fade-down" data-aos-offset="0" data-aos-duration="2500"
                        data-offset="5000">
                        <div class="image" style="height: 150px; position: relative">
                            <img src="{{ asset('user_assets/images/bestSales/Rectangle 309.png') }}"
                                style="border: 2px solid #000; border-radius: 10px" />
                            <span
                                style="
                    border: 1px solid #000;
                    border-radius: 0px 0px 10px 10px;
                    border-top: 0px;
                    position: absolute;
                    bottom: 0;
                    right: 0;
                    text-align: center;
                    padding: 17px;
                    width: 100%;
                    background-color: #ffffffa6;
                    color: #000;
                    font-weight: bold;
                  ">
                                Happy Birthday
                            </span>
                        </div>
                    </div>
                </a>

                <a href="/hallDetails.html">
                    <div class="item" data-aos="fade-up" data-aos-offset="0" data-aos-duration="2500"
                        data-offset="5000">
                        <div class="image" style="height: 150px; position: relative">
                            <img src="{{ asset('user_assets/images/bestSales/Rectangle 302.png') }}"
                                style="border: 2px solid #000; border-radius: 10px" />
                            <span
                                style="
                    border: 1px solid #000;
                    border-radius: 0px 0px 10px 10px;
                    border-top: 0px;
                    position: absolute;
                    bottom: 0;
                    right: 0;
                    text-align: center;
                    padding: 17px;
                    width: 100%;
                    background-color: #ffffffa6;
                    color: #000;
                    font-weight: bold;
                  ">
                                Umrah Mubarak
                            </span>
                        </div>
                    </div>
                </a>

                <a href="/hallDetails.html">
                    <div class="item" data-aos="fade-down" data-aos-offset="0" data-aos-duration="2500"
                        data-offset="5000">
                        <div class="image" style="height: 150px; position: relative">
                            <img src="{{ asset('user_assets/images/bestSales/Rectangle 308.png') }}"
                                style="border: 2px solid #000; border-radius: 10px" />
                            <span
                                style="
                    border: 1px solid #000;
                    border-radius: 0px 0px 10px 10px;
                    border-top: 0px;
                    position: absolute;
                    bottom: 0;
                    right: 0;
                    text-align: center;
                    padding: 17px;
                    width: 100%;
                    background-color: #d3c7c7c4;
                    color: #000;
                    font-weight: bold;
                  ">
                                Thank you
                            </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <!-- ------------------ end Shop By Occasion ---------------------------- -->
    <hr style="border-top: 5px solid rgba(0, 0, 0, 0.1)" />
    <!-- ------------------ start Shop By Brands ---------------------------- -->
    <section class="WeddingsHalls latestEngagments">
        <div class="container">
            <div class="head text-center sec-title" data-aos="fade-right" data-aos-offset="0" data-aos-duration="2500">
                <a href="brandsCollaboration.html" target="_blank">
                    <h2>Shop By BRANDS</h2>
                </a>
                <span>{{ \App\Models\ShopByBrands::first()->title_en }} </span><br />
            </div>
            <br />
            <div class="items Occasions owl-carousel owl-theme">
                <a href="specific_brand.html">
                    <div class="item brand_custom" data-aos="fade-down" data-aos-offset="0" data-aos-duration="2500"
                        data-offset="5000" style="border: 1px solid #000">
                        <div class="image" style="height: 150px; position: relative">
                            <img src="{{ asset('user_assets/images/bestSales/Rectangle 270.png') }}" alt="" />
                        </div>
                    </div>
                </a>

                <a href="specific_brand.html">
                    <div class="item brand_custom" data-aos="fade-up" data-aos-offset="0" data-aos-duration="2500"
                        data-offset="5000" style="border: 1px solid #000">
                        <div class="image" style="height: 150px; position: relative">
                            <img src="{{ asset('user_assets/images/bestSales/Rectangle 273.png') }}" alt="" />
                        </div>
                    </div>
                </a>

                <a href="specific_brand.html">
                    <div class="item brand_custom" data-aos="fade-down" data-aos-offset="0" data-aos-duration="2500"
                        data-offset="5000" style="border: 1px solid #000">
                        <div class="image" style="height: 150px; position: relative">
                            <img src="{{ asset('user_assets/images/bestSales/Rectangle 271.png') }}" alt="" />
                        </div>
                    </div>
                </a>

                <a href="specific_brand.html">
                    <div class="item brand_custom" data-aos="fade-down" data-aos-offset="0" data-aos-duration="2500"
                        data-offset="5000" style="border: 1px solid #000">
                        <div class="image" style="height: 150px; position: relative">
                            <img src="{{ asset('user_assets/images/bestSales/Rectangle 274.png') }}" alt="" />
                        </div>
                    </div>
                </a>

                <a href="specific_brand.html">
                    <div class="item brand_custom" data-aos="fade-up" data-aos-offset="0" data-aos-duration="2500"
                        data-offset="5000" style="border: 1px solid #000">
                        <div class="image" style="height: 150px; position: relative">
                            <img src="{{ asset('user_assets/images/bestSales/Rectangle 272.png') }}" alt="" />
                        </div>
                    </div>
                </a>

                <a href="specific_brand.html">
                    <div class="item brand_custom" data-aos="fade-down" data-aos-offset="0" data-aos-duration="2500"
                        data-offset="5000" style="border: 1px solid #000">
                        <div class="image" style="height: 150px; position: relative">
                            <img src="{{ asset('user_assets/images/bestSales/Rectangle 275.png') }}" alt="" />
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <!-- ------------------ end Shop By Brands ---------------------------- -->

    <!-- ------------------ start Title Here ---------------------------- -->
    <section class="titleHere">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6" data-aos="zoom-in-right" data-aos-offset="0" data-aos-duration="2000">
                        <div class="description">
                            <span>{{ App\Models\HintSection::first()->small_text_en }}</span>
                            <h2>{{ App\Models\HintSection::first()->base_text_en }}</h2>
                            <p>
                                {{ App\Models\HintSection::first()->short_description_en }}
                            </p>
                            <div class="showAll">
                                <a href="" data-bs-toggle="offcanvas" data-bs-target="#videoViewer"
                                    aria-controls="offcanvasTop" data-aos="zoom-in-left" data-aos-offset="0"
                                    data-aos-duration="2000">read more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 home_watch_video" data-bs-toggle="offcanvas" data-bs-target="#videoViewer"
                        aria-controls="offcanvasTop" data-aos="zoom-in-left" data-aos-offset="0"
                        data-aos-duration="2000">
                        <div class="video" style="padding: 10px">
                            <video src="{{ App\Models\HintSection::first()->video }}"></video>
                            <div class="over">
                                <i class="fas fa-play-circle"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ------------------ end Title Here ---------------------------- -->
    <div class="offcanvas offcanvas-top" tabindex="-1" id="videoViewer" aria-labelledby="offcanvasTopLabel"
        style="background-color: #fff; height: 100%">
        <div class="offcanvas-header" style="width: 100%; height: 100%">
            <div style="width: 100%">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <video width="100%" controls autoplay>
                                <source src="{{ App\Models\HintSection::first()->video }}" type="video/mp4" />
                                <source src="{{ App\Models\HintSection::first()->video }}" type="video/ogg" />
                                Your browser does not support HTML video.
                            </video>
                        </div>
                        <div class="col-lg-6">
                            <div class="description" style="margin-left: 100px">
                                <span>{{ App\Models\HintSection::first()->small_text_en }}</span>
                                <h2>{{ App\Models\HintSection::first()->base_text_en }}</h2>
                                <p>
                                    {{ App\Models\HintSection::first()->short_description_en }}
                                    <br>
                                    {{ App\Models\HintSection::first()->full_description_en }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
    </div>
    <!-- ------------------ start Latest Engagments halls ---------------------------- -->
    <section class="WeddingsHalls LatestBirthdayHalls" style="width: 80%; margin: auto">
        <div class="container">
            <div class="head text-center sec2-title" data-aos="fade-left" data-aos-offset="0" data-aos-duration="2500">
                <span>{{ App\Models\LatestEngagmentsHall::first()->small_text_en }}</span>
                <h2>LATEST ENGAGMENTS HALLS</h2>
                <p>
                    {{ App\Models\LatestEngagmentsHall::first()->big_text_en }}
                </p>
            </div>
            <div class="items WeddingsHallsCarosal owl-carousel owl-theme">
                <div class="item" data-aos="fade-down" data-aos-offset="0" data-aos-duration="2500">
                    <a href="hallDetails.html" target="_blank">
                        <div class="image"
                            style="
                  border: 1px solid #000;
                  border-bottom: 0px;
                  height: 220px;
                ">
                            <img src="{{ asset('user_assets/images/home/LatestBirthdayHalls/img (1).png') }}"
                                alt="" />
                        </div>
                        <div class="details" style="border: 1px solid #000; border-top: 0px">
                            <h4>Birthday halls 1</h4>
                            <div class="rait">
                                <i class="fas fa-star active"></i>
                                <i class="fas fa-star active"></i>
                                <i class="fas fa-star active"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="viewDetails">
                                <span>view details</span>
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="item" data-aos="fade-top" data-aos-offset="0" data-aos-duration="2500">
                    <a href="hallDetails.html" target="_blank">
                        <div class="image"
                            style="
                  border: 1px solid #000;
                  border-bottom: 0px;
                  height: 220px;
                ">
                            <img src="{{ asset('user_assets/images/home/LatestBirthdayHalls/img (2).png') }}"
                                alt="" />
                        </div>
                        <div class="details" style="border: 1px solid #000; border-top: 0px">
                            <h4>Birthday halls 1</h4>
                            <div class="rait">
                                <i class="fas fa-star active"></i>
                                <i class="fas fa-star active"></i>
                                <i class="fas fa-star active"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="viewDetails">
                                <span>view details</span>
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="item" data-aos="fade-down" data-aos-offset="0" data-aos-duration="2500">
                    <a href="hallDetails.html" target="_blank">
                        <div class="image"
                            style="
                  border: 1px solid #000;
                  border-bottom: 0px;
                  height: 220px;
                ">
                            <img src="{{ asset('user_assets/images/home/LatestBirthdayHalls/img (3).png') }}"
                                alt="" />
                        </div>
                        <div class="details" style="border: 1px solid #000; border-top: 0px">
                            <h4>Birthday halls 1</h4>
                            <div class="rait">
                                <i class="fas fa-star active"></i>
                                <i class="fas fa-star active"></i>
                                <i class="fas fa-star active"></i>
                                <i class="fas fa-star active"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="viewDetails">
                                <span>view details</span>
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="item" data-aos="fade-top" data-aos-offset="0" data-aos-duration="2500">
                    <a href="hallDetails.html" target="_blank">
                        <div class="image"
                            style="
                  border: 1px solid #000;
                  border-bottom: 0px;
                  height: 220px;
                ">
                            <img src="{{ asset('user_assets/images/home/LatestBirthdayHalls/img.png') }}"
                                alt="" />
                        </div>
                        <div class="details" style="border: 1px solid #000; border-top: 0px">
                            <h4>Birthday halls 1</h4>
                            <div class="rait">
                                <i class="fas fa-star active"></i>
                                <i class="fas fa-star active"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="viewDetails">
                                <span>view details</span>
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- ------------------ end Latest Engagments halls ---------------------------- -->
    <hr style="border-top: 5px solid rgba(0, 0, 0, 0.1)" />
    <!-- ------------------ start Latest Birthday halls ---------------------------- -->
    <section class="WeddingsHalls LatestBirthdayHalls" style="width: 80%; margin: auto">
        <div class="container">
            <div class="head text-center sec2-title" data-aos="fade-left" data-aos-offset="0"
                data-aos-duration="2500">
                <span>{{ App\Models\LatestBirthdayHall::first()->small_text_en }}</span>
                <h2>LATEST BIRTHDAY HALLS</h2>
                <p>
                    {{ App\Models\LatestBirthdayHall::first()->big_text_en }}
                </p>
            </div>
            <div class="items WeddingsHallsCarosal owl-carousel owl-theme">
                <div class="item" data-aos="fade-down" data-aos-offset="0" data-aos-duration="2500">
                    <a href="hallDetails.html" target="_blank">
                        <div class="image"
                            style="
                  border: 1px solid #000;
                  border-bottom: 0px;
                  height: 220px;
                ">
                            <img src="{{ asset('user_assets/images/home/LatestBirthdayHalls/img (1).png') }}"
                                alt="" />
                        </div>
                        <div class="details" style="border: 1px solid #000; border-top: 0px">
                            <h4>Birthday halls 1</h4>
                            <div class="rait" style="margin-bottom: 9px">
                                <i class="fas fa-star active"></i>
                                <i class="fas fa-star active"></i>
                                <i class="fas fa-star active"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="viewDetails">
                                <span>view details</span>
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="item" data-aos="fade-top" data-aos-offset="0" data-aos-duration="2500">
                    <a href="hallDetails.html" target="_blank">
                        <div class="image"
                            style="
                  border: 1px solid #000;
                  border-bottom: 0px;
                  height: 220px;
                ">
                            <img src="{{ asset('user_assets/images/home/LatestBirthdayHalls/img (2).png') }}"
                                alt="" />
                        </div>
                        <div class="details" style="border: 1px solid #000; border-top: 0px">
                            <h4>Birthday halls 1</h4>
                            <div class="rait" style="margin-bottom: 9px">
                                <i class="fas fa-star active"></i>
                                <i class="fas fa-star active"></i>
                                <i class="fas fa-star active"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="viewDetails">
                                <span>view details</span>
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="item" data-aos="fade-down" data-aos-offset="0" data-aos-duration="2500">
                    <a href="hallDetails.html" target="_blank">
                        <div class="image"
                            style="
                  border: 1px solid #000;
                  border-bottom: 0px;
                  height: 220px;
                ">
                            <img src="{{ asset('user_assets/images/home/LatestBirthdayHalls/img (3).png') }}"
                                alt="" />
                        </div>
                        <div class="details" style="border: 1px solid #000; border-top: 0px">
                            <h4>Birthday halls 1</h4>
                            <div class="rait" style="margin-bottom: 9px">
                                <i class="fas fa-star active"></i>
                                <i class="fas fa-star active"></i>
                                <i class="fas fa-star active"></i>
                                <i class="fas fa-star active"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="viewDetails">
                                <span>view details</span>
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="item" data-aos="fade-top" data-aos-offset="0" data-aos-duration="2500">
                    <a href="hallDetails.html" target="_blank">
                        <div class="image"
                            style="
                  border: 1px solid #000;
                  border-bottom: 0px;
                  height: 220px;
                ">
                            <img src="{{ asset('user_assets/images/home/LatestBirthdayHalls/img.png') }}"
                                alt="" />
                        </div>
                        <div class="details" style="border: 1px solid #000; border-top: 0px">
                            <h4>Birthday halls 1</h4>
                            <div class="rait" style="margin-bottom: 9px">
                                <i class="fas fa-star active"></i>
                                <i class="fas fa-star active"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="viewDetails">
                                <span>view details</span>
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- ------------------ end Latest Birthday halls ---------------------------- -->

    <!-- ------------------ start section show options---------------------------- -->
    <section class="showOptions">
        <div class="container">
            <div class="row">
                @foreach (App\Models\FeaturesSection::get() as $feature)
                    <div class="col-lg-3 col-md-6 text-center text-lg-left" data-aos="fade-down" data-aos-offset="0"
                        data-aos-duration="1500">
                        <div class="option">
                            <div class="icons d-flex justify-content-center justify-content-lg-start">
                                <img src="{{ asset('user_assets/uploads/features/' . $feature->icon) }}"
                                    alt="" />
                            </div>
                            <h2>{{ $feature->title_en }}</h2>
                            <p>{{ $feature->description_en }}</p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- ------------------ end section show options---------------------------- -->
    <hr style="border-top: 5px solid rgba(0, 0, 0, 0.1)" />
    <!-- ------------------ start section news---------------------------- -->
    <section class="news">
        <div class="sharBox">
            <div class="content">
                <i class="fas fa-times"></i>
                <h4>Share this new via :</h4>
                <ul class="list-unstyled">
                    <li><i class="fab fa-linkedin-in"></i></li>
                    <li><i class="fab fa-whatsapp"></i></li>
                    <li><i class="fab fa-facebook-f"></i></li>
                    <li><i class="fab fa-twitter"></i></li>
                    <li><i class="fab fa-google-plus-g"></i></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <header>
                <h2 class="text-center" data-aos="fade-down" data-aos-offset="0" data-aos-duration="1500"
                    style="font-family: Sulphur Point">
                    News
                </h2>
                <p style="color: #ff6e5a; text-align: center">
                    {{ App\Models\NewsSection::first()->title_en }}
                </p>
            </header>
            <div class="row">
                <div class="col-lg-4 col-md-12" data-aos="zoom-in-up" data-aos-offset="0" data-aos-duration="1500">
                    <div class="report">
                        <div class="image">
                            <a href="newsDetails.html" target="_blank">
                                <img src="{{ asset('user_assets/images/home/news/img (1).png') }}" alt="" />
                            </a>
                        </div>
                        <div class="details">
                            <div class="up d-flex justify-content-between align-items-center">
                                <div class="name d-flex">
                                    <h5>Mary Lanoris</h5>
                                    <span>-</span>
                                    <span>Sep 22, 2020</span>
                                </div>
                                <img class="shareNews"
                                    src="{{ asset('user_assets/images/home/news/Vector (1).png') }}" alt="" />
                            </div>
                            <div class="down">
                                <p>Modern and trading decorations for wedding 2020</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12" data-aos="zoom-in-up" data-aos-offset="0" data-aos-duration="1500">
                    <div class="report">
                        <div class="image">
                            <a href="newsDetails.html" target="_blank">
                                <img src="{{ asset('user_assets/images/home/news/img.png') }}" alt="" />
                            </a>
                        </div>
                        <div class="details">
                            <div class="up d-flex justify-content-between align-items-center">
                                <div class="name d-flex">
                                    <h5>Mary Lanoris</h5>
                                    <span>-</span>
                                    <span>Sep 22, 2020</span>
                                </div>
                                <img class="shareNews"
                                    src="{{ asset('user_assets/images/home/news/Vector (1).png') }}" alt="" />
                            </div>
                            <div class="down">
                                <p>The most important things when you choose the flowers</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12" data-aos="zoom-in-up" data-aos-offset="0" data-aos-duration="1500">
                    <div class="report">
                        <div class="image">
                            <a href="newsDetails.html" target="_blank">
                                <img src="{{ asset('user_assets/images/home/news/img (2).png') }}" alt="" />
                            </a>
                        </div>
                        <div class="details">
                            <div class="up d-flex justify-content-between align-items-center">
                                <div class="name d-flex">
                                    <h5>Mary Lanoris</h5>
                                    <span>-</span>
                                    <span>Sep 22, 2020</span>
                                </div>
                                <img class="shareNews"
                                    src="{{ asset('user_assets/images/home/news/Vector (1).png') }}" alt="" />
                            </div>
                            <div class="down">
                                <p>How to prepare everything on the high level</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ------------------ end section news---------------------------- -->
@endsection
