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
use App\Models\ss_setup_region_country_port;

// working
use App\Models\rel_cargo_lregion;
use App\Models\rel_ser_cargo_lregion;

class FrontCargoController extends Controller
{
    function view(){

        // $data = ss_cargo::with(['Lregion'])->active()->get();
        // dd($data[0]->Lregion->id);
        // dd($data[0]->Loadregion[0]->region_id->region_name);
        // dd($data[0]->Lregion[0]->CAregion->region_name);
        // $data1 = ss_cargo::all();
        // dd($data1->Loadregion->id);



        // $data = ss_cargo::get();
        // $carg12=explode(",",$data[12]->cargo_type_id);
        // print($carg12[2]);

        // $data = ss_cargo::with(['cargotype','Lcountry','Dcountry','Lregion','Dregion','Lport','Dport'])->get();

        $data = ss_cargo::with(['Lregion'])->active()->orderBy('cargo_id', 'DESC')->get();//working
        // $data = ss_cargo::active()->orderBy('cargo_id', 'DESC')->get();//present

        

        $ser_data= cargo_search_history::with(['Lregion'])->where('user_id',session('front_uid'))->orderBy('id', 'DESC')->get();//working
        // $ser_data= cargo_search_history::where('user_id',session('front_uid'))->orderBy('id', 'DESC')->get(); //present

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
        $data=new ss_cargo;

        
        $data->cargo_name=$req->cargo_name;
        $data->ref_no=$req->ref_no;

        foreach ($req->cargo_type_id as $selectedOption)
            $data->cargo_type_id .= $selectedOption.",";
        $data->cargo_type_id=rtrim($data->cargo_type_id, ",");

        foreach ($req->loading_region_id as $selectedOption)
            $data->loading_region_id .= $selectedOption.",";
        $data->loading_region_id=rtrim($data->loading_region_id, ",");

        foreach ($req->loading_country_id as $selectedOption)
            $data->loading_country_id .= $selectedOption.",";
        $data->loading_country_id=rtrim($data->loading_country_id, ",");

        foreach ($req->loading_port_id as $selectedOption)
            $data->loading_port_id .= $selectedOption.",";
        $data->loading_port_id=rtrim($data->loading_port_id, ",");

        foreach ($req->discharge_region_id as $selectedOption)
            $data->discharge_region_id .= $selectedOption.",";
        $data->discharge_region_id=rtrim($data->discharge_region_id, ",");

        foreach ($req->discharge_country_id as $selectedOption)
            $data->discharge_country_id .= $selectedOption.",";
        $data->discharge_country_id=rtrim($data->discharge_country_id, ",");

        foreach ($req->discharge_port_id as $selectedOption)
            $data->discharge_port_id .= $selectedOption.",";
        $data->discharge_port_id=rtrim($data->discharge_port_id, ",");
        
        $data->laycan_date_from=$req->laycan_date_from;
        $data->laycan_date_to=$req->laycan_date_to;
        $data->quantity=$req->quantity." ".$req->quantity_unit;
        $data->max_loa=$req->max_loa." ".$req->max_loa_unit;
        $data->max_draft=$req->max_draft." ".$req->max_draft_unit;
        $data->max_height=$req->max_height." ".$req->max_height_unit;
        $data->commision=$req->commision;
        $data->combinable=$req->combinable;
        $data->over_age=$req->over_age;
        $data->hazmat=$req->hazmat;
        $data->loading_discharge_rates=$req->loading_discharge_rates." ".$req->loading_discharge_rates_unit;
        // $data->loading_discharge_unit_id=$req->loading_discharge_unit_id;
        $data->loading_equipment_req=$req->loading_equipment_req;
        // $data->gear_lifting_capacity=$req->gear_lifting_capacity." ".$req->gear_lifting_capacity_unit;
        $data->gear_lifting_capacity=$req->gear_lifting_capacity;
        $data->discharge_equipment_req=$req->discharge_equipment_req;

        // $data->loading_discharge_equipment_req=$req->loading_discharge_equipment_req;
        // foreach ($req->loading_discharge_equipment_req as $selectedOption)
        //     $data->loading_discharge_equipment_req .= $selectedOption.", ";
        // $data->loading_discharge_equipment_req=rtrim($data->loading_discharge_equipment_req, ", ");

        $data->additional_info=$req->additional_info;
        $data->is_active="1";
        $data->created_at=date('Y-m-d H:i:s');
        $data->created_by=session('front_uid');
        $data->modified_at=date('Y-m-d H:i:s');
        $data->modified_by=session('front_uid');
        // $data->created_at=date('Y-m-d H:i:sa');

        // $data->title=$req->brocker_name;
        // $data->title=$req->broacker_contact;
        // $data->title=$req->broacker_email;


        $data->save();

             
        

        //working
        foreach ($req->loading_region_id as $selectedOption){
            $data_Lregion=new rel_cargo_lregion;
            $data_Lregion->cargo_id = ss_cargo::latest()->first()->cargo_id;
            $data_Lregion->lregion_id = $selectedOption;
            $data_Lregion->save();
        }

        $req->session()->flash('msg','Cargo Added');
        $req->session()->flash('alert','success');
        
        return redirect()->route('cargo.view');
    }


