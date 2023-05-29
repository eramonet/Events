@extends('layouts.admin.master')
@section('title')
    Show Become Vendor Request
@endsection
@section('content')
    {{-- on top --}}

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
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


                    <li class="breadcrumb-item active" aria-current="page">Show Become Vendor Request</li>

                </ol>
            </nav>
            <h2 class="h4">Show Become Vendor Request</h2>

        </div>

    </div>






    {{-- on top --}}



    <div class="card mb-4">

        <div class="card-header">
            Basic Information
        </div>

        <div class="card-body">

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card my-4">
                            <div class="card-header">
                                Basic information
                            </div>
                            <div class=" card-body ">
                                <div class="wrapper m-auto">
                                    <ul class="list-group list-group-flush">

                                        <li class="list-group-item">Name : {{ $become->name }} </li>

                                        <li class="list-group-item">Email : {{ $become->email }} </li>
                                        <li class="list-group-item">Phone Number : {{ $become->phone_number }} </li>
                                        <li class="list-group-item">Vendor Comment : {{ $become->comment ? $become->comment : "----" }} </li>
                                        <li class="list-group-item">Request Sent From :
                                            <span class="badge bg-primary">
                                                {{ $become->sign_from }}
                                            </span>
                                        </li>
                                        <li class="list-group-item">Request Status : {{ $become->status }} </li>


                                        <li class="list-group-item">Added Date : <i
                                                class="fas fa-calendar-week text-info"></i>
                                            {{ \Carbon\Carbon::parse($become->created_at)->format('d/m/Y') }} </li>
                                        <li class="list-group-item">Added Time : <i class="fas fa-clock text-success"></i>
                                            {{ \Carbon\Carbon::parse($become->created_at)->format('h:i:s A') }}</li>

                                    </ul>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>



            <div class="row">




                <div class="card my-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-center flex-wrap">
                            <a style="color: #fff" class="btn btn-success m-1" class="dropdown-item"
                                href="{{ route('admin.become.edit', $become->id) }}" title="Accept"
                                data-bs-toggle="tooltip" data-bs-placement="top">
                                Accept
                            </a>
                            <a style="color: #fff" class="btn btn-danger m-1" class="dropdown-item"
                                href="{{ route('admin.become.reject', $become->id) }}" title="Reject"
                                data-bs-toggle="tooltip" data-bs-placement="top">
                                Reject

                            </a>

                            <a href="{{ route('admin.become.index', 'pending') }}" class="btn btn-info m-1"">
                                Back
                            </a>
                        </div>
                    </div>
                </div>




            @endsection


            @section('scripts')
                <script>
                    $(document).ready(function() {
                        $('#country_id').select2({
                            width: "100%"
                        });
                    });
                </script>
            @endsection
