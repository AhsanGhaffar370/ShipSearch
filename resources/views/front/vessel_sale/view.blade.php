@extends('front/layout/layout')

@section('page_title',"Vessel Sale/Purchase")


@section('container')




<div class="container-fluid bg-color pt-5 pb-5">


    @if (session('front_uid') != '')
        <div class="bg-white">
            <div class="pt-2 pb-2 pl-3">
                <a id="new_ser_req" class="btn_style size13 btn_xxxs" href="#"><i class="fas fa-search"></i> New Load Search</a>
                <a href={{ route('vessel_sale.add') }} id="{{ session('front_uname') }}" class="btn_style size13 btn_xxxs ml-3 add_rec_validation"> 
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
                            <th width="10%">Date Available</th>
                            <th width="10%">Operations Date</th>
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
                            <form id="search_vessel_sale" method="post" action="{{ route('vessel_sale.search_req') }}"
                                class="form-horizontal form-label-left " enctype="multipart/form-data">
                                @csrf
                                <td></td>
                                <td class="">
                                    <select name="vessel_type_id[]" id="vessel_type_id" form="search_vessel_sale"
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
                                    <input type="date" required form="search_vessel_sale" class=" date_available"
                                        id="date_available" name="date_available" placeholder="" />
                                </td>
                                <!-- -->
                                <td class="">
                                    <input type="date" required form="search_vessel_sale" class=" operations_date" id="operations_date"
                                        name="operations_date" placeholder="" />
                                </td>
                                <!-- -->
                                <td class="">
                                    <select name="region_id[]" id="region_id" form="search_vessel_sale"
                                        class="region_id ser_inp_fields" multiple title="Choose" data-size="5"
                                        data-selected-text-format="count > 2" data-live-search="true">
                                        @foreach ($region as $row)
                                            <option value="{{ $row->region_name }}">{{ $row->region_name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <!-- -->
                                <td class=" ">
                                    <select name="country_id[]" id="country_id" form="search_vessel_sale"
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
                                    <select name="port_id[]" id="port_id" form="search_vessel_sale"
                                        class="port_id ser_inp_fields" multiple title="Choose" data-size="5"
                                        data-selected-text-format="count > 2" data-live-search="true">
                                        @foreach ($port as $row)
                                            <option value="{{ $row->port_name }}">{{ $row->port_name }}</option>
                                        @endforeach
                                    </select>
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
                            <tr id="ser_hist_rec_{{ $row->id }}" class="ser_hist_rec_each vsale_ser_hist_rec_req_each ">
                                <td id="id-{{ $row->id }}">
                                    {{ $row->id }}
                                </td>
                                <td id="vesseltype-{{ $row->id }}">
                                    <?php echo str_replace(',', ',<br>', $row->vessel_type_id); ?>
                                </td>
                                <td id="date_available-{{ $row->id }}">
                                    {{ date('d-M-Y', strtotime($row->date_available)) }}
                                </td>
                                <td id="operations_date-{{ $row->id }}">
                                    {{ date('d-M-Y', strtotime($row->operations_date)) }}
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
                                        <a href="{{ $row->id }}" id="vsale_show_update_ser_hist_form_each" 
                                        class="btn btn-info btn-sm size13 text-white pt-1 pb-1 mr-3"> 
                                            <i href="{{ $row->id }}" class="fas fa-edit"></i> EDIT
                                        </a>
                                        <a href="{{ $row->id }}" id="vsale_delete_rec" class="btn btn-danger btn-sm size13 text-white pt-1 pb-1"> 
                                            <i href="{{ $row->id }}" class="fas fa-trash-alt"></i> DELETE
                                        </a>
                                    </div>
                                </td>
                            </tr>








                            
                            {{-- /////////////////////// --}}
                            {{-- advance search for each record --}}
                            {{-- /////////////////////// --}}
                            <tr id='adv_ser_form_each_{{ $row->id }}' class="adv_ser_form_each pos_rel d_n adv_forms_tr">
                                <form id="search_vessel_sale_{{ $row->id }}" class="form-horizontal form-label-left ">
                                    @csrf
                                    <td></td>
                                    <td class="">
                                        <select name="vessel_type_id[]" id="vessel_type_id_{{ $row->id }}" form="search_vessel_sale_{{ $row->id }}"
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
                                        <input type="date" required form="search_vessel_sale_{{ $row->id }}" class=" date_available"
                                            id="date_available_{{ $row->id }}" name="date_available"
                                            placeholder="" />
                                    </td>
                                    <!-- -->
                                    <td class="">
                                        <input type="date" required form="search_vessel_sale_{{ $row->id }}" class=" operations_date"
                                            id="operations_date_{{ $row->id }}" name="operations_date" placeholder="" />
                                    </td>
                                    <!-- -->
                                    <td class=" ">
                                        <select name="region_id[]" id="region_id_{{ $row->id }}"
                                            form="search_vessel_sale_{{ $row->id }}" class="region_id ser_inp_fields" multiple title="Choose"
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
                                            form="search_vessel_sale_{{ $row->id }}" class="country_id ser_inp_fields" multiple title="Choose"
                                            data-size="5" data-selected-text-format="count > 2" data-live-search="true">
                                            @foreach ($country as $row1)
                                                <option value="{{ $row1->country_name }}">{{ $row1->country_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <!-- -->
                                    <td class="">
                                        <select name="port_id[]" id="port_id_{{ $row->id }}" form="search_vessel_sale_{{ $row->id }}"
                                            class="port_id ser_inp_fields" multiple title="Choose" data-size="5"
                                            data-selected-text-format="count > 2" data-live-search="true">
                                            @foreach ($port as $row1)
                                                <option value="{{ $row1->port_name }}">{{ $row1->port_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="text-right">
                                            <button type="button" id="form_{{$row->id}}" 
                                            class="vsale_req_update_ser_hist_each btn bg_gd btn-sm size15 text-white pt-1 pb-1 mr-3"> 
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
    {{-- Vessel Sale Table Records --}}
    {{-- /////////////////////// --}}
    <div class="bg-white mt-2 pt-2">
        <span id="total_rec_found" class="font-weight-bold pt-3 pl-2"> {{ sizeof($data) }} TOTAL RESULTS</span>
        
        <a href={{ route('vessel_sale.view') }} class="btn btn_style bg_gd ml-3 pl-2 pr-2"><i class="fas fa-sync-alt"></i></a>

        <div class="table-wrapper-scroll-y my-custom-scrollbar mt-3">
            <div class="border">
                <table
                    class="table tableFixHead table-condensed table-hover table-responsive-md m-0 ">
                    <thead>
                        <tr>
                            <th width="2%">ID</th>
                            <th width="7%">Vessel Type</th>
                            <th width="8%">Date Available</th>
                            <th width="8%">Operations Date</th>
                            <th width="10%">Region</th>
                            <th width="10%">Country</th>
                            <th width="10%">Port</th>
                            <th width="10%">Built Year</th>
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
                                    <td ><p class=""><?php echo str_replace(',', ',<br>', $row->vessel_type_id); ?></p></td>
                                    <td >{{date("d-M-Y", strtotime($row->date_available))}}</td>
                                    <td >{{date("d-M-Y", strtotime($row->operations_date))}}</td>
                                    <td ><p class=""><?php echo str_replace(',', ',<br>', $row->region_id); ?></p></td>
                                    <td ><p class=""><?php echo str_replace(',', ',<br>', $row->country_id); ?></p></td>
                                    <td ><p class=""><?php echo str_replace(',', ',<br>', $row->port_id); ?></p></td>
                                    <td >{{$row->built_year}}</td>
                                    <td >{{explode(" ",$row->created_at)[0]}}</td>

                                    @if (session('front_uid') != '')
                                        <td class="text-center">
                                            <a href='{{ $row->vessel_sale_id }}'
                                                class="show_detail_btn show_detail_btn_{{ $row->vessel_sale_id }}"><i
                                                    class="fas fa-eye fa-2x"></i></a>
                                            <a href='{{ $row->vessel_sale_id }}'
                                                class="hide_detail_btn hide_detail_btn_{{ $row->vessel_sale_id }}"><i
                                                    class="fas fa-eye-slash fa-2x"></i></a>
                                        </td>
                                    @endif

                                </tr>
                                <tr class="show_details show_details_{{ $row->vessel_sale_id }} tr_bg_cl d_n">
                                    <td></td>
                                    <td>
                                        <p class="b7 mb-0">Last Dry Docked:</p>
                                        <p class="">{{ $row->last_dry_docked }}</p>
                                        <p class="b7 mb-0">Last SS:</p>
                                        <p class="">{{ $row->last_ss }}</p>
                                        <p class="b7 mb-0">Classification:</p>
                                        <p class="">{{ $row->classification }}</p>
                                        <p class="b7 mb-0">GRT:</p>
                                        <p class="">{{ $row->GRT }}</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">NRT:</p>
                                        <p class="">{{ $row->NRT }}</p>
                                        <p class="b7 mb-0">DWT:</p>
                                        <p class="">{{ $row->dwt }}</p>
                                        <p class="b7 mb-0">Light Weight:</p>
                                        <p class="">{{ $row->lightweight }}</p>
                                        <p class="b7 mb-0">Speed:</p>
                                        <p class="">{{ $row->speed }}</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Consumption:</p>
                                        <p class="">{{ $row->consumption }}</p>
                                        <p class="b7 mb-0">LOA:</p>
                                        <p class="">{{ $row->loa }}</p>
                                        <p class="b7 mb-0">Breadth:</p>
                                        <p class="">{{ $row->breadth }}</p>
                                        <p class="b7 mb-0">Summer Draft:</p>
                                        <p class="">{{ $row->summer_draft }}</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">FW Draft:</p>
                                        <p class="">{{ $row->fw_draft }}</p>
                                        <p class="b7 mb-0">Main Engine:</p>
                                        <p class="">{{ $row->main_engine }}</p>
                                        <p class="b7 mb-0">Aux Engines:</p>
                                        <p class="">{{ $row->aux_engines }}</p>
                                        <p class="b7 mb-0">Bow Thruster:</p>
                                        <p class="">{{ $row->bow_thruster }}</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Gears:</p>
                                        <p class="">{{ $row->gears }}</p>
                                        <p class="b7 mb-0">Brief Description:</p>
                                        <p class="">{{ $row->brief_description }}</p>
                                        <p class="b7 mb-0">Propellers:</p>
                                        <p class="">{{ $row->propellers }}</p>
                                        <p class="b7 mb-0">Bunker Capacity:</p>
                                        <p class="">{{ $row->bunker_capacity }}</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">In Service:</p>
                                        <p class="">{{ $row->in_service }}</p>
                                        <p class="b7 mb-0">Date Available:</p>
                                        <p class="">{{ $row->date_available }}</p>
                                        <p class="b7 mb-0">Price:</p>
                                        <p class="">{{ $row->price }}</p>
                                        <p class="b7 mb-0">Operations Date:</p>
                                        <p class="">{{ $row->operations_date }}</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Cargo Capacity:</p>
                                        <p class="">{{ $row->cargo_capacity }}</p>
                                        <p class="b7 mb-0">Holds Hatch:</p>
                                        <p class="">{{ $row->holds_hatch }}</p>
                                        <p class="b7 mb-0">Cover Type:</p>
                                        <p class="">{{ $row->cover_type }}</p>
                                        <p class="b7 mb-0">Additional Description:</p>
                                        <p class="">{{ $row->additional_description }}</p>
                                    </td>
                                   
                                    <td></td>
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