@extends('layouts.site.master')
@section('title')
    Cart | Events
@endsection

@section('content')
    @php
        $lang = session()->get('locale');
    @endphp
    <!-- ------------------ start landing page ---------------------------- -->
    <!-- ------------------ start loading page page---------------------------- -->
    <div class="loadingPage active">
        <div class="wrapper">
            <div class="loader"></div>
        </div>
    </div>
    <!-- ------------------ end loading page page---------------------------- -->

    <!-- ------------------ start landing page---------------------------- -->
    <section class="landingPage" data-aos="fade-left" data-aos-offset="" data-aos-duration="2000">
        <img src="{{ asset('user_assets/images/cart/landingPage/Rectangle 16.png') }}" alt="" />
        <div class="over d-flex">
            <h2>cart</h2>
        </div>
    </section>
    <br><br>
    @if ($lang == 'en')
        <div style="margin-top: 30px; width: 50%; margin: auto ; ">
        @else
            <div style="margin-top: 30px; width: 50%; margin: auto ; text-align: right;">
    @endif

    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
    @endforeach
    </div>
    <!-- ------------------ end landing page---------------------------- -->
    @if ($lang == 'en')
        <div style="margin-top: 30px; width: 50%; margin: auto ; ">
        @else
            <div style="margin-top: 30px; width: 50%; margin: auto ; text-align: right;">
    @endif
    @if (Session::get('success', false))
        <?php $data = Session::get('success'); ?>
        @if (is_array($data))
            @foreach ($data as $msg)
                <div class="alert alert-warning" role="alert">
                    <i class="fa fa-check"></i>
                    {{ $msg }}
                </div>
            @endforeach
        @else
            <div class="alert alert-warning" role="alert">
                <i class="fa fa-check"></i>
                {{ $data }}
            </div>
        @endif
    @endif
    </div>
    <!-- ------------------ start all orders---------------------------- -->
    <section class="allOrders">
        <div class="container">
            <div class="row">
                <div class="col-md-8" data-aos="fade-right" data-aos-offset="" data-aos-duration="2000">
                    <div class="orders">
                        <div class="head">
                            <ul class="list-unstyled d-flex">
                                <li>Item</li>
                                <li>Quantity</li>
                                <li style="text-align: end;">Subtotal</li>
                            </ul>
                        </div>
                        <div class="orderList">
                            <?php $total_order_price = 0; ?>
                            @if (count($my_cart) > 0)
                                @foreach ($my_cart as $item)
                                    <?php $total_order_price += $item->quantity * $item->product->real_price; ?>
                                    <ul class="d-flex list-unstyled">
                                        <li class="order d-flex">
                                            <div class="main d-flex">
                                                <div class="image">
                                                    <img src="{{ asset($item->product->primary_image_url) }}"
                                                        width="50px" />
                                                </div>
                                                <div class="details">
                                                    <h4>{{ $item->product->title_en }} -
                                                        {{ $item->product->main_category->title_en }}</h4>
                                                    <span class="price">{{ $item->product->real_price }} AED</span>
                                                </div>
                                            </div>
                                            <div class="count">
                                                <button dataAttr="minus" onclick="decrease_quantity({{ $item->id }})">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <input type="text" id="cart_item_{{ $item->id }}" readonly
                                                    value="{{ $item->quantity }}" />
                                                <button dataAttr="plus" onclick="increase_quantity({{ $item->id }})">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                            <div class="controlle">
                                                <i class="fas fa-trash"></i>
                                                <span id="sub_total_{{ $item->id }}"
                                                    class="price">{{ number_format($item->product->real_price * $item->quantity) }}
                                                    AED</span>
                                            </div>
                                        </li>
                                    </ul>
                                @endforeach
                            @else
                                <div class="alert alert-danger d-none">
                                    no prodcut hir to order
                                </div>
                            @endif


                        </div>
                        <div class="promoCode d-flex align-items-center justify-content-between">
                            <form action="">
                                <div class="input">
                                    <input type="text" name="" placeholder="Enter promo code" id="" />
                                    <i class="fab fa-telegram-plane"></i>
                                </div>
                            </form>
                            <div class="loadMore">
                                <i for="load" class="fas fa-sync-alt"></i>
                                <label id="load">Update cart</label>
                            </div>
                        </div>
                        <div class="explain">
                            <h5>How to get a promo code</h5>
                            <p>
                                Follow our news on the website, as well as subscribe to our
                                social networks. So you will not only be able to receive
                                up-to-date codes, but also learn about new products and
                                promotional items.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-left" data-aos-offset="" data-aos-duration="2000">
                    <form class="Bill" action="checkout.html">
                        <div class="head">
                            <h3>Product Taxes</h3>
                        </div>
                        <ul class="list-unstyled">
                            <?php $final_taxes = 0;
                            $total_taxes = 0;
                            $total_product_with_quantity = 0; ?>
                            @foreach ($my_cart as $item)
                                <?php $total_taxes = 0; ?>
                                <li class="align-items-center justify-content-between">
                                    <span>{{ substr($item->product->title_en, 0, 10) }}</span>
                                    <?php $total_product_with_quantity = $item->quantity * $item->product->real_price; ?>
                                    <!-- 1872 -->
                                    @if ($item->product->taxes->count() > 0)
                                        <h6 class="totalPriceNumber">
                                            @foreach ($item->product->taxes as $tax)
                                                <?php $total_taxes += $tax->tax->percentage / 100; ?>
                                                - {{ $tax->tax->title_en }}
                                                <span
                                                    class="badge badge-secondary">{{ $tax->tax->percentage . ' %' }}</span><br><br>
                                            @endforeach
                                        </h6>
                                        <?php $final_taxes += $total_taxes * $total_product_with_quantity; ?>
                                    @else
                                        <p>-----</p>
                                    @endif

                                </li>
                            @endforeach
                        </ul>
                        <div class="totalPrice d-flex align-items-center justify-content-between">
                            <span>total Taxes</span>
                            <span id="total_taxes_price" class="totalPriceNumber">{{ $final_taxes }} AED</span>
                        </div>
                    </form><br><br>
                    <form class="Bill" action="checkout.html">
                        <div class="head">
                            <h3>your order</h3>
                        </div>
                        <ul class="list-unstyled">
                            <li class="align-items-center justify-content-between">
                                <span>Оrder price</span>
                                <span class="totalPriceNumber">{{ $total_order_price }} AED</span>
                            </li>
                            <li class="align-items-center justify-content-between">
                                <span>Discount for promo code</span> <span>No</span>
                            </li>
                            <li class="align-items-center justify-content-between">
                                <span>Delivery <span>(to be clarified)</span> </span><span>0</span>
                            </li>
                        </ul>
                        <div class="totalPrice d-flex align-items-center justify-content-between">
                            <span>total</span>
                            <span id="total_order_price" class="totalPriceNumber">{{ $total_order_price }} AED</span>
                        </div>
                        <button class="btnCheck">checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <br><br><br>
@endsection
