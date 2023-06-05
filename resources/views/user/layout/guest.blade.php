<!DOCTYPE html>
<html>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="multikart">
    <meta name="keywords" content="multikart">
    <meta name="author" content="multikart">
    <link rel="icon" href="../assets/images/favicon/1.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon/1.png" type="image/x-icon">
    <title>@yield('title') | E-Ramo Store</title>

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">


   
    <!-- Icons -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/font-awesome.css') }}"> <!--done-->




@if( session()->get('locale') == 'en')
    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/slick.css') }}"> <!--done-->
@else

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/slick_rtl.css') }}"> <!--done-->
@endif


@if( session()->get('locale') == 'en')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/slick-theme.css') }}"> <!--done-->
@else
         
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/slick-theme_rtl.css') }}"> <!--done-->
@endif
    <!-- Animate icon -->
    @if( session()->get('locale') == 'en')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}"> <!--done-->
@else
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate_rtl.css') }}"> <!--done-->
@endif

    <!-- Price range icon -->
    @if( session()->get('locale') == 'en')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/price-range.css') }}"> <!--done-->
@else
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/price-range_rtl.css') }}"> <!--done-->
@endif

@if( session()->get('locale') == 'en')
    <!-- Themify icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/themify-icons.css') }}"> <!--done-->
