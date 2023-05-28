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



            <div class="row">

                {{-- title_ar --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="title_ar"> Name </label>
                        <input readonly type="text" name="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ $become->name }}">
                    </div>


                    @error('name')
                        <div class="d-flex justify-content-center ">

                            <div class="text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                        </div>
                    @enderror
                </div>

                {{-- title_ar --}}


                {{-- title_en --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <input readonly type="email" name="email"
                            class="form-control @error('email') is-invalid @enderror" value="{{ $become->email }}">
                    </div>


                    @error('email')
                        <div class="d-flex justify-content-center ">

                            <div class="text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                        </div>
                    @enderror
                </div>

                {{-- title_en --}}





                {{-- nickname_ar --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="phone">Phone <span class="text-danger">*</span></label>
                        <input required type="text" name="phone"
                            class="form-control @error('phone') is-invalid @enderror" value="{{ $become->phone }}">
                    </div>


                    @error('phone')
                        <div class="d-flex justify-content-center ">

                            <div class="text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                        </div>
                    @enderror
                </div>

                {{-- nickname_ar --}}


                {{-- nickname_en --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="status"> status</label>
                        <input readonly type="text" name="status"
                            class="form-control @error('status') is-invalid @enderror" value="{{ $become->status }}">
                    </div>


                    @error('status')
                        <div class="d-flex justify-content-center ">

                            <div class="text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                        </div>
                    @enderror
                </div>

                {{-- nickname_en --}}



                {{-- slogan_ar --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="comment"> comment</label>
                        <input readonly type="text" name="comment"
                            class="form-control @error('comment') is-invalid @enderror" value="{{ $become->comment }}">
                    </div>


                    @error('comment')
                        <div class="d-flex justify-content-center ">

                            <div class="text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                        </div>
                    @enderror
                </div>

                {{-- slogan_ar --}}


    <div class="card my-4">
        <div class="card-body">


            <div class="d-flex justify-content-center flex-wrap">




                {{-- @if (Auth::guard('admin')->user()->hasPermission('orders-update') && $order->status == 'new') --}}
                     <a class="btn btn-success m-1" class="dropdown-item"
                                                href="{{ route('admin.become.accpted', $become->id) }}" title="Edit"
                                                data-bs-toggle="tooltip" data-bs-placement="top">
                                                accept

                                            </a>


                {{-- @if (Auth::guard('admin')->user()->hasPermission('orders-update') && $order->status == 'inprogress') --}}
                          <a class="btn btn-danger m-1" class="dropdown-item"
                                                href="{{ route('admin.become.reject', $become->id) }}" title="Edit"
                                                data-bs-toggle="tooltip" data-bs-placement="top">
                                                Reject

                                            </a>
                {{-- @endif --}}

               



            </div>
        </div>
    </div>



                <a href="{{ route('admin.become.index','pending') }}" class="btn btn-primary d-block m-auto">
                    back
                    <i class="fa-regular fa-pen-to-square icon icon-xs ms-2"></i>

                </a>
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
