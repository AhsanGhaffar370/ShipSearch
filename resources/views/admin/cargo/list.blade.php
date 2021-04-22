@extends('admin/layout/layout')

@section('page_title','Post Listing')

@section('container')

<div class="">
	  <div class="page-title">
		 <div class="title_left">
			<h1>Post</h1>
			<h4><a href="/admin/post/add" class="btn btn-primary btn-md">Add Post</a></h4>
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
						<div class="card-box table-responsive">
						   <table id="datatable" class="table table-striped table-bordered" style="width:100%">
							  <thead>
								 <tr>
									<th width="2%">S.No</th>
									<th width="20%">Title</th>
									<th width="30%">Short Desc</th>
									<th width="15%">Image</th>
									<th width="10%">Date</th>
									<th width="6%">Status</th>
									<th width="22%">Action</th>
									<!-- <th>Action</th> -->
								 </tr>
							  </thead>
							  <tbody>
							  
								@foreach ($data as $d)
								<tr>
									<td>{{$d['id']}}</td>
									<td>{{$d['title']}}</td>
									<td>{{$d['short_desc']}}</td>
									<td>
									<img src="{{asset('storage/post_images/'.$d['image'])}}" class="img-thumbnail img-fluid" alt="post img" srcset="">
									</td>
									<td>{{$d['post_date']}}</td>
									<td>
									@if($d['status'] =="1")
										<span class="badge badge-success">Active</span>
									@else
										<span class="badge badge-danger">In-Active</span>
									@endif
									
									</td>
									<td>
									
									<div class="btn-group" style="display: -webkit-box;">
										<a href={{'/admin/post/update-rec/'.$d['id']}} class="btn btn-info btn-sm pt-1 pb-1">Edit</a>
										
										<button type="button" class="btn btn-info dropdown-toggle btn-sm pt-0 border-secondary border-left" data-toggle="dropdown" aria-expanded="false" style="padding-bottom: 1px !important">
											<span class="caret"></span>
											<span class="sr-only">Toggle Dropdown</span>
										</button>
										<ul class="dropdown-menu list-group" role="menu">
											@if($d['status'] =="1")
												<li><a href={{'/admin/post/update-status/'.$d["id"].'/0'}} class="list-group-item">De-Activate</a></li>
											@else
												<li><a href={{'/admin/post/update-status/'.$d["id"].'/1'}}  class="list-group-item">Activate</a></li>
											@endif
										</ul>
										<a href={{'/admin/post/delete-rec/'.$d['id']}}  class="btn btn-danger btn-sm ml-2 pt-1 pb-1 rounded">Delete</a>
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