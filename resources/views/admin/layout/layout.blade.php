<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>@yield('page_title')</title>

      <!-- bootstrap -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
      
      <!-- font awesome -->
      <script src="https://kit.fontawesome.com/7516c4b4cc.js" crossorigin="anonymous"></script>

      <!-- custom css -->
      <link href="{{ asset('public/admin_asset/css/custom.min.css') }}" rel="stylesheet">
      <link href="{{ asset('public/admin_asset/css/my_style.css') }}" rel="stylesheet">

      <!-- datatables -->
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

      <!-- datepicker -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">

      <style>
         .dropdown-toggle:after {
            color:white;
         }
         label{
            color: black;
            font-weight: 600;
         }
         .page_height{
            min-height: 1000px !important;
         }
      </style>
   </head>
   <body class="nav-md">
      <div class="container body">
         <div class="main_container">
            <div class="col-md-3 left_col">
               <div class="left_col scroll-view">
                  <div class="navbar nav_title bg_bl" style="border: 0;">
                     <a href={{route('admin.dashboard')}} class="site_title text-center pl-2 pr-2">
                     <!-- <i class="fa fa-paw"></i> <span>ShipSearch</span> -->
                     <img src="{{asset('front_asset/images/logo-footer-short.png')}}" height="35" width="30" class="logo footer_logo" 
                     style="margin-top: -9px;">
                     <p class="d_in admin-logo">ShipSearch</p>
                     </a>
                  </div>
                  <div class="clearfix"></div>
                  <br />
                  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                     <div class="menu_section mb-3">
                        <h3 class="pt-2 pb-2 text-light bg_bl">Dashboard</h3>
                        <ul class="nav side-menu">
                           <li><a href={{route('admin.dashboard')}}><i class="fas fa-link"></i> &nbsp; Dashboard</a></li>
                        </ul>
                     </div>
                     <div class="menu_section mb-3">
                        <h3 class="pt-2 pb-2 text-light bg_bl">Modules</h3>
                        <ul class="nav side-menu">
                           <li><a href={{route('admin.cargo.view')}}><i class="fas fa-link"></i> &nbsp; Cargo </a></li>
                        </ul>
                     </div>
                     <div class="menu_section mb-3">
                        <h3 class="pt-2 pb-2 text-light bg_bl">Setups</h3>
                        <ul class="nav side-menu">
                           <li><a href={{route('admin.region.view')}}><i class="fas fa-link"></i> &nbsp; Region </a></li>
                           <li><a href={{route('admin.port.view')}}><i class="fas fa-link"></i> &nbsp; Port </a></li>
                           <li><a href={{route('admin.country.view')}}><i class="fas fa-link"></i> &nbsp; Country </a></li>
                           <li><a href={{route('admin.cargo_type.view')}}><i class="fas fa-link"></i> &nbsp; Cargo Type </a></li>
                           <li><a href={{route('admin.port.view')}}><i class="fas fa-link"></i> &nbsp; Unit </a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <!-- top navigation -->
            <div class="top_nav ">
               <div class="nav_menu bg_bd">
                  <div class="nav toggle">
                     <a id="menu_toggle"><i class="fa fa-bars text-white"></i></a>
                  </div>
                  <nav class="nav navbar-nav" style="padding: 6px 10px 6px 10px;">
                     <ul class=" navbar-right text-white">
                        <li class="nav-item dropdown open text-white" style="padding-left: 15px;">
                        
                           <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false" >
                           <span class="font-weight-bold ml-1 text-white">{{session('user_name')}}</span>
                           </a>
                           <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item "  href={{route('admin.logout')}}><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                           </div>
                        </li>
					</ul>
                  </nav>
               </div>
            </div>
            <!-- /top navigation -->
            <!-- page content -->
            <div class="right_col page_height" role="main" style="min-height: 1000px;">
               @section('container')
			   @show
            </div>
            <!-- /page content -->
            <!-- footer content -->
            <footer>
               <div class="pull-right">
               Copyright © 2018 <a href={{route('admin.dashboard')}} class="cl_bd">Ship Search</a>. All rights reserved. 
               </div>
               <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
         </div>
      </div>

      <!-- jquery -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

      <!-- bootstrap bundle -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

      <!-- custom js -->
      
      <script src="{{ asset('public/admin_asset/js/my_validation.js') }}"></script>
      <script src="{{ asset('public/admin_asset/js/icheck.min.js') }}"></script>
      <script src="{{ asset('public/admin_asset/js/custom.js') }}"></script>

      
      <!-- datepicker -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" ></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js" ></script>


      <!-- datatables -->
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>


<script>

$(document).ready(function() {
    $('#cargo_table').DataTable({
        // "paging": false,
		// "pagingType":"full_numbers",
      //   "lengthMenu":[[5,10,25],[5,10,25]],
		"lengthMenu":[[10,25,50,100,-1],[10,25,50,100,'All']],
		responsive:true,
        type: 'date'
		// stateSave: true
	});
});


   $(document).ready(function(){
      $('.page-state').click(function(e){
         e.preventDefault();

         let status_val;
         let status= $(this).html();

         let href=$(this).attr('href');
         let id=href.split('/');

         let id_val=id[id.length - 1]

         // alert(id[id.length - 1]);
         if(status == "De-Activate"){
            status_val="0";
         }else{
            status_val="1";
         }

         $.ajax({
            url: href,
            data:"id=" + id_val + "&status=" + status_val,
            type: "get",
            success: function(res){
               if(res==0){
                  $('.page-status-'+id_val).html("Activate");
                  $('.page-status-'+id_val).attr("id","1");
                  $(".badge-"+id_val).html("In-Active");
                  // $(".badge-"+id_val).attr("class","badge badge-danger");
                  $(".badge-"+id_val).removeClass("badge-success");
                  $(".badge-"+id_val).addClass("badge-danger");
               }
               if(res==1){
                  $('.page-status-'+id_val).html("De-Activate");
                  $('.page-status-'+id_val).attr("id","0");
                  $(".badge-"+id_val).html("Active");
                  // $(".badge-"+id_val).attr("class","badge badge-success");
                  $(".badge-"+id_val).removeClass("badge-danger");
                  $(".badge-"+id_val).addClass("badge-success");
               }
            }
         });
      });
   });

</script>

   </body>
</html>