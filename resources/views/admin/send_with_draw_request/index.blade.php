@extends('layouts.admin.master')
@section('title')
    All Commissions
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
                    <li class="breadcrumb-item active" aria-current="page">All Commissions</li>
                </ol>
            </nav>

        </div>
    </div>






    {{-- on top --}}


    {{-- table --}}
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <table class="table table-hover table-centered table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th class="border-gray-200">Vendor Email </th>
                    <th class="border-gray-200">Vendor Phone </th>
                    <th class="border-gray-200">Total His Orders</th>
                    <th class="border-gray-200">Our Commission (%)</th>
                    <th class="border-gray-200">Total Commission From Orders (AED)</th>
                </tr>
            </thead>
            <tbody>
                <!-- Item -->
                @foreach ($withdraw as $item)
                    <tr>
                        <td>
                            <p class="text-nowrap">{{ $item->vendor_name }}</p>
                        </td>
                        <td>
                            <p class="text-nowrap">{{ $item->vendor_phone }}</p>
                        </td>
                        <td>
                            <p class="text-nowrap">{{ number_format($item->have) }} AED</p>
                        </td>
                        <td>
                            <p class="text-nowrap">{{ $item->vendor->vendor->commission }} %</p>
                        </td>
                        <td>
                            <p class="text-nowrap">{{ number_format($item->have * ( $item->vendor->vendor->commission / 100 )) }}  AED</p>
                        </td>
                    </tr>
                @endforeach
                <!-- Item -->
            </tbody>
        </table>

        {{-- table --}}
    @endsection
