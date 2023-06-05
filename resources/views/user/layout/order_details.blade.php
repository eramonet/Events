{{-- <style>
    body {}

    #preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;

    }

    #loader {
        display: block;
        position: relative;
        left: 50%;
        top: 50%;
        width: 150px;
        height: 150px;
        margin: -75px 0 0 -75px;
        border-radius: 50%;
        border: 3px solid transparent;
        border-top-color: #9370DB;
        -webkit-animation: spin 5s linear infinite;
        animation: spin 5s linear infinite;
    }

    #loader:before {
        content: "";
        position: absolute;
        top: 5px;
        left: 5px;
        right: 5px;
        bottom: 5px;
        border-radius: 50%;
        border: 3px solid transparent;
        border-top-color: #BA55D3;
        -webkit-animation: spin 3s linear infinite;
        animation: spin 3s linear infinite;
    }

    #loader:after {
        content: "";
        position: absolute;
        top: 15px;
        left: 15px;
        right: 15px;
        bottom: 15px;
        border-radius: 50%;
        border: 3px solid transparent;
        border-top-color: #FF00FF;
        -webkit-animation: spin 1.5s linear infinite;
        animation: spin 1.5s linear infinite;
    }

    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }
</style> --}}

{{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}

{{-- <div id="preloader" style="direction: ltr !important">
    <div id="loader"></div>
</div> --}}

{{-- <style>
    .loading {
        position: fixed;
        z-index: 999;
        height: 2em;
        width: 2em;
        overflow: show;
        margin: auto;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
    }

    /* Transparent Overlay */
    .loading:before {
        content: '';
        display: block;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: black;
        background: -webkit-radial-gradient(rgba(0, 0, 0), rgba(0, 0, 0));
    }

    /* :not(:required) hides these rules from IE9 and below */
    .loading:not(:required) {
        /* hide "loading..." text */
        font: 0/0 a;
        color: transparent;
        text-shadow: none;
        background-color: transparent;
        border: 0;
    }

    .loading:not(:required):after {
        content: '';
        display: block;
        font-size: 10px;
        width: 1em;
        height: 1em;
        margin-top: -0.5em;
        -webkit-animation: spinner 150ms infinite linear;
        -moz-animation: spinner 150ms infinite linear;
        -ms-animation: spinner 150ms infinite linear;
        -o-animation: spinner 150ms infinite linear;
        animation: spinner 150ms infinite linear;
        border-radius: 0.5em;
        -webkit-box-shadow: rgba(255, 255, 255, 0.75) 1.5em 0 0 0, rgba(255, 255, 255, 0.75) 1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) 0 1.5em 0 0, rgba(255, 255, 255, 0.75) -1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) -1.5em 0 0 0, rgba(255, 255, 255, 0.75) -1.1em -1.1em 0 0, rgba(255, 255, 255, 0.75) 0 -1.5em 0 0, rgba(255, 255, 255, 0.75) 1.1em -1.1em 0 0;
        box-shadow: rgba(255, 255, 255, 0.75) 1.5em 0 0 0, rgba(255, 255, 255, 0.75) 1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) 0 1.5em 0 0, rgba(255, 255, 255, 0.75) -1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) -1.5em 0 0 0, rgba(255, 255, 255, 0.75) -1.1em -1.1em 0 0, rgba(255, 255, 255, 0.75) 0 -1.5em 0 0, rgba(255, 255, 255, 0.75) 1.1em -1.1em 0 0;
    }

    /* Animation */

    @-webkit-keyframes spinner {
        0% {
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @-moz-keyframes spinner {
        0% {
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @-o-keyframes spinner {
        0% {
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @keyframes spinner {
        0% {
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }
</style> --}}

{{-- <div class="loading" id="loder">Loading&#8230;</div>

<div class="content">
    <h3>stuff goes in here!</h3>
</div> --}}








{{-- <div class="loader-container">
    <div class="icon">
      <img src="../assets/images/invoice/invoice.svg" class="img-fluid" alt="">
    </div>
    <span class="loader"></span>
</div> --}}


@extends('user.layout.guest')

@section('title')
    Order Details
@endsection





@section('content')
<style>
    body {
  margin: 0;
  min-height: 100vh;
  font-family: 'Lato-Regular';
  overflow-x: hidden; }
  body .loading-div {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #fff;
    z-index: 999;
    display: grid;
    align-items: center;
    justify-items: center; }
    body .loading-div img {
      width: 120px; }
      @media only screen and (min-width: 992px) {
        body .loading-div img {
          width: 220px; } }
</style>

<div class="loading-div">
    <img src="{{ asset('assets/images/lodeer.gif') }}">
  </div>

    <section class="theme-invoice-1 section-b-space" id="sec">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 m-auto">
                    <div class="invoice-wrapper">
                        <div class="invoice-header">
                            <div class="upper-icon">
                                <img src="../assets/images/invoice/invoice.svg" class="img-fluid" alt="">
                            </div>
                            <div class="row header-content" @if(session()->get('locale') == 'ar') style="flex-direction: row-reverse;" @endif>
                                <div class="col-md-6">
                                    @foreach ($main_section_footer as $main_section_footer1)
                                        <img src="{{ asset('' . $main_section_footer1->logo . '') }}" class="img-fluid"
                                            alt="">
                                    @endforeach
                                    @foreach ($store_info as $store_info1)
                                        <div class="mt-md-4 mt-3">
                                            <h4 class="mb-2">
                                                {{ $store_info1->email }}
                                            </h4>
                                            <h4 class="mb-0">{{ $store_info1->phone }}</h4>
                                        </div>
                                </div>
                                <div class="col-md-6 text-md-end mt-md-0 mt-4">
                                    <h2>{{ trans('trans.invoice') }}</h2>
                                    <div class="mt-md-4 mt-3">
                                        <h4 class="mb-2">
                                            {{ $store_info1->location }}
                                        </h4>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="detail-bottom">
                                <ul>
                                    <li><span>{{ __('trans.issue date') }}</span>
                                        <h4> {{ $this_order->created_at }}</h4>
                                    </li>
                                    <li><span>{{ __('trans.invoice no') }}</span>
                                        <h4> {{ $this_order->order_number }}</h4>
                                    </li>
                                    <li><span>{{ __('trans.Email') }} :</span>
                                        <h4> {{ auth()->user()->email }}</h4>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="invoice-body table-responsive-md">
                            <table class="table table-borderless mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{ __('trans.item') }}</th>
                                        <th scope="col">{{ __('trans.price') }}</th>
                                        <th scope="col">{{ __('trans.quantity') }}</th>
                                        <th scope="col">{{ __('trans.Price') }}</th>
                                        <th scope="col">{{ __('trans.Taxes') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $price_without_taxes = 0;
                                    $total_taxes_price = 0;
                                    $total_price = 0;
                                    $items_counter = 0; ?>
                                    @foreach ($this_order->order_products as $item_product)
                                        <?php $price_without_taxes += $item_product->product_quantity * $item_product->price; ?>
                                        <tr>
                                            <th scope="row">{{ ++$items_counter }}</th>
                                            <td>{{ $item_product->product_title }}</td>
                                            <td>{{ $item_product->price }} {{ trans('trans.EGP') }}</td>
                                            <td>{{ $item_product->product_quantity }} {{ __('trans.items') }}</td>
                                            <td>{{ $price_without_taxes }} {{ trans('trans.EGP') }}</td>
                                            @foreach ($item_product->products as $product)
                                                @if ($product->taxes->count() > 0)
                                                    <td>
                                                        @foreach ($product->taxes as $taxe)
                                                            @if (session()->get('locale') == 'en')
                                                                {{ $taxe->title_en }}@else{{ $taxe->title_ar }}
                                                            @endif <span>{{ $taxe->percentage }}
                                                                %</span>
                                                            <br>

                                                            <?php $total_taxes_price += $price_without_taxes * ($taxe->percentage / 100); ?>
                                                            <?php $total_price += $price_without_taxes + ($taxe->percentage / 100) * $price_without_taxes; ?>
                                                        @endforeach
                                                    </td>
                                                @else
                                                    <td>-----</td>
                                                @endif
                                            @endforeach
                                        </tr>
                                        <?php $price_without_taxes = 0; ?>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td class="font-bold text-dark" colspan="2">{{ __('trans.Shipping Price') }}
                                        </td>
                                        <td class="font-bold text-theme">
                                            {{ $this_order->shipping_fees . trans('trans.EGP') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td class="font-bold text-dark" colspan="2">{{ __('trans.Promo Code') }}</td>
                                        <td class="font-bold text-theme">
                                            @if (
                                                $this_order->customer_promo_code_value &&
                                                    $this_order->customer_promo_code_type &&
                                                    $this_order->customer_promo_code_title)
                                                @if ($this_order->customer_promo_code_type == 'percent')
                                                    <li>
                                                        <span
                                                            class="theme-color fs-6">{{ $this_order->customer_promo_code_value . ' %' }}
                                                        </span>
                                                    </li>
                                                @elseif ($this_order->customer_promo_code_type == 'amount')
                                                    <span
                                                        class="theme-color fs-6">{{ $this_order->customer_promo_code_value . trans('trans.EGP') }}
                                                    </span>
                                                @endif
                                            @else
                                                <span class="theme-color fs-6">0 {{ trans('trans.EGP') }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td class="font-bold text-dark" colspan="2">{{ __('trans.Total Price') }}</td>
                                        <td class="font-bold text-theme">
                                            @if (
                                                $this_order->customer_promo_code_value &&
                                                    $this_order->customer_promo_code_type &&
                                                    $this_order->customer_promo_code_title)
                                                @if ($this_order->customer_promo_code_type == 'percent')
                                                    <li>
                                                        <span
                                                            class="theme-color fs-6">{{ $this_order->product_total_price * ($this_order->customer_promo_code_value / 100) + $this_order->total_taxes_price + $this_order->shipping_fees }}
                                                            {{ trans('trans.EGP') }}</span>
                                                    </li>
                                                @elseif ($this_order->customer_promo_code_type == 'amount')
                                                    <span
                                                        class="theme-color fs-6">{{ $this_order->product_total_price + $this_order->total_taxes_price + $this_order->shipping_fees - $this_order->customer_promo_code_value }}
                                                        {{ trans('trans.EGP') }}</span>
                                                @endif
                                            @else
                                                <span
                                                    class="theme-color fs-6">{{ $this_order->product_total_price + $this_order->total_taxes_price + $this_order->shipping_fees }}
                                                    {{ trans('trans.EGP') }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="invoice-footer text-end" style="direction: ltr;">
                            <div class="authorise-sign">
                                <h6> {{ __('trans.Order Status') }}</h6>
                                @if ($this_order->status == 'pending')
                                    <h6 style="color: blue">{{ __('trans.Pending') }}</h6>
                                @elseif ($this_order->status == 'in_progress')
                                    <h6 style="color: orange">{{ __('trans.In Progress') }}</h6>
                                @elseif ($this_order->status == 'delivered')
                                    <h6 style="color: green">{{ __('trans.Delivered') }}</h6>
                                @elseif ($this_order->status == 'canceled')
                                    <h6 style="color: red">{{ __('trans.Canceled') }}</h6>
                                @endif
                            </div>
                            <div class="buttons">
                                <a href="#" class="btn black-btn btn-solid rounded-2 me-2"
                                    onclick="window.print();">{{ __('trans.export as PDF') }}</a>
                                <a href="#" class="btn btn-solid rounded-2"
                                    onclick="window.print();">{{ __('trans.print') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   <script>
    if (document.querySelector('.loading-div')) {
  const UIloadingDiv = document.querySelector('.loading-div');
  window.addEventListener('load', () => {
    setTimeout(() => {
      UIloadingDiv.remove();
    }, 2000);
  });
}
   </script>

@endsection
{{-- <script>

    export const HidePreLoader = function() {
        $(".loader-container").fadeOut(1000);
    };
    import { HidePreLoader } from "/layouts/admin/js/main.js";

        HidePreLoader();
</script> --}}


{{-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> --}}
