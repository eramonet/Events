<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Primary Meta Tags -->
<title>@yield('title', config('app.name'))</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="title" content="App Admin Dashboard">
<meta name="author" content="e-RAMO For Digital Solutions">
<meta name="description" content="App Admin Dashboard" />
<link rel="canonical" href="https://www.e-ramo.net/">
<script src="{{ asset('user_assets/js/plagens/jquery-3.2.1.min.js') }}"></script>

<style>

    /* loader */
    .loader-container{
        width: 100%;
        height: 100vh;
        position: fixed;
        background: #222b32;
        z-index: 999999;
        left: 0;
        top: 0;
    }
    .loader-container .icon img{
        display: block;
        width: 150px;
        margin: 0 auto;
        object-fit: cover;
        margin-top: 150px;

    }

    .loader {
        width: 70px;
        height: 70px;
        display: block;
        margin: 150px auto;

        border: 3px dotted #FFF;
        border-style: solid solid dotted dotted;
        border-radius: 50%;
        position: relative;
        box-sizing: border-box;
        animation: rotation 2s linear infinite;

    }
      .loader::after {
        content: '';
        box-sizing: border-box;
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        margin: auto;
        border: 3px dotted #FF3D00;
        border-style: solid solid dotted;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        animation: rotationBack 1s linear infinite;
        transform-origin: center center;
      }

      @keyframes rotation {
        0% {
          transform: rotate(0deg);
        }
        100% {
          transform: rotate(360deg);
        }
      }
      @keyframes rotationBack {
        0% {
          transform: rotate(0deg);
        }
        100% {
          transform: rotate(-360deg);
        }
      }


      /* loader */
    </style>

<style>
    .card .table td,
    .card .table th {
        padding-left: 0px !important;
        padding-right: 1.5rem !important;
    }
    .table td, .table th{
        white-space: inherit !important;
    }
</style>

<!-- Favicon -->
<link rel="apple-touch-icon" sizes="180x180" href=" {{ asset('layouts/admin/img/favicon/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('layouts/admin/img/favicon/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('layouts/admin/img/favicon/favicon-16x16.png') }}">
<link rel="manifest" href="{{ asset('layouts/admin/img/favicon/site.webmanifest') }}">

<!-- Sweet Alert -->
<link type="text/css" href=" {{ asset('layouts/admin/css/sweetalert2.min.css') }}" rel="stylesheet">

<!-- Notyf -->
<link type="text/css" href="{{ asset('layouts/admin/css/notyf.min.css') }}" rel="stylesheet">

<!-- fontAwsome -->
<link type="text/css" href="{{ asset('layouts/admin/css/all.min.css') }}" rel="stylesheet">


<!-- dropfy CSS -->
<link type="text/css" href="{{ asset('layouts/admin/css/dropify.css') }} " rel="stylesheet">

<!-- select2 CSS -->
<link type="text/css" href="{{ asset('layouts/admin/css/select2.min.css') }} " rel="stylesheet">

<!-- Volt CSS -->
<link type="text/css" href="{{ asset('layouts/admin/css/volt.css') }} " rel="stylesheet">


<!-- style CSS -->
<link type="text/css" href="{{ asset('layouts/admin/css/style.css') }} " rel="stylesheet">



</head>

<body>





         {{-- loader --}}

         <div class="loader-container">



            <div class="icon">
                <img  src="{{ asset('uploads/app/logo.png') }}" >

            </div>

            <span class="loader"></span>
        </div>
        {{-- loader --}}


{{-- sidebar --}}

@include('layouts.admin._sidebar')
{{-- sidebar --}}

        <main class="content">


            {{-- nav --}}
            @include('layouts.admin._nav')

            {{-- nav --}}



            @yield('content')



<footer class="bg-white rounded shadow p-5 mb-4 mt-4">
    <div class="row">
        <div class="col-12 col-md-4 col-xl-6 mb-4 mb-md-0" style="width: 100%">
            <p class="mb-0 text-center text-lg-start">© <span class="current-year"></span> {{ config('app.name') }} |  Developed By <a class="text-primary fw-normal" href="https://www.e-ramo.net/" target="_blank">e-RAMO For Digital Solutions</a></p>
        </div>

    </div>
</footer>




        </main>





        <script src="{{ asset('layouts/admin/js/jquery.min.js') }}"></script>

    <!-- Core -->
<script src="{{ asset('layouts/admin/js/popper.min.js') }}"></script>
<script src=" {{ asset('layouts/admin/js/bootstrap.min.js') }}"></script>

<!-- Vendor JS -->
<script src="{{ asset('layouts/admin/js/on-screen.umd.min.js') }}"></script>

<!-- Slider -->
<script src="{{ asset('layouts/admin/js/nouislider.min.js') }}"></script>

<!-- Smooth scroll -->
<script src=" {{ asset('layouts/admin/js/smooth-scroll.polyfills.min.js') }}"></script>

<!-- Charts -->
<script src="{{ asset('layouts/admin/js/chartist.min.js') }}"></script>
<script src="{{ asset('layouts/admin/js/chartist-plugin-tooltip.min.js') }}"></script>

<!-- Datepicker -->
<script src="{{ asset('layouts/admin/js/datepicker.min.js') }}"></script>

<!-- Sweet Alerts 2 -->
<script src="{{ asset('layouts/admin/js/sweetalert2.all.min.js') }}"></script>

<!-- Moment JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

<!-- Vanilla JS Datepicker -->
<script src=" {{ asset('layouts/admin/js/datepicker.min.js') }}"></script>

<!-- Notyf -->
<script src="{{ asset('layouts/admin/js/notyf.min.js') }}"></script>

<!-- Simplebar -->
<script src="{{ asset('layouts/admin/js/simplebar.min.js') }}"></script>

<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js "></script>

<!-- Volt JS -->
<script src="{{ asset('layouts/admin/js/volt.js') }}"></script>


<!-- dropify JS -->
<script src="{{ asset('layouts/admin/js/dropify.js') }}"></script>

<!-- select2.min JS -->
<script src="{{ asset('layouts/admin/js/select2.min.js') }}"></script>

<!-- main JS -->
<script src="{{ asset('layouts/admin/js/main.js') }}" type="module"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}

@yield('scripts')

@include('partials._errors')
@include('partials._session')


</body>

</html>
