@extends('layouts.admin.master')

@section('content')
    <div class="py-4">

        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4"> <i class="fa fa-house"></i> {{ config('app.name') }} Users Reports </h1>

            </div>
            <div class="btn-group ms-2 ms-lg-3">
                <a href="{{ route('admin.users.export') }}" class="btn btn-outline-success d-inline-flex align-items-center">
                    {{-- <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg> --}}

                    <svg class="icon icon-xs me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-file-earmark-break-fill" viewBox="0 0 16 16">
                        <path
                            d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V9H2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM2 12h12v2a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-2zM.5 10a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H.5z" />
                    </svg>
                    <span> Export Users As Excel</span>
                </a>
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
