@extends('front/layout/layout')

@section('page_title',"Directory")


@section('container')




<div class="container-fluid bg-color pt-5 pb-5">



        
    {{-- /////////////////////// --}}
    {{-- Directory Table Records --}}
    {{-- /////////////////////// --}}
    <div class="bg-white mt-2 pt-2">

        <div class="table-wrapper-scroll-y my-custom-scrollbar mt-3">
            <div class="border">
                <table
                    class="table tableFixHead table-condensed table-hover table-responsive-md m-0 ">
                    <thead>
                        <tr>
                            <th width="2%">ID</th>
                            <th width="8%">Full Name</th>
                            <th width="7%">Email</th>
                            <th width="7%">Company Name</th>
                            <th width="8%">Phone No</th>
                            <th width="8%">Mail Address</th>
                            <th width="10%">Country</th>

                        </tr>
                    </thead>

                    <tbody id="all_records">
                        @if (sizeof($data) < 1)
                            <tr class="">
                                <td colspan="11"><i>No Data Found</i></td>
                            </tr>
                        @else
                            @foreach ($data as $row)
                                <tr class="">
                                    <td width="5%" >{{$row->user_id}}</td>
                                    <td width="8%" >{{$row->first_name}}</td>
                                    <td width="8%" >{{$row->email}}</td>
                                    <td width="8%" >{{$row->company_name}}</td>
                                    <td width="8%" >{{$row->phone}}</td>
                                    <td width="8%" >{{$row->mail_address}}</td>
                                    <td width="8%" >{{$row->country_id}}</td>

                                    {{-- @if (session('front_uid') != '')
                                        <td width="10%" class="text-center">
                                            <a href='{{ $row->vessel_id }}'
                                                class="show_detail_btn show_detail_btn_{{ $row->vessel_id }}"><i
                                                    class="fas fa-eye fa-2x"></i></a>
                                            <a href='{{ $row->vessel_id }}'
                                                class="hide_detail_btn hide_detail_btn_{{ $row->vessel_id }}"><i
                                                    class="fas fa-eye-slash fa-2x"></i></a>
                                        </td>
                                    @endif --}}

                                </tr>
                                {{-- <tr class="show_details show_details_{{ $row->vessel_id }} tr_bg_cl d_n">
                                    <td>
                                        <p class="b7 mb-0">Built Year:</p>
                                        <p class="">{{ $row->built_year }}</p>
                                        <p class="b7 mb-0">DWT:</p>
                                        <p class="">{{ $row->dwt }}</p>
                                        <p class="b7 mb-0">DWCC</p>
                                        <p class="">{{ $row->dwcc }}</p>
                                    </td>
                                    <td></td>
                                </tr> --}}
                            @endforeach
                        @endif

                    </tbody>
                </table>
            </div>
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