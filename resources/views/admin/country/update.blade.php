@extends('admin/layout/layout')

@section('page_title','Update Country')

@section('container')

<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Update Country</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 ">
            <div class="x_panel">
                <div class="x_content">
                    <br />

                    <form method="post" id="country_form" action={{route('admin.country.update_req')}} class="form-horizontal form-label-left"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="country_id" value="{{$res->country_id}}" />
                        <!--  -->
                        <input type="hidden" name="is_active" value="{{$res->is_active}}" />
                        <!--  -->
                        <div class="form-group col-sm-4">
                            <label for="">Country Name</label>
                            <input type="text" value="{{$res->country_name}}" required name="country_name"
                                class="form-control">
                        </div>
                       <!--  -->
                       <div class="form-group col-sm-4">
                            <label for="">Sort Name</label>
                            <input type="text" value="{{$res->sortname}}" required name="sortname" class="form-control" >
                        </div>
                       <!--  -->
                       <div class="form-group col-sm-4">
                            <label for="">Phone Code</label>
                            <input type="text" value="{{$res->phonecode}}" required name="phonecode" class="form-control" >
                        </div>
                       <!--  -->
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