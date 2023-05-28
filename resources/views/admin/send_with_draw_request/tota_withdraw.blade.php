@extends('layouts.admin.master')
@section('title')
    Total With Draw Balance
@endsection

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
                    <li class="breadcrumb-item active" aria-current="page">Total With Draw Balance</li>
                </ol>
            </nav>

        </div>
    </div>

    <div class="card card-body border-0 shadow mb-2">

        <div class="accordion ">



            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Search Filters
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionPricing">
                    <div class="accordion-body card card-body ">


                        <form action="{{ route('admin.with-draw-request.filter_total_withdraw') }}">

                            <div class="row">

                                <div class="col-lg-4">

                                    <div class="form-group mb-3">
                                        <label for="from">From</label>
                                        <input type="date" id="from" value="{{ request()->from }}"
                                            name="from" class="form-control search-docs" placeholder="From">

                                    </div>
                                </div>


                                <div class="col-lg-4">

                                    <div class="form-group mb-3">
                                        <label for="to">To</label>

                                        <input type="date" id="to"
                                            value="{{ request()->to ? request()->to : date('Y-m-d', time()) }}"
                                            name="to" class="form-control search-docs" placeholder="To">

                                    </div>
                                </div>

                                <div class="col-12">

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary ">Search</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>



    {{-- table --}}
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <table class="table table-hover table-centered table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th class="border-gray-200">Vendor Name </th>
                    <th class="border-gray-200">Vendor Phone </th>
                    <th class="border-gray-200">Vendor Type </th>
                    <th class="border-gray-200">Total Orders</th>
                    <th class="border-gray-200">Vendor Balance</th>
                    <th class="border-gray-200">Total Sent Balance</th>
                    <th class="border-gray-200">Vendor Balance After Sent Money  </th>
                    <th class="border-gray-200">Events Commission</th>
                    <th class="border-gray-200">Events Balance</th>
                </tr>
            </thead>
            <tbody>
                <!-- Item -->
                <?php
                $total = 0 ;
                $have = 0 ;
                $commission = 0 ;
                $total_sent_money = 0 ;
                $our_commission = 0 ;
                $vendor_have_after_sent_money = 0 ;?>
                @foreach ($withdraw as $item)
                @if( ! $item->sent_money == 0 )
                <tr>
                    <td>
                        <p class="text-nowrap">{{ $item->vendor ? $item->vendor->title_en : "----" }}</p>
                    </td>
                    <td>
                        <p class="text-nowrap">{{ $item->vendor_phone }}</p>
                    </td>
                    <td>
                        <p class="text-nowrap">{{ $item->vendor->type }}</p>
                    </td>
                    <td>
                        <p class="text-nowrap">{{ number_format($item->total) }} AED</p>
                    </td>
                    <td>
                        <p class="text-nowrap">{{ number_format($item->have) }} AED</p>
                    </td>
                    <td>
                        <p class="text-nowrap">{{ number_format($item->sent_money) }} AED</p>
                    </td>
                    <td>
                        <p class="text-nowrap">{{ number_format($item->have - $item->sent_money) }} AED</p>
                    </td>
                    <td>
                        <p class="text-nowrap"> {{ $item->vendor ? $item->vendor->commission . "%" : "----" }} </p>
                    </td>
                    <td>
                        <p class="text-nowrap">{{ number_format($item->total * ($item->vendor->commission / 100)) }} AED</p>
                    </td>
                    <?php
                    $total += $item->total ;
                    $have += $item->have ;
                    $commission += $item->vendor->commission ;
                    $our_commission += $item->total * ($item->vendor->commission / 100) ;
                    $total_sent_money += $item->sent_money ;
                    $vendor_have_after_sent_money += ( $item->have - $item->sent_money ) ; ?>
                </tr>
                @endif
                @endforeach

                <!-- Item -->
            </tbody>
            <tbody style="">
                <tr style="background-color: #f3a095; font-weight: bold !important; font-size: 14px">
                    <td>
                        <p class="text-nowrap" style="font-size: 17px; font-weight: bold">Total</p>
                    </td>
                    <td>
                        <p class="text-nowrap"></p>
                    </td>
                    <td>
                        <p class="text-nowrap"></p>
                    </td>
                    <td>
                        <p class="text-nowrap" style="font-size: 17px; font-weight: bold">{{ number_format($total) }} AED</p>
                    </td>
                    <td>
                        <p class="text-nowrap" style="font-size: 17px; font-weight: bold">{{ number_format($have) }} AED</p>
                    </td>
                    <td>
                        <p class="text-nowrap" style="font-size: 17px; font-weight: bold">{{ number_format($total_sent_money) }} AED</p>
                    </td>
                    <td>
                        <p class="text-nowrap" style="font-size: 17px; font-weight: bold">{{ number_format($vendor_have_after_sent_money) }} AED</p>
                    </td>
                    <td>
                        <p class="text-nowrap" style="font-size: 17px; font-weight: bold"></p>
                    </td>
                    <td>
                        <p class="text-nowrap" style="font-size: 17px; font-weight: bold">{{ number_format($our_commission) }} AED</p>
                    </td>
                </tr>
            </tbody>
        </table>

        {{-- table --}}
    @endsection
