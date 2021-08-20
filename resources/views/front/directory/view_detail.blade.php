@extends('front/layout/layout')

@section('page_title', 'Vessel Charter')


@section('container')

    <style>
        .table td {
            font-size: 12px;
            padding: 8px;
        }

    </style>

    <div class="container mt-5 mb-5">

        <div class="row mb-3">
            <div class="col-12 col-lg-10 col-md-9 pt-2">
                <h1 class="size28 text-white b7 pt-2 pb-3 pl-3 bg_sec ">Vessel</h1>
            </div>
            {{-- <div class="col-12 col-lg-2 col-md-3 pt-2">
            <a id="adv_ser11" class="btn btn-info btn-block pt-3 pb-3 rounded-0" href={{route('vessel.view')}}><i
                    class="fas fa-search"></i> Advanced
                Search</a>
        </div> --}}
            <div class="col-12 col-lg-2 col-md-3 pt-2">
                <a href={{ route('vessel.view') }} id="{{ session('front_uname') }}"
                    class="btn btn-info btn-block pt-3 pb-3 rounded-0 add_btn disabled"><i class="fas fa-plus"></i> Add New</a>
            </div>
        </div>

        <table id="cargo_table21" class="table table-striped table-condensed table-responsive-md m-0 ">

            <tbody id="all_cargo">
                {{-- @foreach ($data as $row) --}}
                {{-- <tr class="">
                        <td >{{$data->vessel_id}}</td>
                        <td >{{$data->vessel_name}}</td>
                        <td >{{date("d-M-Y", strtotime($data->laycan_date_from))}}</td>
                        <td >{{date("d-M-Y", strtotime($data->laycan_date_to))}}</td>
                        <td >{{optional($data->region)->region_name}}</td>
                        <td >{{optional($data->port)->port_name}}</td>
                        <td >{{optional($data->vesseltype)->vessel_type_name}}</td>
                        <td >{{$data->built_year}}</td>
                        <td >{{$data->deadweight}}</td>
                        <td >{{$data->created_at}}</td>
                    </tr> --}}
                <tr class="">
                    <td class="font-weight-bold">Vessel</td>
                    <td>{{ $data->vessel_name }}</td>

                    <td class="font-weight-bold">laycan date from</td>
                    <td>{{ date('d-M-Y', strtotime($data->laycan_date_from)) }}</td>
                </tr>
                <tr class="">
                    <td class="font-weight-bold">laycan date to</td>
                    <td>{{ date('d-M-Y', strtotime($data->laycan_date_to)) }}</td>

                    <td class="font-weight-bold">region</td>
                    <td>{{ optional($data->region)->region_name }}</td>
                </tr>
                <tr class="">
                    <td class="font-weight-bold">country</td>
                    <td >{{optional($data->country)->country_name}}</td>

                    <td class="font-weight-bold">port</td>
                    <td >{{optional($data->port)->port_name}}</td>
                </tr>
                <tr class="">
                    <td class="font-weight-bold">vessel type</td>
                    <td >{{optional($data->vesseltype)->vessel_type_name}}</td>

                    <td class="font-weight-bold">built year</td>
                    <td>{{ $data->built_year }}</td>
                </tr>
                <tr class="">
                    <td class="font-weight-bold">charter type</td>
                    <td >{{optional($data->chartertype)->charter_type_name}}</td>

                    <td class="font-weight-bold">dead weight</td>
                    <td>{{ $data->deadweight }}</td>
                </tr>
                <tr class="">
                    <td class="font-weight-bold">dwcc</td>
                    <td>{{ $data->dwcc }}</td>

                    <td class="font-weight-bold">imo number</td>
                    <td>{{ $data->imo_number }}</td>
                </tr>
                <tr class="">
                    <td class="font-weight-bold">call sign</td>
                    <td>{{ $data->call_sign }}</td>

                    <td class="font-weight-bold">speed ballast</td>
                    <td>{{ $data->speed_ballast }}</td>
                </tr>
                <tr class="">
                    <td class="font-weight-bold">laden</td>
                    <td>{{ $data->laden }}</td>

                    <td class="font-weight-bold">gross</td>
                    <td>{{ $data->gross }}</td>
                </tr>
                <tr class="">
                    <td class="font-weight-bold">net tonnage</td>
                    <td>{{ $data->net_tonnage }}</td>

                    <td class="font-weight-bold">loa</td>
                    <td>{{ $data->loa }}</td>
                </tr>
                <tr class="">
                    <td class="font-weight-bold">beam</td>
                    <td>{{ $data->beam }}</td>

                    <td class="font-weight-bold">draft</td>
                    <td>{{ $data->draft }}</td>
                </tr>
                <tr class="">
                    <td class="font-weight-bold">depth</td>
                    <td>{{ $data->depth }}</td>

                    <td class="font-weight-bold">grain</td>
                    <td>{{ $data->grain }}</td>
                </tr>
                <tr class="">
                    <td class="font-weight-bold">bale capacity</td>
                    <td>{{ $data->bale_capacity }}</td>

                    <td class="font-weight-bold">lane meters</td>
                    <td>{{ $data->lane_meters }}</td>
                </tr>
                <tr class="">
                    <td class="font-weight-bold">container capacity</td>
                    <td>{{ $data->container_capacity }}</td>

                    <td class="font-weight-bold">ifo</td>
                    <td>{{ $data->ifo }}</td>
                </tr>
                <tr class="">
                    <td class="font-weight-bold">ifo laden</td>
                    <td>{{ $data->ifo_laden }}</td>

                    <td class="font-weight-bold">ifo port</td>
                    <td>{{ $data->ifo_port }}</td>
                </tr>
                <tr class="">
                    <td class="font-weight-bold">mgo</td>
                    <td>{{ $data->mgo }}</td>

                    <td class="font-weight-bold">mgo laden</td>
                    <td>{{ $data->mgo_laden }}</td>
                </tr>
                <tr class="">
                    <td class="font-weight-bold">mgo port</td>
                    <td>{{ $data->mgo_port }}</td>

                    <td class="font-weight-bold">passenger capacity</td>
                    <td>{{ $data->passenger_capacity }}</td>
                </tr>
                <tr class="">
                    <td class="font-weight-bold">p i club</td>
                    <td>{{ $data->p_i_club }}</td>

                    <td class="font-weight-bold">classed by</td>
                    <td>{{ $data->classed_by }}</td>
                </tr>
                <tr class="">
                    <td class="font-weight-bold">is_active</td>
                    <td>
                        @if($data->is_active =="1")
                        <span class="badge badge-success">Active</span>
                        @else
                        <span class="badge badge-danger">In-Active</span>
                        @endif
                    </td>
                </tr>
                
                {{-- @endforeach --}}

            </tbody>
        </table>


        <div id="dialog" class="text-right rounded p-1" style="display: none;">
            <p class="size20 text-left text-white bg-danger p-2 rounded">Access Denied</p>

            <p class="text-left">
                Please <a href={{ route('login') }} class="btn btn-info text=white btn-sm">Login</a> to do this action.
            </p>

            <br>
            <hr>
            <button id="close_dialog" class="btn btn-danger">Close</button>

        </div>
    </div>
@endsection
