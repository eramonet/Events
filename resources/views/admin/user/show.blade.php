@extends('layouts.admin.master')
@section('title')
    User Information
@endsection

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            User Information
        </div>
        <div class="card-body">

            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div class="card my-4">
                            <div class="card-header">
                                Basic information
                            </div>
                            <div class=" card-body ">
                                <div class="wrapper m-auto">
                                    <div class="d-flex mb-2">
                                        <img class="model-img" src="{{ $user->image_url }}" width="150px">
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Name : {{ $user->name }} </li>
                                        <li class="list-group-item">Email : {{ $user->email }} </li>
                                        <li class="list-group-item">Phone : {{ $user->phone }}</li>
                                        <li class="list-group-item">Gender :
                                            <span class="badge bg-primary">
                                                <i class="fa-solid fa-venus-mars text-danger"></i>
                                                {{ ucfirst($user->gender) }}
                                            </span>

                                        </li>
                                        <li class="list-group-item">Country :
                                            @if ($user->country)
                                                <span class="badge bg-info">
                                                    <i class="fa-solid fa-flag text-danger"></i>
                                                    {{ $user->country->title_en }}
                                                </span>
                                            @else
                                                --
                                            @endif

                                        </li>


                                        <li class="list-group-item">City :
                                            @if ($user->city)
                                                <span class="badge bg-warning ">
                                                    <i class="fa-solid fa-city text-danger"></i>
                                                    {{ $user->city->title_en }}
                                                </span>
                                            @else
                                                --
                                            @endif

                                        </li>



                                        <li class="list-group-item">Sign Up From : <span
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
                                                class="fas fa-calendar-week text-info"></i>
                                            {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }} </li>
                                        <li class="list-group-item">Added Time : <i class="fas fa-clock text-success"></i>
                                            {{ \Carbon\Carbon::parse($user->created_at)->format('h:i:s A') }}</li>

                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="card my-4">
                            <div class="card-header">
                                User Orders Statistics
                            </div>
                            <div class=" card-body ">

                                <div class="d-flex justify-content-center align-items-center flex-wrap">
                                    <div
                                        class="card card-body px-1 py-3 mx-4 p bg-info   rounded my-3 order-statistics  position-relative">

                                        <h1 style="color: #fff; font-size: 30px;">
                                            {{ $order_pending }}
                                            </h1>


                                        <a>
                                            <span class="d-block " style=" font-size:13px ; color:#fff">Pending
                                                Orders</span>
                                        </a>
                                    </div>

                                    <div
                                        class="card card-body px-1 py-3 mx-4 p bg-warning   rounded my-3 order-statistics  position-relative">

                                        <h1 style="color: #fff; font-size: 30px;">
                                            {{ $order_in_progress }}
                                            </h1>


                                        <a><span class="d-block " style=" font-size:13px ; color:#fff">In Progress
                                                Orders</span></a>
                                    </div>

                                    <div
                                        class="card card-body px-1 py-3 mx-4 p bg-success   rounded my-3 order-statistics  position-relative">

                                        <h1 style="color: #fff; font-size: 30px;">
                                            {{ $order_delivered }}
                                            </h1>


                                        <a><span class="d-block " style=" font-size:13px ; color:#fff">Delivered
                                                Orders</span></a>
                                    </div>

                                    <div
                                        class="card card-body px-1 py-3 mx-4 p bg-danger   rounded my-3 order-statistics  position-relative">

                                        <h1 style="color: #fff; font-size: 25px;">
                                            {{ $order_cancelled }}
                                            </h1>


                                        <a><span class="d-block " style=" font-size:13px ; color:#fff">Cancelled
                                                Orders</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card my-4">
                            <div class="card-header">
                                User Halls Booking Statistics
                            </div>
                            <div class=" card-body ">

                                <div class="d-flex justify-content-center align-items-center flex-wrap">
                                    <div
                                        class="card card-body px-1 py-3 mx-4 p bg-info   rounded my-3 order-statistics  position-relative">

                                        <h1 style="color: #fff; font-size: 30px;">
                                            {{ $new_booking }}
                                            </h1>


                                        <a href="{{ route('admin.with-draw-request.total_withdraw_per_month') }}">
                                            <span class="d-block " style=" font-size:13px ; color:#fff">Pending
                                                Bookings</span>
                                        </a>
                                    </div>

                                    <div
                                        class="card card-body px-1 py-3 mx-4 p bg-success   rounded my-3 order-statistics  position-relative">

                                        <h1 style="color: #fff; font-size: 30px;">
                                            {{ $success_booking }}
                                            </h1>


                                        <a href="{{ route('admin.with-draw-request.total_withdraw_per_month') }}"><span
                                                class="d-block " style=" font-size:13px ; color:#fff">Delivered
                                                Bookings</span></a>
                                    </div>

                                    <div
                                        class="card card-body px-1 py-3 mx-4 p bg-danger   rounded my-3 order-statistics  position-relative">

                                        <h1 style="color: #fff; font-size: 25px;">
                                            {{ $cancelled_booking }}
                                            </h1>


                                        <a href="{{ route('admin.with-draw-request.total_withdraw_per_month') }}"><span
                                                class="d-block " style=" font-size:13px ; color:#fff">Cancelled
                                                Bookings</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="text-align: center">
                <a class="btn btn-primary" href="{{ route('admin.users.edit', $user->id) }}"><span
                        class="fas fa-edit me-2"></span>Edit</a>
            </div>
        </div>
    </div>
    {{-- on top --}}
@endsection
