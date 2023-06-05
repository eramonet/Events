@extends('layouts.admin.master')
@section('title')
    All Vendors
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
                    <li class="breadcrumb-item active" aria-current="page">Vendors</li>
                </ol>
            </nav>
            <h2 class="h4">All Vendors</h2>

        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            @if (Auth::guard('admin')->user()->hasPermission('vendors-create'))
                <a href="{{ route('admin.vendors.create') }}"
                    class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
                    <svg class="icon icon-xs " fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Create New Vendor
                </a>
            @endif

            <div class="btn-group ms-2 ms-lg-3">
                <a href="{{ route('admin.vendors.export') }}"
                    class="btn btn-outline-success d-inline-flex align-items-center">
                    {{-- <svg class="icon icon-xs " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg> --}}

                    <svg class="icon icon-xs " xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-file-earmark-break-fill" viewBox="0 0 16 16">
                        <path
                            d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V9H2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM2 12h12v2a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-2zM.5 10a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H.5z" />
                    </svg>
                    <span> Export As Excel</span>
                </a>
            </div>
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


                        <form action="{{ route('admin.vendors.index') }}">

                            <div class="row">
                                <div class="col-lg-4">

                                    <div class="form-group mb-3">
                                        <label for="name">Search</label>
                                        <input type="text" id="name" value="{{ request()->search }}" name="search"
                                            class="form-control search-docs" placeholder="Search">
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
                                            <option value="0" @if (isset(request()->deleted) && request()->deleted == 0) selected @endif>Deleted
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">

                                        <label for="limit">Limit</label>

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
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="border-gray-200">ID</th>
<<<<<<< HEAD
                    <th class="border-gray-200">Image</th>
=======
>>>>>>> d36cbbda453e24bf36fa2ba7c87f57a3db5f1ab4
                    <th class="border-gray-200">Title In Arabic</th>
                    <th class="border-gray-200">Title In English</th>
                    <th class="border-gray-200">Commission %</th>
                    <th class="border-gray-200">Created At</th>
                    <th class="border-gray-200">Status</th>
                    <th class="border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Item -->

                @foreach ($vendors as $vendor)
                    <tr>
                        <td>{{ $vendor->id }}</td>

<<<<<<< HEAD
                        <td><img src="{{ $vendor->image_url }}" width="100px"></td>

