@extends('layouts.admin.master')
@section('title')
    Order {{ $order->order_number }} Details
@endsection

{{-- @section('styles')
<link type="text/css" href="{{ asset('layouts/admin/css/print.min.css') }} " rel="stylesheet">
@endsection --}}

@section('content')
    {{-- on top --}}

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-2">
        <div class="d-block mb-4 mb-md-0">
            <nav aria-label="breadcrumb" class=" d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"> Order {{ $order->order_number }} Details</li>
                </ol>
            </nav>
            <h2 class="h5"> Order {{ $order->order_number }} Details</h2>

        </div>

    </div>


    {{-- on top --}}



    <div id="order_details_page">
        {{-- first section --}}
        <div class="row">

            {{-- --}}
            <div class="col-md-6">


                <div class="card card-body my-4">

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">

                            <tbody>


                                <!-- Item -->
                                <tr>
                                    <td class="">
                                        <p class="h6"> Order Number</p>
                                    </td>
                                    <td class=" font-weight-bold">
                                        <p class="h6"> {{ $order->order_number }}</p>
                                    </td>

                                </tr>
                                <!-- End of Item -->




                                <!-- Item -->
                                <tr>
                                    <td class="">
                                        <p class="h6"> Order Date</p>
                                    </td>
                                    <td class=" font-weight-bold">



                                        @if ($order->created_at)
                                            <p class="h6"> <i class="fas fa-calendar-week text-info"></i>
                                                {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}
                                            </p>
                                        @else
                                            ...
                                        @endif
                                    </td>

                                </tr>
                                <!-- End of Item -->




                                <!-- Item -->
                                <tr>
                                    <td class="">
                                        <p class="h6"> Order Time</p>
                                    </td>

                                    @if ($order->created_at)
                                        <td>
                                            <p class="h6"> <i class="fas fa-clock text-success"></i>
                                                {{ \Carbon\Carbon::parse($order->created_at)->format('h:i:s A') }}
                                            </p>
                                        </td>
                                    @else
                                        ...
                                    @endif

                                </tr>
                                <!-- End of Item -->








                                {{-- inprogress --}}
                                @if ($order->inprogress_at)
                                    <!-- Item -->
                                    <tr>
                                        <td class="">
                                            <p class="h6"> Inprogress Date</p>
                                        </td>
                                        <td class=" font-weight-bold">



                                            @if ($order->inprogress_at)
                                                <p class="h6"> <i class="fas fa-calendar-week text-info"></i>
                                                    {{ \Carbon\Carbon::parse($order->inprogress_at)->format('d/m/Y') }}
                                                </p>
                                            @else
                                                ...
                                            @endif
                                        </td>

                                    </tr>
                                    <!-- End of Item -->




                                    <!-- Item -->
                                    <tr>
                                        <td class="">
                                            <p class="h6"> Inprogress Time</p>
                                        </td>

                                        @if ($order->inprogress_at)
                                            <td>
                                                <p class="h6"> <i class="fas fa-clock text-success"></i>
                                                    {{ \Carbon\Carbon::parse($order->inprogress_at)->format('h:i:s A') }}
                                                </p>
                                            </td>
                                        @else
                                            ...
                                        @endif

                                    </tr>
                                    <!-- End of Item -->


                                    @if ($order->inprogress_admin)
                                        <!-- Item -->
                                        <tr>
                                            <td class="">
                                                <p class="h6"> Inprogress By Admin</p>
                                            </td>

                                            <td>
                                                <p class="h6">
                                                    <a class=" text-info"
                                                        href="{{ route('admin.admins.index', ['admin_id' => $order->inprogress_admin->id]) }}">{{ $order->inprogress_admin->name }}</a>
                                                </p>
                                            </td>
                                        </tr>
                                        <!-- End of Item -->
                                    @endif
                                @endif
                                {{-- inprogress --}}



                                {{-- delivered --}}
                                @if ($order->delivered_at)
                                    <!-- Item -->
                                    <tr>
                                        <td class="">
                                            <p class="h6"> Delivered Date</p>
                                        </td>
                                        <td class=" font-weight-bold">



                                            @if ($order->delivered_at)
                                                <p class="h6"> <i class="fas fa-calendar-week text-info"></i>
                                                    {{ \Carbon\Carbon::parse($order->delivered_at)->format('d/m/Y') }}
                                                </p>
                                            @else
                                                ...
                                            @endif
                                        </td>

                                    </tr>
                                    <!-- End of Item -->




                                    <!-- Item -->
                                    <tr>
                                        <td class="">
                                            <p class="h6"> Delivered Time</p>
                                        </td>

                                        @if ($order->delivered_at)
                                            <td>
                                                <p class="h6"> <i class="fas fa-clock text-success"></i>
                                                    {{ \Carbon\Carbon::parse($order->delivered_at)->format('h:i:s A') }}
                                                </p>
                                            </td>
                                        @else
                                            ...
                                        @endif

                                    </tr>
                                    <!-- End of Item -->


                                    @if ($order->delivered_admin)
                                        <!-- Item -->
                                        <tr>
                                            <td class="">
                                                <p class="h6"> Delivered By Admin</p>
                                            </td>

                                            <td>
                                                <p class="h6">
                                                    <a class=" text-info"
                                                        href="{{ route('admin.admins.index', ['admin_id' => $order->delivered_admin->id]) }}">{{ $order->delivered_admin->name }}</a>
                                                </p>
                                            </td>
                                        </tr>
                                        <!-- End of Item -->
                                    @endif
                                @endif
                                {{-- delivered --}}




                                {{-- cancelled --}}
                                @if ($order->cancelled_at)
                                    <!-- Item -->
                                    <tr>
                                        <td class="">
                                            <p class="h6"> Cancelled Date</p>
                                        </td>
                                        <td class=" font-weight-bold">



                                            @if ($order->cancelled_at)
                                                <p class="h6"> <i class="fas fa-calendar-week text-info"></i>
                                                    {{ \Carbon\Carbon::parse($order->cancelled_at)->format('d/m/Y') }}
                                                </p>
                                            @else
                                                ...
                                            @endif
                                        </td>

                                    </tr>
                                    <!-- End of Item -->




                                    <!-- Item -->
                                    <tr>
                                        <td class="">
                                            <p class="h6"> Cancelled Time</p>
                                        </td>

                                        @if ($order->cancelled_at)
                                            <td>
                                                <p class="h6"> <i class="fas fa-clock text-success"></i>
                                                    {{ \Carbon\Carbon::parse($order->cancelled_at)->format('h:i:s A') }}
                                                </p>
                                            </td>
                                        @else
                                            ...
                                        @endif

                                    </tr>
                                    <!-- End of Item -->


                                    <!-- Item -->
                                    <tr>
                                        <td class="">
                                            <p class="h6"> Cancelled From</p>
                                        </td>

                                        <td>
                                            <p class="h6">
                                                {{ $order->cancelled_from ? ucfirst($order->cancelled_from) : '--' }}
                                            </p>
                                        </td>
                                    </tr>
                                    <!-- End of Item -->





                                    @if ($order->cancelled_from == 'admin' && $order->cancelled_admin)
                                        <!-- Item -->
                                        <tr>
                                            <td class="">
                                                <p class="h6"> Cancelled By Admin</p>
                                            </td>

                                            <td>
                                                <p class="h6">
                                                    <a class=" text-info"
                                                        href="{{ route('admin.admins.index', ['admin_id' => $order->cancelled_admin->id]) }}">{{ $order->cancelled_admin->name }}</a>
                                                </p>
                                            </td>
                                        </tr>
                                        <!-- End of Item -->
                                    @endif
                                @endif
                                {{-- cancelled --}}




                                <!-- Item -->
                                <tr>
                                    <td class="">
                                        <p class="h6"> Payment Type</p>
                                    </td>

                                    <td class=" font-weight-bold">
                                        <p class="h6"> {{ $order->payment_type }}</p>
                                    </td>

                                </tr>
                                <!-- End of Item -->

                                <!-- Item -->
                                <tr>
                                    <td class="">
                                        <p class="h6"> Order From</p>
                                    </td>

                                    <td class=" font-weight-bold">
                                        <p class="h6"> {{ strtoupper($order->order_from) }}</p>
                                    </td>

                                </tr>
                                <!-- End of Item -->

                                <!-- Item -->
                                <tr>
                                    <td class="">
                                        <p class="h6"> Order Status</p>
                                    </td>
                                    <td class=" font-weight-bold">


                                        @php
                                            $order_status_color = 'secondary';

                                            if ($order->status == 'inprogress') {
                                                $order_status_color = 'info';
                                            } elseif ($order->status == 'delivered') {
                                                $order_status_color = 'success';
                                            } elseif ($order->status == 'cancelled') {
                                                $order_status_color = 'danger';
                                            }

                                        @endphp
                                        <p class="h6">

                                            <span class="badge badge-lg bg-{{ $order_status_color }}">
                                                {{ ucfirst($order->status) }}</span>

                                        </p>
                                    </td>

                                </tr>
                                <!-- End of Item -->






                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- --}}


            <div class="col-md-6">


                <div class="card card-body my-4">

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">

                            <tbody>
                                <!-- Item -->
                                <tr>
                                    <td class="">
                                        <p class="h6"> Customer Name</p>
                                    </td>
                                    <td class=" font-weight-bold">



                                        <p class="h6">
                                            @if ($order->user)
                                                <a class=" text-info"
                                                    href="{{ route('admin.users.index', ['user_id' => $order->user->id]) }}">{{ $order->customer_name }}</a>
                                            @else
                                                {{ $order->customer_name }}
                                            @endif
                                        </p>

                                    </td>

                                </tr>
                                <!-- End of Item -->


                                <!-- Item -->
                                <tr>
                                    <td class="">
                                        <p class="h6"> Customer Phone</p>
                                    </td>
                                    <td class=" font-weight-bold">
                                        <p class="h6">
                                            <a class="text-info"
                                                href="tel:{{ $order->user_phone }}">{{ $order->customer_phone }}</a>

                                        </p>
                                    </td>

                                </tr>
                                <!-- End of Item -->


                                <!-- Item -->
                                <tr>
                                    <td class="">
                                        <p class="h6"> Customer Email</p>
                                    </td>
                                    <td class=" font-weight-bold">
                                        <p class="h6">
                                            <a class="text-info"
                                                href="mailto:{{ $order->customer_email }}">{{ $order->customer_email }}</a>

                                        </p>
                                    </td>

                                </tr>
                                <!-- End of Item -->

                                <!-- Item -->
                                <tr>
                                    <td class="">
                                        <p class="h6"> Customer Address</p>
                                    </td>
                                    <td class=" font-weight-bold">

                                        <p class="h6">{{ $order->customer_address }}
                                        </p>

                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- --}}
        </div>
        {{-- first section --}}





        {{-- second Section --}}



        <div class="row">

            {{-- comment --}}
            {{-- <div class="col-md-6">


            <div class="card">



                <div class="card-body">


                    <form action="{{ route('admin.orders.updateComment', $order->id) }}" method="POST">

                        @csrf

                        @method('PUT')
                        <div class="form-group  my-4">
                            <label for="comment">Comment</label>
                            <textarea required name="comment" id="comment" cols="30" rows="3"
                                class="form-control">{{ $order->comment }}</textarea>
                        </div>


                        @error('comment')
                        <div class="d-flex justify-content-center ">

                            <div class="text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                        </div>
                        @enderror


                        <div class="form-group  my-4">

                            <button type="submit" class="btn btn-primary d-block m-auto" title="Update Comment"
                                data-bs-toggle="tooltip" data-bs-placement="top">

                                Save
                                <i class="fa-regular fa-pen-to-square icon icon-xs mx-1"></i>
                            </button>
                        </div>




                    </form>
                </div>
            </div>

        </div> --}}

            {{-- comment --}}


            {{-- Custom Address From Admin --}}
            {{-- <div class="col-md-6">


            <div class="card">



                <div class="card-body">


                    <form action="{{ route('admin.orders.updateCustomAddressFromAdmin', $order->id) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <div class="form-group  my-4">
                            <label for="custom_address_from_admin">Custom Address From Admin</label>
                            <textarea name="custom_address_from_admin" id="custom_address_from_admin" cols="30" rows="3"
                                class="form-control">{{ $order->custom_address_from_admin }}</textarea>
                        </div>


                        @error('custom_address_from_admin')
                        <div class="d-flex justify-content-center ">

                            <div class="text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                        </div>
                        @enderror


                        <div class="form-group  my-4">

                            <button type="submit" class="btn btn-primary d-block m-auto"
                                title="Update Custom Address From Admin" data-bs-toggle="tooltip"
                                data-bs-placement="top">

                                Save
                                <i class="fa-regular fa-pen-to-square icon icon-xs mx-1"></i>
                            </button>
                        </div>




                    </form>
                </div>
            </div>


        </div> --}}
        </div>


        {{-- second Section --}}



        {{-- products --}}

        <div class="card my-4 ">



            <div class="card-header ">
                <h2>Order Products</h2>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-hover  table-centered table-bordered table-striped   font-bold text-center ">

                        <thead class="thead-light">
                            <p class="h6 text-bold"></p>
                            <tr>
                                <th class=" rounded-end">
                                    <p class="h6 text-bold">Vendor name</p>
                                </th>

                                <th class=" rounded-end">
                                    <p class="h6 text-bold">Product Title</p>
                                </th>
                                <th class="">

                                    <p class="h6 text-bold">Price</p>

                                </th>

                                <th class=" rounded-end">
                                    <p class="h6 text-bold">Quantity</p>
                                </th>

                                <th class="">

                                    <p class="h6 text-bold">Total Price</p>

                                </th>

                                @if (auth()->guard('admin')->user()->getRoles()[0] != 'vendor-admin')
                                    <th class="">

                                        <p class="h6 text-bold">Events Commission [%]</p>

                                    </th>

                                    <th class="">

                                        <p class="h6 text-bold">Events Commission [AED]</p>

                                    </th>
                                @endif
                                <th class=" rounded-end">
                                    <p class="h6 text-bold">Taxes</p>
                                </th>



                            </tr>
                        </thead>
                        <tbody>

                            <?php $total_product_price = 0;
                            $total_taxes = 0;
                            $our_comission_price = 0; ?>
                            @foreach ($order->order_products as $product)
                                <!-- Item -->
                                <tr>

                                    <td class="">
                                        <p class="h5 text-nowrap"> {{ $product->product->admin->title_en }}</p>
                                    </td>

                                    <td class="">
                                        <p class="h5 text-nowrap"> {{ $product->product_title }}</p>
                                    </td>

                                    <td class="">
                                        <p class="h5 text-nowrap"> {{ number_format($product->price) }} AED</p>
                                        <?php $total_product_price += $product->price * $product->product_quantity; ?>
                                    </td>

                                    <td class="">
                                        <p class="h5 text-nowrap"> {{ $product->product_quantity }}</p>
                                    </td>


                                    @if (auth()->guard('admin')->user()->getRoles()[0] != 'vendor-admin')
                                        <td class="">
                                            <p class="h5 text-nowrap"> {{ number_format($product->price * $product->product_quantity) }}
                                                AED
                                            </p>
                                        </td>
                                        <td class="">
                                            <p class="h5 text-nowrap">
                                                {{ $product->product->admin->vendor ? $product->product->admin->vendor->commission : '0' }}
                                                %</p>
                                        </td>
                                    @endif
                                    <td class="">
                                        <p class="h5 text-nowrap">
                                            {{ $product->product->admin->vendor
                                                ? number_format($product->price * $product->product_quantity * ($product->product->admin->vendor->commission / 100))
                                                : 0 }}
                                            AED</p>
                                        @if ($product->product->admin->vendor)
                                            <?php $our_comission_price += $product->price * $product->product_quantity * ($product->product->admin->vendor->commission / 100); ?>
                                        @else
                                            <?php $our_comission_price += 0; ?>
                                        @endif

                                    </td>
                                    <td class="">
                                        @if ($product->order_taxes->count() > 0)
                                            @foreach ($product->order_taxes as $taxe)
                                                <p class="h5 text-nowrap">
                                                    {{ number_format($taxe->taxe_title) }} <span
                                                        class="badge bg-secondary">{{ $taxe->taxe_percentage . '%' }}</span>
                                                    <?php $total_taxes += $taxe->taxe_percentage; ?>
                                                </p>
                                            @endforeach
                                        @else
                                            <h5>----</h5>
                                        @endif

                                    </td>



                                </tr>
                                <!-- End of Item -->
                            @endforeach



                            <tr>

                                <td colspan="2">
                                    <p class="h4 py-1">
                                        Total
                                    </p>
                                </td>

                                <td colspan="1">
                                    <p class="h4 text-nowrap">
                                        <?php $total_price = 0; ?>
                                        <?php $total_taxes = 0; ?>
                                        @foreach ($order->order_products as $order_product)
                                            @if ($order_product->product->taxes->count() > 0)
                                                @foreach ($order_product->product->taxes as $taxe)
                                                    <?php $total_taxes += $order_product->price * ($taxe->percentage / 100); ?>
                                                @endforeach
                                            @endif
                                            <?php $total_price += ($total_taxes + $order_product->price) * $order_product->product_quantity; ?>
                                        @endforeach
                                        {{ number_format($total_price) }} AED
                                    </p>
                                </td>




                            </tr>

                        </tbody>


                    </table>
                </div>
            </div>
        </div>

        {{-- products --}}














        <div class="modal fade" id="model-extra-fees" tabindex="-1" role="dialog" aria-labelledby="model-extra-fees"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="h6 modal-title">Add Extra Fees</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ route('admin.orders.AddExtraFees', $order->id) }}" method="POST">

                            @csrf

                            <div class="form-group my-4">
                                <label for="cost">Cost (AED)</label>
                                <input name="cost" type="number" class="form-control" id="cost">
                            </div>

                            <div class="form-group  my-4">
                                <label for="note">Note</label>
                                <textarea name="note" id="note" cols="30" rows="3" class="form-control"></textarea>
                            </div>


                            <div class="form-group  my-4">

                                <button type="submit" class="btn btn-primary d-block m-auto">
                                    Add
                                    <i class="fas fa-plus icon icon-xs ms-2"></i>
                                </button>
                            </div>




                        </form>
                    </div>

                </div>
            </div>
        </div>
        {{-- extra_fees --}}
















        <hr class="hr">

        <div class="modal fade" id="model-special-discount" tabindex="-1" role="dialog"
            aria-labelledby="model-special-discount" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="h6 modal-title">Add Special Discounts</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ route('admin.orders.AddSpecialDiscount', $order->id) }}" method="POST">

                            @csrf

                            <div class="form-group my-4">
                                <label for="cost">Cost (AED)</label>
                                <input name="cost" type="number" class="form-control" id="cost">
                            </div>

                            <div class="form-group  my-4">
                                <label for="note">Note</label>
                                <textarea name="note" id="note" cols="30" rows="3" class="form-control"></textarea>
                            </div>


                            <div class="form-group  my-4">

                                <button type="submit" class="btn btn-primary d-block m-auto">
                                    Add
                                    <i class="fas fa-plus icon icon-xs ms-2"></i>
                                </button>
                            </div>




                        </form>
                    </div>

                </div>
            </div>
        </div>
        {{-- special_discount --}}



        <div class="card my-5">




            <div class="card-body">

                <div class="table-responsive">
                    <table
                        class="table table-centered table-hover  table-bordered table-striped  table-dark rounded text-center font-bold text-white font-weight-bolder">

                        <tbody style="font-size: 18px">


                            <tr>

                                <td class="">
                                    <p class="h4"> Total Products Price</p>
                                </td>

                                <td class="">
                                    <p class="h4"> {{ number_format($order->product_total_price) }} AED</p>
                                </td>


                            </tr>
                            @if (auth()->guard('admin')->user()->getRoles()[0] != 'vendor-admin')
                                <tr>


                                    <td class="">
                                        <p class="h4"> Total Commision Price</p>
                                    </td>

                                    <td class="">
                                        <p class="h4"> {{ number_format($our_comission_price) }} AED</p>
                                    </td>


                                </tr>
                            @endif
                            <tr>


                                <td class="">
                                    <p class="h4"> Total Products Taxes</p>
                                </td>

                                <td class="">
                                    <p class="h4"> {{ number_format($order->total_taxes_price) }} AED</p>
                                </td>


                            </tr>



                            @if ($order->promo_discount)
                                <tr>


                                    <td class="">
                                        <p class="h4"> Promo Code Title</p>
                                    </td>

                                    <td class="">
                                        <p class="h4"> {{ $order->customer_promo_code_titel }} </p>
                                    </td>


                                </tr>
                            @endif
                            <tr>


                                <td class="">
                                    <p class="h4"> Promo Code Discount</p>
                                </td>

                                <td class="">
                                    @if ($order->customer_promo_code_value && $order->customer_promo_code_type && $order->customer_promo_code_title)
                                        <ul class="sub-total">
                                            @if ($order->customer_promo_code_type == 'percent')
                                                <p class="h4"> {{ $order->customer_promo_code_value }} %</p>
                                            @elseif ($order->customer_promo_code_type == 'amount')
                                                <p class="h4"> {{ $order->customer_promo_code_value }} AED</p>
                                            @endif
                                        </ul>
                                    @else
                                        <p class="h4"> {{ number_format($order->promo_discount) }} AED</p>
                                    @endif
                                </td>


                            </tr>






                        </tbody>
                    </table>



                </div>
            </div>
        </div>

        <div class="alert my-4 text-center text-white" style="background: #1f2937">
            <?php $total_commission = 0; ?>
            @if ($order->order_products->count() > 0)
                @foreach ($order->order_products as $item)
                    <?php $total_commission += $item->price * $item->product_quantity * (auth()->guard('admin')->user()->vendor ? auth()->guard('admin')->user()->vendor->commission / 100 : 1); ?>
                @endforeach
            @endif
            <p class="h2">Total Events Commission <span class="badge badge-lg bg-success "
                    style="font-size: 30px">{{ number_format($total_commission) }}
                </span> AED </p>
        </div>


        <div class="alert my-4 text-center text-white" style="background: #1f2937">
            @if (auth()->guard('admin')->user()->getRoles()[0] != 'vendor-admin')
                <p class="h2">Order Total Price <span class="badge badge-lg bg-success "
                        style="font-size: 30px">{{ number_format($order->product_total_price + $order->total_taxes_price + $order->shipping_fees) }}
                    </span> AED </p>
            @else
                <?php $total_commission = 0; ?>
                @if ($order->order_products->count() > 0)
                    @foreach ($order->order_products as $item)
                        <?php $total_commission +=
                            $item->price *
                            $item->product_quantity *
                            (auth()
                                ->guard('admin')
                                ->user()->vendor->commission /
                                100); ?>
                    @endforeach
                @endif


                <p class="h2">Order Total Price <span class="badge badge-lg bg-success "
                        style="font-size: 30px">{{ number_format($order->product_total_price - $total_commission + $order->total_taxes_price + $order->shipping_fees) }}
                    </span> AED </p>
            @endif






        </div>

    </div>



    <div class="card my-4">
        <div class="card-body">


            <div class="d-flex justify-content-center flex-wrap">
                <button type="button" class="btn btn-lg btn-primary d-inline-flex align-items-center m-2 text-white"
                    id="print_product">

                    <span class=" fas fa-print me-2"></span>
                    Print
                </button>



                @if (Auth::guard('admin')->user()->hasPermission('orders-update') && $order->status == 'pending')
                    <form class="action_btn"
                        data-message="Are You Sure You Want To Move This Order To Inprogress Status ?"
                        action="{{ route('admin.orders.inprogressAction', $order->order_number) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit"
                            class="btn  btn-lg btn-success d-inline-flex align-items-center m-2 text-white">
                            <span class="fas fa-check me-2"></span>In Progress

                        </button>
                    </form>
                    <form class="action_btn" data-message="Are You Sure You Want To Move This Order To Delivered Status ?"
                        action="{{ route('admin.orders.deliveredAction', $order->order_number) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit"
                            class="btn btn-lg btn-success d-inline-flex align-items-center text-white m-2">
                            <span class="fas fa-check-double me-2"></span>Delivered
                        </button>
                    </form>
                    <form class="action_btn" data-message="Are You Sure You Want To Move This Order To Cancelled Status ?"
                        action="{{ route('admin.orders.cancelledAction', $order->order_number) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-lg btn-danger d-inline-flex align-items-center m-2">
                            <span class="fas fa-trash me-2"></span>Cancel
                        </button>
                    </form>
                @endif


                @if (Auth::guard('admin')->user()->hasPermission('orders-update') && $order->status == 'in_progress')
                    <form class="action_btn" data-message="Are You Sure You Want To Move This Order To Delivered Status ?"
                        action="{{ route('admin.orders.deliveredAction', $order->order_number) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit"
                            class="btn btn-lg btn-success d-inline-flex align-items-center text-white m-2">
                            <span class="fas fa-check-double me-2"></span>Delivered
                        </button>
                    </form>
                @endif

                @if (Auth::guard('admin')->user()->hasPermission('orders-update') &&
                        ($order->status == 'new' || $order->status == 'in_progress'))
                    <form class="action_btn" data-message="Are You Sure You Want To Move This Order To Cancelled Status ?"
                        action="{{ route('admin.orders.cancelledAction', $order->order_number) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-lg btn-danger d-inline-flex align-items-center m-2">
                            <span class="fas fa-trash me-2"></span>Cancel
                        </button>
                    </form>
                @endif



            </div>
        </div>
    </div>














@endsection


@section('scripts')
    <script src="{{ asset('layouts/admin/js/printThis.js') }}" type="module"></script>

    <script>
        let printButton = document.getElementById('print_product');

        printButton.addEventListener('click', () => {
            $("#order_details_page").printThis({
                // header: "<h1>Order {{ $order->order_number }}</h1>",
                importCSS: true,
                importStyle: true,
                printContainer: true,
                pageTitle: "Order {{ $order->order_number }}",
                exclude: ".btn"
            });

        })
    </script>
@endsection
