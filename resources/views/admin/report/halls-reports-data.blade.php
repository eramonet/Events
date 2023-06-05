@extends('layouts.admin.master')
@section('title')
    Halls Report
@endsection
@section('content')
    <div class="py-4">

        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4"> <i class="fa fa-house"></i> Halls Report </h1>

            </div>
          

        </div>
    </div>
   

     
    </div>

<div class="row">
        <div class="col-12 col-xl-12">
            <div class="row">


                {{-- latest users --}}

                <div class="col-12 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h2 class="fs-5 fw-bold mb-0">Last 20 Halls</h2>
                                </div>
                               
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                    <th class="border-gray-200">ID</th>
             
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

                    <div class="btn-group">
                        <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="icon icon-sm">
                                <span class="fas fa-ellipsis-h icon-dark"></span>
                            </span>
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu py-0">
                            <button data-bs-toggle="modal" data-bs-target="#modal-{{ $hall->id }}" class="dropdown-item rounded-top" ><span class="fas fa-eye me-2"></span>View Details</button>

                            {{-- @if (Auth::guard('admin')->user()->hasPermission('halls-update')) --}}
                            <a class="dropdown-item" href="{{ route('admin.halls.edit', $hall->id) }}"><span class="fas fa-edit me-2"></span>Edit</a>

                            {{-- @endif --}}


                            @if ($hall->deleted_at)
                            {{-- @if (Auth::guard('admin')->user()->hasPermission('halls-update')) --}}
                            <form  action="{{ route('admin.halls.restore', $hall->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="dropdown-item text-success rounded-bottom">
                                    <span class="fa-solid fa-trash-can-arrow-up me-2"></span>Restore
                                </button>
                            </form>

                            {{-- @endif --}}
                            @else
                            {{-- @if (Auth::guard('admin')->user()->hasPermission('halls-delete')) --}}
                            <form class="delete-btn" action="{{ route('admin.halls.destroy', $hall->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dropdown-item text-danger rounded-bottom">
                                    <span class="fas fa-trash-alt me-2"></span>Delete
                                </button>
                            </form>

                            {{-- @endif --}}
                            @endif





                        </div>
                    </div>


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
                                <a class="btn btn-primary" href="{{ route('admin.halls.edit', $hall->id) }}"><span class="fas fa-edit me-2"></span>Edit</a>

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
                        </div>
                    </div>
                </div>
                {{-- latest users --}}


            </div>
        </div>

    </div>



    </div>


<div class="row">
        <div class="col-12 col-xl-12">
            <div class="row">


                {{-- latest users --}}

                <div class="col-12 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h2 class="fs-5 fw-bold mb-0">Last 20 Active Halls</h2>
                                </div>
                               
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                   <th class="border-gray-200">ID</th>
             
                <th class="border-gray-200">Title In English</th>
                <th class="border-gray-200">Created At</th>
                <th class="border-gray-200">Status</th>
                <th class="border-gray-200">Action</th>
                                    </tr>
                                </thead>
                                 <tbody >
            <!-- Item -->

            @foreach ($hallsActive as $hall )
            <tr>
                <td>{{ $hall->id }}</td>

              
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

                    <div class="btn-group">
                        <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="icon icon-sm">
                                <span class="fas fa-ellipsis-h icon-dark"></span>
                            </span>
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu py-0">
                            <button data-bs-toggle="modal" data-bs-target="#modal-{{ $hall->id }}" class="dropdown-item rounded-top" ><span class="fas fa-eye me-2"></span>View Details</button>

                            {{-- @if (Auth::guard('admin')->user()->hasPermission('halls-update')) --}}
                            <a class="dropdown-item" href="{{ route('admin.halls.edit', $hall->id) }}"><span class="fas fa-edit me-2"></span>Edit</a>

                            {{-- @endif --}}


                            @if ($hall->deleted_at)
                            {{-- @if (Auth::guard('admin')->user()->hasPermission('halls-update')) --}}
                            <form  action="{{ route('admin.halls.restore', $hall->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="dropdown-item text-success rounded-bottom">
                                    <span class="fa-solid fa-trash-can-arrow-up me-2"></span>Restore
                                </button>
                            </form>

                            {{-- @endif --}}
                            @else
                            {{-- @if (Auth::guard('admin')->user()->hasPermission('halls-delete')) --}}
                            <form class="delete-btn" action="{{ route('admin.halls.destroy', $hall->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dropdown-item text-danger rounded-bottom">
                                    <span class="fas fa-trash-alt me-2"></span>Delete
                                </button>
                            </form>

                            {{-- @endif --}}
                            @endif





                        </div>
                    </div>


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
                                <a class="btn btn-primary" href="{{ route('admin.halls.edit', $hall->id) }}"><span class="fas fa-edit me-2"></span>Edit</a>

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
                        </div>
                    </div>
                </div>
                {{-- latest users --}}


            </div>
        </div>

    </div>



    </div>










