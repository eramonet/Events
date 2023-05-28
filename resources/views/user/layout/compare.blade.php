@extends('user.layout.guest')
@section('title') Compare @endsection
@section('content')

    <!-- section start -->
    <section class="compare-section section-b-space ratio_asos">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if ($compare_list->count() == 0)
                        <h3 style="text-align: center">{{ __('trans.empty compare list') }}</h3>
                    @else
                        <div class="slide-4 no-arrow">

                            @foreach ($compare_list as $compare_list)
                                <div>
                                    <div class="compare-part">
                                        <button type="button" class="close-btn">
                                            <a href="{{ url('delete-item-compare/' . $compare_list->id) }}"><span
                                                    aria-hidden="true">×</span></a>
                                        </button>
                                        <div class="img-secton">
                                            <div>
                                                <img src="{{ $compare_list->product->primary_image_url }}"
                                                    class="img-fluid blur-up lazyload bg-img" alt="">
                                            </div>
                                            <a>
                                                <h5>@if(session()->get('locale') == 'en'){{ $compare_list->product->title_en }}@else{{ $compare_list->product->title_ar }}@endif -  {{ $compare_list->fake_price }}</h5>
                                            </a>
                                            <h5>{{ $compare_list->product->real_price . trans('trans.EGP') }} <del>{{ $compare_list->product->fake_price <= $compare_list->product->real_price ? '' : $compare_list->product->fake_price . " EGP"}}</del></h5>
                                        </div>
                                        <div class="detail-part">
                                            <div class="title-detail">
                                                <h5>{{ __('trans.description') }}</h5>
                                            </div>
                                            <div class="inner-detail">
                                                <p>@if(session()->get('locale') == 'en') {{ $compare_list->product->description_en ? $compare_list->product->description_en : 'no description' }} @else {{ $compare_list->product->description_ar ? $compare_list->product->description_ar : 'لا توجد تفاصيل' }} @endif
                                                </p>
                                            </div>
                                        </div>
                                        <div class="detail-part">
                                            <div class="title-detail">
                                                <h5>{{ __('trans.Category') }}</h5>
                                            </div>
                                            <div class="inner-detail">
                                                <p>@if(session()->get('locale') == 'en'){{ $compare_list->product->category->title_en }}@else{{ $compare_list->product->category->title_ar }}@endif</p>
                                            </div>
                                        </div>
                                        <div class="detail-part">
                                            <div class="title-detail">
                                                <h5>{{ __('trans.size') }}</h5>
                                            </div>
                                            <div class="inner-detail">
                                                @if ($compare_list->product->sizes->count() > 0)
                                                    @foreach ($compare_list->product->sizes as $size)
                                                        <p> {{ $size->name }} </p>
                                                    @endforeach
                                                @else
                                                {{ __('trans.not have any sizes') }}
                                                @endif

                                            </div>
                                        </div>
                                        <div class="detail-part">
                                            <div class="title-detail">
                                                <h5>{{ __('trans.color') }}</h5>
                                            </div>
                                            <div class="inner-detail">
                                                @if ($compare_list->product->colors->count() > 0)
                                                    <div style="overflow-x: scroll">
                                                        @foreach ($compare_list->product->colors as $color)
                                                            <span style="background-color: {{ $color->code }}; padding:10px; margin-right:10px"></span>
                                                        @endforeach
                                                    </div>
                                                @else
                                                {{ __('trans.not have any sizes') }}
                                                @endif
                                            </div>
                                        </div>
                                        <div class="detail-part">
                                            <div class="title-detail">
                                                <h5>{{ __('trans.material') }}</h5>
                                            </div>
                                            <div class="inner-detail">
                                                <p>{{ $compare_list->product->material ? $compare_list->product->material : 'not have material' }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="detail-part">
                                            <div class="title-detail">
                                                <h5>{{ __('trans.availability') }}</h5>
                                            </div>
                                            <div class="inner-detail">
                                                <p> @if(session()->get('locale') == 'en') {{ $compare_list->product->stock > 0 ? 'In Stock' : 'Out Of Stock' }} @else {{ $compare_list->product->stock > 0 ? 'متاح للبيع' : 'غير متاح للبيع' }} @endif </p>
                                            </div>
                                        </div>
                                        <div class="btn-part">
                                            @if ($compare_list->product->stock > 0)
                                                <a style="cursor: pointer" onclick="add_to_cart_list({{ $compare_list->product->id }})" class="btn btn-solid">{{ __('trans.add to cart') }}</a>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->



@endsection
