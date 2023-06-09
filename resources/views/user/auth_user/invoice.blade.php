<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="description" content="multikart">
  <meta name="keywords" content="multikart">
  <meta name="author" content="multikart">
  <link rel="icon" href="../assets/images/favicon/1.png" type="image/x-icon">
  <link rel="shortcut icon" href="../assets/images/favicon/1.png" type="image/x-icon">
  <title>Multikart - invoice</title>

  <!--Google font-->
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <!-- Icons -->
  <link rel="stylesheet" type="text/css" href="../assets/css/vendors/font-awesome.css">

  <!-- Animate icon -->
  @if( session()->get('locale') == 'en')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}"> <!--done-->
@else
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate_rtl.css') }}"> <!--done-->
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
  <!-- Theme css -->
  @if( session()->get('locale') == 'en')
  <!-- Theme css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
 @else
 <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style_rtl.css') }}">
 @endif

</head>

<body class="theme-color-1 bg-light">


  <!-- invoice 1 start -->
  <section class="theme-invoice-1 section-b-space">
    <div class="container">
      <div class="row">
        <div class="col-xl-8 m-auto">
          <div class="invoice-wrapper">
            <div class="invoice-header">
              <div class="upper-icon">
                <img src="../assets/images/invoice/invoice.svg" class="img-fluid" alt="">
              </div>
              <div class="row header-content" @if(session()->get('locale') == 'ar') style="flex-direction: row-reverse;" @endif>
                <div class="col-md-6">
                    <img src="{{ $settings->logo }}" class="img-fluid" alt="">
                    <div class="mt-md-4 mt-3">
                    <h4 class="mb-2">
                        @if(session()->get('locale') == 'en') {{ $settings->title_en }} @else {{ $settings->title_ar }} @endif - {{ $settings->faxes }}
                    </h4>
                    <h4 class="mb-0">{{ $settings->emails }}</h4>
                  </div>
                </div>
                <div class="col-md-6 text-md-end mt-md-0 mt-4">
                  <h2>invoice</h2>
                  <div class="mt-md-4 mt-3">
                    <h4 class="mb-2">
                        @if(session()->get('locale') == 'en')  {{ $settings->address_en }} @else {{ $settings->address_ar }} @endif
                    </h4>
                    <h4 class="mb-0">{{ $settings->phone_numbers }}</h4>
                  </div>
                </div>
              </div>
              <div class="detail-bottom">
                <ul>
                  <li><span>issue date :</span><h4> 20 march, 2020</h4></li>
                  <li><span>invoice no :</span><h4> 908452</h4></li>
                  <li><span>email :</span><h4> user@gmail.com</h4></li>
                </ul>
              </div>
            </div>
            <div class="invoice-body table-responsive-md">
              <table class="table table-borderless mb-0">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">description</th>
                    <th scope="col">price</th>
                    <th scope="col">hrs.</th>
                    <th scope="col">total</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Logo Designing</td>
                    <td>$50</td>
                    <td>2</td>
                    <td>$100</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>website & banner design</td>
                    <td>$30</td>
                    <td>3</td>
                    <td>$90</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>frontend development</td>
                    <td>$95</td>
                    <td>1</td>
                    <td>$95</td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>backend development</td>
                    <td>$95</td>
                    <td>1</td>
                    <td>$95</td>
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>SEO, Deigital marketing</td>
                    <td>$95</td>
                    <td>1</td>
                    <td>$95</td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="2"></td>
                    <td class="font-bold text-dark" colspan="2">GRAND TOTAL</td>
                    <td class="font-bold text-theme">$325.00</td>
                  </tr>
                </tfoot>
              </table>
            </div>
            <div class="invoice-footer text-end">
              <div class="authorise-sign">
                <img src="../assets/images/invoice/sign.png" class="img-fluid" alt="sing">
                <span class="line"></span>
                <h6>Authorised Sign</h6>
              </div>
              <div class="buttons">
                <a href="#" class="btn black-btn btn-solid rounded-2 me-2" onclick="window.print();">export as PDF</a>
                <a href="#" class="btn btn-solid rounded-2" onclick="window.print();">print</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- invoice 1 end -->


  <!-- latest jquery-->
  <script src="../assets/js/jquery-3.3.1.min.js"></script>

  <!-- Bootstrap js-->
  <script src="../assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>
