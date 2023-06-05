@extends('user.layout.guest')
@section('title') Cart @endsection
@section('content')

    <!-- section start -->
    <section class="cart-section section-b-space" style="">
        @if ($cart_list->count() > 0)
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="cart_counter">
                            <div class="countdownholder">
                                {{ trans('trans.Your cart will be expired in') }}<span id="timer"></span> {{ trans('trans.minutes') }}!
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 table-responsive-xs" style="padding: 20px">
                        <table class="table cart-table">
                            <thead>
                                <tr class="table-head">
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __('trans.image') }}</th>
                                    <th scope="col">{{ __('trans.product name') }}</th>
                                    <th scope="col">{{ __('trans.Color') }}</th>
                                    <th scope="col">{{ __('trans.Size') }}</th>
                                    <th scope="col">{{ __('trans.price') }}</th>
                                    <th scope="col">{{ __('trans.quantity') }}</th>
                                    <th scope="col">{{ __('trans.Taxes (%)') }}</th>
                                    <th scope="col">{{ __('trans.Taxes (EGP)') }}</th>
                                    <th scope="col">{{ __('trans.total') }}</th>
                                    <th scope="col">{{ __('trans.action') }}</th>
                                </tr>
                            </thead>
                            <?php $total_price = 0; ?>
                            <?php $total_taxes = 0; ?>
                            <?php $count_elements = 0; ?>
                            <tbody class="main_tbody" id="cart_table">
                                <input hidden type="text" id="cart_item_changing">
                                <input hidden type="text" id="quantity_changing">
                                <?php $index_counter = 0; ?>
                                @foreach ($cart_list as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>
                                            <a href="@if(session()->get('locale') == 'en'){{ url('product/' . $item->product->slug_en) }}@else{{ url('product/' . $item->product->slug_ar) }}@endif"><img
                                                    src="{{ $item->product->primary_image_url }}" width="50px"
                                                    style="height: 50px"></a>
                                        </td>
                                        <td>
                                            <a
                                                href="@if(session()->get('locale') == 'en'){{ url('product/' . $item->product->slug_en) }}@else{{ url('product/' . $item->product->slug_ar) }}@endif">@if(session()->get('locale') == 'en'){{ $item->product->title_en }}@else{{ $item->product->title_ar }}@endif</a>
                                        </td>
                                        <td>
                                            @if ($item->color)
                                                <p
                                                    style="border: 1px solid {{ $item->color }}; padding: 20px 10px; border-radius: 50%; background-color: {{ $item->color }}">
                                                </p>
                                            @else
                                                -----
                                            @endif

                                        </td>
                                        <td>
                                            @if ($item->size)
                                                <h5 style="">{{ $item->size }}</h5>
                                            @else
                                                -----
                                            @endif
                                        </td>

                                        <td>
                                            <h4>{{ $item->product->real_price }} {{ __('trans.EGP') }}</h4>
                                        </td>
                                        <td>
                                            <div class="qty-box" style="direction: ltr">
                                                <div class="input-group">

                                                    <span class="input-group-prepend"><button type="button"
                                                            onclick="decrement({{ $item->product->stock }} , {{ $item->id }} , {{ $item->product->limitation }});"
                                                            class="btn quantity-left-minus" data-type="minus"
                                                            data-field=""><i class="fa fa-minus"></i></button>
                                                    </span>

                                                    <h4 style="padding: 5px 12px; font-size: 14px; color: #000; font-weight: bold"
                                                        id="quantity_of_cart_element_{{ $item->id }}">
                                                        {{ $item->quantity }}</h4>

                                                    <span class="input-group-prepend"><button type="button"
                                                            onclick="increment({{ $item->product->stock }} , {{ $item->id }} , {{ $item->product->limitation }} );"
                                                            class="btn quantity-right-plus" data-type="plus"
                                                            data-field=""><i class="fa fa-plus"></i></button></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            @if ($item->product->taxes->count() > 0)
                                                @foreach ($item->product->taxes as $taxe)
                                                    <p>@if(session()->get('locale') == 'en'){{ $taxe->title_en }}@else{{ $taxe->title_ar }}@endif <span
                                                            style="margin-left: 10px; font-size: 15px"
                                                            class="badge bg-secondary"> {{ $taxe->percentage }} %
                                                        </span></p>
                                                    <hr>
                                                @endforeach
                                            @else
                                                <h6>{{ __('trans.no taxes') }}</h6>
                                            @endif
                                        </td>
                                        <td>

                                            @if ($item->product->taxes->count() > 0)
                                                @foreach ($item->product->taxes as $taxe)
                                                    <p><span style="margin-left: 10px; font-size: 15px"
                                                            class="badge bg-secondary">
                                                            {{ ($taxe->percentage / 100) * $item->product->real_price }}
                                                            {{ __('trans.EGP/one') }} </span></p>
                                                    <hr>
                                                    <?php $total_taxes += $taxe->percentage / 100; ?>
                                                @endforeach
                                            @else
                                                <h6>{{ __('trans.no taxes') }}</h6>
                                            @endif
                                        </td>



                                        <td>
                                            <h4 class="td-color this_price_based_on_qty_input"
                                                id="total_price_{{ $item->id }}">
                                                {{ $item->product->real_price * $item->quantity + $total_taxes * ($item->product->real_price * $item->quantity) }}
                                                {{ __('trans.EGP') }}</h4>

                                            <input hidden type="text" id="row_price_{{ $item->id }}"
                                                value="{{ $item->product->real_price * $item->quantity + $total_taxes * ($item->product->real_price * $item->quantity) }}">

                                            <input hidden type="text"
                                                value="{{ $item->product->real_price * $item->quantity + $total_taxes * ($item->product->real_price * $item->quantity) }}"
                                                id="total_price_changable_cart_{{ $item->id }}">
                                        </td>

                                        <td>
                                            <a href="{{ url('delete-item-cart/' . $item->id) }}" class="icon"><i
                                                    style="font-size: 30px; color:red; margin-right: 10px"
                                                    class="fa fa-trash" aria-hidden="true"></i></a>

                                            @if (!($item->product->colors->count() == 0 && $item->product->sizes->count() == 0))
                                                <a style="cursor: pointer" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view_{{ $item->id }}" class="icon"><i
                                                        style="font-size: 30px; color:#000" class="fa fa-pencil-square"
                                                        aria-hidden="true"></i></a>
                                            @endif


                                        </td>
                                    </tr>
                                    <?php $total_price += $item->product->real_price * $item->quantity + $total_taxes * ($item->product->real_price * $item->quantity); ?>
                                    <?php $total_taxes = 0; ?>
                                    <!-- Quick-view modal popup start-->
                                    <div class="modal fade " id="quick-view_{{ $item->id }}" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                            <div class="modal-content quick-view-modal">
                                                <div class="modal-body">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <div class="row">
                                                        <div class="col-lg-6 rtl-text">
                                                            <div class="product-right">
                                                                <h2 id="edit_cart_main_title">
                                                                    @if(session()->get('locale') == 'en'){{ $item->product->title_en }}@else{{ $item->product->title_ar }}@endif
                                                                </h2>
                                                                @if ($item->product->colors->count() > 0)
                                                                    <ul class="color-variant">
                                                                        @foreach ($item->product->colors as $color)
                                                                            @if ($item->color == $color->name)
                                                                                <li class="active" onclick="set_color_from_cart_page('{{ $color->name }}' , {{ $item->id }})"
                                                                                    style="background-color: {{ $color->code }}">
                                                                                    <a href="javascript:void(0)"></a>
                                                                                </li>
                                                                            @else
                                                                                <li  onclick="set_color_from_cart_page('{{ $color->name }}' , {{ $item->id }})"
                                                                                    style="background-color: {{ $color->code }}">
                                                                                    <a href="javascript:void(0)"></a>
                                                                                </li>
                                                                            @endif
                                                                        @endforeach
                                                                    </ul>
                                                                @endif

                                                                <div class="product-description border-product">
                                                                    @if ($item->product->sizes->count() > 0)
                                                                        <div class="size-box">
                                                                            <ul>
                                                                                @foreach ($item->product->sizes as $size)
                                                                                    @if ($item->size == $size->name)
                                                                                        <li onclick="set_size_from_cart_page('{{ $size->name }}' , {{ $item->id }})" class="active" ><a
                                                                                                href="javascript:void(0)">{{ $size->name }}</a>
                                                                                        </li>
                                                                                    @else
                                                                                        <li onclick="set_size_from_cart_page('{{ $size->name }}' ,  {{ $item->id }})"><a
                                                                                                href="javascript:void(0)">{{ $size->name }}</a>
                                                                                        </li>
                                                                                    @endif
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    @endif
                                                                    <br><br>
                                                                    <form action="{{ url('update-item-from-cart/' .  $item->id ) }}"
                                                                        method="POST">
                                                                        <input type="text" hidden
                                                                        value="{{ $item->color }}"
                                                                            id="color_edit_cart_item_popup_{{ $item->id }}" name="color">
                                                                        <input type="text" hidden
                                                                        value="{{ $item->size }}"
                                                                            id="size_edit_cart_item_popup_{{ $item->id }}" name="size">
                                                                        <div class="product-buttons">
                                                                            <button type="submit"
                                                                                class="btn btn-solid">{{ __('trans.Edit') }}</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Quick-view modal popup end-->
                                @endforeach
                            </tbody>

                        </table>
                        <div class="table-responsive-md">
                            <table class="table cart-table ">
                                <tfoot>
                                    <tr>
                                        <td>{{ trans('trans.Total Price') }}</td>
                                        <td>
                                            <h2 id="total_price_final">{{ $total_price }} {{ __('trans.EGP') }}</h2>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row cart-buttons">
                    <div class="col-6"><a href="{{ url('/') }}" class="btn btn-solid">{{ __('trans.continue shopping') }}</a></div>
                    <div class="col-6" style="text-align: end;"><a href="{{ url('/checkout-step1') }}" class="btn btn-solid">{{ __('trans.checkout') }}</a></div>
                </div>
            </div>
        @else
            <h3 style="text-align: center">{{ __('trans.Cart is Empty') }}</h3>
            <div class="row cart-buttons" style="width: 50%; margin: auto">
                <div class="col-6" style=" margin: auto"><a href="{{ url('/') }}" class="btn btn-solid">{{ __('trans.continue shopping') }}
                        </a></div>
            </div>
        @endif


    </section>
    <!-- Section ends -->
    <!-- Quick-view modal popup start-->

    <!-- Quick-view modal popup end-->


@endsection