    function search_req(Request $req){

        $laycan_from=date("Y-m-d", strtotime($req->laycan_date_from));
        $laycan_to=date("Y-m-d", strtotime($req->laycan_date_to)); 

        $ser_cargo_type="";
        foreach ($req->cargo_type_id as $selectedOption)
            $ser_cargo_type .= $selectedOption.",";
        $ser_cargo_type=rtrim($ser_cargo_type, ",");

        $ser_loading_region="";
        foreach ($req->loading_region_id as $selectedOption)
            $ser_loading_region .= $selectedOption.",";
        $ser_loading_region=rtrim($ser_loading_region, ",");
        
        $ser_loading_country="";
        foreach ($req->loading_country_id as $selectedOption)
            $ser_loading_country .= $selectedOption.",";
        $ser_loading_country=rtrim($ser_loading_country, ",");
        
        $ser_loading_port="";
        foreach ($req->loading_port_id as $selectedOption)
            $ser_loading_port .= $selectedOption.",";
        $ser_loading_port=rtrim($ser_loading_port, ",");
        
        $ser_discharge_region="";
        foreach ($req->discharge_region_id as $selectedOption)
            $ser_discharge_region .= $selectedOption.",";
        $ser_discharge_region=rtrim($ser_discharge_region, ",");
        
        $ser_discharge_country="";
        foreach ($req->discharge_country_id as $selectedOption)
            $ser_discharge_country .= $selectedOption.",";
        $ser_discharge_country=rtrim($ser_discharge_country, ",");
        
        $ser_discharge_port="";
        foreach ($req->discharge_port_id as $selectedOption)
            $ser_discharge_port .= $selectedOption.",";
        $ser_discharge_port=rtrim($ser_discharge_port, ",");
        
        
        if(session('front_uid')!=""){

            // $ser_data=$req->all();
            // $ser_data['user_id']=session('front_uid');
            // cargo_search_history::create($ser_data);
            $ser_data=new cargo_search_history;

            $ser_data->user_id=session('front_uid');
            $ser_data->laycan_date_from=$laycan_from;
            $ser_data->laycan_date_to=$laycan_to;
            $ser_data->cargo_type_id=$ser_cargo_type;
            $ser_data->loading_region_id=$ser_loading_region;
            $ser_data->loading_country_id=$ser_loading_country;
            $ser_data->loading_port_id=$ser_loading_port;
            $ser_data->discharge_region_id=$ser_discharge_region;
            $ser_data->discharge_country_id=$ser_discharge_country;
            $ser_data->discharge_port_id=$ser_discharge_port;
            $ser_data->created_at=date('Y-m-d H:i:s');
            $ser_data->modified_at=date('Y-m-d H:i:s');
            
            $ser_data->save();

             //working
            foreach ($req->loading_region_id as $selectedOption){
                $ser_data_Lregion=new rel_ser_cargo_lregion;
                $ser_data_Lregion->ser_cargo_id = cargo_search_history::latest()->first()->id;
                $ser_data_Lregion->lregion_id = $selectedOption;
                $ser_data_Lregion->save();
            }

            $total_rec=cargo_search_history::where("user_id",session('front_uid'))->count();

            if($total_rec>14){
                // session()->flash('msg2121','cargo Deleted');
                cargo_search_history::where('user_id',session('front_uid'))->first()->delete();
            }
        }

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

    function get_country(Request $req){

        $data=[];
        $arr=explode(",",$req->region_country_id);
        // $arr1=explode(",",$req->country_id);
        
        // $data = ss_setup_region_country_port::with(['Lregion'])->active()->orderBy('cargo_id', 'DESC')->get();
  
        if(strpos($req->country_port_name, 'country') !== false){
            $data = ss_setup_region_country_port::select('country_id')->with(['country_rel'])->whereIn('region_id',$arr)->groupBy('country_id')->orderBy('country_id', 'ASC')->get();
        }
        else if (strpos($req->country_port_name, 'port') !== false){
            $data = ss_setup_region_country_port::select('port_id')->with(['port_rel'])->whereIn('country_id',$arr)->groupBy('port_id')->orderBy('port_id', 'ASC')->get();
        }
            
        // $data[0]=$data1;
        // $data[1]=$data2;

        // echo json_encode(array('data'=>$data));
        echo $data;
        // echo gettype($arr);
    }




}
