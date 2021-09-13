@extends('front/layout/layout')

@section('page_title', 'Cargo')


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
        <h1 class="size28 text-white b7 p-2 mb-3 bg_sec ">Cargo</h1>
        <div id="home_cargo" class="bg-light  p-4 border rounded">
            <form id="search_cargo_form" method="post" action="{{ route('cargo.add_req') }}"
                class="form-horizontal form-label-left " enctype="multipart/form-data">
                <!-- <form method="post" action="{{ url('/admin/post/add_post') }}" class="form-horizontal form-label-left"> -->
                @csrf
                <div class="row">
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Cargo ID</label>
                        <input type="text" required name="ref_no" class="form-control" value="{{$cargo_ref_no}}" readonly>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Cargo Type</label>
                        <section class="cargo_type_id_par">
                            <select name="cargo_type_id[]" id="cargo_type_id" class="form-control cargo_type_id" multiple
                                title="Choose"
                                data-size="5"
                                data-selected-text-format="count > 2" 
                                data-live-search="true" 
                                {{-- data-max-options="5"   --}} 
                                {{-- data-actions-box="true"  --}}
                                >
                                <option value="13">Any</option>
                                @foreach ($cargo_type as $row)
                                    <option value="{{ $row->cargo_type_id }}">{{ $row->cargo_type_name }}</option>
                                @endforeach
                            </select>
                        </section>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12 m-0 p-0"></div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Loading Region</label>
                        <section class="loading_region_id_par">
                            <select name="loading_region_id[]" id="loading_region_id" class="form-control loading_region_id add_cvs_inp_fields ser_inp_fields21 mb-2" multiple
                                title="Choose"
                                data-size="5"
                                data-selected-text-format="count > 2" 
                                data-live-search="true">
                                <option value="26">Any</option>
                                @foreach ($region as $row)
                                {{-- working --}}
                                    <option value="{{ $row->region_id }}">{{ $row->region_name }}</option>
                                @endforeach
                            </select>
                        </section>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Loading Country</label>
                        <section class="loading_country_id_par">
                            <select name="loading_country_id[]" id="loading_country_id" class="form-control loading_country_id add_cvs_inp_fields ser_inp_fields21 mb-2" multiple
                                title="Choose"
                                data-size="5"
                                data-selected-text-format="count > 2" 
                                 data-live-search="true">
                                 <option value="197">Any</option>
                                @foreach ($country as $row)
                                    <option value="{{ $row->country_id }}">{{ $row->country_name }}</option>
                                @endforeach
                            </select>
                        </section>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Loading Port</label>
                        <section class="loading_port_id_par">
                            <select name="loading_port_id[]" id="loading_port_id" class="form-control loading_port_id add_cvs_inp_fields ser_inp_fields21 mb-2" multiple
                                title="Choose"
                                data-size="5"
                                data-selected-text-format="count > 2" 
                                 data-live-search="true">
                                 <option value="5638">Any</option>
                                @foreach ($port as $row)
                                    <option value="{{ $row->port_id }}">{{ $row->port_name }}</option>
                                @endforeach
                            </select>
                        </section>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Discharge Region</label>
                        <section class="discharge_region_id_par">
                            <select name="discharge_region_id[]" id="discharge_region_id" class="form-control discharge_region_id add_cvs_inp_fields ser_inp_fields21 mb-2" multiple
                                title="Choose"
                                data-size="5"
                                data-selected-text-format="count > 2" 
                                 data-live-search="true">
                                 <option value="26">Any</option>
                                @foreach ($region as $row)
                                    <option value="{{ $row->region_id }}">{{ $row->region_name }}</option>
                                @endforeach
                            </select>
                        </section>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Discharge Country</label>
                        <section class="discharge_country_id_par">
                            <select name="discharge_country_id[]" id="discharge_country_id" class="form-control discharge_country_id add_cvs_inp_fields ser_inp_fields21 mb-2" multiple
                                title="Choose"
                                data-size="5"
                                data-selected-text-format="count > 2" 
                                 data-live-search="true">
                                 <option value="197">Any</option>
                                @foreach ($country as $row)
                                    <option value="{{ $row->country_id }}">{{ $row->country_name }}</option>
                                @endforeach
                            </select>
                        </section>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Discharge Port</label>
                        <section class="discharge_port_id_par">
                            <select name="discharge_port_id[]" id="discharge_port_id" class="form-control discharge_port_id add_cvs_inp_fields ser_inp_fields21 mb-2" multiple
                                title="Choose"
                                data-size="5"
                                data-selected-text-format="count > 2" 
                                 data-live-search="true">
                                 <option value="5638">Any</option>
                                @foreach ($port as $row)
                                    <option value="{{ $row->port_id }}">{{ $row->port_name }}</option>
                                @endforeach
                            </select>
                        </section>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Laycan Date From</label>
                        <div class="input-group date" data-provide="datepicker" data-date-start-date="0d"
                            data-date-format="yyyy-mm-dd">
                            <div class="input-group-addon bg_gd" style="padding: 7px 10px 7px 10px;">
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
                            <div class="input-group-addon bg_gd" style="padding: 7px 10px 7px 10px;">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" id="laycan_date_to" required class="form-control pull-right datepicker"
                                name="laycan_date_to" value="{{ date('Y-m-d') }}">
                        </div>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12 m-0 p-0"></div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12 mt-4">
                        <div class="row">
                            <div class="form-group col-8 col-lg-9 col-md-9 col-sm-8 pr-0">
                                <label for="">Max Height</label>
                                <input type="number" required name="max_height" class="left_round form-control ">
                            </div>
                            <div class="form-group col-4 col-lg-3 col-md-3 col-sm-4 pl-0 pt-2">
                                <select name="max_height_unit" id="max_height_unit"
                                    class="right_round form-control mt-4 bg-light">
                                    <option value="Meters">Meters</option>
                                    <option value="Feet">Feet</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12 mt-4">
                        <div class="row">
                            <div class="form-group col-8 col-lg-9 col-md-9 col-sm-8 pr-0">
                                <label for="">Max LOA</label>
                                <input type="number" required name="max_loa" class="left_round form-control ">
                            </div>
                            <div class="form-group col-4 col-lg-3 col-md-3 col-sm-4 pl-0 pt-2">
                                <select name="max_loa_unit" id="max_loa_unit"
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
                                <label for="">Stowage Factor</label>
                                <input type="number" required name="stowage_factor" class="left_round form-control ">
                            </div>
                            <div class="form-group col-4 col-lg-3 col-md-3 col-sm-4 pl-0 pt-2">
                                <select name="stowage_factor_unit" id="stowage_factor_unit"
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
                                <label for="">Quantity</label>
                                <input type="number" required name="quantity" class="left_round form-control ">
                            </div>
                            <div class="form-group col-4 col-lg-3 col-md-3 col-sm-4 pl-0 pt-2">
                                <select name="quantity_unit" id="quantity_unit"
                                    class="right_round form-control mt-4 bg-light">
                                    <option value="MT">MT</option>
                                    <option value="Gallons">Gallons</option>
                                    <option value="CBM">CBM</option>
                                    <option value="Lanes">Lanes</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- -->
                    <div class="col-12 col-lg-2 col-md-4 col-sm-12 mt-4">
                        <label for="">Commission</label>
                        <input type="number" required name="commision" class="form-control">
                    </div>
                    <!-- -->
                    <div class="col-12 col-lg-2 col-md-4 col-sm-12 mt-4">
                        <label for="">Gear Lifting Capacity</label>
                        <input type="number" required name="gear_lifting_capacity" class="form-control">
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12 mt-4">
                        <div class="row">
                            <div class="form-group col-8 col-lg-9 col-md-9 col-sm-8 pr-0">
                                <label for="">Loading/Discharge Rates</label>
                                <input type="number" required name="loading_discharge_rates"
                                    class="left_round form-control ">
                            </div>
                            <div class="form-group col-4 col-lg-3 col-md-3 col-sm-4 pl-0 pt-2">
                                <select name="loading_discharge_rates_unit" id="loading_discharge_rates_unit"
                                    class="right_round form-control mt-4 bg-light">
                                    <option value="Per Day">Per Day</option>
                                    <option value="Per Hour">Per Hour</option>
                                </select>
                            </div>
                        </div>
                        {{-- <div class="row">
                                <div class="form-group col-12 col-lg-6 col-md-6 col-sm-12">
                                    <label for="">Loading/Discharge Rates</label>
                                    <input type="number" required name="loading_discharge_rates" class="form-control">
                                </div>
                                <div class="form-group col-12 col-lg-6 col-md-6 col-sm-12">
                                    <label for="">Loading/Discharge Unit</label>
                                    <select name="loading_discharge_unit_id" id="loading_discharge_unit_id" class="form-control">
                                        @foreach ($unit as $row)
                                        <option value="{{$row->unit_id}}">{{$row->unit_name}}</option>
                                        @endforeach
                                    </select>
                                </div> 
                            </div> --}}
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-2 col-md-4 col-sm-12 mt-4">
                        <label for="" class="mb-3">Over Age</label><br>
                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" required id="over_age1" name="over_age"
                                value="Yes" />
                            <label class="form-check-label" for="over_age1"> Yes </label>
                        </div>
                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" required id="over_age2" name="over_age"
                                value="No" />
                            <label class="form-check-label" for="over_age2"> No </label>
                        </div>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-2 col-md-4 col-sm-12 mt-4">
                        <label for="" class="mb-3">Loading Equipment Req</label><br>
                        {{-- <input type="text" required name="loading_equipment_req" class="form-control"> --}}
                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" required id="loading_equipment_req1"
                                name="loading_equipment_req" value="Yes" />
                            <label class="form-check-label " for="loading_equipment_req1"> Yes </label>
                        </div>
                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" required id="loading_equipment_req2"
                                name="loading_equipment_req" value="No" />
                            <label class="form-check-label" for="loading_equipment_req2"> No </label>
                        </div>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-2 col-md-4 col-sm-12 mt-4">
                        <label for="" class="mb-3">Discharge Equipment Req</label><br>
                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" required id="discharge_equipment_req1"
                                name="discharge_equipment_req" value="Yes" />
                            <label class="form-check-label " for="discharge_equipment_req1"> Yes </label>
                        </div>
                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" required id="discharge_equipment_req2"
                                name="discharge_equipment_req" value="No" />
                            <label class="form-check-label" for="discharge_equipment_req2"> No </label>
                        </div>
                    </div>
                    <!-- -->
                    <div class="col-12 col-lg-2 col-md-4 col-sm-12 mt-4">
                        <label for="" class="mb-3">Combinable</label><br>
                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" required id="combinable1" name="combinable"
                                value="Yes" />
                            <label class="form-check-label" for="combinable1"> Yes </label>
                        </div>
                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" required id="combinable2" name="combinable"
                                value="No" />
                            <label class="form-check-label" for="combinable2"> No </label>
                        </div>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-2 col-md-4 col-sm-12 mt-4 mb-4">
                        <label for="" class="mb-3">Hazmat</label><br>
                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" required id="hazmat1" name="hazmat" value="Yes" />
                            <label class="form-check-label " for="hazmat1"> Yes </label>
                        </div>
                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" required id="hazmat2" name="hazmat" value="No" />
                            <label class="form-check-label" for="hazmat2"> No </label>
                        </div>
                    </div>
                    
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12 mt-4">
                        <label for="">Additional Notes</label>
                        <textarea name="additional_info" id="additional_info" class="form-control" cols="30"
                            rows="3" maxlength = "250"></textarea>
                    </div>
                    <!-- -->
                    <div class="col-12">
                        <hr>
                        <div class="d-flex flex-row justify-content-center">
                            <button type="submit" class="btn btn-info pl-5 pr-5 pt-2 pb-2">Save</button>
                        </div>
                    </div>
                    <!-- -->
                    <!-- <div class="col-12 col-lg-4 col-md-4 col-sm-12 mt-4">
                            <label for="">Loading/Discharge Equipment Req</label>
                            <div id="check_bor" class="form-row pl-4  border">
                                <div class="form-group col-12 col-lg-6 col-md-6 col-sm-12">
                                    <div class="mt-2">
                                        <input class="form-check-input" type="checkbox" name="loading_discharge_equipment_req[]"
                                            value="Gears">Gears
                                    </div>
                                    <div class="mt-2">
                                        <input class="form-check-input" type="checkbox" name="loading_discharge_equipment_req[]"
                                            value="Pipes/Hoses">Pipes/Hoses
                                    </div>
                                    <div class="mt-2">
                                        <input class="form-check-input" type="checkbox" name="loading_discharge_equipment_req[]"
                                            value="Dunnage">Dunnage
                                    </div>
                                    <div class="mt-2">
                                        <input class="form-check-input" type="checkbox" name="loading_discharge_equipment_req[]"
                                            value="Other">Other
                                    </div>
                                </div>
                                <div class="form-group col-12 col-lg-6 col-md-6 col-sm-12">
                                    <div class="mt-2">
                                        <input class="form-check-input" type="checkbox" name="loading_discharge_equipment_req[]"
                                            value="Conveyor Belt">Conveyor Belt
                                    </div>
                                    <div class="mt-2">
                                        <input class="form-check-input" type="checkbox" name="loading_discharge_equipment_req[]"
                                            value="Pallets">Pallets
                                    </div>
                                    <div class="mt-2">
                                        <input class="form-check-input" type="checkbox" name="loading_discharge_equipment_req[]"
                                            value="Pontoon Cover">Pontoon Cover
                                    </div>
                                </div>
                            </div> 
                            <label for="">Loading/Discharge Equipment Req</label>
                            <select name="loading_discharge_equipment_req[]" multiple required class="form-control">
                                <option value="Gears">Gears</option>
                                <option value="Conveyor Belt">Conveyor Belt</option>
                                <option value="Pipes/Hoses">Pipes/Hoses</option>
                                <option value="Pallets">Pallets</option>
                                <option value="Dunnage">Dunnage</option>
                                <option value="Pontoon Cover">Pontoon Cover</option>
                                <option value="Other">Other</option>
                            </select>
                        </div> -->
                </div>
            </form>
        </div>
    </div>

@endsection
