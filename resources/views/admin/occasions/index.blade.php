@extends('layouts.admin.master')
@section('title')
    All Occasions
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

                </ol>
            </nav>
            <h2 class="h4"> All Occasions</h2>

        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            {{-- @if (Auth::guard('admin')->user()->hasPermission('products-categories-create')) --}}
            <a href="{{ route('admin.occasion.create') }}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
                <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
                Create New Occasions
            </a>
            {{-- @endif --}}


        </div>
    </div>






    {{-- on top --}}



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


                        <form action="{{ route('admin.products-categories.index') }}">

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
                                        <label for="status"> Main Or Sub Category</label>

                                        <select class="form-control" aria-label="Default" name="type">
                                            <option value="main" @if (isset(request()->type) && request()->type == 'main') selected @endif>Main
                                                Category</option>
                                            <option value="sub" @if (isset(request()->type) && request()->type == 'sub') selected @endif>Sub
                                                Category</option>
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
                                                Deleted</option>
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
                    <th class="border-gray-200">Icon</th>
                    <th class="border-gray-200">Image</th>
                    <th class="border-gray-200">Title</th>
                    <th class="border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Item -->

                @foreach ($occasions as $occasion)
                    <tr>


                        <td>

                            <div class="m-auto" style="width:250px">
                                <img src="{{ asset($occasion->icon) }}" width="50px">
                            </div>
                        </td>

                        <td>

                            <div class="m-auto" style="width:250px">
                                <img src="{{ asset($occasion->primary_image) }}" width="50px">
                            </div>
                        </td>



                        <td>

                            <div class="m-auto" style="width:250px">
                                <p class="" dir="rtl">{{ Str::limit($occasion->title_ar, 60) }}</p>
                                <p class="">{{ Str::limit($occasion->title_en, 60) }}</p>
                            </div>
                        </td>

                        <td>

                            {{-- actions --}}

                            <div class="d-flex  align-items-center justify-content-center flex-md-nowrap">


                                <div class="">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Show Details">
                                        <button class="btn btn-primary  m-1" data-bs-toggle="modal"
                                            data-bs-target="#modal-{{ $occasion->id }}" class=""><span
                                                class="fas fa-eye "></span>
                                        </button>
                                    </div>
                                </div>


                                <div class="">
                                    {{-- @if (Auth::guard('admin')->user()->hasPermission('products-categories-update')) --}}
                                    <a class="btn btn-info m-1" class="dropdown-item"
                                        href="{{ route('admin.occasion.edit', $occasion->id) }}" title="Edit"
                                        data-bs-toggle="tooltip" data-bs-placement="top"><span
                                            class="fas fa-edit "></span>
                                    </a>
                                    {{-- @endif --}}
                                </div>


                                <div class="">

                                    {{-- @if (Auth::guard('admin')->user()->hasPermission('products-categories-delete')) --}}
                                    <form class="delete-btn m-0 p-0 "
                                        action="{{ route('admin.occasion.destroy', $occasion->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger m-1" type="submit" title="Delete"
                                            data-bs-toggle="tooltip" data-bs-placement="top">
                                            <span class="fas fa-trash-alt "></span>
                                        </button>
                                    </form>
                                    {{-- @endif --}}


                                </div>






                            </div>
                            {{-- actions --}}






                        </td>












                        <div class="modal fade" id="modal-{{ $occasion->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="modal-default" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="h6 modal-title">{{ $occasion->title_en }}</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="wrapper m-auto">

                                            <div class="d-flex mb-2">
                                                <label>Icon</label>
                                                <img class="model-img" src="{{ $occasion->icon }}" width="100px">
                                            </div>

                                            <div class="d-flex mb-2">
                                                <label>Image</label>
                                                <img class="model-img" src="{{ $occasion->primary_image }}" width="100px">
                                            </div>

                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">Title In Arabic : {{ $occasion->title_ar }}
                                                </li>
                                                <li class="list-group-item">Title In English : {{ $occasion->title_en }}
                                                </li>
                                                <li class="list-group-item">Type : {{ $occasion->for_what }}
                                                </li>
                                                <li class="list-group-item">Added Date : <i
                                                        class="fas fa-calendar-week text-info"></i>
                                                    {{ \Carbon\Carbon::parse($occasion->created_at)->format('d/m/Y') }}
                                                </li>
                                                <li class="list-group-item">Added Time : <i
                                                        class="fas fa-clock text-success"></i>
                                                    {{ \Carbon\Carbon::parse($occasion->created_at)->format('h:i:s A') }}
                                                </li>

                                            </ul>
                                        </div>

                                    </div>
                                    <div class="modal-footer">


                                        {{-- @if (Auth::guard('admin')->user()->hasPermission('products-categories-update')) --}}
                                        <a class="btn btn-primary"
                                            href="{{ route('admin.products-categories.edit', $occasion->id) }}"><span
                                                class="fas fa-edit me-2"></span>Edit</a>
                                        {{-- @endif --}}

                                        {{-- <button type="button" class="btn btn-secondary">Accept</button> --}}


                                        <button type="button" class="btn btn-link text-gray ms-auto"
                                            data-bs-dismiss="modal">Close</button>
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
            {!! $occasions->appends(request()->query())->links('pagination::bootstrap-5') !!}



        </div>

        @if ($occasions->count() < 1)
            <div class="d-flex justify-content-center" style="min-height: 300px">
                Empty
            </div>
        @endif
    </div>

    {{-- table --}}
@endsection
