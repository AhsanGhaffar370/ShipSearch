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

                    <form method="post" id="region_form" action={{route('admin.region.update_req')}} class="form-horizontal form-label-left"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="region_id" value="{{$res->region_id}}" />
                        <!--  -->
                        <input type="hidden" name="is_active" value="{{$res->is_active}}" />
                        <!--  -->
                        <div class="form-group col-sm-4">
                            <label for="">Region Name</label>
                            <input type="text" value="{{$res->region_name}}" required name="region_name"
                                class="form-control">
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