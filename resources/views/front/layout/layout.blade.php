<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('page_title')</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/7516c4b4cc.js" crossorigin="anonymous"></script>

    <!-- custom css -->
    <link href="{{ asset('front_asset/css/my_style.css') }}" rel="stylesheet">

    <!-- datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

    <!-- datepicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">

    <style>
    .dropdown-toggle:after {
        color: white;
    }

    label {
        color: black;
        font-weight: 600;
    }

    a.nav-link:hover {

        background-color: #f1f2f3;
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
    </style>

</head>

<body class="bg-white">

    <!-- Navigation -->
    <header>
        <!-- <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav"> -->
        <div class="d-block text-center">
            <a class="navbar-brand pt-2 pb-2" href="/">
                <img src="http://businesscardsprinting.co.uk/includes/frontend_source/ss_v2/images/logo.png" alt="" />
            </a>
        </div>
        <nav class="navbar navbar-expand-lg cl_bd bg-light pt-0 pb-0" id="mainNav">

            <div class="container-fluid">

                <button class="navbar-toggler navbar-toggler-right  pt-4 pb-4" type="button" data-toggle="collapse"
                    data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Toggle navigation">

                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse pl-lg-5 m-auto" id="navbarResponsive">
                    <ul class="navbar-nav m-auto pl-lg-5 text-center">
                        <li class="nav-item">
                            <a class="nav-link cl_bd size13 b7 pt-4 pb-4 pl-3 pr-3" href="/cargo/view">Cargos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link cl_bd size13 b7 pt-4 pb-4 pl-3 pr-3" href="/">Vessel Charter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link cl_bd size13 b7 pt-4 pb-4 pl-3 pr-3" href="/">Sale & Purchase</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link cl_bd size13 b7 pt-4 pb-4 pl-3 pr-3" href="/">Voyage Estimator</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link cl_bd size13 b7 pt-4 pb-4 pl-3 pr-3" href="/">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link cl_bd size13 b7 pt-4 pb-4 pl-3 pr-3" href="/">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link cl_bd size13 b7 pt-4 pb-4 pl-3 pr-3" href="/">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link cl_bd size13 b7 pt-4 pb-4 pl-3 pr-3" href="/">Cotact</a>
                        </li>
                    </ul>
                    <a class="btn btn-info rounded-0" href="/login">Login/Register</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Navigation End -->


    <!-- Main Content -->
    @section('container')
    @show
    <!-- Main Content End -->


    <!-- Footer -->
    <hr class="ft_border">
    <footer class="page-footer font-small bg_sec">

        <!-- Footer Links -->
        <div class="container-fluid text-center text-md-left pt-5 pb-2">

            <!-- Grid row -->
            <div class="row pt-4 pb-4">

                <!-- Grid column -->
                <div class="col-md-6 mt-md-0 mt-3 pl-lg-5">
                    <img src="http://businesscardsprinting.co.uk/includes/frontend_source/images/logo-footer.png"
                        class="logo footer_logo">
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
        <div class="footer-copyright text-center bg-light py-3 pt-4 pb-4 size14">© 2019
            <a href="https://mdbootstrap.com/" class="size14 b6 ft_link">
                Shipsearch.com
            </a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->


    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- bootstrap bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- custom js -->
    <script src="{{ asset('front_asset/js/my_validation.js') }}"></script>
    <!-- <script src="{{ asset('front_asset/js/icheck.min.js') }}"></script>
      <script src="{{ asset('front_asset/js/custom.js') }}"></script> -->

    <!-- datepicker -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

    <!-- datatables -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js">
    </script>



    <script>
    $(document).ready(function() {

        // $('.show_details').hide();
        $('.show_details_btn').click(function(e) {
            e.preventDefault();
            let id = $(this).attr('href');
            $('.show_details_' + id).toggle("slow");
        });

    });
    $(document).ready(function() {
        $('#cargo_table').DataTable({
            // "paging": false,
            // "pagingType":"full_numbers",
            //   "lengthMenu":[[5,10,25],[5,10,25]],
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, 'All']
            ],
            responsive: true,
            type: 'date'
            // stateSave: true
        });
    });


    $(document).ready(function() {
        $('.page-state').click(function(e) {
            e.preventDefault();

            let status_val;
            let status = $(this).html();

            let href = $(this).attr('href');
            let id = href.split('/');

            let id_val = id[id.length - 1]

            // alert(id[id.length - 1]);
            if (status == "De-Activate") {
                status_val = "0";
            } else {
                status_val = "1";
            }

            $.ajax({
                url: href,
                data: "id=" + id_val + "&status=" + status_val,
                type: "get",
                success: function(res) {
                    if (res == 0) {
                        $('.page-status-' + id_val).html("Activate");
                        $('.page-status-' + id_val).attr("id", "1");
                        $(".badge-" + id_val).html("In-Active");
                        // $(".badge-"+id_val).attr("class","badge badge-danger");
                        $(".badge-" + id_val).removeClass("badge-success");
                        $(".badge-" + id_val).addClass("badge-danger");
                    }
                    if (res == 1) {
                        $('.page-status-' + id_val).html("De-Activate");
                        $('.page-status-' + id_val).attr("id", "0");
                        $(".badge-" + id_val).html("Active");
                        // $(".badge-"+id_val).attr("class","badge badge-success");
                        $(".badge-" + id_val).removeClass("badge-danger");
                        $(".badge-" + id_val).addClass("badge-success");
                    }
                }
            });
        });
    });
    </script>


</body>

</html>