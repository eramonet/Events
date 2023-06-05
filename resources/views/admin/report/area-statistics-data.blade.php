@extends('layouts.admin.master')
@section('title')
    Area Statistics
@endsection
@section('content')
    <div class="py-4">

        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4"> <i class="fa fa-house"></i> Area Statistics </h1>

            </div>
          

        </div>
    </div>

    <div class="row dashboard-home-top">


        @php
            $colores = collect(['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'tertiary']);

        @endphp

        <div class="col-12 col-sm-6 col-xl-3 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                <i class="fas fa-users icon"></i>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="h5">All Users</h2>

                                <div class="fw-extrabold mb-1"> <a href="#">{{ $allUsersCount }}</a></div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">All Users</h2>
                                <div class="fw-extrabold mb-1">{{ $allUsersCount }}</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12 col-sm-6 col-xl-3 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                <i class="fas fa-users icon"></i>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="h5">All Male Users</h2>

                                <div class="fw-extrabold mb-1"> <a href="#">{{ $allMaleUsersCount }}</a></div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">All Male Users</h2>
                                <div class="fw-extrabold mb-1">{{ $allMaleUsersCount }}</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                <i class="fas fa-users icon"></i>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="h5">All Female Users</h2>

                                <div class="fw-extrabold mb-1"> <a href="#">{{ $allFemaleUsersCount }}</a></div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">All Female Users</h2>
                                <div class="fw-extrabold mb-1">{{ $allFemaleUsersCount }}</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                <i class="fas fa-users icon"></i>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="h5">All Users Registered From Web</h2>

                                <div class="fw-extrabold mb-1"> <a href="#">{{ $allWebUsersCount }}</a></div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">All Users Registered From Web</h2>
                                <div class="fw-extrabold mb-1">{{ $allWebUsersCount }}</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                <i class="fas fa-users icon"></i>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="h5">All Users Registered From Android</h2>

                                <div class="fw-extrabold mb-1"> <a href="#">{{ $allAdnoidUsersCount }}</a></div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">All Users Registered From Android</h2>
                                <div class="fw-extrabold mb-1">{{ $allAdnoidUsersCount }}</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                <i class="fas fa-users icon"></i>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="h5">All Users Registered From Ios</h2>

                                <div class="fw-extrabold mb-1"> <a href="#">{{ $allIosUsersCount }}</a></div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">All Users Registered From Ios</h2>
                                <div class="fw-extrabold mb-1">{{ $allIosUsersCount }}</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

   <div class="col-12 col-sm-6 col-xl-3 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                <i class="fas fa-users icon"></i>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="h5">All Regions Of City</h2>

                                <div class="fw-extrabold mb-1"> <a href="#">{{ $regionsCount }}</a></div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">All Regions Of City</h2>
                                <div class="fw-extrabold mb-1">{{ $regionsCount }}</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


  <div class="col-12 col-sm-6 col-xl-3 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                <i class="fas fa-users icon"></i>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="h5">All Products Of City</h2>

                                <div class="fw-extrabold mb-1"> <a href="#">{{ $productsCount }}</a></div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">All Products Of City</h2>
                                <div class="fw-extrabold mb-1">{{ $productsCount }}</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


 <div class="col-12 col-sm-6 col-xl-3 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                <i class="fas fa-users icon"></i>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="h5">All Halls Of City</h2>

                                <div class="fw-extrabold mb-1"> <a href="#">{{ $hallsCount }}</a></div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">All Halls Of City</h2>
                                <div class="fw-extrabold mb-1">{{ $hallsCount }}</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

<div class="col-12 col-sm-6 col-xl-3 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                <i class="fas fa-users icon"></i>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="h5">All Orders Of City</h2>

                                <div class="fw-extrabold mb-1"> <a href="#">{{ $ordersCount }}</a></div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">All Orders Of City</h2>
                                <div class="fw-extrabold mb-1">{{ $ordersCount }}</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                <i class="fas fa-users icon"></i>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="h5">All Vendors Of City</h2>

                                <div class="fw-extrabold mb-1"> <a href="#">{{ $vendorsCount }}</a></div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">All Vendors Of City</h2>
                                <div class="fw-extrabold mb-1">{{ $vendorsCount }}</div>
                            </div>

                        </div>
                    </div>
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
                                    <h2 class="fs-5 fw-bold mb-0">Latest 20 Users</h2>
                                </div>
                                <div class="col text-end">
                                    <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-primary">See
                                        All Users</a>

                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="border-bottom" scope="col">User Name</th>
                                        <th class="border-bottom" scope="col">User Phone</th>

                                        <th class="border-bottom" scope="col"> Register Date</th>
                                        <th class="border-bottom" scope="col">Show</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lastTweentyUsers as $user)
                                        <tr>
                                            <th class="text-gray-900" scope="row">
                                                {{ $user->name }}
                                            </th>
                                            <th class="text-gray-900" scope="row">
                                                {{ $user->phone }}
                                            </th>
                                            <td class="fw-bolder text-gray-500 ">


                                                <span class="d-block text-nowrap"><i
                                                        class="fas fa-calendar-Month text-info"></i>
                                                    {{ $user->created_at }}</span>


                                            </td>

                                            <td class="fw-bolder text-gray-500">
                                                <div class="">
                                                    <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Show Details">
                                                        <button class="btn btn-primary  m-1" data-bs-toggle="modal"
                                                            data-bs-target="#modal-{{ $user->id }}"
                                                            class=""><span class="fas fa-eye "></span>
                                                        </button>
                                                    </div>
                                                </div>

                                            </td>
                                            <div class="modal fade" id="modal-{{ $user->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h2 class="h6 modal-title">{{ $user->name }}</h2>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="wrapper m-auto">
                                                                <div class="d-flex mb-2">
                                                                    <img class="model-img" src="{{ $user->image_url }}"
                                                                        alt="{{ $user->name }} Image">
                                                                </div>
                                                                <ul class="list-group list-group-flush">
                                                                    <li class="list-group-item">Name :
                                                                        {{ $user->name }} </li>
                                                                    <li class="list-group-item">Email :
                                                                        {{ $user->email }} </li>
                                                                    <li class="list-group-item">Phone :
                                                                        {{ $user->phone }}</li>
                                                                    <li class="list-group-item">Gender :
                                                                        <span class="badge bg-primary">
                                                                            <i
                                                                                class="fa-solid fa-venus-mars text-danger"></i>
                                                                            {{ ucfirst($user->gender) }}
                                                                        </span>

                                                                    </li>
                                                                    <li class="list-group-item">Country :
                                                                        @if ($user->country)
                                                                            <span class="badge bg-info">
                                                                                <i
                                                                                    class="fa-solid fa-flag text-danger"></i>
                                                                                {{ $user->country->title_en }}
                                                                            </span>
                                                                        @else
                                                                            --
                                                                        @endif

                                                                    </li>


                                                                    <li class="list-group-item">City :
                                                                        @if ($user->city)
                                                                            <span class="badge bg-warning ">
                                                                                <i
                                                                                    class="fa-solid fa-city text-danger"></i>
                                                                                {{ $user->city->title_en }}
                                                                            </span>
                                                                        @else
                                                                            --
                                                                        @endif

                                                                    </li>



                                                                    <li class="list-group-item">Sign Up From :
                                                                        <span
                                                                            class="badge bg-primary">{{ strtoupper($user->sign_from) }}</span>
                                                                    </li>

                                                                    <li class="list-group-item">Status :
                                                                        @if ($user->status)
                                                                            <span class="badge bg-success">Active</span>
                                                                        @else
                                                                            <span class="badge bg-danger">InActive</span>
                                                                        @endif
                                                                    </li>

                                                                    <li class="list-group-item">Added Date : <i
                                                                            class="fas fa-calendar-Month text-info"></i>
                                                                        {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}
                                                                    </li>
                                                                    <li class="list-group-item">Added Time : <i
                                                                            class="fas fa-clock text-success"></i>
                                                                        {{ \Carbon\Carbon::parse($user->created_at)->format('h:i:s A') }}
                                                                    </li>

                                                                </ul>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">


                                                            @if (Auth::guard('admin')->user()->hasPermission('users-update'))
                                                                <a class="btn btn-primary"
                                                                    href="{{ route('admin.users.edit', $user->id) }}"><span
                                                                        class="fas fa-edit me-2"></span>Edit</a>
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


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- latest users --}}


                {{-- latest users --}}

                <div class="col-12 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h2 class="fs-5 fw-bold mb-0">Latest 20 Male Users</h2>
                                </div>
                                


                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="border-bottom" scope="col">User Name</th>
                                        <th class="border-bottom" scope="col">User Phone</th>

                                        <th class="border-bottom" scope="col"> Register Date</th>
                                        <th class="border-bottom" scope="col">Show</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lastTweentyMaleUsers as $user)
                                        <tr>
                                            <th class="text-gray-900" scope="row">
                                                {{ $user->name }}
                                            </th>
                                            <th class="text-gray-900" scope="row">
                                                {{ $user->phone }}
                                            </th>
                                            <td class="fw-bolder text-gray-500 ">


                                                <span class="d-block text-nowrap"><i
                                                        class="fas fa-calendar-Month text-info"></i>
                                                    {{ $user->created_at }}</span>


                                            </td>

                                            <td class="fw-bolder text-gray-500">
                                                <div class="">
                                                    <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Show Details">
                                                        <button class="btn btn-primary  m-1" data-bs-toggle="modal"
                                                            data-bs-target="#modal-{{ $user->id }}"
                                                            class=""><span class="fas fa-eye "></span>
                                                        </button>
                                                    </div>
                                                </div>

                                            </td>
                                            <div class="modal fade" id="modal-{{ $user->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h2 class="h6 modal-title">{{ $user->name }}</h2>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="wrapper m-auto">
                                                                <div class="d-flex mb-2">
                                                                    <img class="model-img" src="{{ $user->image_url }}"
                                                                        alt="{{ $user->name }} Image">
                                                                </div>
                                                                <ul class="list-group list-group-flush">
                                                                    <li class="list-group-item">Name :
                                                                        {{ $user->name }} </li>
                                                                    <li class="list-group-item">Email :
                                                                        {{ $user->email }} </li>
                                                                    <li class="list-group-item">Phone :
                                                                        {{ $user->phone }}</li>
                                                                    <li class="list-group-item">Gender :
                                                                        <span class="badge bg-primary">
                                                                            <i
                                                                                class="fa-solid fa-venus-mars text-danger"></i>
                                                                            {{ ucfirst($user->gender) }}
                                                                        </span>

                                                                    </li>
                                                                    <li class="list-group-item">Country :
                                                                        @if ($user->country)
                                                                            <span class="badge bg-info">
                                                                                <i
                                                                                    class="fa-solid fa-flag text-danger"></i>
                                                                                {{ $user->country->title_en }}
                                                                            </span>
                                                                        @else
                                                                            --
                                                                        @endif

                                                                    </li>


                                                                    <li class="list-group-item">City :
                                                                        @if ($user->city)
                                                                            <span class="badge bg-warning ">
                                                                                <i
                                                                                    class="fa-solid fa-city text-danger"></i>
                                                                                {{ $user->city->title_en }}
                                                                            </span>
                                                                        @else
                                                                            --
                                                                        @endif

                                                                    </li>



                                                                    <li class="list-group-item">Sign Up From :
                                                                        <span
                                                                            class="badge bg-primary">{{ strtoupper($user->sign_from) }}</span>
                                                                    </li>

                                                                    <li class="list-group-item">Status :
                                                                        @if ($user->status)
                                                                            <span class="badge bg-success">Active</span>
                                                                        @else
                                                                            <span class="badge bg-danger">InActive</span>
                                                                        @endif
                                                                    </li>

                                                                    <li class="list-group-item">Added Date : <i
                                                                            class="fas fa-calendar-Month text-info"></i>
                                                                        {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}
                                                                    </li>
                                                                    <li class="list-group-item">Added Time : <i
                                                                            class="fas fa-clock text-success"></i>
                                                                        {{ \Carbon\Carbon::parse($user->created_at)->format('h:i:s A') }}
                                                                    </li>

                                                                </ul>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">


                                                            @if (Auth::guard('admin')->user()->hasPermission('users-update'))
                                                                <a class="btn btn-primary"
                                                                    href="{{ route('admin.users.edit', $user->id) }}"><span
                                                                        class="fas fa-edit me-2"></span>Edit</a>
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


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- latest users --}}


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
                                    <h2 class="fs-5 fw-bold mb-0">Latest 20 Female Users</h2>
                                </div>
                              

                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="border-bottom" scope="col">User Name</th>
                                        <th class="border-bottom" scope="col">User Phone</th>

                                        <th class="border-bottom" scope="col"> Register Date</th>
                                        <th class="border-bottom" scope="col">Show</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lastTweentyFemaleUsers as $user)
                                        <tr>
                                            <th class="text-gray-900" scope="row">
                                                {{ $user->name }}
                                            </th>
                                            <th class="text-gray-900" scope="row">
                                                {{ $user->phone }}
                                            </th>
                                            <td class="fw-bolder text-gray-500 ">


                                                <span class="d-block text-nowrap"><i
                                                        class="fas fa-calendar-Month text-info"></i>
                                                    {{ $user->created_at }}</span>


                                            </td>

                                            <td class="fw-bolder text-gray-500">
                                                <div class="">
                                                    <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Show Details">
                                                        <button class="btn btn-primary  m-1" data-bs-toggle="modal"
                                                            data-bs-target="#modal-{{ $user->id }}"
                                                            class=""><span class="fas fa-eye "></span>
                                                        </button>
                                                    </div>
                                                </div>

                                            </td>
                                            <div class="modal fade" id="modal-{{ $user->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h2 class="h6 modal-title">{{ $user->name }}</h2>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="wrapper m-auto">
                                                                <div class="d-flex mb-2">
                                                                    <img class="model-img" src="{{ $user->image_url }}"
                                                                        alt="{{ $user->name }} Image">
                                                                </div>
                                                                <ul class="list-group list-group-flush">
                                                                    <li class="list-group-item">Name :
                                                                        {{ $user->name }} </li>
                                                                    <li class="list-group-item">Email :
                                                                        {{ $user->email }} </li>
                                                                    <li class="list-group-item">Phone :
                                                                        {{ $user->phone }}</li>
                                                                    <li class="list-group-item">Gender :
                                                                        <span class="badge bg-primary">
                                                                            <i
                                                                                class="fa-solid fa-venus-mars text-danger"></i>
                                                                            {{ ucfirst($user->gender) }}
                                                                        </span>

                                                                    </li>
                                                                    <li class="list-group-item">Country :
                                                                        @if ($user->country)
                                                                            <span class="badge bg-info">
                                                                                <i
                                                                                    class="fa-solid fa-flag text-danger"></i>
                                                                                {{ $user->country->title_en }}
                                                                            </span>
                                                                        @else
                                                                            --
                                                                        @endif

                                                                    </li>


                                                                    <li class="list-group-item">City :
                                                                        @if ($user->city)
                                                                            <span class="badge bg-warning ">
                                                                                <i
                                                                                    class="fa-solid fa-city text-danger"></i>
                                                                                {{ $user->city->title_en }}
                                                                            </span>
                                                                        @else
                                                                            --
                                                                        @endif

                                                                    </li>



                                                                    <li class="list-group-item">Sign Up From :
                                                                        <span
                                                                            class="badge bg-primary">{{ strtoupper($user->sign_from) }}</span>
                                                                    </li>

                                                                    <li class="list-group-item">Status :
                                                                        @if ($user->status)
                                                                            <span class="badge bg-success">Active</span>
                                                                        @else
                                                                            <span class="badge bg-danger">InActive</span>
                                                                        @endif
                                                                    </li>

                                                                    <li class="list-group-item">Added Date : <i
                                                                            class="fas fa-calendar-Month text-info"></i>
                                                                        {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}
                                                                    </li>
                                                                    <li class="list-group-item">Added Time : <i
                                                                            class="fas fa-clock text-success"></i>
                                                                        {{ \Carbon\Carbon::parse($user->created_at)->format('h:i:s A') }}
                                                                    </li>

                                                                </ul>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">


                                                            @if (Auth::guard('admin')->user()->hasPermission('users-update'))
                                                                <a class="btn btn-primary"
                                                                    href="{{ route('admin.users.edit', $user->id) }}"><span
                                                                        class="fas fa-edit me-2"></span>Edit</a>
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


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- latest users --}}


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
                                    <h2 class="fs-5 fw-bold mb-0">Latest 20 Users Registered From Web</h2>
                                </div>
                                 
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="border-bottom" scope="col">User Name</th>
                                        <th class="border-bottom" scope="col">User Phone</th>

                                        <th class="border-bottom" scope="col"> Register Date</th>
                                        <th class="border-bottom" scope="col">Show</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lastTweentyWebUsers as $user)
                                        <tr>
                                            <th class="text-gray-900" scope="row">
                                                {{ $user->name }}
                                            </th>
                                            <th class="text-gray-900" scope="row">
                                                {{ $user->phone }}
                                            </th>
                                            <td class="fw-bolder text-gray-500 ">


                                                <span class="d-block text-nowrap"><i
                                                        class="fas fa-calendar-Month text-info"></i>
                                                    {{ $user->created_at }}</span>


                                            </td>

                                            <td class="fw-bolder text-gray-500">
                                                <div class="">
                                                    <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Show Details">
                                                        <button class="btn btn-primary  m-1" data-bs-toggle="modal"
                                                            data-bs-target="#modal-{{ $user->id }}"
                                                            class=""><span class="fas fa-eye "></span>
                                                        </button>
                                                    </div>
                                                </div>

                                            </td>
                                            <div class="modal fade" id="modal-{{ $user->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h2 class="h6 modal-title">{{ $user->name }}</h2>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="wrapper m-auto">
                                                                <div class="d-flex mb-2">
                                                                    <img class="model-img" src="{{ $user->image_url }}"
                                                                        alt="{{ $user->name }} Image">
                                                                </div>
                                                                <ul class="list-group list-group-flush">
                                                                    <li class="list-group-item">Name :
                                                                        {{ $user->name }} </li>
                                                                    <li class="list-group-item">Email :
                                                                        {{ $user->email }} </li>
                                                                    <li class="list-group-item">Phone :
                                                                        {{ $user->phone }}</li>
                                                                    <li class="list-group-item">Gender :
                                                                        <span class="badge bg-primary">
                                                                            <i
                                                                                class="fa-solid fa-venus-mars text-danger"></i>
                                                                            {{ ucfirst($user->gender) }}
                                                                        </span>

                                                                    </li>
                                                                    <li class="list-group-item">Country :
                                                                        @if ($user->country)
                                                                            <span class="badge bg-info">
                                                                                <i
                                                                                    class="fa-solid fa-flag text-danger"></i>
                                                                                {{ $user->country->title_en }}
                                                                            </span>
                                                                        @else
                                                                            --
                                                                        @endif

                                                                    </li>


                                                                    <li class="list-group-item">City :
                                                                        @if ($user->city)
                                                                            <span class="badge bg-warning ">
                                                                                <i
                                                                                    class="fa-solid fa-city text-danger"></i>
                                                                                {{ $user->city->title_en }}
                                                                            </span>
                                                                        @else
                                                                            --
                                                                        @endif

                                                                    </li>



                                                                    <li class="list-group-item">Sign Up From :
                                                                        <span
                                                                            class="badge bg-primary">{{ strtoupper($user->sign_from) }}</span>
                                                                    </li>

                                                                    <li class="list-group-item">Status :
                                                                        @if ($user->status)
                                                                            <span class="badge bg-success">Active</span>
                                                                        @else
                                                                            <span class="badge bg-danger">InActive</span>
                                                                        @endif
                                                                    </li>

                                                                    <li class="list-group-item">Added Date : <i
                                                                            class="fas fa-calendar-Month text-info"></i>
                                                                        {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}
                                                                    </li>
                                                                    <li class="list-group-item">Added Time : <i
                                                                            class="fas fa-clock text-success"></i>
                                                                        {{ \Carbon\Carbon::parse($user->created_at)->format('h:i:s A') }}
                                                                    </li>

                                                                </ul>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">


                                                            @if (Auth::guard('admin')->user()->hasPermission('users-update'))
                                                                <a class="btn btn-primary"
                                                                    href="{{ route('admin.users.edit', $user->id) }}"><span
                                                                        class="fas fa-edit me-2"></span>Edit</a>
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


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- latest users --}}


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
                                    <h2 class="fs-5 fw-bold mb-0">Latest 20 Users Registered From Android</h2>
                                </div>
                            

                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="border-bottom" scope="col">User Name</th>
                                        <th class="border-bottom" scope="col">User Phone</th>

                                        <th class="border-bottom" scope="col"> Register Date</th>
                                        <th class="border-bottom" scope="col">Show</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lastTweentyAndoridUsers as $user)
                                        <tr>
                                            <th class="text-gray-900" scope="row">
                                                {{ $user->name }}
                                            </th>
                                            <th class="text-gray-900" scope="row">
                                                {{ $user->phone }}
                                            </th>
                                            <td class="fw-bolder text-gray-500 ">


                                                <span class="d-block text-nowrap"><i
                                                        class="fas fa-calendar-Month text-info"></i>
                                                    {{ $user->created_at }}</span>


                                            </td>

                                            <td class="fw-bolder text-gray-500">
                                                <div class="">
                                                    <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Show Details">
                                                        <button class="btn btn-primary  m-1" data-bs-toggle="modal"
                                                            data-bs-target="#modal-{{ $user->id }}"
                                                            class=""><span class="fas fa-eye "></span>
                                                        </button>
                                                    </div>
                                                </div>

                                            </td>
                                            <div class="modal fade" id="modal-{{ $user->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h2 class="h6 modal-title">{{ $user->name }}</h2>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="wrapper m-auto">
                                                                <div class="d-flex mb-2">
                                                                    <img class="model-img" src="{{ $user->image_url }}"
                                                                        alt="{{ $user->name }} Image">
                                                                </div>
                                                                <ul class="list-group list-group-flush">
                                                                    <li class="list-group-item">Name :
                                                                        {{ $user->name }} </li>
                                                                    <li class="list-group-item">Email :
                                                                        {{ $user->email }} </li>
                                                                    <li class="list-group-item">Phone :
                                                                        {{ $user->phone }}</li>
                                                                    <li class="list-group-item">Gender :
                                                                        <span class="badge bg-primary">
                                                                            <i
                                                                                class="fa-solid fa-venus-mars text-danger"></i>
                                                                            {{ ucfirst($user->gender) }}
                                                                        </span>

                                                                    </li>
                                                                    <li class="list-group-item">Country :
                                                                        @if ($user->country)
                                                                            <span class="badge bg-info">
                                                                                <i
                                                                                    class="fa-solid fa-flag text-danger"></i>
                                                                                {{ $user->country->title_en }}
                                                                            </span>
                                                                        @else
                                                                            --
                                                                        @endif

                                                                    </li>


                                                                    <li class="list-group-item">City :
                                                                        @if ($user->city)
                                                                            <span class="badge bg-warning ">
                                                                                <i
                                                                                    class="fa-solid fa-city text-danger"></i>
                                                                                {{ $user->city->title_en }}
                                                                            </span>
                                                                        @else
                                                                            --
                                                                        @endif

                                                                    </li>



                                                                    <li class="list-group-item">Sign Up From :
                                                                        <span
                                                                            class="badge bg-primary">{{ strtoupper($user->sign_from) }}</span>
                                                                    </li>

                                                                    <li class="list-group-item">Status :
                                                                        @if ($user->status)
                                                                            <span class="badge bg-success">Active</span>
                                                                        @else
                                                                            <span class="badge bg-danger">InActive</span>
                                                                        @endif
                                                                    </li>

                                                                    <li class="list-group-item">Added Date : <i
                                                                            class="fas fa-calendar-Month text-info"></i>
                                                                        {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}
                                                                    </li>
                                                                    <li class="list-group-item">Added Time : <i
                                                                            class="fas fa-clock text-success"></i>
                                                                        {{ \Carbon\Carbon::parse($user->created_at)->format('h:i:s A') }}
                                                                    </li>

                                                                </ul>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">


                                                            @if (Auth::guard('admin')->user()->hasPermission('users-update'))
                                                                <a class="btn btn-primary"
                                                                    href="{{ route('admin.users.edit', $user->id) }}"><span
                                                                        class="fas fa-edit me-2"></span>Edit</a>
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


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- latest users --}}


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
                                    <h2 class="fs-5 fw-bold mb-0">Latest 20 Users Registered From Ios</h2>
                                </div>
                               
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="border-bottom" scope="col">User Name</th>
                                        <th class="border-bottom" scope="col">User Phone</th>

                                        <th class="border-bottom" scope="col"> Register Date</th>
                                        <th class="border-bottom" scope="col">Show</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lastTweentyIosUsers as $user)
                                        <tr>
                                            <th class="text-gray-900" scope="row">
                                                {{ $user->name }}
                                            </th>
                                            <th class="text-gray-900" scope="row">
                                                {{ $user->phone }}
                                            </th>
                                            <td class="fw-bolder text-gray-500 ">


                                                <span class="d-block text-nowrap"><i
                                                        class="fas fa-calendar-Month text-info"></i>
                                                    {{ $user->created_at }}</span>


                                            </td>

                                            <td class="fw-bolder text-gray-500">
                                                <div class="">
                                                    <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Show Details">
                                                        <button class="btn btn-primary  m-1" data-bs-toggle="modal"
                                                            data-bs-target="#modal-{{ $user->id }}"
                                                            class=""><span class="fas fa-eye "></span>
                                                        </button>
                                                    </div>
                                                </div>

                                            </td>
                                            <div class="modal fade" id="modal-{{ $user->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h2 class="h6 modal-title">{{ $user->name }}</h2>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="wrapper m-auto">
                                                                <div class="d-flex mb-2">
                                                                    <img class="model-img" src="{{ $user->image_url }}"
                                                                        alt="{{ $user->name }} Image">
                                                                </div>
                                                                <ul class="list-group list-group-flush">
                                                                    <li class="list-group-item">Name :
                                                                        {{ $user->name }} </li>
                                                                    <li class="list-group-item">Email :
                                                                        {{ $user->email }} </li>
                                                                    <li class="list-group-item">Phone :
                                                                        {{ $user->phone }}</li>
                                                                    <li class="list-group-item">Gender :
                                                                        <span class="badge bg-primary">
                                                                            <i
                                                                                class="fa-solid fa-venus-mars text-danger"></i>
                                                                            {{ ucfirst($user->gender) }}
                                                                        </span>

                                                                    </li>
                                                                    <li class="list-group-item">Country :
                                                                        @if ($user->country)
                                                                            <span class="badge bg-info">
                                                                                <i
                                                                                    class="fa-solid fa-flag text-danger"></i>
                                                                                {{ $user->country->title_en }}
                                                                            </span>
                                                                        @else
                                                                            --
                                                                        @endif

                                                                    </li>


                                                                    <li class="list-group-item">City :
                                                                        @if ($user->city)
                                                                            <span class="badge bg-warning ">
                                                                                <i
                                                                                    class="fa-solid fa-city text-danger"></i>
                                                                                {{ $user->city->title_en }}
                                                                            </span>
                                                                        @else
                                                                            --
                                                                        @endif

                                                                    </li>



                                                                    <li class="list-group-item">Sign Up From :
                                                                        <span
                                                                            class="badge bg-primary">{{ strtoupper($user->sign_from) }}</span>
                                                                    </li>

                                                                    <li class="list-group-item">Status :
                                                                        @if ($user->status)
                                                                            <span class="badge bg-success">Active</span>
                                                                        @else
                                                                            <span class="badge bg-danger">InActive</span>
                                                                        @endif
                                                                    </li>

                                                                    <li class="list-group-item">Added Date : <i
                                                                            class="fas fa-calendar-Month text-info"></i>
                                                                        {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}
                                                                    </li>
                                                                    <li class="list-group-item">Added Time : <i
                                                                            class="fas fa-clock text-success"></i>
                                                                        {{ \Carbon\Carbon::parse($user->created_at)->format('h:i:s A') }}
                                                                    </li>

                                                                </ul>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">


                                                            @if (Auth::guard('admin')->user()->hasPermission('users-update'))
                                                                <a class="btn btn-primary"
                                                                    href="{{ route('admin.users.edit', $user->id) }}"><span
                                                                        class="fas fa-edit me-2"></span>Edit</a>
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


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- latest users --}}


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
                                    <h2 class="fs-5 fw-bold mb-0">Regions Of City</h2>
                                </div>
                               
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="border-bottom" scope="col">ID</th>
                                        <th class="border-bottom" scope="col">Name</th>
                                           <th class="border-bottom" scope="col">Created At</th>
                                                 <th class="border-bottom" scope="col">Status</th>
                    <th class="border-bottom" scope="col">Action</th>
                                    </tr>
                                </thead>
                               <tbody>
                <!-- Item -->

                @foreach ($regions as $region)
                    <tr>
                        <td>{{ $region->id }}</td>

                        <td>{{ $region->title_en }}</td>

                        <td>
                            @if ($region->created_at)
                                <p><i class="fas fa-calendar-week text-info"></i>
                                    {{ \Carbon\Carbon::parse($region->created_at)->format('d/m/Y') }} </p>
                                <p><i class="fas fa-clock text-success"></i>
                                    {{ \Carbon\Carbon::parse($region->created_at)->format('h:i:s A') }} </p>
                            @else
                                ...
                            @endif

                        </td>



                        <td>
                            @if ($region->status)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">InActive</span>
                            @endif
                        </td>
                        <td>

                            <div class="btn-group">
                                <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="icon icon-sm">
                                        <span class="fas fa-ellipsis-h icon-dark"></span>
                                    </span>
                                    <span class="visually-hidden">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu py-0">
                                    <button data-bs-toggle="modal" data-bs-target="#modal-{{ $region->id }}"
                                        class="dropdown-item rounded-top"><span class="fas fa-eye me-2"></span>View
                                        Details</button>

                                    @if (Auth::guard('admin')->user()->hasPermission('regions-update'))
                                        <a class="dropdown-item"
                                            href="{{ route('admin.regions.edit', $region->id) }}"><span
                                                class="fas fa-edit me-2"></span>Edit</a>
                                    @endif


                                    @if ($region->deleted_at)
                                        @if (Auth::guard('admin')->user()->hasPermission('regions-update'))
                                            <form action="{{ route('admin.regions.restore', $region->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="dropdown-item text-success rounded-bottom">
                                                    <span class="fa-solid fa-trash-can-arrow-up me-2"></span>Restore
                                                </button>
                                            </form>
                                        @endif
                                    @else
                                        @if (Auth::guard('admin')->user()->hasPermission('regions-delete'))
                                            <form class="delete-btn"
                                                action="{{ route('admin.regions.destroy', $region->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger rounded-bottom">
                                                    <span class="fas fa-trash-alt me-2"></span>Delete
                                                </button>
                                            </form>
                                        @endif
                                    @endif





                                </div>
                            </div>


                        </td>




                        <div class="modal fade" id="modal-{{ $region->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="modal-default" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="h6 modal-title">{{ $region->title_en }}</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="wrapper m-auto">

                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">Title In Arabic : {{ $region->title_ar }}
                                                </li>
                                                <li class="list-group-item">Title In English : {{ $region->title_en }}
                                                </li>


                                                <li class="list-group-item">City :

                                                    @if ($region->city)
                                                        <a class="btn btn-outline-primary"
                                                            href="{{ route('admin.cities.index', ['city_id' => $region->city->id]) }}">{{ $region->city->title_en }}</a>
                                                    @else
                                                        --
                                                    @endif

                                                </li>

                                                <li class="list-group-item">Added By :

                                                    @if ($region->admin)
                                                        <a class="btn btn-outline-primary"
                                                            href="{{ route('admin.system-admins.index', ['admin_id' => $region->admin->id]) }}">{{ $region->admin->name }}</a>
                                                    @else
                                                        --
                                                    @endif

                                                </li>

                                                <li class="list-group-item">Status :
                                                    @if ($region->status)
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-danger">InActive</span>
                                                    @endif
                                                </li>

                                                <li class="list-group-item">Added Date : <i
                                                        class="fas fa-calendar-week text-info"></i>
                                                    {{ \Carbon\Carbon::parse($region->created_at)->format('d/m/Y') }} </li>
                                                <li class="list-group-item">Added Time : <i
                                                        class="fas fa-clock text-success"></i>
                                                    {{ \Carbon\Carbon::parse($region->created_at)->format('h:i:s A') }}
                                                </li>

                                            </ul>
                                        </div>

                                    </div>
                                    <div class="modal-footer">


                                        @if (Auth::guard('admin')->user()->hasPermission('regions-update'))
                                            <a class="btn btn-primary"
                                                href="{{ route('admin.regions.edit', $region->id) }}"><span
                                                    class="fas fa-edit me-2"></span>Edit</a>
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
                        </div>
                    </div>
                </div>
                {{-- latest users --}}


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
                                    <h2 class="fs-5 fw-bold mb-0">Last 20 Products Of City</h2>
                                </div>
                               
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="border-bottom" scope="col">ID</th>
                                        <th class="border-bottom" scope="col">Title</th>
 <th class="border-bottom" scope="col">Price</th>
           <th class="border-bottom" scope="col">Stock</th>         
            <th class="border-bottom" scope="col">Category</th>        
             <th class="border-bottom" scope="col">Status</th>                   
                                                  <th class="border-bottom" scope="col">Status</th>
                    <th class="border-bottom" scope="col">Action</th>
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
                                                        <label for="real_price">Real Price (EGP) <span
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
                                                        <label for="fake_price">Fake Price (EGP) <span
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
                                    type="button">{{ number_format($product->real_price) }} EGP</button>
                            @else
                                <button class="btn btn-outline-primary text-nowrap"
                                    type="button">{{ number_format($product->real_price) }} EGP</button>
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




                        <td>



                            @if (Auth::guard('admin')->user()->hasPermission('products-update'))
                                @if ($product->status)
                                    <form class="action_btn"
                                        data-message="Are You Sure You Want To Update This Product Status To InActive ?"
                                        action="{{ route('admin.products.inactivation', $product->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <button type="submit"
                                            class="btn btn-success d-inline-flex align-items-center text-white">
                                            <i class="far fa-thumbs-up icon icon-xs me-2 d-inline-block"
                                                style="font-size: 18px"></i>
                                            Active
                                        </button>
                                    </form>
                                @else
                                    <form class="action_btn"
                                        data-message="Are You Sure You Want To Update This Product Status To  Active  ?"
                                        action="{{ route('admin.products.activation', $product->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')



                                        <button type="submit"
                                            class="btn btn-danger d-inline-flex align-items-center text-white">
                                            <i class="far fa-thumbs-down icon icon-xs me-2 d-inline-block"
                                                style="font-size: 18px"></i>
                                            InActive
                                        </button>
                                    </form>
                                @endif
                            @else
                                @if ($product->status)
                                    <button type="button"
                                        class="btn btn-success d-inline-flex align-items-center text-white">
                                        <i class="far fa-thumbs-up icon icon-xs me-2 d-inline-block"
                                            style="font-size: 18px"></i>
                                        Active
                                    </button>
                                @else
                                    <button type="button"
                                        class="btn btn-danger d-inline-flex align-items-center text-white">
                                        <i class="far fa-thumbs-down icon icon-xs me-2 d-inline-block"
                                            style="font-size: 18px"></i>
                                        InActive
                                    </button>
                                @endif
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
                                        <button class="btn btn-primary  m-1" data-bs-toggle="modal"
                                            data-bs-target="#modal-{{ $product->id }}" class=""><span
                                                class="fas fa-eye "></span>
                                        </button>
                                    </div>
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


                                <div class="">
                                    @if ($product->deleted_at)
                                        @if (Auth::guard('admin')->user()->hasPermission('products-update'))
                                            <form action="{{ route('admin.products.restore', $product->id) }}"
                                                method="POST" class="action_btn"
                                                data-message="Are You Sure You Want To Restore It ?">

                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-success m-1" type="submit"
                                                    title="Restore" data-bs-toggle="tooltip" data-bs-placement="top">
                                                    <span class="fa-solid fa-trash-can-arrow-up text-white"></span>
                                                </button>
                                            </form>
                                        @endif
                                    @else
                                        @if (Auth::guard('admin')->user()->hasPermission('products-delete'))
                                            <form class="delete-btn m-0 p-0 "
                                                action="{{ route('admin.products.destroy', $product->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger m-1" type="submit" title="Delete"
                                                    data-bs-toggle="tooltip" data-bs-placement="top">
                                                    <span class="fas fa-trash-alt "></span>
                                                </button>
                                            </form>
                                        @endif
                                    @endif

                                </div>






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
                                                    {{ number_format($product->purchase_price, 2) }} EGP </li>
                                                <li class="list-group-item">Price:
                                                    {{ number_format($product->real_price, 2) }} EGP </li>
                                                <li class="list-group-item">Price With Taxes:
                                                    {{ number_format($product->price_after_taxes) }} EGP </li>

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


                                        @if (Auth::guard('admin')->user()->hasPermission('products-update'))
                                            <a class="btn btn-primary"
                                                href="{{ route('admin.products.edit', $product->id) }}"><span
                                                    class="fas fa-edit me-2"></span>Edit</a>
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
                        </div>
                    </div>
                </div>
                {{-- latest users --}}


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
                                    <h2 class="fs-5 fw-bold mb-0">Last 20 Halls Of City</h2>
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



















