@extends('admin/layout/layout')

@section('page_title','contacts Listing')

@section('container')

<div class="">
	  <div class="page-title">
		 <div class="title_left">
			<h1>contact</h1>
		 </div>
	  </div>
	  <div class="clearfix"></div>
	  <div class="row">
	  		
		 <div class="col-md-12 col-sm-12 ">
			
			<div class="x_panel">
			   <div class="x_content">
				  <div class="row">
					 <div class="col-sm-12">
						<div class="card-box table-responsive">
						   <table id="datatable" class="table table-striped table-bordered" style="width:100%">
							  <thead>
								 <tr>
									<th width="5%">S.No</th>
									<th width="10%">Name</th>
									<th width="10%">Email</th>
									<th width="10%">Mobile</th>
									<th width="50%">Message</th>
									<th width="15%">Added On</th>
								 </tr>
							  </thead>
							  <tbody>
							  
								@foreach ($data as $d)
								<tr>
									<td>{{$d['id']}}</td>
									<td>{{$d['name']}}</td>
									<td>{{$d['email']}}</td>
									<td>{{$d['mobile']}}</td>
									<td>{{$d['message']}}</td>
									<td>{{$d['added_on']}}</td>
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