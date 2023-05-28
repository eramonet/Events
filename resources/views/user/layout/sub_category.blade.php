@extends('user.layout.guest')
@section('title') {{ $sub_category->parent->title_en }} | {{ $sub_category->title_en }} @endsection
@section('content')

<!-- section start -->
<section class="section-b-space ratio_asos">
    <div class="collection-wrapper">
        <div class="container">
            <div class="row">
                <div class="collection-content col">
                    <div class="page-main-content">
                        <div class="top-banner-wrapper">
                            <div style="text-align: center">
                                <img src="{{ $sub_category->image_url }}" class="img-fluid blur-up lazyload" width="50%"
                                    style="height: 300px; margin: auto">
                            </div>
                            <div class="top-banner-content small-section" @if(session()->get('locale') == 'ar') style="text-align: right" @endif>
                                <h4>@if(session()->get('locale') == 'en'){{ $sub_category->title_en }}@else{{ $sub_category->title_ar }}@endif</h4>
                                <p>@if(session()->get('locale') == 'en'){{ $sub_category->description_en }}@else{{ $sub_category->description_ar }}@endif</p>
                            </div>
                        </div>
                        <div class="collection-product-wrapper">
                            <div class="product-top-filter">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="product-filter-content">
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
                                                <select class="filter_products_count">
                                                    <option value="High to low">{{ trans('trans.Sort Option 1') }}</option>
                                                    <option value="High to low">{{ trans('trans.First 24 Product') }}
                                                    </option>
                                                    <option value="Low to High">{{ trans('trans.First 50 Product') }}
                                                    </option>
                                                    <option value="Low to High">{{ trans('trans.All Products') }}
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="product-page-filter">
                                                <select class="filter_products_count">
                                                    <option value="High to low"> {{ trans('trans.Sort Option 2') }} </option>
                                                    <option value="Low to High">{{ trans('trans.New') }}</option>
                                                    <option value="Low to High">{{ trans('trans.Old') }}</option>
                                                </select>
                                                <input type="text" value="@if(session()->get('locale') == 'en'){{ $sub_category->slug_en }}@else{{ $sub_category->slug_ar }}@endif" id="my_personal_slug" hidden>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrapper-grid">
                                <div class="row margin-res" id="product_filter_result">
                                    @if ($sub_category->products->count() > 0)
                                    @foreach ($sub_category->products as $product)
                                    <div class="col-lg-4 col-6 col-grid-box">
                                        <div class="product-box" @if(session()->get('locale') == 'ar') style="text-align: right" @endif>
                                            <div class="img-wrapper">
                                                <div class="front">
                                                    <a href="@if(session()->get('locale') == 'en'){{ url('product/' . $product->slug_en ) }}@else{{ url('product/' . $product->slug_ar ) }}@endif">
                                                        <img src="{{ $product->primary_image_url }}"
                                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                </div>
                                                <div class="back">
                                                    <a href="@if(session()->get('locale') == 'en'){{ url('product/' . $product->slug_en ) }}@else{{ url('product/' . $product->slug_ar ) }}@endif"><img src="{{ $product->primary_image_url }}"
                                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                </div>
                                                <div class="cart-info cart-wrap">
                                                    <button onclick="add_to_cart_list({{ $product->id }})"
                                                        title="Add to cart"><i class="ti-shopping-cart"></i></button>
                                                        <a href="javascript:void(0)" title="Add to Wishlist" onclick="add_to_wishlist({{ $product->id }})"><i
                                                            class="ti-heart" aria-hidden="true"></i></a>
                                                            <a onclick="add_to_compare_list({{ $product->id }})" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-detail">
                                                <div>
                                                    <a href="@if(session()->get('locale') == 'en'){{ url('product/' . $product->slug_en ) }}@else{{ url('product/' . $product->slug_ar) }}@endif">
                                                        <h6>@if(session()->get('locale') == 'en'){{ $product->title_en }}@else{{ $product->title_ar }}@endif</h6>
                                                    </a>
                                                    <h6>@if(session()->get('locale') == 'en'){{ $product->category->title_en }}@else{{ $product->category->title_ar }}@endif</h6>
                                                    <p>@if(session()->get('locale') == 'en'){{ $product->description_en }}@else{{ $product->description_ar }}@endif</p>
                                                    <h4> {{ $product->real_price }} {{ __('trans.EGP') }} <span></span> <del>{{
                                                            $product->fake_price >= $product->real_price ? "" :
                                                            $product->fake_price .  __('trans.EGP') }} </del> </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @if ( $sub_category->products->count() > 10 )
                                    <div class="product-pagination" style="margin-top: 150px !important; width: 80%; margin: auto">
                                        <div class="theme-paggination-block">
                                            <div class="row">
                                                <div class="col-xl-6 col-md-6 col-sm-12">
                                                    {{ $sub_category->products->links() }}
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-sm-12">
                                                    <div class="product-search-count-bottom">
                                                        <h5>{{ __('trans.Showing Products') }} {{ $sub_category->products->count() }} Results</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @else
                                    <h3 style="margin-top: 30px; text-align: center">{{ __('trans.No Products') }}</h3>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->



@endsection
