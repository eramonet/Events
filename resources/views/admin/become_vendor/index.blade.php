@extends('layouts.admin.master')
@section('title')
    {{ $status }}
@endsection

@section('content')
    {{-- on top --}}

    <style>
        .card .table td, .card .table th{
            padding-left: 0px !important;
            padding-right: 0px !important;
        }
    </style>

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
                    <li class="breadcrumb-item active" aria-current="page">{{ $status }} Vendors</li>
                </ol>
            </nav>

            @php
                $pageAction = 'All';

                if (request('type') == 'in-stock') {
                    $pageAction = 'In Stock';
                } elseif (request('type') == 'out-of-stock') {
                    $pageAction = 'Out Of Stock';
                }
            @endphp
            <h2 class="h4">{{ $pageAction }} {{ $status }} Vendors</h2>

        </div>

    </div>
    {{-- on top --}}

    {{-- table --}}
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <table class="table table-hover table-centered table-striped table-bordered text-center">
            <thead>
                <tr>

                    <th class="border-gray-200">Name </th>
                    <th class="border-gray-200">Email</th>
                    <th class="border-gray-200">Sing From</th>
                    <th class="border-gray-200">Created At</th>
                    <th class="border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Item -->

                @foreach ($becomes as $become)

                    <tr>
                        <td>
                            <div class="m-auto" style="width:200px">

                                <p class="">{{ Str::limit($become->name, 40) }}</p>
                            </div>
                        </td>
                        <td>
                            <div class="m-auto" style="width:200px">

                                <p class="">{{ Str::limit($become->email, 40) }}</p>
                            </div>
                        </td>
                        <td>
                            <div class="m-auto" style="width:200px">
                                <p class="">{{ Str::limit($become->sign_from, 40) }}</p>
                            </div>

                        </td>
                        <td>
                            <div class="m-auto" style="width:200px">

                                <p class="">{{ Str::limit($become->created_at, 40) }}</p>
                            </div>
                        </td>

                        <td>

                            {{-- actions --}}
                            <div class="d-flex  align-items-center justify-content-center flex-md-nowrap">


                                <div class="">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Show Details">
                                        <a href="{{ route('admin.become.show' , $become->id) }}" class="btn btn-primary  m-1"><span
                                                class="fas fa-eye "></span>
                                        </a>
                                    </div>
                                </div>

                                @if ($status == 'pending')
                                    <div class="">
                                        @if (Auth::guard('admin')->user()->hasPermission('products-update'))
                                            <a style="color: #fff" class="btn btn-success m-1" class="dropdown-item"
                                                href="{{ route('admin.become.edit', $become->id ) }}" title="Accept"
                                                data-bs-toggle="tooltip" data-bs-placement="top">
                                                Accept
                                            </a>
                                        @endif
                                    </div>
                                    <div class="">
                                        @if (Auth::guard('admin')->user()->hasPermission('products-update'))
                                            <a style="color: #fff" class="btn btn-danger m-1" class="dropdown-item"
                                                href="{{ route('admin.become.reject', $become->id) }}" title="Reject"
                                                data-bs-toggle="tooltip" data-bs-placement="top">
                                                Reject
                                            </a>
                                        @endif
                                    </div>
                                @endif
                            </div>
                            {{-- actions --}}
                        </td>
                        <div class="modal fade" id="modal-{{ $become->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="modal-default" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="h6 modal-title">{{ $become->Name }}</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="wrapper m-auto">



                                            <ul class="list-group list-group-flush">

                                                <li class="list-group-item">Name: {{ $become->name }}
                                                </li>

                                                <li class="list-group-item">Email: {{ $become->email }}
                                                </li>
                                                <li class="list-group-item">Phone Namber: {{ $become->phone_number }}
                                                </li>
                                                <li class="list-group-item">Status: {{ $become->status }}
                                                </li>
                                                <li class="list-group-item">comment: {{ $become->coment }}
                                                </li>



                                                {{--  <li class="list-group-item">Profit Percent:
                                                    {{ number_format($product->profit_percent, 2) }} % </li>  --}}







                                                <li class="list-group-item">Added Date : <i
                                                        class="fas fa-calendar-week text-info"></i>
                                                    {{ \Carbon\Carbon::parse($become->created_at)->format('d/m/Y') }}
                                                </li>
                                                <li class="list-group-item">Added Time : <i
                                                        class="fas fa-clock text-success"></i>
                                                    {{ \Carbon\Carbon::parse($become->created_at)->format('h:i:s A') }}
                                                </li>

                                            </ul>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </tr>
                @endforeach
                <!-- Item -->
            </tbody>
        </table>
        <div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
            {!! $becomes->links('pagination::bootstrap-5') !!}

        </div>

        @if ($becomes->count() < 1)
            <div class="d-flex justify-content-center" style="min-height: 300px">
                Empty
            </div>
        @endif
    </div>

    {{-- table --}}
@endsection
