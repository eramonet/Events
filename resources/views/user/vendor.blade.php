@extends('user.layout.guest')
@section('title') Vendor @endsection
@section('content')
   <!-- vendor cover start -->
    <div class="vendor-cover">
        <div>
            <img src="{{ $data->cover_image }}" style="min-width: 1920px;min-height: 350px" alt="" class="bg-img lazyload blur-up">
        </div>
    </div>
    <!-- vendor cover end -->


    <!-- section start -->
    <section class="vendor-profile pt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="profile-left">
                        <div class="profile-image">
                            <div>
                                <img src="{{ $vendor->image_url }}" alt="" class="img-fluid">
                                <h3>{{ $vendor->name }}</h3>

                                <h6>{{$reviewsCount}} review</h6>
                            </div>
                        </div>
                        <div class="profile-detail">
                            <div>
                                <p>{{ $data->about_en }}</p>

                            </div>
                        </div>
                        <div class="vendor-contact">
                            <div>
                                <h6>follow us:</h6>
                                <div class="footer-social">
                                    <ul>
                                        <li><a href="{{ $data->facebook }}" target="_blank"><i class="fa fa-facebook-f"></i></a></li>
                                        <li><a href="{{ $data->google }}"target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="{{ $data->twitter }}"target="_blank"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="{{ $data->insta }}"target="_blank"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Section ends -->


    <!-- collection section start -->
    <section class="section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 collection-filter">
                    <!-- side-bar colleps block stat -->
                    <div class="collection-filter-block">
                        <!-- brand filter start -->
                        <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left"
                                    aria-hidden="true"></i> back</span></div>
                        <div class="collection-collapse-block open">
                            <h3 class="collapse-block-title">vendor category</h3>
                            <div class="collection-collapse-block-content">
                                <div class="collection-brand-filter">
                                    @foreach ($vendorCats as $cat)
                                    <div class="form-check collection-filter-checkbox">
                                        <input type="checkbox" class="form-check-input" id="{{  $cat->title_en  }}">
                                        <label class="form-check-label" for="{{  $cat->title_en  }}">{{ $cat->title_en  }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- color filter start here -->
                        <div class="collection-collapse-block open">
                            <h3 class="collapse-block-title">colors</h3>
                            <div class="collection-collapse-block-content">
                                <div class="color-selector">
                                    <ul>
                                        @foreach ($colors as $color)
                                 <li style="background-color: {{ $color->code }}"></li>
                                @endforeach
                                </ul>
                                </div>
                            </div>
                        </div>
                        <!-- price filter start here -->
                        <div class="collection-collapse-block border-0 open">
                            <h3 class="collapse-block-title">price</h3>
                            <div class="collection-collapse-block-content">
                                <div class="collection-brand-filter">
                                    <div class="form-check collection-filter-checkbox">
                                        <input type="checkbox" class="form-check-input" id="hundred">
                                        <label class="form-check-label" for="hundred">$10 - $100</label>
                                    </div>
                                    <div class="form-check collection-filter-checkbox">
                                        <input type="checkbox" class="form-check-input" id="twohundred">
                                        <label class="form-check-label" for="twohundred">$100 - $200</label>
                                    </div>
                                    <div class="form-check collection-filter-checkbox">
                                        <input type="checkbox" class="form-check-input" id="threehundred">
                                        <label class="form-check-label" for="threehundred">$200 - $300</label>
                                    </div>
                                    <div class="form-check collection-filter-checkbox">
                                        <input type="checkbox" class="form-check-input" id="fourhundred">
                                        <label class="form-check-label" for="fourhundred">$300 - $400</label>
                                    </div>
                                    <div class="form-check collection-filter-checkbox">
                                        <input type="checkbox" class="form-check-input" id="fourhundredabove">
                                        <label class="form-check-label" for="fourhundredabove">$400 above</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="collection-sidebar-banner">
                        <a href="#"><img src="{{ $data->side_image }}" class="img-fluid blur-up lazyload"
                                alt=""></a>
                    </div>
                    <!-- silde-bar colleps block end here -->
                </div>
                <div class="col">
                    <div class="collection-wrapper">
                        <div class="collection-content ratio_asos">
                            <div class="page-main-content">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="filter-main-btn"><span class="filter-btn btn btn-theme"><i
                                                    class="fa fa-filter" aria-hidden="true"></i> Filter</span></div>
                                    </div>
                                </div>
                                <div class="collection-product-wrapper">
                                    <div class="product-top-filter">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="product-filter-content">
                                                    <div class="search-count">
                                                        <h5>Showing Products 1-24 of 10 Result</h5>
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
                                                            <option value="High to low">24 Products Par Page</option>
                                                            <option value="Low to High">50 Products Par Page</option>
                                                            <option value="Low to High">100 Products Par Page</option>
                                                        </select>
                                                    </div>
                                                    <div class="product-page-filter">
                                                        <select>
                                                            <option value="High to low">Sorting items</option>
                                                            <option value="Low to High">50 Products</option>
                                                            <option value="Low to High">100 Products</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-wrapper-grid">
                                        <div class="row">
                                            @foreach ($prods as $prod)
                                            <div class="col-xl-3 col-6 col-grid-box">
                                                <div class="product-box">
                                                    <div class="img-wrapper">
                                                        <div class="front">
                                                            <a href="{{ route("product.details",$prod->slug_en) }}"><img
                                                                    src="{{ $prod->primary_image_url }}"
                                                                    class="img-fluid blur-up lazyload bg-img"
                                                                    alt=""></a>
                                                        </div>
                                                        <div class="cart-info cart-wrap">
                                                            {{-- <button data-bs-toggle="modal" data-bs-target="#addtocart"
                                                                title="Add to cart"><i
                                                                    class="ti-shopping-cart"></i></button> --}}
{{-- <a  id="cartEffect"
                                    onclick="add_to_cart_list_product_details('{{ $prod->id }}')"
                                    class="btn btn-solid hover-solid btn-animation"> --}}

                                      <a href="{{ route("product.details",$prod->slug_en) }}"  title="Add to Cart"><i
                                                                    class="ti-shopping-cart" aria-hidden="true"></i></a>

                                                                    <a href="javascript:void(0)" onclick="add_to_wishlist({{ $prod->id }})" title="Add to Wishlist"><i
                                                                    class="ti-heart" aria-hidden="true"></i></a> <a
                                                                href="#" data-bs-toggle="modal"
                                                                data-bs-target="#quick-view" onclick="setProductSlug({{ $prod->id }})" title="Quick View"><i
                                                                    class="ti-search" aria-hidden="true"></i></a> <a
                                            onclick="add_to_compare_list({{ $prod->id }})"
                                            href="javascript:void(0)" title="Compare"><i class="ti-reload"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-detail">
                                                        <div>

                                                            <a href="{{ route("product.details",$prod->slug_en) }}">
                                                                <h6>{{ $prod->title_en }}</h6>
                                                            </a>
                                                            <p>{{ $prod->description_en }}</p>
                                                            <h4>${{ $prod->purchase_price }}</h4>
                                                            <ul class="color-variant">
                                                               @foreach ($prod->colors()->take(3)->get() as $c)
                                                               <li style="background-color: {{ $c->code }}"></li>
                                                               @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="product-pagination mb-0">
                                        <div class="theme-paggination-block">
                                            <div class="row">
                                                <div class="col-xl-6 col-md-6 col-sm-12">
                                               <div class="d-felx justify-content-center">
                                    {{ $prods->links() }}


                                </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- collection section end -->



@endsection