@else
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/themify-icons_rtl.css') }}"> <!--done-->
@endif

    <!-- Bootstrap css -->
    @if( session()->get('locale') == 'en')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}"> <!--done-->
    @else
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap_rtl.css') }}"> <!--done-->
    @endif

   @if( session()->get('locale') == 'en')
    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
   @else
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style_rtl.css') }}">
   @endif

    <!-- Notification css styles -->
    @if( session()->get('locale') == 'en')
    <link rel="stylesheet" href="{{ asset('assets/css/custom_styles/notification.css') }}"> <!--done-->
    @else
    <link rel="stylesheet" href="{{ asset('assets/css/custom_styles/notification_rtl.css') }}"> <!--done-->
    @endif

   

    @if( session()->get('locale') == 'en')
    <style>
    .page-item.active .page-link {
        background-color: #bfb521;
        border: 1px solid #bfb521;
        padding: 18px;
        border-bottom: 0;
        border-top: 0;
        color: #fff;
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    .product-pagination .pagination .page-item:last-child .page-link {
        padding: 18px;
        border-bottom: 0;
        border-top: 0;
        color: #777;
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    .cart-section tbody tr td {
        min-width: auto;
    }
    </style>
    @else
    <style>
         body { direction: rtl ; }
.page-item.active .page-link {
            background-color: #bfb521;
            border: 1px solid #bfb521;
            padding:18px;
            border-bottom: 0;
            border-top: 0;
            color: #fff;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .product-pagination .pagination .page-item:last-child .page-link {
            padding:18px;
            border-bottom: 0;
            border-top: 0;
            color: #777;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .cart-section tbody tr td {
            min-width: auto;
        }
        </style>
        @endif
</head>

<body class="theme-color-1">

<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <!--begin::Page-->
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
        <!--begin::Header-->
        @include('user.layout.navbar')


        <!--begin::Main-->
        @yield('content')
        <!--end::Main-->






        <!-- Footer --->
        <!-- footer start -->
        <footer class="footer-light footer-expand pb-0">
            <div class="section-t-space section-b-space light-layout">
                <div class="container">
                    <div class="row footer-theme partition-f">
                        <div class="col-lg-4 col-md-6">
                            <div class="footer-title footer-mobile-title">
                                <h4>about</h4>
                            </div>
                            <?php $main_section_footer2 = App\Models\MainSectionFooter::get(); ?>
                            @foreach ($main_section_footer2 as $main_section_footer)
                                <div class="footer-contant">
                                    <div class="footer-logo"><img
                                            src="{{ asset('' . $main_section_footer->logo . '') }}" alt="">
                                    </div>
                                    <p>{{ session()->get('locale') == 'en' ? $main_section_footer->description_en : $main_section_footer->description_ar  }}</p>
                                    <ul class="store-details">
                                        <li><a href="{{ $main_section_footer->google_store_link }}"><img
                                                    src="../assets/images/store/google.png" class="img-fluid"
                                                    alt=""></a></li>
                                        <li><a href="{{ $main_section_footer->app_store_link }}"><img
                                                    src="../assets/images/store/app.png" class="img-fluid"
                                                    alt=""></a>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                        <div class="col offset-xxl-1">
                            <div class="sub-title" style="text-align: end;">
                                <div class="footer-title">
                                    <h4>{{ __('trans.important links') }}</h4>
                                </div>
                                <div class="footer-contant">
                                    <ul>
                                        <li><a
                                                href="{{ url('terms-and-conditions') }}">{{ __('trans.Terms And Conditions') }}</a>
                                        <li><a href="{{ url('contact-us') }}">{{ __('trans.Contact Us') }}</a>
                                        <li><a href="{{ url('about-us') }}">{{ __('trans.About Store') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="sub-title" style="text-align: end;">
                                <div class="footer-title">
                                    <h4>{{ __('trans.why we choose') }}</h4>
                                </div>
                                <div class="footer-contant">
                                    <?php $why_we_choose = App\Models\WhyWeChooseFooter::get(); ?>
                                    <ul>
                                        @foreach ($why_we_choose as $why_we_choose)
                                            <li><a
                                                    href="@if (session()->get('locale') == 'en') {{ $why_we_choose->link_en }}@else{{ $why_we_choose->link_ar }} @endif">
                                                    @if (session()->get('locale') == 'en')
                                                        {{ $why_we_choose->title_en }}@else{{ $why_we_choose->title_ar }}
                                                    @endif
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="sub-title" style="text-align: end;">
                                <div class="footer-title" style="text-align: center;">
                                    <h4>{{ __('trans.store information') }}</h4>
                                </div>
                                <div class="footer-contant">
                                    <?php $store_info = App\Models\StoreInformationFooter::get(); ?>
                                    <ul class="contact-list">
                                        @foreach ($store_info as $store_info)
                                            <li><i class="fa fa-map-marker"></i>{{ $store_info->location }}</li>
                                            <li><i class="fa fa-phone"></i>{{ __('trans.Call Us') }}:
                                                {{ $store_info->phone }}</li>
                                            <li><i class="fa fa-envelope"></i>{{ __('trans.Email Us') }}: <a
                                                    href="{{ $store_info->email }}">{{ $store_info->email }}</a>
                                            </li>
                                            <li><i class="fa fa-fax"></i>{{ __('trans.Fax') }}:
                                                {{ $store_info->fax }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sub-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 col-sm-12">
                            <div class="footer-end">
                                <p><i class="fa fa-copyright" aria-hidden="true"></i> 2023 powered by
                                    Eramo</p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-sm-12">
                            <div class="payment-card-bottom">
                                <ul>
                                    <li>
                                        <a href="#"><img src="../assets/images/icon/visa.png"
                                                alt=""></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="../assets/images/icon/mastercard.png"
                                                alt=""></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="../assets/images/icon/paypal.png"
                                                alt=""></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="../assets/images/icon/american-express.png"
                                                alt=""></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="../assets/images/icon/discover.png"
                                                alt=""></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer end -->

















        <!-- latest jquery-->
        <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>

        <!-- fly cart ui jquery-->
        <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>

        <!-- exitintent jquery-->
        <script src="{{ asset('assets/js/jquery.exitintent.js') }}"></script>
        <script src="{{ asset('assets/js/exit.js') }}"></script>

        <!-- slick js-->
        <script src="{{ asset('assets/js/slick.js') }}"></script>

        <!-- menu js-->
        <script src="{{ asset('assets/js/menu.js') }}"></script>

        <!-- lazyload js-->
        <script src="{{ asset('assets/js/lazysizes.min.js') }}"></script>

        <!-- Bootstrap js-->
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Bootstrap Notification js-->
        <script src="{{ asset('assets/js/bootstrap-notify.min.js') }}"></script>

        <!-- Fly cart js-->
        <script src="{{ asset('assets/js/fly-cart.js') }}"></script>

        <!-- Theme js-->
        <script src="{{ asset('assets/js/theme-setting.js') }}"></script>
        <script src="{{ asset('assets/js/script.js') }}"></script>

        <!-- price range js -->
        <script src="{{ asset('assets/js/price-range.js') }}"></script>

        <script src="../assets/js/timer1.js"></script>

        <script>
            function addToWishList(id) {
                var product_id = id;
                var url = "{{ route('wishlists.store', ':product_id') }}";
                url = url.replace(':product_id', product_id);
                //alert ("helloooooo");

                $.post(url, {
                    _token: '{{ csrf_token() }}',
                    id: id
                }, function(data) {
                    if (data != 0) {
                        $('#wishlist').html(data);
                        // alert('Item has been added to wishlist');
                        toastr.success('Item has been added to wishlist', "success", {
                            iconClass: "toast-custom"
                        });
                    }

                });

            }

            $(document).load(function() {
                hello();
            });

            // $("#add_to_wish_list").on("click" , function(){
            //     alert("hello");
            // })

            function hello(id) {
                var product_id = id;
                var url = "{{ route('wishlists.store', ':product_id') }}";
                url = url.replace(':product_id', product_id);
                //alert ("helloooooo");

                $.post(url, {
                    _token: '{{ csrf_token() }}',
                    id: id
                }, function(data) {
                    if (data != 0) {
                        $('#wishlist').html(data);
                        // alert('Item has been added to wishlist');
                        toastr.success('Item has been added to wishlist', "success", {
                            iconClass: "toast-custom"
                        });
                    }

                });

            } <
            /scrript> <
            script >
                function addToWishList(id) {
                    console.log(id)

                }
            $("#mostafabtn").on("click", function() {
                alert("hello");
            })
        </script>
        <script>
            $(window).on('load', function() {
                setTimeout(function() {
                    $('#exampleModal').modal('show');
                }, 2500);
            });

            function openSearch() {
                document.getElementById("search-overlay").style.display = "block";
            }

            function closeSearch() {
                document.getElementById("search-overlay").style.display = "none";
            }
        </script>

        <!-- My Custom Scripts -->
        <!-- My Custom Scripts -->
        <script src="{{ asset('assets/js/ajax/ajax.js') }}"></script>

        <script>
            $(window).load(function() {
                // PAGE IS FULLY LOADED
                // FADE OUT YOUR OVERLAYING DIV
                $('#overlay_custom').fadeOut();
            });

            $('#profile_preview_uploader_btn').change(function() {

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#profile_preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

            });
        </script>
       <script>
       
       
        export const HidePreLoader = function () {
        $(".loader-container").fadeOut(1000);
    };
    HidePreLoader();
        // var loder = document.getElementById("loder");
        // var sec = document.getElementById("sec");
        // loder.style.display = "show";
        // sec.style.display = "show";
    </script>*

        </body>

</html>
