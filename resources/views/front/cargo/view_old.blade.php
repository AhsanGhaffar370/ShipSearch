@extends('front/layout/layout')

@section('page_title', 'Cargo')


@section('container')

    <style>
        table {
            background-color: white !important;
            border-collapse: collapse;
            width: 100%;
            padding: 0px;
        }

        .table th {
            font-size: 12px;
            padding: 0px 0px 0px 5px !important;
            margin: 0px;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
            font-weight: 600;
            background-color: #EDEDED;
        }

        .table td {
            overflow: hidden;
            text-overflow: ellipsis;
            font-size: 12px;
            padding: 0px 20px 0px 5px !important;
            margin: 0px;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
            font-weight: 600;
        }

        .ser_hist_req {
            cursor: pointer;
        }

        .my-custom-scrollbar {
            position: relative;
            height: 300px;
            overflow: auto;
        }

        .table-wrapper-scroll-y {
            display: block;
        }

        .tableFixHead {
            overflow: auto;
        }

        .tableFixHead thead th {
            position: sticky;
            top: -1px;
            z-index: 1;
        }






        .bg-color {
            background-color: #D9D9D9;
        }

        .btn_style {
            color: white;
            text-transform: uppercase;
            font-family: 'Lato', sans-serif;
            font-size: .75em;
            padding: 2px 20px;
        }

        .btn_style:hover {
            color: #FFFFFF;
        }

        .bg_gr {
            background-color: #88CC21;
        }

        .bg_gr:hover {
            background-color: #a0df42;
        }

        .bg_bl {
            background-color: #28BBEE;
        }

        .bg_bl:hover {
            background-color: #22d0ff;
        }

        .bg_grey {
            background-color: #C4C4C4;
        }

        .bg_grey:hover {
            background-color: #DEDEDE;
        }


        .ser_inp_fields {
            width: 215px !important;
        }
        #adv_ser21 td{

            padding: 0px !important;
        }

        /* dropdown styling */
        .ser_inp_fields button{
            padding: 1px 5px 1px 5px;
            border-radius: 2px;
            font-size: 13px;
            font-family: 'Lato', sans-serif;
        }
        #cargo_table22 td > div {
            padding: 10px 5px 10px 0px !important;
        }
        #cargo_table22 td > input {
            margin: 10px 0px 10px 0px !important;
        }
        .dropdown-menu li a span{
            font-family: 'Lato', sans-serif;
            font-size: 12px !important;
        }
        .bootstrap-select.show-tick .dropdown-menu .selected span.check-mark {
            position: inherit;
            display: inline-block;
            margin-left: -15px;
            padding: 0px 5.5px 3px 4px;
            border-radius: 3px;
            margin-bottom: -2px;
            margin-right: 2px;
            font-size: 8px !important;
        }
        .dropdown-item{
            padding: 0px 0px 0px 22px !important;
        }

        .ser_inp_fields > div{
            padding-top: 0px !important;
            width: 210.6px !important;
            min-width: 201px !important;
            border-radius: 0px !important;
            margin-top: 0px !important;
        }
        .ser_inp_fields .inner{
            overflow-x: clip !important;
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
            box-shadow: none;
        }
        .btn-light.focus, .btn-light:focus {
            box-shadow: none !important;
        }
        .bootstrap-select .dropdown-toggle:focus {
            outline: none !important;
        }
        /* dropdown styling  ends*/

    </style>

    <div class="container-fluid bg-color pt-5 pb-5">


        @if (session('front_uid') != '')
            <div class="bg-white">
                <div class="pt-2 pb-2 pl-3">
                    <a id="adv_ser11" class="btn btn_style bg_gr" href={{ route('cargo.view') }}><i
                            class="fas fa-search"></i> New Load Search</a>
                    <a href={{ route('cargo.add') }} id="{{ session('front_uname') }}"
                        class="btn btn_style bg_bl ml-3 add_cargo_btn"><i class="fas fa-plus"></i> Add New</a>
                </div>
            


                <div class="border table-wrapper-scroll-y my-custom-scrollbar" style="height: 250px;">
                    <table id="cargo_table22"
                        class="table tableFixHead table-condensed table-hover table-responsive-md m-0 " >
                        <thead class="" style="background-color: #EDEDED; position: relative; z-index: 999">
                            <tr>
                                <th width="5%">#</th>
                                <th width="10%">Cargo Type</th>
                                <th width="10%">Laycan Date From</th>
                                <th width="10%">Laycan Date To</th>
                                <th width="10%">Loading Region</th>
                                <th width="10%">Discharge Region</th>
                                <th width="10%">Loading Country</th>
                                <th width="10%">Discharge Country</th>
                                <th width="10%">Loading Port</th>
                                <th width="10%">Discharge Port</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr id='adv_ser21' style="display: none; background-color: #555555; height: 175px">
                                <form id="search_cargo" method="post" action="{{ route('cargo.search_req') }}"
                                    class="form-horizontal form-label-left " enctype="multipart/form-data">
                                    @csrf
                                    <td></td>
                                    <td class="">
                                        <select name="cargo_type_id[]" id="cargo_type_id" class="ser_inp_fields" multiple
                                            title="Choose" data-size="4" data-selected-text-format="count > 2" 
                                            data-live-search="true"
                                            {{-- data-max-options="5" --}} 
                                            {{-- data-actions-box="true" --}}>
                                            @foreach ($cargo_type as $row)
                                                <option value="{{ $row->cargo_type_name }}">{{ $row->cargo_type_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <!-- -->
                                    <td class="">
                                        <input type="date" required class=" from_date" id="laycan_date_from"
                                            name="laycan_date_from" placeholder="Laycan Date From" />
                                    </td>
                                    <!-- -->
                                    <td class="">
                                        <input type="date" required class=" to_date" id="laycan_date_to"
                                            name="laycan_date_to" placeholder="Laycan Date To" />
                                    </td>
                                    <!-- -->
                                    <td class="">
                                        <select name="loading_region_id[]" id="loading_region_id" class="ser_inp_fields" multiple
                                            title="Choose" data-size="4" data-selected-text-format="count > 2" 
                                            data-live-search="true"
                                            >
                                            @foreach ($region as $row)
                                                <option value="{{ $row->region_name }}">{{ $row->region_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <!-- -->
                                    <td class=" ">
                                        <select name="loading_country_id[]" id="loading_country_id" class="ser_inp_fields" multiple
                                            title="Choose" data-size="4" data-selected-text-format="count > 2"
                                            data-live-search="true">
                                            @foreach ($country as $row)
                                                <option value="{{ $row->country_name }}">{{ $row->country_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <!-- -->
                                    <td class=" ">
                                        <select name="loading_port_id[]" id="loading_port_id" class="ser_inp_fields" multiple
                                            title="Choose" data-size="4" data-selected-text-format="count > 2"
                                            data-live-search="true">
                                            @foreach ($port as $row)
                                                <option value="{{ $row->port_name }}">{{ $row->port_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <!-- -->
                                    <td class=" ">
                                        <select name="discharge_region_id[]" id="discharge_region_id" class="ser_inp_fields" multiple
                                            title="Choose" data-size="4" data-selected-text-format="count > 2"
                                            data-live-search="true">
                                            @foreach ($region as $row)
                                                <option value="{{ $row->region_name }}">{{ $row->region_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <!-- -->
                                    <td class=" ">
                                        <select name="discharge_country_id[]" id="discharge_country_id" class="ser_inp_fields"
                                            multiple title="Choose" data-size="4" data-selected-text-format="count > 2"
                                            data-live-search="true">
                                            @foreach ($country as $row)
                                                <option value="{{ $row->country_name }}">{{ $row->country_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <!-- -->
                                    <td class="">
                                        <select name="discharge_port_id[]" id="discharge_port_id" class="ser_inp_fields" multiple
                                            title="Choose" data-size="4" data-selected-text-format="count > 2"
                                            data-live-search="true">
                                            @foreach ($port as $row)
                                                <option value="{{ $row->port_name }}">{{ $row->port_name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="col-12 col-12 text-right">
                                            <div class="">
                                                <button type="submit" class="btn bg_bl text-white pt-1 pb-1 mr-3" style="font-size: 15px;"><i
                                                    class="fas fa-search"></i> Search</button>
                                                    <a href="#" id="close_ser" class="btn bg_grey text-dark pt-1 pb-1" style="font-size: 15px;"><i class="fas fa-times"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                    <!-- -->
                                </form>
                            </tr>


                            @foreach ($ser_data as $row)
                                <tr id="rec-{{ $row->id }}" class="ser_hist_req ">
                                    <td id="id-{{ $row->id }}">{{ $row->id }}</td>
                                    <td id="cargotype-{{ $row->id }}">{{ $row->cargo_type_id }}</td>
                                    <td id="laycan_from-{{ $row->id }}">
                                        {{ date('d-M-Y', strtotime($row->laycan_date_from)) }}</td>
                                    <td id="laycan_to-{{ $row->id }}">
                                        {{ date('d-M-Y', strtotime($row->laycan_date_to)) }}</td>
                                    <td class="{{ $row->loading_region_id }}" id="lregion-{{ $row->id }}">
                                        {{ $row->loading_region_id }}</td>
                                    <td class="{{ $row->loading_country_id }}" id="lcountry-{{ $row->id }}">
                                        {{ $row->loading_country_id }}</td>
                                    <td class="{{ $row->loading_port_id }}" id="lport-{{ $row->id }}">
                                        {{ $row->loading_port_id }}</td>
                                    <td class="{{ $row->discharge_region_id }}" id="dregion-{{ $row->id }}">
                                        {{ $row->discharge_region_id }}</td>
                                    <td class="{{ $row->discharge_country_id }}" id="dcountry-{{ $row->id }}">
                                        {{ $row->discharge_country_id }}</td>
                                    <td class="{{ $row->discharge_port_id }}" id="dport-{{ $row->id }}">
                                        {{ $row->discharge_port_id }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        <div class="bg-white mt-2">
            <p>{{sizeof($data)}} TOTAL RESULTS</p>
            <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <div class="border">
                    <table id="cargo_table21"
                        class="table tableFixHead table-condensed table-hover table-responsive-md m-0 ">
                        <thead class="" style="background-color: #EAEAEA;">
                            <tr>
                                <th width="5%">ID</th>
                                <th width="10%">Cargo Name</th>
                                <th width="10%">Cargo Type</th>
                                <th width="12%">Loading Region</th>
                                <th width="12%">Discharge Region</th>
                                <th width="8%">Laycan Date From</th>
                                <th width="8%">Laycan Date To</th>
                                <th width="5%">Quantity</th>
                                {{-- <th width="8%">Unit</th> --}}
                                <th width="8%">Loading Discharge Rates</th>
                                <th width="8%">Posted on</th>

                                @if (session('front_uid') != '')
                                    <th width="2%">Details</th>
                                @endif
                            </tr>
                        </thead>

                        <tbody id="all_cargo">
                            @if (sizeof($data) < 1)
                                <tr class="">
                                    <td colspan="3"><i>No Record Found</i></td>
                                </tr>
                            @else
                                @foreach ($data as $row)
                                    <tr class="">
                                        <td>{{ $row->ref_no }}</td>
                                        <td>{{ $row->cargo_name }}</td>
                                        <td><?PHP echo str_replace(',',',<br>',$row->cargo_type_id); ?></td>
                                        <td><?PHP echo str_replace(',',',<br>',$row->loading_region_id); ?></td>
                                        <td><?PHP echo str_replace(',',',<br>',$row->discharge_region_id ); ?></td>
                                        <td>{{ date('d-M-Y', strtotime($row->laycan_date_from)) }}</td>
                                        <td>{{ date('d-M-Y', strtotime($row->laycan_date_to)) }}</td>
                                        <td>{{ $row->quantity }}</td>
                                        {{-- <td >{{optional($row->Lunit)->unit_name}}</td> --}}
                                        <td>{{ $row->loading_discharge_rates }}</td>
                                        <td>{{ $row->created_at }}</td>

                                        @if (session('front_uid') != '')
                                            <td class="text-center">
                                                <a href='{{ $row->cargo_id }}'
                                                    class="cargo_show_detail1 cargo_show_detail1_{{ $row->cargo_id }} show_details_btn"><i
                                                        class="fas fa-eye fa-2x"></i></a>
                                                <a href='{{ $row->cargo_id }}'
                                                    class="cargo_show_detail2 cargo_show_detail2_{{ $row->cargo_id }} show_details_btn"><i
                                                        class="fas fa-eye-slash fa-2x"></i></a>
                                            </td>
                                        @endif

                                    </tr>
                                    <tr class="show_details show_details_{{ $row->cargo_id }} "
                                        style="display: none; background-color: #F1F1F1;">
                                        <td></td>
                                        <td>
                                            <p class="b7 mb-0">Loading Country:</p>
                                            <p class=""><?PHP echo str_replace(',',',<br>',$row->loading_country_id ); ?></p>
                                            <p class="b7 mb-0">Max LOA:</p>
                                            <p class="">{{ $row->max_loa }}</p>
                                        </td>
                                        <td>
                                            <p class="b7 mb-0">Loading Port</p>
                                            <p class=""><?PHP echo str_replace(',',',<br>',$row->loading_port_id ); ?></p>
                                            <p class="b7 mb-0">Max Draft:</p>
                                            <p class="">{{ $row->max_draft }}</p>
                                        </td>
                                        <td>
                                            <p class="b7 mb-0">Discharge Country</p>
                                            <p class=""><?PHP echo str_replace(',',',<br>',$row->discharge_country_id ); ?></p>
                                            <p class="b7 mb-0">Max Height:</p>
                                            <p class="">{{ $row->max_height }}</p>
                                        </td>
                                        <td>
                                            <p class="b7 mb-0">Discharge Port</p>
                                            <p class=""><?PHP echo str_replace(',',',<br>',$row->discharge_port_id ); ?></p>
                                            <p class="b7 mb-0">Loading Equipment Req:</p>
                                            <p class="">{{ $row->loading_equipment_req }}</p>
                                        </td>
                                        <td>
                                            <p class="b7 mb-0">Over Age:</p>
                                            <p class="">{{ $row->over_age }}</p>
                                            <p class="b7 mb-0">Discharge Equipment Req:</p>
                                            <p class="">{{ $row->discharge_equipment_req }}</p>
                                        </td>
                                        <td>
                                            <p class="b7 mb-0">Hazmat:</p>
                                            <p class="">{{ $row->hazmat }}</p>
                                            <p class="b7 mb-0">Combinable:</p>
                                            <p class="">{{ $row->combinable }}</p>
                                        </td>
                                        <td>
                                            <p class="b7 mb-0">Commission:</p>
                                            <p class="">{{ $row->commision }}</p>
                                            <p class="b7 mb-0">Gear Lifting Capacity:</p>
                                            <p class="">{{ $row->gear_lifting_capacity }}</p>
                                        </td>
                                        <td colspan="2">
                                            <p class="b7 mb-0">Additional Info:</p>
                                            <p class="">{{ $row->additional_info }}</p>
                                        </td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div id="dialog" class="text-right rounded p-1" style="display: none;">
        <p class="size20 text-left text-white bg-danger p-2 rounded">Access Denied</p>

        <p class="text-left">
            Please <a href={{ route('login') }} class="btn btn-info text=white btn-sm">Login</a> to do this action.
        </p>

        <br>
        <hr>
        <button id="close_dialog" class="btn btn-danger">Close</button>

    </div>
    </div>
@endsection
