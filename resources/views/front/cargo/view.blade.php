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
    background-color: #09cec708;
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
</style>

<div class="container-fluid mt-5 mb-5">

    <div class="row mb-3">
        <div class="col-12 col-lg-8 col-md-6 pt-2">
            <h1 class="size28 text-white b7 pt-2 pb-3 pl-3 bg_sec ">Cargo</h1>
        </div>
        <div class="col-12 col-lg-2 col-md-3 pt-2">
            <a class="btn btn-info btn-block pt-3 pb-3 rounded-0" href="/"><i class="fas fa-search"></i> Advanced
                Search</a>
        </div>
        <div class="col-12 col-lg-2 col-md-3 pt-2">
            <a class="btn btn-info btn-block pt-3 pb-3 rounded-0" href="/cargo/add"><i class="fas fa-plus"></i> Add New</a>
        </div>
    </div>

    <table id="cargo_table21" class="table table-condensed table-hover table-responsive-md table-bordered">
        <thead class="bg-info text-white">
            <tr>
                <th width="8%">Ref.No</th>
                <th width="10%">Cargo Name</th>
                <th width="10%">Cargo Type</th>
                <th width="10%">Loading Region</th>
                <th width="10%">Discharge Region</th>
                <th width="10%">Laycan Date</th>
                <th width="10%">Quantity</th>
                <th width="10%">Unit</th>
                <th width="12%">Loading Discharge Rates</th>
                <th width="10%">Posted on</th>
                <th >Details</th>
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
                <td>{{$row->laycan_date_from}}</td>
                <td>{{$row->quantity}}</td>
                <td>{{optional($row->Lunit)->unit_name}}</td>
                <td>{{$row->loading_discharge_rates}}</td>
                <td>{{$row->created_at}}</td>
                <td class="text-center">
                    <a href='{{$row->cargo_id}}' class="show_details_btn"><i class="fas fa-eye"></i></a>
                </td>
            </tr>
            <tr class="show_details show_details_{{$row->cargo_id}} bg-light" style="display: none;">
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
@endsection