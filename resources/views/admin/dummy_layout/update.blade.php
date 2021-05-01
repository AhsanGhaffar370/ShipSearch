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
                                </div>
                                <div class="form-group col-sm-6">
                                    <div class="mt-2">
                                        <input class="form-check-input" type="checkbox"
                                            name="loading_discharge_equipment_req[]" value="Conveyor Belt"
                                            @if(strpos($res->loading_discharge_equipment_req,"Conveyor Belt")!==false)
                                        checked @endif
                                        >Conveyor Belt
                                    </div>
                                </div>
                            </div>
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