@extends('layouts.admin.master')
@section('title')
 
    All {{ $status }} Halls
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
                    <li class="breadcrumb-item active" aria-current="page">Halls</li>
                </ol>
            </nav>
            <h2 class="h4">All {{ $status }} Halls</h2>

        </div>

    </div>
=======
>>>>>>> 211d721c3ef82e51a3d2067398967a033afbaa37
    All {{$status}} Halls
@endsection

@section('content')

{{-- on top --}}

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-2">
    <div class="d-block mb-4 mb-md-0">
        <nav aria-label="breadcrumb" class=" d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Halls</li>
            </ol>
        </nav>
        <h2 class="h4">All {{$status}} Halls</h2>

    </div>
    
</div>
 
 
{{-- on top --}}
     {{-- on top --}}
 


    <div class="card card-body border-0 shadow mb-2">

        <div class="accordion " >
 
 


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


                        <form action="{{ route('admin.halls.index') }}">

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
                                            <option value="ASC" @if (isset(request()->order) && request()->order == 'ASC') selected @endif>Oldest
                                            </option>
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
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Search Filters
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionPricing">
                  <div class="accordion-body card card-body ">


                    <form action="{{ route('admin.halls.index') }}">

                        <div class="row">
                            <div class="col-lg-4">

                                <div class="form-group mb-3">
                                    <label for="name">Search</label>
                                    <input  type="text" id="name" value="{{ request()->search }}" name="search" class="form-control search-docs" placeholder="Search">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mb-3">
                                    <label for="status">Is Active Or InActive</label>

                                    <select class="form-control" aria-label="Default" name="status">
                                        <option selected value="">All</option>
                                        <option value="1" @if( isset(request()->status) &&request()->status == 1) selected @endif >Active</option>
                                        <option value="0" @if( isset(request()->status) &&request()->status == 0) selected @endif >InActive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mb-3">
                                    <label for="deleted">Is Deleted Or Live</label>
                                    <select class="form-control" aria-label="Default" name="deleted">
                                        <option selected value="1">Live</option>
                                        <option value="0" @if( isset(request()->deleted) &&request()->deleted == 0) selected @endif >Deleted</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">

                            <label for="limit">Limit</label>

                            <select class="form-control mb-3" aria-label="Default" name="limit">
                                <option selected value="5">5</option>
                                <option value="10" @if( isset(request()->limit) &&request()->limit == 10) selected @endif >10</option>
                                <option value="20" @if( isset(request()->limit) &&request()->limit == 20) selected @endif >20</option>
                                <option value="30" @if( isset(request()->limit) &&request()->limit == 30) selected @endif >30</option>
                                <option value="40" @if( isset(request()->limit) &&request()->limit == 40) selected @endif >40</option>
                                <option value="50" @if( isset(request()->limit) &&request()->limit == 50) selected @endif >50</option>
                                <option value="100" @if( isset(request()->limit) &&request()->limit == 100) selected @endif >100</option>
                            </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mb-3">
                                    <label for="order">Order By</label>
                                    <select class="form-control" aria-label="Default" name="order">
                                        <option selected value="DESC">Latest</option>
                                        <option value="ASC" @if( isset(request()->order) &&request()->order == 'ASC') selected @endif >Oldest</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">

                                <div class="form-group mb-3">
                                    <label for="from">From</label>
                                    <input  type="date" id="from" value="{{ request()->from }}" name="from" class="form-control search-docs" placeholder="From">

                                </div>
                            </div>


                            <div class="col-lg-4">

                                <div class="form-group mb-3">
                                    <label for="to">To</label>

                                    <input   type="date" id="to" value="{{ request()->to? request()->to : date('Y-m-d', time())  }}" name="to" class="form-control search-docs" placeholder="To">

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
                    <th class="border-gray-200">Title In Arabic</th>
                    <th class="border-gray-200">Title In English</th>
                    <th class="border-gray-200">Created At</th>
                    <th class="border-gray-200">Status</th>
                    <th class="border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Item -->

                @foreach ($halls as $hall)
                    <tr>
                        <td>{{ $hall->id }}</td>

                        <td>{{ $hall->title_ar }}</td>
                        <td>{{ $hall->title_en }}</td>


                        <td>
                            @if ($hall->created_at)
                                <p><i class="fas fa-calendar-week text-info"></i>
                                    {{ \Carbon\Carbon::parse($hall->created_at)->format('d/m/Y') }} </p>
                                <p><i class="fas fa-clock text-success"></i>
                                    {{ \Carbon\Carbon::parse($hall->created_at)->format('h:i:s A') }} </p>
                            @else
                                ...
                            @endif

                        </td>



                        <td>
                            @if ($hall->status)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">InActive</span>
                            @endif
                        </td>
                        <td>

                            {{-- actions --}}
                            <div class="d-flex  align-items-center justify-content-center flex-md-nowrap">


                                <div class="">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Show Details">
                                        <a href="{{ route('admin.halls.show' , $hall->id) }}" class="btn btn-info"><span class="fas fa-eye"></span></a>
                                    </div>
                                </div>

                                @if ($status == 'new')
                                    <div class="">
                                        @if (Auth::guard('admin')->user()->hasPermission('halls-update'))
                                            <a style="color: #fff" class="btn btn-success m-1" class="dropdown-item"
                                                href="{{ route('admin.hall_request.hall_request_accept', $hall->id) }}"
                                                title="Accept" data-bs-toggle="tooltip" data-bs-placement="top">
                                                Accept

                                            </a>
                                        @endif
                                    </div>

                                    <div class="">
                                        @if (Auth::guard('admin')->user()->hasPermission('halls-update'))
                                            <a style="color: #fff" class="btn btn-danger m-1" class="dropdown-item"
                                                href="{{ route('admin.hall_request.hall_request_reject', $hall->id) }}"
                                                title="Reject" data-bs-toggle="tooltip" data-bs-placement="top">
                                                Reject

                                            </a>
                                        @endif
                                    </div>
                                @endif






                            </div>
                            {{-- actions --}}






                        </td>





                        <div class="modal fade" id="modal-{{ $hall->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="modal-default" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="h6 modal-title">{{ $hall->title_en }}</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="wrapper m-auto">

                                            <div class="d-flex mb-2">
                                                <img class="model-img" src="{{ $hall->primary_image_url }}"
                                                    alt="{{ $hall->title_en }} Image">
                                            </div>

                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">Title In Arabic : {{ $hall->title_ar }} </li>
                                                <li class="list-group-item">Title In English : {{ $hall->title_en }} </li>
                                                <li class="list-group-item">Email: <a class="text-tertiary me-3"
                                                        href=" mailto:{{ $hall->email }}"> {{ $hall->email }}</a> </li>
                                                <li class="list-group-item">Phone Number : <a class="text-tertiary me-3"
                                                        href="tel:{{ $hall->phone }}">{{ $hall->phone }}</a> </li>
                                                <li class="list-group-item">Hall guests Full capacity : <span
                                                        class="badge bg-danger"> {{ $hall->guests_capacity }}</span>
                                                    guest</li>

                                                <li class="list-group-item">Views : <span class="badge bg-success">
                                                        {{ $hall->views }}</span>
                                                </li>





                                                <li class="list-group-item">Country :
                                                    @if ($hall->country)
                                                        <span class="badge bg-info">
                                                            <i class="fa-solid fa-flag text-danger"></i>
                                                            {{ $hall->country->title_en }}
                                                        </span>
                                                    @else
                                                        --
                                                    @endif

                                                </li>


                                                <li class="list-group-item">City :
                                                    @if ($hall->city)
                                                        <span class="badge bg-warning ">
                                                            <i class="fa-solid fa-city text-danger"></i>
                                                            {{ $hall->city->title_en }}
                                                        </span>
                                                    @else
                                                        --
                                                    @endif

                                                </li>

                                                <li class="list-group-item">Vendor :
                                                    @if ($hall->vendor)
                                                        <a class="btn btn-outline-primary"
                                                            href="{{ route('admin.vendors.index', ['vendor_id' => $hall->vendor->id]) }}">{{ $hall->vendor->title_en }}</a>
                                                    @else
                                                        --
                                                    @endif

                                                </li>

                                                <li class="list-group-item">Added By :


                                                    @if ($hall->admin)
                                                        @if ($hall->admin && $hall->admin->roles && $hall->admin->roles[0]->name == 'vendor-admin')
                                                            <a class="btn btn-outline-primary"
                                                                href="{{ route('admin.vendor-admins.index', ['admin_id' => $hall->admin->id]) }}">{{ $hall->admin->name }}</a>
                                                        @else
                                                            <a class="btn btn-outline-primary"
                                                                href="{{ route('admin.system-admins.index', ['admin_id' => $hall->admin->id]) }}">{{ $hall->admin->name }}</a>
                                                        @endif
                                                    @else
                                                        --
                                                    @endif


                                                </li>






                                                <li class="list-group-item">Status :
                                                    @if ($hall->status)
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-danger">InActive</span>
                                                    @endif
                                                </li>

                                                <li class="list-group-item">Added Date : <i
                                                        class="fas fa-calendar-week text-info"></i>
                                                    {{ \Carbon\Carbon::parse($hall->created_at)->format('d/m/Y') }} </li>
                                                <li class="list-group-item">Added Time : <i
                                                        class="fas fa-clock text-success"></i>
                                                    {{ \Carbon\Carbon::parse($hall->created_at)->format('h:i:s A') }}</li>

                                            </ul>
                                        </div>

                                    </div>
                                    <div class="modal-footer">


                                        {{-- @if (Auth::guard('admin')->user()->hasPermission('halls-update')) --}}


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
=======
>>>>>>> 211d721c3ef82e51a3d2067398967a033afbaa37
{{-- table --}}
<div class="card card-body border-0 shadow table-wrapper table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="border-gray-200">ID</th>
                <th class="border-gray-200">Title In Arabic</th>
                <th class="border-gray-200">Title In English</th>
                <th class="border-gray-200">Created At</th>
                <th class="border-gray-200">Status</th>
                <th class="border-gray-200">Action</th>
            </tr>
        </thead>
        <tbody >
            <!-- Item -->

            @foreach ($halls as $hall )
            <tr>
                <td>{{ $hall->id }}</td>

               <td>{{ $hall->title_ar }}</td>
               <td>{{ $hall->title_en }}</td>


               <td>
                   @if ($hall->created_at)
                   <p ><i class="fas fa-calendar-week text-info"></i> {{ \Carbon\Carbon::parse($hall->created_at)->format('d/m/Y')}} </p>
                   <p  ><i class="fas fa-clock text-success"></i> {{ \Carbon\Carbon::parse($hall->created_at)->format('h:i:s A')}} </p>

                   @else
                       ...
                   @endif

                </td>



                <td>
                    @if ($hall->status)
                    <span class="badge bg-success">Active</span>

                    @else
                    <span class="badge bg-danger">InActive</span>

                    @endif
                </td>
                <td>

                    {{-- actions --}}
                    <div class="d-flex  align-items-center justify-content-center flex-md-nowrap">


                        <div class="">
                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Show Details">
                                <button class="btn btn-primary  m-1" data-bs-toggle="modal"
                                    data-bs-target="#modal-{{ $hall->id }}" class=""><span
                                        class="fas fa-eye "></span>
                                </button>
                            </div>
                        </div>

                        @if ($status == 'new')
                            <div class="">
                                @if (Auth::guard('admin')->user()->hasPermission('products-update'))
                                    <a class="btn btn-success m-1" class="dropdown-item"
                                        href="{{ route('admin.hall_request.hall_request_accept', $hall->id) }}" title="Edit"
                                        data-bs-toggle="tooltip" data-bs-placement="top">
                                        accept

                                    </a>
                                @endif
                            </div>

                            <div class="">
                                @if (Auth::guard('admin')->user()->hasPermission('products-update'))
                                    <a class="btn btn-danger m-1" class="dropdown-item"
                                        href="{{ route('admin.hall_request.hall_request_reject', $hall->id) }}" title="Edit"
                                        data-bs-toggle="tooltip" data-bs-placement="top">
                                        Reject

                                    </a>
                                @endif
                            </div>
                        @endif






                    </div>
                    {{-- actions --}}






                </td>
              




                <div class="modal fade" id="modal-{{ $hall->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="h6 modal-title">{{ $hall->title_en }}</h2>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="wrapper m-auto">

                                    <div class="d-flex mb-2">
                                        <img class="model-img" src="{{ $hall->primary_image_url }}" alt="{{ $hall->title_en }} Image">
                                    </div>

                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Title In Arabic : {{ $hall->title_ar }} </li>
                                        <li class="list-group-item">Title In English : {{ $hall->title_en }} </li>
                                        <li class="list-group-item">Email: <a class="text-tertiary me-3" href=" mailto:{{ $hall->email }}"> {{ $hall->email }}</a> </li>
                                        <li class="list-group-item">Phone Number : <a class="text-tertiary me-3" href="tel:{{ $hall->phone }}">{{ $hall->phone }}</a> </li>
                                        <li class="list-group-item">Hall guests  Full capacity  : <span class="badge bg-danger"> {{ $hall->guests_capacity }}</span>
                                            guest</li>

                                            <li class="list-group-item">Views : <span class="badge bg-success"> {{ $hall->views }}</span>
                                                </li>





                                        <li class="list-group-item">Country :
                                            @if ($hall->country)


                                            <span class="badge bg-info">
                                                <i class="fa-solid fa-flag text-danger"></i>
                                                {{ $hall->country->title_en }}
                                            </span>

                                            @else
                                                --
                                            @endif

                                        </li>


                                        <li class="list-group-item">City :
                                            @if ($hall->city)


                                            <span class="badge bg-warning ">
                                                <i class="fa-solid fa-city text-danger"></i>
                                                {{ $hall->city->title_en }}
                                            </span>

                                            @else
                                                --
                                            @endif

                                        </li>

                                        <li class="list-group-item">Vendor :
                                            @if ($hall->vendor)


                                                <a class="btn btn-outline-primary" href="{{ route('admin.vendors.index' ,[ 'vendor_id'=>$hall->vendor->id ] )}}">{{ $hall->vendor->title_en }}</a>


                                            @else
                                                --
                                            @endif

                                        </li>

                                        <li class="list-group-item">Added By :


                                            @if ($hall->admin)

                                            @if ($hall->admin && $hall->admin->roles && $hall->admin->roles[0]->name =='vendor-admin')

                                            <a class="btn btn-outline-primary" href="{{ route('admin.vendor-admins.index' ,[ 'admin_id'=>$hall->admin->id ] )}}">{{ $hall->admin->name }}</a>

                                            @else
                                            <a class="btn btn-outline-primary" href="{{ route('admin.system-admins.index' ,[ 'admin_id'=>$hall->admin->id ] )}}">{{ $hall->admin->name }}</a>

                                            @endif
                                            @else
                                                --
                                            @endif


                                        </li>






                                        <li class="list-group-item">Status :
                                            @if ($hall->status)
                                            <span class="badge bg-success">Active</span>

                                            @else
                                            <span class="badge bg-danger">InActive</span>

                                            @endif
                                        </li>

                                        <li class="list-group-item">Added Date :  <i class="fas fa-calendar-week text-info"></i> {{ \Carbon\Carbon::parse($hall->created_at)->format('d/m/Y')}}  </li>
                                        <li class="list-group-item">Added Time : <i class="fas fa-clock text-success"></i> {{ \Carbon\Carbon::parse($hall->created_at)->format('h:i:s A')}}</li>

                                    </ul>
                                </div>

                            </div>
                            <div class="modal-footer">


                                {{-- @if (Auth::guard('admin')->user()->hasPermission('halls-update')) --}}
                              

                                {{-- @endif --}}

                                {{-- <button type="button" class="btn btn-secondary">Accept</button> --}}


                                <button type="button" class="btn btn-link text-gray ms-auto" data-bs-dismiss="modal">Close</button>
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
            {!! $halls->appends(request()->query())->links('pagination::bootstrap-5') !!}



        </div>

        @if ($halls->count() < 1)
            <div class="d-flex justify-content-center" style="min-height: 300px">
                Empty
            </div>
        @endif
    </div>

    {{-- table --}}
=======
>>>>>>> 211d721c3ef82e51a3d2067398967a033afbaa37
        </tbody>
    </table>
    <div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
        {!! $halls->appends(request()->query())->links('pagination::bootstrap-5')!!}



    </div>

    @if ( $halls->count()< 1)
    <div class="d-flex justify-content-center" style="min-height: 300px">
        Empty
    </div>
@endif
</div>

{{-- table --}}
 
@endsection
