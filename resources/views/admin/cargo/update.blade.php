@extends('admin/layout/layout')

@section('page_title','Update Post')

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
                           <form method="post" action="/admin/post/update12" class="form-horizontal form-label-left"  enctype="multipart/form-data">
                           <!-- <form method="post" action="{{url('/admin/post/add_post')}}" class="form-horizontal form-label-left"> -->
                              @csrf
                              
                              <input type="hidden" name="id" value="{{$res->id}}" />
                              <div class="form-group row ">
                                 <label class="control-label col-md-3 col-sm-3 ">Title</label>
                                 <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" placeholder="Title" name="title" value="{{$res->title}}" required>
                                 </div>
                              </div>
                              <div class="form-group row ">
                                 <label class="control-label col-md-3 col-sm-3 ">Slug</label>
                                 <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" placeholder="Slug" name="slug" value="{{$res->slug}}" required>
                                 </div>
                              </div>
                              <div class="form-group row ">
                                 <label class="control-label col-md-3 col-sm-3 ">Short Desc</label>
                                 <div class="col-md-9 col-sm-9 ">
                                    <textarea class="form-control"  name="short_desc" required>{{$res->short_desc}}</textarea>
                                 </div>
                              </div>
                              <div class="form-group row ">
                                 <label class="control-label col-md-3 col-sm-3 ">Desc</label>
                                 <div class="col-md-9 col-sm-9 ">
                                    <textarea class="form-control"  name="long_desc"  required>{{$res->long_desc}}</textarea>
                                 </div>
                              </div>
                              <div class="form-group row ">
                                 <label class="control-label col-md-3 col-sm-3 ">Image</label>
                                 <div class="col-md-9 col-sm-9 ">
                                    <input type="file" name="image" >
                                    <span class="error_field" style="color: red;">
                                       @error('image')
                                          {{$message}}
                                       @enderror
                                 </span>
                                 </div>
                                 
                              </div>
                              <div class="form-group row ">
                                 <label class="control-label col-md-3 col-sm-3 ">Post Date</label>
                                 <div class="col-md-9 col-sm-9 ">
                                    <input type="date" name="post_date" class="form-control"  value="{{$res->post_date}}"  required>
                                 </div>
                              </div>
                              <div class="ln_solid"></div>
                              <div class="form-group">
                                 <div class="col-md-9 col-sm-9  offset-md-3">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         

@endsection