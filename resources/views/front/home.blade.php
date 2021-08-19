@extends('front/layout/layout')

@section('page_title', 'Home Page')


@section('container')

    <style>
        .ser_inp_fields button {
            padding: 7px 5px !important;
            border-radius: 2px;
            font-size: 14px !important;
            font-family: 'Lato', sans-serif;
        }


        .dropdown-menu li a span {
            font-family: 'Lato', sans-serif;
            font-size: 12px !important;
        }

        .ser_inp_fields>div.dropdown-menu.show {
            /* transform: translate3d(0px, 29px, 0px) !important; */
            padding-top: 0px !important;
            padding-bottom: 0px !important;
            width: 100% !important;
            min-width: auto !important;
            border-radius: 0px 0px 7px 7px !important;
            margin-top: 0px !important;
            box-shadow: none !important;
        }











        .paddings {
            padding-top: 90px;
            padding-bottom: 90px;
            padding-left: 0px;
        }



        .blog_bg {
            /* background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                                    url("{{ asset('front_asset/images/banner-img.jpg') }}"); */
            background-image: url("{{ asset('front_asset/images/banner-img.jpg') }}");
            /* background-attachment: fixed; */
            width: 100%;
            height: auto;
            /* max-height: 811px; */
            min-height: 740px;
            background-repeat: no-repeat;
            background-size: cover !important;
            padding: 0px;
        }

        label {
            color: white;
            font-weight: 400;
            font-size: 15px;
            margin-bottom: 5px !important;
        }

        #laycan_date_to,
        #laycan_date_from {
            font-size: 13px;
            padding: 5px 10px;
            width: 100%;
            border-radius: none;
            border: none;
            border-radius: 2px;
        }

        .sec_left {
            /* border-top: 1px solid white;
            border-right: 1px solid white; */
            padding-right: 10px;
            margin-right: 5px;
        }

        .sec_right {
            /* border-top: 1px solid white;
            border-right: 1px solid white; */
            padding-right: 10px;
            margin-left: 5px;
        }

        .top_labels {
            position: absolute;
            top: -12px;
            /* z-index: 9999 !important; */
            background-color: #22272A;
            padding: 4px 12px;
            text-transform: uppercase !important;
        }

        /* .sub_btn {
            color: #374B40;
            background-color: #ACD6C2;
            padding: 6px 39px;
            font-size: 19px;
            border: 1px solid white;
            border-radius: 7px;
        } */

        .main_hd {
            color: #A5CEBC;
            font-size: 55px;
            font-weight: 400;
            line-height: 1.2;
            text-transform: capitalize;
        }


        .card {
            
            border: none !important;
        }
        .sh_card{
            box-shadow: 1px 1px 8px black !important;
        }

        .card_mar{
            margin-top: -14px!important;
        }

        .card-img-top {
            width: 150px !important;
            margin-left: auto !important;
            margin-right: auto !important;
            margin-bottom: 0px !important;
        }

        .ser_hover:hover{
            background-color: #8bc5aa !important;
        }

        .main_sec{
            border-right: 10px solid #4D998D; 
            border-left: 10px solid #4D998D; 
            border-bottom: 15px solid #4D998D; 
        }

        .top_links_grid{
            display: grid;
            grid-template-columns: repeat(4, minmax(50px, 130px));
            justify-content: space-around;
        }

        .top_links{
            font-size: 15px;
            letter-spacing: 1.5px;
            font-weight: 400 !important;
            background-color: #276F6C;
            /* display: block; */
            color: #fff;
            text-align: center;
            text-decoration: none;
            padding: 13px 0px;
            border: 1px solid #4d998d;
        }
        .top_links:hover{
            color: white;
            background-color: #226b68;
        }
    </style>

    <div class="jumbotron jumbotron-fluid blog_bg border-0">
        <div class="widee">
            <div class="row m-0">
                <div class="col-12 col-lg-5 col-md-6 p-0">
                    <div class="container paddings text-left">
                        <p class="main_hd text-left m-0 eras">
                            MANAGE LOADS.<br>
                            DRIVE PROFITS.
                        </p>
                        <p class="text-white size14">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sagittis augue non ex accumsan
                            lobortis. Morbi a
                            tortor aliquet, sollicitudin urna nec, fringilla lorem. Aliquam erat volutpat. Ut rutrum risus
                            tellus. Proin
                            gravida volutpat accumsan. Praesent ultricies finibus sodales.
                        </p>
                    </div>
                </div>
                <div class="col-12 col-lg-5 offset-lg-2 col-md-6 p-0">
                    <div class="row bg_gdd main_sec m-0">
                        <div class="top_links_grid">
                            <a href="#" class="top_links centre">CARGO</a>
                            <a href="#" class="top_links centre">Vessel <br> Charter</a>
                            <a href="#" class="top_links centre">Sale & <br>Purchase</a>
                            <a href="#" class="top_links centre">Directory</a>
                        </div>
                        <div class="p-4">

                            <form id="search_cargo" method="post" action="{{ route('cargo.search_req') }}"
                                class="form-horizontal form-label-left " enctype="multipart/form-data">
                                @csrf


                                <div class="pos_rel mb-3">
                                    <label for="cargo_type_id" class="cl_gll">Select Cargo:</label>
                                    <select name="cargo_type_id[]" id="cargo_type_id" form="search_cargo"
                                        class="cargo_type_id ser_inp_fields mb-2" multiple title="Any" data-size="5"
                                        data-selected-text-format="count > 2" data-live-search="true">
                                        @foreach ($cargo_type as $row)
                                            <option value="{{ $row->cargo_type_name }}">{{ $row->cargo_type_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row m-0">
                                    <div class="col-12 col-lg-6 col-md-6 p-0">
                                        <div class="text-white sec_left">

                                            {{-- <label class="top_labels">Origin</label> --}}
                                            <p class="">Origin:</p>
                                            <label class="cl_gll">Select Origin:</label>
                                            <select name="loading_region_id[]" id="loading_region_id" form="search_cargo"
                                                class="loading_region_id ser_inp_fields mb-3" multiple title="Region"
                                                data-size="5" data-selected-text-format="count > 2" data-live-search="true">
                                                @foreach ($region as $row)
                                                    <option value="{{ $row->region_name }}">{{ $row->region_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <!-- -->
                                            <select name="loading_country_id[]" id="loading_country_id" form="search_cargo"
                                                class="loading_country_id ser_inp_fields mb-3" multiple title="Country"
                                                data-size="5" data-selected-text-format="count > 2" data-live-search="true">
                                                @foreach ($country as $row)
                                                    <option value="{{ $row->country_name }}">{{ $row->country_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <!-- -->
                                            <select name="loading_port_id[]" id="loading_port_id" form="search_cargo"
                                                class="loading_port_id ser_inp_fields mb-2" multiple title="Port"
                                                data-size="5" data-selected-text-format="count > 2" data-live-search="true">
                                                @foreach ($port as $row)
                                                    <option value="{{ $row->port_name }}">{{ $row->port_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <!-- -->
                                            <label for="laycan_date_from" class="mt-4 cl_gll">Laycan Date From:</label>
                                            <input type="date" required form="search_cargo" class=" from_date"
                                                id="laycan_date_from" name="laycan_date_from"
                                                placeholder="Laycan Date From" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 col-md-6 p-0">
                                        <div class="text-white sec_right">

                                            {{-- <label class="top_labels">Destination</label> --}}
                                            <p class="">Destination:</p>
                                            <label class="cl_gll">Select Destination:</label>
                                            <select name="discharge_region_id[]" id="discharge_region_id"
                                                form="search_cargo" class="discharge_region_id ser_inp_fields mb-3" multiple
                                                title="Region" data-size="5" data-selected-text-format="count > 2"
                                                data-live-search="true">
                                                @foreach ($region as $row)
                                                    <option value="{{ $row->region_name }}">{{ $row->region_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <!-- -->
                                            <select name="discharge_country_id[]" id="discharge_country_id"
                                                form="search_cargo" class="discharge_country_id ser_inp_fields mb-3"
                                                multiple title="Country" data-size="5" data-selected-text-format="count > 2"
                                                data-live-search="true">
                                                @foreach ($country as $row)
                                                    <option value="{{ $row->country_name }}">{{ $row->country_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <!-- -->
                                            <select name="discharge_port_id[]" id="discharge_port_id" form="search_cargo"
                                                class="discharge_port_id ser_inp_fields mb-2" multiple title="Port"
                                                data-size="5" data-selected-text-format="count > 2" data-live-search="true">
                                                @foreach ($port as $row)
                                                    <option value="{{ $row->port_name }}">{{ $row->port_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <!-- -->
                                            <label for="laycan_date_to" class="mt-4 cl_gll">Laycan Date To:</label>
                                            <input type="date" required form="search_cargo" class=" to_date"
                                                id="laycan_date_to" name="laycan_date_to" placeholder="Laycan Date To" />
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn_style ser_hover cl_gd btn_xxs" style="background-color: #ABD6C2">
                                        Search
                                    </button>
                                    <button type="reset" value="reset" class="btn_style ser_hover bg-secondary btn_xxs" onclick="location.href='{{ route('home') }}'" style="background-color: #ABD6C2">
                                        Reset
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="widee text-center">
        <div class="col-12 col-lg-10 verCen pt-4 pb-5">
            <p class="size48 b4 eras  cl_gd">
                Manage loads. Drive profits.
            </p>
            <p class="size17 cl_bl b6">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sagittis augue non ex accumsan lobortis.
                Morbi a
                tortor aliquet, sollicitudin urna nec, fringilla lorem. Aliquam erat volutpat. Ut rutrum risus tellus. Proin
                gravida volutpat accumsan. Praesent ultricies finibus sodales. Mauris sed ex a neque tristique aliquam.
                Morbi
                dolor ipsum, ultricies ut fringilla sed, cursus eget urna.
            </p>
        </div>
    </div>

    <div class="z_ind_1" style="height: 150px; background-color:#B4C8C6 !important;">
    </div>

    <section class="widee">
        <div class="col-12 col-lg-11 verCen">
            <div class="card-deck text-center mb-5 " style="margin-top: -60px">
                <div class="card mr-4 ml-4 mb-5 sh_card rad20">
                    <img class="card-img-top card_mar" src="{{ asset('front_asset/images/1.png') }}" alt="Card image cap">
                    <div class="card-body p-0">
                        <h5 class="eras card-title cl_gd size28 pt-4">Latest Cargos</h5>
                        <p class="card-text size14 b6 bg_gll cl_bl p-3 mb-4">
                            Cargo Name: xyz <br>
                            Cargo Type: xyz <br>
                            Destination: xyz <br>
                            Origin: xyz <br>
                            Destination Port: xyz
                        </p>
                    </div>
                </div>
                <div class="card mr-4 ml-4 mb-5 sh_card rad20">
                    <img class="card-img-top card_mar" src="{{ asset('front_asset/images/2.png') }}" alt="Card image cap">
                    <div class="card-body p-0">
                        <h5 class="eras card-title cl_gd size28 pt-4">Latest Vessels for Charter</h5>
                        <p class="card-text size14 b6 bg_gll cl_bl p-3 mb-4">
                            Cargo Name: xyz <br>
                            Cargo Type: xyz <br>
                            Destination: xyz <br>
                            Origin: xyz <br>
                            Destination Port: xyz
                        </p>
                    </div>
                </div>
                <div class="card mr-4 ml-4 mb-5 sh_card rad20">
                    <img class="card-img-top card_mar" src="{{ asset('front_asset/images/3.png') }}" alt="Card image cap">
                    <div class="card-body p-0">
                        <h5 class="eras card-title cl_gd size28 pt-4">Latest Vessels for Sale</h5>
                        <p class="card-text size14 b6 bg_gll cl_bl p-3 mb-4">
                            Cargo Name: xyz <br>
                            Cargo Type: xyz <br>
                            Destination: xyz <br>
                            Origin: xyz <br>
                            Destination Port: xyz
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>




    
    <section class="bg_gd pt-5 pb-5">
        <div class="widee ">
        <div class="col-12 col-lg-12 verCen">
            <div class="card-deck text-center">
                <div class="card bg_gd m-0 pl-4 pr-4">
                    <img class="card-img-top" src="{{ asset('front_asset/images/4.png') }}" alt="Card image cap">
                    <div class="card-body p-0">
                        <h5 class="eras card-title cl_gl size36 pt-4">Latest Classifieds</h5>
                        <p class="card-text size13 text-white b4 mb-4">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sagittis augue non ex accumsan lobortis.
                            Morbi a tortor aliquet. Praesent ultricies finibus sodales.
                        </p>
                    </div>
                </div>
                <div class="card bg_gd m-0 pl-4 pr-4" style="border-left: 1px solid white !important; border-right: 1px solid white !important;">
                    <img class="card-img-top" src="{{ asset('front_asset/images/5.png') }}" alt="Card image cap">
                    <div class="card-body p-0">
                        <h5 class="eras card-title cl_gl size36 pt-4">Events</h5>
                        <p class="card-text size13 text-white b4 mb-4">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sagittis augue non ex accumsan lobortis.
                            Morbi a tortor aliquet. Praesent ultricies finibus sodales.
                        </p>
                    </div>
                </div>
                <div class="card bg_gd m-0 pl-4 pr-4">
                    <img class="card-img-top" src="{{ asset('front_asset/images/6.png') }}" alt="Card image cap">
                    <div class="card-body p-0">
                        <h5 class="eras card-title cl_gl size36 pt-4">Latest Job Posts</h5>
                        <p class="card-text size13 text-white b4 mb-4">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sagittis augue non ex accumsan lobortis.
                            Morbi a tortor aliquet. Praesent ultricies finibus sodales.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>


    <section class="bg_gd pt-4 pb-4 mt-5 about_bg" >
        <div class="widee ">
            <div class="col-12 col-lg-4 pt-4 pb-5">
                <h2 class="eras size48 b4 cl_gd mb-2">
                    ABOUT US
                </h2>
                <hr class="line_decor col-2 m-0" style="border-top-color: #509787; border-top-width: 4px;">
                <p class="size14 cl_bl b6 pt-3">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sagittis augue non ex accumsan. 
                    Proin sagittis augue non ex accumsan lobortis.
                </p>
                <p class="size14 cl_bl b6">
                    tortor aliquet, sollicitudin urna nec, fringilla lorem. Aliquam erat volutpat. Ut rutrum risus tellus. Proin
                    gravida volutpat accumsan.
                </p>
                <button type="submit" class="btn_style btn_xxs">
                    Read More
                </button>
            </div>
        </div>
    </section>

@endsection
