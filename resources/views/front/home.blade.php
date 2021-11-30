@extends('front/layout/layout')

@section('page_title', 'Home Page')


@section('container')

    <style>
    
    








    .ser_inp_fields21 {
    position: unset !important;
    width: 100% !important;
    display: none;
    /* widows: 215px !important; */
}



    .ser_inp_fields21 button {
    padding: 2px 5px 2px 5px;
    border-radius: 2px;
    font-size: 11px !important;
    font-family: 'Lato', sans-serif;
}



    .ser_inp_fields21>div.dropdown-menu.show {
    padding-top: 0px !important;
    padding-bottom: 0px !important;
    width: 230px !important;
    min-width: 100px !important;
    border-radius: 0px 0px 7px 7px !important;
    margin-top: 0px !important;
    box-shadow: 0px 3px 7px #cccccc;
}


    .ser_inp_fields21 .inner {
            overflow-x: clip !important;
        }
        .ser_inp_fields21 button {
            padding: 7px 5px !important;
            border-radius: 2px;
            font-size: 11px !important;
            font-family: 'Lato', sans-serif;
        }


        .dropdown-menu li a span {
            font-family: 'Lato', sans-serif;
            font-size: 12px !important;
        }

        .ser_inp_fields21>div.dropdown-menu.show {
            /* transform: translate3d(0px, 29px, 0px) !important; */
            padding-top: 0px !important;
            padding-bottom: 0px !important;
            width: 100% !important;
            min-width: auto !important;
            border-radius: 0px 0px 7px 7px !important;
            margin-top: 0px !important;
            box-shadow: none !important;
        }



        .ser_inp_fields21 button:focus {
    box-shadow: none !important;
    /* outline: none !important; */
    outline-offset: -18px !important;
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

        .about_bg{
            background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)),
                url("{{ asset('front_asset/images/AboutUs-Image.jpg') }}");
            width: 100%;
            height: auto;
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
        #laycan_date_from ,
        #date_available ,
        #operations_date {
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
            /* padding-right: 10px; */
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
            font-size: 13px;
            letter-spacing: 1.5px;
            font-weight: 400 !important;
            background-color: #276F6C;
            /* display: block; */
            color: #fff;
            text-align: center;
            text-decoration: none;
            padding: 6px 0px;
            border: 1px solid #4d998d;
        }
        .top_links:hover{
            color: white;
            background-color: #226b68;
        }
        #home_cargo_link{
            /* background-color:#abd6c2 ; */
            background-color: #06423f
        }

        .btn_bg{
            background-color: #ABD6C2;
        }

        /* a:after {
            content: url("{{ asset('front_asset/images/wdot.png') }}");
            display: block;
            transition: 0.8s ease-in-out;
        }

        a:hover:after {
            content: url("{{ asset('front_asset/images/dot.PNG') }}");
            display: block;
            transform: scale(1.02, 1.03);
        } */

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
                            <a href="#" id="home_cargo_link" class="top_links centre home_form_link ">Cargo</a>
                            <a href="#" id="home_vessel_link" class="top_links centre home_form_link ">Vessel <br> Charter</a>
                            <a href="#" id="home_vsale_link" class="top_links centre home_form_link ">Sale & <br>Purchase</a>
                            <a href="#" id="home_directory_link" class="top_links centre home_form_link ">Directory</a>
                        </div>
                        <div class="p-4">

                            <div id="home_cargo"  >
                                {{-- Cargo Form --}}
                                <form id="search_cargo_form" method="post" action="{{ route('cargo.search_req') }}"
                                    class="form-horizontal form-label-left home_cargo" enctype="multipart/form-data">
                                    @csrf
                                

                                    <div class="pos_rel mb-3">
                                        <label for="cargo_type_id" class="size13 cl_gll">Select Cargo:</label>
                                        <section class="cargo_type_id_par">
                                            <select name="cargo_type_id[]" id="cargo_type_id" form="search_cargo_form"
                                                class="cargo_type_id ser_inp_fields21  mb-2" multiple title="Choose" data-size="5"
                                                data-selected-text-format="count > 2" data-live-search="true">
                                                {{-- <option value="13">Any</option>
                                                @foreach ($cargo_type as $row)
                                                    <option value="{{ $row->cargo_type_id }}">{{ $row->cargo_type_name }}
                                                    </option>
                                                @endforeach --}}
                                            </select>
                                        </section>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-12 col-lg-6 col-md-6 p-0">
                                            <div class="text-white sec_left">
                                                
                                                {{-- <label class="top_labels">Origin</label> --}}
                                                <p class="size13">Origin:</p>
                                                <div>
                                                    <label class="size13 cl_gll">Select Region:</label>
                                                    <section class="loading_region_id_par">
                                                        <select name="loading_region_id[]" id="loading_region_id" form="search_cargo_form"
                                                            class="loading_region_id add_cvs_inp_fields ser_inp_fields21  mb-2 all_region_id" multiple title="Choose"
                                                            data-size="5" data-selected-text-format="count > 2" data-live-search="true">
                                                            {{-- <option value="26">Any</option>
                                                            @foreach ($region as $row)
                                                                <option value="{{ $row->region_id }}">{{ $row->region_name }}
                                                                </option>
                                                            @endforeach --}}
                                                        </select>
                                                    </section>
                                                </div>
                                                <!-- -->
                                                
                                                <div>
                                                    <label class="size13 cl_gll">Select Country:</label>
                                                    <section class="loading_country_id_par">
                                                        <select name="loading_country_id[]" id="loading_country_id" form="search_cargo_form"
                                                            class="loading_country_id add_cvs_inp_fields ser_inp_fields21  mb-2 all_country_id" multiple title="Choose"
                                                            data-size="5" data-selected-text-format="count > 2" data-live-search="true">
                                                            {{-- <option value="197">Any</option>
                                                            @foreach ($country as $row)
                                                                <option value="{{ $row->country_id }}">{{ $row->country_name }}
                                                                </option>
                                                            @endforeach --}}
                                                        </select>
                                                    </section>
                                                </div>
                                                <!-- -->
                                                
                                                <div>
                                                    <label class="size13 cl_gll">Select Port:</label>
                                                    <section class="loading_port_id_par">
                                                        <select name="loading_port_id[]" id="loading_port_id" form="search_cargo_form"
                                                            class="loading_port_id add_cvs_inp_fields ser_inp_fields21  mb-2 all_port_id" multiple title="Choose"
                                                            data-size="5" data-selected-text-format="count > 2" data-live-search="true">
                                                            {{-- <option value="5638">Any</option>
                                                            @foreach ($port as $row)
                                                                <option value="{{ $row->port_id }}">{{ $row->port_name }}
                                                                </option>
                                                            @endforeach --}}
                                                        </select>
                                                    </section>
                                                </div>
                                                <!-- -->
                                                <label for="laycan_date_from" class="size13 mt-4 cl_gll">Laycan Date From:</label>
                                                <input type="date" required form="search_cargo_form" class=" from_date"
                                                    id="laycan_date_from" name="laycan_date_from"
                                                    placeholder="Laycan Date From" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 col-md-6 p-0">
                                            <div class="text-white sec_right">

                                                {{-- <label class="top_labels">Destination</label> --}}
                                                <p class="size13">Destination:</p>
                                                <div>
                                                    <label class="size13 cl_gll">Select Region:</label>
                                                    <section class="discharge_region_id_par">
                                                        <select name="discharge_region_id[]" id="discharge_region_id"
                                                            form="search_cargo_form" class="discharge_region_id add_cvs_inp_fields ser_inp_fields21  mb-2 all_region_id" multiple
                                                            title="Choose" data-size="5" data-selected-text-format="count > 2"
                                                            data-live-search="true">
                                                            {{-- <option value="26">Any</option>
                                                            @foreach ($region as $row)
                                                                <option value="{{ $row->region_id }}">{{ $row->region_name }}
                                                                </option>
                                                            @endforeach --}}
                                                        </select>
                                                    </section>
                                                </div>
                                                
                                                <!-- -->
                                                <div>
                                                    <label class="size13 cl_gll">Select Country:</label>
                                                    <section class="discharge_country_id_par">
                                                        <select name="discharge_country_id[]" id="discharge_country_id"
                                                            form="search_cargo_form" class="discharge_country_id add_cvs_inp_fields ser_inp_fields21  mb-2 all_country_id"
                                                            multiple title="Choose" data-size="5" data-selected-text-format="count > 2"
                                                            data-live-search="true">
                                                            {{-- <option value="197">Any</option>
                                                            @foreach ($country as $row)
                                                                <option value="{{ $row->country_id }}">{{ $row->country_name }}
                                                                </option>
                                                            @endforeach --}}
                                                        </select>
                                                    </section>
                                                </div>
                                                <!-- -->
                                                <div>
                                                    <label class="size13 cl_gll">Select Port:</label>
                                                    <section class="discharge_port_id_par">
                                                        <select name="discharge_port_id[]" id="discharge_port_id" form="search_cargo_form all_port_id"
                                                            class="discharge_port_id add_cvs_inp_fields ser_inp_fields21  mb-2" multiple title="Choose"
                                                            data-size="5" data-selected-text-format="count > 2" data-live-search="true">
                                                            {{-- <option value="5638">Any</option>
                                                            @foreach ($port as $row)
                                                                <option value="{{ $row->port_id }}">{{ $row->port_name }}
                                                                </option>
                                                            @endforeach --}}
                                                        </select>
                                                    </section>
                                                </div>
                                                <!-- -->
                                                <label for="laycan_date_to" class="size13 mt-4 cl_gll">Laycan Date To:</label>
                                                <input type="date" required form="search_cargo_form" class=" to_date"
                                                    id="laycan_date_to" name="laycan_date_to" placeholder="Laycan Date To" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center mt-4">
                                        <button type="submit" class="size13 btn_style ser_hover btn_bg cl_gdd b6 btn_xxs check_login_search" >
                                            Search
                                        </button>
                                        <button type="button" value="reset" class="size13 btn_style b6 ser_hover cl_gdd btn_bg reset_btn btn_xxs">
                                            Reset
                                        </button>
                                    </div>
                                </form>
                            </div>{{-- End Cargo Form --}}

                            {{-- Vessel Charter Form --}}
                            <div id="home_vessel" style="display: none;">
                                <form id="search_vessel_form" method="post" action="{{ route('vessel.search_req') }}"
                                    class="form-horizontal form-label-left " enctype="multipart/form-data">
                                    @csrf

                                    <div class="row m-0">
                                        <div class="col-12 col-lg-6 col-md-6 p-0">
                                            <div class="text-white sec_left">
                                                <!-- -->
                                                <label for="vessel_type_id" class="size13 cl_gll">Select Vessel:</label>
                                                <section class="vessel_type_id_par">
                                                    <select name="vessel_type_id[]" id="vessel_type_id" form="search_vessel_form"
                                                        class="vessel_type_id ser_inp_fields21  mb-2" multiple title="Choose" data-size="5"
                                                        data-selected-text-format="count > 2" data-live-search="true">
                                                        {{-- <option value="11">Any</option>
                                                        @foreach ($vessel_type as $row)
                                                            <option value="{{ $row->vessel_type_id }}">{{ $row->vessel_type_name }}
                                                            </option>
                                                        @endforeach --}}
                                                    </select>
                                                </section>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 col-md-6 p-0">
                                            <div class="text-white sec_right">
                                                <!-- -->
                                                <label for="charter_type_id" class="size13 cl_gll">Select Charter:</label>
                                                <section class="charter_type_id_par">
                                                    <select name="charter_type_id[]" id="charter_type_id" form="search_vessel_form"
                                                        class="charter_type_id ser_inp_fields21  mb-2" multiple title="Choose" data-size="5"
                                                        data-selected-text-format="count > 2" data-live-search="true">
                                                        {{-- <option value="5">Any</option>
                                                        @foreach ($charter_type as $row)
                                                            <option value="{{ $row->charter_type_id }}">{{ $row->charter_type_name }}
                                                            </option>
                                                        @endforeach --}}
                                                    </select>
                                                </section>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pos_rel mb-3 mt-4">
                                        <div>
                                            <label class="size13 cl_gll">Select Region:</label>
                                            <section class="region_id_par">
                                                <select name="region_id[]" id="region_id"
                                                    form="search_vessel_form" class="region_id add_cvs_inp_fields ser_inp_fields21  mb-2" multiple
                                                    title="Choose" data-size="5" data-selected-text-format="count > 2"
                                                    data-live-search="true">
                                                    {{-- <option value="26">Any</option>
                                                    @foreach ($region as $row)
                                                        <option value="{{ $row->region_id }}">{{ $row->region_name }}
                                                        </option>
                                                    @endforeach --}}
                                                </select>
                                            </section>
                                        </div>
                                        
                                        <!-- -->
                                        <div>
                                            <label class="size13 cl_gll">Select Country:</label>
                                            <section class="country_id_par">
                                                <select name="country_id[]" id="country_id"
                                                    form="search_vessel_form" class="country_id add_cvs_inp_fields ser_inp_fields21  mb-2"
                                                    multiple title="Choose" data-size="5" data-selected-text-format="count > 2"
                                                    data-live-search="true">
                                                    {{-- <option value="197">Any</option>
                                                    @foreach ($country as $row)
                                                        <option value="{{ $row->country_id }}">{{ $row->country_name }}
                                                        </option>
                                                    @endforeach --}}
                                                </select>
                                            </section>
                                        </div>
                                        <!-- -->
                                        <div>
                                            <label class="size13 cl_gll">Select Port:</label>
                                            <section class="port_id_par">
                                                <select name="port_id[]" id="port_id" form="search_vessel_form"
                                                    class="port_id add_cvs_inp_fields ser_inp_fields21  mb-2" multiple title="Choose"
                                                    data-size="5" data-selected-text-format="count > 2" data-live-search="true">
                                                    {{-- <option value="5638">Any</option>
                                                    @foreach ($port as $row)
                                                        <option value="{{ $row->port_id }}">{{ $row->port_name }}
                                                        </option>
                                                    @endforeach --}}
                                                </select>
                                            </section>
                                        </div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-12 col-lg-6 col-md-6 p-0">
                                            <div class="text-white sec_left">
                                                <!-- -->
                                                <label for="laycan_date_from" class="size13 mt-4 cl_gll">Laycan Date From:</label>
                                                <input type="date" required form="search_vessel_form" class=" from_date"
                                                    id="laycan_date_from" name="laycan_date_from"
                                                    placeholder="Laycan Date From" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 col-md-6 p-0">
                                            <div class="text-white sec_right">
                                                <!-- -->
                                                <label for="laycan_date_to" class="size13 mt-4 cl_gll">Laycan Date To:</label>
                                                <input type="date" required form="search_vessel_form" class=" to_date"
                                                    id="laycan_date_to" name="laycan_date_to" placeholder="Laycan Date To" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center mt-4">
                                        <button type="submit" class="size13 btn_style ser_hover btn_bg cl_gdd b6 btn_xxs check_login" >
                                            Search
                                        </button>
                                        <button type="button" value="reset" class="size13 btn_style b6 ser_hover cl_gdd btn_bg reset_btn btn_xxs">
                                            Reset
                                        </button>
                                    </div>
                                </form>
                            </div>{{-- End Vessel Charter --}}
                            
                            {{-- Vessel sale Form --}}
                            <div id="home_vsale" style="display: none;">
                                <form id="search_vsale_form" method="post" action="{{ route('vessel_sale.search_req') }}"
                                    class="form-horizontal form-label-left " enctype="multipart/form-data">
                                    @csrf

                                    <div class="pos_rel mb-3">
                                        <div>
                                            <label for="vessel_type_id" class="size13 cl_gll">Select Vessel:</label>
                                            <section class="vessel_type_id_par">
                                                <select name="vessel_type_id[]" id="vessel_type_id" form="search_vsale_form"
                                                    class="vessel_type_id ser_inp_fields21  mb-2" multiple title="Choose" data-size="5"
                                                    data-selected-text-format="count > 2" data-live-search="true">
                                                    {{-- <option value="11">Any</option>
                                                    @foreach ($vessel_type as $row)
                                                        <option value="{{ $row->vessel_type_id }}">{{ $row->vessel_type_name }}
                                                        </option>
                                                    @endforeach --}}
                                                </select>
                                            </section>
                                        </div>
                                        
                                        <div>
                                            <label class="size13 cl_gll mt-4">Select Region:</label>
                                            <section class="region_id_par">
                                                <select name="region_id[]" id="region_id" form="search_vsale_form"
                                                    class="region_id add_cvs_inp_fields ser_inp_fields21  mb-2" multiple
                                                    title="Choose" data-size="5" data-selected-text-format="count > 2"
                                                    data-live-search="true" >
                                                    {{-- <option value="26">Any</option>
                                                    @foreach ($region as $row)
                                                        <option value="{{ $row->region_id }}">{{ $row->region_name }}
                                                        </option>
                                                    @endforeach --}}
                                                </select>
                                            </section>
                                        </div>
                                        <!-- -->
                                        <div>
                                            <label class="size13 cl_gll">Select Country:</label>
                                            <section class="country_id_par">
                                                <select name="country_id[]" id="country_id" form="search_vsale_form"
                                                    class="country_id add_cvs_inp_fields ser_inp_fields21  mb-2" multiple
                                                    title="Choose" data-size="5" data-selected-text-format="count > 2"
                                                    data-live-search="true">
                                                    {{-- <option value="197">Any</option>
                                                    @foreach ($country as $row)
                                                        <option value="{{ $row->country_id }}">{{ $row->country_name }}
                                                        </option>
                                                    @endforeach --}}
                                                </select>
                                            </section>
                                        </div>
                                        <!-- -->
                                        <div>
                                            <label class="size13 cl_gll">Select Port:</label>
                                            <section class="port_id_par">
                                                <select name="port_id[]" id="port_id" form="search_vsale_form"
                                                    class="port_id add_cvs_inp_fields ser_inp_fields21  mb-2" multiple 
                                                    title="Choose" data-size="5" data-selected-text-format="count > 2" 
                                                    data-live-search="true">
                                                    {{-- <option value="5638">Any</option>
                                                    @foreach ($port as $row)
                                                        <option value="{{ $row->port_id }}">{{ $row->port_name }}
                                                        </option>
                                                    @endforeach --}}
                                                </select>
                                            </section>
                                        </div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-12 col-lg-6 col-md-6 p-0">
                                            <div class="text-white sec_left">
                                                <!-- -->
                                                <label for="date_available" class="size13 mt-4 cl_gll">Date Available:</label>
                                                <input type="date" required form="search_vsale_form" class=" date_available"
                                                    id="date_available" name="date_available"
                                                    placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 col-md-6 p-0">
                                            <div class="text-white sec_right">
                                                <!-- -->
                                                <label for="operations_date" class="size13 mt-4 cl_gll">Last Operations Date:</label>
                                                <input type="date" required form="search_vsale_form" class=" to_date"
                                                    id="operations_date" name="operations_date" placeholder="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center mt-4">
                                        <button type="submit" class="size13 btn_style ser_hover btn_bg cl_gdd b6 btn_xxs check_login" >
                                            Search
                                        </button>
                                        <button type="button" value="reset" class="size13 btn_style b6 ser_hover cl_gdd btn_bg reset_btn btn_xxs">
                                            Reset
                                        </button>
                                    </div>
                                </form>
                            </div>{{-- End Vessel Sale --}}
                            

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
            <p class="size15 cl_bl b6">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sagittis augue non ex accumsan lobortis.
                Morbi a
                tortor aliquet, sollicitudin urna nec, fringilla lorem. Aliquam erat volutpat. Ut rutrum risus tellus. Proin
                gravida volutpat accumsan. Praesent ultricies finibus sodales. Mauris sed ex a neque tristique aliquam.
                Morbi
                dolor ipsum, ultricies ut fringilla sed, cursus eget urna.
            </p>
        </div>
    </div>
    
    {{-- <div class="z_ind_1" style="height: 150px; background-color:#B4C8C6 !important;">
    </div> --}}

    <section class="widee">
        <div class="col-12 col-lg-11 verCen">
            <div class="card-deck text-center mb-5 ">
                <div class="card mr-4 ml-4 mb-5 sh_card rad20">
                    <img class="card-img-top card_mar" src="{{ asset('front_asset/images/1.png') }}" alt="Card image cap">
                    <div class="card-body pl-1 pr-1 pb-5 pt-2">
                        <h5 class="eras card-title text-center cl_gd size28 pt-4">Latest Cargos</h5>

                        <div id="carouselExampleControls1" class="carousel slide pl-0 pr-0 pb-2 pt-2" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <p class="card-text size14 cl_bl">
                                        <b>Cargo Name:</b> xyz1 <br>
                                        <b>Cargo Type:</b> xyz1 <br>
                                        <b>Destination:</b> xyz1 <br>
                                        <b>Origin:</b> xyz1 <br>
                                        <b>Destination Port:</b> xyz1
                                    </p>
                                </div>
                                <div class="carousel-item">
                                    <p class="card-text size14 cl_bl">
                                        <b>Cargo Name:</b> xyz2 <br>
                                        <b>Cargo Type:</b> xyz2 <br>
                                        <b>Destination:</b> xyz2 <br>
                                        <b>Origin:</b> xyz2 <br>
                                        <b>Destination Port:</b> xyz2
                                    </p>
                                </div>
                            </div>

                            <a class="carousel-control-prev bg_w" href="#carouselExampleControls1" role="button" data-slide="prev">
                                <span class="" aria-hidden="true"><i class="fas fa-chevron-left fa-2x cl_gdd"></i></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next bg_w" href="#carouselExampleControls1" role="button" data-slide="next">
                                <span class="" aria-hidden="true"><i class="fas fa-chevron-right fa-2x cl_gdd"></i></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        
                    </div>
                </div>
                <div class="card mr-4 ml-4 mb-5 sh_card rad20">
                    <img class="card-img-top card_mar" src="{{ asset('front_asset/images/2.png') }}" alt="Card image cap">
                    <div class="card-body pl-1 pr-1 pb-5 pt-2">
                        <h5 class="eras card-title text-center cl_gd size28 pt-4">Latest Vessels for Charter</h5>

                        <div id="carouselExampleControls2" class="carousel slide pl-0 pr-0 pb-2 pt-2" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <p class="card-text size14 cl_bl">
                                        <b>Cargo Name:</b> xyz1 <br>
                                        <b>Cargo Type:</b> xyz1 <br>
                                        <b>Destination:</b> xyz1 <br>
                                        <b>Origin:</b> xyz1 <br>
                                        <b>Destination Port:</b> xyz1
                                    </p>
                                </div>
                                <div class="carousel-item">
                                    <p class="card-text size14 cl_bl">
                                        <b>Cargo Name:</b> xyz2 <br>
                                        <b>Cargo Type:</b> xyz2 <br>
                                        <b>Destination:</b> xyz2 <br>
                                        <b>Origin:</b> xyz2 <br>
                                        <b>Destination Port:</b> xyz2
                                    </p>
                                </div>
                            </div>

                            <a class="carousel-control-prev bg_w" href="#carouselExampleControls2" role="button" data-slide="prev">
                                <span class="" aria-hidden="true"><i class="fas fa-chevron-left fa-2x cl_gdd"></i></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next bg_w" href="#carouselExampleControls2" role="button" data-slide="next">
                                <span class="" aria-hidden="true"><i class="fas fa-chevron-right fa-2x cl_gdd"></i></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card mr-4 ml-4 mb-5 sh_card rad20">
                    <img class="card-img-top card_mar" src="{{ asset('front_asset/images/3.png') }}" alt="Card image cap">
                    <div class="card-body pl-1 pr-1 pb-5 pt-2">
                        <h5 class="eras card-title text-center cl_gd size28 pt-4">Latest Vessels for Sale</h5>

                        <div id="carouselExampleControls3" class="carousel slide pl-0 pr-0 pb-2 pt-2" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <p class="card-text size14 cl_bl">
                                        <b>Cargo Name:</b> xyz1 <br>
                                        <b>Cargo Type:</b> xyz1 <br>
                                        <b>Destination:</b> xyz1 <br>
                                        <b>Origin:</b> xyz1 <br>
                                        <b>Destination Port:</b> xyz1
                                    </p>
                                </div>
                                <div class="carousel-item">
                                    <p class="card-text size14 cl_bl">
                                        <b>Cargo Name:</b> xyz2 <br>
                                        <b>Cargo Type:</b> xyz2 <br>
                                        <b>Destination:</b> xyz2 <br>
                                        <b>Origin:</b> xyz2 <br>
                                        <b>Destination Port:</b> xyz2
                                    </p>
                                </div>
                            </div>

                            <a class="carousel-control-prev bg_w" href="#carouselExampleControls3" role="button" data-slide="prev">
                                <span class="" aria-hidden="true"><i class="fas fa-chevron-left fa-2x cl_gdd"></i></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next bg_w" href="#carouselExampleControls3" role="button" data-slide="next">
                                <span class="" aria-hidden="true"><i class="fas fa-chevron-right fa-2x cl_gdd"></i></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
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
                <p class="size13 cl_bl b6 pt-3">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sagittis augue non ex accumsan. 
                    Proin sagittis augue non ex accumsan lobortis.
                </p>
                <p class="size13 cl_bl b6">
                    tortor aliquet, sollicitudin urna nec, fringilla lorem. Aliquam erat volutpat. Ut rutrum risus tellus. Proin
                    gravida volutpat accumsan.
                </p>
                <button type="button" class="btn_style size13 btn_xxs">
                    Read More
                </button>
            </div>
        </div>
    </section>


@endsection
