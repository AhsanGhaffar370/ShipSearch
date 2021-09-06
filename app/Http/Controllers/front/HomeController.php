<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ss_setup_cargo_type;
use App\Models\ss_setup_vessel_type;
use App\Models\ss_setup_charter_type;
use App\Models\ss_setup_region;
use App\Models\ss_setup_country;
use App\Models\ss_setup_port;

class HomeController extends Controller
{
    
    function view(){
        $ss_setup_cargo_type= ss_setup_cargo_type::active()->ascend()->get();
        $ss_setup_vessel_type= ss_setup_vessel_type::active()->ascend()->get();
        $ss_setup_charter_type= ss_setup_charter_type::active()->ascend()->get();
        $ss_setup_region= ss_setup_region::active()->ascend()->get();
        $ss_setup_country= ss_setup_country::active()->ascend()->get();
        $ss_setup_port= ss_setup_port::active()->ascend()->get();

        return view('front/home',['cargo_type'=>$ss_setup_cargo_type,
                                'vessel_type'=>$ss_setup_vessel_type,
                                'charter_type'=>$ss_setup_charter_type,
                                'region'=>$ss_setup_region,
                                'country'=>$ss_setup_country,
                                'port'=>$ss_setup_port]);
    }
}
