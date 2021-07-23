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

        a.nav-link:hover {

            background-color: #c1e1fe;
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

    </style>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />




</head>

<body class="bg-white">

    <!-- Navigation -->
    <header class="" style="background-color: #e3eff6!important;">
        <!-- <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav"> -->
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
    </header>
    <!-- Navigation End -->


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

    <!-- datepicker -->
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

    <!-- datatables -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js">
    </script>


    <script>
        $(document).ready(function() {

            //add cargo
            $('.cargo_type_id').selectpicker();
            $('.loading_region_id').selectpicker();
            $('.loading_country_id').selectpicker();
            $('.loading_port_id').selectpicker();
            $('.discharge_region_id').selectpicker();
            $('.discharge_country_id').selectpicker();
            $('.discharge_port_id').selectpicker();


            $('#cargo_table2').DataTable({
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

        function GetFormattedDate(date12) {
            // var dateAr = '2014-01-06'.split('-');
            var dateAr = date12.split('-');
            var mon21 = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec', ];
            var newDate = dateAr[2] + '-' + mon21[parseInt(dateAr[1]) - 1] + '-' + dateAr[0];
            return newDate;
        }

        $('.cargo_show_detail2').hide();
        $(document).on("click", '.cargo_show_detail1', function(e) {
            e.preventDefault();
            let id = $(this).attr('href');
            $('.show_details_' + id).fadeToggle("slow");
            $('.cargo_show_detail1_' + id).hide();
            $('.cargo_show_detail2_' + id).show();


            $(this).parent().parent().css({"background-color":"#F1F1F1"});
        });

        $(document).on("click", '.cargo_show_detail2', function(e) {
            e.preventDefault();
            let id = $(this).attr('href');
            $('.show_details_' + id).fadeToggle("slow");
            $('.cargo_show_detail1_' + id).show();
            $('.cargo_show_detail2_' + id).hide();

            $(this).parent().parent().css({"background-color":""});
        });

        //show details of cargo,vessel
        $('.show_detail2').hide();
        $(document).on("click", '.show_detail1', function(e) {
            e.preventDefault();
            let id = $(this).attr('href');
            $('.show_details_' + id).fadeToggle("slow");
            $('.show_detail1_' + id).hide();
            $('.show_detail2_' + id).show();
        });
        $(document).on("click", '.show_detail2', function(e) {
            e.preventDefault();
            let id = $(this).attr('href');
            $('.show_details_' + id).fadeToggle("slow");
            $('.show_detail1_' + id).show();
            $('.show_detail2_' + id).hide();
        });



        $(document).on("click", '.ser_hist_req', function(e) {

            let id2 = $(this).attr('id');
            let id1 = id2.split('-');
            let id = id1[id1.length - 1];

            // let cargotype = $("#cargotype-" + id).html();
            // let laycan_from = $("#laycan_from-" + id).html();
            // let laycan_to = $("#laycan_to-" + id).html();
            // let lregion = $("#lregion-" + id).attr('class');
            // let dregion = $("#dregion-" + id).attr('class');
            // let lcountry = $("#lcountry-" + id).attr('class');
            // let dcountry = $("#dcountry-" + id).attr('class');
            // let lport = $("#lport-" + id).attr('class');
            // let dport = $("#dport-" + id).attr('class');

            $(".edit_del_btns").hide();
            $(".edit_del_btn_" + id).show();
            
            // $("#adv_ser21").hide();


            $(".ser_hist_req").css({
                'background-color': "white",
                "color": "black"
            });
            $(this).css({
                'background-color': "#555555",
                "color": "white"
            });


            $.ajax({
                url: '{{ route('cargo.ser_hist_rec') }}',
                // data: "id=" + id + "&cargotype=" + cargotype + "&laycan_from=" + laycan_from + "&laycan_to=" + laycan_to + "&lregion=" + lregion + "&dregion=" + dregion + "&lcountry=" + lcountry + "&dcountry=" + dcountry + "&lport=" + lport + "&dport=" + dport,
                data: "id="+id,
                type: "get",
                success: function(response) {

                    let json_data = $.parseJSON(response);
                    var len = json_data.length;
                    var post_str = "";
                    // console.log(json_data['data'][0]['cargo_name'])

                    if (json_data['data']['length'] == 0) {
                        post_str += '<tr class=""><td colspan="3"><i>No exact results. Try expanding your filters</i></td></tr>';
                    } else {
                        $.each(json_data, function(i, obj) {
                            $.each(obj, function(i, obj1) {
                                console.log(obj1);
                                console.log(i+"  "+obj1);
                                post_str += `<tr class="">
                                            <td>` + obj1.ref_no + `</td>
                                            <td>` + obj1.cargo_name + `</td>
                                            <td>` + obj1.cargo_type_id + `</td>
                                            <td>` + obj1.loading_region_id + `</td>
                                            <td>` + obj1.discharge_region_id + `</td>
                                            <td>` + GetFormattedDate(obj1.laycan_date_from) + `</td>
                                            <td>` + GetFormattedDate(obj1.laycan_date_to) + `</td>
                                            <td>` + obj1.quantity + `</td>
                                            <td>` + obj1.loading_discharge_rates + `</td>
                                            <td>` + obj1.created_at + `</td>
                                            <td class="text-center">
                                                <a href="` + obj1.cargo_id + `" class="cargo_show_detail1_` + obj1
                                    .cargo_id + ` cargo_show_detail1 show_details_btn"><i class="fas fa-eye fa-2x"></i></a>
                                                <a href="` + obj1.cargo_id + `" class="cargo_show_detail2_` + obj1
                                    .cargo_id + ` cargo_show_detail2 show_details_btn"><i class="fas fa-eye-slash fa-2x"></i></a>
                                            </td>
                                            </tr>
                                            
                                            <tr class="show_details show_details_` + obj1.cargo_id + `" style="display: none; background-color: #F1F1F1;">
                                            <td></td>
                                            <td>
                                                <p class="b7 mb-0">Loading Country:</p>
                                                <p class="">` + obj1.loading_country_id + `</p>
                                                <p class="b7 mb-0">Max LOA:</p>
                                                <p class="">` + obj1.max_loa + `</p>
                                            </td>
                                            <td>
                                                <p class="b7 mb-0">Loading Port:</p>
                                                <p class="">` + obj1.loading_port_id + `</p>
                                                <p class="b7 mb-0">Max Draft:</p>
                                                <p class="">` + obj1.max_draft + `</p>
                                            </td>
                                            <td>
                                                <p class="b7 mb-0">Discharge Country:</p>
                                                <p class="">` + obj1.discharge_country_id + `</p>
                                                <p class="b7 mb-0">Max Height:</p>
                                                <p class="">` + obj1.max_height + `</p>
                                            </td>
                                            <td>
                                                <p class="b7 mb-0">Discharge Port:</p>
                                                <p class="">` + obj1.discharge_port_id + `</p>
                                                <p class="b7 mb-0">Loading Equipment Req:</p>
                                                <p class="">` + obj1.loading_equipment_req + `</p>
                                            </td>
                                            <td>
                                                <p class="b7 mb-0">Over Age:</p>
                                                <p class="">` + obj1.over_age + `</p>
                                                <p class="b7 mb-0">Discharge Equipment Req:</p>
                                                <p class="">` + obj1.discharge_equipment_req + `</p>
                                            </td>
                                            <td>
                                                <p class="b7 mb-0">Hazmat:</p>
                                                <p class="">` + obj1.hazmat + `</p>
                                                <p class="b7 mb-0">Combinable:</p>
                                                <p class="">` + obj1.combinable + `</p>
                                            </td>
                                            <td>
                                                <p class="b7 mb-0">Commission:</p>
                                                <p class="">` + obj1.commision + `</p>
                                                <p class="b7 mb-0">Gear Lifting Capacity:</p>
                                                <p class="">` + obj1.gear_lifting_capacity + `</p>
                                            </td>
                                            <td colspan="2">
                                                <p class="b7 mb-0">Additional Info:</p>
                                                <p class="">` + obj1.additional_info + `</p>
                                            </td>
                                            <td></td>
                                            </tr>
                                            `;
                            });
                        });


                    } //end else
                    $("#all_cargo").html(post_str);

                    $("#records_found21").html(json_data['data']['length']+" EXACT MATCHES");

                    $('.cargo_show_detail2').hide();

                }
            });
        });


        $(document).ready(function() {
            $(document).on('click', '.close_each', function(e) {
                e.preventDefault();

                let el = e.target;
                // let table_row = $(el).parent().parent().parent();
                let uid = e.target.getAttribute('href');



                $("#advance_ser_"+uid).hide();
                $("#rec-"+uid).show();

                $(".edit_del_btns").hide();
                $(".ser_hist_req").css({
                    'background-color': "white",
                    "color": "black"
                });
            });

            $(document).on('click', '#update21', function(e) {
                e.preventDefault();
                let el = e.target;
                // let table_row = $(el).parent().parent().parent();
                let uid = e.target.getAttribute('href');

                $(".ser_hist_req").show();
                $("#rec-"+uid).hide();

                $(".advance_ser").hide();
                $("#advance_ser_"+uid).show();


                // var make = "fiat";

                // $("#cars option[value='" + make + "']").attr("selected","selected");
            });

            //delete a record of search history 
            $(document).on('click', '#delete21', function(e) {
                // $(".delete21").click(function(e){
                e.preventDefault();
                let el = e.target;
                let table_row = $(el).parent().parent().parent();
                let deleteid = e.target.getAttribute('href');

                // alert(deleteid);

                let confirmalert = confirm("Are you sure?");
                if (confirmalert == true) {
                    // AJAX Request
                    $.ajax({
                        url: '{{ route('cargo.del_ser_hist_rec') }}',
                        data: "id=" + deleteid,
                        type: "get",
                        success: function(response) {
                            // alert(response);
                            if(response == "1"){
                            // Remove row from HTML Table
                            table_row.css('background', 'tomato');
                            table_row.fadeOut(800, function() {
                                table_row.remove();
                            });
                            }else{
                            alert('Invalid ID.');
                            }

                        }
                    });
                }
            });



            // $('#ser_hist_rec').delegate('tr','click',function() {
            //     alert( 'i was clicked' );
            // });

            $("#close_dialog").click(function() {
                $("#dialog").dialog("close");
            });

            $('.add_cargo_btn').click(function(e) {

                if ($(this).attr('id') == "") {
                    e.preventDefault();
                    $("#dialog").dialog({
                        draggable: false,
                        resizable: false,
                        closeOnEscape: false,
                        width: '30%',
                        modal: true
                    });

                    $(".ui-dialog-titlebar").hide();
                    $("#dialog").dialog();
                }
            });

            //add cargo, vessel
            $('.add_btn').click(function(e) {

                if ($(this).attr('id') == "") {
                    e.preventDefault();
                    $("#dialog").dialog({
                        draggable: false,
                        resizable: false,
                        closeOnEscape: false,
                        width: '30%',
                        modal: true
                    });

                    $(".ui-dialog-titlebar").hide();
                    $("#dialog").dialog();
                }
            });


            // $('.show_details_btn').click(function(e) {
            //     e.preventDefault();
            //     let id = $(this).attr('href');
            //     $('.show_details_' + id).fadeToggle("slow");
            // });

            // AJAX Using jQuery 
            $("#email31").keyup(function() {
                let ser = $('#email31').val();

                $.ajax({
                    url: 'checkmail',
                    type: 'get',
                    data: 'email=' + ser,
                    success: function(response) {
                        if (response == "exist") {
                            $("#msg21").html(
                                '<div class="size13 alert alert-warning"><i class="fas fa-info-circle"></i> Email Already Exist</div>'
                            );
                            $('#sign12').attr('disabled', 'disabled');
                        } else if (response == "not exist") {
                            $("#msg21").html('');
                            $('#sign12').removeAttr('disabled');
                        } else {
                            // console.log("else : ",response);
                        }
                    }
                });
            });

            $('#reg_form21').submit(function(e) {
                check_cfrmPass();

                if (check_cfrmPass() === true) {
                    return;
                } else {
                    e.preventDefault();
                }
            });

            // validate confirm password function
            function check_cfrmPass() {
                var cfrm_border = $('#cfrm_border');
                var pass1 = $("#org_pass");
                var pass2 = $("#cfrm_pass");
                var pass1_val = pass1.val();
                var pass2_val = pass2.val();

                if (pass2_val != pass1_val) {
                    $("#pass_msg").html(
                        '<div class="size13 alert alert-warning"><i class="fas fa-info-circle"></i> Password & Confirm Password should be same</div>'
                    );
                    cfrm_border.css({
                        "border": "1px solid red",
                        "border-radius": "5px"
                    });
                    return false;
                } else {
                    $("#pass_msg").html('');
                    cfrm_border.css({
                        "border": "none"
                    });
                    return true;
                }
            }
        });


        // $(document).ready(function() {
        //     $('#cargo_table').DataTable({
        //         // "paging": false,
        //         // "pagingType":"full_numbers",
        //         //   "lengthMenu":[[5,10,25],[5,10,25]],
        //         "lengthMenu": [
        //             [10, 25, 50, 100, -1],
        //             [10, 25, 50, 100, 'All']
        //         ],
        //         responsive: true,
        //         type: 'date'
        //         // stateSave: true
        //     });
        // });


        // $(document).ready(function() {
        //     $('.page-state').click(function(e) {
        //         e.preventDefault();

        //         let status_val;
        //         let status = $(this).html();

        //         let href = $(this).attr('href');
        //         let id = href.split('/');

        //         let id_val = id[id.length - 1]

        //         // alert(id[id.length - 1]);
        //         if (status == "De-Activate") {
        //             status_val = "0";
        //         } else {
        //             status_val = "1";
        //         }

        //         $.ajax({
        //             url: href,
        //             data: "id=" + id_val + "&status=" + status_val,
        //             type: "get",
        //             success: function(res) {
        //                 if (res == 0) {
        //                     $('.page-status-' + id_val).html("Activate");
        //                     $('.page-status-' + id_val).attr("id", "1");
        //                     $(".badge-" + id_val).html("In-Active");
        //                     // $(".badge-"+id_val).attr("class","badge badge-danger");
        //                     $(".badge-" + id_val).removeClass("badge-success");
        //                     $(".badge-" + id_val).addClass("badge-danger");
        //                 }
        //                 if (res == 1) {
        //                     $('.page-status-' + id_val).html("De-Activate");
        //                     $('.page-status-' + id_val).attr("id", "0");
        //                     $(".badge-" + id_val).html("Active");
        //                     // $(".badge-"+id_val).attr("class","badge badge-success");
        //                     $(".badge-" + id_val).removeClass("badge-danger");
        //                     $(".badge-" + id_val).addClass("badge-success");
        //                 }
        //             }
        //         });
        //     });
        // });
    </script>


</body>

</html>