<div class="row">
        <div class="col-12 col-xl-12">
            <div class="row">


                {{-- latest users --}}

                <div class="col-12 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h2 class="fs-5 fw-bold mb-0">Last 20 Orders Of City</h2>
                                </div>
                               
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                    <th class="border-gray-200">ID</th>
                    <th class="border-gray-200">Order Number</th>
                    <th class="border-gray-200">Total Price</th>
                    <th class="border-gray-200">Payment Type</th>
                    <th class="border-gray-200">User</th>
                    <th class="border-gray-200">Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                <!-- Item -->

                @foreach ($orders as $order)
                    <tr>

                        <td>
                            <p class="text-nowrap">{{ $order->id }}.</p>
                        </td>
                        <td>
                            <p class="text-nowrap">{{ $order->order_number }}</p>
                        </td>
                        <td> <span class="badge bg-success text-nowrap"
                                style="font-size: 16px">{{ number_format($order->product_total_price + $order->total_taxes_price) }}
                                EGP</span></td>

                        <td> <span class="badge bg-info text-nowrap"
                                style="font-size: 16px">{{ $order->payment_type }}</span></td>

                        <td>

                            @if ($order->user)
                                <strong>


                                    <p class="text-nowrap"><i class="fas fa-user text-info"></i>
                                        <a class="mx-1 text-info"
                                            href="{{ route('admin.users.index', ['user_id' => $order->user->id]) }}">{{ $order->user->name }}</a>
                                    </p>
                                </strong>
                            @else
                                <p class="text-nowrap"><i class="fas fa-user text-info"></i>
                                    {{ $order->customer_name }}
                                </p>
                            @endif
                        </td>


                        <td>
                            <p class="text-nowrap">
                                {{ $order->created_at }}
                            </p>
                        </td>

                        <td>


                            <div class="d-flex  align-items-center justify-content-center flex-md-nowrap">


                                <div class="">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Show Details">


                                        <a class="btn btn-primary  m-1" style="font-size: 16px"
                                            href="{{ route('admin.orders.show', $order->order_number) }}"> <span
                                                class="fas fa-eye "></span></a>
                                    </div>
                                </div>

                                @if ($order->status == 'pending')
                                    <form class="action_btn"
                                        data-message="Are You Sure You Want To Move This Order To Inprogress Status ?"
                                        action="{{ route('admin.orders.inprogressAction', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button data-bs-toggle="tooltip" data-bs-placement="top" title="Inprogress Action"
                                            type="submit" class="btn btn-info text-white  m-1" style="font-size: 16px">
                                            <span class="fas fa-check"></span>
                                        </button>
                                    </form>



                                    <form class="action_btn"
                                        data-message="Are You Sure You Want To Move This Order To Delivered Status ?"
                                        action="{{ route('admin.orders.deliveredAction', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button style="font-size: 16px" type="submit" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Delivered Action" type="submit"
                                            class="btn btn-success text-white  m-1">
                                            <span class="fas fa-check-double "></span>
                                        </button>
                                    </form>


                                    <form class="action_btn"
                                        data-message="Are You Sure You Want To Move This Order To Cancelled Status ?"
                                        action="{{ route('admin.orders.cancelledAction', $order->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Cancelled Action" type="submit" class="btn btn-danger text-white  m-1"
                                            style="font-size: 16px">
                                            <span class="fas fa-times"></span>
                                        </button>
                                    </form>
                                @elseif ($order->status == 'in_progress')
                                    <form class="action_btn"
                                        data-message="Are You Sure You Want To Move This Order To Delivered Status ?"
                                        action="{{ route('admin.orders.deliveredAction', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button style="font-size: 16px" type="submit" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Delivered Action" type="submit"
                                            class="btn btn-success text-white  m-1">
                                            <span class="fas fa-check-double "></span>
                                        </button>
                                    </form>


                                    <form class="action_btn"
                                        data-message="Are You Sure You Want To Move This Order To Cancelled Status ?"
                                        action="{{ route('admin.orders.cancelledAction', $order->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Cancelled Action" type="submit"
                                            class="btn btn-danger text-white  m-1" style="font-size: 16px">
                                            <span class="fas fa-times"></span>
                                        </button>
                                    </form>
                                @else

                                @endif









                            </div>






                        </td>




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











