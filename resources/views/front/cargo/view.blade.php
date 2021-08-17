@extends('front/layout/layout')

@section('page_title', 'Cargo')


@section('container')


<div class="container-fluid bg-color pt-5 pb-5">


    @if (session('front_uid') != '')
        <div class="bg-white">
            <div class="pt-2 pb-2 pl-3">
                <a id="new_ser_req" class="btn_style size13 btn_xxxs" href="#"><i class="fas fa-search"></i> New Load
                    Search</a>
                <a href={{ route('cargo.add') }} id="{{ session('front_uname') }}"
                    class="btn_style size13 btn_xxxs ml-3 add_rec_validation">
                    <i class="fas fa-plus"></i> Add New Cargo
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
                            <th width="5%">#</th>
                            <th width="10%">Cargo Type</th>
                            <th width="10%">Laycan Date From</th>
                            <th width="10%">Laycan Date To</th>
                            <th width="10%">Loading Region</th>
                            <th width="10%">Loading Country</th>
                            <th width="10%">Loading Port</th>
                            <th width="10%">Discharge Region</th>
                            <th width="10%">Discharge Country</th>
                            <th width="15%">Discharge Port</th>
                        </tr>
                    </thead>
                    <tbody>







                        {{-- /////////////////////// --}}
                        {{-- Advance Search Form --}}
                        {{-- /////////////////////// --}}
                        <tr id='adv_ser_form' class="pos_rel d_n adv_forms_tr">
                            <form id="search_cargo" method="post" action="{{ route('cargo.search_req') }}"
                                class="form-horizontal form-label-left " enctype="multipart/form-data">
                                @csrf
                                <td></td>
                                <td class="">
                                    <section class="cargo_type_id_par">
                                        <select name="cargo_type_id[]" id="cargo_type_id" form="search_cargo"
                                            class="cargo_type_id ser_inp_fields" multiple title="Choose" data-size="5"
                                            data-selected-text-format="count > 2" data-live-search="true"
                                            {{-- data-max-options="5" --}} {{-- data-actions-box="true" --}}>
                                            @foreach ($cargo_type as $row)
                                                <option value="{{ $row->cargo_type_id }}">
                                                    {{ $row->cargo_type_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </section>
                                </td>
                                <!-- -->
                                <td class="">
                                    <section class="laycan_date_from_par">
                                        <input type="date" required form="search_cargo" class=" from_date"
                                            id="laycan_date_from" name="laycan_date_from"
                                            placeholder="Laycan Date From" />
                                    </section>
                                </td>
                                <!-- -->
                                <td class="">
                                    <section class="laycan_date_to_par">
                                        <input type="date" required form="search_cargo" class=" to_date"
                                            id="laycan_date_to" name="laycan_date_to" placeholder="Laycan Date To" />
                                    </section>
                                </td>
                                <!-- -->
                                <td class="">
                                    <section class="loading_region_id_par">
                                        <select name="loading_region_id[]" id="loading_region_id" form="search_cargo"
                                            class="loading_region_id ser_inp_fields" multiple title="Choose"
                                            data-size="5" data-selected-text-format="count > 2" data-live-search="true">
                                            @foreach ($region as $row)
                                                <option value="{{ $row->region_id }}">{{ $row->region_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </section>
                                </td>
                                <!-- -->
                                <td class="">
                                    <section class="loading_country_id_par">
                                        <select name="loading_country_id[]" id="loading_country_id" form="search_cargo"
                                            class="loading_country_id ser_inp_fields" multiple title="Choose"
                                            data-size="5" data-selected-text-format="count > 2" data-live-search="true">
                                            @foreach ($country as $row)
                                                <option value="{{ $row->country_id }}">{{ $row->country_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </section>
                                </td>
                                <!-- -->
                                <td class="">
                                    <section class="loading_port_id_par">
                                        <select name="loading_port_id[]" id="loading_port_id" form="search_cargo"
                                            class="loading_port_id ser_inp_fields" multiple title="Choose" data-size="5"
                                            data-selected-text-format="count > 2" data-live-search="true">
                                            @foreach ($port as $row)
                                                <option value="{{ $row->port_id }}">{{ $row->port_name }}</option>
                                            @endforeach
                                        </select>
                                    </section>
                                </td>
                                <!-- -->
                                <td class="">
                                    <section class="discharge_region_id_par">
                                        <select name="discharge_region_id[]" id="discharge_region_id"
                                            form="search_cargo" class="discharge_region_id ser_inp_fields" multiple
                                            title="Choose" data-size="5" data-selected-text-format="count > 2"
                                            data-live-search="true">
                                            @foreach ($region as $row)
                                                <option value="{{ $row->region_id }}">{{ $row->region_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </section>
                                </td>
                                <!-- -->
                                <td class="">
                                    <section class="discharge_country_id_par">
                                        <select name="discharge_country_id[]" id="discharge_country_id"
                                            form="search_cargo" class="discharge_country_id ser_inp_fields" multiple
                                            title="Choose" data-size="5" data-selected-text-format="count > 2"
                                            data-live-search="true">
                                            @foreach ($country as $row)
                                                <option value="{{ $row->country_id }}">{{ $row->country_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </section>
                                </td>
                                <!-- -->
                                <td class="">
                                    <section class="discharge_port_id_par">
                                        <select name="discharge_port_id[]" id="discharge_port_id" form="search_cargo"
                                            class="discharge_port_id ser_inp_fields" multiple title="Choose"
                                            data-size="5" data-selected-text-format="count > 2" data-live-search="true">
                                            @foreach ($port as $row)
                                                <option value="{{ $row->port_id }}">{{ $row->port_name }}</option>
                                            @endforeach
                                        </select>
                                    </section>
                                    <!-- -->
                                    <div class="text-right">
                                        <button type="submit"
                                            class=" btn bg_gd btn-sm size15 text-white pt-1 pb-1 mr-3">
                                            <i class="fas fa-search"></i> Search
                                        </button>
                                        <a href="#" id="close_ser" class="btn bg_grey text-dark size15 pt-1 pb-1 mr-1">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    </div>
                                </td>

                            </form>
                        </tr>












                        {{-- /////////////////////// --}}
                        {{-- Search History data --}}
                        {{-- /////////////////////// --}}
                        @foreach ($ser_data as $row)
                            <tr id="ser_hist_rec_{{ $row->id }}"
                                class="ser_hist_rec_each car_ser_hist_rec_req_each ">
                                <td id="id-{{ $row->id }}">
                                    {{ $row->id }}
                                </td>
                                {{-- <td id="cargotype-{{ $row->id }}">
                                    <?php //echo str_replace(',', ',<br>', $row->cargo_type_id); ?>
                                </td> --}}
                                <td class="" id="cargotype-{{ $row->id }}">
                                    @foreach ($row->cargotype as $ser_row12)
                                        {{ optional($ser_row12->SCAcargotype)->cargo_type_name }},<br>
                                    @endforeach
                                </td>
                                <td id="laycan_from-{{ $row->id }}">
                                    {{ date('d-M-Y', strtotime($row->laycan_date_from)) }}
                                </td>
                                <td id="laycan_to-{{ $row->id }}">
                                    {{ date('d-M-Y', strtotime($row->laycan_date_to)) }}
                                </td>
                                {{-- <td class="{{ $row->loading_region_id }}" id="lregion-{{ $row->id }}">
                                    <?php //echo str_replace(',', ',<br>', $row->loading_region_id); ?>
                                </td> --}}
                                {{-- working --}}
                                <td class="" id="lregion-{{ $row->id }}">
                                    @foreach ($row->Lregion as $ser_row12)
                                        {{ optional($ser_row12->SCAlregion)->region_name }},<br>
                                    @endforeach
                                </td>
                                {{-- <td class="{{ $row->loading_country_id }}" id="lcountry-{{ $row->id }}">
                                    <?php //echo str_replace(',', ',<br>', $row->loading_country_id); ?>
                                </td> --}}
                                <td class="" id="lcountry-{{ $row->id }}">
                                    @foreach ($row->Lcountry as $ser_row12)
                                        {{ optional($ser_row12->SCAlcountry)->country_name }},<br>
                                    @endforeach
                                </td>
                                {{-- <td class="{{ $row->loading_port_id }}" id="lport-{{ $row->id }}">
                                    <?php //echo str_replace(',', ',<br>', $row->loading_port_id); ?>
                                </td> --}}
                                <td class="" id="lport-{{ $row->id }}">
                                    @foreach ($row->Lport as $ser_row12)
                                        {{ optional($ser_row12->SCAlport)->port_name }},<br>
                                    @endforeach
                                </td>
                                {{-- <td class="{{ $row->discharge_region_id }}" id="dregion-{{ $row->id }}">
                                    <?php //echo str_replace(',', ',<br>', $row->discharge_region_id); ?>
                                </td> --}}
                                <td class="" id="dregion-{{ $row->id }}">
                                    @foreach ($row->Dregion as $ser_row12)
                                        {{ optional($ser_row12->SCAdregion)->region_name }},<br>
                                    @endforeach
                                </td>
                                {{-- <td class="{{ $row->discharge_country_id }}" id="dcountry-{{ $row->id }}">
                                    <?php //echo str_replace(',', ',<br>', $row->discharge_country_id); ?>
                                </td> --}}
                                <td class="" id="dcountry-{{ $row->id }}">
                                    @foreach ($row->Dcountry as $ser_row12)
                                        {{ optional($ser_row12->SCAdcountry)->country_name }},<br>
                                    @endforeach
                                </td>
                                <td>
                                    {{-- <span class="{{ $row->discharge_port_id }}" id="dport-{{ $row->id }}">
                                        <?php //echo str_replace(',', ',<br>', $row->discharge_port_id); ?>
                                    </span> --}}
                                    <span class="" id="dport-{{ $row->id }}">
                                        @foreach ($row->Dport as $ser_row12)
                                            {{ optional($ser_row12->SCAdport)->port_name }},<br>
                                        @endforeach
                                    </span>
                                    <!-- edit delete buttons -->
                                    <div class="text-right edit_del_btns edit_del_btn_{{ $row->id }} d_n">
                                        <a href="{{ $row->id }}" id="car_show_update_ser_hist_form_each"
                                            class="btn btn-info btn-sm size13 text-white pt-1 pb-1 mr-3">
                                            <i href="{{ $row->id }}" class="fas fa-edit"></i> EDIT
                                        </a>
                                        <a href="{{ $row->id }}" id="car_delete_rec"
                                            class="btn btn-danger btn-sm size13 text-white pt-1 pb-1">
                                            <i href="{{ $row->id }}" class="fas fa-trash-alt"></i> DELETE
                                        </a>
                                    </div>
                                </td>
                            </tr>









                            {{-- /////////////////////// --}}
                            {{-- advance search for each record --}}
                            {{-- /////////////////////// --}}
                            <tr id='adv_ser_form_each_{{ $row->id }}'
                                class="adv_ser_form_each pos_rel d_n adv_forms_tr">
                                <form id="search_cargo_{{ $row->id }}" class="form-horizontal form-label-left ">
                                    @csrf
                                    <td></td>
                                    <td class="">
                                        <section class="cargo_type_id_par_{{ $row->id }}">
                                            <select name="cargo_type_id[]" id="cargo_type_id_{{ $row->id }}"
                                                form="search_cargo_{{ $row->id }}"
                                                class="cargo_type_id ser_inp_fields_each" multiple title="Choose"
                                                data-size="5" data-selected-text-format="count > 2"
                                                data-live-search="true">
                                                @foreach ($cargo_type as $row1)
                                                    <option value="{{ $row1->cargo_type_id }}">
                                                        {{ $row1->cargo_type_name }}</option>
                                                @endforeach
                                            </select>
                                        </section>
                                    </td>
                                    <!-- -->
                                    <td class="">
                                        <section class="laycan_date_from_par_{{ $row->id }}">
                                            <input type="date" required form="search_cargo_{{ $row->id }}"
                                                class=" from_date" id="laycan_date_from_{{ $row->id }}"
                                                name="laycan_date_from" placeholder="Laycan Date From" />
                                        </section>
                                    </td>
                                    <!-- -->
                                    <td class="">
                                        <section class="laycan_date_to_par_{{ $row->id }}">
                                            <input type="date" required form="search_cargo_{{ $row->id }}"
                                                class=" to_date" id="laycan_date_to_{{ $row->id }}"
                                                name="laycan_date_to" placeholder="Laycan Date To" />
                                        </section>
                                    </td>
                                    <!-- -->
                                    <td class="">
                                        <section class="loading_region_id_par_{{ $row->id }}">
                                            <select name="loading_region_id_{{ $row->id }}[]"
                                                id="loading_region_id_{{ $row->id }}"
                                                form="search_cargo_{{ $row->id }}"
                                                class="loading_region_id ser_inp_fields_each" multiple title="Choose"
                                                data-size="5" data-selected-text-format="count > 2"
                                                data-live-search="true">
                                                @foreach ($region as $row1)
                                                    <option value="{{ $row1->region_id }}">
                                                        {{ $row1->region_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </section>
                                    </td>
                                    <!-- -->
                                    <td class=" ">
                                        <section class="loading_country_id_par_{{ $row->id }}">
                                            <select name="loading_country_id[]"
                                                id="loading_country_id_{{ $row->id }}"
                                                form="search_cargo_{{ $row->id }}"
                                                class="loading_country_id ser_inp_fields_each" multiple title="Choose"
                                                data-size="5" data-selected-text-format="count > 2"
                                                data-live-search="true">
                                                @foreach ($country as $row1)
                                                    <option value="{{ $row1->country_id }}">
                                                        {{ $row1->country_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </section>
                                    </td>
                                    <!-- -->
                                    <td class=" ">
                                        <section class="loading_port_id_par_{{ $row->id }}">
                                            <select name="loading_port_id[]" id="loading_port_id_{{ $row->id }}"
                                                form="search_cargo_{{ $row->id }}"
                                                class="loading_port_id ser_inp_fields_each" multiple title="Choose"
                                                data-size="5" data-selected-text-format="count > 2"
                                                data-live-search="true">
                                                @foreach ($port as $row1)
                                                    <option value="{{ $row1->port_id }}">{{ $row1->port_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </section>
                                    </td>
                                    <!-- -->
                                    <td class=" ">
                                        <section class="discharge_region_id_par_{{ $row->id }}">
                                            <select name="discharge_region_id[]"
                                                id="discharge_region_id_{{ $row->id }}"
                                                form="search_cargo_{{ $row->id }}"
                                                class="discharge_region_id ser_inp_fields_each" multiple title="Choose"
                                                data-size="5" data-selected-text-format="count > 2"
                                                data-live-search="true">
                                                @foreach ($region as $row1)
                                                    <option value="{{ $row1->region_id }}">
                                                        {{ $row1->region_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </section>
                                    </td>
                                    <!-- -->
                                    <td class=" ">
                                        <section class="discharge_country_id_par_{{ $row->id }}">
                                            <select name="discharge_country_id[]"
                                                id="discharge_country_id_{{ $row->id }}"
                                                form="search_cargo_{{ $row->id }}"
                                                class="discharge_country_id ser_inp_fields_each" multiple title="Choose"
                                                data-size="5" data-selected-text-format="count > 2"
                                                data-live-search="true">
                                                @foreach ($country as $row1)
                                                    <option value="{{ $row1->country_id }}">
                                                        {{ $row1->country_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </section>
                                    </td>
                                    <!-- -->
                                    <td class="">
                                        <section class="discharge_port_id_par_{{ $row->id }}">
                                            <select name="discharge_port_id[]"
                                                id="discharge_port_id_{{ $row->id }}"
                                                form="search_cargo_{{ $row->id }}"
                                                class="discharge_port_id ser_inp_fields_each" multiple title="Choose"
                                                data-size="5" data-selected-text-format="count > 2"
                                                data-live-search="true">
                                                @foreach ($port as $row1)
                                                    <option value="{{ $row1->port_id }}">{{ $row1->port_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </section>
                                        <div class="text-right">
                                            <button type="button" id="form_{{ $row->id }}"
                                                class="car_req_update_ser_hist_each btn bg_gd btn-sm size15 text-white pt-1 pb-1 mr-3">
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
    {{-- Cargo Table Records --}}
    {{-- /////////////////////// --}}
    <div class="bg-white mt-2 pt-2">
        <span id="total_rec_found" class="font-weight-bold pt-3 pl-2"> {{ sizeof($data) }} TOTAL RESULTS</span>

        <a href={{ route('cargo.view') }} class="btn btn_style bg_gd ml-3 pl-2 pr-2"><i
                class="fas fa-sync-alt"></i></a>

        <div class="table-wrapper-scroll-y my-custom-scrollbar mt-3">
            <div class="border">
                <table class="table tableFixHead table-condensed table-hover table-responsive-md m-0 ">
                    <thead>
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
                            <th width="10%">Loading Discharge Rates</th>
                            <th width="8%">Posted on</th>

                            @if (session('front_uid') != '')
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
                                    <td>{{ $row->ref_no }}</td>
                                    <td>{{ $row->cargo_name }}</td>
                                    {{-- <td><?php //echo str_replace(',', ',<br>', $row->cargo_type_id); ?></td> --}}
                                    <td>
                                        @foreach ($row->cargotype as $row12)
                                            {{ optional($row12->CAcargotype)->cargo_type_name }},<br>
                                        @endforeach
                                    </td>
                                    {{-- <td><?php //echo str_replace(',', ',<br>', $row->loading_region_id); ?></td> --}}
                                    <td>
                                        @foreach ($row->Lregion as $row12)
                                            {{ optional($row12->CAlregion)->region_name }},<br>
                                        @endforeach
                                    </td>
                                    {{-- <td><?php //echo str_replace(',', ',<br>', $row->discharge_region_id); ?></td> --}}
                                    <td>
                                        @foreach ($row->Dregion as $row12)
                                            {{ optional($row12->CAdregion)->region_name }},<br>
                                        @endforeach
                                    </td>
                                    <td>{{ date('d-M-Y', strtotime($row->laycan_date_from)) }}</td>
                                    <td>{{ date('d-M-Y', strtotime($row->laycan_date_to)) }}</td>
                                    <td>{{ $row->quantity }}</td>
                                    {{-- <td >{{optional($row->Lunit)->unit_name}}</td> --}}
                                    <td>{{ $row->loading_discharge_rates }}</td>
                                    <td>{{ explode(' ', $row->created_at)[0] }}</td>

                                    @if (session('front_uid') != '')
                                        <td class="text-center">
                                            <a href='{{ $row->cargo_id }}'
                                                class="show_detail_btn show_detail_btn_{{ $row->cargo_id }}"><i
                                                    class="fas fa-eye fa-2x"></i></a>
                                            <a href='{{ $row->cargo_id }}'
                                                class="hide_detail_btn hide_detail_btn_{{ $row->cargo_id }}"><i
                                                    class="fas fa-eye-slash fa-2x"></i></a>
                                        </td>
                                    @endif

                                </tr>
                                <tr class="show_details show_details_{{ $row->cargo_id }} tr_bg_cl d_n">
                                    <td></td>
                                    <td>
                                        <p class="b7 mb-0">Loading Country:</p>
                                        {{-- <p class=""><?php //echo str_replace(',', ',<br>', $row->loading_country_id); ?> --}}
                                        <p>
                                            @foreach ($row->Lcountry as $row12)
                                                {{ optional($row12->CAlcountry)->country_name }},<br>
                                            @endforeach
                                        </p>
                                        <p class="b7 mb-0">Max LOA:</p>
                                        <p class="">{{ $row->max_loa }}</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Loading Port</p>
                                        {{-- <p class=""><?php //echo str_replace(',', ',<br>', $row->loading_port_id); ?></p> --}}
                                        <p>
                                            @foreach ($row->Lport as $row12)
                                                {{ optional($row12->CAlport)->port_name }},<br>
                                            @endforeach
                                        </p>
                                        <p class="b7 mb-0">Max Draft:</p>
                                        <p class="">{{ $row->max_draft }}</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Discharge Country</p>
                                        {{-- <p class=""><?php //echo str_replace(',', ',<br>', $row->discharge_country_id); ?></p> --}}
                                        <p>
                                            @foreach ($row->Dcountry as $row12)
                                                {{ optional($row12->CAdcountry)->country_name }},<br>
                                            @endforeach
                                        </p>
                                        <p class="b7 mb-0">Max Height:</p>
                                        <p class="">{{ $row->max_height }}</p>
                                    </td>
                                    <td>
                                        <p class="b7 mb-0">Discharge Port</p>
                                        {{-- <p class=""><?php //echo str_replace(',', ',<br>', $row->discharge_port_id); ?></p> --}}
                                        <p>
                                            @foreach ($row->Dport as $row12)
                                                {{ optional($row12->CAdport)->port_name }},<br>
                                            @endforeach
                                        </p>
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
