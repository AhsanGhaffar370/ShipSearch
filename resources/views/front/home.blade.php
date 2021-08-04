@extends('front/layout/layout')

@section('page_title', 'Home Page')


@section('container')

    <style>


        .ser_inp_fields {
            position: unset !important;
            width: 100% !important;
            /* widows: 215px !important; */
        }

        .ser_inp_fields button {
            padding: 3px 5px 3px 5px !important;
            border-radius: 2px;
            font-size: 14px !important;
            font-family: 'Lato', sans-serif;
        }


        .dropdown-menu li a span {
            font-family: 'Lato', sans-serif;
            font-size: 12px !important;
        }

        .ser_inp_fields>div.dropdown-menu.show {
            padding-top: 0px !important;
            padding-bottom: 0px !important;
            width: 100% !important;
            min-width: 100% !important;
            border-radius: 0px 0px 7px 7px !important;
            margin-top: 0px !important;
            box-shadow: none !important;
            /* transform: none !important; */
        }

        .dropdown-item span.text::before {
            border: 1px solid #cacaca;
            content: "";
            padding: 0px 7px 0px 7px;
            border-radius: 3px;
            margin: 0px 5px 0px -18px;
        }

        .bs-searchbox .form-control {
            padding: 1px 4px;
            font-size: 12px;
        }

        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #80bdff;
            outline: 0;
            box-shadow: none !important;
        }

        .ser_inp_fields button:focus {
            box-shadow: none !important;
            outline-offset: -18px !important;
        }












        .paddings {
            padding-top: 90px;
            padding-bottom: 90px;
            padding-left: 40px;
        }

        .blog_bg {
            /* background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                    url("{{ asset('public/front_asset/images/banner-img.jpg') }}"); */
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                url("{{ asset('front_asset/images/banner-img.jpg') }}");
            background-attachment: fixed;
            width: 100%;
            height: auto;
            background-repeat: no-repeat;
            background-size: cover !important;
            padding: 8% 2px;
        }

        .btn_style {
            background-color: #ffffff26 !important;
            color: white;
            font-size: 15px !important;
            margin: 0px 2px 0px 2px;
            border-radius: 0px 0px 5px 5px;
            border: 1px solid white;
            padding: 5px 25px;
        }

        .btn_style:hover {
            background-color: #ffffff78 !important;

        }

    </style>

    <div class="jumbotron jumbotron-fluid bg1 blog_bg border-0">
        <div class="row">
            <div class="col-12 col-lg-5 col-md-6">
                <div class="container paddings text-left">
                    <p class="size54 text-white text-left b6 m-0" style="line-height: 1.3;"><span class="cl_bd b6">MANAGE
                            LOADS<br>
                        </span>DRIVE PROFITS</p>
                    <p class="text-white">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sagittis augue non ex accumsan
                        lobortis. Morbi a
                        tortor aliquet, sollicitudin urna nec, fringilla lorem. Aliquam erat volutpat. Ut rutrum risus
                        tellus. Proin
                        gravida volutpat accumsan. Praesent ultricies finibus sodales.
                    </p>
                </div>
            </div>
            <div class="col-12 col-lg-4 col-md-6 bg-primary">
                <div class="row">
                    <button class="btn btn_style" type="button">CARGO</button>
                    <button class="btn btn_style" type="button">Vessel <br> Charter</button>
                    <button class="btn btn_style" type="button">Sale & <br>Purchase</button>
                    <button class="btn btn_style" type="button">Directory</button>

                    <div>

                        <form id="search_cargo" method="post" action="{{ route('cargo.search_req') }}"
                            class="form-horizontal form-label-left " enctype="multipart/form-data">
                            @csrf
                            <label for="cargo_type_id">Select Cargo:</label>
                            <select name="cargo_type_id[]" id="cargo_type_id" form="search_cargo"
                                class="cargo_type_id ser_inp_fields" multiple title="Any" data-size="5"
                                data-selected-text-format="count > 2" data-live-search="true">
                                @foreach ($cargo_type as $row)
                                    <option value="{{ $row->cargo_type_name }}">{{ $row->cargo_type_name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="row">
                                <div class="col-12 col-lg-6 col-md-6">
                                    <div class="text-white">
                                        <select name="loading_region_id[]" id="loading_region_id" form="search_cargo"
                                            class="loading_region_id ser_inp_fields" multiple title="Region" data-size="5"
                                            data-selected-text-format="count > 2" data-live-search="true">
                                            @foreach ($region as $row)
                                                <option value="{{ $row->region_name }}">{{ $row->region_name }}</option>
                                            @endforeach
                                        </select>
                                        <!-- -->
                                        <select name="loading_country_id[]" id="loading_country_id" form="search_cargo"
                                            class="loading_country_id ser_inp_fields" multiple title="Country" data-size="5"
                                            data-selected-text-format="count > 2" data-live-search="true">
                                            @foreach ($country as $row)
                                                <option value="{{ $row->country_name }}">{{ $row->country_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <!-- -->
                                        <select name="loading_port_id[]" id="loading_port_id" form="search_cargo"
                                            class="loading_port_id ser_inp_fields" multiple title="Port" data-size="5"
                                            data-selected-text-format="count > 2" data-live-search="true">
                                            @foreach ($port as $row)
                                                <option value="{{ $row->port_name }}">{{ $row->port_name }}</option>
                                            @endforeach
                                        </select>
                                        <!-- -->
                                        <label for="laycan_date_from">Laycan Date From:</label>
                                        <input type="date" required form="search_cargo" class=" from_date"
                                            id="laycan_date_from" name="laycan_date_from" placeholder="Laycan Date From" />
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-md-6">
                                    <div class="text-white">
                                        <select name="discharge_region_id[]" id="discharge_region_id" form="search_cargo"
                                            class="discharge_region_id ser_inp_fields" multiple title="Region" data-size="5"
                                            data-selected-text-format="count > 2" data-live-search="true">
                                            @foreach ($region as $row)
                                                <option value="{{ $row->region_name }}">{{ $row->region_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <!-- -->
                                        <select name="discharge_country_id[]" id="discharge_country_id" form="search_cargo"
                                            class="discharge_country_id ser_inp_fields" multiple title="Country"
                                            data-size="5" data-selected-text-format="count > 2" data-live-search="true">
                                            @foreach ($country as $row)
                                                <option value="{{ $row->country_name }}">{{ $row->country_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <!-- -->
                                        <select name="discharge_port_id[]" id="discharge_port_id" form="search_cargo"
                                            class="discharge_port_id ser_inp_fields" multiple title="Port" data-size="5"
                                            data-selected-text-format="count > 2" data-live-search="true">
                                            @foreach ($port as $row)
                                                <option value="{{ $row->port_name }}">{{ $row->port_name }}</option>
                                            @endforeach
                                        </select>
                                        <!-- -->
                                        <label for="laycan_date_to">Laycan Date To:</label>
                                        <input type="date" required form="search_cargo" class=" to_date" id="laycan_date_to"
                                            name="laycan_date_to" placeholder="Laycan Date To" />
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn bg_bl text-white size15 pt-1 pb-1 mr-3">
                                    <i class="fas fa-search"></i> Search
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="m-5">
        <h1>Home Page</h1>
        <p class="text-justify">

            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sagittis augue non ex accumsan lobortis. Morbi a
            tortor aliquet, sollicitudin urna nec, fringilla lorem. Aliquam erat volutpat. Ut rutrum risus tellus. Proin
            gravida volutpat accumsan. Praesent ultricies finibus sodales. Mauris sed ex a neque tristique aliquam. Morbi
            dolor ipsum, ultricies ut fringilla sed, cursus eget urna.

            Donec sagittis id magna vitae laoreet. Proin ut mi eu nisi aliquam lacinia in feugiat lacus. Mauris tempor ut
            arcu at bibendum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eu hendrerit odio. Nunc ultrices
            velit tortor, at ultricies diam tincidunt et. Cras faucibus diam vel ex eleifend, in mollis ex consectetur.
            Mauris eget imperdiet velit, suscipit vehicula ante. In hac habitasse platea dictumst. Ut tempor tellus nibh,
            quis luctus purus molestie vel. Duis euismod mauris ac laoreet eleifend. Curabitur semper orci posuere ante
            aliquet, sit amet semper sem vestibulum. Sed consectetur odio eu leo ultrices, ac elementum lectus pretium. Cras
            sed sollicitudin nibh, quis molestie quam. Pellentesque id massa nec lorem dignissim varius id in turpis.
            Phasellus massa metus, eleifend bibendum fringilla ullamcorper, dictum molestie neque.

            Quisque purus mauris, feugiat quis magna eleifend, rhoncus scelerisque augue. Cras volutpat nisi mauris, ac
            euismod urna consequat sit amet. Mauris vitae faucibus orci. Nullam laoreet placerat elit sed suscipit. Nulla
            nec viverra neque, et tristique orci. Suspendisse ac fringilla metus, et ullamcorper lacus. Quisque ac molestie
            magna. Nullam rhoncus pretium est, consectetur vulputate tellus eleifend nec.
        </p>
        <p class="text-justify">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sagittis augue non ex accumsan lobortis. Morbi a
            tortor aliquet, sollicitudin urna nec, fringilla lorem. Aliquam erat volutpat. Ut rutrum risus tellus. Proin
            gravida volutpat accumsan. Praesent ultricies finibus sodales. Mauris sed ex a neque tristique aliquam. Morbi
            dolor ipsum, ultricies ut fringilla sed, cursus eget urna.

            Donec sagittis id magna vitae laoreet. Proin ut mi eu nisi aliquam lacinia in feugiat lacus. Mauris tempor ut
            arcu at bibendum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eu hendrerit odio. Nunc ultrices
            velit tortor, at ultricies diam tincidunt et. Cras faucibus diam vel ex eleifend, in mollis ex consectetur.
            Mauris eget imperdiet velit, suscipit vehicula ante. In hac habitasse platea dictumst. Ut tempor tellus nibh,
            quis luctus purus molestie vel. Duis euismod mauris ac laoreet eleifend. Curabitur semper orci posuere ante
            aliquet, sit amet semper sem vestibulum. Sed consectetur odio eu leo ultrices, ac elementum lectus pretium. Cras
            sed sollicitudin nibh, quis molestie quam. Pellentesque id massa nec lorem dignissim varius id in turpis.
            Phasellus massa metus, eleifend bibendum fringilla ullamcorper, dictum molestie neque.

            Quisque purus mauris, feugiat quis magna eleifend, rhoncus scelerisque augue. Cras volutpat nisi mauris, ac
            euismod urna consequat sit amet. Mauris vitae faucibus orci. Nullam laoreet placerat elit sed suscipit. Nulla
            nec viverra neque, et tristique orci. Suspendisse ac fringilla metus, et ullamcorper lacus. Quisque ac molestie
            magna. Nullam rhoncus pretium est, consectetur vulputate tellus eleifend nec.
        </p>
    </div>

@endsection
