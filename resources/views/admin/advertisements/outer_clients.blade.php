@extends('layouts.admin.master')
@section('title')
    Outer Clients
@endsection

@section('content')
    {{-- on top --}}

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-client-center py-2">
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
                    <li class="breadcrumb-item active" aria-current="page">Outer Clients</li>
                </ol>
            </nav>
            <h2 class="h4">Outer Clients</h2>
            <div style="margin: auto">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            </div>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="#" class="btn btn-sm btn-gray-800 d-inline-flex align-client-center" style="height: 40px;"
                data-bs-toggle="modal" data-bs-target="#modal-add">
                <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
                Create New Outer Client
            </a>
        </div>
    </div>






    {{-- on top --}}




    {{-- table --}}
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <table class="table table-hover table-centered table-striped table-bordered text-center ">
            <thead>
                <tr>
                    <th class="border-gray-200">Image</th>
                    <th class="border-gray-200">Name</th>
                    <th class="border-gray-200">Phone</th>
                    <th class="border-gray-200">Address</th>
                    <th class="border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Item -->

                @foreach ($clients as $client)
                    <tr>

                        <td>
                            <img src="{{ asset('user_assets/uploads/ads/' . $client->image) }}" width="50px;"
                                height="50px" style="border-radius: 50%; margin-right: 10px;">
                        </td>
                        <td>
                            <p class="text-nowrap"> {{ $client->name }} </p>
                        </td>

                        <td>
                            <p class="text-nowrap"> {{ $client->phone }} </p>
                        </td>

                        <td>
                            <p class="text-nowrap"> {{ $client->address }} </p>
                        </td>




                        <td>



                            <div class="d-flex  align-client-center justify-content-center flex-md-nowrap">


                                <div class="">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Show Details">
                                        <button class="btn btn-primary  m-1" data-bs-toggle="modal"
                                            data-bs-target="#modal-edit-{{ $client->id }}" class=""><span
                                                class="fas fa-edit "></span>
                                        </button>
                                    </div>
                                </div>


                                <div class="">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                        <form class="delete-btn m-0 p-0 "
                                            action="{{ route('admin.advertisements.delete_outer_clients', $client->id) }}"
                                            method="GET">
                                            @csrf
                                            <button class="btn btn-danger m-1" type="submit" title="Delete"
                                                data-bs-toggle="tooltip" data-bs-placement="top">
                                                <span class="fas fa-trash-alt "></span>
                                            </button>
                                        </form>
                                    </div>
                                </div>





                            </div>






                        </td>











                        <div class="modal fade" id="modal-edit-{{ $client->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="modal-default" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="h6 modal-title">Edit</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('admin.advertisements.edit_outer_clients', $client->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">

                                            <div class="wrapper m-auto">

                                                <ul class="list-group list-group-flush">
                                                    <label> Image </label>
                                                    <input type="file" name="image" class="form-control"><br>
                                                    <label> Name </label>
                                                    <input type="text" name="name" value="{{ $client->name }}"
                                                        class="form-control"><br>
                                                    <label> Phone </label>
                                                    <input type="number" name="phone" value="{{ $client->phone }}"
                                                        class="form-control"><br>
                                                    <label> Address </label>
                                                    <input type="text" name="address" value="{{ $client->address }}"
                                                        class="form-control"><br>
                                                </ul>
                                            </div>

                                        </div>
                                        <div class="modal-footer">


                                            <button type="submit" class="btn btn-primary">
                                                Edit
                                            </button>


                                            <button type="button" class="btn btn-link text-gray ms-auto"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </tr>
                @endforeach

                <div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="modal-default"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="h6 modal-title">Create New Outer Client</h2>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('admin.advertisements.add_outer_clients') }}" method="POST"
                                enctype="multipart/form-data">
                                <div class="modal-body">

                                    <div class="wrapper m-auto">

                                        <ul class="list-group list-group-flush">

                                            <label> Image </label>
                                            <input type="file" name="image" class="form-control"><br>


                                            <label> Name </label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ old('name') }}"><br>

                                            <label> phone </label>
                                            <input type="number" name="phone" class="form-control"
                                                value="{{ old('phone') }}"><br>

                                            <label> Address </label>
                                            <input type="text" name="address" class="form-control"
                                                value="{{ old('address') }}"><br>

                                        </ul>
                                    </div>

                                </div>
                                <div class="modal-footer">


                                    <button type="submit" class="btn btn-primary">
                                        Add
                                    </button>


                                    <button type="button" class="btn btn-link text-gray ms-auto"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>






            </tbody>
        </table>
        <div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-client-center justify-content-between">
            {{-- {!! $taxes->appends(request()->query())->links('pagination::bootstrap-5') !!} --}}



        </div>

        {{-- @if ($taxes->count() < 1)
        <div class="d-flex justify-content-center" style="min-height: 300px">
            Empty
        </div>
    @endif --}}
    </div>

    {{-- table --}}
@endsection
