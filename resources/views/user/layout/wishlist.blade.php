@extends('user.layout.authes')
@section('title') Wishlist @endsection
@section('content')
<!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2><h2>{{ __('trans.wishlist') }}</h2></h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">wishlist</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--section start-->
    <section class="wishlist-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 table-responsive-xs">
                    <table class="table cart-table">
                        <thead>
                            <tr class="table-head">
                                <th scope="col">image</th>
                                <th scope="col">product name</th>
                                <th scope="col">price</th>
                                <th scope="col">availability</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        @foreach ($wishlist as $w)
     <tbody>
                            <tr>
                                <td>
                                    <a href="#"><img src="{{ $w->product->primary_image_url }}" alt=""></a>
                                </td>
                                <td><a href="#">{{ $w->product->title_en }}</a>
                                    <div class="mobile-cart-content row">
                                        <div class="col">
                                            <p>@if ($w->product->stock>0) in stock @else out stock @endif</p>
                                        </div>
                                        <div class="col">
                                            <h2 class="td-color">{{ $w->product->real_price }}</h2>
                                        </div>
                                        <div class="col">
                                            <h2 class="td-color"><a href="#" class="icon me-1"><i class="ti-close"></i>
                                                </a><a href="#" class="cart"><i class="ti-shopping-cart"></i></a></h2>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h2>${{ $w->product->real_price }}</h2>
                                </td>
                                <td>
                                    <p>@if ($w->product->stock>0) in stock @else out stock @endif</p>
                                </td>
                                <td><a href="{{route('wishlists.destroy',$w->id)}}" class="icon me-3"><i class="ti-close"></i> </a><a href="#"
                                        class="cart"><i class="ti-shopping-cart"></i></a></td>
                            </tr>
                        </tbody>

                        @endforeach

                    </table>
                </div>
            </div>
            <div class="row wishlist-buttons">
                <div class="col-12"><a href="#" class="btn btn-solid">continue shopping</a> <a href="#"
                        class="btn btn-solid">check out</a></div>
            </div>
        </div>
    </section>
    <!--section end-->



@endsection
