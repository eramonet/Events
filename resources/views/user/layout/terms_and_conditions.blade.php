@extends('user.layout.guest')
@section('title') Terms And Conditions @endsection
@section('content')

<!-- section start -->
<section class="about-page section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3>{{ __('trans.Terms And Conditions') }}</h3><br><br>
                <p>@if(session()->get('locale') == 'en'){{ $terms->term_and_condition_en }}@else{{ $terms->term_and_condition_ar }}@endif</p>
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->



@endsection
