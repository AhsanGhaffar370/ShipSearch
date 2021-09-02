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

    {{-- <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link href="http://fonts.cdnfonts.com/css/eras-demi-itc" rel="stylesheet">
                
    <!-- custom css -->
    <link href="{{ asset('front_asset/css/my_style.css') }}" rel="stylesheet">
    <link href="{{ asset('front_asset/css/view_pages_style.css') }}" rel="stylesheet">
    {{-- Eras font --}}
    {{-- <link href="{{ asset('front_asset/css/eras_font/ErasMediumITC.ttf') }}" rel="stylesheet"> --}}

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
            color: #333333;
            font-size: 14px !important;
        }

        .ft_link:hover {
            color: #292929;
        }

        .ft_social {
            color: white;
            background: #4D998D;
            border-radius: 6px;
            padding: 6px 8px;
            margin-right: 10px;
        }

        .ft_border {
            margin-bottom: 1px;
            border: 0;
            border-top: 6px solid #4D998D;
        }

        button.btn.dropdown-toggle.btn-light {
            background-color: white;
            border: 1px solid #cecece;
        }

        .dropdown-toggle::after {
            color: black;
        }

        /* .navbar { */
        /* align-items: flex-end !important; */
        /* padding: 15px 30px 15px 70px !important;
            border-bottom: 10px solid #4D9A8E; */
        /* padding: 0px !important; */
        /* } */

        /* .navbar-nav {
            align-items: center;
            margin-right: 29% !important;
            margin-bottom: 20px !important;
        }

        #navbarSupportedContent {
            padding-left: 80px !important;
        } */

        /* .nav-link {
            color: #2A7473 !important;
            font-style: italic;
            font-weight: 600;
            font-family: 'Open Sans';
            padding: 15px 20px !important;
            margin-bottom: -18px;
        }

        .btn-style {
            font-style: italic;
            font-weight: 600;
            font-family: 'Open Sans';
        } */

        .icon_style {
            border: none;
            color: white;
            background-color: #4D998D;
            padding: 6px;
            font-size: 14px;
            border-radius: 1px;
        }

        .head_pad {
            padding: 3px 0px 25px 25px;
            border-bottom: 20px solid #4D9A8E;
        }

        .ft_list {
            list-style-image: url("{{ asset('front_asset/images/dot.PNG') }}") !important;
            margin-left: 20px;
        }

        .ft_list li {
            padding-bottom: 10px;
        }






        .navbar {
            align-items: flex-end !important;
        }

        #navbarSupportedContent {
            padding-left: 80px !important;
        }

        .nav-link {
            color: #4D998D !important;
            font-style: italic;
            font-weight: 600;
            font-family: 'Exo', sans-serif !important;
            padding: 5px 20px !important;
            margin-bottom: -18px;
        }


    </style>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />


    @routes

</head>

