@extends('layouts.admin.master')
@section('title')
All Colors
@endsection

@section('content')

<style>
    .card .table td, .card .table th{
        padding-left: 0px !important ;
        padding-right: 0px !important ;
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
                    <li class="breadcrumb-item active" aria-current="page">All Colors</li>
                </ol>
            </nav>
            <h2 class="h4">All Colors</h2>

        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            @if (Auth::guard('admin')->user()->hasPermission('colors-create'))
                <div class="d-flex  align-items-center justify-content-center flex-md-nowrap">

                    @if (Auth::guard('admin')->user()->hasPermission('colors-create'))
                        <div class="">
                            <div data-bs-toggle="tooltip" data-bs-placement="top">
                                <button class="btn btn-primary  m-1" data-bs-toggle="modal" data-bs-target="#modal-create"
                                    class="">Create New Color
                                </button>
                            </div>
                        </div>
                    @endif
                    <div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="modal-default"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h2 class="h6 modal-title">Create New Color</h2>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">

                                    <div class="wrapper m-auto">

                                        <Form action="{{ route('admin.colors.store') }}" method="Post">
                                            @csrf
                                            @method('POST')
                                            <div class="form-group mb-4">
                                                <label for="title_ar">Name [EN]<span class="text-danger">*</span></label>
                                                <input dir="rtl" required type="text" name="name_en"
                                                    class="form-control @error('name_en') is-invalid @enderror"
                                                    value="{{ old('name_en') }}">
                                            </div>
                                            @error('name_en')
                                                <div class="d-flex justify-content-center ">

                                                    <div class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                </div>
                                            @enderror

                                            <div class="form-group mb-4">
                                                <label for="title_ar">Name [AR]<span class="text-danger">*</span></label>
                                                <input dir="rtl" required type="text" name="name_ar"
                                                    class="form-control @error('name_ar') is-invalid @enderror"
                                                    value="{{ old('name_ar') }}">
                                            </div>
                                            @error('name_ar')
                                                <div class="d-flex justify-content-center ">

                                                    <div class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                </div>
                                            @enderror

                                            <div class="">
                                                <label for="title_ar">Code<span class="text-danger">*</span></label>
                                                <input dir="rtl" required type="color" name="code"
                                                    class=" @error('code') is-invalid @enderror"
                                                    value="{{ old('code') }}">
                                            </div>
                                            @error('code')
                                                <div class="d-flex justify-content-center ">

                                                    <div class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                </div>
                                            @enderror

                                            <button type="submit" class="btn btn-primary d-block m-auto">
                                                Create
                                                <i class="fas fa-plus icon icon-xs ms-2"></i>
                                            </button>

                                        </Form>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>



                </div>
            @endif


        </div>

    </div>

    {{-- on top --}}








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
                                            <option value="out-of-stock"
                                                @if (isset(request()->type) && request()->type == 'out-of-stock') selected @endif>
                                                Out Of Stock</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group mb-3">
                                        <label for="status">Is Active Or InActive</label>

                                        <select class="form-control" aria-label="Default" name="status">
                                            <option selected value="">All</option>
                                            <option value="1" @if (isset(request()->status) && request()->status == 1) selected @endif>
                                                Active
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

                    <th class="border-gray-200">Name [EN] </th>
                    <th class="border-gray-200">Name [AR] </th>
                    <th class="border-gray-200">Code</th>
                    <th class="border-gray-200">Created At</th>
                    <th class="border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($colors as $color)
                    <tr>
                        <td>

                            <div class="m-auto" style="width:200px">

                                <p class="">{{ Str::limit($color->name_en, 40) }}</p>
                            </div>
                        </td>
                        <td>

                            <div class="m-auto" style="width:200px">

                                <p class="">{{ Str::limit($color->name_ar, 40) }}</p>
                            </div>
                        </td>
                        <td>

                            <div class="m-auto d-flex" style="width:200px">
                                <p style="margin: auto; ">{{ $color->code }}</p>
                                <div style="width: 50px; height: 50px; margin: auto; background-color: {{ $color->code }};">
                                </div>


                            </div>
                        </td>

                        <td>
                            <div class="m-auto" style="width:200px">

                                <p class="">{{ Str::limit($color->created_at, 40) }}</p>
                            </div>
                        </td>

                        <td>

                            {{-- actions --}}
                            <div class="d-flex  align-items-center justify-content-center flex-md-nowrap">

                                @if (Auth::guard('admin')->user()->hasPermission('colors-update'))
                                    <div class="">
                                        <div data-bs-toggle="tooltip" data-bs-placement="top">
                                            <button class="btn btn-primary  m-1" data-bs-toggle="modal"
                                                data-bs-target="#modal-{{ $color->id }}" class=""><span
                                                    class="fas fa-eye "></span>
                                            </button>
                                        </div>
                                    </div>
                                @endif
                                @if (Auth::guard('admin')->user()->hasPermission('colors-delete'))
                                    <div class="">
                                        <div data-bs-toggle="tooltip" data-bs-placement="top">
                                            <button class="btn btn-primary  m-1" data-bs-toggle="modal"
                                                data-bs-target="#modal-edit-{{ $color->id }}" class=""><span
                                                    class="fas fa-edit"></span>
                                            </button>
                                        </div>
                                    </div>
                                @endif


                                <div class="">
                                    <a href="{{ route('admin.colors.destroy', $color->id) }}" class="btn btn-danger m-1">
                                        <span class="fas fa-trash "></span>
                                    </a>
                                </div>


                            </div>
                            {{-- actions --}}
                        </td>

                        <div class="modal fade" id="modal-{{ $color->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="modal-default" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="h6 modal-title">{{ $color->name_en }}</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="wrapper m-auto">

                                            <ul class="list-group list-group-flush">

                                                <li class="list-group-item">Name [EN]: {{ $color->name_en }}
                                                </li>
                                                <li class="list-group-item">Name [AR]: {{ $color->name_en }}
                                                </li>

                                                <li class="list-group-item d-flex">
                                                    Code: {{ $color->code }}
                                                    <div
                                                        style="width: 20px;height: 20px; background-color: {{ $color->code }}; margin-left:20px;">
                                                    </div>
                                                </li>


                                                <li class="list-group-item">Added Date : <i
                                                        class="fas fa-calendar-week text-info"></i>
                                                    {{ \Carbon\Carbon::parse($color->created_at)->format('d/m/Y') }}
                                                </li>
                                                <li class="list-group-item">Added Time : <i
                                                        class="fas fa-clock text-success"></i>
                                                    {{ \Carbon\Carbon::parse($color->created_at)->format('h:i:s A') }}
                                                </li>

                                            </ul>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="modal-edit-{{ $color->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="modal-default" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="h6 modal-title">{{ $color->name_en }}</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="wrapper m-auto">

                                            <Form action="{{ route('admin.colors.update', $color->id) }}" method="Post">
                                                @csrf
                                                @method('put')
                                                <div class="form-group mb-4">
                                                    <label for="title_ar">Name [EN] <span class="text-danger">*</span></label>
                                                    <input required type="text" value="{{ $color->name_en }}"
                                                        name="name_en"
                                                        class="form-control @error('name_en') is-invalid @enderror"
                                                        value="{{ old('name_en') }}">
                                                </div>
                                                @error('name_en')
                                                    <div class="d-flex justify-content-center ">

                                                        <div class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    </div>
                                                @enderror

                                                <div class="form-group mb-4">
                                                    <label for="title_ar">Name [AR] <span class="text-danger">*</span></label>
                                                    <input required type="text" value="{{ $color->name_ar }}"
                                                        name="name_ar"
                                                        class="form-control @error('name_ar') is-invalid @enderror"
                                                        value="{{ old('name_ar') }}">
                                                </div>
                                                @error('name_ar')
                                                    <div class="d-flex justify-content-center ">

                                                        <div class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    </div>
                                                @enderror

                                                <div class="">
                                                    <label for="title_ar">Code<span class="text-danger">*</span></label>
                                                    <input required type="color" value="{{ $color->code }}"
                                                        name="code" class=" @error('code') is-invalid @enderror"
                                                        value="{{ old('code') }}">
                                                </div>
                                                @error('code')
                                                    <div class="d-flex justify-content-center ">

                                                        <div class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    </div>
                                                @enderror

                                                <button type="submit" class="btn btn-primary d-block m-auto">
                                                    edit
                                                    <i class="fas fa-plus icon icon-xs ms-2"></i>
                                                </button>

                                            </Form>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
            {!! $colors->links('pagination::bootstrap-5') !!}

        </div>

        @if ($colors->count() < 1)
            <div class="d-flex justify-content-center" style="min-height: 300px">
                Empty
            </div>
        @endif
    </div>

    {{-- table --}}
@endsection
