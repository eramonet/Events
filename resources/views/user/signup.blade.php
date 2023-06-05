@extends('layouts.site.master')
@section('title')
    Sign Up | Events
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
        <img src="{{ asset('user_assets/images/signUp/Rectangle 16.png') }}" alt="" />
        <div class="over d-flex">
            <h2>sign up</h2>
        </div>
    </section>
    <!-- ------------------ end landing page---------------------------- -->
    <br>
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
    <!-- ------------------ start signUp section---------------------------- -->
    <section class="signUp" data-aos="fade-up" data-aos-offset="" data-aos-duration="2000">

        <div class="content" style="border: 1px solid #000">

            <!-- ////////////////// start header -->
            <header>
                <h2>Sign up with</h2>
                <div class="socialmedia d-flex justify-content-center">
                    <a href=""> <i class="fab fa-facebook-f"></i> </a>
                    <a href=""> <i class="fab fa-twitter"></i> </a>
                    <a href=""> <i class="fab fa-google"></i> </a>
                    <label>or use your email address below.</label>
                </div>
            </header>
            <hr>
            <!-- /////////////////////// start form -->

            <form action="{{ url('signup-action') }}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- /////////////////////// start name field -->
                <div class="container">
                    <div class="row mb-3">
                        <img id="preview" src="{{ asset('user_assets/uploads/users_profile/empty_user.jfif') }}"
                            style="width: 30%" class="mt-3" /><br>
                        <div class="col-sm-9" style="margin-top: 5px">
                            <input type="file" class="form-control" name="image" @error('image') is-invalid @enderror
                                id="selectImage">
                        </div>
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <div class="input">
                                <label for="name">firstname</label>
                                <input type="text" name="firstname" id="name" placeholder="Jone" value="{{ old('firstname') }}" />
                                <div class="notification alert alert-danger"></div>
                            </div>

                        </div>
                        <div class="col-6">
                            <div class="input">
                                <label for="name">lastname</label>
                                <input type="text" name="lastname" id="name" placeholder="Marten" value="{{ old('lastname') }}" />
                                <div class="notification alert alert-danger"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /////////////////////// start email field -->
                <div class="container">
                    <div class="input">
                        <label for="email">email</label>
                        <input type="email" name="email" id="email" placeholder="abcdef@gmail.com" value="{{ old('email') }}" />
                        <div class="notification alert alert-danger"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="input">
                        <label for="email">phone</label>
                        <input type="number" name="phone" id="email" placeholder="01234567890" value="{{ old('phone') }}" />
                        <div class="notification alert alert-danger"></div>
                    </div>
                </div>

                <div class="container">
                    <div class="input">
                        <label for="email">Gender</label>
                        <select class="form-control" style=" border: 1px solid #b0b0b0; height: 50px; border-radius: 10px;"
                            name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        <div class="notification alert alert-danger"></div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <div class="input">
                                <label for="email">city</label>
                                <select class="form-control"
                                    style=" border: 1px solid #b0b0b0; height: 50px; border-radius: 10px;" name="city_id"
                                    id="cities">
                                    <option value="">Select City</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">
                                            {{ $lang == 'en' ? $city->title_en : $city->title_ar }}</option>
                                    @endforeach

                                </select>
                                <div class="notification alert alert-danger"></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input">
                                <label for="email">region</label>
                                <select class="form-control"
                                    style=" border: 1px solid #b0b0b0; height: 50px; border-radius: 10px;"
                                    name="region_id" id="regions">
                                </select>
                                <div class="notification alert alert-danger"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="input">
                        <label for="email">Address</label>
                        <input type="text" name="address" id="email" placeholder="xyz" value="{{ old('address') }}" />
                        <div class="notification alert alert-danger"></div>
                    </div>
                </div>

                <div class="container">
                    <div class="input">
                        <label for="email">Birth Date</label>
                        <input type="date" name="bdate" id="email" placeholder="xyz" value="{{ old('bdate') }}" />
                        <div class="notification alert alert-danger"></div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <div class="input">
                                <label for="email">Lat</label>
                                <input type="number" name="lat" id="email" placeholder="123" value="{{ old('lat') }}" />
                                <div class="notification alert alert-danger"></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input">
                                <label for="email">lang</label>
                                <input type="number" name="lang" id="email" placeholder="123" value="{{ old('lang') }}" />
                                <div class="notification alert alert-danger"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ////////////// password field -->
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <div class="input passwordFild">
                                <label for="password">Password</label>
                                <div>
                                    <input type="password" name="password" id="password"
                                        placeholder="6-20 character" />
                                    <!-- <i class="fas fa-eye"></i> -->
                                    <i class="far fa-eye-slash"></i>
                                </div>
                                <div class="notification alert alert-danger">Error</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input passwordFild">
                                <label for="repeatPassword">repeatPassword</label>
                                <div>
                                    <input type="password" name="repeatPassword" id="repeatPassword"
                                        placeholder="6-20 character" />
                                    <!-- <i class="fas fa-eye"></i> -->
                                    <i class="far fa-eye-slash"></i>
                                </div>
                                <div class="notification alert alert-danger">Error</div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- ////////////// start repeat password -->
                <button>Sign Up</button>
            </form>
        </div>
    </section>

    <br><br><br>
@endsection
