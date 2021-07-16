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
use App\Models\cargo_search_history;

class FrontCargoController extends Controller
{
    function view(){

        $data = ss_cargo::with(['cargotype','Lcountry','Dcountry','Lregion','Dregion','Lport','Dport'])->get();

        $ser_data= cargo_search_history::with(['Lcountry','Dcountry','Lregion','Dregion','Lport','Dport'])->where('user_id',session('front_uid'))->get();

        $ss_setup_region= ss_setup_region::active()->get();
        $ss_setup_country= ss_setup_country::active()->get();
        $ss_setup_port= ss_setup_port::active()->get();

        return view('front/cargo/view',['data'=>$data,
                                        'ser_data'=>$ser_data,
                                        'region'=>$ss_setup_region,
                                        'country'=>$ss_setup_country,
                                        'port'=>$ss_setup_port]);
        // return view('front/cargo/view');
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
        $cargo->loading_port_id=$req->loading_port_id;
        // $cargo->loading_port_id_2=$req->loading_port_id_2;
        $cargo->discharge_region_id=$req->discharge_region_id;
        $cargo->discharge_country_id=$req->discharge_country_id;
        $cargo->discharge_port_id=$req->discharge_port_id;
        // $cargo->discharge_port_id_2=$req->discharge_port_id_2;
        $cargo->laycan_date_from=$req->laycan_date_from;
        $cargo->laycan_date_to=$req->laycan_date_to;
        $cargo->quantity=$req->quantity." ".$req->quantity_unit;
        // $cargo->unit_id=$req->unit_id;
        $cargo->max_loa=$req->max_loa." ".$req->max_loa_unit;
        $cargo->max_draft=$req->max_draft." ".$req->max_draft_unit;
        $cargo->max_height=$req->max_height." ".$req->max_height_unit;
        $cargo->commision=$req->commision;
        $cargo->combinable=$req->combinable;
        $cargo->over_age=$req->over_age;
        $cargo->hazmat=$req->hazmat;
        $cargo->loading_discharge_rates=$req->loading_discharge_rates." ".$req->loading_discharge_rates_unit;
        // $cargo->loading_discharge_unit_id=$req->loading_discharge_unit_id;
        $cargo->loading_equipment_req=$req->loading_equipment_req;
        $cargo->gear_lifting_capacity=$req->gear_lifting_capacity." ".$req->gear_lifting_capacity_unit;
        $cargo->discharge_equipment_req=$req->discharge_equipment_req;

        // $cargo->loading_discharge_equipment_req=$req->loading_discharge_equipment_req;
        // foreach ($req->loading_discharge_equipment_req as $selectedOption)
        //     $cargo->loading_discharge_equipment_req .= $selectedOption.", ";
        // $cargo->loading_discharge_equipment_req=rtrim($cargo->loading_discharge_equipment_req, ", ");

        $cargo->additional_info=$req->additional_info;
        $cargo->is_active="1";
        $cargo->created_at=date('Y-m-d H:i:s');
        $cargo->created_by=session('front_uid');
        $cargo->modified_at=date('Y-m-d H:i:s');
        $cargo->modified_by=session('front_uid');
        // $cargo->created_at=date('Y-m-d H:i:sa');

        // $cargo->title=$req->brocker_name;
        // $cargo->title=$req->broacker_contact;
        // $cargo->title=$req->broacker_email;


        $cargo->save();

        $req->session()->flash('msg','Cargo Added');
        $req->session()->flash('alert','success');
        
        return redirect()->route('cargo.view');
    }


    function search_req(Request $req){

        if(session('front_uid')!=""){

            $ser_data=$req->all();
            $ser_data['user_id']=session('front_uid');
            cargo_search_history::create($ser_data);   

            $total_rec=cargo_search_history::where("user_id",session('front_uid'))->count();

            if($total_rec>8)
            {
                // session()->flash('msg2121','cargo Deleted');
                cargo_search_history::where('user_id',session('front_uid'))->first()->delete();
            }
        }

        $laycan_col="";
        if($req->laycan_date=="laycan_date_from"){
            $laycan_col="laycan_date_from";
        }
        if($req->laycan_date=="laycan_date_to"){
            $laycan_col="laycan_date_to";
        }

        $from_date=date("Y-m-d", strtotime($req->from_date));
        $to_date=date("Y-m-d", strtotime($req->to_date));      

        $data = ss_cargo::with(['cargotype','Lcountry','Dcountry','Lregion','Dregion','Lport','Dport'])
                        ->where('loading_region_id', $req->loading_region_id)
                        ->where('loading_country_id', $req->loading_country_id)
                        ->where('loading_port_id', $req->loading_port_id)
                        ->where('discharge_region_id', $req->discharge_region_id)
                        ->where('discharge_country_id', $req->discharge_country_id)
                        ->where('discharge_port_id', $req->discharge_port_id)
                        ->whereBetween($laycan_col, [$from_date, $to_date])->get();

        $ser_data= cargo_search_history::with(['Lcountry','Dcountry','Lregion','Dregion','Lport','Dport'])->where('user_id',session('front_uid'))->get();


        $ss_setup_region= ss_setup_region::active()->get();
        $ss_setup_country= ss_setup_country::active()->get();
        $ss_setup_port= ss_setup_port::active()->get();

        return view('front/cargo/view',['data'=>$data,
                                        'ser_data'=>$ser_data,
                                        'region'=>$ss_setup_region,
                                        'country'=>$ss_setup_country,
                                        'port'=>$ss_setup_port]);
    }

    function search_req_ajax(Request $req){
        // echo $req->laycan_date;

        $from_date=date("Y-m-d", strtotime($req->from_date));
        $to_date=date("Y-m-d", strtotime($req->to_date));      

        $data = ss_cargo::with(['cargotype','Lcountry','Dcountry','Lregion','Dregion','Lport','Dport'])
                        ->where('loading_region_id', $req->lregion) // yha id jaegi 
                        ->where('loading_country_id', $req->lcountry)
                        ->where('loading_port_id', $req->lport)
                        ->where('discharge_region_id', $req->dregion)
                        ->where('discharge_country_id', $req->dcountry)
                        ->where('discharge_port_id', $req->dport)
                        ->whereBetween($req->laycan_date, [$from_date, $to_date])
                        ->get();

        // echo "<pre>";
        echo json_encode(array('data'=>$data));
        // echo $req->lregion;

        // return view('front/cargo/view',['data'=>$data]);
    }




}