<div class="row">
        <div class="col-12 col-xl-12">
            <div class="row">


                {{-- latest users --}}

                <div class="col-12 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h2 class="fs-5 fw-bold mb-0">Last 20 UnActive Halls</h2>
                                </div>
                               
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                    <th class="border-gray-200">ID</th>
             
                <th class="border-gray-200">Title In English</th>
                <th class="border-gray-200">Created At</th>
                <th class="border-gray-200">Status</th>
                <th class="border-gray-200">Action</th>
                                    </tr>
                                </thead>
                                   <tbody >
            <!-- Item -->

            @foreach ($hallsUnActive as $hall )
            <tr>
                <td>{{ $hall->id }}</td>

              
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

                    <div class="btn-group">
                        <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="icon icon-sm">
                                <span class="fas fa-ellipsis-h icon-dark"></span>
                            </span>
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu py-0">
                            <button data-bs-toggle="modal" data-bs-target="#modal-{{ $hall->id }}" class="dropdown-item rounded-top" ><span class="fas fa-eye me-2"></span>View Details</button>

                            {{-- @if (Auth::guard('admin')->user()->hasPermission('halls-update')) --}}
                            <a class="dropdown-item" href="{{ route('admin.halls.edit', $hall->id) }}"><span class="fas fa-edit me-2"></span>Edit</a>

                            {{-- @endif --}}


                            @if ($hall->deleted_at)
                            {{-- @if (Auth::guard('admin')->user()->hasPermission('halls-update')) --}}
                            <form  action="{{ route('admin.halls.restore', $hall->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="dropdown-item text-success rounded-bottom">
                                    <span class="fa-solid fa-trash-can-arrow-up me-2"></span>Restore
                                </button>
                            </form>

                            {{-- @endif --}}
                            @else
                            {{-- @if (Auth::guard('admin')->user()->hasPermission('halls-delete')) --}}
                            <form class="delete-btn" action="{{ route('admin.halls.destroy', $hall->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dropdown-item text-danger rounded-bottom">
                                    <span class="fas fa-trash-alt me-2"></span>Delete
                                </button>
                            </form>

                            {{-- @endif --}}
                            @endif





                        </div>
                    </div>


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
                                <a class="btn btn-primary" href="{{ route('admin.halls.edit', $hall->id) }}"><span class="fas fa-edit me-2"></span>Edit</a>

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
                        </div>
                    </div>
                </div>
                {{-- latest users --}}


            </div>
        </div>

    </div>



    </div>





 



    </div>

@endsection




