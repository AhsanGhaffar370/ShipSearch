<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ss_cargo;
use App\Models\ss_setup_cargo_type;
use App\Models\ss_setup_region;
use App\Models\ss_setup_country;
use App\Models\ss_setup_port;
use App\Models\ss_setup_unit;

class FrontCargoController extends Controller
{
    function view(){

        $data = ss_cargo::with(['cargotype','Lcountry','Dcountry','Lregion','Dregion','Lunit','Dunit','Lport1','Lport2','Dport1','Dport2'])->get();

        $ss_setup_region= ss_setup_region::active()->get();
        $ss_setup_country= ss_setup_country::active()->get();
        $ss_setup_port= ss_setup_port::active()->get();

        return view('front/cargo/view',['data'=>$data,
                                        'region'=>$ss_setup_region,
                                        'country'=>$ss_setup_country,
                                        'port'=>$ss_setup_port]);
        // return view('front/cargo/view');
    }

    function search_req(Request $req){

        $from_date=date("d-m-Y", strtotime($req->from_date));
        $to_date=date("d-m-Y", strtotime($req->to_date));
        $from_date="01-05-2021";
        $to_date="30-05-2021";

        // echo $from_date;        

        // $data = ss_cargo::with(['cargotype','Lcountry','Dcountry','Lregion','Dregion','Lunit','Dunit','Lport1','Lport2','Dport1','Dport2'])->where('loading_region_id', $req->loading_region_id)->whereBetween('laycan_date_from', [$from_date, $to_date])->get();
        $data = ss_cargo::with(['cargotype','Lcountry','Dcountry','Lregion','Dregion','Lunit','Dunit','Lport1','Lport2','Dport1','Dport2'])->where('laycan_date_from', '>', $from_date)->where('laycan_date_from', '<', $to_date)->get();

        $ss_setup_region= ss_setup_region::active()->get();
        $ss_setup_country= ss_setup_country::active()->get();
        $ss_setup_port= ss_setup_port::active()->get();

        return view('front/cargo/view',['data'=>$data,
                                        'region'=>$ss_setup_region,
                                        'country'=>$ss_setup_country,
                                        'port'=>$ss_setup_port]);
        // return view('front/cargo/search_req');
    }

    function view_add(){
        $ss_setup_cargo_type= ss_setup_cargo_type::active()->get();
        $ss_setup_region= ss_setup_region::active()->get();
        $ss_setup_country= ss_setup_country::active()->get();
        $ss_setup_port= ss_setup_port::active()->get();
        $ss_setup_unit= ss_setup_unit::active()->get();

        return view('front/cargo/add',['cargo_type'=>$ss_setup_cargo_type,
                                        'region'=>$ss_setup_region,
                                        'country'=>$ss_setup_country,
                                        'port'=>$ss_setup_port,
                                        'unit'=>$ss_setup_unit]
                                    );
    }

    function add_req(Request $req){

        $cargo=new ss_cargo;

        $cargo->cargo_name=$req->cargo_name;
        $cargo->cargo_type_id=$req->cargo_type_id;
        $cargo->loading_region_id=$req->loading_region_id;
        $cargo->loading_country_id=$req->loading_country_id;
        $cargo->loading_port_id_1=$req->loading_port_id_1;
        $cargo->loading_port_id_2=$req->loading_port_id_2;
        $cargo->discharge_region_id=$req->discharge_region_id;
        $cargo->discharge_country_id=$req->discharge_country_id;
        $cargo->discharge_port_id_1=$req->discharge_port_id_1;
        $cargo->discharge_port_id_2=$req->discharge_port_id_2;
        $cargo->laycan_date_from=$req->laycan_date_from;
        $cargo->laycan_date_to=$req->laycan_date_to;
        $cargo->quantity=$req->quantity;
        $cargo->unit_id=$req->unit_id;
        $cargo->max_loa=$req->max_loa;
        $cargo->max_draft=$req->max_draft;
        $cargo->max_height=$req->max_height;
        $cargo->commision=$req->commision;
        $cargo->combinable=$req->combinable;
        $cargo->over_age=$req->over_age;
        $cargo->hazmat=$req->hazmat;
        $cargo->loading_discharge_rates=$req->loading_discharge_rates;
        $cargo->loading_discharge_unit_id=$req->loading_discharge_unit_id;
        $cargo->loading_equipment_req=$req->loading_equipment_req;
        $cargo->gear_lifting_capacity=$req->gear_lifting_capacity;

        // $cargo->loading_discharge_equipment_req=$req->loading_discharge_equipment_req;
        foreach ($req->loading_discharge_equipment_req as $selectedOption)
            $cargo->loading_discharge_equipment_req .= $selectedOption.", ";

        $cargo->loading_discharge_equipment_req=rtrim($cargo->loading_discharge_equipment_req, ", ");

        $cargo->additional_info=$req->additional_info;
        $cargo->is_active="1";
        $cargo->created_at=date('Y-m-d H:i:s');
        $cargo->created_by="1";
        $cargo->modified_at=date('Y-m-d H:i:s');
        $cargo->modified_by="0";
        // $cargo->created_at=date('Y-m-d H:i:sa');

        // $cargo->title=$req->brocker_name;
        // $cargo->title=$req->broacker_contact;
        // $cargo->title=$req->broacker_email;


        $cargo->save();

        $req->session()->flash('msg','Cargo Added');
        $req->session()->flash('alert','success');
        
        return redirect()->route('cargo.view');
    }

}
