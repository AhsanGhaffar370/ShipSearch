@extends('admin/layout/layout')

@section('page_title','Add Port')

@section('container')

<div class="">
    <div class="page-title">
        <div class="title_left">
            <h1>Port <span class="size16">Type</span></h1>
            <a href={{route('admin.port.view')}} class="btn btn-light border pt-2 pb-2 pl-3 pr-3">
                <i class="fas fa-eye"></i><br>
                <span class="size13">View All</span>
            </a>
            <a href={{route('admin.port.add')}} class="btn btn-light border pt-2 pb-2 pl-3 pr-3">
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
                    <form id="port_form" method="post" action={{route('admin.port.add_req')}} class="form-horizontal form-label-left "
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-sm-4">
                            <label for="">Port Name</label>
                            <input type="text" required name="port_name" class="form-control" >
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