@extends('layouts.admin.master')
@section('title')
    {{ $hall->title_en }} Information
@endsection

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ $hall->title_en }} Information
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
                                        <img class="model-img" src="{{ $hall->primary_image_url }}" width="150px">
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Name [Ar] : {{ $hall->title_ar }} </li>

                                        <li class="list-group-item">Name [En] : {{ $hall->title_en }} </li>

                                        <li class="list-group-item">Summary [Ar] : {!! $hall->summary_ar !!} </li>

                                        <li class="list-group-item">Summary [En] : {!! $hall->summary_en !!} </li>

                                        <li class="list-group-item">Description [Ar] : {!! $hall->description_ar !!} </li>

                                        <li class="list-group-item">Description [En] : {!! $hall->description_en !!} </li>

                                        <li class="list-group-item">Address [Ar] : {!! $hall->address_ar !!} </li>

                                        <li class="list-group-item">Address [En] : {!! $hall->address_en !!} </li>

                                        <li class="list-group-item">Latitude : {!! $hall->latitude !!} </li>

                                        <li class="list-group-item">langitude : {!! $hall->longitude !!} </li>

                                        <li class="list-group-item">Real Price : {{ $hall->real_price }} AED</li>
                                        <li class="list-group-item">Fake Price : {{ $hall->real_price }} AED </li>
                                        <li class="list-group-item">Offer Ended At : {{ $hall->offer_end_at }} </li>

                                        <li class="list-group-item">Taxes :
                                            @foreach ($hall->taxes as $tax)
                                                <a>
                                                    <span class="badge bg-primary">
                                                        {{ ucfirst($tax->title_en) . ' ' . $tax->percentage . '%' }}
                                                    </span>
                                                </a>
                                            @endforeach
                                        </li>

                                        <li class="list-group-item">Status :
                                            @if ($hall->accept == 'new')
                                                <span style="color: blue">New</span>
                                            @elseif ($hall->accept == 'accepted')
                                                <span style="color: green">Accepted</span>
                                            @elseif($hall->accept == 'rejected')
                                                <span style="color: red">Rejected</span>
                                            @endif
                                        </li>

                                        <li class="list-group-item">Added Date : <i
                                                class="fas fa-calendar-week text-info"></i>
                                            {{ \Carbon\Carbon::parse($hall->created_at)->format('d/m/Y') }} </li>
                                        <li class="list-group-item">Added Time : <i class="fas fa-clock text-success"></i>
                                            {{ \Carbon\Carbon::parse($hall->created_at)->format('h:i:s A') }}</li>

                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="card my-4">
                            <div class=" card-body ">


                                <div class="d-flex justify-content-center align-items-center flex-wrap">
                                    <div
                                        class="card card-body px-1 py-3 mx-4 p bg-info   rounded my-3 order-statistics  position-relative">

                                        <h1 style="color: #fff; font-size: 30px;">
                                            {{ $hall->packages->count() }} Package
                                        </h1>


                                        <span class="d-block " style=" font-size:13px ; color:#fff">All Packages</span>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center align-items-center flex-wrap">
                                    <div
                                        class="card card-body px-1 py-3 mx-4 p bg-primary   rounded my-3 order-statistics  position-relative">

                                        <h1 style="color: #fff; font-size: 30px;">
                                            {{ $hall->extra_decorations->count() }} Item
                                        </h1>


                                        <span class="d-block " style=" font-size:13px ; color:#fff">All Extra
                                            Decorations</span>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center align-items-center flex-wrap">
                                    <div
                                        class="card card-body px-1 py-3 mx-4 p bg-danger   rounded my-3 order-statistics  position-relative">

                                        <h1 style="color: #fff; font-size: 30px;">
                                            {{ $hall->available_dates->count() }} Date
                                        </h1>


                                        <span class="d-block " style=" font-size:13px ; color:#fff">All Available
                                            Dates</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            All Packages
                        </div>
                        <div class="card-body">

                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card my-4">
                                            <div class="card card-body border-0 shadow table-wrapper table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th class="border-gray-200">Title [Ar]</th>
                                                            <th class="border-gray-200">Title [En]</th>
                                                            <th class="border-gray-200">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- Item -->

                                                        @foreach ($hall->packages as $package)
                                                            <tr>

                                                                <td>{{ $package->title_ar }}</td>
                                                                <td>{{ $package->title_en }}</td>

                                                                <td>
                                                                    <a href="{{ route('admin.packages.show', $package->id) }}"
                                                                        class="btn btn-info"><span
                                                                            class="fas fa-eye"></span></a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        <!-- Item -->
                                                    </tbody>
                                                </table>

                                                @if ($hall->packages->count() < 1)
                                                    <div class="d-flex justify-content-center" style="min-height: 300px">
                                                        Empty
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            All Extra Decorations
                        </div>
                        <div class="card-body">

                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card my-4">
                                            <div class="card card-body border-0 shadow table-wrapper table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th class="border-gray-200">Title [Ar]</th>
                                                            <th class="border-gray-200">Title [En]</th>
                                                            <th class="border-gray-200">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- Item -->

                                                        @foreach ($hall->extra_decorations as $package)
                                                            <tr>

                                                                <td>{{ $package->title_ar }}</td>
                                                                <td>{{ $package->title_en }}</td>

                                                                <td>
                                                                    <a href="{{ route('admin.packages-options-categories.show', $package->id) }}"
                                                                        class="btn btn-info"><span
                                                                            class="fas fa-eye"></span></a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        <!-- Item -->
                                                    </tbody>
                                                </table>

                                                @if ($hall->packages->count() < 1)
                                                    <div class="d-flex justify-content-center" style="min-height: 300px">
                                                        Empty
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            All Available Dates
                        </div>
                        <div class="card-body">

                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card my-4">
                                            <div class="card card-body border-0 shadow table-wrapper table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th class="border-gray-200">Date</th>
                                                            <th class="border-gray-200">From</th>
                                                            <th class="border-gray-200">To</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- Item -->

                                                        @foreach ($hall->available_dates as $package)
                                                            <tr>

                                                                <td>{{ $package->available_date }}</td>
                                                                <td>{{ $package->time_from }}</td>
                                                                <td>{{ $package->time_to }}</td>
                                                            </tr>
                                                        @endforeach
                                                        <!-- Item -->
                                                    </tbody>
                                                </table>

                                                @if ($hall->packages->count() < 1)
                                                    <div class="d-flex justify-content-center" style="min-height: 300px">
                                                        Empty
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- on top --}}
@endsection
