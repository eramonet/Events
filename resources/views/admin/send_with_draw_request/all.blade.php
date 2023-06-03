@extends('layouts.admin.master')
@section('title')
    All Withdraw Transactions
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
                    <li class="breadcrumb-item active" aria-current="page">All Withdraw Transactions</li>
                </ol>
            </nav>

        </div>
    </div>






    {{-- on top --}}



    {{-- table --}}
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Search Filters
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                data-bs-parent="#accordionPricing">
                <div class="accordion-body card card-body ">


                    <form action="{{ route('admin.with-draw-request.filter_all') }}" method="Get">
                        @csrf
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">

                                        <label for="limit">Select Status</label>

                                        <select class="form-control mb-3" aria-label="Default" name="status">
                                            <option value="">Choose----</option>
                                            <option value="pending">New</option>
                                            <option value="accepted">Accepted</option>
                                            <option value="rejected">Rejected</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">

                                        <label for="limit">From</label>

                                        <input type="date" name="from" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">

                                        <label for="limit">To</label>

                                        <input type="date" name="to" class="form-control">
                                    </div>
                                </div>



                                <div class="col-12">

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary ">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>



                </div>
                </form>
            </div>
        </div>
    </div><br><br><br>

    <table class="table table-hover table-centered table-striped table-bordered text-center">
        <thead>
            <tr>
                <th class="border-gray-200">Request Date </th>
                <th class="border-gray-200">Transaction From </th>
                <th class="border-gray-200">Creator Name </th>
                <th class="border-gray-200">Sent To </th>
                <th class="border-gray-200">Value</th>
                <th class="border-gray-200">Notes</th>
                <th class="border-gray-200">Status</th>
                <th class="border-gray-200">Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Item -->
            @foreach ($withdraw as $item)
                <tr>
                    <td>
                        <p class="text-nowrap">{{ $item->created_at }}</p>
                    </td>
                    <td>
                        <p class="text-nowrap">{{ $item->type == "from_admin" ? "From Events" : "From Vendor" }}</p>
                    </td>
                    <td>
                        <p class="text-nowrap">{{ $item->type == "from_vendor" ? $item->vendor->title_en : "Events" }}</p>
                    </td>
                    <td>
                        <p class="text-nowrap">{{ $item->admin->title_en }}</p>
                    </td>
                    <td>
                        <p class="text-nowrap">{{ number_format($item->budget) }} AED</p>
                    </td>
                    <td>
                        <p class="text-nowrap">{{ $item->notes ? $item->notes : '-----' }}</p>
                    </td>

                    <td>
                        @if ($item->status == 'pending')
                            <p class="text-nowrap" style="color: blue; font-weight: bold">New</p>
                        @elseif ($item->status == 'accepted')
                            <p class="text-nowrap" style="color: green; font-weight: bold">Accepted</p>
                        @else
                            <p class="text-nowrap" style="color: red; font-weight: bold">Rejected</p>
                        @endif
                    </td>

                    <td>
                        @if ($item->status == 'pending')
                            <form style="display: contents" class="action_btn"
                                data-message="Are You Sure You Want To Send Money ?"
                                action="{{ route('admin.with-draw-request.accept_money', $item->id) }}" method="POST">
                                @csrf
                                <button style="font-size: 16px" type="submit" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Send Money" type="submit"
                                    class="btn btn-success text-white  m-1">
                                    <span class="fas fa-check-double "></span>
                                </button>
                            </form>

                            <form style="display: contents" class="action_btn"
                                data-message="Are You Sure You Want To Reject This Request ?"
                                action="{{ route('admin.with-draw-request.reject_money', $item->id) }}" method="POST">
                                @csrf
                                <button type="submit" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Reject Request" type="submit" class="btn btn-danger text-white  m-1"
                                    style="font-size: 16px">
                                    <span class="fas fa-times"></span>
                                </button>
                            </form>
                        @else
                            ------
                        @endif
                    </td>
                </tr>
            @endforeach
            <!-- Item -->
        </tbody>
    </table>

    <div class="alert my-4 text-center text-white" style="background: #1f2937">
        <p class="h2">Total Sent Money <span class="badge badge-lg bg-success "
            style="font-size: 30px">{{ number_format($total) }}
        </span> AED </p>






    </div>

    {{-- table --}}
@endsection
