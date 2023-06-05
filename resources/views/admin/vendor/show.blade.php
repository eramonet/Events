@extends('layouts.admin.master')
@section('title')
 
{{ $vendor->title_en }} Information
@endsection

@section('content')
<div class="card mb-4">
    <div class="card-header">
        {{ $vendor->title_en }} Information
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
                                    <img class="model-img" src="{{ $vendor->image_url }}" width="150px">
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Name : {{ $vendor->title_en }} </li>
                                    <li class="list-group-item">Email : {{ $vendor->email }} </li>
                                    <li class="list-group-item">Phone : {{ $vendor->phone }} </li>
                                    <li class="list-group-item">Can Add Products : {{ $vendor->can_add_products }} </li>
                                    <li class="list-group-item">Can Add Halls : {{ $vendor->can_add_halls }} </li>
                                    <li class="list-group-item">Our Commission : {{ $vendor->commission . ' %' }} </li>
                                    <li class="list-group-item">Type : {{ $vendor->type }} </li>
                                    <li class="list-group-item">Account Type : {{ $vendor->account }} </li>

                                    @if ($vendor->account == 'company')
                                    <li class="list-group-item">Tax Number : {{ $vendor->Tax_Number }} </li>
                                    <li class="list-group-item">Commercial Registration Number :
                                        {{ $vendor->commercial_registration_number }} </li>
                                    <li class="list-group-item">Tax Number Expiration Date :
                                        {{ $vendor->Tax_Number_expiration_date }} </li>
                                    @endif

                                    <li class="list-group-item">Country :
                                        {{ $vendor->country ? $vendor->country->title_en : '---' }} </li>
                                    <li class="list-group-item">City :
                                        {{ $vendor->city ? $vendor->city->title_en : '---' }} </li>
                                    <li class="list-group-item">Region :
                                        {{ $vendor->region ? $vendor->region->title_en : '---' }} </li>

                                    <li class="list-group-item">Added Date : <i
                                            class="fas fa-calendar-week text-info"></i>
                                        {{ \Carbon\Carbon::parse($vendor->created_at)->format('d/m/Y') }} </li>
                                    <li class="list-group-item">Added Time : <i class="fas fa-clock text-success"></i>
                                        {{ \Carbon\Carbon::parse($vendor->created_at)->format('h:i:s A') }}</li>

                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-6">
                    <div class="card my-4">
                        <div class="card-header">
                            Vendor Statistics
                        </div>
                        <div class=" card-body ">


                            <div class="d-flex justify-content-center align-items-center flex-wrap">
                                <div
                                    class="card card-body px-1 py-3 mx-4 p bg-info   rounded my-3 order-statistics  position-relative">

                                    <h1 style="color: #fff; font-size: 30px;">
                                        {{ $vendor->products->count() }}
                                    </h1>


                                    <span class="d-block " style=" font-size:13px ; color:#fff">Products
                                        Count</span>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center align-items-center flex-wrap">
                                <div
                                    class="card card-body px-1 py-3 mx-4 p bg-primary   rounded my-3 order-statistics  position-relative">

                                    <h1 style="color: #fff; font-size: 30px;">
                                        {{ $vendor->halls->count() }}
                                    </h1>


                                    <span class="d-block " style=" font-size:13px ; color:#fff">Halls Count</span>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center align-items-center flex-wrap">
                                <div
                                    class="card card-body px-1 py-3 mx-4 p bg-success   rounded my-3 order-statistics  position-relative">

                                    <h1 style="color: #fff; font-size: 30px;">
                                        {{ $vendor->promo_codes->count() }}
                                    </h1>


                                    <span class="d-block " style=" font-size:13px ; color:#fff">Promo Codes</span>
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
=======
</div>
{{-- on top --}}
@endsection
 