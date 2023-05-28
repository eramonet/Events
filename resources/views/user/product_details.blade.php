
@extends('user.layout.authes')
@section('title')  Product Details @endsection
@section('content')
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
    @endforeach
    <!-- section start -->
    <section>
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-slick">
                            @foreach ($medias as $media)
                                <div><img src="{{ asset($media->image_url) }}" alt=""
                                        class="img-fluid blur-up lazyload image_zoom_cls-0"></div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-12 p-0">
                                <div class="slider-nav">
                                    @foreach ($medias as $media)
                                        <div><img src="{{ asset($media->image_url) }}" alt=""
                                                class="img-fluid blur-up lazyload"></div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 rtl-text">
                        <div class="product-right">
                            <div class="product-count">
                                <ul>
                                    <li>
                                        <img src="../assets/images/fire.gif" class="img-fluid" alt="image">
                                        <span class="p-counter">{{ $ordersCount }}</span>
                                        <span class="lang">{{ __('trans.orders in last 24 hours') }}</span>
                                    </li>
                                    <li>
                                        <img src="../assets/images/person.gif" class="img-fluid user_img" alt="image">
                                        <span class="p-counter">{{ $reviews_count }}</span>
                                        <span class="lang">{{ __('trans.active view this') }}</span>
                                    </li>
                                </ul>
                            </div>
                            <h2>
                                @if(session()->get('locale') == 'en')
                                    {{ $getProduct->title_en }}@else{{ $getProduct->title_ar }}
                                @endif
                            </h2>
                            <h3 class="price-detail">{{ $getProduct->real_price }} {{ __('trans.EGP') }}
                                <del>{{ $getProduct->real_price <= $getProduct->fake_price ? $getProduct->fake_price . ' EGP' : '' }}</del><span>{{ $getProduct->real_price <= $getProduct->fake_price ? number_format( 100 - (($getProduct->real_price / $getProduct->fake_price) * 100) ) . '% off' : '' }}
                                </span>
                            </h3>
                            <ul class="color-variant">
                                @foreach ($getProduct->colors as $color)
                                    <li style="background-color: {{ $color->code }}"
                                        onclick="set_color_from_product_details('{{ $color->code }}')"></li>
                                @endforeach

                            </ul>
                            <div id="selectSize" class="addeffect-section product-description border-product">
                                <h6 class="error-message">{{ __('trans.please select size') }}</h6>
                                <div class="size-box">
                                    <ul>
                                        @foreach ($getProduct->sizes as $size)
                                            <li onclick="set_size_from_product_details('{{ $size->name }}')"><a
                                                    href="javascript:void(0)">{{ $size->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <input type="text" id="product_details_qunatity_class" hidden>
                                <h6 class="product-title">{{ __('trans.quantity') }}</h6>
                                <div class="qty-box">
                                    <div class="input-group">
                                        <span class="input-group-prepend"><button type="button"
                                                onclick="decrement_from_product_datails({{ $getProduct->stock }} , {{ $getProduct->id }})"
                                                class="btn quantity-left-minus" data-type="minus" data-field=""><i
                                                    class="ti-angle-left"></i></button> </span>

                                        <h4 style="padding: 10px 30px; font-size: 20px; color: #000; font-weight: bold"
                                            id="quantity_of_cart_element_{{ $getProduct->id }}">1</h4>

                                        <span class="input-group-prepend"><button type="button"
                                                onclick="increment_from_product_datails({{ $getProduct->stock }} , {{ $getProduct->id }})"
                                                class="btn quantity-right-plus" data-type="plus" data-field=""><i
                                                    class="ti-angle-right"></i></button></span>
                                    </div>
                                </div>
                            </div>

                            <div class="product-buttons" id="add_to_cart_div">
                                <a hidden id="cartEffect222" class="btn btn-solid hover-solid btn-animation"></a>
                                @if ($getProduct->sizes->count() > 0 || $getProduct->colors()->count() > 0)
                                    <a style="pointer-events: none;" id="cartEffect"
                                        onclick="add_to_cart_list_product_details('{{ $getProduct->id }}')"
                                        class="btn btn-solid hover-solid btn-animation">
                                        <i class="fa fa-shopping-cart me-1" aria-hidden="true"></i> {{ __('trans.add to cart') }}
                                    </a>
                                @else
                                    <a style="cursor: pointer;"
                                        onclick="add_to_cart_list_product_details('{{ $getProduct->id }}')"
                                        class="btn btn-solid hover-solid btn-animation">
                                        <i class="fa fa-shopping-cart me-1" aria-hidden="true"></i> {{ __('trans.add to cart') }}
                                    </a>
                                @endif

                                <a onclick="add_to_wishlist('{{ $getProduct->id }}')" class="btn btn-solid"><i
                                        class="fa fa-bookmark fz-16 me-2" aria-hidden="true"></i>{{ __('trans.wishlist') }}</a>
                            </div>
                            <div class="product-count">
                                <ul>
                                    <li>
                                        <img src="../assets/images/icon/truck.png" class="img-fluid" alt="image">
                                        <span class="lang">{{ $getProduct->shipping }}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="border-product">
                                <h6 class="product-title">{{ __('trans.Sales Ends In') }}</h6>
                                <div class="timer" style="padding-left: 0px; padding:20px">
                                    <p id="demo"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                        {{ $getProduct->to }}</p>
                                </div>
                            </div>
                            {{-- <div class="border-product">
                                <h6 class="product-title">shipping info</h6>
                                <ul class="shipping-info">
                                    <li>100% Original Products</li>
                                    <li>Free Delivery on order above Rs. 799</li>
                                    <li>Pay on delivery is available</li>
                                    <li>Easy 30 days returns and exchanges</li>
                                </ul>
                            </div> --}}
                            <div class="border-product">
                                <h6 class="product-title">{{ __('trans.share it') }}</h6>
                                <div class="product-icon">
                                    <ul class="product-social">
                                        <li><a href="https://www.facebook.com/sharer/sharer.php?u=https://newstore.eramoerp.com/product/{{ $getProduct->slug_en }}"><i class="fa fa-facebook-f"></i></a></li>
                                        <li><a href="https://wa.me/?text=https://newstore.eramoerp.com/product/{{ $getProduct->slug_en }}"><i class="fa fa-whatsapp"></i></a></li>
                                        <li><a href="https://twitter.com/intent/tweet?text=my share text&amp;url=https://newstore.eramoerp.com/product/{{ $getProduct->slug_en }}"><i class="fa fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            @if (count($get2Products) > 0)
                                <div class="border-product">
                                    <h6 class="product-title">{{ __('trans.Frequently bought together') }}</h6>
                                    <div class="bundle">
                                        <div class="bundle_img">
                                            <div class="img-box">
                                                <a href="@if(session()->get('locale') == 'en'){{ url('product/' . $getProduct->slug_en) }}@else{{ url('product/' . $getProduct->slug_ar) }}@endif"><img
                                                        src="{{ $getProduct->primary_image_url }}" alt=""
                                                        class="img-fluid blur-up lazyload"></a>
                                            </div>

                                            @foreach ($get2Products as $two)
                                                <span class="plus">+</span>
                                                <div class="img-box">
                                                    <a href="@if(session()->get('locale') == 'en'){{ url('product/' . $two->slug_en) }}@else{{ url('product/' . $two->slug_ar) }}@endif"><img
                                                            src="{{ $two->primary_image_url }}" alt=""
                                                            class="img-fluid blur-up lazyload"></a>
                                                </div>
                                            @endforeach


                                        </div>
                                        <div class="bundle_detail">
                                            <div class="theme_checkbox">
                                                <label>this product: @if(session()->get('locale') == 'en')
                                                        {{ $getProduct->title_en }}@else{{ $getProduct->title_ar }}
                                                    @endif
                                                    <span class="price_product"></span>
                                                    <input type="checkbox" checked="checked" disabled>
                                                    <span class="checkmark"></span>
                                                </label>
                                                @foreach ($get2Products as $two)
                                                    <label style="padding-left: 0px">
                                                        @if ($two->stock > 0)
                                                            <a id="cartEffect"
                                                                onclick="add_to_cart_list_product_details('{{ $two->id }}')"
                                                                class="btn btn-solid hover-solid btn-animation"
                                                                style="padding: 10px">
                                                                <i class="fa fa-shopping-cart me-1"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                        @else
                                                            <a id="cartEffect"
                                                                onclick="add_to_cart_list_product_details('{{ $two->id }}')"
                                                                class="btn btn-solid hover-solid btn-animation"
                                                                style="padding: 10px !important ;cursor: not-allowed;">
                                                                <i class="fa fa-shopping-cart me-1"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                        @endif
                                                        @if(session()->get('locale') == 'en')
                                                            {{ $two->title_en }}@else{{ $two->title_ar }}
                                                        @endif
                                                        <span class="price_product">{{ $two->real_price . ' EGP' }}
                                                            <del>{{ $two->fake_price <= $two->real_price ? '' : $two->fake_price . ' EGP' }}</del></span>


                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->


    <!-- product-tab starts -->
    <section class="tab-product m-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-bs-toggle="tab"
                                href="#top-home" role="tab" aria-selected="true"><i
                                    class="icofont icofont-ui-home"></i>{{ __('trans.Details') }}</a>
                            <div class="material-border"></div>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="profile-top-tab" data-bs-toggle="tab"
                                href="#top-profile" role="tab" aria-selected="false"><i
                                    class="icofont icofont-man-in-glasses"></i>{{ __('trans.Specification') }}</a>
                            <div class="material-border"></div>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-bs-toggle="tab"
                                href="#top-contact" role="tab" aria-selected="false"><i
                                    class="icofont icofont-contacts"></i>{{ __('trans.Video') }}</a>
                            <div class="material-border"></div>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="review-top-tab" data-bs-toggle="tab"
                                href="#top-review" role="tab" aria-selected="false"><i
                                    class="icofont icofont-contacts"></i>{{ __('trans.Write Review') }}</a>
                            <div class="material-border"></div>
                        </li>

                        <li class="nav-item"><a class="nav-link" id="review-top-tab" data-bs-toggle="tab"
                                href="#top-reviews" role="tab" aria-selected="false"><i
                                    class="icofont icofont-contacts"></i>{{ __('trans.Reviews') }}</a>
                            <div class="material-border"></div>
                        </li>
                    </ul>
                    <div class="tab-content nav-material" id="top-tabContent">
                        <div class="tab-pane fade show active" id="top-home" role="tabpanel"
                            aria-labelledby="top-home-tab">
                            <div class="product-tab-discription">
                                <div class="part">
                                    <p>
                                        @if(session()->get('locale') == 'en')
                                            {{ $getProduct->title_en }}@else{{ $getProduct->title_ar }}
                                        @endif
                                    </p>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                            <p>
                                @if(session()->get('locale') == 'en')
                                    {{ $getProduct->features_en }}@else{{ $getProduct->features_ar }}
                                @endif
                            </p>
                        </div>

                        <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                            <div class="">
                                <iframe width="560" height="315" src="{{ $getProduct->video }}"
                                    allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="top-review" role="tabpanel" aria-labelledby="review-top-tab">
                            <form class="theme-form" method="POST" action="{{ route('ratings.store') }}">
                                @csrf
                                <input hidden name="product_id" value={{ $getProduct->id }}>
                                <div class="form-row row">
                                    <div class="col-md-6">
                                        <label for="name">{{ __('trans.Name') }}</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter Your name" required
                                            @if (auth()->user()) @disabled(true) value="{{ auth()->user()->name }}" @endif>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email">{{ __('trans.Email') }}</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                            @if (auth()->user()) @disabled(true) value="{{ auth()->user()->email }}" @endif
                                            placeholder="Email" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="review">{{ __('trans.Review Title') }}</label>
                                        <input type="text" class="form-control" id="subject	"
                                            placeholder="Enter your Review Subjects" name="title" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="review">{{ __('trans.Testimonial') }}</label>
                                        <textarea class="form-control" placeholder="Wrire Your Testimonial Here" id="exampleFormControlTextarea1"
                                            name="testimonial" rows="6"></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-solid" type="submit">{{ __('trans.Submit YOur Review') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="top-reviews" role="tabpanel" aria-labelledby="contact-top-tab">
                            <div class="">
                                @if (count($reviews) > 0)
                                    @foreach ($reviews as $key => $review)
                                        <div class="block block-comment">
                                            <div class="block-image" style="display: inline-block;">
                                                <img src="{{ asset('uploads/users_images/default.png') }}"
                                                    class="rounded-circle">
                                            </div>
                                            <div class="col">
                                                <h3 class="heading heading-6">
                                                    <a href="javascript:;">{{ $review->name }}</a>
                                                </h3>
                                                <span class="comment-date">
                                                    {{ date('d-m-Y', strtotime($review->created_at)) }}
                                                </span>
                                            </div>
                                            <div class="block-body">
                                                <div class="block-body-inner">
                                                    <div class="row no-gutters">


                                                    </div>
                                                    <p class="comment-text">
                                                        {{ $review->testimonial }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="d-felx justify-content-center">
                                        {{ $reviews->links() }}


                                    </div>
                                @else
                                    <h3>{{ __('trans.No Reviews be first person to make it') }}</h3>
                                @endif


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product-tab ends -->


    <!-- product section start -->
    @if (count($getproducts_with) > 0)
        <section class="section-b-space ratio_asos">
            <div class="container">
                <div class="row">
                    <div class="col-12 product-related">
                        <h2>{{ __('trans.related products') }}</h2>
                    </div>
                </div>
                <div class="row search-product">
                    <div class="col-12">
                        <div class="slide-7-demo slick-sm-margin no-arrow">
                            @foreach ($getproducts_with as $prod)
                                <div class="product-box product-style-4">
                                    <div class="img-wrapper">
                                        <div class="front">
                                            <a href="@if(session()->get('locale') == 'en'){{ url('product/' . $prod->slug_en) }}@else{{ url('product/' . $prod->slug_ar) }}@endif"><img
                                                    style="height: 30px; width:100px"
                                                    src="{{ $prod->primary_image_url }}"
                                                    class="img-fluid blur-up lazyload bg-img"></a>
                                        </div>
                                        <div class="cart-detail">
                                            <a href="javascript:void(0)" title="Add to Wishlist"
                                                onclick="add_to_wishlist({{ $prod->id }})">
                                                <i class="ti-heart" aria-hidden="true"></i></a> <a
                                                onclick="add_to_compare_list({{ $prod->id }})"
                                                href="javascript:void(0)" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="@if(session()->get('locale') == 'en'){{ route('product.details', $prod->slug_en) }}@else{{ route('product.details', $prod->slug_ar) }}@endif">
                                            <h6>@if(session()->get('locale') == 'en'){{ $prod->title_en }}@else{{ $prod->title_ar }}@endif</h6>
                                        </a>
                                        <a style="color:#000 !important">
                                            <h6>@if(session()->get('locale') == 'en'){{ $prod->title_en }}@else{{ $prod->title_ar }}@endif</h6>
                                        </a>
                                        <h6>{{ $prod->real_price }} {{ __('trans.EGP') }} <span></span>
                                            <del>{{ $prod->fake_price <= $prod->real_price ? '' : $prod->fake_price . ' EGP' }}
                                            </del>
                                        </h6>
                                        <div class="addtocart_btn">
                                            @if ($prod->stock > 0)
                                                <button class="add-button add_cart" title="Add to cart" @if(session()->get('locale') == 'ar') style="margin-right: 82%;" @endif
                                                    onclick="add_to_cart_list({{ $prod->id }})">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endif


@endsection
