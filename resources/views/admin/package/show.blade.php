@extends('layouts.admin.master')
@section('title')
    {{ $package->title_en }} Information
@endsection

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ $package->title_en }} Information
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
                                    <div class="d-flex mb-2">
                                        <img class="model-img" src="{{ $package->image_url }}" width="150px">
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Hall Name [Ar] : {{ $package->hall->title_ar }} </li>

 
                                        <li class="list-group-item">Hall Name [En] : {{ $package->hall->title_en }} </li>
                                         <li class="list-group-item">Hall Name [Ar] : {{ $package->hall->title_ar }} </li>
 

                                        <li class="list-group-item">Added By :
                                            @if ($package->admin)
                                                Events
                                            @elseif($package->vendor)
                                                {{ $package->vendor->title_en }}
                                            @endif
                                        </li>


                                        <li class="list-group-item">Name [Ar] : {{ $package->title_ar }} </li>

                                        <li class="list-group-item">Name [En] : {{ $package->title_en }} </li>

                                        <li class="list-group-item">Summary [Ar] : {!! $package->summary_ar !!} </li>

                                        <li class="list-group-item">Summary [En] : {!! $package->summary_en !!} </li>

                                        <li class="list-group-item">Description [Ar] : {!! $package->description_ar !!} </li>

                                        <li class="list-group-item">Description [En] : {!! $package->description_en !!} </li>

                                        <li class="list-group-item">Photographer [En] : {!! $package->photographer !!} </li>

                                        <li class="list-group-item">Extra Guest Price :
                                            {{ number_format($package->extra_guest_price) }} AED </li>

                                        <li class="list-group-item">Number Of Tables :
                                            {{ number_format($package->number_of_tables) }} Table </li>

                                        <li class="list-group-item">Number Of Guests :
                                            {{ number_format($package->number_of_guests) }} Guest </li>

                                        <li class="list-group-item">Price : {{ number_format($package->real_price) }} AED
                                        </li>

                                        <li class="list-group-item">Meal Description [Ar] : {!! $package->meal_description_ar !!} </li>

                                        <li class="list-group-item">Meal Description [En] : {!! $package->meal_description_ar !!} </li>

                                        <li class="list-group-item">Lighting Description [Ar] : {!! $package->lighting_description_ar !!}
                                        </li>

                                        <li class="list-group-item">Lighting Description [En] : {!! $package->lighting_description_en !!}
                                        </li>


                                        <li class="list-group-item">Sound Description [Ar] : {!! $package->sound_description_ar !!} </li>

                                        <li class="list-group-item">Sound Description [En] : {!! $package->sound_description_en !!} </li>

                                        <li class="list-group-item">Plan Of Day Description [Ar] : {!! $package->plan_of_the_day_description_ar !!}
                                        </li>

                                        <li class="list-group-item">Plan Of Day Description [En] : {!! $package->plan_of_the_day_description_en !!}
                                        </li>

                                        <li class="list-group-item">Flowers Description [Ar] : {!! $package->flowers_description_ar !!}
                                        </li>

                                        <li class="list-group-item">Flowers Description [En] : {!! $package->flowers_description_en !!}
                                        </li>

                                        <li class="list-group-item">Descoration Description [Ar] : {!! $package->decoration_description_ar !!}
                                        </li>

                                        <li class="list-group-item">Descoration Description [En] : {!! $package->decoration_description_en !!}
                                        </li>

                                        <li class="list-group-item">Taxes :
                                            @foreach ($package->taxes as $tax)
                                                <a>
                                                    <span class="badge bg-primary">
                                                        {{ ucfirst($tax->title_en) . ' ' . $tax->percentage . '%' }}
                                                    </span>
                                                </a>
                                            @endforeach
                                        </li>

                                        <li class="list-group-item">Added Date : <i
                                                class="fas fa-calendar-week text-info"></i>
                                            {{ \Carbon\Carbon::parse($package->created_at)->format('d/m/Y') }} </li>
                                        <li class="list-group-item">Added Time : <i class="fas fa-clock text-success"></i>
                                            {{ \Carbon\Carbon::parse($package->created_at)->format('h:i:s A') }}</li>

                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="card my-4">
                            <div class=" card-body ">


                                {{-- <div class="d-flex justify-content-center align-items-center flex-wrap">
                                    <div
                                        class="card card-body px-1 py-3 mx-4 p bg-info   rounded my-3 order-statistics  position-relative">

                                        <h1 style="color: #fff; font-size: 30px;">
                                            {{ $package->packages->count() }} Package
                                        </h1>


                                        <span class="d-block " style=" font-size:13px ; color:#fff">All Packages</span>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center align-items-center flex-wrap">
                                    <div
                                        class="card card-body px-1 py-3 mx-4 p bg-primary   rounded my-3 order-statistics  position-relative">

                                        <h1 style="color: #fff; font-size: 30px;">
                                            {{ $package->packages->count() }} Item
                                        </h1>


                                        <span class="d-block " style=" font-size:13px ; color:#fff">All Extra
                                            Decorations</span>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center align-items-center flex-wrap">
                                    <div
                                        class="card card-body px-1 py-3 mx-4 p bg-danger   rounded my-3 order-statistics  position-relative">

                                        <h1 style="color: #fff; font-size: 30px;">
                                            {{ $package->packages->count() }} Date
                                        </h1>


                                        <span class="d-block " style=" font-size:13px ; color:#fff">All Available
                                            Dates</span>
                                    </div>
                                </div> --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="container">
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

                                                        @foreach ($package->packages as $package)
                                                            <tr>

                                                                <td>{{ $package->title_ar }}</td>
                                                                <td>{{ $package->title_en }}</td>

                                                                <td>
                                                                    <a href="{{ route('admin.halls.show', $package->id) }}"
                                                                        class="btn btn-info"><span
                                                                            class="fas fa-eye"></span></a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        <!-- Item -->
                                                    </tbody>
                                                </table>

                                                @if ($package->packages->count() < 1)
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

                                                        @foreach ($package->packages as $package)
                                                            <tr>

                                                                <td>{{ $package->title_ar }}</td>
                                                                <td>{{ $package->title_en }}</td>

                                                                <td>
                                                                    <a href="{{ route('admin.halls.show', $package->id) }}"
                                                                        class="btn btn-info"><span
                                                                            class="fas fa-eye"></span></a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        <!-- Item -->
                                                    </tbody>
                                                </table>

                                                @if ($package->packages->count() < 1)
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
                                                            <th class="border-gray-200">Title [Ar]</th>
                                                            <th class="border-gray-200">Title [En]</th>
                                                            <th class="border-gray-200">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- Item -->

                                                        @foreach ($package->packages as $package)
                                                            <tr>

                                                                <td>{{ $package->title_ar }}</td>
                                                                <td>{{ $package->title_en }}</td>

                                                                <td>
                                                                    <a href="{{ route('admin.halls.show', $package->id) }}"
                                                                        class="btn btn-info"><span
                                                                            class="fas fa-eye"></span></a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        <!-- Item -->
                                                    </tbody>
                                                </table>

                                                @if ($package->packages->count() < 1)
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
        </div> --}}
    </div>


    {{-- on top --}}
@endsection
