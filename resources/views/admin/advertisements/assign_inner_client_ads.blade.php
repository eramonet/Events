@extends('layouts.admin.master')
@section('title')
    Assign Advertisments To Inner Clients
@endsection

@section('content')
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
                    <li class="breadcrumb-item active" aria-current="page">Assign Advertisments To Inner Clients</li>
                </ol>
            </nav>
            <h2 class="h4">Assign Advertisments To Inner Clients</h2>
            <div style="margin: auto">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <form action="{{ route('admin.advertisements.assign_client_ad') }}" method="POST" enctype="multipart/form-data">
        <div class="modal-body">

            <div class="wrapper m-auto">
                <ul class="list-group list-group-flush">
                    <label> Client</label>
                    <select name="client_id" class="form-control">
                        @foreach (App\Models\Vendor::get() as $vendor)
                            <option value="{{ $vendor->id }}"> {{ $vendor->title_en }}
                            </option>
                        @endforeach
                    </select><br>

                    <label> Advertisement </label>
                    <select name="ad_id" id="slick" class="form-control">
                        @foreach (App\Models\Advertisement::get() as $ad)
                            <option value="{{ $ad->id }}">
                                {{ $ad->name }}
                            </option>
                        @endforeach
                    </select><br>

                    <label> From </label>
                    <input name="from" type="date" class="form-control" /><br>

                    <input name="client_type" value="inner" hidden />

                    <label> To </label>
                    <input name="to" type="date" class="form-control" /><br>

                    <label>Ads nns</label>
                    <select name="location" class="form-control">
                        <option value="In Brand Page">In Brand Page</option>
                        <option value="Main Home">Main Home</option>
                        <option value="Sub Home 1">Sub Home 1</option>
                        <option value="Sub Home 2">Sub Home 2</option>
                        <option value="In Category Menu">In Category Menu</option>
                        <option value="In Brand Menu">In Brand Menu</option>
                        <option value="In Mobile App Home">In Mobile App Home</option>
                    </select><br>

                    <p style="color: red;">
                        In Brand Page
                        <span style="color: #fff; font-weight: bold; background-color: red; padding: 1px 10px; border-radius: 30px;">
                            width=209 * height=199
                        </span>
                    </p>

                    <p style="color: red;">
                        In Main Home
                        <span style="color: #fff; font-weight: bold; background-color: red; padding: 1px 10px; border-radius: 30px;">
                            width=978 * height=408
                        </span>
                    </p>
                    <p style="color: red;">
                        In Sub Home 1
                        <span style="color: #fff; font-weight: bold; background-color: red; padding: 1px 10px; border-radius: 30px;">
                            width=209 * height=199
                        </span>
                    </p>
                    <p style="color: red;">
                        In Sub Home 2
                        <span style="color: #fff; font-weight: bold; background-color: red; padding: 1px 10px; border-radius: 30px;">
                            width=209 * height=199
                        </span>
                    </p>
                    <p style="color: red;">
                        In Category Menu
                        <span style="color: #fff; font-weight: bold; background-color: red; padding: 1px 10px; border-radius: 30px;">
                            width=209 * height=199
                        </span>
                    </p>
                    <p style="color: red;">
                        In Brand Menu
                        <span style="color: #fff; font-weight: bold; background-color: red; padding: 1px 10px; border-radius: 30px;">
                            width=209 * height=199
                        </span>
                    </p>
                    <p style="color: red;">
                        In Mobile App Home
                        <span style="color: #fff; font-weight: bold; background-color: red; padding: 1px 10px; border-radius: 30px;">
                            width=209 * height=199
                        </span>
                    </p>

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
                Add
            </button>


            <button type="button" class="btn btn-link text-gray ms-auto" data-bs-dismiss="modal">Close</button>
        </div>
    </form>
@endsection
