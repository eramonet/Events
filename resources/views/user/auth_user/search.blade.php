@extends('user.layout.authes')
@section('title') Search @endsection
@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{ $term }}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb" style="direction: ltr">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('trans.Home') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('trans.collection') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
    <input type="text" value="{{ $term }}" id="search_term" hidden>

    <input type="text" id="product_id_compare_list" hidden>

    <!-- section start -->
    <section class="section-b-space ratio_asos">
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 collection-filter">
                        <!-- side-bar colleps block stat -->
                        <div class="collection-filter-block">
                            <!-- brand filter start -->
                            <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left"
                                        aria-hidden="true"></i> {{ __('trans.back') }}</span></div>
                            <div class="collection-collapse-block open" style="direction: ltr;">
                                <h3 class="collapse-block-title">{{ __('trans.brand') }}</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="collection-brand-filter">
                                        @foreach ($brands as $brand)
                                            <div class="form-check collection-filter-checkbox">
                                                <input type="checkbox" class="form-check-input checkbox_brands"
                                                    name="brands_choices" value="{{ $brand->id }}">
                                                <label class="form-check-label"
                                                    for="zara">@if(session()->get('locale') == 'en'){{ $brand->title_en }}@else{{ $brand->title_ar }}@endif</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- color filter start here -->
                            <div class="collection-collapse-block open" style="direction: ltr;">
                                <h3 class="collapse-block-title">colors</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="color-selector">
                                        <ul>
                                            @foreach ($colors as $color)
                                                <li style="background-color: {{ $color->code }}"
                                                    onclick="set_color_choosing('{{ $color->id }}')"></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- size filter start here -->
                            <div class="collection-collapse-block border-0 open" style="direction: ltr">
                                <h3 class="collapse-block-title">{{ __('trans.size') }}</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="collection-brand-filter">
                                        @foreach ($sizes as $size)
                                            <div class="form-check collection-filter-checkbox">
                                                <input type="checkbox" class="form-check-input" id="hundred"
                                                    name="sizes_choices" value="{{ $size->id }}">
                                                <label class="form-check-label" for="hundred">{{ $size->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- price filter start here -->
                            <div class="collection-collapse-block border-0 open" style="direction: ltr">
                                <h3 class="collapse-block-title">{{ __('trans.price') }}</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="wrapper mt-3">
                                        <div class="range-slider">
                                            <input type="text" disabled class="js-range-slider" value=""
                                                id="price_filter" />
                                        </div>
                                    </div>
                                </div>
                                <br><button class="btn btn-primary form-control"
                                    style="background-color: #bfb521; border:#bfb521; outline: none"
                                    id="filter_btn">{{ __('trans.Filter') }}</button><br>
                            </div>

                        </div>
                        <!-- silde-bar colleps block end here -->
                        <!-- side-bar single product slider start -->
                        <div class="theme-card" style="direction: ltr;">
                            <h5 class="title-border">{{ __('trans.new product') }}</h5>
                            <div class="offer-slider slide-1">
                                <div>
                                    @foreach ($first_three_new_products as $first_three_new_products)
                                        <div class="media">
                                            <a href="" style="display: contents">
                                                <img class="img-fluid blur-up lazyload" style="width: 50%; height: 120px;"
                                                    src="{{ $first_three_new_products->primary_image_url }}" width="">
                                            </a>
                                            <div class="media-body align-self-center">
                                                <a href="product-page(no-sidebar).html">
                                                    <h6>@if(session()->get('locale') == 'en'){{ $first_three_new_products->title_en }}@else{{ $first_three_new_products->title_ar }}@endif</h6>
                                                </a>
                                                <h4>{{ $first_three_new_products->real_price }} {{ __('trans.EGP') }}</h4>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div>
                                    @foreach ($last_three_new_products as $last_three_new_products)
                                        <div class="media">
                                            <a href="">
                                                <img class="img-fluid blur-up lazyload"
                                                    src="{{ $last_three_new_products->primary_image_url }}" alt="">
                                            </a>
                                            <div class="media-body align-self-center">
                                                <a href="product-page(no-sidebar).html">
                                                    <h6>@if(session()->get('locale') == 'en'){{ substr($last_three_new_products->title_en, 0, 20) }}@else{{ substr($last_three_new_products->title_ar, 0, 20) }}@endif</h6>
                                                </a>
                                                <h4>{{ $last_three_new_products->real_price }} {{ __('trans.EGP') }}</h4>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- side-bar single product slider end -->
                        <!-- side-bar banner start here -->
                        <div class="collection-sidebar-banner">
                            @foreach ($under_adv as $under_adv)
                                <a href="{{ $under_adv->link }}"><img src="{{ $under_adv->image }}"
                                        class="img-fluid blur-up lazyload" alt=""></a>
                            @endforeach
                        </div>
                        <!-- side-bar banner end here -->
                    </div>
                    <div class="collection-content col">
                        <div class="page-main-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    @foreach ($top_adv as $top_adv)
                                        <div class="top-banner-wrapper">
                                            <a href="{{ $top_adv->link }}"><img src="{{ $top_adv->main_image }}"
                                                    class="img-fluid blur-up lazyload" alt=""></a>
                                            <div class="top-banner-content small-section">
                                                <h4> {{ $top_adv->title }} </h4>
                                                <p>{{ $top_adv->description }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="collection-product-wrapper">
                                        <div class="product-top-filter">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="filter-main-btn"><span class="filter-btn btn btn-theme"><i
                                                                class="fa fa-filter" aria-hidden="true"></i> Filter</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="product-filter-content">
                                                        <div class="search-count">
                                                            <h5>{{ __('trans.Showing Products 1-24 of 10 Result') }}</h5>
                                                        </div>
                                                        <div class="collection-view">
                                                            <ul>
                                                                <li><i class="fa fa-th grid-layout-view"></i></li>
                                                                <li><i class="fa fa-list-ul list-layout-view"></i></li>
                                                            </ul>
                                                        </div>
                                                        <div class="collection-grid-view">
                                                            <ul>
                                                                <li><img src="../assets/images/icon/2.png" alt=""
                                                                        class="product-2-layout-view"></li>
                                                                <li><img src="../assets/images/icon/3.png" alt=""
                                                                        class="product-3-layout-view"></li>
                                                                <li><img src="../assets/images/icon/4.png" alt=""
                                                                        class="product-4-layout-view"></li>
                                                                <li><img src="../assets/images/icon/6.png" alt=""
                                                                        class="product-6-layout-view"></li>
                                                            </ul>
                                                        </div>
                                                        <div class="product-page-per-view">
                                                            <select>
                                                                <option value="High to low">{{ __('trans.24 Products Par Page') }}
                                                                </option>
                                                                <option value="Low to High">{{ __('trans.50 Products Par Page') }}
                                                                </option>
                                                                <option value="Low to High">{{ __('trans.100 Products Par Page') }}
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="product-page-filter">
                                                            <select>
                                                                <option value="High to low">{{ __('trans.Sorting items') }}</option>
                                                                <option value="Low to High">{{ __('trans.50 Products') }}</option>
                                                                <option value="Low to High">{{ __('trans.100 Products') }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-wrapper-grid">
                                            <div class="row margin-res" id="product_filter_content">
                                                @foreach ($matching as $item)
                                                    <div class="col-xl-3 col-6 col-grid-box">
                                                        <div class="product-box">
                                                            <div class="img-wrapper">
                                                                @if ($item->fake_price > $item->real_price)
                                                                    <div
                                                                        style="background-color: red; color:#fff; font-weight: bold ; padding:5px; border-radius:50%; position: absolute; ; z-index: 9; margin: 10px 0px 0px 10px">

                                                                        <h4 style="">
                                                                            {{ number_format(100 - ($item->real_price / $item->fake_price) * 100) }}%
                                                                            <br>
                                                                        </h4>

                                                                    </div>
                                                                @endif
                                                                <div class="front">
                                                                    <a
                                                                        href="@if(session()->get('locale') == 'en'){{ route('product.details', $item->slug_en) }}@else{{ route('product.details', $item->slug_ar) }}@endif"><img
                                                                            src="{{ $item->primary_image_url }}"
                                                                            class="img-fluid blur-up lazyload bg-img"
                                                                            alt=""></a>
                                                                </div>
                                                                <div class="back">
                                                                    <a
                                                                        href="@if(session()->get('locale') == 'en'){{ route('product.details', $item->slug_en) }}@else{{ route('product.details', $item->slug_ar) }}@endif"><img
                                                                            src="{{ $item->primary_image_url }}"
                                                                            class="img-fluid blur-up lazyload bg-img"
                                                                            alt=""></a>
                                                                </div>
                                                                <div class="cart-info cart-wrap">
                                                                    <button
                                                                        onclick="add_to_cart_list({{ $item->id }})"
                                                                        title="Add to cart"><i
                                                                            class="ti-shopping-cart"></i></button> <a
                                                                        href="javascript:void(0)" title="Add to Wishlist"
                                                                        onclick="add_to_wishlist({{ $item->id }})"><i
                                                                            class="ti-heart" aria-hidden="true"></i></a>
                                                                    <a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#quick-view"
                                                                        onclick="setProductSlug({{ $item->id }})"
                                                                        title="Quick View"><i class="ti-search"
                                                                            aria-hidden="true"></i></a>
                                                                    <a onclick="add_to_compare_list({{ $item->id }})"
                                                                        href="javascript:void(0)" title="Compare"><i
                                                                            class="ti-reload" aria-hidden="true"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="product-detail">
                                                                <div>
                                                                    <a href="product-page(no-sidebar).html">
                                                                        <h6>@if(session()->get('locale') == 'en'){{ $item->title_en }}@else{{ $item->title_ar }}@endif</h6>
                                                                    </a>
                                                                    <h6>@if(session()->get('locale') == 'en'){{ $item->category->title_en }}@else{{ $item->category->title_ar }}@endif</h6>
                                                                    <p>
                                                                        @if(session()->get('locale') == 'en'){{ $item->description_en }}@else{{ $item->description_ar }}@endif
                                                                    </p>
                                                                    <h4>{{ $item->real_price }} {{ __('trans.EGP') }} <span></span>
                                                                        <del>{{ $item->fake_price <= $item->real_price ? '' : $item->fake_price . ' EGP' }}</del>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Quick-view modal popup start-->
    <div class="modal fade bd-example-modal-lg theme-modal" id="quick-view" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content quick-view-modal">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="row">
                    <div class="col-lg-6  col-xs-12">
                        <div class="quick-view-img">
                            <img id="qv_img" src="../assets/images/pro3/1.jpg" alt=""
                                class="img-fluid blur-up lazyload">
                        </div>
                    </div>
                    <div class="col-lg-6 rtl-text">
                        <div class="product-right">
                            <h2 id="qv_main_title"> Women Pink Shirt </h2>
                            <h3><span id="qv_price"></span> <del id="qv_fake_price"></del> </h3>
                            {{-- <ul class="color-variant">
                            <li class="bg-light0"></li>
                            <li class="bg-light1"></li>
                            <li class="bg-light2"></li>
                        </ul> --}}
                            <div class="border-product">
                                <h6 class="product-title">{{ trans('trans.Product Details') }}</h6>
                                <p id="qv_product_details"></p>
                                <input type="text" id="quick_view_product_slug" hidden>
                                <input type="text" id="product_slugging" hidden>
                            </div>
                            <div class="product-buttons">
                                <a onclick="go_to_product_details_from_quick_view()"
                                    class="btn btn-solid">{{ trans('trans.view detail') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quick-view modal popup end-->
            </div>
            </div>
        </div>
    </section>
    <!-- section End -->

@endsection
