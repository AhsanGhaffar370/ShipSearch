<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ss_vessel;
use App\Models\ss_setup_vessel_type;
use App\Models\ss_setup_charter_type;
use App\Models\ss_setup_region;
use App\Models\ss_setup_country;
use App\Models\ss_setup_port;

class FrontVesselController extends Controller
{
    function view(){

        $data = ss_vessel::with(['vesseltype','vesseltype','country','region','port'])->get();

        // dd($data);
        return view('front/vessel/view',['data'=>$data]);
        // return view('front/vessel/view');
    }

    function view_detail($id){

        $data=ss_vessel::find($id)->with(['vesseltype','vesseltype','country','region','port'])->first();
        // $data = ss_vessel::with(['vesseltype','vesseltype','country','region','port'])->where("vessel_id",$id)->first();

        // dd($data);
        return view('front/vessel/view_detail',['data'=>$data]);
        // return view('front/vessel/view');
    }
}
