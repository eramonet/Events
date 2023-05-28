@extends('layouts.admin.master')
@section('title')
    Total With Draw Balance Per Month
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
                    <li class="breadcrumb-item active" aria-current="page">Total With Draw Balance Per
                        {{ date('F', mktime(0, 0, 0, Carbon\Carbon::now()->month, 1)) . ' / ' . Carbon\Carbon::now()->year }}
                    </li>
                </ol>
            </nav>

        </div>
    </div>



    {{-- table --}}
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <table class="table table-hover table-centered table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th class="border-gray-200">Vendor Name </th>
                    <th class="border-gray-200">Vendor Phone </th>
                    <th class="border-gray-200"> Hall Booking / Product Order </th>
                    <th class="border-gray-200">Total Order Balance</th>
                    <th class="border-gray-200">Total Vendor Balance</th>
                    <th class="border-gray-200">Our Commission (%)</th>
                    <th class="border-gray-200">Our Commission (AED)</th>
                    <th class="border-gray-200">Total Sent Balance</th>
                    <th class="border-gray-200">Vendor Balance After Sent Money </th>
                </tr>
            </thead>
            <tbody>
                <!-- Item -->
                <?php
                $total_order_balance = 0;
                $vendor_balance = 0;
                $our_commission = 0 ;
                $sent_money = 0 ;
                $total_balance_after_sent = 0 ;?>
                @foreach ($vendors as $vendor)
                    @foreach ($vendor->with_draws as $with_draw)
                        <tr>
                            <td>
                                <p class="text-nowrap">{{ $vendor->title_en }}</p>
                            </td>
                            <td>
                                <p class="text-nowrap">{{ $vendor->phone }}</p>
                            </td>
                            <td>
                                <p class="text-nowrap">{{ $with_draw->money_type }}</p>
                            </td>
                            <td>
                                <p class="text-nowrap">{{ number_format($with_draw->total) }} AED</p>
                            </td>
                            <td>
                                <p class="text-nowrap">{{ number_format($with_draw->have) }} AED</p>
                            </td>
                            <td>
                                <p class="text-nowrap">{{ number_format($vendor->commission) . ' %' }}</p>
                            </td>
                            <td>
                                <p class="text-nowrap">{{ number_format($with_draw->our_commission) . ' AED' }}</p>
                            </td>
                            <td>
                                <?php $total_sent_money = 0; ?>
                                @foreach ($with_draw->with_draw_requests as $request)
                                    <?php $total_sent_money += $request->budget; $sent_money += $request->budget  ?>
                                @endforeach
                                <p class="text-nowrap">{{ number_format($total_sent_money) . ' AED' }}</p>
                            </td>
                            <td>
                                <p class="text-nowrap">{{ number_format($with_draw->have - $total_sent_money) . ' AED' }}</p>
                            </td>
                            <?php
                            $total_order_balance += $with_draw->total ;
                            $vendor_balance += $with_draw->have ;
                            $our_commission += $with_draw->our_commission ;
                            $total_balance_after_sent += $with_draw->have - $total_sent_money ;
                        ?>
                        </tr>
                    @endforeach
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
                        <p class="text-nowrap" style="font-size: 17px; font-weight: bold">
                            {{ number_format($total_order_balance) }} AED
                        </p>
                    </td>
                    <td>
                        <p class="text-nowrap" style="font-size: 17px; font-weight: bold">
                            {{ number_format($vendor_balance) }} AED
                        </p>
                    </td>
                    <td>
                        <p class="text-nowrap" style="font-size: 17px; font-weight: bold">

                        </p>
                    </td>
                    <td>
                        <p class="text-nowrap" style="font-size: 17px; font-weight: bold">
                            {{ number_format($our_commission) }} AED</p>
                    </td>
                    <td>
                        <p class="text-nowrap" style="font-size: 17px; font-weight: bold">
                            {{ number_format($sent_money) }} AED</p>
                    </td>
                    <td>
                        <p class="text-nowrap" style="font-size: 17px; font-weight: bold">
                            {{ number_format($total_balance_after_sent) }} AED</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- table --}}
@endsection
