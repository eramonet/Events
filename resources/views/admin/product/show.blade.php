@extends('layouts.admin.master')
@section('title')
    {{ $product->title_en }} Information
@endsection

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ $product->title_en }} Information
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
                                        <li class="list-group-item"><img src="{{ $product->primary_image_url }}"
                                                style="width: 150px"> </li>

                                        <li class="list-group-item">Name En : {{ $product->title_en }} </li>

                                        <li class="list-group-item">Name Ar : {{ $product->title_ar }} </li>

                                        <li class="list-group-item">Description En : {{ $product->description_en }} </li>
                                        <li class="list-group-item">Description Ar : {{ $product->description_ar }} </li>

                                        <li class="list-group-item">Details En : {!! $product->details_en !!} </li>
                                        <li class="list-group-item">Features En : {!! $product->features_en !!} </li>
                                        <li class="list-group-item">Instruction En : {!! $product->instructions_en !!} </li>

                                        <li class="list-group-item">Summary En : {!! $product->summary_en !!} </li>

                                        <li class="list-group-item">Extras En : {!! $product->extras_en !!} </li>


                                        <li class="list-group-item">Details Ar : {!! $product->details_ar !!} </li>
                                        <li class="list-group-item">Features Ar : {!! $product->features_ar !!} </li>
                                        <li class="list-group-item">Instruction Ar : {!! $product->instructions_ar !!} </li>

                                        <li class="list-group-item">Summary Ar : {!! $product->summary_ar !!} </li>

                                        <li class="list-group-item">Extras Ar : {!! $product->extras_ar !!} </li>

                                        <li class="list-group-item">Real Price : {{ $product->real_price . ' AED' }} </li>
                                        <li class="list-group-item">Fake Price : {{ $product->fake_price . ' AED' }} </li>

                                        <li class="list-group-item">Offet Ended At : {{ $product->stock }} Item </li>

                                        <li class="list-group-item">Stock : {{ $product->stock }} Item </li>

                                        <li class="list-group-item">Added By :
                                            {{ $product->owner ? $product->owner->title_en : 'Events' }} </li>

                                        <li class="list-group-item">Taxes :
                                            @foreach ($product->taxes as $tax)
                                                <a>
                                                    <span class="badge bg-primary">
                                                        {{ ucfirst($tax->tax->title_en) . ' ' . $tax->tax->percentage . '%' }}
                                                    </span>
                                                </a>
                                            @endforeach
                                        </li>

                                        <li class="list-group-item">Occasions :
                                            @foreach ($product->occasions as $occasion)
                                                <span class="badge bg-primary">
                                                    {{ $occasion->title_en }}
                                                </span>
                                            @endforeach
                                        </li>


                                        <li class="list-group-item">Added Date : <i
                                                class="fas fa-calendar-week text-info"></i>
                                            {{ \Carbon\Carbon::parse($product->created_at)->format('d/m/Y') }} </li>
                                        <li class="list-group-item">Added Time : <i class="fas fa-clock text-success"></i>
                                            {{ \Carbon\Carbon::parse($product->created_at)->format('h:i:s A') }}</li>

                                    </ul>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (Auth::guard('admin')->user()->hasRole('super-admin') || Auth::guard('admin')->user()->hasRole('admin'))
        @if (Auth::guard('admin')->user()->hasPermission('product_request-update'))
            @if ($product->accept == 'new')
                <div class="card my-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-center flex-wrap">
                            <a style="color: #fff" class="btn btn-success m-1"
                                href="{{ route('admin.product_request.product_request_accept', $product->id) }}" title=""
                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Accept">
                                Accept
                            </a>
                            <a style="color: #fff" class="btn btn-danger m-1"
                                href="{{ route('admin.product_request.product_request_reject', $product->id) }}" title=""
                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Reject">
                                Reject

                            </a>


                        </div>
                    </div>
                </div>
            @endif
        @endif
    @endif
    {{-- on top --}}
@endsection
