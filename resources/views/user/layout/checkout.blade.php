@extends('user.layout.guest')
@section('title')
    Checkout
@endsection
@section('content')
    <!-- section start -->
    <section class="section-b-space">
        <div class="container">
            <div class="checkout-page">
                <div class="checkout-form">
                    <form action="{{ url('store-order') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <div class="checkout-title">
                                    <h3>{{ trans('trans.Billing Details') }}</h3>
                                    <div style="width: 60%; margin: auto">
                                        @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger" role="alert">
                                                {{ $error }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row check-out">
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label"
                                            @if (session()->get('locale') == 'ar') style="text-align:right" @endif>
                                            {{ __('trans.Name') }}</div>
                                        <input type="text" name="name" value="{{ $user->name }}" disabled
                                            placeholder="">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label"
                                            @if (session()->get('locale') == 'ar') style="text-align:right" @endif>
                                            {{ __('trans.Phone') }}</div>
                                        <input type="text" name="phone" disabled value="{{ $user->phone }}"
                                            placeholder="">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label"
                                            @if (session()->get('locale') == 'ar') style="text-align:right" @endif>
                                            {{ __('trans.Email') }}</div>
                                        <input type="text" name="email" value="{{ $user->email }}" disabled
                                            placeholder="">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12" @if (session()->get('locale') == 'ar') style="text-align:right" @endif >
                                        <div class="field-label"
                                            @if (session()->get('locale') == 'ar') style="text-align:right" @endif>
                                            {{ __('trans.Address') }}</div>
                                        <select name="user_address" id="user_addresses_in_checkout">
                                            <option value="">{{ trans('trans.Select Adress') }} -----</option>
                                            @foreach ($user->addresses as $address)
                                                <option value="{{ $address->id }}">{{ $address->flat }} -
                                                    {{ $address->address }} -
                                                    @if (session()->get('locale') == 'en')
                                                        {{ $address->city->title_en }} - {{ $address->country->title_en }}
                                                    @else
                                                        {{ $address->city->title_ar }} - {{ $address->country->title_ar }}
                                                    @endif
                                                </option>
                                            @endforeach
                                        </select>
                                        <a data-bs-toggle="modal" data-bs-target="#quick-view"
                                             style="color: #bfb521; cursor: pointer"
                                                   >{{ __('trans.ADDING NEW ADDRESS') }}</a>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <div class="field-label"
                                            @if (session()->get('locale') == 'ar') style="text-align:right" @endif>
                                            {{ __('trans.Promocode') }}</div>
                                        <div class="row">
                                            <div class="col-9">
                                                <input type="text" name="coupon" value=""
                                                    placeholder="{{ __('trans.Enter you promocode') }}"
                                                    id="promo_code_input">
                                            </div>
                                            <div class="col-3">
                                                <a class="btn-solid btn"
                                                    onclick="activate_promocode()">{{ __('trans.Activate') }}</a>
                                            </div>
                                            <div class="col-12">
                                                <p id="message_for_apply_promocode" style="font-weight: bold"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <div class="checkout-details">
                                    <div class="order-box">
                                        <div style="text-align: center" class="title-box">
                                            <div>{{ __('trans.Order Details') }}</div>
                                        </div>
                                        <?php $taxes = 0;
                                        $final_price = 0;
                                        $final_taxes = 0;
                                        $products_count = 0; ?>
                                        @foreach ($cart as $item)
                                            <ul class="qty" @if (session()->get('locale') == 'ar') style="text-align:right" @endif>
                                                <h3 style="font-weight: bold">{{ __('trans.Product') }}
                                                    {{ ++$products_count }} {{ __('trans.Details') }}</h3><br>
                                                <li style="margin-left: 30px">{{ __('trans.Product Name') }}<span
                                                        style="font-weight: bold">
                                                        @if (session()->get('locale') == 'en')
                                                            {{ $item->product->title_en }}@else{{ $item->product->title_ar }}
                                                        @endif
                                                    </span></li>
                                                <li style="margin-left: 30px">{{ __('trans.Price') }}<span>
                                                        {{ $item->product->real_price }}
                                                        {{ __('trans.EGP') }}
                                                    </span></li>
                                                <li style="margin-left: 30px">{{ __('trans.Qunatity') }}<span>
                                                        {{ $item->quantity }}
                                                        {{ __('trans.items') }}</span>
                                                </li>
                                                <li style="margin-left: 30px">{{ __('trans.Price Without Taxes') }}<span>
                                                        {{ $item->product->real_price * $item->quantity }}
                                                        {{ __('trans.EGP') }} </span></li>
                                                <h3 style="font-weight: bold">{{ __('trans.Taxes Details') }}</h3><br>
                                                @if ($item->product->taxes->count() > 0)
                                                    @foreach ($item->product->taxes as $taxe)
                                                        <?php $taxes += $taxe->percentage / 100; ?>
                                                        <li style="margin-left: 30px">- @if (session()->get('locale') == 'en')
                                                                {{ $taxe->title_en }}
                                                            @else
                                                                {{ $taxe->title_ar }}
                                                            @endif (
                                                            {{ $taxe->percentage }} %)
                                                            <span>{{ $item->product->real_price * ($taxe->percentage / 100) }}
                                                                {{ __('trans.EGP') }}</span>
                                                        </li>
                                                    @endforeach
                                                    <?php $final_taxes += $taxes * ($item->product->real_price * $item->quantity); ?>
                                                @else
                                                    <li style="margin-left: 30px">{{ __('trans.no taxes') }}</li>
                                                @endif
                                            </ul>
                                            <?php $taxes = 0;
                                            $final_price += $item->product->real_price * $item->quantity; ?>
                                        @endforeach
                                        <ul class="total" id="promo_code_name_secion_after_apply_promo_code"
                                            style="visibility: hidden">
                                            <li>{{ __('trans.Promocode Name') }} <span
                                                    id="promo_code_name_value_after_appling" class="count"></span></li>
                                        </ul>
                                        <ul class="total" id="promo_code_secion_after_apply_promo_code"
                                            style="visibility: hidden">
                                            <li>{{ __('trans.Promocode Value') }} <span id="promo_code_value_after_appling"
                                                    class="count"></span></li>
                                        </ul>
                                        <ul class="total" @if (session()->get('locale') == 'ar') style="text-align:right" @endif>
                                            <li style="font-size: 30px">{{ trans('trans.Total Price') }} <span
                                                    style="font-size: 30px" id="total_price_after_promocode"
                                                    class="count">{{ $final_price + $final_taxes }}
                                                    {{ __('trans.EGP') }}</span></li>
                                            <input hidden type="text" value="{{ $final_price + $final_taxes }}"
                                                id="final_total_base_total">
                                        </ul>
                                    </div>
                                    <hr>
                                    <div class="payment-box">
                                        <div class="upper-box">
                                            <div class="payment-options">
                                                <ul>
                                                    <li>
                                                        <div class="radio-option">
                                                            {{-- <input type="radio" name="payment_type" id="payment-1"
                                                            disabled value="visa"> --}}
                                                        </div>
                                                        <label for="payment-1" style="margin-left: 30px">
                                                            {{ __('trans.Online Payment') }}
                                                            <img src="{{ asset('uploads/app/Visa.png') }}" width="50px">
                                                            <img src="{{ asset('uploads/app/MasterCard.webp') }}"
                                                                width="50px">
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <div class="radio-option">
                                                            <input type="radio" name="payment_type" id="payment-2"
                                                                checked="checked" value="cash on delivery">
                                                            <label for="payment-2">{{ __('trans.Cash On Delivery') }}<span
                                                                    class="small-text">{{ __('trans.Please send a check to Store Name, Store Street, Store Town, Store State /County, Store Postcode.') }}</span></label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="text-end"><button type="submit"
                                                class="btn-solid btn">{{ __('trans.Place Order') }}</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->


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
                                <h2 id="qv_main_title"> {{ __('trans.ADDING NEW ADDRESS') }} </h2>
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
                                                <label for="country_id">{{ __('trans.Country') }} </label>
                                                <select name="country_id" class="form-control" id="country">
                                                    <option value="">{{ __('trans.Choose Country ----') }}</option>
                                                    @foreach ($countries as $county)
                                                        <option value="{{ $county->id }}">
                                                            @if (session()->get('locale') == 'en')
                                                                {{ $county->title_en }}@else{{ $county->title_ar }}
                                                            @endif
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="city_id">{{ __('trans.City') }} </label>
                                                <select name="city_id" class="form-control" id="cities">

                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="region_id">{{ __('trans.Region') }}</label>
                                                <select name="region_id" class="form-control" id="regions">

                                                </select>
                                            </div>
                                            <div class="col-md-12" style="margin-top: 30px">
                                                <label for="region_id">{{ __('trans.Address [ Flat - address ]') }}
                                                </label>
                                                <input type="text" class="form-control"
                                                    placeholder="{{ __('trans.Address [ Flat - address ]') }}"
                                                    id="new_address">
                                            </div>
                                            <div class="col-md-12" style="margin-top: 30px">
                                                <div class="product-buttons">
                                                    <a onclick="add_new_address()"
                                                        class="btn btn-solid">{{ __('trans.Add') }} </a>
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