=======
>>>>>>> d36cbbda453e24bf36fa2ba7c87f57a3db5f1ab4
                        <td>{{ $vendor->title_ar }}</td>
                        <td>{{ $vendor->title_en }}</td>
                        <td>{{ $vendor->commission }}%</td>


                        <td>
                            @if ($vendor->created_at)
                                <p><i class="fas fa-calendar-week text-info"></i>
                                    {{ \Carbon\Carbon::parse($vendor->created_at)->format('d/m/Y') }} </p>
                                <p><i class="fas fa-clock text-success"></i>
                                    {{ \Carbon\Carbon::parse($vendor->created_at)->format('h:i:s A') }} </p>
                            @else
                                ...
                            @endif

                        </td>



                        <td>
                            @if ($vendor->status)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">InActive</span>
                            @endif
                        </td>
                        <td>

                            <a href="{{ route('admin.vendors.show' , $vendor->id) }}" class="btn btn-primary"><span class="fas fa-eye "></span></a>

                            @if (Auth::guard('admin')->user()->hasPermission('vendors-update'))
                                <a class="btn btn-info" href="{{ route('admin.vendors.edit', $vendor->id) }}"><span
                                        class="fas fa-edit "></span></a>
                            @endif


                            @if ($vendor->deleted_at)
                                @if (Auth::guard('admin')->user()->hasPermission('vendors-update'))
                                    <form style="display: contents" action="{{ route('admin.vendors.restore', $vendor->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success">
                                            <span class="fa-solid fa-trash-can-arrow-up "></span>
                                        </button>
                                    </form>
                                @endif
                            @else
                                @if (Auth::guard('admin')->user()->hasPermission('vendors-delete'))
                                    <form style="display: contents" class="delete-btn" action="{{ route('admin.vendors.destroy', $vendor->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <span class="fas fa-trash-alt "></span>
                                        </button>
                                    </form>
                                @endif
                            @endif

                        </td>




                        <div class="modal fade" id="modal-{{ $vendor->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="modal-default" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="h6 modal-title">{{ $vendor->title_en }}</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="wrapper m-auto">

                                            <div class="d-flex mb-2">
                                                <img class="model-img" src="{{ $vendor->image_url }}"
                                                    alt="{{ $vendor->title_en }} Image">
                                            </div>

                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">Title In Arabic : {{ $vendor->title_ar }}
                                                </li>
                                                <li class="list-group-item">Title In English : {{ $vendor->title_en }}
                                                </li>
                                                <li class="list-group-item">Email: <a class="text-tertiary me-3"
                                                        href=" mailto:{{ $vendor->email }}"> {{ $vendor->email }}</a>
                                                </li>
                                                <li class="list-group-item">Phone Number : <a class="text-tertiary me-3"
                                                        href="tel:{{ $vendor->phone }}">{{ $vendor->phone }}</a> </li>
                                                <li class="list-group-item">Commission : {{ $vendor->commission }}% </li>



                                                <li class="list-group-item">Added By :

                                                    @if ($vendor->admin)
                                                        <a class="btn btn-outline-primary"
                                                            href="{{ route('admin.system-admins.index', ['admin_id' => $vendor->admin->id]) }}">{{ $vendor->admin->name }}</a>
                                                    @else
                                                        --
                                                    @endif

                                                </li>

                                                <li class="list-group-item">Vendor Admins :

                                                    @if ($vendor->admins_count)
                                                        <a class="btn btn-outline-primary"
                                                            href="{{ route('admin.vendor-admins.index', ['vendor_id' => $vendor->id]) }}">{{ $vendor->admins_count }}</a>
                                                    @else
                                                        {{ $vendor->admins_count }}
                                                    @endif

                                                </li>
                                                @if ($vendor->halls_count > 0)
                                                    <li class="list-group-item">Halls Count :

                                                        <a class="btn btn-outline-primary"
                                                            href="{{ route('admin.halls.index', ['vendor_id' => $vendor->id]) }}">{{ $vendor->halls_count }}</a>



                                                    </li>
                                                @endif




                                                <li class="list-group-item">Can Add Products :
                                                    @if ($vendor->can_add_products)
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-danger">InActive</span>
                                                    @endif
                                                </li>


                                                <li class="list-group-item">Can Add Halls :
                                                    @if ($vendor->can_add_halls)
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-danger">InActive</span>
                                                    @endif
                                                </li>



                                                <li class="list-group-item">Status :
                                                    @if ($vendor->status)
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-danger">InActive</span>
                                                    @endif
                                                </li>

                                                <li class="list-group-item">Added Date : <i
                                                        class="fas fa-calendar-week text-info"></i>
                                                    {{ \Carbon\Carbon::parse($vendor->created_at)->format('d/m/Y') }} </li>
                                                <li class="list-group-item">Added Time : <i
                                                        class="fas fa-clock text-success"></i>
                                                    {{ \Carbon\Carbon::parse($vendor->created_at)->format('h:i:s A') }}
                                                </li>

                                            </ul>
                                        </div>

                                    </div>
                                    <div class="modal-footer">


                                        @if (Auth::guard('admin')->user()->hasPermission('vendors-update'))
                                            <a class="btn btn-primary"
                                                href="{{ route('admin.vendors.edit', $vendor->id) }}"><span
                                                    class="fas fa-edit "></span>Edit</a>
                                        @endif

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
            {!! $vendors->appends(request()->query())->links('pagination::bootstrap-5') !!}



        </div>

        @if ($vendors->count() < 1)
            <div class="d-flex justify-content-center" style="min-height: 300px">
                Empty
            </div>
        @endif
    </div>

    {{-- table --}}
@endsection
