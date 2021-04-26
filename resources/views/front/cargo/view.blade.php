@extends('front/layout/layout')

@section('page_title',"Cargo")


@section('container')

<style>
    td, th{
        font-size: 11px;
        padding: 0px;
        margin: 0px;
    }
</style>

<div class="container-fluid">
    
    <h1>Cargo</h1>
    <table id="cargo_table21" class="table table-white table-condensed table-responsive table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Unique Key</th>
                <th>Cargo Name</th>
                <th>Cargo Type</th>
                <th>Loading Region</th>
                <!-- <th>Loading Country</th> -->
                <!-- <th>Loading Port#1</th> -->
                <!-- <th>Loading Port#2</th> -->
                <th>Discharge Region</th>
                <!-- <th>Discharge Country</th> -->
                <!-- <th>Discharge Port#1</th> -->
                <!-- <th>Discharge Port#2</th> -->
                <th>Laycan Date From</th>
                <!-- <th>Laycan Date To</th> -->
                <th>Quantity</th>
                <th>Unit</th>
                <!-- <th>Max LOA</th>
                <th>Max Draft</th>
                <th>Max Height</th>
                <th>Commission</th>
                <th>Combinable</th>
                <th>Over Age</th>
                <th>Hazmat</th> -->
                <!-- <th>Loading Discharge Rates</th>
                <th>Loading Discharge Unit</th>
                <th>Loading Equipment Req</th>
                <th>Gear Lifting Capacity</th>
                <th>Loading/Discharge Equipment Req</th>
                <th>Additional Info</th>
                <th>Status</th> -->
                <!-- <th>Brocker Info</th> -->
                <th style="padding: 0px 40px 10px 40px;">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($data as $row)
            <tr>
                <td>{{$row->cargo_id}}</td>
                <td>{{$row->cargo_name}}</td>
                <td>{{optional($row->cargotype)->cargo_type_name}}</td>
                <td>{{optional($row->Lregion)->region_name}}</td>
                <td>{{optional($row->Lcountry)->country_name}}</td>
                <td>{{optional($row->Lport1)->port_name}}</td>
                <td>{{optional($row->Lport2)->port_name}}</td>
                <td>{{optional($row->Dregion)->region_name}}</td>
                <td>{{optional($row->Dcountry)->country_name}}</td>
                <td>{{optional($row->Dport1)->port_name}}</td>
                <td>{{optional($row->Dport2)->port_name}}</td>
                <td>{{$row->laycan_date_from}}</td>
                <td>{{$row->laycan_date_to}}</td>
                <td>{{$row->quantity}}</td>
                <td>{{optional($row->Lunit)->unit_name}}</td>
                <td>{{$row->max_loa}}</td>
                <td>{{$row->max_draft}}</td>
                <td>{{$row->max_height}}</td>
                <td>{{$row->commision}}</td>
                <td>{{$row->combinable}}</td>
                <td>{{$row->over_age}}</td>
                <td>{{$row->hazmat}}</td>
                <td>{{$row->loading_discharge_rates}}</td>
                <td>{{optional($row->Dunit)->unit_name}}</td>
                <td>{{$row->loading_equipment_req}}</td>
                <td>{{$row->gear_lifting_capacity}}</td>
                <td>{{$row->loading_discharge_equipment_req}}</td>
                <td>{{$row->additional_info}}</td>
                <!-- <td>
												<strong>N:</strong>{{-- $row->brocker_name --}}<br>
												<strong>T:</strong>{{-- $row->brocker_phone --}}<br>
												<strong>E:</strong>{{-- $row->brocker_email --}}
											</td> -->

                <td>
                    @if($row->is_active =="1")
                    <span class="badge badge-success">Active</span>
                    @else
                    <span class="badge badge-danger">In-Active</span>
                    @endif
                </td>

                <td>
                    <div class="btn-group" style="display: -webkit-box;">
                        <a href='/admin/cargo/update/{{$row->cargo_id}}' class="btn btn-info btn-sm pt-1 pb-1"><i
                                class="fas fa-pen"></i></a>

                        @if($row->is_active =="1")
                        <button type="button" class="btn btn-danger dropdown-toggle btn-sm border-left"
                            data-toggle="dropdown" aria-expanded="false" >
                            @else
                            <button type="button" class="btn btn-success dropdown-toggle btn-sm border-left"
                                data-toggle="dropdown" aria-expanded="false">
                                @endif
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu list-group" role="menu">
                                @if($row->is_active =="1")
                                <li><a href='/admin/cargo/update-status/{{$row->cargo_id}}/0'
                                        class="list-group-item text-white bg-danger rounded-0 border-0">De-Activate</a>
                                </li>
                                @else
                                <li><a href='/admin/cargo/update-status/{{$row->cargo_id}}/1'
                                        class="list-group-item text-white bg-success rounded-0 border-0">Activate</a>
                                </li>
                                @endif
                            </ul>
                            <a href='/admin/cargo/delete/{{$row->cargo_id}}'
                                class="btn btn-danger btn-sm ml-2 pt-1 pb-1 rounded"><i
                                    class="fas fa-trash-alt"></i></a>
                    </div>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection