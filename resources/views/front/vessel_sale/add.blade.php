@extends('front/layout/layout')

@section('page_title', 'Vessel Sale/Purchase')


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
        <h1 class="size28 text-white b7 p-2 mb-3 bg_sec ">Vessel Sale/Purchase</h1>
        <div id="home_vsale" class="bg-light  p-4 border rounded">
            <form id="search_vsale_form" method="post" action="{{ route('vessel_sale.add_req') }}"
                class="form-horizontal form-label-left " enctype="multipart/form-data">
                <!-- <form method="post" action="{{ url('/admin/post/add_post') }}" class="form-horizontal form-label-left"> -->
                @csrf
                <div class="row">
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Vessel Sale ID</label>
                        <input type="text" required name="ref_no" class="form-control" value="{{$vessel_sale_ref_no}}" readonly>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        
                         <label class="control-label col-md-3 col-sm-3 ">Image</label>
                         <div class="table rowfy">
                            <div class="tbody">
                                <div class="row tr-row mt-2">
                                    <div class="col-10 pr-0">
                                        {{-- <input required="" type="text" min="1" name="skill[]" id="weight" class="form-control rounded" placeholder="skill"> --}}
                                        <input type="file" name="vessel_img[]" required>
                                    </div>
                                    <div class="col-2 pr-3 text-right">
                                        <div class=" rowfy-addrow btn btn_xxxs btn-success btn-block">+</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                  
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12 m-0 p-0"></div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Region</label>
                        <section class="region_id_par">
                            <select name="region_id[]" id="region_id" class="form-control region_id add_cvs_inp_fields ser_inp_fields21 mb-2" multiple
                                title="Choose"
                                data-size="5"
                                data-selected-text-format="count > 2" 
                                data-live-search="true" >
                                <option value="26">Any</option>
                                @foreach ($region as $row)
                                    <option value="{{ $row->region_id }}">{{ $row->region_name }}</option>
                                @endforeach
                            </select>
                        </section>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Country</label>
                        <section class="country_id_par">
                            <select name="country_id[]" id="country_id" class="form-control country_id add_cvs_inp_fields ser_inp_fields21 mb-2 " multiple
                                title="Choose"
                                data-size="5"
                                data-selected-text-format="count > 2" 
                                data-live-search="true" >
                                <option value="197">Any</option>
                                @foreach ($country as $row)
                                    <option value="{{ $row->country_id }}">{{ $row->country_name }}</option>
                                @endforeach
                            </select>
                        </section>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Port</label>
                        <section class="port_id_par">
                            <select name="port_id[]" id="port_id" class="form-control port_id add_cvs_inp_fields ser_inp_fields21 mb-2" multiple
                                title="Choose"
                                data-size="5"
                                data-selected-text-format="count > 2" 
                                data-live-search="true" >
                                <option value="5638">Any</option>
                                @foreach ($port as $row)
                                    <option value="{{ $row->port_id }}">{{ $row->port_name }}</option>
                                @endforeach
                            </select>
                        </section>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Vessel Type</label>
                        <section class="vessel_type_id_par">
                            <select name="vessel_type_id[]" id="vessel_type_id" class="form-control vessel_type_id" multiple
                                title="Choose"
                                data-size="5"
                                data-selected-text-format="count > 2" 
                                data-live-search="true" 
                                {{-- data-max-options="5"   --}} 
                                {{-- data-actions-box="true"  --}}
                                >
                                <option value="11">Any</option>
                                @foreach ($vessel_type as $row)
                                    <option value="{{ $row->vessel_type_id }}">{{ $row->vessel_type_name }}</option>
                                @endforeach
                            </select>
                        </section>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Date Available:</label>
                        <input type="date" required name="date_available" class="form-control">
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Last Operations Date:</label>
                        <input type="date" required name="operations_date" class="form-control">
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Built Year</label>
                        <input type="number" required name="built_year" class="form-control">
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Last DD:</label>
                        <input type="date" required name="last_dry_docked" class="form-control">
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Last SS</label>
                        <input type="date" required name="last_ss" class="form-control">
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Classification</label>
                        <input type="text" required name="classification" class="form-control">
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <div class="row">
                            <div class="form-group col-8 col-lg-9 col-md-9 col-sm-8 pr-0">
                                <label for="">GRT</label>
                                <input type="number" required name="grt" class="left_round form-control ">
                            </div>
                            <div class="form-group col-4 col-lg-3 col-md-3 col-sm-4 pl-0 pt-2">
                                <select name="grt_unit" id="grt_unit"
                                    class="right_round form-control bg-light mt-4">
                                    <option value="MT">MT</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <div class="row">
                            <div class="form-group col-8 col-lg-9 col-md-9 col-sm-8 pr-0">
                                <label for="">NRT</label>
                                <input type="number" required name="nrt" class="left_round form-control ">
                            </div>
                            <div class="form-group col-4 col-lg-3 col-md-3 col-sm-4 pl-0 pt-2">
                                <select name="nrt_unit" id="nrt_unit"
                                    class="right_round form-control bg-light mt-4">
                                    <option value="MT">MT</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">DWT</label>
                        <input type="number" required name="dwt" class="form-control">
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Light Weight</label>
                        <input type="number" required name="lightweight" class="form-control">
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12 ">
                        <div class="row">
                            <div class="form-group col-8 col-lg-9 col-md-9 col-sm-8 pr-0">
                                <label for="">Speed</label>
                                <input type="number" required name="speed" class="left_round form-control ">
                            </div>
                            <div class="form-group col-4 col-lg-3 col-md-3 col-sm-4 pl-0 pt-2">
                                <select name="speed_unit" id="speed_unit"
                                    class="right_round form-control bg-light mt-4">
                                    <option value="Knots">Knots</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <div class="row">
                            <div class="form-group col-8 col-lg-9 col-md-9 col-sm-8 pr-0">
                                <label for="">Consumption</label>
                                <input type="number" required name="consumption" class="left_round form-control ">
                            </div>
                            <div class="form-group col-4 col-lg-3 col-md-3 col-sm-4 pl-0 pt-2">
                                <select name="consumption_unit" id="consumption_unit"
                                    class="right_round form-control bg-light mt-4">
                                    <option value="Gal/Hr">Gal/Hr</option>
                                    <option value="Ltrs/Hr">Ltrs/Hr</option>
                                </select>
                            </div>
                        </div>
                    </div>                    
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <div class="row">
                            <div class="form-group col-8 col-lg-9 col-md-9 col-sm-8 pr-0">
                                <label for="">LOA</label>
                                <input type="number" required name="loa" class="left_round form-control ">
                            </div>
                            <div class="form-group col-4 col-lg-3 col-md-3 col-sm-4 pl-0 pt-2">
                                <select name="loa_unit" id="loa_unit"
                                    class="right_round form-control bg-light mt-4">
                                    <option value="Meters">Meters</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <div class="row">
                            <div class="form-group col-8 col-lg-9 col-md-9 col-sm-8 pr-0">
                                <label for="">Breadth</label>
                                <input type="number" required name="breadth" class="left_round form-control ">
                            </div>
                            <div class="form-group col-4 col-lg-3 col-md-3 col-sm-4 pl-0 pt-2">
                                <select name="breadth_unit" id="breadth_unit"
                                    class="right_round form-control bg-light mt-4">
                                    <option value="Meters">Meters</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <div class="row">
                            <div class="form-group col-8 col-lg-9 col-md-9 col-sm-8 pr-0">
                                <label for="">Summer Draft</label>
                                <input type="number" required name="summer_draft" class="left_round form-control ">
                            </div>
                            <div class="form-group col-4 col-lg-3 col-md-3 col-sm-4 pl-0 pt-2">
                                <select name="summer_draft_unit" id="summer_draft_unit"
                                    class="right_round form-control bg-light mt-4">
                                    <option value="Meters">Meters</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <div class="row">
                            <div class="form-group col-8 col-lg-9 col-md-9 col-sm-8 pr-0">
                                <label for="">Fresh Water Draft</label>
                                <input type="number" required name="fresh_water_draft" class="left_round form-control ">
                            </div>
                            <div class="form-group col-4 col-lg-3 col-md-3 col-sm-4 pl-0 pt-2">
                                <select name="fresh_water_draft_unit" id="fresh_water_draft_unit"
                                    class="right_round form-control bg-light mt-4">
                                    <option value="Meters">Meters</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12 m-0 p-0"></div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Main Engine</label>
                        <input type="text" required name="main_engine" class="form-control">
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">AUX Engines</label>
                        <input type="text" required name="aux_engines" class="form-control">
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Bow Thruster</label>
                        <input type="text" required name="bow_thruster" class="form-control">
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Gears</label>
                        <input type="text" required name="gears" class="form-control">
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Propellers</label>
                        <input type="text" required name="propellers" class="form-control">
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <div class="row">
                            <div class="form-group col-8 col-lg-9 col-md-9 col-sm-8 pr-0">
                                <label for="">Bunker Capacity</label>
                                <input type="number" required name="bunker_capacity" class="left_round form-control ">
                            </div>
                            <div class="form-group col-4 col-lg-3 col-md-3 col-sm-4 pl-0 pt-2">
                                <select name="bunker_capacity_unit" id="bunker_capacity_unit"
                                    class="right_round form-control bg-light mt-4">
                                    <option value="Gal/Litres">Gal/Litres</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- -->
                    <div class="col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="" class="mb-3">In Service</label><br>
                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" required id="in_service1" name="in_service"
                                value="Yes" />
                            <label class="form-check-label" for="in_service1"> Yes </label>
                        </div>
                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" required id="in_service2" name="in_service"
                                value="No" />
                            <label class="form-check-label" for="in_service2"> No </label>
                        </div>
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <div class="row">
                            <div class="form-group col-8 col-lg-9 col-md-9 col-sm-8 pr-0">
                                <label for="">Price</label>
                                <input type="number" required name="price" class="left_round form-control ">
                            </div>
                            <div class="form-group col-4 col-lg-3 col-md-3 col-sm-4 pl-0 pt-2">
                                <select name="price_unit" id="price_unit"
                                    class="right_round form-control bg-light mt-4">
                                    <option value="USD">USD</option>
                                    <option value="EURO">EURO</option>
                                    <option value="GBP">GBP</option>
                                </select>
                            </div>
                        </div>
                    </div> 
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Cargo Capacity</label>
                        <input type="number" required name="cargo_capacity" class="form-control">
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Holds Hatch</label>
                        <input type="text" required name="holds_hatch" class="form-control">
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Cover Type</label>
                        <input type="text" required name="cover_type" class="form-control">
                    </div>
                    <!-- -->
                    <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                        <label for="">Additional Notes</label>
                        <textarea name="additional_description" id="additional_description" class="form-control" cols="30"
                            rows="3" maxlength = "250"></textarea>
                    </div>

                    <!-- -->
                    <div class="col-12">
                        <hr>
                        <div class="d-flex flex-row justify-content-center">
                            <button type="submit" class="btn_style btn_lg ">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
