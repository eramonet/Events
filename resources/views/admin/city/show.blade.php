@extends('layouts.admin.master')
@section('title')
    {{ $city->title_en }} Information
@endsection

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ $city->title_en }} Information
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
                                        <img class="model-img" src="{{ $city->image }}" width="150px">
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Name : {{ $city->title_en }} </li>

                                        <li class="list-group-item">Regions :
                                            @foreach ($city->regions as $region)
                                                <a href="{{ route('admin.regions.show' , $region->id) }}">
                                                    <span class="badge bg-primary">
                                                        {{ ucfirst($region->title_en) }}
                                                    </span>
                                                </a>
                                            @endforeach
                                        </li>

                                        <li class="list-group-item">Added Date : <i
                                                class="fas fa-calendar-week text-info"></i>
                                            {{ \Carbon\Carbon::parse($city->created_at)->format('d/m/Y') }} </li>
                                        <li class="list-group-item">Added Time : <i class="fas fa-clock text-success"></i>
                                            {{ \Carbon\Carbon::parse($city->created_at)->format('h:i:s A') }}</li>

                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="card my-4">
                            <div class="card-header">
                                Cities Statistics
                            </div>
                            <div class=" card-body ">



                                <div class="d-flex justify-content-center align-items-center flex-wrap">
                                    <div
                                        class="card card-body px-1 py-3 mx-4 p bg-danger   rounded my-3 order-statistics  position-relative">

                                        <h1 style="color: #fff; font-size: 30px;">
                                            {{ $city->regions->count() }}
                                            </h1>


                                        <a href="{{ route('admin.regions.index') }}">
                                            <span class="d-block " style=" font-size:13px ; color:#fff">Regions Count</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center align-items-center flex-wrap">
                                    <div
                                        class="card card-body px-1 py-3 mx-4 p bg-info   rounded my-3 order-statistics  position-relative">

                                        <h1 style="color: #fff; font-size: 30px;">
                                            {{ $city->users->count() }}
                                            </h1>


                                        <a href="{{ route('admin.users.index') }}">
                                            <span class="d-block " style=" font-size:13px ; color:#fff">Users Count</span>
                                        </a>
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
