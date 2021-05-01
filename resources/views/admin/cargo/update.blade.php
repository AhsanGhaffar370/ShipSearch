@extends('admin/layout/layout')

@section('page_title','Update Cargo')

@section('container')

<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Update Post</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 ">
            <div class="x_panel">
                <div class="x_content">
                    <br />

                    <form method="post" id="cargo_form" action={{route('admin.cargo.update_req')}} class="form-horizontal form-label-left"
                        enctype="multipart/form-data">
                        <!-- <form method="post" action="{{url('/admin/post/add_post')}}" class="form-horizontal form-label-left"> -->
                        @csrf
                        <input type="hidden" name="cargo_id" value="{{$res->cargo_id}}" />
                        <input type="hidden" name="is_active" value="{{$res->is_active}}" />

                        <div class="form-group col-sm-4">
                            <label for="">Cargo Name</label>
                            <input type="text" value="{{$res->cargo_name}}" required name="cargo_name"
                                class="form-control">
                        </div>
                        <!-- -->
                        <div class="form-group col-sm-4">
                            <label for="">Cargo Type</label>
                            <select name="cargo_type_id"  id="cargo_type_id" required class="form-control">
                                <option value="-1" disabled selected>Choose</option>
                                @foreach ($cargo_type as $row)
                                <option value="{{$row->cargo_type_id}}"
                                    {{ $res->cargo_type_id==$row->cargo_type_id ? 'selected' : '' }}>
                                    {{$row->cargo_type_name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- -->
                        <div class="form-group col-sm-4">
                            <label for="">Loading Region</label>
                            <select name="loading_region_id" id="loading_region_id" required class="form-control">
                                <option value="-1" disabled selected>Choose</option>
                                @foreach ($region as $row)
                                <option value="{{$row->region_id}}"
                                    {{ $res->loading_region_id==$row->region_id ? 'selected' : '' }}>
                                    {{$row->region_name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- -->
                        <div class="form-group col-sm-4 mt-4">
                            <label for="">Loading Country</label>
                            <select name="loading_country_id" id="loading_country_id" required class="form-control">
                                <option value="-1" disabled selected>Choose</option>
                                @foreach ($country as $row)
                                <option value="{{$row->country_id}}"
                                    {{ $res->loading_country_id==$row->country_id ? 'selected' : '' }}>
                                    {{$row->country_name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- -->
                        <div class="form-group col-sm-4 mt-4">
                            <label for="">Loading Port#1</label>
                            <select name="loading_port_id_1" id="loading_port_id_1" required class="form-control">
                                <option value="-1" disabled selected>Choose</option>
                                @foreach ($port as $row)
                                <option value="{{$row->port_id}}"
                                    {{ $res->loading_port_id_1==$row->port_id ? 'selected' : '' }}>
                                    {{$row->port_name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- -->
                        <div class="form-group col-sm-4 mt-4">
                            <label for="">Loading Port#2</label>
                            <select name="loading_port_id_2" id="loading_port_id_2" required class="form-control">
                                <option value="-1" disabled selected>Choose</option>
                                @foreach ($port as $row)
                                <option value="{{$row->port_id}}"
                                    {{ $res->loading_port_id_2==$row->port_id ? 'selected' : '' }}>
                                    {{$row->port_name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- -->
                        <div class="form-group col-sm-4 mt-4">
                            <label for="">Discharge Region</label>
                            <select name="discharge_region_id" id="discharge_region_id" required class="form-control">
                                <option value="-1" disabled selected>Choose</option>
                                @foreach ($region as $row)
                                <option value="{{$row->region_id}}"
                                    {{ $res->discharge_region_id==$row->region_id ? 'selected' : '' }}>
                                    {{$row->region_name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- -->
                        <div class="form-group col-sm-4 mt-4">
                            <label for="">Discharge Country</label>
                            <select name="discharge_country_id" id="discharge_country_id" required class="form-control">
                                <option value="-1" disabled selected>Choose</option>
                                @foreach ($country as $row)
                                <option value="{{$row->country_id}}"
                                    {{ $res->discharge_country_id==$row->country_id ? 'selected' : '' }}>
                                    {{$row->country_name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- -->
                        <div class="form-group col-sm-4 mt-4">
                            <label for="">Discharge Port#1</label>
                            <select name="discharge_port_id_1" id="discharge_port_id_1" required class="form-control">
                                <option value="-1" disabled selected>Choose</option>
                                @foreach ($port as $row)
                                <option value="{{$row->port_id}}"
                                    {{ $res->discharge_port_id_1==$row->port_id ? 'selected' : '' }}>
                                    {{$row->port_name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- -->
                        <div class="form-group col-sm-4 mt-4">
                            <label for="">Discharge Port#2</label>
                            <select name="discharge_port_id_2" id="discharge_port_id_2" required class="form-control">
                                <option value="-1" disabled selected>Choose</option>
                                @foreach ($port as $row)
                                <option value="{{$row->port_id}}"
                                    {{ $res->discharge_port_id_2==$row->port_id ? 'selected' : '' }}>
                                    {{$row->port_name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- -->
                        <div class="form-group col-sm-4 mt-4">
                            <label for="">Laycan Date From</label>
                            <div class="input-group date" data-provide="datepicker" data-date-start-date="0d"
                                data-date-format="dd-mm-yyyy">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right datepicker" name="laycan_date_from"
                                    value="{{$res->laycan_date_from}}">
                            </div>
                        </div>
                        <!-- -->
                        <div class="form-group col-sm-4 mt-4">
                            <label for="">Laycan Date To</label>
                            <div class="input-group date" data-provide="datepicker" data-date-start-date="0d"
                                data-date-format="dd-mm-yyyy">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right datepicker" name="laycan_date_to"
                                    value="{{$res->laycan_date_to}}">
                            </div>
                        </div>
                        <!-- -->
                        <div class="col-sm-4 mt-4">
                            <div class="form-group col-sm-6">
                                <label for="">Quantity</label>
                                <input type="text" value="{{$res->quantity}}" required name="quantity"
                                    class="form-control">
                            </div>
                            <!-- -->
                            <div class="form-group col-sm-6">
                                <label for="">Unit</label>
                                <select name="unit_id"  id="unit_id" required class="form-control">
                                    <option value="-1" disabled selected>Choose</option>
                                    @foreach ($unit as $row)
                                    <option value="{{$row->unit_id}}"
                                        {{ $res->unit_id==$row->unit_id ? 'selected' : '' }}>
                                        {{$row->unit_name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- -->
                        <div class="form-group col-sm-4 mt-4">
                            <label for="">Max LOA</label>
                            <input type="text" value="{{$res->max_loa}}" required name="max_loa" class="form-control">
                        </div>
                        <!-- -->
                        <div class="form-group col-sm-4 mt-4">
                            <label for="">Max Draft</label>
                            <input type="text" value="{{$res->max_draft}}" required name="max_draft"
                                class="form-control">
                        </div>
                        <!-- -->
                        <div class="form-group col-sm-4 mt-4">
                            <label for="">Max Height</label>
                            <input type="text" value="{{$res->max_height}}" required name="max_height"
                                class="form-control">
                        </div>
                        <!-- -->
                        <div class="form-group col-sm-4 mt-4">
                            <label for="">Commission</label>
                            <input type="text" value="{{$res->commision}}" required name="commision"
                                class="form-control">
                        </div>
                        <!-- -->
                        <div class="form-group col-sm-4 mt-4 mb-4">
                            <label for="" class="mb-3">Combinable</label><br>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" id="combinable1" name="combinable"
                                    value="Yes" {{ $res->combinable=="Yes" ? 'checked' : '' }} />
                                <label class="form-check-label" for="combinable1"> Yes </label>
                            </div>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" id="combinable2" name="combinable"
                                    value="No" {{ $res->combinable=="No" ? 'checked' : '' }} />
                                <label class="form-check-label" for="combinable2"> No </label>
                            </div>
                            <!-- <label for="">Combinable</label>
                            <select name="combinable" required class="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select> -->
                        </div>
                        <!-- -->
                        <div class="form-group col-sm-4 mt-4">
                            <label for="" class="mb-3">Over Age</label><br>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" id="over_age1" name="over_age" value="Yes"
                                    {{ $res->over_age=="Yes" ? 'checked' : '' }} />
                                <label class="form-check-label" for="over_age1"> Yes </label>
                            </div>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" id="over_age2" name="over_age" value="No"
                                    {{ $res->over_age=="No" ? 'checked' : '' }} />
                                <label class="form-check-label" for="over_age2"> No </label>
                            </div>
                            <!-- <label for="">Over Age</label>
                            <select name="over_age" required class="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select> -->
                        </div>
                        <!-- -->
                        <div class="form-group col-sm-4 mt-4">
                            <label for="" class="mb-3">Hazmat</label><br>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" id="hazmat1" name="hazmat" value="Yes"
                                    {{ $res->hazmat=="Yes" ? 'checked' : '' }} />
                                <label class="form-check-label " for="hazmat1"> Yes </label>
                            </div>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" id="hazmat2" name="hazmat" value="No"
                                    {{ $res->hazmat=="No" ? 'checked' : '' }} />
                                <label class="form-check-label" for="hazmat2"> No </label>
                            </div>
                            <!-- <label for="">Hazmat</label>
                            <select name="hazmat" required class="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select> -->
                        </div>
                        <!-- -->
                        <div class="col-sm-4 mt-4">
                            <div class="form-group col-sm-6">
                                <label for="">Loading/Discharge Rates</label>
                                <input type="text" value="{{$res->loading_discharge_rates}}" required
                                    name="loading_discharge_rates" class="form-control">
                            </div>
                            <!-- -->
                            <div class="form-group col-sm-6">
                                <label for="">Loading/Discharge Unit</label>
                                <select name="loading_discharge_unit_id" id="loading_discharge_unit_id" required class="form-control">
                                    <option value="-1" disabled selected>Choose</option>
                                    @foreach ($unit as $row)
                                    <option value="{{$row->unit_id}}"
                                        {{ $res->loading_discharge_unit_id==$row->unit_id ? 'selected' : '' }}>
                                        {{$row->unit_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- -->
                        <div class="form-group col-sm-4 mt-4">
                            <label for="">Loading Equipment Req</label>
                            <input type="text" value="{{$res->loading_equipment_req}}" required
                                name="loading_equipment_req" class="form-control">
                        </div>
                        <!-- -->
                        <div class="form-group col-sm-4 mt-4">
                            <label for="">Gear Lifting Capacity</label>
                            <input type="text" value="{{$res->gear_lifting_capacity}}" required
                                name="gear_lifting_capacity" class="form-control">
                        </div>
                        <!-- -->
                        <div class="col-sm-4 mt-4">
                            <label for="">Loading/Discharge Equipment Req</label>
                            <div class="form-row pl-4  border">
                                <div class="form-group col-sm-6">
                                    <div class="mt-2">
                                        <input class="form-check-input" type="checkbox"
                                            name="loading_discharge_equipment_req[]" value="Gears"
                                            @if(strpos($res->loading_discharge_equipment_req,"Gears")!==false) checked
                                        @endif
                                        >Gears
                                    </div>
                                    <div class="mt-2">
                                        <input class="form-check-input" type="checkbox"
                                            name="loading_discharge_equipment_req[]" value="Pipes/Hoses"
                                            @if(strpos($res->loading_discharge_equipment_req,"Pipes/Hoses")!==false)
                                        checked @endif
                                        >Pipes/Hoses
                                    </div>
                                    <div class="mt-2">
                                        <input class="form-check-input" type="checkbox"
                                            name="loading_discharge_equipment_req[]" value="Dunnage"
                                            @if(strpos($res->loading_discharge_equipment_req,"Dunnage")!==false) checked
                                        @endif
                                        >Dunnage
                                    </div>
                                    <div class="mt-2">
                                        <input class="form-check-input" type="checkbox"
                                            name="loading_discharge_equipment_req[]" value="Other"
                                            @if(strpos($res->loading_discharge_equipment_req,"Other")!==false) checked
                                        @endif
                                        >Other
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <div class="mt-2">
                                        <input class="form-check-input" type="checkbox"
                                            name="loading_discharge_equipment_req[]" value="Conveyor Belt"
                                            @if(strpos($res->loading_discharge_equipment_req,"Conveyor Belt")!==false)
                                        checked @endif
                                        >Conveyor Belt
                                    </div>
                                    <div class="mt-2">
                                        <input class="form-check-input" type="checkbox"
                                            name="loading_discharge_equipment_req[]" value="Pallets"
                                            @if(strpos($res->loading_discharge_equipment_req,"Pallets")!==false) checked
                                        @endif
                                        >Pallets
                                    </div>
                                    <div class="mt-2">
                                        <input class="form-check-input" type="checkbox"
                                            name="loading_discharge_equipment_req[]" value="Pontoon Cover"
                                            @if(strpos($res->loading_discharge_equipment_req,"Pontoon Cover")!==false)
                                        checked @endif
                                        >Pontoon Cover
                                    </div>
                                </div>
                            </div>
                            <!-- <label for="">Loading/Discharge Equipment Req</label>
                            <select name="loading_discharge_equipment_req[]" multiple required class="form-control">
                                <option value="Gears">Gears</option>
                                <option value="Conveyor Belt">Conveyor Belt</option>
                                <option value="Pipes/Hoses">Pipes/Hoses</option>
                                <option value="Pallets">Pallets</option>
                                <option value="Dunnage">Dunnage</option>
                                <option value="Pontoon Cover">Pontoon Cover</option>
                                <option value="Other">Other</option>
                            </select> -->
                        </div>
                        <!--  -->
                        <div class="form-group col-sm-4 mt-4">
                            <label for="">Additional Info</label>
                            <input type="text" value="{{$res->additional_info}}" required name="additional_info" class="form-control">
                        </div>
                        <!-- -->
                        <div class="form-group col-sm-4 mt-4">
                            <label for="">Brocker Name</label>
                            <input type="text" name="brocker_name" class="form-control">
                        </div>
                        <!-- -->
                        <div class="form-group col-sm-4 mt-4">
                            <label for="">Brocker Contact #</label>
                            <input type="text" name="broacker_contact" class="form-control">
                        </div>
                        <!-- -->
                        <div class="form-group col-sm-4 mt-4">
                            <label for="">Brocker Email</label>
                            <input type="email" name="broacker_email" class="form-control">
                        </div>
                        <!-- -->

                        <div class="col-sm-12">
                            <hr>
                            <div class="">
                                <button type="submit" class="btn btn-info">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection