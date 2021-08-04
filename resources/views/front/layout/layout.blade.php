<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('page_title')</title>

    <!-- bootstrap -->

    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css"> --}}

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/7516c4b4cc.js" crossorigin="anonymous"></script>

    {{-- Google fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">

    <!-- custom css -->
    <link href="{{ asset('front_asset/css/my_style.css') }}" rel="stylesheet">
    <link href="{{ asset('front_asset/css/view_pages_style.css') }}" rel="stylesheet">

    <!-- datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

    <!-- datepicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">


    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <style>
        .dropdown-toggle:after {
            color: white;
        }

        label {
            color: black;
            font-weight: 600;
        }


        .ft_link {
            color: #748d91;
        }

        .ft_link:hover {
            color: #546a6e;
        }

        .ft_social {
            color: #2e4652;
            background: #09cec7;
            border-radius: 100px;
            padding: 6px 8px;
            margin-right: 10px;
        }

        .ft_border {
            margin-bottom: 1px;
            border: 0;
            border-top: 6px solid #00c1ca;
        }

        button.btn.dropdown-toggle.btn-light {
            background-color: white;
            border: 1px solid #cecece;
        }

        .dropdown-toggle::after {
            color: black;
        }

        .navbar{
            align-items: flex-end !important;
            padding: 15px 30px 15px 70px !important;
            border-bottom: 10px solid #4D9A8E;
        }

        #navbarSupportedContent{
            padding-left: 80px !important;
        }

        .nav-link{
            color: #87A094 !important;
            font-style: italic;
            font-weight: 600;
            font-family: 'Open Sans';
            padding: 5px 20px !important;
            margin-bottom: -18px;
        }

        .btn-style{
            font-style: italic;
            font-weight: 600;
            font-family: 'Open Sans';
        }

    </style>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />


    @routes

</head>

<body class="bg-white">

    <nav class="navbar navbar-expand-lg navbar-white bg-white">
        <a class="navbar-brand" href="#">
            <img width="200" src="{{ asset('front_asset/images/logo1.PNG') }}" alt="" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('cargo.view') }}">Cargo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('cargo.view') }}">Vessel Charter</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('cargo.view') }}">Sale & Purchase</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('cargo.view') }}">Voyage Estimator</a>
              </li>
          </ul>
            <button class="btn btn-success btn-style my-2 my-sm-0" type="button">LOGIN / REGISTER</button>
        </div>
      </nav>

    <!-- Navigation -->
    {{-- <header class="" style="background-color: #e3eff6!important;">
        <div class="d-block text-center">
            <a class="navbar-brand pt-2 pb-2" href={{ route('home') }}>
                <img src="{{ asset('front_asset/images/logo.png') }}" alt="" />
            </a>
        </div>
        <nav class="navbar navbar-expand-lg cl_bd pt-0 pb-0" id="mainNav">

            <div class="container-fluid">

                <button class="navbar-toggler navbar-toggler-right  pt-4 pb-4" type="button" data-toggle="collapse"
                    data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Toggle navigation">

                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse pl-lg-5 m-auto" id="navbarResponsive">
                    <ul class="navbar-nav m-auto pl-lg-5 text-center">
                        <li class="nav-item">
                            <a class="nav-link cl_bd size13 b7 pt-4 pb-4 pl-3 pr-3"
                                href="{{ route('cargo.view') }}">Cargos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link cl_bd size13 b7 pt-4 pb-4 pl-3 pr-3"
                                href="{{ route('vessel.view') }}">Vessel
                                Charter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link cl_bd size13 b7 pt-4 pb-4 pl-3 pr-3" href="{{ route('home') }}">Sale &
                                Purchase</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link cl_bd size13 b7 pt-4 pb-4 pl-3 pr-3" href="{{ route('home') }}">Voyage
                                Estimator</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link cl_bd size13 b7 pt-4 pb-4 pl-3 pr-3"
                                href="{{ route('home') }}">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link cl_bd size13 b7 pt-4 pb-4 pl-3 pr-3"
                                href="{{ route('home') }}">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link cl_bd size13 b7 pt-4 pb-4 pl-3 pr-3"
                                href="{{ route('home') }}">Contact</a>
                        </li>
                    </ul>
                    @if (session('front_uid') != '')
                        <a class="btn btn-info rounded-0"
                            href="{{ route('logout') }}">({{ session('front_uname') }})
                            Logout</a>
                    @else
                        <a class="btn btn-info rounded-0" href="{{ route('login') }}">Login/Register</a>
                    @endif
                </div>
            </div>
        </nav>
    </header> --}}
    <!-- Navigation End -->


    {{-- <img src="{{ asset('front_asset/images/home.png') }}" class="logo footer_logo"> --}}

    <!-- Main Content -->
    @section('container')
    @show
    <!-- Main Content End -->


    <!-- Footer -->
    {{-- <hr class="ft_border"> --}}
    <footer class="page-footer font-small bg_sec">

        <!-- Footer Links -->
        <div class="container-fluid text-center text-md-left pt-5 pb-2">

            <!-- Grid row -->
            <div class="row pt-4 pb-4">

                <!-- Grid column -->
                <div class="col-md-6 mt-md-0 mt-3 pl-lg-5">
                    <img src="{{ asset('front_asset/images/logo-footer.png') }}" class="logo footer_logo">
                    <div class="p-2">
                        <i class="fa fa-phone" style="color:#09cec7;"></i> &nbsp;&nbsp;&nbsp;
                        <a href="tel:+012345678901" class="ft_link">+01 234 5678 901</a>
                    </div>

                    <div class="p-2">
                        <i class="fa fa-envelope" style="color:#09cec7;"></i>&nbsp;&nbsp;&nbsp;
                        <a href="mailto:info@shipsearch.com" class="ft_link">info@shipsearch.com</a>
                    </div>

                    <div class="p-2">
                        <a class="" href="#">
                            <i class="fa fa-facebook ft_social"></i>
                        </a>
                        <a class="" href="#">
                            <i class="fa fa-twitter ft_social"></i>
                        </a>
                        <a class="" href="#">
                            <i class="fa fa-linkedin ft_social"></i>
                        </a>
                    </div>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none pb-3">

                <!-- Grid column -->
                <div class="col-md-2 mb-md-0 mb-3">


                    <ul class="list-unstyled">
                        <li class="pb-2">
                            <a href="#!" class="size14 b7 ft_link">Home</a>
                        </li>
                        <li class="pb-3">
                            <a href="#!" class="size14 b7 ft_link">Event</a>
                        </li>
                        <li class="pb-3">
                            <a href="#!" class="size14 b7 ft_link">About Us</a>
                        </li>
                        <li class="pb-3">
                            <a href="#!" class="size14 b7 ft_link">Classified Ad</a>
                        </li>
                        <li class="pb-3">
                            <a href="#!" class="size14 b7 ft_link">Contact</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 mb-md-0 mb-3">


                    <ul class="list-unstyled">
                        <li class="pb-3">
                            <a href="#!" class="size14 b7 ft_link">Products</a>
                        </li>
                        <li class="pb-3">
                            <a href="#!" class="size14 b7 ft_link">Sale & Purchase</a>
                        </li>
                        <li class="pb-3">
                            <a href="#!" class="size14 b7 ft_link">Vessel</a>
                        </li>
                        <li class="pb-3">
                            <a href="#!" class="size14 b7 ft_link">Cargo</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 mb-md-0 mb-3">


                    <ul class="list-unstyled">
                        <li class="pb-3">
                            <a href="#!" class="size14 b7 ft_link">Terms & Conditions</a>
                        </li>
                        <li class="pb-3">
                            <a href="#!" class="size14 b7 ft_link">Privacy Policy</a>
                        </li>
                        <li class="pb-3">
                            <a href="#!" class="size14 b7 ft_link">Advertising Info</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-white b6 text-center py-3 pt-4 pb-4 size14"
            style="background-color: #1e3440;">© 2019
            <a href="{{ route('home') }}" class="size14 ft_link">
                Shipsearch.com
            </a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->


    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- jquery UI	 -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- bootstrap bundle -->

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script> --}}

    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> --}}

    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> --}}

    <!-- custom js -->
    <script type="text/javascript" src="{{ asset('front_asset/js/my_validation.js') }}"></script>
    
    <!-- custom js of view cargo/vessel charter/ sale and purchase page -->
    <script type="text/javascript" src="{{ asset('front_asset/js/my_custom.js') }}"></script>

    <!-- datepicker -->
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

    <!-- datatables -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js">
    </script>


</body>

</html>
