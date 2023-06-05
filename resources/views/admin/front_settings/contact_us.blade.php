@extends('layouts.admin.master')
@section('title')
    Footer Contact Us
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
                    <li class="breadcrumb-item active" aria-current="page">Footer Contact Us</li>
                </ol>
            </nav>
            <h2 class="h4">Footer Contact Us</h2>
            <div style="margin: auto">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>






    {{-- on top --}}




    {{-- table --}}
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <table class="table table-hover table-centered table-striped table-bordered text-center ">
            <thead>
                <tr>
                    <th class="border-gray-200">Phone</th>
                    <th class="border-gray-200">Email</th>
                    <th class="border-gray-200">Address [En]</th>
                    <th class="border-gray-200">Address [Ar]</th>
                    <th class="border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Item -->

                @foreach ($items as $items)
                    <tr>


                        <td>
                            <p class="text-nowrap"> {{ $items->phone }} </p>
                        </td>

                        <td>
                            <p class="text-nowrap"> {{ $items->email }} </p>
                        </td>

                        <td>
                            <p class="text-nowrap"> {{ $items->address_en }} </p>
                        </td>

                        <td>
                            <p class="text-nowrap"> {{ $items->address_ar }} </p>
                        </td>




                        <td>



                            <div class="d-flex  align-items-center justify-content-center flex-md-nowrap">


                                <div class="">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                        <button class="btn btn-primary  m-1" data-bs-toggle="modal"
                                            data-bs-target="#modal-{{ $items->id }}" class=""><span
                                                class="fas fa-edit "></span>
                                        </button>
                                    </div>
                                </div>








                            </div>






                        </td>











                        <div class="modal fade" id="modal-{{ $items->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="modal-default" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="h6 modal-title">Edit</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form
                                        action="{{ route('admin.front-settings.edit_contact_us_footer', $items->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">

                                            <div class="wrapper m-auto">

                                                <ul class="list-group list-group-flush">
                                                    <label> Phone </label>
                                                    <input type="number" name="phone"
                                                        value="{{ $items->phone }}" class="form-control"><br>
                                                    <label> Email </label>
                                                    <input type="text" name="email"
                                                        value="{{ $items->email }}" class="form-control"><br>
                                                    <label> Address Arabic </label>
                                                    <input type="text" name="address_ar"
                                                        value="{{ $items->address_ar }}" class="form-control"><br>
                                                    <label> Address English </label>
                                                    <input type="text" name="address_en"
                                                        value="{{ $items->address_en }}" class="form-control"><br>
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








            </tbody>
        </table>
        <div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
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
