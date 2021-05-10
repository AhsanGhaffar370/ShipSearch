@extends('front/layout/layout')

@section('page_title',"Cargo")


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

.ser_hist_req { cursor: pointer; }
</style>

<div class="container-fluid mt-5 mb-5">

    <div class="row mb-3">
        <div class="col-12 col-lg-8 col-md-6 pt-2">
            <h1 class="size28 text-white b7 pt-2 pb-3 pl-3 bg_sec ">Cargo</h1>
        </div>
        <div class="col-12 col-lg-2 col-md-3 pt-2">
            <a class="btn btn-info btn-block pt-3 pb-3 rounded-0" href={{route('cargo.view')}}><i
                    class="fas fa-search"></i> Advanced
                Search</a>
        </div>
        <div class="col-12 col-lg-2 col-md-3 pt-2">
            <a href={{route('cargo.add')}} id="{{session('front_uname')}}"
                class="btn btn-info btn-block pt-3 pb-3 rounded-0 add_cargo_btn"><i class="fas fa-plus"></i> Add New</a>
        </div>
    </div>

    <div class="container pb-5">
        <form id="search_cargo21" method="post" action="{{route('cargo.search_req')}}" class="form-horizontal form-label-left "
            enctype="multipart/form-data">
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
                                    placeholder="From Date"  />
                </div>
                <!-- -->
                <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                    <label for="">To Date</label>
                    <input type="date" required class="form-control to_date" id="to_date" name="to_date"
                                    placeholder="To Date"  />
                </div>
                <!-- -->
                <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                    <label for="">Loading Region</label>
                    <select name="loading_region_id" id="loading_region_id" class="form-control">
                        <option value="-1" disabled selected>Choose</option>
                        @foreach ($region as $row)
                        <option value="{{$row->region_id}}">{{$row->region_name}}</option>
                        @endforeach
                    </select>
                </div>
                <!-- -->
                <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12 ">
                    <label for="">Loading Country</label>
                    <select name="loading_country_id" id="loading_country_id" class="form-control">
                        <option value="-1" disabled selected>Choose</option>
                        @foreach ($country as $row)
                        <option value="{{$row->country_id}}">{{$row->country_name}}</option>
                        @endforeach
                    </select>
                </div>
                <!-- -->
                <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12 ">
                    <label for="">Loading Port#1</label>
                    <select name="loading_port_id_1" id="loading_port_id_1" class="form-control">
                        <option value="-1" disabled selected>Choose</option>
                        @foreach ($port as $row)
                        <option value="{{$row->port_id}}">{{$row->port_name}}</option>
                        @endforeach
                    </select>
                </div>
                <!-- -->
                <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12 ">
                    <label for="">Loading Port#2</label>
                    <select name="loading_port_id_2" id="loading_port_id_2" class="form-control">
                        <option value="-1" disabled selected>Choose</option>
                        @foreach ($port as $row)
                        <option value="{{$row->port_id}}">{{$row->port_name}}</option>
                        @endforeach
                    </select>
                </div>
                <!-- -->
                <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12 ">
                    <label for="">Discharge Region</label>
                    <select name="discharge_region_id" id="discharge_region_id" class="form-control">
                        <option value="-1" disabled selected>Choose</option>
                        @foreach ($region as $row)
                        <option value="{{$row->region_id}}">{{$row->region_name}}</option>
                        @endforeach
                    </select>
                </div>
                <!-- -->
                <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12 ">
                    <label for="">Discharge Country</label>
                    <select name="discharge_country_id" id="discharge_country_id" class="form-control">
                        <option value="-1" disabled selected>Choose</option>
                        @foreach ($country as $row)
                        <option value="{{$row->country_id}}">{{$row->country_name}}</option>
                        @endforeach
                    </select>
                </div>
                <!-- -->
                <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12">
                    <label for="">Discharge Port#1</label>
                    <select name="discharge_port_id_1" id="discharge_port_id_1" class="form-control">
                        <option value="-1" disabled selected>Choose</option>
                        @foreach ($port as $row)
                        <option value="{{$row->port_id}}">{{$row->port_name}}</option>
                        @endforeach
                    </select>
                </div>
                <!-- -->
                <div class="form-group col-12 col-lg-4 col-md-4 col-sm-12 ">
                    <label for="">Discharge Port#2</label>
                    <select name="discharge_port_id_2" id="discharge_port_id_2" class="form-control">
                        <option value="-1" disabled selected>Choose</option>
                        @foreach ($port as $row)
                        <option value="{{$row->port_id}}">{{$row->port_name}}</option>
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

    @if(session('front_uid')!="")
    <p class="b7 mb-0">Search History:</p>
    <div class="border">
        <table id="cargo_table22" class="table table-condensed table-hover table-responsive-md m-0 ">
            <thead class="" style="background-color: #EAEAEA;">
                <tr>
                    <th width="8%">Laycan Date</th>
                    <th width="6%">From Date</th>
                    <th width="6%">To Date</th>
                    <th width="10%">Loading Region</th>
                    <th width="10%">Loading Country</th>
                    <th width="10%">Loading Port#1</th>
                    <th width="10%">Loading Port#2</th>
                    <th width="10%">Discharge Region</th>
                    <th width="10%">Discharge Country</th>
                    <th width="10%">Discharge Port#1</th>
                    <th width="10%">Discharge Port#2</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ser_data as $row)
                <tr id="rec-{{$row->id}}" class="ser_hist_req ">
                    <td id="laycan-{{$row->id}}">{{$row->laycan_date}}</td>
                    <td id="from-{{$row->id}}">{{date("d-M-Y", strtotime($row->from_date))}}</td>
                    <td id="to-{{$row->id}}">{{date("d-M-Y", strtotime($row->to_date))}}</td>
                    <td class="{{$row->loading_region_id}}" id="lregion-{{$row->id}}">{{optional($row->Lregion)->region_name}}</td>
                    <td class="{{$row->discharge_region_id}}" id="dregion-{{$row->id}}">{{optional($row->Dregion)->region_name}}</td>
                    <td class="{{$row->loading_country_id}}" id="lcountry-{{$row->id}}">{{optional($row->Lcountry)->country_name}}</td>
                    <td class="{{$row->discharge_country_id}}" id="dcountry-{{$row->id}}">{{optional($row->Dcountry)->country_name}}</td>
                    <td class="{{$row->loading_port_id_1}}" id="lport1-{{$row->id}}">{{optional($row->Lport1)->port_name}}</td>
                    <td class="{{$row->discharge_port_id_1}}" id="dport1-{{$row->id}}">{{optional($row->Dport1)->port_name}}</td>
                    <td class="{{$row->loading_port_id_2}}" id="lport2-{{$row->id}}">{{optional($row->Lport2)->port_name}}</td>
                    <td class="{{$row->discharge_port_id_2}}" id="dport2-{{$row->id}}">{{optional($row->Dport2)->port_name}}</td>
                </tr>
                
                @endforeach
            </tbody>
        </table>
    </div>


    <p class="b7 mb-0 mt-3">Search Resilt:</p>
    @endif
    <div class="border">
        <table id="cargo_table21" class="table table-condensed table-hover table-responsive-md m-0 ">
            <thead class="" style="background-color: #EAEAEA;">
                <tr>
                    <th width="2%">ID</th>
                    <th width="10%">Cargo Name</th>
                    <th width="10%">Cargo Type</th>
                    <th width="10%">Loading Region</th>
                    <th width="10%">Discharge Region</th>
                    <th width="10%">Laycan Date From</th>
                    <th width="10%">Laycan Date To</th>
                    <th width="5%">Quantity</th>
                    <th width="8%">Unit</th>
                    <th width="15%">Loading Discharge Rates</th>
                    <th width="10%">Posted on</th>

                    @if(session('front_uid')!="")
                    <th width="2%">Details</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)
                <tr class="">
                    <td>{{$row->cargo_id}}</td>
                    <td>{{$row->cargo_name}}</td>
                    <td>{{optional($row->cargotype)->cargo_type_name}}</td>
                    <td>{{optional($row->Lregion)->region_name}}</td>
                    <td>{{optional($row->Dregion)->region_name}}</td>
                    <td>{{date("d-M-Y", strtotime($row->laycan_date_from))}}</td>
                    <td>{{date("d-M-Y", strtotime($row->laycan_date_to))}}</td>
                    <td>{{$row->quantity}}</td>
                    <td>{{optional($row->Lunit)->unit_name}}</td>
                    <td>{{$row->loading_discharge_rates}}</td>
                    <td>{{$row->created_at}}</td>

                    @if(session('front_uid')!="")
                    <td class="text-center">
                        <a href='{{$row->cargo_id}}' class="show_details_btn"><i class="fas fa-eye"></i></a>
                    </td>
                    @endif

                </tr>
                <tr class="show_details show_details_{{$row->cargo_id}} "
                    style="display: none; background-color: #F1F1F1;">
                    <td></td>
                    <td>
                        <p class="b7 mb-0">Loading Country:</p>
                        <p class="">{{optional($row->Lcountry)->country_name}}</p>
                        <p class="b7 mb-0">Max LOA:</p>
                        <p class="">{{$row->max_loa}}</p>
                    </td>
                    <td>
                        <p class="b7 mb-0">Loading Port#1</p>
                        <p class="">{{optional($row->Lport1)->port_name}}</p>
                        <p class="b7 mb-0">Over Age:</p>
                        <p class="">{{$row->over_age}}</p>
                    </td>
                    <td>
                        <p class="b7 mb-0">Loading Port#2</p>
                        <p class="">{{optional($row->Lport2)->port_name}}</p>
                        <p class="b7 mb-0">Hazmat:</p>
                        <p class="">{{$row->hazmat}}</p>
                    </td>
                    <td>
                        <p class="b7 mb-0">Discharge Country</p>
                        <p class="">{{optional($row->Dcountry)->country_name}}</p>
                        <p class="b7 mb-0">Loading Discharge Unit:</p>
                        <p class="">{{optional($row->Dunit)->unit_name}}</p>
                    </td>
                    <td>
                        <p class="b7 mb-0">Discharge Port#1</p>
                        <p class="">{{optional($row->Dport1)->port_name}}</p>
                        <p class="b7 mb-0">Loading Equipment Req:</p>
                        <p class="">{{$row->loading_equipment_req}}</p>
                    </td>
                    <td>
                        <p class="b7 mb-0">Discharge Port#2</p>
                        <p class="">{{optional($row->Dport2)->port_name}}</p>
                        <p class="b7 mb-0">Gear Lifting Capacity:</p>
                        <p class="">{{$row->gear_lifting_capacity}}</p>
                    </td>
                    <td>
                        <p class="b7 mb-0">Max Draft:</p>
                        <p class="">{{$row->max_draft}}</p>
                        <p class="b7 mb-0">Loading/Discharge Equipment Req:</p>
                        <p class="">{{$row->loading_discharge_equipment_req}}</p>
                    </td>
                    <td>
                        <p class="b7 mb-0">Max Height:</p>
                        <p class="">{{$row->max_height}}</p>
                        <p class="b7 mb-0">Additional Info:</p>
                        <p class="">{{$row->additional_info}}</p>
                    </td>
                    <td>
                        <p class="b7 mb-0">Commission:</p>
                        <p class="">{{$row->commision}}</p>
                        <p class="b7 mb-0">Units:</p>
                        <p class="">{{optional($row->Dunit)->unit_name}}</p>
                    </td>
                    <td>
                        <p class="b7 mb-0">Combinable:</p>
                        <p class="">{{$row->combinable}}</p>
                    </td>
                    <td></td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>


    <div id="dialog" class="text-right rounded p-1" style="display: none;">
        <p class="size20 text-left text-white bg-danger p-2 rounded">Access Denied</p>

        <p class="text-left">
            Please <a href={{route('login')}} class="btn btn-info text=white btn-sm">Login</a> to do this action.
        </p>

        <br>
        <hr>
        <button id="close_dialog" class="btn btn-danger">Close</button>

    </div>
</div>
@endsection