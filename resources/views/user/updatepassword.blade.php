@extends('user.layout.guest')
@section('title') Update Password @endsection
@section('content')
  <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{ __('trans.forget password') }}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">{{ __('trans.Home') }}</a></li>
                            <li class="breadcrumb-item"><a href="login.html">{{ __('trans.login') }}</a></li>
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
                    <h2>{{ __('trans.Forget Your Password') }}</h2>
                    <form class="theme-form" method="POST" action="{{route('updatepassword')}}">
                        @csrf
                          <input type="hidden" name="id" value="{{$id}}">
                          <div class="form-row row">
                            <div class="col-md-12">
                                <label class="col-form-label">{{ __('trans.new password') }}</label>
                          <input class="form-control" type="password" name="password" placeholder="*****">
                                <label class="col-form-label">{{ __('trans.confirm new password') }}</label>
                          <input class="form-control" type="password" name="password_confirmation" placeholder="*****">

                            </div><button type="submit" class="btn btn-solid w-auto">{{ __('trans.Submit') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->




@endsection
