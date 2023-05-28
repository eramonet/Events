@extends('user.layout.guest')
@section('title') User Dashboard @endsection
@section('content')

    <!--  dashboard section start -->
    <section class="dashboard-section section-b-space user-dashboard-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3" >
                    <div class="dashboard-sidebar">
                        <div class="profile-top">
                            <div class="profile-image" style="text-align: center">
                                @error('profile_image')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                                <img src="{{ $user->image ? asset('' . $user->image_url . '') : '../assets/images/avtar.jpg' }}"
                                    id="profile_preview" class="img-fluid">
                                <br>
                                <form action="{{ url('update-profile-image') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" id="profile_preview_uploader_btn" name="profile_image"
                                        accept="image/*" /><br><br>
                                    <button type="submit" class="btn-solid btn"
                                        onclick="document.getElementById('upload').click(); return false">{{ trans('trans.Save Changes') }}</button>
                                </form>

                            </div>
                            <div class="profile-detail">
                                <h5>{{ $user->name }}</h5>
                                <h6>{{ $user->email }}</h6>
                            </div>
                        </div>
                        <div class="faq-tab">
                            <ul class="nav nav-tabs" id="top-tab" role="tablist"  @if( session()->get('locale') == 'ar') style="text-align:right"  @endif >
                                <li class="nav-item"><a data-bs-toggle="tab" data-bs-target="#info"
                                        class="nav-link active">{{ __('trans.Account Info') }}</a></li>
                                <li class="nav-item"><a data-bs-toggle="tab" data-bs-target="#address"
                                        class="nav-link">{{ __('trans.Address Book') }}</a></li>
                                <li class="nav-item"><a data-bs-toggle="tab" data-bs-target="#orders" class="nav-link">
                                    {{ __('trans.Orders') }}</a></li>
                                <li class="nav-item"><a data-bs-toggle="tab" data-bs-target="#wishlist" class="nav-link">
                                    {{ __('trans.Wishlist') }}</a></li>
                                <li class="nav-item"><a data-bs-toggle="tab" data-bs-target="#profile"
                                        class="nav-link">{{ __('trans.Profile') }}</a></li>
                                <li class="nav-item"><a href="{{ url('logout') }}" class="nav-link">{{ __('trans.Log Out') }}</a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                    <div class="faq-content tab-content" id="top-tabContent">
                        <div class="tab-pane fade show active" id="info">
                            <div class="counter-section">
                                <div class="welcome-msg" @if( session()->get('locale') == 'ar') style="text-align:right"  @endif>
                                    <h4>{{ __('trans.Hello') }}, {{ $user->name }} !</h4>
                                    <p>{{ trans('trans.intro') }}</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="counter-box">
                                            <img src="../assets/images/icon/dashboard/sale.png" class="img-fluid">
                                            <div @if( session()->get('locale') == 'ar') style="text-align:right"  @endif>
                                                <h3>{{ $my_orders->count() }}</h3>
                                                <h5>{{ __('trans.Total Order') }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="counter-box">
                                            <img src="../assets/images/icon/dashboard/homework.png" class="img-fluid">
                                            <div @if( session()->get('locale') == 'ar') style="text-align:right"  @endif>
                                                <h3>{{ $pending->count() }}</h3>
                                                <h5>{{ __('trans.Pending Orders') }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="counter-box">
                                            <img src="../assets/images/icon/dashboard/order.png" class="img-fluid">
                                            <div @if( session()->get('locale') == 'ar') style="text-align:right"  @endif>
                                                <h3>{{ $wishlist->count() }}</h3>
                                                <h5>{{ __('trans.Wishlist') }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="padding: 10px"></div>
                                    <div class="col-md-4">
                                        <div class="counter-box">
                                            <img src="../assets/images/icon/dashboard/homework.png" class="img-fluid">
                                            <div @if( session()->get('locale') == 'ar') style="text-align:right"  @endif>
                                                <h3>{{ $inprogress->count() }}</h3>
                                                <h5>{{ __('trans.Inprogress Order') }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="counter-box">
                                            <img src="../assets/images/icon/dashboard/homework.png" class="img-fluid">
                                            <div @if( session()->get('locale') == 'ar') style="text-align:right"  @endif>
                                                <h3>{{ $delivered->count() }}</h3>
                                                <h5>{{ __('trans.Delivered Orders') }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="counter-box">
                                            <img src="../assets/images/icon/dashboard/homework.png" class="img-fluid">
                                            <div @if( session()->get('locale') == 'ar') style="text-align:right"  @endif>
                                                <h3>{{ $canceled->count() }}</h3>
                                                <h5>{{ __('trans.Canceled Orders') }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="address">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mt-0">
                                        <div class="card-body">
                                            <div class="top-sec">
                                                <h3>{{ __('trans.Address Book') }}</h3>
                                                <a href="#" class="btn btn-sm btn-solid" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view">+ {{ __('trans.add new') }}</a>
                                            </div>
                                            <div class="address-book-section">
                                                <div class="row g-4" id="address_profile_collections">
                                                    @if (count($address) > 0)
                                                        @foreach ($address as $address)
                                                            <div class="select-box active col-xl-4 col-md-6">
                                                                <div class="address-box">
                                                                    <div class="top">
                                                                        <h6>mark jecno </h6>
                                                                    </div>
                                                                    <div class="middle">
                                                                        <div class="address">
                                                                            <p>{{ $address->address }}</p>
                                                                            <p>@if(session()->get('locale') == 'en'){{ $address->region->title_en }}@else{{ $address->region->title_ar }}@endif,
                                                                                @if(session()->get('locale') == 'en'){{ $address->city->title_en }}@else{{ $address->city->title_ar }}@endif ,
                                                                                @if(session()->get('locale') == 'en'){{ $address->country->title_en }}@{{ $address->country->title_ar }}@endif</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="bottom">
                                                                        {{-- <a href="javascript:void(0)"
                                                                            data-bs-target="#edit-address"
                                                                            data-bs-toggle="modal"
                                                                            class="bottom_btn">edit</a> --}}
                                                                        <a style="cursor: pointer"
                                                                            onclick="remove_address({{ $address->id }})"
                                                                            class="bottom_btn">{{ __('trans.remove') }}</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <h4>{{ __('trans.No Addresses') }}</h4>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="orders">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card dashboard-table mt-0">
                                        <div class="card-body table-responsive-sm">
                                            <div class="top-sec">
                                                <h3>{{ __('trans.My Orders') }}</h3>
                                            </div>
                                            <div class="table-responsive-xl">
                                                <table class="table cart-table order-table">
                                                    <thead>
                                                        <tr class="table-head">
                                                            <th scope="col">{{ __('trans.Order Number') }}</th>
                                                            <th scope="col">{{ __('trans.Status') }}</th>
                                                            <th scope="col">{{ __('trans.Price') }}</th>
                                                            <th scope="col">{{ __('trans.View') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($my_orders as $my_order)
                                                            <tr>
                                                                <td>
                                                                    <span
                                                                        class="mt-0">{{ $my_order->order_number }}</span>
                                                                </td>
                                                                <td>
                                                                    @if ($my_order->status == 'pending')
                                                                    <span
                                                                        class="badge rounded-pill bg-primary custom-badge">{{ __('trans.Pending') }}</span>
                                                                @elseif ($my_order->status == 'in_progress')
                                                                    <span
                                                                        class="badge rounded-pill bg-warning custom-badge">{{ __('trans.In Progress') }}</span>
                                                                @elseif ($my_order->status == 'delivered')
                                                                    <span
                                                                        class="badge rounded-pill bg-success custom-badge">{{ __('trans.Delivered') }}</span>
                                                                @elseif ($my_order->status == 'canceled')
                                                                    <span
                                                                        class="badge rounded-pill bg-danger custom-badge">{{ __('trans.Canceled') }}</span>
                                                                @endif

                                                                </td>
                                                                <td>
                                                                    @if ($my_order->customer_promo_code_value && $my_order->customer_promo_code_type && $my_order->customer_promo_code_title)
                                                                        @if ($my_order->customer_promo_code_type == 'percent')
                                                                            <span
                                                                                class="theme-color fs-6">{{ $my_order->product_total_price * ($my_order->customer_promo_code_value / 100) + $my_order->total_taxes_price + $my_order->shipping_fees }}
                                                                                {{ __('trans.EGP') }}</span>
                                                                        @elseif ($my_order->customer_promo_code_type == 'amount')
                                                                            <span
                                                                                class="theme-color fs-6">{{ $my_order->product_total_price - $my_order->customer_promo_code_value + $my_order->total_taxes_price + $my_order->shipping_fees }}
                                                                                {{ __('trans.EGP') }}</span>
                                                                        @endif
                                                                    @else
                                                                        <span
                                                                            class="theme-color fs-6">{{ $my_order->product_total_price + $my_order->total_taxes_price + $my_order->shipping_fees }}
                                                                            {{ __('trans.EGP') }}</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <a href="{{ url('order-details/' . $my_order->order_number) }}"
                                                                        target="_blank">
                                                                        <i class="fa fa-eye text-theme"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="wishlist">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card dashboard-table mt-0">
                                        <div class="card-body table-responsive-sm">
                                            <div class="top-sec">
                                                <h3>{{ __('trans.wishlist') }}</h3>
                                            </div>
                                            <div class="table-responsive-xl">
                                                <table class="table cart-table wishlist-table">
                                                    <thead>
                                                        <tr class="table-head">
                                                            <th scope="col">{{ __('trans.image') }}</th>
                                                            <th scope="col">{{ __('trans.Product Name') }}</th>
                                                            <th scope="col">{{ __('trans.Price') }}</th>
                                                            <th scope="col">{{ __('trans.Action') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($wishlist as $wishlist)
                                                            <tr>
                                                                <td>
                                                                    <a
                                                                        href="@if(session()->get('locale') == 'en'){{ url('product/' . $wishlist->product->slug_en) }}@else{{ url('product/' . $wishlist->product->slug_ar) }}@endif">
                                                                        <img src="{{ $wishlist->product->primary_image_url }}"
                                                                            class="blur-up lazyloaded" alt="">
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <span>@if(session()->get('locale') == 'en'){{ $wishlist->product->title_en }}@else{{ $wishlist->product->title_ar }}@endif</span>
                                                                </td>
                                                                <td>
                                                                    <span
                                                                        class="theme-color fs-6">{{ $wishlist->product->real_price }}
                                                                        {{ __('trans.EGP') }}</span>
                                                                </td>
                                                                <td>
                                                                    <a href="javascript:void(0)"
                                                                        onclick="add_to_cart_list({{ $wishlist->product->id }})"
                                                                        class="btn btn-xs btn-solid">
                                                                        {{ __('trans.Move to Cart') }}
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mt-0">
                                        <div class="card-body">
                                            <div class="dashboard-box">
                                                <div class="dashboard-title">
                                                    <h4>profile</h4>
                                                    {{-- <a class="edit-link" href="#">edit</a> --}}
                                                </div>
                                                <div class="dashboard-detail">
                                                    <form action="{{ url('update-profile') }}" method="POST">
                                                        @csrf
                                                        <ul>
                                                            <li>
                                                                <div class="details">
                                                                    <div class="left">
                                                                        <h6>{{ __('trans.Firstname') }}</h6>
                                                                    </div>
                                                                    <div class="right">
                                                                        <input class="form-control" type="text"
                                                                            name="firstname"
                                                                            value="{{ explode(' ', auth()->user()->name)[0] }}">
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="details">
                                                                    <div class="left">
                                                                        <h6>{{ __('trans.Lastname') }}</h6>
                                                                    </div>
                                                                    <div class="right">
                                                                        <input class="form-control" type="text"
                                                                            name="lastname"
                                                                            value="{{ explode(' ', auth()->user()->name)[1] }}">
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="details">
                                                                    <div class="left">
                                                                        <h6>{{ __('trans.email') }}</h6>
                                                                    </div>
                                                                    <div class="right">
                                                                        <input disabled class="form-control" type="text"
                                                                            name="email"
                                                                            value="{{ auth()->user()->email }}">
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="details">
                                                                    <div class="left">
                                                                        <h6>{{ __('trans.Phone') }}</h6>
                                                                    </div>
                                                                    <div class="right">
                                                                        <input disabled class="form-control" type="text"
                                                                            name="phone"
                                                                            value="{{ auth()->user()->phone }}">
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="details">
                                                                    <div class="left">
                                                                        <h6>{{ __('trans.Address') }}</h6>
                                                                    </div>
                                                                    <div class="right">
                                                                        <input class="form-control" type="text"
                                                                            name="address"
                                                                            value="{{ auth()->user()->address }}">
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="details">
                                                                    <div class="left">
                                                                        <h6>{{ __('trans.Birthdate') }}</h6>
                                                                    </div>
                                                                    <div class="right">
                                                                        <input class="form-control" type="date"
                                                                            name="birth_date"
                                                                            value="{{ auth()->user()->birth_date }}">
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="details">
                                                                    <div class="left">
                                                                        <h6>{{ __('trans.Current Password') }}</h6>
                                                                    </div>
                                                                    <div class="right">
                                                                        <input class="form-control" type="password"
                                                                            name="current_password" placeholder="************">
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="details">
                                                                    <div class="left">
                                                                        <h6>{{ __('trans.New Password') }}</h6>
                                                                    </div>
                                                                    <div class="right">
                                                                        <input class="form-control" type="password"
                                                                            name="new_password" placeholder="************">
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="details">
                                                                    <div class="left">
                                                                        <h6>{{ __('trans.Confirm Password') }}</h6>
                                                                    </div>
                                                                    <div class="right">
                                                                        <input class="form-control" type="password"
                                                                            name="confirm_password" placeholder="************">
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <button type="submit" class="btn-solid btn">{{ __('trans.Save Changes') }}</button>
                                                            </li>
                                                        </ul>
                                                    </form>
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
    <!--  dashboard section end -->



    <div class="modal fade bd-example-modal-lg theme-modal" id="quick-view" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content quick-view-modal">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="row">
                        <div class="col-lg-12 rtl-text">
                            <div class="product-right">
                                <h2 id="qv_main_title">{{ __('trans.Adding New Address') }} </h2>
                                <h3><span id="qv_price"></span> <del id="qv_fake_price"></del> </h3>
                                {{-- <ul class="color-variant">
                            <li class="bg-light0"></li>
                            <li class="bg-light1"></li>
                            <li class="bg-light2"></li>
                        </ul> --}}
                                <div class="border-product">
                                    <div class="container">
                                        <div class="row">
                                            <h5 id="error_in_add_address"
                                                style="color: red; text-align: center; margin-bottom: 30px;"></h5>
                                            <div class="col-md-3">
                                                <label for="country_id">{{ __('trans.Country') }}</label>
                                                <select name="country_id" class="form-control" id="country">
                                                    <option value="">{{ __('trans.Choose Country ----') }}</option>
                                                    @foreach ($countries as $county)
                                                        <option value="{{ $county->id }}">@if(session()->get('locale') == 'en'){{ $county->title_en }}@else{{ $county->title_ar }}@endif
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="city_id">{{ __('trans.City') }}</label>
                                                <select name="city_id" class="form-control" id="cities">

                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="region_id">{{ __('trans.Region') }}</label>
                                                <select name="region_id" class="form-control" id="regions">

                                                </select>
                                            </div>
                                            <div class="col-md-12" style="margin-top: 30px">
                                                <label for="region_id">{{ __('trans.Address [ Flat - address ]') }} </label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter Address [ Flat - Address ]" id="new_address">
                                            </div>
                                            <div class="col-md-12" style="margin-top: 30px">
                                                <div class="product-buttons">
                                                    <a onclick="add_new_address()" class="btn btn-solid">{{ __('trans.Add') }}</a>
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



@endsection
