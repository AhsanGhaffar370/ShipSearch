@extends('admin/layout/layout')

@section('page_title','Post Listing')

@section('container')

<div class="">
    <div class="page-title">
        <div class="title_left">
            <h1>Cargo <span class="size16">Type</span></h1>
			<a href="/admin/cargo/view" class="btn btn-light border pt-2 pb-2 pl-3 pr-3">
				<i class="fas fa-eye"></i><br>
				<span class="size13">View All</span> 
			</a>
			<a href="/admin/cargo/add" class="btn btn-light border pt-2 pb-2 pl-3 pr-3">
				<i class="fas fa-plus"></i><br>
				<span class="size13">Add New</span> 
			</a>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">

        <div class="col-md-12 col-sm-12 ">
            @if(session('msg')!="")
            <div class="alert alert-{{session('alert')}} alert-dismissible fade show text-center d-block" role="alert">
                {{session('msg')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="x_panel">
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box ">
                                <table id="cargo_table" class="table table-striped table-responsive table-bordered" style="width:100%">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Unique Key</th>
                                            <th>Cargo Name</th>
                                            <th>Cargo Type</th>
                                            <th>Loading Region</th>
                                            <th>Loading Country</th>
                                            <th>Loading Port#1</th>
                                            <th>Loading Port#2</th>
                                            <th>Discharge Region</th>
                                            <th>Discharge Country</th>
                                            <th>Discharge Port#1</th>
                                            <th>Discharge Port#2</th>
                                            <th>Laycan Date From</th>
                                            <th>Laycan Date To</th>
                                            <th>Quantity</th>
                                            <th>Unit</th>
                                            <th>Max LOA</th>
                                            <th>Max Draft</th>
                                            <th>Max Height</th>
                                            <th>Commission</th>
                                            <th>Combinable</th>
                                            <th>Over Age</th>
                                            <th>Hazmat</th>
                                            <th>Loading Discharge Rates</th>
                                            <th>Loading Discharge Unit</th>
                                            <th>Loading Equipment Req</th>
                                            <th>Gear Lifting Capacity</th>
                                            <th>Loading/Discharge Equipment Req</th>
                                            <th>Additional Info</th>
                                            <th>Status</th>
                                            <!-- <th>Brocker Info</th> -->
                                            <th style="padding: 0px 40px 10px 40px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($data as $row)
                                        <tr>
                                            <td>{{$count++}}</td>
                                            <td>{{$row->cargo_id}}</td>
                                            <td>{{$row->cargo_name}}</td>
                                            <td>{{$row->cargo_type_name}}</td>
                                            <td>{{$row->R1name}}</td>
                                            <td>{{$row->C1name}}</td>
                                            <td>{{$row->P1name}}</td>
                                            <td>{{$row->P2name}}</td>
                                            <td>{{$row->DR1name}}</td>
                                            <td>{{$row->DC1name}}</td>
                                            <td>{{$row->DP1name}}</td>
                                            <td>{{$row->DP2name}}</td>
                                            <td>{{$row->laycan_date_from}}</td>
                                            <td>{{$row->laycan_date_to}}</td>
                                            <td>{{$row->quantity}}</td>
                                            <td>{{$row->U1unit}}</td>
                                            <td>{{$row->max_loa}}</td>
                                            <td>{{$row->max_draft}}</td>
                                            <td>{{$row->max_height}}</td>
                                            <td>{{$row->commision}}</td>
                                            <td>{{$row->combinable}}</td>
                                            <td>{{$row->over_age}}</td>
                                            <td>{{$row->hazmat}}</td>
                                            <td>{{$row->loading_discharge_rates}}</td>
                                            <td>{{$row->DU1unit}}</td>
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
                                                    <a href='/admin/cargo/update/{{$row->cargo_id}}'
                                                        class="btn btn-info btn-sm pt-1 pb-1"><i class="fas fa-pen"></i></a>

                                                    @if($row->is_active =="1")
                                                    <button type="button"class="btn btn-danger dropdown-toggle btn-sm pt-0 border-left" data-toggle="dropdown" aria-expanded="false" style="padding-bottom: 1px !important">
                                                    @else
                                                    <button type="button"class="btn btn-success dropdown-toggle btn-sm pt-0 border-left" data-toggle="dropdown" aria-expanded="false" style="padding-bottom: 1px !important">
                                                    @endif   
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <ul class="dropdown-menu list-group" role="menu">
                                                        @if($row->is_active =="1")
                                                        <li><a href='/admin/cargo/update-status/{{$row->cargo_id}}/0'
                                                                class="list-group-item text-white bg-danger rounded-0 border-0">De-Activate</a></li>
                                                        @else
                                                        <li><a href='/admin/cargo/update-status/{{$row->cargo_id}}/1'
                                                                class="list-group-item text-white bg-success rounded-0 border-0">Activate</a></li>
                                                        @endif
                                                    </ul>
                                                    <a href='/admin/cargo/delete/{{$row->cargo_id}}'
                                                        class="btn btn-danger btn-sm ml-2 pt-1 pb-1 rounded"><i class="fas fa-trash-alt"></i></a>
                                                </div>
                                            </td>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection