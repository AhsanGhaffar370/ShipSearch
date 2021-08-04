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

        // $data = ss_cargo::get();
        // $carg12=explode(",",$data[12]->cargo_type_id);
        // print($carg12[2]);

        // $data = ss_cargo::with(['cargotype','Lcountry','Dcountry','Lregion','Dregion','Lport','Dport'])->get();
        $data = ss_cargo::active()->orderBy('cargo_id', 'DESC')->get();

        $ser_data= cargo_search_history::where('user_id',session('front_uid'))->orderBy('id', 'DESC')->get();

        $ss_setup_cargo_type= ss_setup_cargo_type::active()->get();
        $ss_setup_region= ss_setup_region::active()->get();
        $ss_setup_country= ss_setup_country::active()->get();
        $ss_setup_port= ss_setup_port::active()->get();

        return view('front/cargo/view',['data'=>$data,
                                        'ser_data'=>$ser_data,
                                        'cargo_type'=>$ss_setup_cargo_type,
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

        $data = ss_cargo::latest()->first();
        // $data = ss_cargo::latest()->take(1)->get();
        // $data = ss_cargo::orderBy('cargo_id', 'DESC')->first();

        if($data==null){
            $ref_no=25000+1;
            $ref_no="CA".$ref_no;
        }else{
            $ref_no=$data->cargo_id+1;
            $ref_no="CA".$ref_no;
        }

        return view('front/cargo/add',['cargo_ref_no'=>$ref_no,
                                        'cargo_type'=>$ss_setup_cargo_type,
                                        'region'=>$ss_setup_region,
                                        'country'=>$ss_setup_country,
                                        'port'=>$ss_setup_port,
                                        'unit'=>$ss_setup_unit]
                                    );
    }

    function add_req(Request $req){

        // dd($req->ref_no);        
        $cargo=new ss_cargo;

        
        $cargo->cargo_name=$req->cargo_name;
        $cargo->ref_no=$req->ref_no;

        foreach ($req->cargo_type_id as $selectedOption)
            $cargo->cargo_type_id .= $selectedOption.",";
        $cargo->cargo_type_id=rtrim($cargo->cargo_type_id, ",");

        foreach ($req->loading_region_id as $selectedOption)
            $cargo->loading_region_id .= $selectedOption.",";
        $cargo->loading_region_id=rtrim($cargo->loading_region_id, ",");

        foreach ($req->loading_country_id as $selectedOption)
            $cargo->loading_country_id .= $selectedOption.",";
        $cargo->loading_country_id=rtrim($cargo->loading_country_id, ",");

        foreach ($req->loading_port_id as $selectedOption)
            $cargo->loading_port_id .= $selectedOption.",";
        $cargo->loading_port_id=rtrim($cargo->loading_port_id, ",");

        foreach ($req->discharge_region_id as $selectedOption)
            $cargo->discharge_region_id .= $selectedOption.",";
        $cargo->discharge_region_id=rtrim($cargo->discharge_region_id, ",");

        foreach ($req->discharge_country_id as $selectedOption)
            $cargo->discharge_country_id .= $selectedOption.",";
        $cargo->discharge_country_id=rtrim($cargo->discharge_country_id, ",");

        foreach ($req->discharge_port_id as $selectedOption)
            $cargo->discharge_port_id .= $selectedOption.",";
        $cargo->discharge_port_id=rtrim($cargo->discharge_port_id, ",");
        
        $cargo->laycan_date_from=$req->laycan_date_from;
        $cargo->laycan_date_to=$req->laycan_date_to;
        $cargo->quantity=$req->quantity." ".$req->quantity_unit;
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
        // $cargo->gear_lifting_capacity=$req->gear_lifting_capacity." ".$req->gear_lifting_capacity_unit;
        $cargo->gear_lifting_capacity=$req->gear_lifting_capacity;
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

            // $ser_data=$req->all();
            // $ser_data['user_id']=session('front_uid');
            // cargo_search_history::create($ser_data);

            $ser_data=new cargo_search_history;
            
            $ser_data->user_id=session('front_uid');

            $ser_data->laycan_date_from=date("Y-m-d", strtotime($req->laycan_date_from));
            $ser_data->laycan_date_to=date("Y-m-d", strtotime($req->laycan_date_to));

            
            foreach ($req->cargo_type_id as $selectedOption)
                $ser_data->cargo_type_id .= $selectedOption.",";
            $ser_data->cargo_type_id=rtrim($ser_data->cargo_type_id, ",");
            $ser_cargo_type=$ser_data->cargo_type_id;

            foreach ($req->loading_region_id as $selectedOption)
                $ser_data->loading_region_id .= $selectedOption.",";
            $ser_data->loading_region_id=rtrim($ser_data->loading_region_id, ",");
            $ser_loading_region=$ser_data->loading_region_id;

            foreach ($req->loading_country_id as $selectedOption)
                $ser_data->loading_country_id .= $selectedOption.",";
            $ser_data->loading_country_id=rtrim($ser_data->loading_country_id, ",");
            $ser_loading_country=$ser_data->loading_country_id;

            foreach ($req->loading_port_id as $selectedOption)
                $ser_data->loading_port_id .= $selectedOption.",";
            $ser_data->loading_port_id=rtrim($ser_data->loading_port_id, ",");
            $ser_loading_port=$ser_data->loading_port_id;

            foreach ($req->discharge_region_id as $selectedOption)
                $ser_data->discharge_region_id .= $selectedOption.",";
            $ser_data->discharge_region_id=rtrim($ser_data->discharge_region_id, ",");
            $ser_discharge_region=$ser_data->discharge_region_id;

            foreach ($req->discharge_country_id as $selectedOption)
                $ser_data->discharge_country_id .= $selectedOption.",";
            $ser_data->discharge_country_id=rtrim($ser_data->discharge_country_id, ",");
            $ser_discharge_country=$ser_data->discharge_country_id;

            foreach ($req->discharge_port_id as $selectedOption)
                $ser_data->discharge_port_id .= $selectedOption.",";
            $ser_data->discharge_port_id=rtrim($ser_data->discharge_port_id, ",");
            $ser_discharge_port=$ser_data->discharge_port_id;

            $ser_data->created_at=date('Y-m-d H:i:s');
            $ser_data->modified_at=date('Y-m-d H:i:s');
            
            $ser_data->save();
               

            $total_rec=cargo_search_history::where("user_id",session('front_uid'))->count();

            if($total_rec>14){
                // session()->flash('msg2121','cargo Deleted');
                cargo_search_history::where('user_id',session('front_uid'))->first()->delete();
            }
        }

        $laycan_from=date("Y-m-d", strtotime($req->laycan_date_from));
        $laycan_to=date("Y-m-d", strtotime($req->laycan_date_to));  

        $data = ss_cargo::where('laycan_date_from', $laycan_from)
                        ->where('laycan_date_to', $laycan_to)
                        ->where('cargo_type_id', $ser_cargo_type)
                        ->where('loading_region_id', $ser_loading_region)
                        ->where('loading_country_id', $ser_loading_country)
                        ->where('loading_port_id', $ser_loading_port)
                        ->where('discharge_region_id', $ser_discharge_region)
                        ->where('discharge_country_id', $ser_discharge_country)
                        ->where('discharge_port_id', $ser_discharge_port)
                        ->active()
                        ->orderBy('cargo_id', 'DESC')
                        ->get();
                        // ->whereBetween($laycan_col, [$from_date, $to_date])->get();

        $ser_history= cargo_search_history::where('user_id',session('front_uid'))->orderBy('id', 'DESC')->get();


        $ss_setup_cargo_type= ss_setup_cargo_type::active()->get();
        $ss_setup_region= ss_setup_region::active()->get();
        $ss_setup_country= ss_setup_country::active()->get();
        $ss_setup_port= ss_setup_port::active()->get();

        return view('front/cargo/view',['data'=>$data,
                                        'ser_data'=>$ser_history,
                                        'cargo_type'=>$ss_setup_cargo_type,
                                        'region'=>$ss_setup_region,
                                        'country'=>$ss_setup_country,
                                        'port'=>$ss_setup_port]);
    }

    function search_req_ajax(Request $req){
        
        $ser_data= cargo_search_history::where('id',$req->id)->first();   

        $data = ss_cargo::where('cargo_type_id', $ser_data->cargo_type_id)
                        ->where('laycan_date_from', $ser_data->laycan_date_from)
                        ->where('laycan_date_to', $ser_data->laycan_date_to)
                        ->where('loading_region_id', $ser_data->loading_region_id)
                        ->where('loading_country_id', $ser_data->loading_country_id)
                        ->where('loading_port_id', $ser_data->loading_port_id)
                        ->where('discharge_region_id', $ser_data->discharge_region_id)
                        ->where('discharge_country_id', $ser_data->discharge_country_id)
                        ->where('discharge_port_id', $ser_data->discharge_port_id)
                        // ->whereBetween($req->laycan_date, [$from_date, $to_date])
                        ->active()
                        ->orderBy('cargo_id', 'DESC')
                        ->get();

        // echo "<pre>";
        echo json_encode(array('data'=>$data));
        // echo $req->lregion;

        // return view('front/cargo/view',['data'=>$data]);
    }

    function del_ser_his_req_ajax(Request $req){
        $data= cargo_search_history::find($req->id);
        if($data){
            $data->delete();
            echo "1";

        }else{
            echo "0";
        }
    }

    function get_update_hist_data(Request $req){

        $ser_data= cargo_search_history::where('id',$req->id)->first(); 

        echo json_encode(array('data'=>$ser_data));

    }

    function update_hist_data(Request $req){
        $data= cargo_search_history::find($req->id);

        $data->laycan_date_from=date("Y-m-d", strtotime($req->laycan_date_from));
        $data->laycan_date_to=date("Y-m-d", strtotime($req->laycan_date_to));
        $data->cargo_type_id= $req->cargo_type_id;
        $data->loading_region_id= $req->loading_region_id;
        $data->loading_country_id= $req->loading_country_id;
        $data->loading_port_id= $req->loading_port_id;
        $data->discharge_region_id= $req->discharge_region_id;
        $data->discharge_country_id= $req->discharge_country_id;
        $data->discharge_port_id= $req->discharge_port_id;
        $data->modified_at=date('Y-m-d H:i:s');

        $data->save();

        if($data->wasChanged('modified_at')){
            
            $ser_data = ss_cargo::where('cargo_type_id', $data->cargo_type_id)
            ->where('laycan_date_from', $data->laycan_date_from)
            ->where('laycan_date_to', $data->laycan_date_to)
            ->where('loading_region_id', $data->loading_region_id)
            ->where('loading_country_id', $data->loading_country_id)
            ->where('loading_port_id', $data->loading_port_id)
            ->where('discharge_region_id', $data->discharge_region_id)
            ->where('discharge_country_id', $data->discharge_country_id)
            ->where('discharge_port_id', $data->discharge_port_id)
            ->active()
            ->orderBy('cargo_id', 'DESC')
            ->get();

            echo json_encode(array('data'=>$ser_data));
        }
        else{
            echo false;
        }
       
    }




}
