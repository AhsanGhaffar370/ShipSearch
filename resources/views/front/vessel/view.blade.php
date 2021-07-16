@extends('front/layout/layout')

@section('page_title',"Vessel Charter")


@section('container')

<style>
table {
    padding: 0px;
}

.table th {
    font-size: 12px;
    /* padding: .75rem; */
    padding: 5px 8px 5px 5px;
    margin: 0px;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
    font-weight: 600;
    background-color: #c4c4c4;
}

.table td {
    /* background-color: #09cec708; */
    overflow: hidden;
    text-overflow: ellipsis;
    font-size: 12px;
    /* padding: .75rem; */
    padding: 3px 8px 3px 5px;
    margin: 0px;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
    font-weight: 600;
}

.ser_hist_req {
    cursor: pointer;
}




.my-custom-scrollbar {
    position: relative;
    height: 300px;
    overflow: auto;
}
.table-wrapper-scroll-y {
    display: block;
}
.tableFixHead { 
    overflow: auto; 
    /* height: 100px;  */
}
.tableFixHead thead th { 
    position: sticky; 
    top: 0; 
    z-index: 1; 
}
/* Just common table stuff. Really. */
table  { 
    border-collapse: collapse; 
    width: 100%; 
}
th, td { 
    padding: 8px 16px; 
}
th { 
    background:#eee; 
}

</style>

<div class="container-fluid mt-5 mb-5">

    <div class="row mb-3">
        <div class="col-12 col-lg-8 col-md-6 pt-2">
            <h1 class="size28 text-white b7 pt-2 pb-3 pl-3 bg_sec ">Vessel</h1>
        </div>
        <div class="col-12 col-lg-2 col-md-3 pt-2">
            <a id="adv_ser11" class="btn btn-info btn-block pt-3 pb-3 rounded-0 disabled" href={{route('vessel.view')}}><i
                    class="fas fa-search"></i> Advanced
                Search</a>
        </div>
        <div class="col-12 col-lg-2 col-md-3 pt-2">
            <a href={{route('vessel.view')}} id="{{session('front_uname')}}"
                class="btn btn-info btn-block pt-3 pb-3 rounded-0 add_btn disabled" ><i class="fas fa-plus"></i> Add New</a>
        </div>
    </div>


    <div class="table-wrapper-scroll-y my-custom-scrollbar">
        <div class="border">
            <table id="cargo_table21" class="table tableFixHead table-condensed table-hover table-responsive-md m-0 ">
                <thead class="" style="background-color: #EAEAEA;">
                    <tr>
                        <th width="2%">ID</th>
                        <th width="8%">Vessel Name</th>
                        <th width="10%">Laycan Date From</th>
                        <th width="10%">Laycan Date To</th>
                        <th width="15%">Region</th>
                        <th width="15%">Port</th>
                        <th width="10%">Vessel Type</th>
                        <th width="8%">Built year</th>
                        <th width="8%">Dead Weight</th>
                        <th width="10%">Posted on</th>

                        @if(session('front_uid')!="")
                        <th width="2%">Details</th>
                        @endif
                    </tr>
                </thead>

                <tbody id="all_cargo" >
                    @foreach ($data as $row)
                    <tr class="">
                        <td >{{$row->vessel_id}}</td>
                        <td >{{$row->vessel_name}}</td>
                        <td >{{date("d-M-Y", strtotime($row->laycan_date_from))}}</td>
                        <td >{{date("d-M-Y", strtotime($row->laycan_date_to))}}</td>
                        <td >{{optional($row->region)->region_name}}</td>
                        <td >{{optional($row->port)->port_name}}</td>
                        <td >{{optional($row->vesseltype)->vessel_type_name}}</td>
                        <td >{{$row->built_year}}</td>
                        <td >{{$row->deadweight}}</td>
                        <td >{{$row->created_at}}</td>

                        @if(session('front_uid')!="")
                        <td class="text-center" >
                            <a href={{route('vessel.detail.id', ['id' => $row->vessel_id])}} target="_blank" class="show_details_btn"><i class="fas fa-eye fa-2x"></i></a>
                        </td>
                        @endif

                    </tr>
                    
                    @endforeach

                </tbody>
            </table>
        </div>
        </div>
    </div>


    <div id="dialog" class="text-right rounded p-1" style="display: none;">
        <p class="size20 text-left text-white bg-danger p-2 rounded">Access Denied</p>

        <p class="text-left">
            Please <a href={{route('login')}} class="btn btn-info text=white btn-sm">Login</a> to do this action.
        </p>

        <br>
        <hr>
        <button id="close_dialog" class="btn btn-danger">Close</button>

    </div>
</div>
@endsection