<body class="bg-white">
    {{-- navbar-expand-lg --}}
    <div class="head_pad">
        <div class="pl_1 pr_1">
            <div class="ml-auto d-flex flex-column  align-items-end">
            <div class="row m-0">
                <div class="mt-auto mb-auto mr-4">
                    <i class="fas fa-phone-alt fa-1x text-black-50"></i> &nbsp;
                    <a href="tel:+012345678901" class="size13 text-black-50 b6">+01 234 5678 901</a>
                </div>

                <div class="mt-auto mb-auto mr-2">
                    <i class="fa fa-envelope fa-1x text-black-50"></i>&nbsp;
                    <a href="mailto:info@shipsearch.com"
                        class="size13 text-black-50 b6">info@shipsearch.com</a>
                </div>
            </div>
        </div>
            <nav class="navbar navbar-expand-lg navbar-white bg-white p-0">
                <a class="navbar-brand p-0" href="{{ route('home') }}">
                    <img width="200" src="{{ asset('front_asset/images/logo.png') }}" alt="" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="fas fa-bars" style="color:#36716B; font-size:28px; display:inline;"></i>
                    </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item pb-4 pb-lg-0">
                            <a class="nav-link" href="{{ route('cargo.view') }}">Cargo</a>
                        </li>
                        <li class="nav-item pb-4 pb-lg-0">
                            <a class="nav-link" href="{{ route('vessel.view') }}">Vessel Charter</a>
                        </li>
                        <li class="nav-item pb-4 pb-lg-0">
                            <a class="nav-link" href="{{ route('vessel_sale.view') }}">Sale & Purchase</a>
                        </li>
                        <li class="nav-item pb-4 pb-lg-0">
                            <a class="nav-link" href="{{ route('directory.view') }}">Directory</a>
                        </li>
                    </ul>
                    @if (session('front_uid') != '')
                        {{-- <a class="btn btn-info rounded-0"
                            href="{{ route('logout') }}">({{ session('front_uname') }})
                            Logout</a> --}}
                        <button class="btn_style size13 btn_xxs t_italic exo" type="button" onclick="location.href='{{ route('logout') }}'">Logout</button>
                    
                    @else
                    <button class="btn_style size13 btn_xxs t_italic exo" type="button" onclick="location.href='{{ route('login') }}'">LOGIN / REGISTER</button>
                    @endif
                    
                </div>
            </nav>
        </div>
    </div>

    {{-- <div class="head_pad">
        <div class="widee">
            <div class="row m-0">
                <div class="col-12 col-lg-3">
                    <a class="navbar-brand" href="#">
                        <img width="300" src="{{ asset('front_asset/images/logo.png') }}" alt="" />
                    </a>
                </div>

                <div class="col-12 col-lg-9 p-0">
                    <div class="row m-0 justify-content-end">
                        <a href="{{ route('login') }}" class=" mr-5">
                            <img src="{{ asset('front_asset/images/Login-Button.png') }}" alt="" />
                        </a>
                        {{-- <button class="btn btn-success btn-style mr-5" type="button"
                onclick="location.href='{{ route('login') }}'">LOGIN / REGISTER</button> 
                        <div class="mt-auto mb-auto mr-4">
                            <i class="fas fa-phone-alt icon_style"></i> &nbsp;
                            <a href="tel:+012345678901" class="text-dark font-weight-bold">+01 234 5678 901</a>
                        </div>

                        <div class="mt-auto mb-auto mr-2">
                            <i class="fa fa-envelope icon_style"></i>&nbsp;
                            <a href="mailto:info@shipsearch.com"
                                class="text-dark font-weight-bold">info@shipsearch.com</a>
                        </div>
                    </div>


                    <nav class="navbar navbar-white bg-white">

                        <button class="navbar-toggler ml-auto p-0" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            {{-- <span class="navbar-toggler-icon"> 

                            {{-- <i class="fas fa-bars" style="color:#36716B; font-size:28px; display:inline;"></i> 
                            <img src="{{ asset('front_asset/images/menu_icon.PNG') }}" alt="">
                            {{-- </span> 
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav">
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

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div> --}}

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
    <footer class="page-footer font-small bg_w  " style="border-top: 10px solid #2A7473 !important;">

        <div class="pl_1 pr_1">
            <!-- Footer Links -->
            <div class="container-fluid text-center text-md-left pt-4 pb-4">

                <!-- Grid row -->
                <div class="row">

                    <!-- Grid column -->
                    <div class="col-md-3 mt-md-0 mt-3 centre" style="align-items: baseline">
                        <img src="{{ asset('front_asset/images/logo.png') }}" width="250" class="logo footer_logo">
                    </div>


                    <!-- Grid column -->
                    <div class="col-md-3 offset-md-6 mb-md-0 mb-3">

                        <h5 class="size30 cl-dark eras ">Contact Details:</h5>

                        <div class="p-2">
                            <i class="fas fa-phone-alt icon_style"></i>&nbsp;
                            <a href="tel:+012345678901" class="size14 ft_link text-dark b6">+01 234 5678 901</a>
                        </div>

                        <div class="p-2">
                            <i class="fa fa-envelope icon_style"></i>&nbsp;
                            <a href="mailto:info@shipsearch.com" class="size14 ft_link text-dark b6">info@shipsearch.com</a>
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

                </div>
                <!-- Grid row -->

            </div>
        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="text-white size13 b4 text-center py-3 pt-2 pb-2 size18" style="background-color: #24292C;">
            Copyright 2021 Ship Search | Created by Webist Ltd (UK)
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script> --}}

    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> --}}

    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> --}}

    

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

    <script>
        $(function () {
            $('[data-toggle="popover"]').popover()
        });
    </script>
</body>

</html>
