@extends('layouts.admin.master')
@section('title')
    Clients Advertisements
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
                    <li class="breadcrumb-item active" aria-current="page">Clients Advertisements</li>
                </ol>
            </nav>
            <h2 class="h4">Clients Advertisements</h2>
            <div style="margin: auto">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            </div>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.advertisements.assign_outer_client_ad_page') }}" class="btn btn-sm btn-gray-800 d-inline-flex align-client-center"
                style="height: 40px; margin-right: 10px">
                <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
                Assign To Outer Client
            </a>
            <a href="{{ route('admin.advertisements.assign_inner_client_ad_page') }}" class="btn btn-sm btn-gray-800 d-inline-flex align-client-center" style="height: 40px;">
                <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
                Assign To Inner Client
            </a>
        </div>
    </div>






    {{-- on top --}}




    {{-- table --}}
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <table class="table table-hover table-centered table-striped table-bordered text-center ">
            <thead>
                <tr>
                    <th class="border-gray-200">Client Name</th>
                    <th class="border-gray-200">Client Type</th>
                    <th class="border-gray-200">Advertisement</th>
                    <th class="border-gray-200">Activation</th>
                    <th class="border-gray-200">Expiration</th>
                    <th class="border-gray-200">Days About Exp</th>
                    <th class="border-gray-200">Position</th>
                    <th class="border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Item -->

                @foreach ($items as $items)
                    <tr>

                        <td>
                            <p>{{ $items->client_type == 'outer' ? $items->outer_client->name : $items->inner_clients->title_en }}
                            </p>
                        </td>

                        <td>
                            <p>{{ $items->client_type . ' Client' }}</p>
                        </td>

                        <td>
                            <img src="{{ asset('user_assets/uploads/ads/' . $items->ad->image) }}" width="70px;"
                                height="70px">
                        </td>

                        <td>
                            @if ($items->activation == 'yes')
                                <p style="color: green; font-weight: bold">Yes</p>
                            @else
                                <p style="color: red; font-weight: bold">No</p>
                            @endif
                        </td>

                        <td>
                            @if ($items->status == 'active')
                                <p style="color: green; font-weight: bold">Active</p>
                            @else
                                <p style="color: red; font-weight: bold">inActive</p>
                            @endif
                        </td>

                        <td>
                            <p>{{ $items->days . ' Days' }}</p>

                        </td>


                        <td>
                            <p>{{ $items->location }}</p>

                        </td>

                        <td>



                            <div class="d-flex  align-client-center justify-content-center flex-md-nowrap">
                                <div class="">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Show Details">
                                        <button class="btn btn-success  m-1" data-bs-toggle="modal"
                                            data-bs-target="#modal-show-{{ $items->id }}" class=""><span
                                                class="fas fa-eye "></span>
                                        </button>
                                    </div>
                                </div>

                                <div class="">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Show Details">
                                        <button class="btn btn-primary  m-1" data-bs-toggle="modal"
                                            data-bs-target="#modal-edit-{{ $items->id }}" class=""><span
                                                class="fas fa-edit "></span>
                                        </button>
                                    </div>
                                </div>


                                <div class="">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                        <form class="delete-btn m-0 p-0 "
                                                action="{{ route('admin.advertisements.delete_client_ad', $items->id) }}"
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



                        <div class="modal fade" id="modal-show-{{ $items->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="modal-default" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="h6 modal-title">Edit</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('admin.advertisements.edit_outer_clients', $items->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">

                                            <div class="wrapper m-auto">

                                                <ul class="list-group list-group-flush">

                                                    <label> Client Name </label>
                                                    <h6>{{ $items->client_type == 'outer' ? $items->outer_client->name : $items->inner_clients->title_en }}
                                                    </h6>
                                                    <hr>
                                                    <label> Client Type </label>
                                                    <h6>
                                                        {{ $items->client_type }}
                                                    </h6>
                                                    <hr>
                                                    <label> Adventisement Image </label>
                                                    <img src="{{ asset('user_assets/uploads/ads/' . $items->ad->image) }}"
                                                        style="height: 100px; width: 100px"><br>
                                                    <hr>
                                                    <label>Activation</label>
                                                    @if ($items->activation == 'yes')
                                                        <i class="fa fa-circle" style="font-size: 30px; color: green"
                                                            aria-hidden="true"></i>
                                                    @else
                                                        <i class="fa fa-circle" style="font-size: 30px; color: red"
                                                            aria-hidden="true"></i>
                                                    @endif
                                                    <hr>

                                                    <label>Expiration</label>
                                                    @if ($items->status == 'active')
                                                        <i class="fa fa-circle" style="font-size: 30px; color: green"
                                                            aria-hidden="true"></i>
                                                    @else
                                                        <i class="fa fa-circle" style="font-size: 30px; color: red"
                                                            aria-hidden="true"></i>
                                                    @endif
                                                    <hr>
                                                    <label> From </label>
                                                    <p>{{ $items->from }}</p>
                                                    <hr>
                                                    <label> To </label>
                                                    <p>{{ $items->to }}</p>
                                                    <hr>
                                                    <hr>
                                                    <label> Link </label>
                                                    <a href="{{ $items->ad->link }}" class="btn btn-primary"
                                                        target="_blank">Go</a>
                                                </ul>
                                            </div>

                                        </div>
                                        <div class="modal-footer">


                                            <button type="button" class="btn btn-link text-gray ms-auto"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="modal-edit-{{ $items->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="modal-default" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="h6 modal-title">Edit</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('admin.advertisements.edit_client_ad', $items->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">

                                            <div class="wrapper m-auto">
                                                <ul class="list-group list-group-flush">

                                                    <label> From </label>
                                                    <input name="from" value="{{ $items->from }}" type="date" class="form-control" /><br>

                                                    <input name="client_type" value="{{ $items->client_type }}" hidden />

                                                    <label> To </label>
                                                    <input name="to" value="{{ $items->to }}" type="date" class="form-control" /><br>

                                                    <label>Activation</label>
                                                    <select name="activation" class="form-control">
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select><br>
                                                </ul>
                                            </div>

                                        </div>
                                        <div class="modal-footer">


                                            <button type="submit" class="btn btn-primary">
                                                Update
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
            </tbody>
        </table>
    </div>

    {{-- table --}}
@endsection
