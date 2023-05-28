@extends('layouts.admin.master')
@section('title')
    {{ $shipping->text_en }} Information
@endsection

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ $shipping->text_en }} Information
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
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Name : {{ $shipping->text_en }} </li>
                                        <li class="list-group-item">Cost : {{ number_format($shipping->cost) . " AED" }} </li>
                                        <li class="list-group-item">Added Date : <i
                                                class="fas fa-calendar-week text-info"></i>
                                            {{ \Carbon\Carbon::parse($shipping->created_at)->format('d/m/Y') }} </li>
                                        <li class="list-group-item">Added Time : <i class="fas fa-clock text-success"></i>
                                            {{ \Carbon\Carbon::parse($shipping->created_at)->format('h:i:s A') }}</li>

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
