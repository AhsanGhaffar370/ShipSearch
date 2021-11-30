@extends('front/layout/layout')

@section('page_title',"Vessel Charter")


@section('container')




<div class="container-fluid bg-color pt-5 pb-5">


    @if (session('front_uid') != '')
        <div class="bg-white">
            <div class="pt-2 pb-2 pl-3">
                <a id="new_ser_req" class="btn_style size13 btn_xxxs" href="#"><i class="fas fa-search"></i> Search Vessel for Charter</a>
                
                <a href={{ route('vessel.add') }} class="btn_style size13 btn_xxxs ml-3 add_new_cvs_val">
                    <i class="fas fa-plus"></i> Add Vessel for Charter
                </a>
            </div>


            {{-- /////////////////////// --}}
            {{-- Search History Start --}}
            {{-- /////////////////////// --}}
            <div class="border table-wrapper-scroll-y my-custom-scrollbar">
                <table id="ser_his_table22"
                    class="table tableFixHead table-condensed table-hover table-responsive-md m-0 ">
                    <thead class="pos_rel">
                        <tr>
                            <th width='1%'><input type="checkbox" name="check_all" id="check_all"></th>
                            <th width="2%">#</th>
                            <th width="10%">Vessel Type</th>
                            <th width="7%">DWT From</th>
                            <th width="7%">DWT To</th>
                            <th width="15%">Charter Type</th>
                            <th width="10%">Laycan Date From</th>
                            <th width="10%">Laycan Date To</th>
                            <th width="10%">Region</th>
                            <th width="13%">Country</th>
                            <th width="20%">Port</th>
                        </tr>
                    </thead>
                    <tbody>








                        {{-- /////////////////////// --}}
                        {{-- Advance Search Form --}}
                        {{-- /////////////////////// --}}
                        <tr id='adv_ser_form' class="pos_rel d_n adv_forms_tr">
                            <form id="search_cvs_form" method="post" action="{{ route('vessel.search_req') }}"
                                class="form-horizontal form-label-left " enctype="multipart/form-data">
                                @csrf
                                <td></td>
                                <td></td>
                                <td class="">
                                    
                                    <section class="vessel_type_id_par">
                                        <select name="vessel_type_id[]" id="vessel_type_id" form="search_cvs_form"
                                            class="vessel_type_id ser_inp_fields" multiple title="Choose" data-size="5"
                                            data-selected-text-format="count > 2" data-live-search="true"
                                            {{-- data-max-options="5" --}} {{-- data-actions-box="true" --}}>
                                            <option value="11">Any</option>
                                            @foreach ($vessel_type as $row)
                                                <option value="{{ $row->vessel_type_id }}">{{ $row->vessel_type_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </section>
                                </td>
                                <td class="">
                                    <section class="vessel_type_id_par">
                                        <input type="number" required="" step="5000" name="dwt_from" class="ser_inp_fields left_round ">
                                    </section>
                                </td>
                                <td class="">
                                    <section class="vessel_type_id_par">
                                        <input type="number" required="" step="5000" name="dwt_to" class="ser_inp_fields left_round ">
                                    </section>
                                </td>
                                <!-- -->
                                <td class="">
                                    
                                    <section class="charter_type_id_par">
                                        <select name="charter_type_id[]" id="charter_type_id" form="search_cvs_form"
                                            class="charter_type_id ser_inp_fields" multiple title="Choose" data-size="5"
                                            data-selected-text-format="count > 2" data-live-search="true"
                                            {{-- data-max-options="5" --}} {{-- data-actions-box="true" --}}>
                                            <option value="5">Any</option>
                                            @foreach ($charter_type as $row)
                                                <option value="{{ $row->charter_type_id }}">{{ $row->charter_type_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </section>
                                </td>
                                <!-- -->
                                <td class="">
                                    
                                    <section class="laycan_date_from_par">
                                        <input type="date" required form="search_cvs_form" class=" from_date"
                                            id="laycan_date_from" name="laycan_date_from" placeholder="Laycan Date From" />
                                    </section>
                                </td>
                                <!-- -->
                                <td class="">
                                    
                                    <section class="laycan_date_to_par">
                                        <input type="date" required form="search_cvs_form" class=" to_date" id="laycan_date_to"
                                            name="laycan_date_to" placeholder="Laycan Date To" />
                                    </section>
                                </td>
                                <!-- -->
                                <td class="">
                                    
                                    <section class="region_id_par">
                                        <select name="region_id[]" id="region_id" form="search_cvs_form"
                                            class="region_id ser_inp_fields" multiple title="Choose" data-size="5"
                                            data-selected-text-format="count > 2" data-live-search="true">
                                            <option value="26">Any</option>
                                            @foreach ($region as $row)
                                                <option value="{{ $row->region_id }}">{{ $row->region_name }}</option>
                                            @endforeach
                                        </select>
                                    </section>
                                </td>
                                <!-- -->
                                <td class=" ">
                                    
                                    <section class="country_id_par">
                                        <select name="country_id[]" id="country_id" form="search_cvs_form"
                                            class="country_id ser_inp_fields" multiple title="Choose" data-size="5"
                                            data-selected-text-format="count > 2" data-live-search="true">
                                            <option value="197">Any</option>
                                            @foreach ($country as $row)
                                                <option value="{{ $row->country_id }}">{{ $row->country_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </section>
                                </td>
                                <!-- -->
                                <td class="">
                                    
                                    <section class="port_id_par">
                                        <select name="port_id[]" id="port_id" form="search_cvs_form"
                                            class="port_id ser_inp_fields" multiple title="Choose" data-size="5"
                                            data-selected-text-format="count > 2" data-live-search="true">
                                            <option value="5638">Any</option>
                                            @foreach ($port as $row)
                                                <option value="{{ $row->port_id }}">{{ $row->port_name }}</option>
                                            @endforeach
                                        </select>
                                    </section>
                                    <!-- Submit buttons -->
                                    <div class="text-right">
                                        <button type="submit" class=" btn bg_gd btn-sm size15 text-white pt-1 pb-1 mr-3"> 
                                            <i class="fas fa-search"></i> Search
                                        </button>
                                        <a href="#" id="close_ser" class="btn bg_grey text-dark size15 pt-1 pb-1 mr-1"> 
                                            <i class="fas fa-times"></i>
                                        </a>
                                    </div>
                                </td>
                                <!-- -->
                            </form>
                        </tr>












                        {{-- /////////////////////// --}}
                        {{-- Search History data --}}
                        {{-- /////////////////////// --}}
                        @foreach ($ser_data as $row)
                            <tr id="ser_hist_rec_{{ $row->id }}" class="ser_hist_rec_each ves_ser_hist_rec_req_each ">
                                <td>
                                    <input type="checkbox" name="delete_selected_rec[]" class="mt-1" value="{{ $row->id }}">
                                </td>
                                <td id="id-{{ $row->id }}">
                                    {{ $row->id }}
                                </td>
                                {{-- <td id="vesseltype-{{ $row->id }}">
                                    <?php //echo str_replace(',', ',<br>', $row->vessel_type_id); ?>
                                </td> --}}
                                <td class="" id="vesseltype-{{ $row->id }}">
                                    @foreach ($row->vesseltype as $ser_row12)
                                        {{ optional($ser_row12->SVvesseltype)->vessel_type_name }}
                                        @if($row->vesseltype[count($row->vesseltype)-1]->SVvesseltype->vessel_type_name!=$ser_row12->SVvesseltype->vessel_type_name)
                                            ,<br>
                                        @endif
                                    @endforeach
                                </td>
                                <td class="" id="dwtfrom-{{ $row->id }}">
                                   {{$row->dwt_from}}
                                </td>
                                <td class="" id="dwtto-{{ $row->id }}">
                                    {{$row->dwt_to}}
                                </td>
                                {{-- <td id="chartertype-{{ $row->id }}">
                                    <?php //echo str_replace(',', ',<br>', $row->charter_type_id); ?>
                                </td> --}}
                                <td class="" id="chartertype-{{ $row->id }}">
                                    @foreach ($row->chartertype as $ser_row12)
                                        {{ optional($ser_row12->SVchartertype)->charter_type_name }}
                                        @if($row->chartertype[count($row->chartertype)-1]->SVchartertype->charter_type_name!=$ser_row12->SVchartertype->charter_type_name)
                                            ,<br>
                                        @endif
                                    @endforeach
                                </td>
                                <td id="laycan_from-{{ $row->id }}">
                                    {{-- {{ date('d-M-Y', strtotime($row->laycan_date_from)) }} --}}
                                    {{ $row->laycan_date_from }}
                                </td>
                                <td id="laycan_to-{{ $row->id }}">
                                    {{-- {{ date('d-M-Y', strtotime($row->laycan_date_to)) }} --}}
                                    {{ $row->laycan_date_to }}
                                </td>
                                {{-- <td class="{{ $row->region_id }}" id="region-{{ $row->id }}">
                                    <?php //echo str_replace(',', ',<br>', $row->region_id); ?>
                                </td> --}}
                                <td class="" id="region-{{ $row->id }}">
                                    @foreach ($row->region as $ser_row12)
                                        {{ optional($ser_row12->SVregion)->region_name }}
                                        @if($row->region[count($row->region)-1]->SVregion->region_name!=$ser_row12->SVregion->region_name)
                                            ,<br>
                                        @endif
                                    @endforeach
                                </td>
                                {{-- <td class="{{ $row->country_id }}" id="country-{{ $row->id }}">
                                    <?php //echo str_replace(',', ',<br>', $row->country_id); ?>
                                </td> --}}
                                <td class="" id="country-{{ $row->id }}">
                                    @foreach ($row->country as $ser_row12)
                                        {{ optional($ser_row12->SVcountry)->country_name }}
                                        @if($row->country[count($row->country)-1]->SVcountry->country_name!=$ser_row12->SVcountry->country_name)
                                            ,<br>
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    {{-- <span class="{{ $row->port_id }}" id="port-{{ $row->id }}">
                                        <?php //echo str_replace(',', ',<br>', $row->port_id); ?>
                                    </span> --}}
                                    <span class="" id="port-{{ $row->id }}">
                                        @foreach ($row->port as $ser_row12)
                                            {{ optional($ser_row12->SVport)->port_name }}
                                            @if($row->port[count($row->port)-1]->SVport->port_name!=$ser_row12->SVport->port_name)
                                                ,<br>
                                            @endif
                                        @endforeach
                                    </span>
                                    <div class="text-right edit_del_btns edit_del_btn_{{ $row->id }} d_n">
                                        <a href="{{ $row->id }}" id="ves_show_update_ser_hist_form_each" 
                                        class="btn btn-info btn-sm size13 text-white pt-1 pb-1 mr-3"> 
                                            <i href="{{ $row->id }}" class="fas fa-edit"></i> EDIT
                                        </a>
                                        <a href="{{ $row->id }}" id="ves_delete_rec" class="btn btn-danger btn-sm size13 text-white pt-1 pb-1"> 
                                            <i href="{{ $row->id }}" class="fas fa-trash-alt"></i> DELETE
                                        </a>
                                    </div>
                                </td>
                            </tr>








                            
                            {{-- /////////////////////// --}}
                            {{-- advance search for each record --}}
                            {{-- /////////////////////// --}}
                            <tr id='adv_ser_form_each_{{ $row->id }}' class="adv_ser_form_each pos_rel d_n adv_forms_tr">
                                <form id="search_cvs_form_{{ $row->id }}" class="form-horizontal form-label-left ">
                                    @csrf
                                    <td></td>
                                    <td></td>
                                    <td class="">
                                        <section class="vessel_type_id_par_{{ $row->id }}">
                                            <select name="vessel_type_id[]" id="vessel_type_id_{{ $row->id }}" form="search_cvs_form_{{ $row->id }}"
                                                class="vessel_type_id ser_inp_fields_each" multiple title="Choose" data-size="5"
                                                data-selected-text-format="count > 2" data-live-search="true">
                                                <option value="11">Any</option>
                                                @foreach ($vessel_type as $row1)
                                                    <option value="{{ $row1->vessel_type_id }}">
                                                        {{ $row1->vessel_type_name }}</option>
                                                @endforeach
                                            </select>
                                        </section>
                                    </td>
                                    <td class="">
                                        asd
                                        <section class="dwt_from_{{ $row->id }}">
                                            <input type="number" value="{{ $row->dwt_from }}" step="500" id="dwt_from_{{ $row->id }}" name="dwt_from" class="ser_inp_fields left_round ">
                                        </section>
                                    </td>
                                    <td class="">
                                        <section class="dwt_to_{{ $row->id }}">
                                            <section class="dwt_to_{{ $row->id }}">
                                                <input type="number" value="{{ $row->dwt_to }}" step="500" id="dwt_to_{{ $row->id }}"  name="dwt_to" class="ser_inp_fields left_round ">
                                            </section>
                                        </section>
                                    </td>
                                    <!-- -->
                                    <td class="">
                                        <section class="charter_type_id_par_{{ $row->id }}">
                                            <select name="charter_type_id[]" id="charter_type_id_{{ $row->id }}" form="search_cvs_form_{{ $row->id }}"
                                                class="charter_type_id ser_inp_fields_each" multiple title="Choose" data-size="5"
                                                data-selected-text-format="count > 2" data-live-search="true">
                                                <option value="5">Any</option>
                                                @foreach ($charter_type as $row1)
                                                    <option value="{{ $row1->charter_type_id }}">
                                                        {{ $row1->charter_type_name }}</option>
                                                @endforeach
                                            </select>
                                        </section>
                                    </td>
                                    <!-- -->
                                    <td class="">
                                        
                                        <section class="laycan_date_from_par_{{ $row->id }}">
                                            <input type="date" required form="search_cvs_form_{{ $row->id }}" class=" from_date"
                                                id="laycan_date_from_{{ $row->id }}" name="laycan_date_from"
                                                placeholder="Laycan Date From" />
                                        </section>
                                    </td>
                                    <!-- -->
                                    <td class="">
                                        
                                        <section class="laycan_date_to_par_{{ $row->id }}">
                                            <input type="date" required form="search_cvs_form_{{ $row->id }}" class=" to_date"
                                                id="laycan_date_to_{{ $row->id }}" name="laycan_date_to" placeholder="Laycan Date To" />
                                        </section>
                                    </td>
                                    <!-- -->
                                    <td class=" ">
                                        
                                        <section class="region_id_par_{{ $row->id }}">
                                            <select name="region_id[]" id="region_id_{{ $row->id }}"
                                                form="search_cvs_form_{{ $row->id }}" class="region_id ser_inp_fields_each" multiple title="Choose"
                                                data-size="5" data-selected-text-format="count > 2" data-live-search="true">
                                                <option value="26">Any</option>
                                                @foreach ($region as $row1)
                                                    <option value="{{ $row1->region_id }}">{{ $row1->region_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </section>
                                    </td>
                                    <!-- -->
                                    <td class=" ">
                                        
                                        <section class="country_id_par_{{ $row->id }}">
                                            <select name="country_id[]" id="country_id_{{ $row->id }}"
                                                form="search_cvs_form_{{ $row->id }}" class="country_id ser_inp_fields_each" multiple title="Choose"
                                                data-size="5" data-selected-text-format="count > 2" data-live-search="true">
                                                <option value="197">Any</option>
                                                @foreach ($country as $row1)
                                                    <option value="{{ $row1->country_id }}">{{ $row1->country_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </section>
                                    </td>
                                    <!-- -->
                                    <td class="">
                                        
                                        <section class="port_id_par_{{ $row->id }}">
                                            <select name="port_id[]" id="port_id_{{ $row->id }}" form="search_cvs_form_{{ $row->id }}"
                                                class="port_id ser_inp_fields_each" multiple title="Choose" data-size="5"
                                                data-selected-text-format="count > 2" data-live-search="true">
                                                <option value="5638">Any</option>
                                                @foreach ($port as $row1)
                                                    <option value="{{ $row1->port_id }}">{{ $row1->port_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </section>
                                        <div class="text-right">
                                            <button type="button" id="form_{{$row->id}}" 
                                            class="ves_req_update_ser_hist_each btn bg_gd btn-sm size15 text-white pt-1 pb-1 mr-3"> 
                                                <i class="fas fa-search"></i> Search
                                            </button>
                                            <a href="{{ $row->id }}" id="close_ser_each_{{ $row->id }}"
                                            class="btn bg_grey text-dark size15 pt-1 pb-1 mr-1 close_ser_each"> 
                                                <i href="{{ $row->id }}" class="fas fa-times"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <!-- -->
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pt-2 pb-2 pr-3 d-flex justify-content-end">
                <a href="#" id="delete_popup" class="btn_style size13 btn_xxxs">
                    Delete
                </a>
            </div>

            <div id="show_delete_popup" class="text-right rounded" style="display: none;">
                {{-- <a href="#" id="close_delete_popup" style="font-size:20px; position: inherit;">&times;</a> --}}
                <p class="size20 cl_gd text-center" style="margin-top: 5px">Are you sure want to delete selected search</p>
                <div class="pt-3 pb-2 text-center">
                    {{-- <a href="#" id="car_delete_all" class="del_sel_all_ser_hist btn_style size13 btn_xxxs text-white mt-1">
                        Delete All Searches
                    </a> --}}
                    <a href="#" id="car_delete_selected" class="del_sel_all_ser_hist btn_style size13 btn_xxxs text-white mt-1">
                        Yes
                    </a>
                    <a href="#" id="car_delete_selected_no" class="btn_style size13 btn_xxxs text-white mt-1">
                        No
                    </a>
                </div>
            </div>
        </div>
    @endif










        
    {{-- /////////////////////// --}}
    {{-- Vessel Table Records --}}
    {{-- /////////////////////// --}}
    <div class="bg-white mt-2 pt-2">
        <span id="total_rec_found" class="font-weight-bold pt-3 pl-2"> {{ sizeof($data) }} TOTAL RESULTS</span>
        
        <a href={{ route('vessel.view') }} class="btn btn_style bg_gd ml-3 pl-2 pr-2"><i class="fas fa-sync-alt"></i></a>

        <div class="table-wrapper-scroll-y my-custom-scrollbar mt-3">
            <div class="border">
                <table id="cvs_table"
                    class="table tableFixHead table-condensed table-hover table-responsive-md m-0 ">
                    <thead>
                        <tr>
                            <th width="2%">ID</th>
                            <th width="8%">Vessel Name</th>
                            <th width="7%">Vessel Type</th>
                            <th width="7%">Charter Type</th>
                            <th width="8%">Laycan Date From</th>
                            <th width="8%">Laycan Date To</th>
                            <th width="10%">Region</th>
                            <th width="10%">Country</th>
                            <th width="10%">Port</th>
                            <th width="6%">Posted on</th>

                            @if(session('front_uid')!="")
                                    <th width="2%">Details</th>
                            @endif
                        </tr>
                    </thead>

                    <tbody id="all_records">
                        @if (sizeof($data) < 1)
                            <tr class="">
                                <td colspan="11"><i>No exact results. Try expanding your filters</i></td>
                            </tr>
                        @else
                            @foreach ($data as $row)
                                <tr class="">
                                    <td width="5%">
                                        <div class="td_h">
                                            {{$row->ref_no}}
                                        </div>
                                        {{--  --}}
                                        <div class="show_details show_details_{{ $row->vessel_id }} tr_bg_cl d_n">
                                            <p class="b7 mb-0">Built Year:</p>
                                            <p class="">{{ $row->built_year }}</p>
                                            <p class="b7 mb-0">DWT:</p>
                                            <p class="">{{ $row->dwt }}</p>
                                            <p class="b7 mb-0">DWCC</p>
                                            <p class="">{{ $row->dwcc }}</p>
                                        </div>
                                    </td>
                                    <td width="8%" >
                                        <div class="td_h">
                                            {{$row->vessel_name}}
                                        </div>
                                        {{--  --}}
                                        <div class="show_details show_details_{{ $row->vessel_id }} tr_bg_cl d_n">
                                            <p class="b7 mb-0">IMO Number:</p>
                                            <p class="">{{ $row->imo_number }}</p>
                                            <p class="b7 mb-0">Call Sign:</p>
                                            <p class="">{{ $row->call_sign }}</p>
                                            <p class="b7 mb-0">Speed Blast:</p>
                                            <p class="">{{ $row->speed_ballast }}</p>
                                        </div>
                                    </td>
                                    <td width="8%" >
                                        <div class="td_h">
                                            {{-- <p class=""><?php //echo str_replace(',', ',<br>', $row->vessel_type_id); ?></p> --}}
                                            <p>
                                                @foreach ($row->vesseltype as $row12)
                                                    {{ optional($row12->Vvesseltype)->vessel_type_name }}
                                                    @if($row->vesseltype[count($row->vesseltype)-1]->Vvesseltype->vessel_type_name!=$row12->Vvesseltype->vessel_type_name)
                                                        ,<br>
                                                    @endif
                                                @endforeach
                                            </p>
                                        </div>
                                        {{--  --}}
                                        <div class="show_details show_details_{{ $row->vessel_id }} tr_bg_cl d_n">
                                            <p class="b7 mb-0">Speed Laden</p>
                                            <p class="">{{ $row->speed_laden }}</p>
                                            <p class="b7 mb-0">Gross Tonnage:</p>
                                            <p class="">{{ $row->gross_tonnage }}</p>
                                            <p class="b7 mb-0">Net Tonnage:</p>
                                            <p class="">{{ $row->net_tonnage }}</p>
                                        </div>
                                    </td>
                                    <td width="8%" >
                                        <div class="td_h">
                                            {{-- <p class=""><?php //echo str_replace(',', ',<br>', $row->charter_type_id); ?></p> --}}
                                            <p>
                                                @foreach ($row->chartertype as $row12)
                                                    {{ optional($row12->Vchartertype)->charter_type_name }}
                                                    @if($row->chartertype[count($row->chartertype)-1]->Vchartertype->charter_type_name!=$row12->Vchartertype->charter_type_name)
                                                        ,<br>
                                                    @endif
                                                @endforeach
                                            </p>
                                        </div>
                                        {{--  --}}
                                        <div class="show_details show_details_{{ $row->vessel_id }} tr_bg_cl d_n">
                                            <p class="b7 mb-0">LOA Max:</p>
                                            <p class="">{{ $row->loa_max }}</p>
                                            <p class="b7 mb-0">Beam Max:</p>
                                            <p class="">{{ $row->beam_max }}</p>
                                            <p class="b7 mb-0">Summer Draft:</p>
                                            <p class="">{{ $row->summer_draft }}</p>
                                        </div>
                                    </td>
                                    <td width="10%" >
                                        <div class="td_h">
                                            {{-- {{ date('d-M-Y', strtotime($row->laycan_date_from)) }} --}}
                                            {{ $row->laycan_date_from }}
                                        </div>
                                        {{--  --}}
                                        <div class="show_details show_details_{{ $row->vessel_id }} tr_bg_cl d_n">
                                            <p class="b7 mb-0">Fresh Water Draft:</p>
                                            <p class="">{{ $row->fresh_water_draft }}</p>
                                            <p class="b7 mb-0">Grain Capacity:</p>
                                            <p class="">{{ $row->grain_capacity }}</p>
                                            <p class="b7 mb-0">Bale Capacity:</p>
                                            <p class="">{{ $row->bale_capacity }}</p>
                                        </div>
                                    </td>
                                    <td width="15%" >
                                        <div class="td_h">
                                            {{-- {{ date('d-M-Y', strtotime($row->laycan_date_to)) }} --}}
                                            {{ $row->laycan_date_to }}
                                        </div>
                                        {{--  --}}
                                        <div class="show_details show_details_{{ $row->vessel_id }} tr_bg_cl d_n">
                                            <p class="b7 mb-0">Container Capacity 20FT:</p>
                                            <p class="">{{ $row->container_capacity_20ft }}</p>
                                            <p class="b7 mb-0">Container Capacity 40FT:</p>
                                            <p class="">{{ $row->container_capacity_40ft }}</p>
                                            <p class="b7 mb-0">Container Capacity 4CH:</p>
                                            <p class="">{{ $row->container_capacity_40ch }}</p>
                                        </div>
                                    </td>
                                    <td width="15%" >
                                        <div class="td_h">
                                            {{-- <p class=""><?php //echo str_replace(',', ',<br>', $row->region_id); ?></p> --}}
                                            <p>
                                                @foreach ($row->region as $row12)
                                                    {{ optional($row12->Vregion)->region_name }}
                                                    @if($row->region[count($row->region)-1]->Vregion->region_name!=$row12->Vregion->region_name)
                                                        ,<br>
                                                    @endif
                                                @endforeach
                                            </p>
                                        </div>
                                        {{--  --}}
                                        <div class="show_details show_details_{{ $row->vessel_id }} tr_bg_cl d_n">
                                            <p class="b7 mb-0">IFO Consumption Empty:</p>
                                            <p class="">{{ $row->ifo_consumption_empty }}</p>
                                            <p class="b7 mb-0">IFO Consumption Laden:</p>
                                            <p class="">{{ $row->ifo_consumption_laden }}</p>
                                            <p class="b7 mb-0">IFO Consumption Port:</p>
                                            <p class="">{{ $row->ifo_consumption_port }}</p>
                                        </div>
                                    </td>
                                    <td width="15%" >
                                        <div class="td_h">
                                            {{-- <p class=""><?php //echo str_replace(',', ',<br>', $row->country_id); ?></p> --}}
                                            <p>
                                                @foreach ($row->country as $row12)
                                                    {{ optional($row12->Vcountry)->country_name }}
                                                    @if($row->country[count($row->country)-1]->Vcountry->country_name!=$row12->Vcountry->country_name)
                                                        ,<br>
                                                    @endif
                                                @endforeach
                                            </p>
                                        </div>
                                        {{--  --}}
                                        <div class="show_details show_details_{{ $row->vessel_id }} tr_bg_cl d_n">
                                            <p class="b7 mb-0">MGO Consumption Empty:</p>
                                            <p class="">{{ $row->mgo_consumption_empty }}</p>
                                            <p class="b7 mb-0">MGO Consumption Laden:</p>
                                            <p class="">{{ $row->mgo_consumption_laden }}</p>
                                            <p class="b7 mb-0">MGO Consumption Port:</p>
                                            <p class="">{{ $row->mgo_consumption_port }}</p>
                                        </div>
                                    </td>
                                    <td width="10%" >
                                        <div class="td_h">
                                            {{-- <p class=""><?php //echo str_replace(',', ',<br>', $row->port_id); ?></p> --}}
                                            <p>
                                                @foreach ($row->port as $row12)
                                                    {{ optional($row12->Vport)->port_name }}
                                                    @if($row->port[count($row->port)-1]->Vport->port_name!=$row12->Vport->port_name)
                                                        ,<br>
                                                    @endif
                                                @endforeach
                                            </p>
                                        </div>
                                        {{--  --}}
                                        <div class="show_details show_details_{{ $row->vessel_id }} tr_bg_cl d_n">
                                            <p class="b7 mb-0">Lane Meters:</p>
                                            <p class="">{{ $row->lane_meters }}</p>
                                            <p class="b7 mb-0">P I Club:</p>
                                            <p class="">{{ $row->p_i_club }}</p>
                                            <p class="b7 mb-0">Classed By:</p>
                                            <p class="">{{ $row->classed_by }}</p>
                                        </div>
                                    </td>
                                    <td width="15%" >
                                        <div class="td_h">
                                            {{explode(" ",$row->created_at)[0]}}
                                        </div>
                                        {{--  --}}
                                        <div class="show_details show_details_{{ $row->vessel_id }} tr_bg_cl d_n">
                                            <p class="b7 mb-0">Additional Info:</p>
                                            <p class="">{{ $row->additional_info }}</p>
                                        </div>
                                    </td>

                                    @if (session('front_uid') != '')
                                        <td width="10%" class="text-center">
                                            <a href='{{ $row->vessel_id }}'
                                                class="show_detail_btn show_detail_btn_{{ $row->vessel_id }}"><i
                                                    class="fas fa-eye fa-2x"></i></a>
                                            <a href='{{ $row->vessel_id }}'
                                                class="hide_detail_btn hide_detail_btn_{{ $row->vessel_id }}"><i
                                                    class="fas fa-eye-slash fa-2x"></i></a>
                                        </td>
                                    @endif

                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


{{-- Access Denied message --}}
{{-- <div id="dialog" class="text-right rounded p-1 d_n">
    <p class="size20 text-left text-white bg-danger p-2 rounded">Access Denied</p>
    <p class="text-left">
        Please <a href={{ route('login') }} class="btn btn-info text=white btn-sm">Login</a> to do this action.
    </p>
    <br>
    <hr>
    <button id="close_dialog" class="btn btn-danger">Close</button>
</div> --}}

@endsection