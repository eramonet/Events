@extends('layouts.admin.master')
@section('title')
    Digital Cards
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
                    <li class="breadcrumb-item active" aria-current="page">Digital Cards</li>
                </ol>
            </nav>
            <h2 class="h4">All Digital Cards</h2>

        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            {{-- <a href="#" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
                <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Create New Digital Card
            </a> --}}
        </div>
    </div>






    {{-- on top --}}



    {{-- table --}}
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="border-gray-200">ID</th>
                    <th class="border-gray-200">Card</th>
                    <th class="border-gray-200">Name</th>
                    <th class="border-gray-200">From</th>
                    <th class="border-gray-200">To</th>
                    {{-- <th class="border-gray-200">Action</th> --}}
                </tr>
            </thead>
            <tbody>
                <!-- Item -->

                @foreach ($digital_cart as $digital_cart)
                    <tr>
                        <td>{{ $digital_cart->id }}</td>

                        <td><img src="{{ asset('uploads/digital_cards/' . $digital_cart->image) }}" width="100px"></td>
                        <td>{{ $digital_cart->type }}</td>

                        <td>{{ number_format($digital_cart->from) . ' AED' }}</td>
                        <td>{{ number_format( $digital_cart->to) . ' AED' }}</td>

                        <td>

                            {{-- actions --}}
                            <div class="d-flex  align-items-center justify-content-center flex-md-nowrap">


                                <div class="">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Show Cart Details">
                                        <button class="btn btn-primary  m-1" {{-- data-bs-toggle="modal"
                                            data-bs-target="#modal-{{ $product->id }}" class="" --}}><span
                                                class="fas fa-eye "></span>
                                        </button>
                                    </div>
                                </div>


                                <div class="">
                                    @if (Auth::guard('admin')->user()->hasPermission('products-update'))
                                        <a class="btn btn-info m-1" class="dropdown-item" href="#" title="Edit Status"
                                            data-bs-toggle="tooltip" data-bs-placement="top"><span
                                                class="fas fa-edit "></span>
                                        </a>
                                    @endif
                                </div>


                                <div class="">
                                    {{-- @if (Auth::guard('admin')->user()->hasPermission('products-delete'))
                                        <form class="delete-btn m-0 p-0 " action="#" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger m-1" type="submit" title="Delete"
                                                data-bs-toggle="tooltip" data-bs-placement="top">
                                                <span class="fas fa-trash-alt "></span>
                                            </button>
                                        </form>
                                    @endif --}}

                                </div>






                            </div>
                            {{-- actions --}}






                        </td>

                    </tr>
                @endforeach
                <!-- Item -->








            </tbody>
        </table>
    </div>

    {{-- table --}}
@endsection
