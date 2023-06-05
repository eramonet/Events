@extends('user.layout.authes')
@section('title') Wishlist @endsection
@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{ __('trans.wishlist') }}</h2>
                    </div>
                </div>
                <div class="col-sm-6"  style="direction: ltr">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">{{ __('trans.wishlist') }}</li>
                            <li class="breadcrumb-item"><a href="index.html">{{ __('trans.Home') }}</a></li>
                           
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
                    @if (count($wishlist) > 0)
                        <table class="table cart-table">
                            <thead>
                                <tr class="table-head">
                                    <th scope="col">{{ __('trans.image') }}</th>
                                    <th scope="col">{{ __('trans.product name') }}</th>
                                    <th scope="col">{{ __('trans.price') }}</th>
                                    <th scope="col">{{ __('trans.availability') }}</th>
                                    <th scope="col">{{ __('trans.action') }}</th>
                                </tr>
                            </thead>
                            @foreach ($wishlist as $w)
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="{{url('product/' . $w->product->slug_en )}}"><img src="{{ $w->product->primary_image_url }}"
                                                    alt=""></a>
                                        </td>
                                        <td><a href="{{url('product/' . $w->product->slug_en )}}">@if(session()->get('locale') == 'en'){{ $w->product->title_en }}@else{{ $w->product->title_ar }}@endif</a>
                                            <div class="mobile-cart-content row">
                                                <div class="col">
                                                    <p>
                                                        @if ($w->product->stock > 0)
                                                        {{ __('trans.in stock') }}
                                                        @else
                                                        {{ __('trans.out stock') }}
                                                        @endif
                                                    </p>
                                                </div>
                                                <div class="col">
                                                    <h2 class="td-color">{{ $w->product->real_price }}</h2>
                                                </div>
                                                <div class="col">
                                                    <h2 class="td-color"><a href="#" class="icon me-1"><i
                                                                class="ti-close"></i>
                                                        </a><a href="#" class="cart"><i
                                                                class="ti-shopping-cart"></i></a></h2>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h2>{{ $w->product->real_price . " " .trans('trans.EGP') }}</h2>
                                        </td>
                                        <td>
                                            <p>
                                                @if ($w->product->stock > 0)
                                                {{ __('trans.in stock') }}
                                                @else
                                                {{ __('trans.out stock') }}
                                                @endif
                                            </p>
                                        </td>
                                        <td>


                                                <a href="{{route('wishlists.destroy',$w->id)}}" class="icon"><i
                                                    style="font-size: 30px; color:red; margin-right: 10px"
                                                    class="fa fa-trash" aria-hidden="true"></i></a>

                                                    @if ($w->product->stock > 0)
                                                        <a style="cursor: pointer" onclick="add_to_cart_list({{ $w->product->id }})" class="cart"><i
                                                            style="font-size: 30px;" class="ti-shopping-cart"></i></a>
                                                    @endif
                                                </td>
                                    </tr>
                                </tbody>
                            @endforeach

                        </table>
                    @else
                        <h3 style="margin-top: 20px ; text-align: center">{{ __('trans.Empty Wishlist') }}</h3>
                    @endif

                </div>
            </div>
            <div class="row wishlist-buttons">
                <div class="col-12">
                    <a href="{{ url('/') }}" class="btn btn-solid">{{ __('trans.continue shopping') }}</a>
                </div>
            </div>
        </div>
    </section>
    <!--section end-->

@endsection
