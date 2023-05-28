@extends('layouts.admin.master')
@section('title')
    Withdraw Sent From You
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
                    <li class="breadcrumb-item active" aria-current="page">Withdraw Sent From You</li>
                </ol>
            </nav>

        </div>
    </div>






    {{-- on top --}}
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


                    <form action="{{ route('admin.with-draw-request.filter_from_you') }}" method="GET">
                        @csrf
                        <div class="container">
                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-group">

                                        <label for="limit">From</label>

                                        <input type="date" name="from" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">

                                        <label for="limit">To</label>

                                        <input type="date" name="to" class="form-control">
                                    </div>
                                </div>

                                <div class="col-12">

                                    <div class="form-group" style="margin-top: 10px">
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

    {{-- table --}}
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <table class="table table-hover table-centered table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th class="border-gray-200">Request Date </th>
                    <th class="border-gray-200">Vendor Name </th>
                    <th class="border-gray-200">HALL BOOKING / PRODUCT ORDER </th>
                    <th class="border-gray-200"> Transaction Source </th>
                    <th class="border-gray-200"> Before Sent Money </th>
                    <th class="border-gray-200">Sent Value</th>
                    <th class="border-gray-200"> After Sent Money </th>
                    <th class="border-gray-200">Notes</th>
                    <th class="border-gray-200">Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- Item -->
                @foreach ($withdraws as $item)
                    <tr>
                        <td>
                            <p class="text-nowrap">{{ $item->created_at }}</p>
                        </td>
                        <td>
                            <p class="text-nowrap">{{ $item->vendor->title_ar }}</p>
                        </td>
                        <td>
                            <p class="text-nowrap">{{ $item->with_draw->money_type }}</p>
                        </td>
                        <td>
                            @if ( $item->with_draw->money_type == "Hall Booking" )
                                <a target="_blank" class="btn btn-info" href="{{ url('/acp/bookings/show/' . $item->with_draw->action_id) }}"> Go </a>
                            @elseif( $item->with_draw->money_type == "Product Order" )
                                <a target="_blank" class="btn btn-info" href="{{ url('acp/orders/' . $item->with_draw->order_number . '/show') }}"> Go </a>
                            @endif
                        </td>
                        <td>
                            <p class="text-nowrap">{{ $item->budget_before }}</p>
                        </td>
                        <td>
                            <p class="text-nowrap">{{ number_format($item->budget) }} AED</p>
                        </td>
                        <td>
                            <p class="text-nowrap">{{ ($item->budget_before - $item->budget) }}</p>
                        </td>
                        <td>
                            <p class="text-nowrap">{{ $item->notes ? $item->notes : "-----" }}</p>
                        </td>

                        <td>
                            <p class="text-nowrap" style="color: green; font-weight: bold">{{ $item->status }}</p>
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
