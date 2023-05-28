@extends('layouts.admin.master')
@section('title')
    All Products
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
                    <li class="breadcrumb-item active" aria-current="page">Products {{ $status }} Request </li>
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
            <h2 class="h4"> Products {{ $status }} Request   </h2>

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
                    <th class="border-gray-200">ID</th>
                    <th class="border-gray-200">Title </th>
                    <th class="border-gray-200">Price</th>
                    <th class="border-gray-200">Stock</th>
                    <th class="border-gray-200">Category</th>
                    {{-- <th class="border-gray-200">Created At</th> --}}
                    <th class="border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Item -->

                @foreach ($products as $product)
                    {{-- modeles --}}

                    @if (Auth::guard('admin')->user()->hasPermission('products-update'))
                        {{-- model-update-order-price-{{ $product->id }} --}}

                        <div class="modal fade" id="model-update-order-price-{{ $product->id }}" tabindex="-1"
                            role="dialog" aria-labelledby="model-update-order-price-{{ $product->id }}"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="h6 modal-title">Update Product Price</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="{{ route('admin.products.updatePrice', $product->id) }}"
                                            method="POST">

                                            @csrf
                                            @method('PUT')

                                            <div class="row">



                                                {{-- real_price --}}
                                                <div class="col-md-12">
                                                    <div class="form-group mb-4">
                                                        <label for="real_price">Real Price (AED) <span
                                                                class="text-danger">*</span></label>
                                                        <input minlength="0" min="1" required type="number"
                                                            name="real_price"
                                                            class="form-control @error('real_price') is-invalid @enderror"
                                                            value="{{ $product->real_price }}">
                                                    </div>


                                                    @error('real_price')
                                                        <div class="d-flex justify-content-center ">

                                                            <div class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                        </div>
                                                    @enderror
                                                </div>

                                                {{-- real_price --}}


                                                {{-- fake_price --}}
                                                <div class="col-md-12">
                                                    <div class="form-group mb-4">
                                                        <label for="fake_price">Fake Price (AED) <span
                                                                class="text-danger">*</span></label>
                                                        <input minlength="0" min="1" required type="number"
                                                            name="fake_price"
                                                            class="form-control @error('fake_price') is-invalid @enderror"
                                                            value="{{ $product->fake_price }}">
                                                    </div>


                                                    @error('fake_price')
                                                        <div class="d-flex justify-content-center ">

                                                            <div class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                        </div>
                                                    @enderror
                                                </div>

                                                {{-- fake_price --}}

                                            </div>


                                            <div class="form-group  my-4">

                                                <button type="submit" class="btn btn-primary d-block m-auto">
                                                    Update
                                                    <i class="fa-regular fa-pen-to-square icon icon-xs ms-2"></i>
                                                </button>
                                            </div>




                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                        {{-- model-update-order-price-{{ $product->id }} --}}



                        {{-- model-update-order-stock-{{ $product->id }} --}}

                        <div class="modal fade" id="model-update-order-stock-{{ $product->id }}" tabindex="-1"
                            role="dialog" aria-labelledby="model-update-order-stock-{{ $product->id }}"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="h6 modal-title">Update Product Stock</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="{{ route('admin.products.updateStock', $product->id) }}"
                                            method="POST">

                                            @csrf
                                            @method('PUT')

                                            <div class="row">


                                                {{-- stock --}}
                                                <div class="col-md-12">
                                                    <div class="form-group mb-4">
                                                        <label for="stock">Stock <span
                                                                class="text-danger">*</span></label>
                                                        <input minlength="0" required type="number" name="stock"
                                                            class="form-control @error('stock') is-invalid @enderror"
                                                            value="{{ $product->stock }}">
                                                    </div>


                                                    @error('stock')
                                                        <div class="d-flex justify-content-center ">

                                                            <div class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                        </div>
                                                    @enderror
                                                </div>

                                                {{-- stock --}}


                                            </div>


                                            <div class="form-group  my-4">

                                                <button type="submit" class="btn btn-primary d-block m-auto">
                                                    Update
                                                    <i class="fa-regular fa-pen-to-square icon icon-xs ms-2"></i>
                                                </button>
                                            </div>




                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                        {{-- model-update-order-stock-{{ $product->id }} --}}
                    @endif

                    {{-- models --}}













                    <tr>



                        <td>
                            <p class="text-nowrap">{{ $product->id }}.</p>
                        </td>



                        <td>

                            <div class="m-auto" style="width:200px">
                                <p class="" dir="rtl">{{ Str::limit($product->title_ar, 40) }}</p>
                                <p class="">{{ Str::limit($product->title_en, 40) }}</p>
                            </div>
                        </td>

                        <td>

                            @if (Auth::guard('admin')->user()->hasPermission('products-update'))
                                <button class="btn btn-outline-primary text-nowrap" data-bs-toggle="modal"
                                    data-bs-target="#model-update-order-price-{{ $product->id }}"
                                    type="button">{{ number_format($product->real_price) }} AED</button>
                            @else
                                <button class="btn btn-outline-primary text-nowrap"
                                    type="button">{{ number_format($product->real_price) }} AED</button>
                            @endif


                        </td>


                        <td>


                            @if (Auth::guard('admin')->user()->hasPermission('products-update'))
                                <button
                                    class="btn btn-outline-{{ $product->stock > 0 ? 'success' : 'danger' }} text-nowrap"
                                    data-bs-toggle="modal" data-bs-target="#model-update-order-stock-{{ $product->id }}"
                                    type="button">{{ number_format($product->stock) }} </button>
                            @else
                                <button
                                    class="btn btn-outline-{{ $product->stock > 0 ? 'success' : 'danger' }} text-nowrap"
                                    type="button">{{ number_format($product->stock) }} </button>
                            @endif


                        </td>



                        <td>

                            @if ($product->main_category)
                                <a
                                    href="{{ route('admin.products-categories.index', ['category_id' => $product->main_category->id, 'type' => 'main']) }}">
                                    <span class="badge bg-primary " style="font-size: 14px ;padding:10px ">
                                        {{ $product->main_category->title_en . ' - ' . $product->main_category->title_ar }}
                                    </span></a>
                            @else
                                --
                            @endif
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
                                        <a href="{{ route('admin.products.show' , $product->id) }}" class="btn btn-primary  m-1"  class=""><span
                                                class="fas fa-eye "></span>
                                        </a>
                                    </div>
                                </div>

                                @if ($status == 'new')
                                    <div class="">
                                        @if (Auth::guard('admin')->user()->hasPermission('products-update'))
                                            <a class="btn btn-success m-1" class="dropdown-item"
                                                href="{{ route('admin.product_request.product_request_accept', $product->id) }}" title="Accept"
                                                data-bs-toggle="tooltip" data-bs-placement="top">
                                                Accept
                                            </a>
                                        @endif
                                    </div>

                                    <div class="">
                                        @if (Auth::guard('admin')->user()->hasPermission('products-update'))
                                            <a class="btn btn-danger m-1" class="dropdown-item"
                                                href="{{ route('admin.product_request.product_request_reject', $product->id) }}" title="Reject"
                                                data-bs-toggle="tooltip" data-bs-placement="top">
                                                Reject

                                            </a>
                                        @endif
                                    </div>

                                    <div class="">
                                        @if (Auth::guard('admin')->user()->hasPermission('products-update'))
                                            <a class="btn btn-info m-1" class="dropdown-item"
                                                href="{{ route('admin.products.edit', $product->id) }}" title="Edit"
                                                data-bs-toggle="tooltip" data-bs-placement="top"><span
                                                    class="fas fa-edit "></span>
                                            </a>
                                        @endif
                                    </div>
                                @endif






                            </div>
                            {{-- actions --}}






                        </td>




                        <div class="modal fade" id="modal-{{ $product->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="modal-default" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="h6 modal-title">{{ $product->title_en }}</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="wrapper m-auto">

                                            <div class="d-flex mb-2">
                                                <img class="model-img" src="{{ $product->primary_image_url }}"
                                                    alt="{{ $product->title_en }} Image">
                                            </div>

                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">Title In Arabic : {{ $product->title_ar }}
                                                </li>
                                                <li class="list-group-item">Title In English : {{ $product->title_en }}
                                                </li>
                                                <li class="list-group-item">Purchase Price:
                                                    {{ number_format($product->purchase_price, 2) }} AED </li>
                                                <li class="list-group-item">Price:
                                                    {{ number_format($product->real_price, 2) }} AED </li>
                                                <li class="list-group-item">Price With Taxes:
                                                    {{ number_format($product->price_after_taxes) }} AED </li>

                                                {{--  <li class="list-group-item">Profit Percent:
                                                    {{ number_format($product->profit_percent, 2) }} % </li>  --}}


                                                <li class="list-group-item">Stock : {{ $product->stock }}</li>


                                                <li class="list-group-item">Views : <span class="badge bg-success">
                                                        {{ $product->views }}</span>
                                                </li>








                                                <li class="list-group-item">Main Category :
                                                    @if ($product->main_category)
                                                        <span class="badge bg-info ">
                                                            {{ $product->main_category->title_en . ' - ' . $product->main_category->title_ar }}
                                                        </span>
                                                    @else
                                                        --
                                                    @endif

                                                </li>

                                                <li class="list-group-item">Sub Category :
                                                    @if ($product->category)
                                                        <span class="badge bg-info">
                                                            {{ $product->category->title_en . ' - ' . $product->category->title_ar }}
                                                        </span>
                                                    @else
                                                        --
                                                    @endif

                                                </li>




                                                <li class="list-group-item"> Reviews :

                                                    @if ($product->reviews_count)
                                                        <a class="btn btn-outline-primary"
                                                            href="{{ route('admin.products-reviews.index', ['product_id' => $product->id]) }}">{{ $product->reviews_count }}</a>
                                                    @else
                                                        0
                                                    @endif


                                                </li>

                                                <li class="list-group-item">Added By :


                                                    @if ($product->admin)
                                                        <a class="btn btn-outline-primary"
                                                            href="{{ route('admin.system-admins.index', ['admin_id' => $product->admin->id]) }}">{{ $product->admin->name }}</a>
                                                    @else
                                                        --
                                                    @endif


                                                </li>






                                                <li class="list-group-item">Status :
                                                    @if ($product->status)
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-danger">InActive</span>
                                                    @endif
                                                </li>

                                                <li class="list-group-item">Added Date : <i
                                                        class="fas fa-calendar-week text-info"></i>
                                                    {{ \Carbon\Carbon::parse($product->created_at)->format('d/m/Y') }}
                                                </li>
                                                <li class="list-group-item">Added Time : <i
                                                        class="fas fa-clock text-success"></i>
                                                    {{ \Carbon\Carbon::parse($product->created_at)->format('h:i:s A') }}
                                                </li>

                                            </ul>
                                        </div>

                                    </div>
                                    <div class="modal-footer">






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
            {!! $products->appends(request()->query())->links('pagination::bootstrap-5') !!}



        </div>

        @if ($products->count() < 1)
            <div class="d-flex justify-content-center" style="min-height: 300px">
                Empty
            </div>
        @endif
    </div>

    {{-- table --}}
@endsection
