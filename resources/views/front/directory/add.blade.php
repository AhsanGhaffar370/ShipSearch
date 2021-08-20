@extends('front/layout/layout')

@section('page_title', 'Vessel')


@section('container')

    <style>
        .left_round {
            border-top-right-radius: 0px !important;
            border-bottom-right-radius: 0px !important;
        }

        .right_round {
            border-top-left-radius: 0px !important;
            border-bottom-left-radius: 0px !important;
            background-color: #dfe3e3 !important;
        }
        .form-group > label{
            font-size: 14px !important;
        }
    </style>

    <div class="container-fluid p-lg-5 p-md-2 mt-3 mb-5">
        <h1 class="size28 text-white b7 p-2 mb-3 bg_sec ">Vessel</h1>
        <div class="bg-light  p-4 border rounded">
            <form id="vessel_form" method="post" action="{{ route('vessel.add_req') }}"
                class="form-horizontal form-label-left " enctype="multipart/form-data">
                <!-- <form method="post" action="{{ url('/admin/post/add_post') }}" class="form-horizontal form-label-left"> -->
                @csrf
                <div class="row">
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Vessel ID</label>
                        <input type="text" required name="ref_no" class="form-control" value="{{$vessel_ref_no}}" readonly>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12 m-0 p-0"></div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12 m-0 p-0"></div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Vessel Name</label>
                        <input type="text" required name="vessel_name" class="form-control">
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Laycan Date From</label>
                        <div class="input-group date" data-provide="datepicker" data-date-start-date="0d"
                            data-date-format="yyyy-mm-dd">
                            <div class="input-group-addon bg_bl" style="padding: 7px 10px 7px 10px;">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" id="laycan_date_from" required class="form-control pull-right datepicker"
                                name="laycan_date_from" value="{{ date('Y-m-d') }}">
                        </div>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Laycan Date To</label>
                        <div class="input-group date" data-provide="datepicker" data-date-start-date="0d"
                            data-date-format="yyyy-mm-dd">
                            <div class="input-group-addon bg_bl" style="padding: 7px 10px 7px 10px;">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" id="laycan_date_to" required class="form-control pull-right datepicker"
                                name="laycan_date_to" value="{{ date('Y-m-d') }}">
                        </div>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Region</label>
                        <select name="region_id[]" id="region_id" class="form-control region_id" multiple
                            title="Choose"
                            data-size="5"
                            data-selected-text-format="count > 2" >
                            @foreach ($region as $row)
                                <option value="{{ $row->region_name }}">{{ $row->region_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Country</label>
                        <select name="country_id[]" id="country_id" class="form-control country_id" multiple
                            title="Choose"
                            data-size="5"
                            data-selected-text-format="count > 2" >
                            @foreach ($country as $row)
                                <option value="{{ $row->country_name }}">{{ $row->country_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Port</label>
                        <select name="port_id[]" id="port_id" class="form-control port_id" multiple
                            title="Choose"
                            data-size="5"
                            data-selected-text-format="count > 2" >
                            @foreach ($port as $row)
                                <option value="{{ $row->port_name }}">{{ $row->port_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Vessel Type</label>
                        <select name="vessel_type_id[]" id="vessel_type_id" class="form-control vessel_type_id" multiple
                            title="Choose"
                            data-size="5"
                            data-selected-text-format="count > 2" 
                            {{-- data-live-search="true"  --}}
                            {{-- data-max-options="5"   --}} 
                            {{-- data-actions-box="true"  --}}
                            >
                            @foreach ($vessel_type as $row)
                                <option value="{{ $row->vessel_type_name }}">{{ $row->vessel_type_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Charter Type</label>
                        <select name="charter_type_id[]" id="charter_type_id" class="form-control charter_type_id" multiple
                            title="Choose"
                            data-size="5"
                            data-selected-text-format="count > 2" >
                            @foreach ($charter_type as $row)
                                <option value="{{ $row->charter_type_name }}">{{ $row->charter_type_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Built Year</label>
                        <input type="number" required name="built_year" class="form-control">
                    </div>
                    <!-- -->
                    <div class="col-12 col-lg-4 col-md-4 col-sm-12 mt-4">
                        <div class="row">
                            <div class="form-group col-8 col-lg-9 col-md-9 col-sm-8 pr-0">
                                <label for="">DWT</label>
                                {{-- <label for="">Dead Weight</label> --}}
                                <input type="number" required name="dwt" class="left_round form-control ">
                            </div>
                            <div class="form-group col-4 col-lg-3 col-md-3 col-sm-4 pl-0 pt-2">
                                <select name="dwt_unit" id="dwt_unit"
                                    class="right_round form-control mt-4 bg-light">
                                    <option value="MT">MT</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- -->
                    <div class="col-12 col-lg-4 col-md-4 col-sm-12 mt-4">
                        <div class="row">
                            <div class="form-group col-8 col-lg-9 col-md-9 col-sm-8 pr-0">
                                <label for="">DWCC</label>
                                <input type="number" required name="dwcc" class="left_round form-control ">
                            </div>
                            <div class="form-group col-4 col-lg-3 col-md-3 col-sm-4 pl-0 pt-2">
                                <select name="dwcc_unit" id="dwcc_unit"
                                    class="right_round form-control mt-4 bg-light">
                                    <option value="MT">MT</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">IMO Number</label>
                        <input type="text" required name="imo_number" class="form-control">
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Call Sign</label>
                        <input type="text" required name="call_sign" class="form-control">
                    </div>
                    <!-- -->
                    <div class="col-12 col-lg-4 col-md-4 col-sm-12 mt-4">
                        <div class="row">
                            <div class="form-group col-8 col-lg-9 col-md-9 col-sm-8 pr-0">
                                <label for="">Speed Ballast</label>
                                <input type="number" required name="speed_ballast" class="left_round form-control ">
                            </div>
                            <div class="form-group col-4 col-lg-3 col-md-3 col-sm-4 pl-0 pt-2">
                                <select name="speed_ballast_unit" id="speed_ballast_unit"
                                    class="right_round form-control mt-4 bg-light">
                                    <option value="Nm/H">Nm/H</option>
                                    <option value="mph">mph</option>
                                    <option value="Km/H">Km/H</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- -->
                    <div class="col-12 col-lg-4 col-md-4 col-sm-12 mt-4">
                        <div class="row">
                            <div class="form-group col-8 col-lg-9 col-md-9 col-sm-8 pr-0">
                                <label for="">Speed Laden</label>
                                {{-- <label for="">Laden</label> --}}
                                <input type="number" required name="speed_laden" class="left_round form-control ">
                            </div>
                            <div class="form-group col-4 col-lg-3 col-md-3 col-sm-4 pl-0 pt-2">
                                <select name="speed_laden_unit" id="speed_laden_unit"
                                    class="right_round form-control mt-4 bg-light">
                                    <option value="Nm/H">Nm/H</option>
                                    <option value="mph">mph</option>
                                    <option value="Km/H">Km/H</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- -->
                    <div class="col-12 col-lg-4 col-md-4 col-sm-12 mt-4">
                        <div class="row">
                            <div class="form-group col-8 col-lg-9 col-md-9 col-sm-8 pr-0">
                                <label for="">Gross Tonnage</label>
                                {{-- <label for="">Laden</label> --}}
                                <input type="number" required name="gross_tonnage" class="left_round form-control ">
                            </div>
                            <div class="form-group col-4 col-lg-3 col-md-3 col-sm-4 pl-0 pt-2">
                                <select name="gross_tonnage_unit" id="gross_tonnage_unit"
                                    class="right_round form-control mt-4 bg-light">
                                    <option value="MT">MT</option>
                                    <option value="Lbs">Lbs</option>
                                    <option value="KG">KG</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- -->
                    <div class="col-12 col-lg-4 col-md-4 col-sm-12 mt-4">
                        <div class="row">
                            <div class="form-group col-8 col-lg-9 col-md-9 col-sm-8 pr-0">
                                <label for="">Net Tonnage</label>
                                {{-- <label for="">Laden</label> --}}
                                <input type="number" required name="net_tonnage" class="left_round form-control ">
                            </div>
                            <div class="form-group col-4 col-lg-3 col-md-3 col-sm-4 pl-0 pt-2">
                                <select name="net_tonnage_unit" id="net_tonnage_unit"
                                    class="right_round form-control mt-4 bg-light">
                                    <option value="MT">MT</option>
                                    <option value="Lbs">Lbs</option>
                                    <option value="KG">KG</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- -->
                    <div class="col-12 col-lg-4 col-md-4 col-sm-12 mt-4">
                        <div class="row">
                            <div class="form-group col-8 col-lg-9 col-md-9 col-sm-8 pr-0">
                                <label for="">LOA Max</label>
                                {{-- <label for="">Laden</label> --}}
                                <input type="number" required name="loa_max" class="left_round form-control ">
                            </div>
                            <div class="form-group col-4 col-lg-3 col-md-3 col-sm-4 pl-0 pt-2">
                                <select name="loa_max_unit" id="loa_max_unit"
                                    class="right_round form-control mt-4 bg-light">
                                    <option value="Meters">Meters</option>
                                    <option value="Feet">Feet</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- -->
                    <div class="col-12 col-lg-4 col-md-4 col-sm-12 mt-4">
                        <div class="row">
                            <div class="form-group col-8 col-lg-9 col-md-9 col-sm-8 pr-0">
                                <label for="">Beam Max</label>
                                {{-- <label for="">Laden</label> --}}
                                <input type="number" required name="beam_max" class="left_round form-control ">
                            </div>
                            <div class="form-group col-4 col-lg-3 col-md-3 col-sm-4 pl-0 pt-2">
                                <select name="beam_max_unit" id="beam_max_unit"
                                    class="right_round form-control mt-4 bg-light">
                                    <option value="Meters">Meters</option>
                                    <option value="Feet">Feet</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- -->
                    <div class="col-12 col-lg-4 col-md-4 col-sm-12 mt-4">
                        <div class="row">
                            <div class="form-group col-8 col-lg-9 col-md-9 col-sm-8 pr-0">
                                <label for="">Summer Draft</label>
                                {{-- <label for="">Laden</label> --}}
                                <input type="number" required name="summer_draft" class="left_round form-control ">
                            </div>
                            <div class="form-group col-4 col-lg-3 col-md-3 col-sm-4 pl-0 pt-2">
                                <select name="summer_draft_unit" id="summer_draft_unit"
                                    class="right_round form-control mt-4 bg-light">
                                    <option value="Meters">Meters</option>
                                    <option value="Feet">Feet</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- -->
                    <div class="col-12 col-lg-4 col-md-4 col-sm-12 mt-4">
                        <div class="row">
                            <div class="form-group col-8 col-lg-9 col-md-9 col-sm-8 pr-0">
                                <label for="">Fresh Water Draft</label>
                                {{-- <label for="">Laden</label> --}}
                                <input type="number" required name="fresh_water_draft" class="left_round form-control ">
                            </div>
                            <div class="form-group col-4 col-lg-3 col-md-3 col-sm-4 pl-0 pt-2">
                                <select name="fresh_water_draft_unit" id="fresh_water_draft _unit"
                                    class="right_round form-control mt-4 bg-light">
                                    <option value="Meters">Meters</option>
                                    <option value="Feet">Feet</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Grain Capacity</label>
                        <input type="text" required name="grain_capacity" class="form-control">
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Bale Capacity</label>
                        <input type="text" required name="bale_capacity" class="form-control">
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Lane Meters</label>
                        <input type="text" required name="lane_meters" class="form-control">
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Container Capacity 20ft</label>
                        <input type="text" required name="container_capacity_20ft" class="form-control">
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Container Capacity 40ft</label>
                        <input type="text" required name="container_capacity_40ft" class="form-control">
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Container Capacity 40CH</label>
                        <input type="text" required name="container_capacity_40ch" class="form-control">
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">IFO Consumption Empty</label>
                        <input type="text" required name="ifo_consumption_empty" class="form-control">
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">IFO Consumption Laden</label>
                        <input type="text" required name="ifo_consumption_laden" class="form-control">
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">IFO Consumption Port</label>
                        <input type="text" required name="ifo_consumption_port" class="form-control">
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">MGO Consumption Empty</label>
                        <input type="text" required name="mgo_consumption_empty" class="form-control">
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">MGO Consumption Laden</label>
                        <input type="text" required name="mgo_consumption_laden" class="form-control">
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">MGO Consumption Port</label>
                        <input type="text" required name="mgo_consumption_port" class="form-control">
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Classed By</label>
                        <input type="text" required name="classed_by" class="form-control">
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">P&I Club</label>
                        <input type="text" required name="p_i_club" class="form-control">
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12 mt-4">
                        <label for="">Additional Info</label>
                        <textarea name="additional_info" id="additional_info" class="form-control" cols="30"
                            rows="5" maxlength = "250"></textarea>
                    </div>

                    <!-- -->
                    <div class="col-12">
                        <hr>
                        <div class="d-flex flex-row justify-content-center">
                            <button type="submit" class="btn btn-info pl-5 pr-5 pt-2 pb-2">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
