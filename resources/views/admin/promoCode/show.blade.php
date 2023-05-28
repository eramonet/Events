@extends('layouts.admin.master')
@section('title')
    {{ $promo_code->title_en }} Information
@endsection

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ $promo_code->title_en }} Information
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
                                        <li class="list-group-item">Name : {{ $promo_code->title }} </li>

                                        <li class="list-group-item">Expiration Date : {{ $promo_code->expiration_date }} </li>

                                        <li class="list-group-item">Type : {{ $promo_code->type }} </li>

                                        <li class="list-group-item">Value : {{ $promo_code->type == "percent" ? $promo_code->value . " %" : $promo_code->value . " AED" }} </li>

                                        <li class="list-group-item">Dedicated To : {{ $promo_code->dedicated_to }} </li>
                                        
                                        @if( $promo_code->dedicated_to == "spacial_user" )
                                            <li class="list-group-item">User : {{ $promo_code->user->email }} </li>
                                        @elseif( $promo_code->dedicated_to == "product" )
                                            <li class="list-group-item">Product : {{ $promo_code->product->title_en }} </li>
                                        @endif
                                        <li class="list-group-item">Added Date : <i
                                                class="fas fa-calendar-week text-info"></i>
                                            {{ \Carbon\Carbon::parse($promo_code->created_at)->format('d/m/Y') }} </li>
                                        <li class="list-group-item">Added Time : <i class="fas fa-clock text-success"></i>
                                            {{ \Carbon\Carbon::parse($promo_code->created_at)->format('h:i:s A') }}</li>

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
