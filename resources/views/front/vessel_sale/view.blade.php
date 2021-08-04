@extends('front/layout/layout')

@section('page_title',"Vessel Sale/Purchase")


@section('container')




<div class="container-fluid bg-color pt-5 pb-5">


    @if (session('front_uid') != '')
        <div class="bg-white">
            <div class="pt-2 pb-2 pl-3">
                <a id="new_ser_req" class="btn btn_style bg_gr" href="#"><i class="fas fa-search"></i> New Load Search</a>
                <a href={{ route('vessel_sale.add') }} id="{{ session('front_uname') }}" class="btn btn_style bg_bl ml-3 add_rec_validation"> 
                    <i class="fas fa-plus"></i> Add New Vessel Sale
                </a>
            </div>


            {{-- /////////////////////// --}}
            {{-- Search History Start --}}
            {{-- /////////////////////// --}}
            <div class="border table-wrapper-scroll-y my-custom-scrollbar">
                <table id="ser_his_table22"
                    class="table tableFixHead table-condensed table-hover table-responsive-md m-0 ">
                    <thead class="pos_rel z_ind999">
                        <tr>
                            <th width="2%">#</th>
                            <th width="15%">Vessel Type</th>
                            <th width="15%">Charter Type</th>
                            <th width="10%">Laycan Date From</th>
                            <th width="10%">Laycan Date To</th>
                            <th width="15%">Region</th>
                            <th width="15%">Country</th>
                            <th width="20%">Port</th>
                        </tr>
                    </thead>
                    <tbody>








                        {{-- /////////////////////// --}}
                        {{-- Advance Search Form --}}
                        {{-- /////////////////////// --}}
                        <tr id='adv_ser_form' class="pos_rel d_n adv_forms_tr">
                            <form id="search_vessel" method="post" action="{{ route('vessel.search_req') }}"
                                class="form-horizontal form-label-left " enctype="multipart/form-data">
                                @csrf
                                <td></td>
                                <td class="">
                                    <select name="vessel_type_id[]" id="vessel_type_id" form="search_vessel"
                                        class="vessel_type_id ser_inp_fields" multiple title="Choose" data-size="5"
                                        data-selected-text-format="count > 2" data-live-search="true"
                                        {{-- data-max-options="5" --}} {{-- data-actions-box="true" --}}>
                                        @foreach ($vessel_type as $row)
                                            <option value="{{ $row->vessel_type_name }}">{{ $row->vessel_type_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <!-- -->
                                <td class="">
                                    <select name="charter_type_id[]" id="charter_type_id" form="search_vessel"
                                        class="charter_type_id ser_inp_fields" multiple title="Choose" data-size="5"
                                        data-selected-text-format="count > 2" data-live-search="true"
                                        {{-- data-max-options="5" --}} {{-- data-actions-box="true" --}}>
                                        @foreach ($charter_type as $row)
                                            <option value="{{ $row->charter_type_name }}">{{ $row->charter_type_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <!-- -->
                                <td class="">
                                    <input type="date" required form="search_vessel" class=" from_date"
                                        id="laycan_date_from" name="laycan_date_from" placeholder="Laycan Date From" />
                                </td>
                                <!-- -->
                                <td class="">
                                    <input type="date" required form="search_vessel" class=" to_date" id="laycan_date_to"
                                        name="laycan_date_to" placeholder="Laycan Date To" />
                                </td>
                                <!-- -->
                                <td class="">
                                    <select name="region_id[]" id="region_id" form="search_vessel"
                                        class="region_id ser_inp_fields" multiple title="Choose" data-size="5"
                                        data-selected-text-format="count > 2" data-live-search="true">
                                        @foreach ($region as $row)
                                            <option value="{{ $row->region_name }}">{{ $row->region_name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <!-- -->
                                <td class=" ">
                                    <select name="country_id[]" id="country_id" form="search_vessel"
                                        class="country_id ser_inp_fields" multiple title="Choose" data-size="5"
                                        data-selected-text-format="count > 2" data-live-search="true">
                                        @foreach ($country as $row)
                                            <option value="{{ $row->country_name }}">{{ $row->country_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <!-- -->
                                <td class="">
                                    <select name="port_id[]" id="port_id" form="search_vessel"
                                        class="port_id ser_inp_fields" multiple title="Choose" data-size="5"
                                        data-selected-text-format="count > 2" data-live-search="true">
                                        @foreach ($port as $row)
                                            <option value="{{ $row->port_name }}">{{ $row->port_name }}</option>
                                        @endforeach
                                    </select>
                                    <!-- Submit buttons -->
                                    <div class="text-right">
                                        <button type="submit" class="btn bg_bl text-white size15 pt-1 pb-1 mr-3"> 
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
                                <td id="id-{{ $row->id }}">
                                    {{ $row->id }}
                                </td>
                                <td id="vesseltype-{{ $row->id }}">
                                    <?php echo str_replace(',', ',<br>', $row->vessel_type_id); ?>
                                </td>
                                <td id="chartertype-{{ $row->id }}">
                                    <?php echo str_replace(',', ',<br>', $row->charter_type_id); ?>
                                </td>
                                <td id="laycan_from-{{ $row->id }}">
                                    {{ date('d-M-Y', strtotime($row->laycan_date_from)) }}
                                </td>
                                <td id="laycan_to-{{ $row->id }}">
                                    {{ date('d-M-Y', strtotime($row->laycan_date_to)) }}
                                </td>
                                <td class="{{ $row->region_id }}" id="region-{{ $row->id }}">
                                    <?php echo str_replace(',', ',<br>', $row->region_id); ?>
                                </td>
                                <td class="{{ $row->country_id }}" id="country-{{ $row->id }}">
                                    <?php echo str_replace(',', ',<br>', $row->country_id); ?>
                                </td>
                                <td>
                                    <span class="{{ $row->port_id }}" id="port-{{ $row->id }}">
                                        <?php echo str_replace(',', ',<br>', $row->port_id); ?>
                                    </span>
                                    <div class="text-right edit_del_btns edit_del_btn_{{ $row->id }} d_n">
                                        <a href="{{ $row->id }}" id="ves_show_update_ser_hist_form_each" 
                                        class="btn bg_bl btn-sm size13 text-white pt-0 pb-0 mr-3"> 
                                            <i href="{{ $row->id }}" class="fas fa-edit"></i> EDIT
                                        </a>
                                        <a href="{{ $row->id }}" id="ves_delete_rec" class="btn btn-danger btn-sm size13 text-white pt-0 pb-0"> 
                                            <i href="{{ $row->id }}" class="fas fa-trash-alt"></i> DELETE
                                        </a>
                                    </div>
                                </td>
                            </tr>








                            
                            {{-- /////////////////////// --}}
                            {{-- advance search for each record --}}
                            {{-- /////////////////////// --}}
                            <tr id='adv_ser_form_each_{{ $row->id }}' class="adv_ser_form_each pos_rel d_n adv_forms_tr">
                                <form id="search_vessel_{{ $row->id }}" class="form-horizontal form-label-left ">
                                    @csrf
                                    <td></td>
                                    <td class="">
                                        <select name="vessel_type_id[]" id="vessel_type_id_{{ $row->id }}" form="search_vessel_{{ $row->id }}"
                                            class="vessel_type_id ser_inp_fields" multiple title="Choose" data-size="5"
                                            data-selected-text-format="count > 2" data-live-search="true">
                                            @foreach ($vessel_type as $row1)
                                                <option value="{{ $row1->vessel_type_name }}">
                                                    {{ $row1->vessel_type_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <!-- -->
                                    <td class="">
                                        <select name="charter_type_id[]" id="charter_type_id_{{ $row->id }}" form="search_vessel_{{ $row->id }}"
                                            class="charter_type_id ser_inp_fields" multiple title="Choose" data-size="5"
                                            data-selected-text-format="count > 2" data-live-search="true">
                                            @foreach ($charter_type as $row1)
                                                <option value="{{ $row1->charter_type_name }}">
                                                    {{ $row1->charter_type_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <!-- -->
                                    <td class="">
                                        <input type="date" required form="search_vessel_{{ $row->id }}" class=" from_date"
                                            id="laycan_date_from_{{ $row->id }}" name="laycan_date_from"
                                            placeholder="Laycan Date From" />
                                    </td>
                                    <!-- -->
                                    <td class="">
                                        <input type="date" required form="search_vessel_{{ $row->id }}" class=" to_date"
                                            id="laycan_date_to_{{ $row->id }}" name="laycan_date_to" placeholder="Laycan Date To" />
                                    </td>
                                    <!-- -->
                                    <td class=" ">
                                        <select name="region_id[]" id="region_id_{{ $row->id }}"
                                            form="search_vessel_{{ $row->id }}" class="region_id ser_inp_fields" multiple title="Choose"
                                            data-size="5" data-selected-text-format="count > 2" data-live-search="true">
                                            @foreach ($region as $row1)
                                                <option value="{{ $row1->region_name }}">{{ $row1->region_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <!-- -->
                                    <td class=" ">
                                        <select name="country_id[]" id="country_id_{{ $row->id }}"
                                            form="search_vessel_{{ $row->id }}" class="country_id ser_inp_fields" multiple title="Choose"
                                            data-size="5" data-selected-text-format="count > 2" data-live-search="true">
                                            @foreach ($country as $row1)
                                                <option value="{{ $row1->country_name }}">{{ $row1->country_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <!-- -->
                                    <td class="">
                                        <select name="port_id[]" id="port_id_{{ $row->id }}" form="search_vessel_{{ $row->id }}"
                                            class="port_id ser_inp_fields" multiple title="Choose" data-size="5"
                                            data-selected-text-format="count > 2" data-live-search="true">
                                            @foreach ($port as $row1)
                                                <option value="{{ $row1->port_name }}">{{ $row1->port_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="text-right">
                                            <button type="button" id="form_{{$row->id}}" 
                                            class="ves_req_update_ser_hist_each btn bg_bl text-white size15 pt-1 pb-1 mr-3"> 
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
        </div>
    @endif










        
    {{-- /////////////////////// --}}
    {{-- Vessel Table Records --}}
    {{-- /////////////////////// --}}
    <div class="bg-white mt-2 pt-2">
        <span id="total_rec_found" class="font-weight-bold pt-3 pl-2"> {{ sizeof($data) }} TOTAL RESULTS</span>
        
        <a href={{ route('vessel.view') }} class="btn btn_style bg_bl ml-3 pl-2 pr-2"><i class="fas fa-sync-alt"></i></a>

        <div class="table-wrapper-scroll-y my-custom-scrollbar mt-3">
            <div class="border">
                <table
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
                                    <td >{{$row->ref_no}}</td>
                                    <td >{{$row->vessel_name}}</td>
                                    <td ><p class=""><?php echo str_replace(',', ',<br>', $row->vessel_type_id); ?></p></td>
                                    <td ><p class=""><?php echo str_replace(',', ',<br>', $row->charter_type_id); ?></p></td>
                                    <td >{{date("d-M-Y", strtotime($row->laycan_date_from))}}</td>
                                    <td >{{date("d-M-Y", strtotime($row->laycan_date_to))}}</td>
                                    <td ><p class=""><?php echo str_replace(',', ',<br>', $row->region_id); ?></p></td>
                                    <td ><p class=""><?php echo str_replace(',', ',<br>', $row->country_id); ?></p></td>
                                    <td ><p class=""><?php echo str_replace(',', ',<br>', $row->port_id); ?></p></td>
                                    <td >{{explode(" ",$row->created_at)[0]}}</td>

                                    @if (session('front_uid') != '')
                                        <td class="text-center">
                                            <a href='{{ $row->vessel_id }}'
                                                class="show_detail_btn show_detail_btn_{{ $row->vessel_id }}"><i
                                                    class="fas fa-eye fa-2x"></i></a>
                                            <a href='{{ $row->vessel_id }}'
                                                class="hide_detail_btn hide_detail_btn_{{ $row->vessel_id }}"><i
                                                    class="fas fa-eye-slash fa-2x"></i></a>
                                        </td>
                                    @endif

                                </tr>
                                <tr class="show_details show_details_{{ $row->vessel_id }} tr_bg_cl d_n">
                                    <td></td>
                                    <td>
                                        <p class="b7 mb-0">Built Year:</p>
                                        <p class="">{{ $row->built_year }}</p>
                                        <p class="b7 mb-0">Dead Weight:</p>
                                        <p class="">{{ $row->deadweight }}</p>
                                        <p class="b7 mb-0">IMO Number:</p>
                                        <p class="">{{ $row->imo_number }}</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">DWCC</p>
                                        <p class="">{{ $row->dwcc }}</p>
                                        <p class="b7 mb-0">Call Sign</p>
                                        <p class="">{{ $row->call_sign }}</p>
                                        <p class="b7 mb-0">Speed Blast:</p>
                                        <p class="">{{ $row->speed_ballast }}</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Laden</p>
                                        <p class="">{{ $row->laden }}</p>
                                        <p class="b7 mb-0">Gross:</p>
                                        <p class="">{{ $row->gross }}</p>
                                        <p class="b7 mb-0">Net Tonnage:</p>
                                        <p class="">{{ $row->net_tonnage }}</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">LOA:</p>
                                        <p class="">{{ $row->loa }}</p>
                                        <p class="b7 mb-0">Beam:</p>
                                        <p class="">{{ $row->beam }}</p>
                                        <p class="b7 mb-0">draft:</p>
                                        <p class="">{{ $row->draft }}</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Depth:</p>
                                        <p class="">{{ $row->depth }}</p>
                                        <p class="b7 mb-0">Grain:</p>
                                        <p class="">{{ $row->grain }}</p>
                                        <p class="b7 mb-0">Bale Capacity:</p>
                                        <p class="">{{ $row->bale_capacity }}</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Lane Meters:</p>
                                        <p class="">{{ $row->lane_meters }}</p>
                                        <p class="b7 mb-0">Container Capacity:</p>
                                        <p class="">{{ $row->container_capacity }}</p>
                                        <p class="b7 mb-0">Passenger Capacity:</p>
                                        <p class="">{{ $row->passenger_capacity }}</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">IFO:</p>
                                        <p class="">{{ $row->ifo }}</p>
                                        <p class="b7 mb-0">IFO Laden:</p>
                                        <p class="">{{ $row->ifo_laden }}</p>
                                        <p class="b7 mb-0">IFO Port :</p>
                                        <p class="">{{ $row->ifo_port }}</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">MGO:</p>
                                        <p class="">{{ $row->mgo }}</p>
                                        <p class="b7 mb-0">MGO Laden:</p>
                                        <p class="">{{ $row->mgo_laden }}</p>
                                        <p class="b7 mb-0">MGO Port:</p>
                                        <p class="">{{ $row->mgo_port }}</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">P I Club:</p>
                                        <p class="">{{ $row->p_i_club }}</p>
                                        <p class="b7 mb-0">Classed By:</p>
                                        <p class="">{{ $row->classed_by }}</p>
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