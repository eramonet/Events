@extends('user.layout.guest')
@section('title') {{ $category->title_en }} @endsection
@section('content')
    <!-- product listing section start -->
    <section class="section-b-space ratio_square category-shop-section">
        <div class="collection-wrapper">
            <div class="container">
                <a href="javascript:void(0)" class="d-xl-none d-inline-block category-mobile-button"><i class="fa fa-bars"></i>
                    Category</a>
                <div class="row">
                    <div class="col-xl-3">
                        <div class="sidebar-overlay" ></div>
                        <div class="nav flex-column" id="v-pills-tab" role="tablist" aria-orientation="vertical" @if(session()->get('locale') == 'ar')style="text-align:right" @endif>
                            @foreach ($category->sub_catagories as $sub)
                                <a class="nav-link active"
                                    onclick="get_sub_category_products({{ $sub->id }})">@if(session()->get('locale') == 'en'){{ $sub->title_en }}@else{{ $sub->title_ar }}@endif</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xl-9">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="grocery">
                                <div class="title8" @if(session()->get('locale') == 'ar') style="text-align: right" @endif>
                                    <h2>@if(session()->get('locale') == 'en'){{ $category->title_en }}@else{{ $category->title_ar }}@endif</h2>
                                    <p>
                                        @foreach ($category->sub_catagories as $sub)
                                        @if(session()->get('locale') == 'en'){{ $sub->title_en . ',' }}@else{{ $sub->title_ar . ',' }}@endif
                                        @endforeach
                                    </p>
                                </div>
                                <div class="row g-sm-4 g-3" id="products_in_category_page">
                                    @foreach ($category->sub_catagories as $sub)
                                        @if ($sub->products->count() > 0)
                                            @foreach ($sub->products as $product)
                                                <div class="col-lg-3 col-md-4 col-6">
                                                    <div class="product-box product-style-5">
                                                        <a href="@if(session()->get('locale') == 'en'){{ url('product/' . $product->slug_en ) }}@else{{ url('product/' . $product->slug_ar ) }}@endif">
                                                            @if ($product->fake_price > $product->real_price)
                                                                <h4
                                                                    style="float: right;background-color: red; border-radius:50%; display: inline; padding:15px 10px 10px 10px; color:#fff; font-weight: bold;">
                                                                    {{ number_format(($product->real_price / $product->fake_price) * 100) }}%
                                                                    <br>
                                                                </h4>
                                                            @endif
                                                            <h6>@if(session()->get('locale') == 'en'){{ $product->title_en }}@else{{ $product->title_ar }}@endif</h6>
                                                        </a>
                                                        <h5>@if(session()->get('locale') == 'en'){{ $product->category->title_en }}@else{{ $product->category->title_ar }}@endif</h5>
                                                        <h4> {{ $product->real_price . trans('trans.EGP') }}
                                                            <del>{{ $product->real_price >= $product->fake_price ? '' : $product->fake_price . trans('trans.EGP') }}</del>
                                                        </h4>
                                                        <div class="addtocart_btn">
                                                            <button class="add-button add_cart" title="Add to cart"
                                                                onclick="add_to_cart_list({{ $product->id }})">
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </div>
                                                        <div class="img-wrapper">
                                                            <div class="front">
                                                                <a href="@if(session()->get('locale') == 'en'){{ url('product/' . $product->slug_en) }}@else{{ url('product/' . $product->slug_ar) }}@endif">

                                                                    <img alt=""
                                                                        src="{{ $product->primary_image_url }}"
                                                                        class="img-fluid blur-up lazyload bg-img">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product listing section end -->



@endsection
