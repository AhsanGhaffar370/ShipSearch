@extends('admin/layout/layout')

@section('page_title','View Country')

@section('container')

<div class="page_height pb-5">
    <div class="page-title">
        <div class="title_left">
            <h1>Country <span class="size16">Type</span></h1>
			<a href={{route('admin.country.view')}} class="btn btn-light border pt-2 pb-2 pl-3 pr-3">
				<i class="fas fa-eye"></i><br>
				<span class="size13">View All</span> 
			</a>
			<a href={{route('admin.country.add')}} class="btn btn-light border pt-2 pb-2 pl-3 pr-3">
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
                                <table id="cargo_table" class="table table-striped table-md-responsive table-bordered" style="width:100%">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th width="10%">#</th>
                                            <th width="20%">Country Name</th>
                                            <th width="20%">Sort Name</th>
                                            <th width="20%">Phone Code</th>
                                            <th width="15%">Status</th>
                                            <th width="15%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($data as $row)
                                        <tr>
                                            <td>{{$count++}}</td>
                                            <td>{{$row->country_name}}</td>
                                            <td>{{$row->sortname}}</td>
                                            <td>{{$row->phonecode}}</td>
                                            <td>
                                                @if($row->is_active =="1")
                                                <span class="badge badge-success">Active</span>
                                                @else
                                                <span class="badge badge-danger">In-Active</span>
                                                @endif
                                            </td>

                                            <td>
                                                <div class="btn-group" style="display: -webkit-box;">
                                                    <a href={{route('admin.country.update.id', ['id' => $row->country_id])}}
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
                                                        <li><a href={{route('admin.country.update_status.id.status', ['id' => $row->country_id,'status'=>'0'])}}
                                                                class="list-group-item text-white bg-danger rounded-0 border-0">De-Activate</a></li>
                                                        @else
                                                        <li><a href={{route('admin.country.update_status.id.status', ['id' => $row->country_id,'status'=>'1'])}}
                                                                class="list-group-item text-white bg-success rounded-0 border-0">Activate</a></li>
                                                        @endif
                                                    </ul>
                                                    <!-- <a href={{--route('admin.country.delete.id', ['id' => $row->country_id])--}} class="btn btn-danger btn-sm ml-2 pt-1 pb-1 rounded"><i class="fas fa-trash-alt"></i></a> -->
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