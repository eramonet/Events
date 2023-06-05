@extends('user.layout.guest')
@section('title') About Store @endsection
@section('content')

<!-- section start -->
<section class="about-page section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-section">
                    <iframe width="100%" style="height: 400px" class="img-fluid blur-up lazyload" src="{{ $about_us->video_link }}" type="video/mp4">
                    </iframe>
                </div>
            </div>
            <div class="col-sm-12">
                <p @if(session()->get('locale') == 'ar') style="text-align:right" @endif >@if(session()->get('locale') == 'en'){{ $about_us->about_us_en }}@else{{ $about_us->about_us_ar }}@endif</p>
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->



@endsection
