@extends('front/layout/layout')

@section('page_title', 'Cargo')


@section('container')

    <style>
        table {
            padding: 0px;
        }

        .table th {
            font-size: 12px;
            /* padding: .75rem; */
            padding: 5px 8px 5px 5px;
            margin: 0px;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
            font-weight: 600;
            background-color: #c4c4c4;
        }

        .table td {
            /* background-color: #09cec708; */
            overflow: hidden;
            text-overflow: ellipsis;
            font-size: 12px;
            /* padding: .75rem; */
            padding: 3px 8px 3px 5px;
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
            /* height: 100px;  */
        }

        .tableFixHead thead th {
            position: sticky;
            top: 0;
            z-index: 1;
        }

        /* Just common table stuff. Really. */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 8px 16px;
        }

        th {
            background: #eee;
        }

    </style>

    <div class="container-fluid mt-5 mb-5">

        <div class="row mb-3">
            <div class="col-12 col-lg-8 col-md-6 pt-2">
                <h1 class="size28 text-white b7 pt-2 pb-3 pl-3 bg_sec ">Cargo</h1>
            </div>
            <div class="col-12 col-lg-2 col-md-3 pt-2">
                <a id="adv_ser11" class="btn btn-info btn-block pt-3 pb-3 rounded-0" href={{ route('cargo.view') }}><i
                        class="fas fa-search"></i> Advanced
                    Search</a>
            </div>
            <div class="col-12 col-lg-2 col-md-3 pt-2">
                <a href={{ route('cargo.add') }} id="{{ session('front_uname') }}"
                    class="btn btn-info btn-block pt-3 pb-3 rounded-0 add_cargo_btn"><i class="fas fa-plus"></i> Add New</a>
            </div>
        </div>

        <div id='adv_ser21' class="container pb-5" style="display: none;">
            <form id="search_cargo" method="post" action="{{ route('cargo.search_req') }}"
                class="form-horizontal form-label-left " enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Select Search Field</label>
                        <select name="laycan_date" id="laycan_date" class="form-control">
                            <option value="-1" disabled selected>Choose</option>
                            <option value="laycan_date_from">laycan date from</option>
                            <option value="laycan_date_to">laycan date to</option>
                        </select>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">From Date</label>
                        <input type="date" required class="form-control from_date" id="from_date" name="from_date"
                            placeholder="From Date" />
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">To Date</label>
                        <input type="date" required class="form-control to_date" id="to_date" name="to_date"
                            placeholder="To Date" />
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Loading Region</label>
                        <select name="loading_region_id" id="loading_region_id" class="form-control">
                            <option value="-1" disabled selected>Choose</option>
                            @foreach ($region as $row)
                                <option value="{{ $row->region_id }}">{{ $row->region_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12 ">
                        <label for="">Loading Country</label>
                        <select name="loading_country_id" id="loading_country_id" class="form-control">
                            <option value="-1" disabled selected>Choose</option>
                            @foreach ($country as $row)
                                <option value="{{ $row->country_id }}">{{ $row->country_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12 ">
                        <label for="">Loading Port</label>
                        <select name="loading_port_id" id="loading_port_id" class="form-control">
                            <option value="-1" disabled selected>Choose</option>
                            @foreach ($port as $row)
                                <option value="{{ $row->port_id }}">{{ $row->port_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12 ">
                        <label for="">Discharge Region</label>
                        <select name="discharge_region_id" id="discharge_region_id" class="form-control">
                            <option value="-1" disabled selected>Choose</option>
                            @foreach ($region as $row)
                                <option value="{{ $row->region_id }}">{{ $row->region_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12 ">
                        <label for="">Discharge Country</label>
                        <select name="discharge_country_id" id="discharge_country_id" class="form-control">
                            <option value="-1" disabled selected>Choose</option>
                            @foreach ($country as $row)
                                <option value="{{ $row->country_id }}">{{ $row->country_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Discharge Port</label>
                        <select name="discharge_port_id" id="discharge_port_id" class="form-control">
                            <option value="-1" disabled selected>Choose</option>
                            @foreach ($port as $row)
                                <option value="{{ $row->port_id }}">{{ $row->port_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- -->
                    <div class="col-12 col-12 text-right">
                        <div class="">
                            <button type="submit" class="btn btn-info">Search</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>

        @if (session('front_uid') != '')
            <p class="b7 mb-0">Search History</p>

            <div class="border table-wrapper-scroll-y my-custom-scrollbar" style="height: 150px;">
                <table id="cargo_table22" class="table tableFixHead table-condensed table-hover table-responsive-md m-0 ">
                    <thead class="" style="background-color: #EAEAEA;">
                        <tr>
                            <th width="1%">#</th>
                            <th width="11%">Laycan Date</th>
                            <th width="11%">From Date</th>
                            <th width="11%">To Date</th>
                            <th width="11%">Loading Region</th>
                            <th width="11%">Discharge Region</th>
                            <th width="11%">Loading Country</th>
                            <th width="11%">Discharge Country</th>
                            <th width="11%">Loading Port</th>
                            <th width="11%">Discharge Port</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ser_data as $row)
                            <tr id="rec-{{ $row->id }}" class="ser_hist_req ">
                                <td id="id-{{ $row->id }}">{{ $row->id }}</td>
                                <td id="laycan-{{ $row->id }}">{{ $row->laycan_date }}</td>
                                <td id="from-{{ $row->id }}">{{ date('d-M-Y', strtotime($row->from_date)) }}</td>
                                <td id="to-{{ $row->id }}">{{ date('d-M-Y', strtotime($row->to_date)) }}</td>
                                <td class="{{ $row->loading_region_id }}" id="lregion-{{ $row->id }}">
                                    {{ $row->loading_region_id }}</td>
                                <td class="{{ $row->discharge_region_id }}" id="dregion-{{ $row->id }}">
                                    {{ $row->discharge_region_id }}</td>
                                <td class="{{ $row->loading_country_id }}" id="lcountry-{{ $row->id }}">
                                    {{ $row->loading_country_id }}</td>
                                <td class="{{ $row->discharge_country_id }}" id="dcountry-{{ $row->id }}">
                                    {{ $row->discharge_country_id }}</td>
                                <td class="{{ $row->loading_port_id }}" id="lport-{{ $row->id }}">
                                    {{ $row->loading_port_id }}</td>
                                <td class="{{ $row->discharge_port_id }}" id="dport-{{ $row->id }}">
                                    {{ $row->discharge_port_id }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>



            <p class="b7 mb-0 mt-5"></p>
        @endif

        <div class="table-wrapper-scroll-y my-custom-scrollbar">
            <div class="border">
                <table id="cargo_table21" class="table tableFixHead table-condensed table-hover table-responsive-md m-0 ">
                    <thead class="" style="background-color: #EAEAEA;">
                        <tr>
                            <th width="2%">ID</th>
                            <th width="12%">Cargo Name</th>
                            <th width="10%">Cargo Type</th>
                            <th width="12%">Loading Region</th>
                            <th width="12%">Discharge Region</th>
                            <th width="10%">Laycan Date From</th>
                            <th width="10%">Laycan Date To</th>
                            <th width="8%">Quantity</th>
                            {{-- <th width="8%">Unit</th> --}}
                            <th width="13%">Loading Discharge Rates</th>
                            <th width="10%">Posted on</th>

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
                                    <td>{{ $row->cargo_id }}</td>
                                    <td>{{ $row->cargo_name }}</td>
                                    <td>{{ $row->cargo_type_id }}</td>
                                    <td>{{ $row->loading_region_id }}</td>
                                    <td>{{ $row->discharge_region_id }}</td>
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
                                        <p class="">{{ $row->loading_country_id }}</p>
                                        <p class="b7 mb-0">Max LOA:</p>
                                        <p class="">{{ $row->max_loa }}</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Loading Port</p>
                                        <p class="">{{ $row->loading_port_id }}</p>
                                        <p class="b7 mb-0">Max Draft:</p>
                                        <p class="">{{ $row->max_draft }}</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Discharge Country</p>
                                        <p class="">{{ $row->discharge_country_id }}</p>
                                        <p class="b7 mb-0">Max Height:</p>
                                        <p class="">{{ $row->max_height }}</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Discharge Port</p>
                                        <p class="">{{ $row->discharge_port_id }}</p>
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
