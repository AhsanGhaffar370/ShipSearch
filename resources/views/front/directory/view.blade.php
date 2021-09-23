@extends('front/layout/layout')

@section('page_title',"Directory")


@section('container')

<style>
    #directory_table_filter{
        position: fixed;
        right: 3%;
        /* top: 0px; */
        margin-top: -43px;
    }
</style>


<div class="container-fluid bg-color pt-2 pb-2">



       

    {{-- ////////////////////////////////// --}}
    {{-- Directory of company Table Records --}}
    {{-- ////////////////////////////////// --}}
    <div class="bg-white mt-2 pt-2">
        <span id="total_rec_found" class="font-weight-bold pt-3 pl-2"> {{ sizeof($data) }} TOTAL RESULTS</span>

        <a href={{ route('directory.view') }} class="btn btn_style bg_gd ml-3 pl-2 pr-2"><i
                class="fas fa-sync-alt"></i></a>

        <div class="table-wrapper-scroll-y mt-3" style="position: relative; min-height: 100px !important; max-height: 290px !important; overflow: auto;">
            {{-- <div class="border"> --}}
                <table id="directory_table" class="table tableFixHead table-condensed table-hover table-responsive-md m-0 ">
                    <thead>
                        <tr>
                            <th width="5%">ID</th>
                            <th width="15%">company Name</th>
                            <th width="15%">Website</th>
                            <th width="15%">Email</th>
                            <th width="15%">Phone No</th>
                            <th width="20%">Address</th>

                            @if (session('front_uid') != '')
                                <th width="2%">Details</th>
                            @endif
                        </tr>
                    </thead>

                    <tbody id="all_records">
                        @if (sizeof($data) < 1)
                            <tr class="">
                                <td colspan="11"><i>No exact results. Try expanding your filters</i></td>
                            </tr>
                        @else
                            @foreach ($data as $row)
                                {{-- @if ($fuser_id == "#".$row->company_id) --}}
                                    {{-- <tr id="{{$row->company_id}}" style="color:white !important ;background-color: #555555 !important;"> --}}
                                {{-- @else --}}
                                <tr id="{{$row->company_id}}" class="company_id_{{$row->company_id}}">
                                {{-- @endif --}}
                                    <td>
                                        <div class="td_h">
                                            {{ $row->company_id }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="td_h">
                                            {{ $row->company_name }}
                                        </div>
                                        {{--  --}}
                                        <div class="show_details show_details_{{ $row->company_id }} tr_bg_cl d_n">
                                            <p class="b7 mb-0">Region:</p>
                                            <p class="">{{ optional($row->DirRegion)->region_name }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="td_h">
                                            {{ $row->website }}
                                        </div>
                                        {{--  --}}
                                        <div class="show_details show_details_{{ $row->company_id }} tr_bg_cl d_n">
                                            <p class="b7 mb-0">Country:</p>
                                            <p class="">{{ optional($row->DirCountry)->country_name }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="td_h">
                                            {{ $row->email }}
                                        </div>
                                        {{--  --}}
                                        <div class="show_details show_details_{{ $row->company_id }} tr_bg_cl d_n">
                                            <p class="b7 mb-0">Port:</p>
                                            <p class="">{{ optional($row->DirPort)->port_name }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="td_h">
                                            {{ $row->phone }}
                                        </div>
                                        {{--  --}}
                                        <div class="show_details show_details_{{ $row->company_id }} tr_bg_cl d_n">
                                            <p class="b7 mb-0">Contact Person Name:</p>
                                            @if($row->contact_person_first_name!='Not Available')
                                                <p class="">{{ $row->contact_person_first_name." ".$row->contact_person_last_name }}</p>
                                            @else
                                                <p class=""></p>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="td_h">
                                            {{ $row->bussiness_address }}
                                        </div>
                                        {{--  --}}
                                        <div class="show_details show_details_{{ $row->company_id }} tr_bg_cl d_n">
                                            <p class="b7 mb-0">Fax:</p>
                                            <p class="">{{ $row->fax }}</p>
                                        </div>
                                    </td>
                                    @if (session('front_uid') != '')
                                        <td class="text-center">
                                            <a href='{{ $row->company_id }}'
                                                class="show_detail_btn show_detail_btn_{{ $row->company_id }}"><i
                                                    class="fas fa-eye fa-2x"></i></a>
                                            <a href='{{ $row->company_id }}'
                                                class="hide_detail_btn hide_detail_btn_{{ $row->company_id }}"><i
                                                    class="fas fa-eye-slash fa-2x"></i></a>
                                            {{--  --}}
                                            <div class="show_details show_details_{{ $row->company_id }} tr_bg_cl d_n">
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            {{-- </div> --}}
        </div>
    </div>
</div>


{{-- Access Denied message --}}
{{-- <div id="dialog" class="text-right rounded p-1 d_n">
    <p class="size20 text-left text-white bg-danger p-2 rounded">Access Denied</p>
    <p class="text-left">
        Please <a href={{ route('login') }} class="btn btn-info text=white btn-sm">Login</a> to do this action.
    </p>
    <br>
    <hr>
    <button id="close_dialog" class="btn btn-danger">Close</button>
</div> --}}

@endsection