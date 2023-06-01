@extends('layouts.admin.master')
@section('title')
    {{ $package_option->title_en }} Information
@endsection

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ $package_option->title_en }} Information
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
                                        <img class="model-img" src="{{ $package_option->image_url }}" width="150px">
                                    </div>
                                    <ul class="list-group list-group-flush">

                                        <li class="list-group-item">Added By :
                                            @if ($package_option->admin)
                                                Events
                                            @elseif($package_option->vendor)
                                                {{ $package_option->vendor->title_en }}
                                            @endif
                                        </li>


                                        <li class="list-group-item">Name [Ar] : {{ $package_option->title_ar }} </li>

                                        <li class="list-group-item">Name [En] : {{ $package_option->title_en }} </li>

                                        <li class="list-group-item">Price : {{ $package_option->price }} AED </li>


                                        <li class="list-group-item">Added Date : <i
                                                class="fas fa-calendar-week text-info"></i>
                                            {{ \Carbon\Carbon::parse($package_option->created_at)->format('d/m/Y') }} </li>
                                        <li class="list-group-item">Added Time : <i class="fas fa-clock text-success"></i>
                                            {{ \Carbon\Carbon::parse($package_option->created_at)->format('h:i:s A') }}</li>

                                    </ul>
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
