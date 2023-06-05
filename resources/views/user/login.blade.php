@extends('layouts.site.master')
@section('title')
    Login | Events
@endsection

@section('content')
    @php
        $lang = session()->get('locale');
    @endphp
    <!-- ------------------ start landing page ---------------------------- -->
    <!-- ------------------ start loading page page---------------------------- -->
    <div class="loadingPage active">
        <div class="wrapper">
            <div class="loader"></div>
        </div>
    </div>
    <!-- ------------------ end loading page page---------------------------- -->

    <!-- ------------------ start landing page---------------------------- -->
    <section class="landingPage" data-aos="fade-right" data-aos-offset="" data-aos-duration="2000">
        <img src="{{ asset('user_assets/images/login/login.png') }}" alt="" />
        <div class="over d-flex">
            <h2>log in</h2>
        </div>
    </section>
    <br><br>
    @if ($lang == "en")
    <div style="margin-top: 30px; width: 50%; margin: auto ; ">
    @else
    <div style="margin-top: 30px; width: 50%; margin: auto ; text-align: right;">
    @endif

        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endforeach
    </div>
    <!-- ------------------ end landing page---------------------------- -->
    @if ($lang == 'en')
    <div style="margin-top: 30px; width: 50%; margin: auto ; ">
    @else
    <div style="margin-top: 30px; width: 50%; margin: auto ; text-align: right;">
    @endif
        @if (Session::get('success', false))
            <?php $data = Session::get('success'); ?>
            @if (is_array($data))
                @foreach ($data as $msg)
                    <div class="alert alert-warning" role="alert">
                        <i class="fa fa-check"></i>
                        {{ $msg }}
                    </div>
                @endforeach
            @else
                <div class="alert alert-warning" role="alert">
                    <i class="fa fa-check"></i>
                    {{ $data }}
                </div>
            @endif
        @endif
    </div>
    <!-- ------------------ start login section---------------------------- -->
    <section class="login" data-aos="fade-up" data-aos-offset="" data-aos-duration="2000">
        <div class="content" style="border: 1px solid #000">
            <header>
                <h2>log in with</h2>
            </header>
            <form action="{{ url('login-action') }}" method="post">
                @csrf
                <div class="input">
                    <label for="email">email</label>
                    <input type="email" name="email" id="email" placeholder="abcdef@gmail.com" value="{{ old('email') }}" />
                    <div class="notification alert alert-danger">Error</div>
                </div>
                <div class="input passwordFild">
                    <label for="password">Password</label>
                    <div>
                        <input type="password" name="password" id="password" value="{{ old('password') }}" placeholder="6-20 words"  />
                        <!-- <i class="fas fa-eye"></i> -->
                        <i class="far fa-eye-slash"></i>
                    </div>
                    <div class="notification alert alert-danger">Error</div>
                </div>
                <a href="">Forgot your password?</a>
                <button>Sign in</button>
                <span>or</span>
                <span>Sign in with Facebook</span>
                <label for="Sign in with Facebook"></label>
                <button>Facebook</button>
                <button>Sign in with Gmail</button>
            </form>
            <div class="dontHaveAcount">
                <span>Don’t have an account?</span> <a href="{{ url('sign-up') }}">Sign up</a>
            </div>
        </div>
    </section>

    <br><br><br>
@endsection
