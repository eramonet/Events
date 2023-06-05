<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="images/logo/logo.png" />
    <!-- /////////////////////////// font-awesome 5  /////////////////////////// -->
    <link rel="stylesheet" href="{{ asset('user_assets/css/plugin/all.min.css') }}" />
    <!-- /////////////////////////// font-awesome 5  /////////////////////////// -->

    <!-- /////////////////////////// google font  /////////////////////////// -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Sulphur+Point&display=swap" rel="stylesheet" />

    <!-- /////////////////////////// google font  /////////////////////////// -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <!-- /////////////////////////// css style  /////////////////////////// -->
    <link rel="stylesheet" href="{{ asset('user_assets/css/plugin/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('user_assets/css/plugin/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('user_assets/css/plugin/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('user_assets/css/plugin/aos.css') }}" />

    <!-- /////////////////////////// css style   /////////////////////////// -->

    <!-- /////////////////////////// style file  /////////////////////////// -->
    <link rel="stylesheet" href="{{ asset('user_assets/css/navbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('user_assets/css/home.css') }}" />
    <link rel="stylesheet" href="{{ asset('user_assets/css/all_products.css') }}" />
    <link rel="stylesheet" href="{{ asset('user_assets/css/productDetails.css') }}" />
    <link rel="stylesheet" href="{{ asset('user_assets/css/footer2.css') }}" />
    <link rel="stylesheet" href="{{ asset('user_assets/css/login.css') }}" />
    <link rel="stylesheet" href="{{ asset('user_assets/css/signUp.css') }}" />
    <link rel="stylesheet" href="{{ asset('user_assets/css/cart.css') }}" />

    <link rel="stylesheet" href="{{ asset('user_assets/css/media_query_command.css') }}" />
    <!-- /////////////////////////// style file  /////////////////////////// -->

    <!-- Mega Menu -->
    <!-- <link
      href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css"
      rel="stylesheet"
      id="bootstrap-css"
    />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->

    <title>@yield('title', config('app.name'))</title>
    <script src="{{ asset('user_assets/js/plagens/all_navbar_set_active.js') }}"></script>

    <style>
        .modal-backdrop {
            z-index: 0;
        }

        @media (max-width: 500px) {
            .sec-title {
                margin-bottom: 60px !important;
            }

            .sec2-title {
                margin-bottom: 160px !important;
            }
        }

        .WeddingsHalls .owl-carousel .owl-nav button.owl-next {
            right: 0px;
        }

        .WeddingsHalls .owl-carousel .owl-nav button.owl-prev {
            left: 0px;
        }
    </style>

    <style>
        .hoveredCart:hover {
            background-color: #ffffff79;
            transition: background-color 0.5s ease-out 100ms;
        }

        .data_option {
            text-align: center;
            padding: 70px 0;
            height: 0px;
        }
    </style>

    <style>
        .navbar .dropdown-menu div[class*="col"] {
            margin-bottom: 1rem;
        }

        .navbar .dropdown-menu {
            border: none;
            background-color: #fff !important;
            color: #000;
        }

        /* breakpoint and up - mega dropdown styles */
        @media screen and (min-width: 992px) {

            /* remove the padding from the navbar so the dropdown hover state is not broken */
            .navbar {
                padding-top: 0px;
                padding-bottom: 0px;
            }

            /* remove the padding from the nav-item and add some margin to give some breathing room on hovers */
            .navbar .nav-item {
                padding: 0px;
                margin: 0 0.25rem;
            }

            /* makes the dropdown full width  */
            .navbar .dropdown {
                position: static;
            }

            .navbar .dropdown-menu {
                width: 200%;
                left: 0;
                right: 0;
                /*  height of nav-item  */
                top: 45px;
            }

            /* shows the dropdown menu on hover */
            .navbar .dropdown:hover .dropdown-menu,
            .navbar .dropdown .dropdown-menu:hover {
                display: block !important;
            }

            .navbar .dropdown-menu {
                border: 1px solid rgba(0, 0, 0, 0.15);
                background-color: #fff;
            }
        }
    </style>

    <style>
        .home_watch_video:hover {
            box-shadow: 0 5px 10px #aaa;
            transition: box-shadow 0.2s ease-in-out;
        }
    </style>

    <!-- Welcome home style -->
    <style>
        .owl-carousel.owl-drag .owl-item {
            width: 362.333px !important;
        }
    </style>

</head>