<div class="row">
        <div class="col-12 col-xl-12">
            <div class="row">


                {{-- latest users --}}

                <div class="col-12 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h2 class="fs-5 fw-bold mb-0">Last 20 Vendors Of City</h2>
                                </div>
                               
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                    <th class="border-gray-200">ID</th>
                <th class="border-gray-200">Title In English</th>
                <th class="border-gray-200">Commission %</th>
                <th class="border-gray-200">Created At</th>
                <th class="border-gray-200">Status</th>
                <th class="border-gray-200">Action</th>
                                    </tr>
                                </thead>
                                    <tbody >
            <!-- Item -->

            @foreach ($vendors as $vendor )
            <tr>
                <td>{{ $vendor->id }}</td>
               <td>{{ $vendor->title_en }}</td>
               <td>{{ $vendor->commission }}%</td>


               <td>
                   @if ($vendor->created_at)
                   <p ><i class="fas fa-calendar-week text-info"></i> {{ \Carbon\Carbon::parse($vendor->created_at)->format('d/m/Y')}} </p>
                   <p  ><i class="fas fa-clock text-success"></i> {{ \Carbon\Carbon::parse($vendor->created_at)->format('h:i:s A')}} </p>

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

                    <div class="btn-group">
                        <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="icon icon-sm">
                                <span class="fas fa-ellipsis-h icon-dark"></span>
                            </span>
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu py-0">
                            <button data-bs-toggle="modal" data-bs-target="#modal-{{ $vendor->id }}" class="dropdown-item rounded-top" ><span class="fas fa-eye me-2"></span>View Details</button>

                            @if (Auth::guard('admin')->user()->hasPermission('vendors-update'))
                            <a class="dropdown-item" href="{{ route('admin.vendors.edit', $vendor->id) }}"><span class="fas fa-edit me-2"></span>Edit</a>

                            @endif


                            @if ($vendor->deleted_at)
                            @if (Auth::guard('admin')->user()->hasPermission('vendors-update'))
                            <form  action="{{ route('admin.vendors.restore', $vendor->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="dropdown-item text-success rounded-bottom">
                                    <span class="fa-solid fa-trash-can-arrow-up me-2"></span>Restore
                                </button>
                            </form>

                            @endif
                            @else
                            @if (Auth::guard('admin')->user()->hasPermission('vendors-delete'))
                            <form class="delete-btn" action="{{ route('admin.vendors.destroy', $vendor->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dropdown-item text-danger rounded-bottom">
                                    <span class="fas fa-trash-alt me-2"></span>Delete
                                </button>
                            </form>

                            @endif
                            @endif





                        </div>
                    </div>


                </td>




                <div class="modal fade" id="modal-{{ $vendor->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="h6 modal-title">{{ $vendor->title_en }}</h2>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="wrapper m-auto">

                                    <div class="d-flex mb-2">
                                        <img class="model-img" src="{{ $vendor->image_url }}" alt="{{ $vendor->title_en }} Image">
                                    </div>

                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Title In Arabic : {{ $vendor->title_ar }} </li>
                                        <li class="list-group-item">Title In English : {{ $vendor->title_en }} </li>
                                        <li class="list-group-item">Email: <a class="text-tertiary me-3" href=" mailto:{{ $vendor->email }}"> {{ $vendor->email }}</a> </li>
                                        <li class="list-group-item">Phone Number : <a class="text-tertiary me-3" href="tel:{{ $vendor->phone }}">{{ $vendor->phone }}</a> </li>
                                        <li class="list-group-item">Commission :  {{ $vendor->commission }}% </li>



                                        <li class="list-group-item">Added By :

                                            @if ($vendor->admin)

                                            <a class="btn btn-outline-primary" href="{{ route('admin.system-admins.index' ,[ 'admin_id'=>$vendor->admin->id ] )}}">{{ $vendor->admin->name }}</a>
                                            @else
                                               --
                                            @endif

                                        </li>

                                        <li class="list-group-item">Vendor Admins :

                                            @if ($vendor->admins_count)

                                            <a class="btn btn-outline-primary" href="{{ route('admin.vendor-admins.index' ,[ 'vendor_id'=>$vendor->id ] )}}">{{ $vendor->admins_count }}</a>
                                            @else
                                               {{ $vendor->admins_count }}
                                            @endif

                                        </li>
                                        @if ($vendor->halls_count >0)

                                        <li class="list-group-item">Halls Count :

                                            <a class="btn btn-outline-primary" href="{{ route('admin.halls.index' ,[ 'vendor_id'=>$vendor->id ] )}}">{{ $vendor->halls_count }}</a>



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

                                        <li class="list-group-item">Added Date :  <i class="fas fa-calendar-week text-info"></i> {{ \Carbon\Carbon::parse($vendor->created_at)->format('d/m/Y')}}  </li>
                                        <li class="list-group-item">Added Time : <i class="fas fa-clock text-success"></i> {{ \Carbon\Carbon::parse($vendor->created_at)->format('h:i:s A')}}</li>

                                    </ul>
                                </div>

                            </div>
                            <div class="modal-footer">


                                @if (Auth::guard('admin')->user()->hasPermission('vendors-update'))
                                <a class="btn btn-primary" href="{{ route('admin.vendors.edit', $vendor->id) }}"><span class="fas fa-edit me-2"></span>Edit</a>

                                @endif

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
