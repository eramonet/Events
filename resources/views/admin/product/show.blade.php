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
                                        <li class="list-group-item"><img src="{{ $product->primary_image_url }}" style="width: 150px"> </li>

                                        <li class="list-group-item">Name : {{ $product->title_en }} </li>

                                        <li class="list-group-item">Description : {{ $product->description_en }} </li>
                                        <li class="list-group-item">Details : {{ $product->details_en }} </li>
                                        <li class="list-group-item">Features : {{ $product->features_en }} </li>
                                        <li class="list-group-item">Instruction : {{ $product->instructions_en }} </li>

                                        <li class="list-group-item">Summary : {{ $product->summary_en }} </li>

                                        <li class="list-group-item">Extras : {{ $product->extras_en }} </li>

                                        <li class="list-group-item">Real Price : {{ $product->real_price }} </li>
                                        <li class="list-group-item">Fake Price : {{ $product->fake_price }} </li>

                                        <li class="list-group-item">Stock : {{ $product->stock }} </li>

                                        <li class="list-group-item">Added By : {{ $product->owner ? $product->owner->title_en : "Events" }} </li>

                                        <li class="list-group-item">Taxes :
                                            @foreach ($product->taxes as $tax)
                                                <a>
                                                    <span class="badge bg-primary">
                                                        {{ ucfirst($tax->tax->title_en) . " " . $tax->tax->percentage . "%" }}
                                                    </span>
                                                </a>
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
    {{-- on top --}}
@endsection
