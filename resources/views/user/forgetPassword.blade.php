@extends('user.layout.guest')
@section('title') Forget Password @endsection
@section('content')
  <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>forget password</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('trans.Home') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/login') }}">{{ __('trans.login') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('trans.forget password') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--section start-->
    <section class="pwd-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <h2>Forget Your Password</h2>
                    <form class="theme-form" method="POST" action="{{ route("give_email") }}">
                        @csrf
                        <div class="form-row row">
                            <div class="col-md-12">
                                <input type="email" class="form-control" id="email" placeholder="Enter Your Email"
                                    required="" name="email">
                            </div><button type="submit" class="btn btn-solid w-auto">{{ __('trans.Submit') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->




@endsection
