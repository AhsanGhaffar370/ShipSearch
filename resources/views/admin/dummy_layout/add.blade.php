@extends('admin/layout/layout')

@section('page_title','Add Cargo')

@section('container')

<div class="">
    <div class="page-title">
        <div class="title_left">
            <h1>Cargo <span class="size16">Type</span></h1>
            <a href={{route('admin.cargo.view')}} class="btn btn-light border pt-2 pb-2 pl-3 pr-3">
                <i class="fas fa-eye"></i><br>
                <span class="size13">View All</span>
            </a>
            <a href={{route('admin.cargo.add')}} class="btn btn-light border pt-2 pb-2 pl-3 pr-3">
                <i class="fas fa-plus"></i><br>
                <span class="size13">Add New</span>
            </a>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 ">
            <div class="x_panel p-0">
                <p class="p-3 bg-light cl_bd size16 mb-0">Fill the required details</p>
                <div class="x_content p-3">
                    <br />
                    <form id="cargo_form" method="post" action={{route('admin.cargo.add_req')}} class="form-horizontal form-label-left "
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-sm-4">
                            <label for="">Cargo Name</label>
                            <input type="text" required name="cargo_name" class="form-control" >
                        </div>
                        <!-- -->
                        <div class="col-sm-4 mt-4">
                            <div class="form-group col-sm-6">
                                <label for="">Quantity</label>
                                <input type="text" required name="quantity" class="form-control">
                            </div>
                            <!-- -->
                            <div class="form-group col-sm-6">
                                <label for="">Unit</label>
                                <select name="unit_id"  id="unit_id" class="form-control">
                                    <option value="-1" disabled selected>Choose</option>
                                    @foreach ($unit as $row)
                                    <option value="{{$row->unit_id}}">{{$row->unit_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- -->
                        <div class="form-group col-sm-4 mt-4">
                            <label for="">Laycan Date From</label>
                            <div class="input-group date" data-provide="datepicker" data-date-start-date="0d" data-date-format="dd-mm-yyyy">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" id="laycan_date_from" required class="form-control pull-right datepicker" name="laycan_date_from"
                                    value="{{ date('d-m-Y') }}">
                            </div>
                        </div>
                        <!-- -->
                        <div class="form-group col-sm-4 mt-4">
                            <label for="" class="mb-3">Over Age</label><br>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" required id="over_age1" name="over_age"
                                    value="Yes" />
                                <label class="form-check-label" for="over_age1"> Yes </label>
                            </div>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" required id="over_age2" name="over_age"
                                    value="No" />
                                <label class="form-check-label" for="over_age2"> No </label>
                            </div>
                        </div>
                        <!-- -->
                        <div class="col-sm-4 mt-4">
                        <label for="">Loading/Discharge Equipment Req</label>
                            <div id="check_bor" class="form-row pl-4  border">
                                <div class="form-group col-sm-6">
                                    <div class="mt-2">
                                        <input class="form-check-input" type="checkbox" name="loading_discharge_equipment_req[]"
                                            value="Gears">Gears
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <div class="mt-2">
                                        <input class="form-check-input" type="checkbox" name="loading_discharge_equipment_req[]"
                                            value="Conveyor Belt">Conveyor Belt
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  -->
                        <div class="col-sm-12">
                            <hr>
                            <div class="">
                                <button type="submit" class="btn btn-info">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection