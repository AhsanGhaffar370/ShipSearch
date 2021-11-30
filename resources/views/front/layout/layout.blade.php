<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('page_title')</title>

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/7516c4b4cc.js" crossorigin="anonymous"></script>

    {{-- Google fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">

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
            padding: 5px 0px !important;
            margin-bottom: -18px;
        }

        .form-group section select{
            display: none;
        }

        .nav_link_border{
            border-bottom: 3px double #36716B;
        }

        
        .carousel-control-prev, .carousel-control-next{
            opacity: 1 !important;
        }

        a:focus-visible {
            outline: none !important;
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
                    <img src="{{ asset('front_asset/images/final_logo.png') }}" alt="" />
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
                        <li class="nav-item pb-4 pl-3 pr-3 pb-lg-0">
                            <a class="nav-link  nav_link_cargo" href="{{ route('cargo.view') }}">Cargo</a>
                        </li>
                        <li class="nav-item pb-4 pl-3 pr-3 pb-lg-0">
                            <a class="nav-link  nav_link_vessel" href="{{ route('vessel.view') }}">Vessel Charter</a>
                        </li>
                        <li class="nav-item pb-4 pl-3 pr-3 pb-lg-0">
                            <a class="nav-link  nav_link_vessel_sale" href="{{ route('vessel_sale.view') }}">Sale & Purchase</a>
                        </li>
                        <li class="nav-item pb-4 pl-3 pr-3 pb-lg-0">
                            <a class="nav-link nav_link_directory" href="{{ route('directory.view') }}">Directory</a>
                        </li>
                        <li class="nav-item pb-4 pl-3 pr-3 pb-lg-0">
                            <a class="nav-link nav_link_messenger" href="http://www.eqan.net/shipsearch/chatify">Messenger</a>
                        </li>
                    </ul>
                    @if (session('front_uid') != '')
                        <button class="btn_style size13 btn_xxs t_italic exo" type="button" onclick="location.href='{{ route('logout') }}'">Logout</button>
                    
                    @else
                    <button class="btn_style size13 btn_xxs t_italic exo mr-2" type="button" onclick="location.href='{{ route('signup') }}'">REGISTER</button>
                    <button class="btn_style size13 btn_xxs t_italic exo" type="button" onclick="location.href='{{ route('login') }}'">LOGIN</button>
                    @endif
                    
                </div>
            </nav>
        </div>
    </div>

    <!-- Main Content -->
    @section('container')
    @show
    <!-- Main Content End -->


    <input type="hidden" name="is_logged_in" id="is_logged_in" value="{{ session('front_uid') }}">
    <input type="hidden" name="member_type21" id="member_type21" value="{{ session('member_type') }}">
    
    <div id="access_denied" class="text-right rounded p-1" style="display: none;">
        <p class="size20 text-left text-white bg_gdd p-2 rounded">Access Denied</p>

        <p class="text-left">
            Become a  <a href={{ route('login') }} class="btn_style text-white size13 btn-sm exo">member</a> to access.
        </p>
        <br>
        <hr>
        <button id="close_access_denied" class="btn btn-danger btn-sm size13">Close</button>
    </div>


    <!-- Footer -->
    {{-- <hr class="ft_border"> --}}
    <footer class="page-footer font-small bg_w  " style="border-top: 10px solid #2A7473 !important;">

        <div class="pl_1 pr_1">
            <!-- Footer Links -->
            <div class="container-fluid text-center text-md-left pt-3 pb-3">

                <!-- Grid row -->
                <div class="row">

                    <!-- Grid column -->
                    <div class="col-md-3 mt-md-0 mt-3 pr-5 pl-5 pt-4 pb-4 centre" style="align-items: baseline">
                        <img src="{{ asset('front_asset/images/final_logo.png') }}" class="logo footer_logo">
                    </div>
                    
                    <!-- Grid column -->
                    <div class="col-lg-2 col-md-4 offset-lg-7 offset-md-5 mb-md-0 mb-3 text-left">

                        <h5 class="size30 eras ">Contact Details:</h5>

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
        <div class="text-white size13 b4 text-center pt-2 pb-2 size18" style="background-color: #24292C;">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    <script>
        $(document).ready(function(){

            // vessel charter image preview dialog box on vessel_sale page
            $("#dialog").dialog({
                draggable: false,
                resizable: false,
                closeOnEscape: false,
                autoOpen: false,
                width: '50%',
                modal: true
            });
		
            // $("#dialog").dialog();
            $(".ui-dialog-titlebar").hide();
            
            $("#close_dialog").click(function(e){
                e.preventDefault();
                $("#dialog").dialog("close");
            });

            $(document).on('click', '#show_img31', function(e){
                let src=$(this).attr('src');

                let post_str=`
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="` + src + `" alt="First slide">
                    </div>
                    `;

                let srcs=$(this).siblings('.img-fluid');
                // console.log($(this).siblings('.img-fluid')[0]);
                $.each(srcs, function(i, obj) {
                    post_str+=`
                    <div class="carousel-item">
                        <img class="d-block w-100" src="` + $(obj).attr('src') + `" alt="First slide">
                    </div>
                    `;
                });

                $('.carousel-inner').html(post_str);
                $("#dialog").dialog('open');
            });


            //delete all dialog box on cargo, vessel and vessel sale page
            
            $("#show_delete_popup").dialog({
                draggable: false,
                resizable: false,
                closeOnEscape: false,
                autoOpen: false,
                width: '450px',
                modal: true
            });
            
            $(".ui-dialog-titlebar").hide();

            $("#close_delete_popup").click(function(e){
                e.preventDefault();
                $("#show_delete_popup").dialog("close");
            });

            $(document).on('click', '#delete_popup', function(e){
                
                e.preventDefault();

                $("#show_delete_popup").dialog('open');
            });

            
            //validation on cvs pages
            
            $("#access_denied").dialog({
                draggable: false,
                resizable: false,
                closeOnEscape: false,
                autoOpen: false,
                width: '30%',
                modal: true
            });

            $("#close_access_denied").click(function(e){
                e.preventDefault();
                $("#access_denied").dialog("close");
            });

            $(document).on('click', '.check_login', function(e){
                
                // e.preventDefault();
                // $("#access_denied").dialog('open');

                if ($("#is_logged_in").val() == "" ) {
                    e.preventDefault();
                    
                    $(".ui-dialog-titlebar").hide();
                    $("#access_denied").dialog('open');
                }
            });

            $(document).on('click', '.add_new_cvs_val', function(e){
                
                // e.preventDefault();
                // $("#access_denied").dialog('open');

                if ($("#member_type21").val() == "Free" ) {
                    e.preventDefault();
                    
                    $(".ui-dialog-titlebar").hide();
                    $("#access_denied").dialog('open');
                }
            });
        });
    </script>

    <!-- custom js -->
    <script type="text/javascript" src="{{ asset('front_asset/js/my_validation.js') }}"></script>

    <!-- custom js of view cargo/vessel charter/ sale and purchase page -->
    <script type="text/javascript" src="{{ asset('front_asset/js/my_custom.js') }}"></script>

    <!-- datepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

    <!-- datatables -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js">
    </script>
    
    <script>
        $(function () {
            $('[data-toggle="popover"]').popover()
        });

        $(document).on('click', '#popovercloseid', function(e){
            e.preventDefault();
            $('.comp_popover').popover('hide'); 
        });

        // $(document).ready(function(){
        //     // setTimeout(function() { 
        //     //     // $( window ).on( "load", function() {
        //     //     // console.log( "window loaded" );
        //     //     // });
        //     //  },1000);
            
        // });



        $(document).ready(function() {
            let count_add=1;

            /*Add row event*/
            $(document).on('click', '.rowfy-addrow', function(){
                if(count_add<9){
                    count_add++;
                    rowfyable = $(this).closest('.table');
                    lastRow = $('.tbody .tr-row:last', rowfyable).clone();
                    $('input', lastRow).val(''); //$('input', lastRow) -> this expression is equal to $( lastRow ).find( "input" )
                    $('.tbody', rowfyable).append(lastRow);
                    $(this).removeClass('rowfy-addrow btn-success').addClass('rowfy-deleterow btn-danger').text('-');
                }else{
                    alert('Maximum 9 images can upload');
                }
            });
    
            /*Delete row event*/
            $(document).on('click', '.rowfy-deleterow', function(){
                count_add--;
                $(this).closest('.tr-row').remove();
            });


            // image preview
            // $('img[data-enlargeable]').addClass('img-enlargeable').click(function() {
            //     var src = $(this).attr('src');
            //     var modal;

            //     function removeModal() {
            //         modal.remove();
            //         $('body').off('keyup.modal-close');
            //     }
            //     modal = $('<div>').css({
            //         background: 'RGBA(0,0,0,.5) url(' + src + ') no-repeat center',
            //         backgroundSize: 'contain',
            //         width: '100%',
            //         height: '100%',
            //         position: 'fixed',
            //         zIndex: '10000',
            //         top: '0',
            //         left: '0',
            //         cursor: 'zoom-out'
            //     }).click(function() {
            //         removeModal();
            //     }).appendTo('body');
            //     //handling ESC
            //     $('body').on('keyup.modal-close', function(e) {
            //         if (e.key === 'Escape') {
            //         removeModal();
            //         }
            //     });
            // });

            

            // $('img[data-enlargeable]').addClass('img-enlargeable').click(function() {
                
                // var src = $(this).attr('src');
                // var modal;

                // function removeModal() {
                //     modal.remove();
                //     $('body').off('keyup.modal-close');
                // }
                // modal = $('<div>').html(
                //     `
                //     <div id="carouselExampleControls" class="carousel caros slide" data-ride="carousel" 
                //     style="background-size: contain; width: 100%; height: 100%; position: fixed; z-index: 10000; top: 0; left: 0; cursor: zoom-out;">
                //         <div class="carousel-inner">
                //             <div class="carousel-item active">
                //                 <img class="d-block" style="width: 70%; height: 70%; margin:5% auto 0% auto;" src="{{asset('storage/vessel_sale_images/163139027729.jpg')}}" alt="First slide">
                //             </div>
                //             <div class="carousel-item active">
                //                 <img class="d-block" style="width: 70%; height: 70%; margin:5% auto 0% auto;" src="{{asset('storage/vessel_sale_images/163139027729.jpg')}}" alt="First slide">
                //             </div>
                //         </div>
                //         <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                //             <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                //             <span class="sr-only">Previous</span>
                //         </a>
                //         <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                //             <span class="carousel-control-next-icon" aria-hidden="true"></span>
                //             <span class="sr-only">Next</span>
                //         </a>
                //     </div>
                //     `
                // ).appendTo('body');
                // //handling ESC
                // $('body').on('keyup.modal-close', function(e) {
                //     if (e.key === 'Escape') {
                //     removeModal();
                //     }
                // });
            // });
        });   
    </script>


            

</body>

</html>
