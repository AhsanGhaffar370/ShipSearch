<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\ss_cargo;

use App\Models\ss_setup_vessel_type;
use App\Models\ss_setup_charter_type;
use App\Models\ss_setup_cargo_type;
use App\Models\ss_setup_region;
use App\Models\ss_setup_country;
use App\Models\ss_setup_port;
use App\Models\cargo_search_history;
use App\Models\ss_setup_region_country_port;

// working
use App\Models\rel_cargo_cargotype;
use App\Models\rel_cargo_lregion;
use App\Models\rel_cargo_dregion;
use App\Models\rel_cargo_lcountry;
use App\Models\rel_cargo_dcountry;
use App\Models\rel_cargo_lport;
use App\Models\rel_cargo_dport;

use App\Models\rel_ser_cargo_cargotype;
use App\Models\rel_ser_cargo_lregion;
use App\Models\rel_ser_cargo_dregion;
use App\Models\rel_ser_cargo_lcountry;
use App\Models\rel_ser_cargo_dcountry;
use App\Models\rel_ser_cargo_lport;
use App\Models\rel_ser_cargo_dport;

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

        $data = ss_cargo::with(['user_info','cargotype','Lregion','Dregion','Lcountry','Dcountry','Lport','Dport'])
                        ->active()
                        ->orderBy('cargo_id', 'DESC')
                        ->get();//working
        
        // $data = ss_cargo::active()->orderBy('cargo_id', 'DESC')->get();//present
        
        // dd($data[4]->Lregion[0]->CAregion->region_name);
        // dd($data[0]->user_info->email);



        // $arr = ["cargo_type_id", "loading_region_id", "loading_country_id", "loading_port_id",
        // "discharge_region_id", "discharge_country_id", "discharge_port_id"
        //             ];
        // $rname=array();

        // echo "<pre>";
        // foreach ($data as $row){
        //     foreach ($row->Lregion as $row2){
        //         $rname[$arr[1]][$row->cargo_id][]=$row2->CAregion->region_name;
        //     }   
        // }
        // foreach ($data as $row){
        //     foreach ($row->Lregion as $row2){
        //         $rname[$arr[4]][$row->cargo_id][]=$row2->CAregion->region_name;
        //     }   
        // }
        // print_r($rname);


        // $ser_data= cargo_search_history::with(['Lregion'])->get();//working
        $ser_data= cargo_search_history::with(['cargotype','Lregion','Dregion','Lcountry','Dcountry','Lport','Dport'])
                                        ->where('user_id',session('front_uid'))->orderBy('id', 'DESC')->get();
        // $ser_data= cargo_search_history::where('user_id',session('front_uid'))->orderBy('id', 'DESC')->get(); //present

        // dd($ser_data[0]->Lregion[0]->SCAlregion->region_name);

        $ss_setup_cargo_type= ss_setup_cargo_type::where('cargo_type_name','!=','Any')->active()->ascend()->get();
        $ss_setup_region= ss_setup_region::where('region_name','!=','Any')->active()->ascend()->get();
        $ss_setup_country= ss_setup_country::where('country_name','!=','Any')->active()->ascend()->get();
        $ss_setup_port= ss_setup_port::where('port_name','!=','Any')->active()->ascend()->get();

        // dd($data[0]->cargotype[count($data[0]->cargotype)-1]->CAcargotype->cargo_type_name);

        return view('front/cargo/view',['data'=>$data,
                                        'ser_data'=>$ser_data,
                                        'cargo_type'=>$ss_setup_cargo_type,
                                        'region'=>$ss_setup_region,
                                        'country'=>$ss_setup_country,
                                        'port'=>$ss_setup_port]);
        // return view('front/cargo/view');
    }


    function view_add(){
        $ss_setup_cargo_type= ss_setup_cargo_type::where('cargo_type_name','!=','Any')->active()->ascend()->get();
        $ss_setup_region= ss_setup_region::where('region_name','!=','Any')->active()->ascend()->get();
        $ss_setup_country= ss_setup_country::where('country_name','!=','Any')->active()->ascend()->get();
        $ss_setup_port= ss_setup_port::where('port_name','!=','Any')->active()->ascend()->get();

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
                                        'port'=>$ss_setup_port]
                                    );
    }

    function add_req(Request $req){

        // dd($req->ref_no);        
        $data=new ss_cargo;


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
        $data->stowage_factor=$req->stowage_factor." ".$req->stowage_factor_unit;
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

        $data->additional_info=$req->additional_info;
        $data->is_active="1";
        // $data->created_at=date('Y-m-d H:i:s');
        $data->created_by=session('front_uid');
        // $data->modified_at=date('Y-m-d H:i:s');
        $data->modified_by=session('front_uid');
        // $data->created_at=date('Y-m-d H:i:sa');

        // $data->title=$req->brocker_name;
        // $data->title=$req->broacker_contact;
        // $data->title=$req->broacker_email;

        $data->save();
        
        $arr=["cargo_type_id","loading_region_id","loading_country_id","loading_port_id","discharge_region_id","discharge_country_id","discharge_port_id"];
        $cid= ss_cargo::latest()->first()->cargo_id;

        foreach ($arr as $ids){
            foreach ($req[$ids] as $selectedOption){
                if($ids == "cargo_type_id") { $obj=new rel_cargo_cargotype; }
                if($ids == "loading_region_id") { $obj=new rel_cargo_lregion; }
                if($ids == "loading_country_id") { $obj=new rel_cargo_lcountry; }
                if($ids == "loading_port_id") { $obj=new rel_cargo_lport; }
                if($ids == "discharge_region_id") { $obj=new rel_cargo_dregion; }
                if($ids == "discharge_country_id") { $obj=new rel_cargo_dcountry; }
                if($ids == "discharge_port_id") { $obj=new rel_cargo_dport; }

                $obj["cargo_id"] = $cid;
                $obj[$ids] = $selectedOption;
                $obj->save();
            }
        }

        $req->session()->flash('msg','Cargo Added');
        $req->session()->flash('alert','success');
    
        return redirect()->route('cargo.view');
    }


    function search_req(Request $req){

        $laycan_from=date("Y-m-d", strtotime($req->laycan_date_from));
        $laycan_to=date("Y-m-d", strtotime($req->laycan_date_to)); 

        // it's not needed for now
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
            // $ser_data->created_at=date('Y-m-d H:i:s');
            // $ser_data->modified_at=date('Y-m-d H:i:s');

            $ser_data->save();


            $arr=["cargo_type_id","loading_region_id","loading_country_id","loading_port_id","discharge_region_id","discharge_country_id","discharge_port_id"];
            $cid= cargo_search_history::latest()->first()->id;

            foreach ($arr as $ids){
                foreach ($req[$ids] as $selectedOption){
                    
                    if($ids == "cargo_type_id") { $obj=new rel_ser_cargo_cargotype; }
                    if($ids == "loading_region_id") { $obj=new rel_ser_cargo_lregion; }
                    if($ids == "loading_country_id") { $obj=new rel_ser_cargo_lcountry; }
                    if($ids == "loading_port_id") { $obj=new rel_ser_cargo_lport; }
                    if($ids == "discharge_region_id") { $obj=new rel_ser_cargo_dregion; }
                    if($ids == "discharge_country_id") { $obj=new rel_ser_cargo_dcountry; }
                    if($ids == "discharge_port_id") { $obj=new rel_ser_cargo_dport; }

                    $obj["cargo_id"] = $cid;
                    $obj[$ids] = $selectedOption;
                    $obj->save();
                }
            }

            $total_rec=cargo_search_history::where("user_id",session('front_uid'))->count();

            if($total_rec>14){
                // session()->flash('msg2121','cargo Deleted');
                cargo_search_history::where('user_id',session('front_uid'))->first()->delete();
            }
        }


        $ser_cargo_type_opt='=';
        if(strpos($ser_cargo_type, '13') !== false){
            $ser_cargo_type="abc";
            $ser_cargo_type_opt='!=';
        }
        $ser_loading_region_opt='=';
        if(strpos($ser_loading_region, '26') !== false){
            $ser_loading_region="abc";
            $ser_loading_region_opt='!=';
        }
        $ser_loading_country_opt='=';
        if(strpos($ser_loading_country, '197') !== false){
            $ser_loading_country="abc";
            $ser_loading_country_opt='!=';
        }
        $ser_loading_port_opt='=';
        if(strpos($ser_loading_port, '5638') !== false){
            $ser_loading_port="abc";
            $ser_loading_port_opt='!=';
        }
        $ser_discharge_region_opt='=';
        if(strpos($ser_discharge_region, '26') !== false){
            $ser_discharge_region="abc";
            $ser_discharge_region_opt='!=';
        }
        $ser_discharge_country_opt='=';
        if(strpos($ser_discharge_country, '197') !== false){
            $ser_discharge_country="abc";
            $ser_discharge_country_opt='!=';
        }
        $ser_discharge_port_opt='=';
        if(strpos($ser_discharge_port, '5638') !== false){
            $ser_discharge_port="abc";
            $ser_discharge_port_opt='!=';
        }

        // $cargo_type_fk=$req->cargo_type_id;
        // ->whereHas('cargotype', function($q1) use ($cargo_type_fk) {
        //     $q1->whereIn('cargo_type_id',$cargo_type_fk);
        // })
        $data = ss_cargo::with(['user_info','cargotype','Lregion','Dregion','Lcountry','Dcountry','Lport','Dport'])
                        ->where('cargo_type_id',$ser_cargo_type_opt, $ser_cargo_type)
                        ->where('loading_region_id', $ser_loading_region_opt, $ser_loading_region)
                        ->where('loading_country_id', $ser_loading_country_opt, $ser_loading_country)
                        ->where('loading_port_id', $ser_loading_port_opt, $ser_loading_port)
                        ->where('discharge_region_id', $ser_discharge_region_opt, $ser_discharge_region)
                        ->where('discharge_country_id', $ser_discharge_country_opt, $ser_discharge_country)
                        ->where('discharge_port_id', $ser_discharge_port_opt, $ser_discharge_port)
                        ->whereBetween("laycan_date_from", [$laycan_from, $laycan_to])
                        ->whereBetween("laycan_date_to", [$laycan_from, $laycan_to])
                        ->active()
                        ->orderBy('cargo_id', 'DESC')
                        ->get();
        
        
        // dd($data);
        //working
        $ser_history= cargo_search_history::with(['cargotype','Lregion','Dregion','Lcountry','Dcountry','Lport','Dport'])
                                            ->where('user_id',session('front_uid'))->orderBy('id', 'DESC')->get();
        
        
        $ss_setup_cargo_type= ss_setup_cargo_type::where('cargo_type_name','!=','Any')->active()->ascend()->get();
        $ss_setup_region= ss_setup_region::where('region_name','!=','Any')->active()->ascend()->get();
        $ss_setup_country= ss_setup_country::where('country_name','!=','Any')->active()->ascend()->get();
        $ss_setup_port= ss_setup_port::where('port_name','!=','Any')->active()->ascend()->get();
        
        return view('front/cargo/view',['data'=>$data,
                                        'ser_data'=>$ser_history,
                                        'cargo_type'=>$ss_setup_cargo_type,
                                        'region'=>$ss_setup_region,
                                        'country'=>$ss_setup_country,
                                        'port'=>$ss_setup_port]);
        
    }

    function search_req_ajax(Request $req){
      
        $ser_data= cargo_search_history::with(['cargotype','Lregion','Dregion','Lcountry','Dcountry','Lport','Dport'])
                                        ->where('id',$req->id)->first();   
        
        
        $ser_cargo_type_opt='=';
        if(strpos($ser_data->cargo_type_id, '13') !== false){
            $ser_data->cargo_type_id="abc";
            $ser_cargo_type_opt='!=';
        }
        $ser_loading_region_opt='=';
        if(strpos($ser_data->loading_region_id, '26') !== false){
            $ser_data->loading_region_id="abc";
            $ser_loading_region_opt='!=';
        }
        $ser_loading_country_opt='=';
        if(strpos($ser_data->loading_country_id, '197') !== false){
            $ser_data->loading_country_id="abc";
            $ser_loading_country_opt='!=';
        }
        $ser_loading_port_opt='=';
        if(strpos($ser_data->loading_port_id, '5638') !== false){
            $ser_data->loading_port_id="abc";
            $ser_loading_port_opt='!=';
        }
        $ser_discharge_region_opt='=';
        if(strpos($ser_data->discharge_region_id, '26') !== false){
            $ser_data->discharge_region_id="abc";
            $ser_discharge_region_opt='!=';
        }
        $ser_discharge_country_opt='=';
        if(strpos($ser_data->discharge_country_id, '197') !== false){
            $ser_data->discharge_country_id="abc";
            $ser_discharge_country_opt='!=';
        }
        $ser_discharge_port_opt='=';
        if(strpos($ser_data->discharge_port_id, '5638') !== false){
            $ser_data->discharge_port_id="abc";
            $ser_discharge_port_opt='!=';
        }
        
        // $cargo_type_fk=array();
        // foreach ($ser_data->cargotype as $row) { $cargo_type_fk[]=$row->SCAcargotype->cargo_type_id; }

        //get specific record of table
        // with(array('Lregion' => function($query) {
        //     $query->select('cargo_id');
        // }))
        $data=[];
        $data[0] = ss_cargo::with(['user_info','cargotype','Lregion','Dregion','Lcountry','Dcountry','Lport','Dport'])
                        ->where('cargo_type_id', $ser_cargo_type_opt, $ser_data->cargo_type_id)
                        // ->where('laycan_date_from', $ser_data->laycan_date_from)
                        // ->where('laycan_date_to', $ser_data->laycan_date_to)
                        ->where('loading_region_id', $ser_loading_region_opt, $ser_data->loading_region_id)
                        ->where('loading_country_id', $ser_loading_country_opt, $ser_data->loading_country_id)
                        ->where('loading_port_id', $ser_loading_port_opt, $ser_data->loading_port_id)
                        ->where('discharge_region_id', $ser_discharge_region_opt, $ser_data->discharge_region_id)
                        ->where('discharge_country_id', $ser_discharge_country_opt, $ser_data->discharge_country_id)
                        ->where('discharge_port_id', $ser_discharge_port_opt, $ser_data->discharge_port_id)
                        ->whereBetween("laycan_date_from", [$ser_data->laycan_date_from, $ser_data->laycan_date_to])
                        ->whereBetween("laycan_date_to", [$ser_data->laycan_date_from, $ser_data->laycan_date_to])
                        // ->whereBetween($req->laycan_date, [$from_date, $to_date])
                        ->active()
                        ->orderBy('cargo_id', 'DESC')
                        ->get();
        
        // javascript relationship understand nhi krta is lye relationship tables ka data alag se send kra he 
        $arr = ["cargo_type_id", "loading_region_id", "loading_country_id", "loading_port_id","discharge_region_id", "discharge_country_id", "discharge_port_id"];
        $names_fk=array();
        foreach ($data[0] as $row){
            foreach ($row->cargotype as $row2) { $names_fk[$arr[0]][$row->cargo_id][]=$row2->CAcargotype->cargo_type_name; }
            foreach ($row->Lregion as $row2) { $names_fk[$arr[1]][$row->cargo_id][]=$row2->CAlregion->region_name; }
            foreach ($row->Lcountry as $row2) { $names_fk[$arr[2]][$row->cargo_id][]=$row2->CAlcountry->country_name; }
            foreach ($row->Lport as $row2) { $names_fk[$arr[3]][$row->cargo_id][]=$row2->CAlport->port_name; }
            foreach ($row->Dregion as $row2) { $names_fk[$arr[4]][$row->cargo_id][]=$row2->CAdregion->region_name; }
            foreach ($row->Dcountry as $row2) { $names_fk[$arr[5]][$row->cargo_id][]=$row2->CAdcountry->country_name; }
            foreach ($row->Dport as $row2) { $names_fk[$arr[6]][$row->cargo_id][]=$row2->CAdport->port_name; }
        }
        $data[1]=$names_fk;

        echo json_encode(array('data'=>$data));
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

    
    function del_selected_ser_his_req_ajax(Request $req){
        
        try {
            if($req->del_type=='selected'){
                $ids=explode(',',$req->ids);
                try{
                    cargo_search_history::whereIn('id', $ids)->delete();
                    echo "1";
                }catch(\Throwable $e){
                    report($e);
                    echo "0";
                }
            }
            if($req->del_type=='all'){
                try{
                    cargo_search_history::whereNotNull('id')->delete();
                    echo "1";
                }catch(\Throwable $e){
                    report($e);
                    echo "0";
                }
            }
            
        } catch (\Throwable $e) {
            report($e);
            echo "0";
        }

    }

    function get_update_hist_data(Request $req){

        $data=[];
        $ser_data= cargo_search_history::with(['cargotype','Lregion','Dregion','Lcountry','Dcountry','Lport','Dport'])
                                        ->where('id',$req->id)->first(); 
        $data[0] =$ser_data;

        // javascript relationship understand nhi krta is lye relationship tables ka data alag se send kra he 
        $arr = ["cargo_type_id", "loading_region_id", "loading_country_id", "loading_port_id","discharge_region_id", "discharge_country_id", "discharge_port_id"];
        $ids_fk=array();
        foreach ($data[0]->cargotype as $row) { $ids_fk[$arr[0]][]=$row->SCAcargotype->cargo_type_id; }
        foreach ($data[0]->Lregion as $row) { $ids_fk[$arr[1]][]=$row->SCAlregion->region_id; }
        foreach ($data[0]->Lcountry as $row) { $ids_fk[$arr[2]][]=$row->SCAlcountry->country_id; }
        foreach ($data[0]->Lport as $row) { $ids_fk[$arr[3]][]=$row->SCAlport->port_id; }
        foreach ($data[0]->Dregion as $row) { $ids_fk[$arr[4]][]=$row->SCAdregion->region_id; }
        foreach ($data[0]->Dcountry as $row) { $ids_fk[$arr[5]][]=$row->SCAdcountry->country_id; }
        foreach ($data[0]->Dport as $row) { $ids_fk[$arr[6]][]=$row->SCAdport->port_id; }

        $names_fk=array();
        $names_fk1=array();
        foreach ($data[0]->cargotype as $row) { $names_fk[$arr[0]][]=$row->SCAcargotype->cargo_type_name; }
        foreach ($data[0]->Lregion as $row) { $names_fk[$arr[1]][]=$row->SCAlregion->region_name; }
        foreach ($data[0]->Lcountry as $row) { $names_fk[$arr[2]][]=$row->SCAlcountry->country_name; }
        foreach ($data[0]->Lport as $row) { $names_fk[$arr[3]][]=$row->SCAlport->port_name; }
        foreach ($data[0]->Dregion as $row) { $names_fk[$arr[4]][]=$row->SCAdregion->region_name; }
        foreach ($data[0]->Dcountry as $row) { $names_fk[$arr[5]][]=$row->SCAdcountry->country_name; }
        foreach ($data[0]->Dport as $row) { $names_fk[$arr[6]][]=$row->SCAdport->port_name; }

        foreach ($arr as $row){
            $names_str="";
            foreach ($names_fk[$row] as $row1){ $names_str.=$row1.","; }
            $names_fk1[$row]=rtrim($names_str,',');
        }
        
        $data[1] =$ids_fk;
        $data[2] =$names_fk1;

        echo json_encode(array('data'=>$data));
    }

    function update_hist_data(Request $req){
        $data= cargo_search_history::find($req->id);

        $data->laycan_date_from = date("Y-m-d", strtotime($req->laycan_date_from));
        $data->laycan_date_to = date("Y-m-d", strtotime($req->laycan_date_to));
        $data->cargo_type_id = $req->cargo_type_id;
        $data->loading_region_id = $req->loading_region_id;
        $data->loading_country_id = $req->loading_country_id;
        $data->loading_port_id = $req->loading_port_id;
        $data->discharge_region_id = $req->discharge_region_id;
        $data->discharge_country_id = $req->discharge_country_id;
        $data->discharge_port_id = $req->discharge_port_id;
        $data->modified_at = date('Y-m-d H:i:s');
        $data->save();

        if($data->wasChanged('modified_at')){

            //relationship tables me data delete krrhe he
            rel_ser_cargo_cargotype::where('cargo_id',$req->id)->delete();
            rel_ser_cargo_lregion::where('cargo_id',$req->id)->delete();
            rel_ser_cargo_lcountry::where('cargo_id',$req->id)->delete();
            rel_ser_cargo_lport::where('cargo_id',$req->id)->delete();
            rel_ser_cargo_dregion::where('cargo_id',$req->id)->delete();
            rel_ser_cargo_dcountry::where('cargo_id',$req->id)->delete();
            rel_ser_cargo_dport::where('cargo_id',$req->id)->delete();

            //relationship tables me data insert krrhe he
            $arr=["cargo_type_id","loading_region_id","loading_country_id","loading_port_id","discharge_region_id","discharge_country_id","discharge_port_id"];
            $req_fk=[];
            foreach ($arr as $ids){
                $req_fk[$ids]=explode(",",$req[$ids]);
                foreach ($req_fk[$ids] as $selectedOption){
                    if($ids == "cargo_type_id") { $obj=new rel_ser_cargo_cargotype; }
                    if($ids == "loading_region_id") { $obj=new rel_ser_cargo_lregion; }
                    if($ids == "loading_country_id") { $obj=new rel_ser_cargo_lcountry; }
                    if($ids == "loading_port_id") { $obj=new rel_ser_cargo_lport; }
                    if($ids == "discharge_region_id") { $obj=new rel_ser_cargo_dregion; }
                    if($ids == "discharge_country_id") { $obj=new rel_ser_cargo_dcountry; }
                    if($ids == "discharge_port_id") { $obj=new rel_ser_cargo_dport; }
                    $obj["cargo_id"] = $req->id;
                    $obj[$ids] = $selectedOption;
                    $obj->save();
                }   
            }

            // $cargo_type_fk=$req_fk['cargo_type_id'];

            
            $ser_cargo_type_opt='=';
            if(strpos($data->cargo_type_id, '13') !== false){
                $data->cargo_type_id="abc";
                $ser_cargo_type_opt='!=';
            }
            $ser_loading_region_opt='=';
            if(strpos($data->loading_region_id, '26') !== false){
                $data->loading_region_id="abc";
                $ser_loading_region_opt='!=';
            }
            $ser_loading_country_opt='=';
            if(strpos($data->loading_country_id, '197') !== false){
                $data->loading_country_id="abc";
                $ser_loading_country_opt='!=';
            }
            $ser_loading_port_opt='=';
            if(strpos($data->loading_port_id, '5638') !== false){
                $data->loading_port_id="abc";
                $ser_loading_port_opt='!=';
            }
            $ser_discharge_region_opt='=';
            if(strpos($data->discharge_region_id, '26') !== false){
                $data->discharge_region_id="abc";
                $ser_discharge_region_opt='!=';
            }
            $ser_discharge_country_opt='=';
            if(strpos($data->discharge_country_id, '197') !== false){
                $data->discharge_country_id="abc";
                $ser_discharge_country_opt='!=';
            }
            $ser_discharge_port_opt='=';
            if(strpos($data->discharge_port_id, '5638') !== false){
                $data->discharge_port_id="abc";
                $ser_discharge_port_opt='!=';
            }

            $ser_data=[];
            $ser_data[0] = ss_cargo::with(['user_info','cargotype','Lregion','Dregion','Lcountry','Dcountry','Lport','Dport'])
                                ->where('cargo_type_id', $ser_cargo_type_opt, $data->cargo_type_id)
                                ->where('loading_region_id', $ser_loading_region_opt, $data->loading_region_id)
                                ->where('loading_region_id', $ser_loading_region_opt, $data->loading_region_id)
                                ->where('loading_country_id', $ser_loading_country_opt, $data->loading_country_id)
                                ->where('loading_port_id', $ser_loading_port_opt, $data->loading_port_id)
                                ->where('discharge_region_id', $ser_discharge_region_opt, $data->discharge_region_id)
                                ->where('discharge_country_id', $ser_discharge_country_opt, $data->discharge_country_id)
                                ->where('discharge_port_id', $ser_discharge_port_opt, $data->discharge_port_id)
                                ->whereBetween("laycan_date_from", [$data->laycan_date_from, $data->laycan_date_to])
                                ->whereBetween("laycan_date_to", [$data->laycan_date_from, $data->laycan_date_to])
                                ->active()
                                ->orderBy('cargo_id', 'DESC')
                                ->get();

            // javascript relationship understand nhi krta is lye relationship tables ka data alag se send kra he 
            $arr = ["cargo_type_id", "loading_region_id", "loading_country_id", "loading_port_id","discharge_region_id", "discharge_country_id", "discharge_port_id"];
            $names_fk=array();
            foreach ($ser_data[0] as $row){
                foreach ($row->cargotype as $row2) { $names_fk[$arr[0]][$row->cargo_id][]=$row2->CAcargotype->cargo_type_name; }
                foreach ($row->Lregion as $row2) { $names_fk[$arr[1]][$row->cargo_id][]=$row2->CAlregion->region_name; }
                foreach ($row->Lcountry as $row2) { $names_fk[$arr[2]][$row->cargo_id][]=$row2->CAlcountry->country_name; }
                foreach ($row->Lport as $row2) { $names_fk[$arr[3]][$row->cargo_id][]=$row2->CAlport->port_name; }
                foreach ($row->Dregion as $row2) { $names_fk[$arr[4]][$row->cargo_id][]=$row2->CAdregion->region_name; }
                foreach ($row->Dcountry as $row2) { $names_fk[$arr[5]][$row->cargo_id][]=$row2->CAdcountry->country_name; }
                foreach ($row->Dport as $row2) { $names_fk[$arr[6]][$row->cargo_id][]=$row2->CAdport->port_name; }
            }
            $ser_data[1]=$names_fk;

            echo json_encode(array('data'=>$ser_data));
        }
        else{
            echo false;
        }
    }

    // function get_country_port(Request $req){

    //     $data=[];
    //     $arr=explode(",",$req->region_country_id);
    //     // $data = ss_setup_region_country_port::with(['Lregion'])->active()->orderBy('cargo_id', 'DESC')->get();
  
    //     if(strpos($req->country_port_name, 'country') !== false){
    //         $data = ss_setup_region_country_port::select('country_id')->with(['country_rel'])->whereIn('region_id',$arr)->groupBy('country_id')->orderBy('country_id', 'ASC')->get();
    //     }
    //     else if (strpos($req->country_port_name, 'port') !== false){
    //         $data = ss_setup_region_country_port::select('port_id')->with(['port_rel'])->whereIn('country_id',$arr)->groupBy('port_id')->orderBy('port_id', 'ASC')->get();
    //     }
    //     // echo json_encode(array('data'=>$data));
    //     echo $data;
    // }
    
    
    function get_country_port(Request $req){

        $data=[];
        $arr=explode(",",$req->rcp_ids);
        // $data = ss_setup_region_country_port::with(['Lregion'])->active()->orderBy('cargo_id', 'DESC')->get();
        
        if(empty(trim($arr[0]))){
            $data['region']= ss_setup_region::where('region_name','!=','Any')->active()->ascend()->get();
            $data['country']= ss_setup_country::where('country_name','!=','Any')->active()->ascend()->get();
            $data['port']= ss_setup_port::where('port_name','!=','Any')->active()->ascend()->get();
        }
        else if(strpos($req->rcp_name, 'region') !== false){
            $data['country'] = ss_setup_region_country_port::select('country_id')->with(['country_rel'])->whereIn('region_id',$arr)->groupBy('country_id')->orderBy('country_id', 'ASC')->get();
            $data['port'] = ss_setup_region_country_port::select('port_id')->with(['port_rel'])->whereIn('region_id',$arr)->groupBy('port_id')->orderBy('port_id', 'ASC')->get();
        }
        else if (strpos($req->rcp_name, 'country') !== false){
            $data['region'] = ss_setup_region_country_port::select('region_id')->with(['region_rel'])->whereIn('country_id',$arr)->groupBy('region_id')->orderBy('region_id', 'ASC')->get();
            $data['port'] = ss_setup_region_country_port::select('port_id')->with(['port_rel'])->whereIn('country_id',$arr)->groupBy('port_id')->orderBy('port_id', 'ASC')->get();
        }
        else if (strpos($req->rcp_name, 'port') !== false){
            $data['region'] = ss_setup_region_country_port::select('region_id')->with(['region_rel'])->whereIn('port_id',$arr)->groupBy('region_id')->orderBy('region_id', 'ASC')->get();
            $data['country'] = ss_setup_region_country_port::select('country_id')->with(['country_rel'])->whereIn('port_id',$arr)->groupBy('country_id')->orderBy('country_id', 'ASC')->get();
        }
        
        echo json_encode(array('data'=>$data));
        // echo $data;
    }
    
    function reset_region_country_port(){

        $data=[];
        
        $data['cargo_type']= ss_setup_cargo_type::where('cargo_type_name','!=','Any')->active()->ascend()->get();
        $data['vessel_type']= ss_setup_vessel_type::where('vessel_type_name','!=','Any')->active()->ascend()->get();
        $data['charter_type']= ss_setup_charter_type::where('charter_type_name','!=','Any')->active()->ascend()->get();
        $data['region']= ss_setup_region::where('region_name','!=','Any')->active()->ascend()->get();
        $data['country']= ss_setup_country::where('country_name','!=','Any')->active()->ascend()->get();
        $data['port']= ss_setup_port::where('port_name','!=','Any')->active()->ascend()->get();

        echo json_encode(array('data'=>$data));
    }




}
