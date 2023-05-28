@extends('layouts.admin.master')
@section('title')
    {{ $status }}
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



    {{-- <div class="card card-body border-0 shadow mb-2">

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


                        <form action="{{ route('admin.products.index') }}">

                            <div class="row">
                                <div class="col-lg-4">

                                    <div class="form-group mb-3">
                                        <label for="search">Search Keywords</label>
                                        <input type="text" id="search" value="{{ request()->search }}" name="search"
                                            class="form-control search-docs" placeholder="Search">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">

                                        <label for="limit">Display Limit</label>

                                        <select class="form-control mb-3" aria-label="Default" name="limit">
                                            <option selected value="5">5</option>
                                            <option value="10" @if (isset(request()->limit) && request()->limit == 10) selected @endif>10
                                            </option>
                                            <option value="20" @if (isset(request()->limit) && request()->limit == 20) selected @endif>20
                                            </option>
                                            <option value="30" @if (isset(request()->limit) && request()->limit == 30) selected @endif>30
                                            </option>
                                            <option value="40" @if (isset(request()->limit) && request()->limit == 40) selected @endif>40
                                            </option>
                                            <option value="50" @if (isset(request()->limit) && request()->limit == 50) selected @endif>50
                                            </option>
                                            <option value="100" @if (isset(request()->limit) && request()->limit == 100) selected @endif>100
                                            </option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-lg-4">
                                    <div class="form-group mb-3">
                                        <label for="status">In Stock Or Out Of Stock</label>

                                        <select class="form-control" aria-label="Default" name="type">
                                            <option value="all" @if (isset(request()->type) && (request()->type != 'in-stock' && request()->type != 'out-of-stock')) selected @endif>All
                                                Products</option>
                                            <option value="in-stock" @if (isset(request()->type) && request()->type == 'in-stock') selected @endif>In
                                                Stock</option>
                                            <option value="out-of-stock" @if (isset(request()->type) && request()->type == 'out-of-stock') selected @endif>
                                                Out Of Stock</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group mb-3">
                                        <label for="status">Is Active Or InActive</label>

                                        <select class="form-control" aria-label="Default" name="status">
                                            <option selected value="">All</option>
                                            <option value="1" @if (isset(request()->status) && request()->status == 1) selected @endif>Active
                                            </option>
                                            <option value="0" @if (isset(request()->status) && request()->status == 0) selected @endif>
                                                InActive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group mb-3">
                                        <label for="deleted">Is Deleted Or Live</label>
                                        <select class="form-control" aria-label="Default" name="deleted">
                                            <option selected value="1">Live</option>
                                            <option value="0" @if (isset(request()->deleted) && request()->deleted == 0) selected @endif>
                                                Deleted
                                            </option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-lg-4">
                                    <div class="form-group mb-3">
                                        <label for="order">Order By</label>
                                        <select class="form-control" aria-label="Default" name="order">
                                            <option selected value="DESC">Latest</option>
                                            <option value="ASC" @if (isset(request()->order) && request()->order == 'ASC') selected @endif>
                                                Oldest</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4">

                                    <div class="form-group mb-3">
                                        <label for="from">From</label>
                                        <input type="date" id="from" value="{{ request()->from }}" name="from"
                                            class="form-control search-docs" placeholder="From">

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
    </div> --}}


    {{-- table --}}
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <table class="table table-hover table-centered table-striped table-bordered text-center">
            <thead>
                <tr>

                    <th class="border-gray-200">Name </th>
                    <th class="border-gray-200">Email</th>
                    <th class="border-gray-200">Sing From</th>
                    <th class="border-gray-200">Status</th>
                    <th class="border-gray-200">Created At</th>
                    <th class="border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Item -->

                @foreach ($becomes as $become)
                    {{-- modeles --}}



                    {{-- models --}}













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

                                <p class="">{{ Str::limit($become->status, 40) }}</p>
                            </div>
                        </td>
                        <td>
                            <div class="m-auto" style="width:200px">

                                <p class="">{{ Str::limit($become->created_at, 40) }}</p>
                            </div>
                        </td>


















                        {{--
                        <td>
                            @if ($product->created_at)
                                <span class="text-nowrap d-block h6"><i class="fas fa-calendar-week text-info"></i>
                                    {{ \Carbon\Carbon::parse($product->created_at)->format('d/m/Y') }} </span>
                                <span class="text-nowrap d-block h6"><i class="fas fa-clock text-success"></i>
                                    {{ \Carbon\Carbon::parse($product->created_at)->format('h:i:s A') }} </span>
                            @else
                                ...
                            @endif

                        </td> --}}



                        <td>

                            {{-- actions --}}
                            <div class="d-flex  align-items-center justify-content-center flex-md-nowrap">


                                <div class="">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Show Details">
                                        <button class="btn btn-primary  m-1" data-bs-toggle="modal"
                                            data-bs-target="#modal-{{ $become->id }}" class=""><span
                                                class="fas fa-eye "></span>
                                        </button>
                                    </div>
                                </div>

                                @if ($status == 'pending')
                                    <div class="">
                                        @if (Auth::guard('admin')->user()->hasPermission('products-update'))
                                            <a class="btn btn-success m-1" class="dropdown-item"
                                                href="{{ route('admin.become.accpted', $become->id) }}" title="Edit"
                                                data-bs-toggle="tooltip" data-bs-placement="top">
                                                accept

                                            </a>
                                        @endif
                                    </div>
                                    <div class="">
                                        @if (Auth::guard('admin')->user()->hasPermission('products-update'))
                                            <a class="btn btn-danger m-1" class="dropdown-item"
                                                href="{{ route('admin.become.reject', $become->id) }}" title="Edit"
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