@section('scripts')
    <!-- ChartJS -->
    {{-- <script src={{ asset('dashboard/js/plugin/Chart.min.js') }}></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://www.gstatic.com/firebasejs/8.10.1/firebase.js"></script>
    <script>
        var firebaseConfig = {
            apiKey: "AIzaSyBOUb8GvhXA6EPyGH5hDvEeHao9V6rfriE",
            authDomain: "events-73956.firebaseapp.com",
            projectId: "events-73956",
            storageBucket: "events-73956.appspot.com",
            messagingSenderId: "321122743257",
            appId: "1:321122743257:web:6e28abd35a11888f6f5fc8",
            measurementId: "G-ZW7E04G5ZF",
        };
        firebase.initializeApp(firebaseConfig);
        const messaging = firebase.messaging();
        console.log('script')
        let csrf = `{{ csrf_token() }}`

        function startFCM() {
            console.log('STARTFCM')
            messaging.requestPermission().then(() => {
                return messaging.getToken({
                    vapidKey: 'BMJEW2gMO0QC05QwvLTq8KsF8RcHNGIVWLvAzK-Y9EepXKxe9ZfycMg3qvc4Ajq1kMmaawrMm6plMvt3FZhZ-FI'
                })
            }).then(function(response) {
                console.log(response, 'test')
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': csrf,
                    }
                });
                $.ajax({
                    url: '{{ route('admin.updateAdminToken') }}',
                    type: 'POST',
                    data: {
                        token: response
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        // alert('Token stored.');
                    },
                    error: function(error) {
                        console.log('error', error)
                        // alert(error);
                    },
                });
            }).catch(function(error) {
                console.log('error catch', error)
                // alert(error);
            });
        }
        // messaging.getToken( {vapidKey: 'BPVvFQt3edIpTAp9C0-osAs_SSWzlqno6QT-pA4nbHWYplEGUgbdeOL1ooQz9FGlnCwrdJmMttJnpzoxNauZkls'})
        //     .then((currentToken) => {
        //
        //         if (currentToken) {
        //             console.log(updateTokenAPI,currentToken,csrfToken)
        //             // console.log('current token for client: ', currentToken);
        //             // Perform any other neccessary action with the token
        //             $.ajax({
        //                     url:updateTokenAPI,
        //                     method: 'post',
        //                     data: {
        //                         "_token":csrfToken,
        //                         "firebaseToken": currentToken
        //                     },
        //                     headers:{
        //                         "Accept":"application/json",
        //                         "X-CSRF-TOKEN":csrfToken
        //                     },
        //                     dataType:"json",
        //                     success:function(data){
        //                         console.log(data)
        //                     }
        //                 }
        //             )
        //             console.log('ajax called')
        //         } else {
        //             // Show permission request UI
        //             console.log('No registration token available. Request permission to generate one.');
        //         }
        //     })
        //     .catch((err) => {
        //         console.log('An error occurred while retrieving token. ', err);
        //     });


        startFCM();
        messaging.onMessage(function(payload) {
            // console.log(payload, 'notificationOnMessage')
            $('.notificationCounter').html(parseInt($('.notificationCounter').html()) + 1)
            // const title = payload.notification.title;
            // const options = {
            //     body: payload.notification.body,
            //     icon: payload.notification.icon,
            // };
            // new Notification(title, options);
            var audio = document.createElement("AUDIO")
            document.body.appendChild(audio);
            audio.src = "{{ asset('assets/dashboard/sound/mixkit-bell-notification-933.wav') }}"
            // audio.play();
            audio.addEventListener("canplaythrough", () => {
                audio.play().catch(e => {

                    window.addEventListener('click', () => {
                        audio.play()
                    }, {
                        once: true
                    })
                })
            });
        });
    </script>


    <script>
        function read() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });
            $.get("update", function(status, xhr) {
                document.getElementById("badge").classList.remove('badge-danger');
                console.log("success");
            })
        }
    </script>

    <script>
        // currentMonthIncomFromProducts
        let currentMonthIncomFromProductsCTX = document.getElementById("productsIncome");



        const currentMonthIncomFromProductsData = {
            labels: ['1 Jan', '2 Jan', '3 Jan', '4 Jan', '5 Jan', '6 Jan', '7 Jan', '8 Jan', '9 Jan', '10 Jan',
                '11 Jan', '12 Jan', '13 Jan', '14 Jan', '15 Jan', '16 Jan', '17 Jan', '18 Jan', '19 Jan', '20 Jan',
                '21 Jan', '22 Jan', '23 Jan', '24 Jan', '25 Jan', '26 Jan', '27 Jan', '28 Jan', '29 Jan', '30 Jan'
            ],
            datasets: [{
                label: 'AED',
                data: ['20000', '40000', '60000', '10000', '60000', '50000', '90000', '11000', '14000', '22000',
                    '12000', '23000', '30000', '40000', '22000', '33000', '21000', '20000', '40000',
                    '60000', '10000', '60000', '50000', '90000', '11000', '14000', '22000', '12000',
                    '23000', '30000', '40000', '22000', '33000', '21000', "1000"
                ],

                //   pointStyle: 'star',
                //   pointRadius: 10,
                //   pointHoverRadius: 15
            }]
        };
        const currentMonthIncomFromProductsConfig = {
            type: 'line',
            data: currentMonthIncomFromProductsData,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: (currentMonthIncomFromProductsCTX) =>
                            'Current Month Total Income From Products Is 910,500,00 AED',
                    }
                }
            }
        };

        new Chart(currentMonthIncomFromProductsCTX, currentMonthIncomFromProductsConfig);

        // currentMonthIncomFromProducts


        // currentMonthIncomFromBookings
        let currentMonthIncomFromBookingsCTX = document.getElementById("bookinksIncome");



        const currentMonthIncomFromBookingsData = {
            labels: ['1 Jan', '2 Jan', '3 Jan', '4 Jan', '5 Jan', '6 Jan', '7 Jan', '8 Jan', '9 Jan', '10 Jan',
                '11 Jan', '12 Jan', '13 Jan', '14 Jan', '15 Jan', '16 Jan', '17 Jan', '18 Jan', '19 Jan', '20 Jan',
                '21 Jan', '22 Jan', '23 Jan', '24 Jan', '25 Jan', '26 Jan', '27 Jan', '28 Jan', '29 Jan', '30 Jan'
            ],
            datasets: [{
                label: 'AED',
                data: ['30000', '50000', '80000', '20000', '20000', '10000', '20000', '18000', '11000', '29000',
                    '11000', '23000', '10000', '90000', '29000', '35000', '3000', '30000', '50000', '80000',
                    '20000', '20000', '10000', '20000', '18000', '11000', '29000', '11000', '23000',
                    '10000', '90000', '29000', '35000', '3000'
                ],

                //   pointStyle: 'circle',
                //   pointRadius: 10,
                //   pointHoverRadius: 15,

                backgroundColor: [
                    '#0d6efd',
                    '#0dcaf0',
                    '#2ecc71',
                    '#dc3545',
                ]
            }]
        };
        const currentMonthIncomFromBookingsConfig = {
            type: 'line',
            data: currentMonthIncomFromBookingsData,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: (currentMonthIncomFromBookingsCTX) =>
                            'Current Month Total Income From Bookings Is 1,110,500,00  AED',
                    }
                }
            }
        };

        new Chart(currentMonthIncomFromBookingsCTX, currentMonthIncomFromBookingsConfig);

        // currentMonthIncomFromProducts




        // currentMonthOrders
        let currentMonthOrdersCTX = document.getElementById("ordersChart");

        const currentMonthOrdersData = {
            labels: ['1 Jan', '2 Jan', '3 Jan', '4 Jan', '5 Jan', '6 Jan', '7 Jan', '8 Jan', '9 Jan', '10 Jan',
                '11 Jan', '12 Jan', '13 Jan', '14 Jan', '15 Jan', '16 Jan', '17 Jan', '18 Jan', '19 Jan', '20 Jan',
                '21 Jan', '22 Jan', '23 Jan', '24 Jan', '25 Jan', '26 Jan', '27 Jan', '28 Jan', '29 Jan', '30 Jan'
            ],
            datasets: [{
                label: 'Orders',
                data: ['200', '400', '600', '100', '600', '500', '900', '100', '400', '300', '800', '900',
                    '1000', '1200', '2000', '300', '2200', '200', '400', '600', '100', '600', '500', '900',
                    '100', '400', '300', '800', '900', '1000', '1200', '2000', '300', '2200'
                ],

                pointStyle: 'circle',
                pointRadius: 10,
                pointHoverRadius: 15
            }]
        };
        const currentMonthOrdersConfig = {
            type: 'bar',
            data: currentMonthOrdersData,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: (ctx) => 'Current Month  Total Orders Is 2,510,00 ',
                    }
                }
            }
        };

        new Chart(currentMonthOrdersCTX, currentMonthOrdersConfig);

        // currentMonthOrders
        // product chart

        let ctx3 = document.getElementById("productsChart");

        const data3 = {
            labels: ['In Stock', 'Out Of Stock', ],
            datasets: [{
                label: 'Products',
                data: ['1800', '1200'],

                pointStyle: 'circle',
                pointRadius: 10,
                pointHoverRadius: 15
            }]
        };
        const config3 = {
            type: 'pie',
            data: data3,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: (ctx) => 'Total Products Is 3,000,00 Product ',
                    }
                }
            }

        };
        new Chart(ctx3, config3);
        // product chart

        // ordersStatusChart


        let ctx4 = document.getElementById("ordersStatusChart");

        const data4 = {
            labels: ['New', 'Inprogress', 'Delivered', 'Cancelled'],
            datasets: [{
                label: 'Order',
                data: ['999', '992', '5000', '99'],

                pointStyle: 'circle',
                pointRadius: 10,
                pointHoverRadius: 15,
                backgroundColor: [
                    '#0d6efd',
                    '#0dcaf0',
                    '#2ecc71',
                    '#dc3545',
                ]

            }]
        };
        const config4 = {
            type: 'pie',
            data: data4,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: (ctx) => 'Total Orders Is 3,000,00 Order ',
                    },

                }
            }

        };
        new Chart(ctx4, config4);

        // ordersStatusChart
    </script>
@endsection