<body style="padding: 0px !important">
    {{-- nav --}}
    @include('layouts.site._nav')

    {{-- nav --}}



    @yield('content')




    <!-- ------------------ start section footer---------------------------- -->
    <footer>
        <div class="container">
            <div class="upperFooter">
                <div class="row">
                    <div class="col-md-12 col-lg-5 col-sm-12">
                        <div class="aplications">
                            <h2>discover EVENTS NEW APP</h2>
                            <p>Download Android and iPhone applications via the links.</p>
                            <div class="images d-flex">
                                <a href="">
                                    <img src="{{ asset('user_assets/images/footer/applications/Layer-1-copy 1.png') }}"
                                        alt="" />
                                </a>
                                <a href="">
                                    <img src="{{ asset('user_assets/images/footer/applications/Layer-12 1.png') }}"
                                        alt="" />
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3 col-12">
                                    <div class="logo">
                                        <a style="margin-right: 50px" href="./index.html"><img
                                                src="{{ asset('user_assets/images/logo/logo.png') }}"
                                                alt="" /></a>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-12">
                                    <div class="hand" style="margin-bottom: 0px">
                                        <a href="./index.html">
                                            <img src="{{ asset('user_assets/images/footer/299138324127211 1.png') }}"
                                                alt="" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br />
            <div class="midFooter" style="border: 0">
                <div class="row">
                    <div class="col-md-5 col-12">
                        <div class="search">
                            <h4>Newsletter</h4>
                            <p>
                                Don’t miss our significant news and season sales. Subscribe!
                            </p>
                            <div class="email">
                                <span>Enter your email</span>
                                <i class="fab fa-telegram-plane"></i>
                                <input type="text" />
                            </div>
                        </div>
                        <div class="payment">
                            <ul class="d-flex list-unstyled align-items-center">
                                <li>We Accept:</li>
                                <li>
                                    <a href="">
                                        <img src="{{ asset('user_assets/images/footer/applications/mastercard-visa-logo 1.png') }}"
                                            alt="" />
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3" style="margin-top: 0px; padding: 0px !important">
                                    <h4>Fast Links:</h4>
                                    <ul class="list-unstyled">
                                        <li>Blog</li>
                                        <li>About Us</li>
                                        <li>Contact Us</li>
                                    </ul>
                                </div>
                                <div class="col-lg-4" style="margin-top: 0px">
                                    <h4>Find Us:</h4>
                                    <ul class="list-unstyled">
                                        <li>Facebook</li>
                                        <li>Twitter</li>
                                        <li>Instagram</li>
                                    </ul>
                                </div>
                                <div class="col-lg-5" style="margin-top: 0px">
                                    <h4>contact us:</h4>
                                    <ul class="list-unstyled">
                                        <li>123456789</li>
                                        <li>info@events-app.com</li>
                                        <li>Abu Dabhi - Emirates</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="downFooter text-center text-md-left">
                <div class="row">
                    <div class="col-md-6">
                        <a href="">© All rights reserved The Events 2022</a>
                        <span>
                            Developed By
                            <a href="https://www.e-ramo.net" target="_blank">
                                e-RAMO For Digital Solutions
                            </a>
                            | Powered by
                            <a href="http://kiev-consultancy.com/" target="_blank">Kiev Consultancy</a>
                        </span>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <p>Privacy policy <span> - </span> Terms and Conditions</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- ------------------ end section footer---------------------------- -->

    <script src="{{ asset('user_assets/js/plagens/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('user_assets/js/plagens/pooper.js') }}"></script>
    <script src="{{ asset('user_assets/js/plagens/bootstrap.min.js') }}"></script>
    <script src="{{ asset('user_assets/js/plagens/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('user_assets/js/plagens/aos.js') }}"></script>
    <script src="{{ asset('user_assets/js/pages/navbar.js') }}"></script>
    <script src="{{ asset('user_assets/js/plagens/notify.min.js') }}"></script>
    <script src="{{ asset('user_assets/js/plagens/moment.js') }}"></script>
    <script src="{{ asset('user_assets/js/pages/productDetails.js') }}"></script>

    <script src="{{ asset('user_assets/js/plagens/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('user_assets/js/plagens/pooper.js') }}"></script>
    <script src="{{ asset('user_assets/js/plagens/bootstrap.min.js') }}"></script>
    <script src="{{ asset('user_assets/js/plagens/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('user_assets/js/plagens/aos.js') }}"></script>
    <script src="{{ asset('user_assets/js/plagens/index.js') }}"></script>
    <script src="{{ asset('user_assets/js/pages/navbar.js') }}"></script>
    <script src="{{ asset('user_assets/js/plagens/mixitup.min.js') }}"></script>
    <script src="{{ asset('user_assets/js/plagens/plagen.js') }}"></script>
    <script src="{{ asset('user_assets/js/plagens/best_sellers.js') }}"></script>
    <script src="{{ asset('user_assets/js/plagens/occasions.js') }}"></script>
    <script src="{{ asset('user_assets/js/plagens/flags_cities.js') }}"></script>
    <script src="{{ asset('user_assets/js/plagens/notify.min.js') }}"></script>
    <script src="{{ asset('user_assets/js/pages/index.js') }}"></script>
    <script src="{{ asset('user_assets/js/pages/home_slider.js') }}"></script>
    <!-- start switching between images -->
    <script src="{{ asset('user_assets/js/plagens/custom_slider.js') }}"></script>
    <script src="{{ asset('user_assets/js/plagens/default_settings.js') }}"></script>
    <!-- end switching between images -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('user_assets/js/pages/allProducts.js') }}"></script>

    <script>
        selectImage.onchange = evt => {
            preview = document.getElementById('preview');
            preview.style.display = 'block';
            const [file] = selectImage.files
            if (file) {
                preview.src = URL.createObjectURL(file)
            }
        }
    </script>

    <script src="{{ asset('user_assets/js/custom_js/ajax.js') }}"></script>
</body>

</html>
