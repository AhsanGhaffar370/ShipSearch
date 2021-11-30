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
use App\Models\vessel_search_history;

use App\Models\rel_vessel_vesseltype;
use App\Models\rel_vessel_chartertype;
use App\Models\rel_vessel_region;
use App\Models\rel_vessel_country;
use App\Models\rel_vessel_port;

use App\Models\rel_ser_vessel_vesseltype;
use App\Models\rel_ser_vessel_chartertype;
use App\Models\rel_ser_vessel_region;
use App\Models\rel_ser_vessel_country;
use App\Models\rel_ser_vessel_port;

class FrontVesselController extends Controller
{
    function view(){

        $data = ss_vessel::with(['vesseltype','chartertype','region','country','port'])
                        ->active()
                        ->orderBy('vessel_id', 'DESC')
                        ->get();
        
        $ser_data= vessel_search_history::with(['vesseltype','chartertype','region','country','port'])
                                        ->where('user_id',session('front_uid'))
                                        ->orderBy('id', 'DESC')
                                        ->get();

        $ss_setup_vessel_type= ss_setup_vessel_type::where('vessel_type_name','!=','Any')->active()->get();
        $ss_setup_charter_type= ss_setup_charter_type::where('charter_type_name','!=','Any')->active()->ascend()->get();
        $ss_setup_region= ss_setup_region::where('region_name','!=','Any')->active()->ascend()->get();
        $ss_setup_country= ss_setup_country::where('country_name','!=','Any')->active()->ascend()->get();
        $ss_setup_port= ss_setup_port::where('port_name','!=','Any')->active()->ascend()->get();

        return view('front/vessel/view',['data'=>$data,
                                        'ser_data'=>$ser_data,
                                        'vessel_type'=>$ss_setup_vessel_type,
                                        'charter_type'=>$ss_setup_charter_type,
                                        'region'=>$ss_setup_region,
                                        'country'=>$ss_setup_country,
                                        'port'=>$ss_setup_port]);
    }

    function view_add(){
        $ss_setup_vessel_type= ss_setup_vessel_type::where('vessel_type_name','!=','Any')->active()->get();
        $ss_setup_charter_type= ss_setup_charter_type::where('charter_type_name','!=','Any')->active()->ascend()->get();
        $ss_setup_region= ss_setup_region::where('region_name','!=','Any')->active()->ascend()->get();
        $ss_setup_country= ss_setup_country::where('country_name','!=','Any')->active()->ascend()->get();
        $ss_setup_port= ss_setup_port::where('port_name','!=','Any')->active()->ascend()->get();

        $data = ss_vessel::latest()->first();
        // $data = ss_vessel::latest()->take(1)->get();
        // $data = ss_vessel::orderBy('vessel_id', 'DESC')->first();

        if($data==null){
            $ref_no=25000+1;
            $ref_no="VS".$ref_no;
        }else{
            $ref_no=$data->vessel_id+1;
            $ref_no="VS".$ref_no;
        }

        return view('front/vessel/add',['vessel_ref_no'=>$ref_no,
                                        'vessel_type'=>$ss_setup_vessel_type,
                                        'charter_type'=>$ss_setup_charter_type,
                                        'region'=>$ss_setup_region,
                                        'country'=>$ss_setup_country,
                                        'port'=>$ss_setup_port]
                                    );
    }
    
    function add_req(Request $req){
        
        // $add_req= $req->all();
        $add_req=new ss_vessel;

        $add_req->vessel_name=$req->vessel_name;
        $add_req->ref_no=$req->ref_no;

        $add_req->laycan_date_from=$req->laycan_date_from;
        $add_req->laycan_date_to=$req->laycan_date_to;

        $vessel_type="";
        foreach ($req->vessel_type_id as $selectedOption)
            $vessel_type .= $selectedOption.",";
        $add_req->vessel_type_id=rtrim($vessel_type, ",");

        $charter_type="";
        foreach ($req->charter_type_id as $selectedOption)
            $charter_type .= $selectedOption.",";
        $add_req->charter_type_id=rtrim($charter_type, ",");

        $region="";
        foreach ($req->region_id as $selectedOption)
            $region .= $selectedOption.",";
        $add_req->region_id=rtrim($region, ",");

        $country="";
        foreach ($req->country_id as $selectedOption)
            $country .= $selectedOption.",";
        $add_req->country_id=rtrim($country, ",");

        $port="";
        foreach ($req->port_id as $selectedOption)
            $port .= $selectedOption.",";
        $add_req->port_id=rtrim($port, ",");

        $add_req->built_year=$req->built_year;
        $add_req->dwt=$req->dwt." ".$req->dwt_unit;
        $add_req->dwcc=$req->dwcc." ".$req->dwcc_unit;
        $add_req->imo_number=$req->imo_number;
        $add_req->call_sign=$req->call_sign;
        $add_req->speed_ballast=$req->speed_ballast." ".$req->speed_ballast_unit;
        $add_req->speed_laden=$req->speed_laden." ".$req->speed_laden_unit;
        $add_req->gross_tonnage=$req->gross_tonnage." ".$req->gross_tonnage_unit;
        $add_req->net_tonnage=$req->net_tonnage." ".$req->net_tonnage_unit;
        $add_req->loa_max=$req->loa_max." ".$req->loa_max_unit;
        $add_req->beam_max=$req->beam_max." ".$req->beam_max_unit;
        $add_req->summer_draft=$req->summer_draft." ".$req->summer_draft_unit;
        $add_req->fresh_water_draft=$req->fresh_water_draft." ".$req->fresh_water_draft_unit;
        $add_req->grain_capacity=$req->grain_capacity;
        $add_req->bale_capacity=$req->bale_capacity;
        $add_req->lane_meters=$req->lane_meters;
        $add_req->container_capacity_20ft=$req->container_capacity_20ft." ".$req->container_capacity_20ft_unit;
        $add_req->container_capacity_40ft=$req->container_capacity_40ft." ".$req->container_capacity_40ft_unit;
        $add_req->container_capacity_40ch=$req->container_capacity_40ch." ".$req->container_capacity_40ch_unit;
        $add_req->ifo_consumption_empty=$req->ifo_consumption_empty;
        $add_req->ifo_consumption_laden=$req->ifo_consumption_laden;
        $add_req->ifo_consumption_port=$req->ifo_consumption_port;
        $add_req->mgo_consumption_empty=$req->mgo_consumption_empty;
        $add_req->mgo_consumption_laden=$req->mgo_consumption_laden;
        $add_req->mgo_consumption_port=$req->mgo_consumption_port;
        $add_req->classed_by=$req->classed_by;
        $add_req->p_i_club=$req->p_i_club;
        $add_req->additional_info=$req->additional_info;


        $add_req->is_active="1";
        $add_req->created_at=date('Y-m-d H:i:s');
        $add_req->created_by=session('front_uid');
        $add_req->modified_at=date('Y-m-d H:i:s');
        $add_req->modified_by=session('front_uid');
        
        $add_req->save();
        // ss_vessel::create($add_req);

        
        $arr=["vessel_type_id","charter_type_id","region_id","country_id","port_id"];
        $cid= ss_vessel::latest()->first()->vessel_id;
        foreach ($arr as $ids){
            foreach ($req[$ids] as $selectedOption){
                if($ids == "vessel_type_id") { $obj=new rel_vessel_vesseltype; }
                if($ids == "charter_type_id") { $obj=new rel_vessel_chartertype; }
                if($ids == "region_id") { $obj=new rel_vessel_region; }
                if($ids == "country_id") { $obj=new rel_vessel_country; }
                if($ids == "port_id") { $obj=new rel_vessel_port; }

                $obj["vessel_id"] = $cid;
                $obj[$ids] = $selectedOption;
                $obj->save();
            }

        }
        
        
        $req->session()->flash('msg','Vessel Added');
        $req->session()->flash('alert','success');
        
        return redirect()->route('vessel.view');
    }


    function search_req(Request $req){

        
        $laycan_from=date("Y-m-d", strtotime($req->laycan_date_from));
        $laycan_to=date("Y-m-d", strtotime($req->laycan_date_to));  

        $dwt_from = $req->dwt_from;
        
        $dwt_to = $req->dwt_to;
        
        $ser_vessel_type="";
        foreach ($req->vessel_type_id as $selectedOption)
            $ser_vessel_type .= $selectedOption.",";
        $ser_vessel_type=rtrim($ser_vessel_type, ",");
        
        $ser_charter_type="";
        foreach ($req->charter_type_id as $selectedOption)
            $ser_charter_type .= $selectedOption.",";
        $ser_charter_type=rtrim($ser_charter_type, ",");
        
        $ser_region="";
        foreach ($req->region_id as $selectedOption)
            $ser_region .= $selectedOption.",";
        $ser_region=rtrim($ser_region, ",");
        
        $ser_country="";
        foreach ($req->country_id as $selectedOption)
            $ser_country .= $selectedOption.",";
        $ser_country=rtrim($ser_country, ",");
        
        $ser_port="";
        foreach ($req->port_id as $selectedOption)
            $ser_port .= $selectedOption.",";
        $ser_port=rtrim($ser_port, ",");

        if(session('front_uid')!=""){

            // $ser_data=$req->all();
            // $ser_data['user_id']=session('front_uid');
            // vessel_search_history::create($ser_data);

            $ser_data=new vessel_search_history;
            
            $ser_data->user_id=session('front_uid');
            
            $ser_data->laycan_date_from=$laycan_from;
            $ser_data->laycan_date_to=$laycan_to;
            $ser_data->vessel_type_id=$ser_vessel_type;
            $ser_data->charter_type_id=$ser_charter_type;        
            $ser_data->region_id=$ser_region;        
            $ser_data->country_id=$ser_country;        
            $ser_data->port_id=$ser_port;
            $ser_data->dwt_from=$dwt_from;
            $ser_data->dwt_to=$dwt_to;
            
            $ser_data->created_at=date('Y-m-d H:i:s');
            $ser_data->modified_at=date('Y-m-d H:i:s');
            
            $ser_data->save();

            
            
            $arr=["vessel_type_id","charter_type_id","region_id","country_id","port_id"];
            $cid= vessel_search_history::latest()->first()->id;
            foreach ($arr as $ids){
                foreach ($req[$ids] as $selectedOption){
                    
                    if($ids == "vessel_type_id") { $obj=new rel_ser_vessel_vesseltype; }
                    if($ids == "charter_type_id") { $obj=new rel_ser_vessel_chartertype; }
                    if($ids == "region_id") { $obj=new rel_ser_vessel_region; }
                    if($ids == "country_id") { $obj=new rel_ser_vessel_country; }
                    if($ids == "port_id") { $obj=new rel_ser_vessel_port; }

                    $obj["vessel_id"] = $cid;
                    $obj[$ids] = $selectedOption;
                    $obj->save();
                }
            }



            $total_rec=vessel_search_history::where("user_id",session('front_uid'))->count();

            if($total_rec>14){
                // session()->flash('msg2121','Vessel Deleted');
                vessel_search_history::where('user_id',session('front_uid'))->first()->delete();
            }
        }

        $ser_vessel_type_opt='=';
        if(strpos($ser_vessel_type, '11') !== false){
            $ser_vessel_type="abc";
            $ser_vessel_type_opt='!=';
        }
        $ser_charter_type_opt='=';
        if(strpos($ser_charter_type, '5') !== false){
            $ser_charter_type="abc";
            $ser_charter_type_opt='!=';
        }
        $ser_region_opt='=';
        if(strpos($ser_region, '26') !== false){
            $ser_region="abc";
            $ser_region_opt='!=';
        }
        $ser_country_opt='=';
        if(strpos($ser_country, '197') !== false){
            $ser_country="abc";
            $ser_country_opt='!=';
        }
        $ser_port_opt='=';
        if(strpos($ser_port, '5638') !== false){
            $ser_port="abc";
            $ser_port_opt='!=';
        }

        // $vessel_type_fk=$req->vessel_type_id;
        // ->whereHas('vesseltype', function($q1) use ($vessel_type_fk) {
        //     $q1->whereIn('vessel_type_id',$vessel_type_fk);
        // })
        
        $data = ss_vessel::with(['vesseltype','chartertype','region','country','port'])
                        ->where('vessel_type_id', $ser_vessel_type_opt, $ser_vessel_type)
                        ->where('charter_type_id', $ser_charter_type_opt, $ser_charter_type)
                        ->where('region_id', $ser_region_opt, $ser_region)
                        ->where('country_id', $ser_country_opt, $ser_country)
                        ->where('port_id', $ser_port_opt, $ser_port)
                        ->whereBetween("laycan_date_from", [$laycan_from, $laycan_to])
                        ->whereBetween("laycan_date_to", [$laycan_from, $laycan_to])
                        ->orwhereBetween("dwt", [$dwt_from, $dwt_to])
                        ->active()
                        ->orderBy('vessel_id', 'DESC')
                        ->get();
                        // ->whereBetween($laycan_col, [$from_date, $to_date])->get();
        
        $ser_history= vessel_search_history::with(['vesseltype','chartertype','region','country','port'])
                                            ->where('user_id',session('front_uid'))
                                            ->orderBy('id', 'DESC')
                                            ->get();

        // dd($ser_history);

        $ss_setup_vessel_type= ss_setup_vessel_type::where('vessel_type_name','!=','Any')->active()->get();
        $ss_setup_charter_type= ss_setup_charter_type::where('charter_type_name','!=','Any')->active()->ascend()->get();
        $ss_setup_region= ss_setup_region::where('region_name','!=','Any')->active()->ascend()->get();
        $ss_setup_country= ss_setup_country::where('country_name','!=','Any')->active()->ascend()->get();
        $ss_setup_port= ss_setup_port::where('port_name','!=','Any')->active()->ascend()->get();

        return view('front/vessel/view',['data'=>$data,
                                        'ser_data'=>$ser_history,
                                        'vessel_type'=>$ss_setup_vessel_type,
                                        'charter_type'=>$ss_setup_charter_type,
                                        'region'=>$ss_setup_region,
                                        'country'=>$ss_setup_country,
                                        'port'=>$ss_setup_port]);
    }

    function search_req_ajax(Request $req){
        
        
        $ser_data= vessel_search_history::with(['vesseltype','chartertype','region','country','port'])
                                        ->where('id',$req->id)->first();   
        
        
        $ser_vessel_type_opt='=';
        if(strpos($ser_data->vessel_type_id, '11') !== false){
            $ser_data->vessel_type_id="abc";
            $ser_vessel_type_opt='!=';
        }
        $ser_charter_type_opt='=';
        if(strpos($ser_data->charter_type_id, '5') !== false){
            $ser_data->charter_type_id="abc";
            $ser_charter_type_opt='!=';
        }
        $ser_region_opt='=';
        if(strpos($ser_data->region_id, '26') !== false){
            $ser_data->region_id="abc";
            $ser_region_opt='!=';
        }
        $ser_country_opt='=';
        if(strpos($ser_data->country_id, '197') !== false){
            $ser_data->country_id="abc";
            $ser_country_opt='!=';
        }
        $ser_port_opt='=';
        if(strpos($ser_data->port_id, '5638') !== false){
            $ser_data->port_id="abc";
            $ser_port_opt='!=';
        }

        //get specific record of table
        // with(array('Lregion' => function($query) {
        //     $query->select('vessel_id');
        // }))
        $data=[];
        $data[0] = ss_vessel::with(['vesseltype','chartertype','region','country','port'])
                        ->where('vessel_type_id', $ser_vessel_type_opt, $ser_data->vessel_type_id)
                        ->where('charter_type_id', $ser_charter_type_opt, $ser_data->charter_type_id)
                        ->where('region_id', $ser_region_opt, $ser_data->region_id)
                        ->where('country_id', $ser_country_opt, $ser_data->country_id)
                        ->where('port_id', $ser_port_opt, $ser_data->port_id)
                        ->whereBetween("laycan_date_from", [$ser_data->laycan_date_from, $ser_data->laycan_date_to])
                        ->whereBetween("laycan_date_to", [$ser_data->laycan_date_from, $ser_data->laycan_date_to])
                        ->active()
                        ->orderBy('vessel_id', 'DESC')
                        ->get();


        // javascript relationship understand nhi krta is lye relationship tables ka data alag se send kra he 
        $arr=["vessel_type_id","charter_type_id","region_id","country_id","port_id"];
        $names_fk=array();
        foreach ($data[0] as $row){
            foreach ($row->vesseltype as $row2) { $names_fk[$arr[0]][$row->vessel_id][]=$row2->Vvesseltype->vessel_type_name; }
            foreach ($row->chartertype as $row2) { $names_fk[$arr[1]][$row->vessel_id][]=$row2->Vchartertype->charter_type_name; }
            foreach ($row->region as $row2) { $names_fk[$arr[2]][$row->vessel_id][]=$row2->Vregion->region_name; }
            foreach ($row->country as $row2) { $names_fk[$arr[3]][$row->vessel_id][]=$row2->Vcountry->country_name; }
            foreach ($row->port as $row2) { $names_fk[$arr[4]][$row->vessel_id][]=$row2->Vport->port_name; }
        }
        $data[1]=$names_fk;
        // echo "<pre>";
        echo json_encode(array('data'=>$data));
        // echo $req->lregion;

        // return view('front/vessel/view',['data'=>$data]);
    }

    function del_ser_his_req_ajax(Request $req){
        $data= vessel_search_history::find($req->id);
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
                    vessel_search_history::whereIn('id', $ids)->delete();
                    echo "1";
                }catch(\Throwable $e){
                    report($e);
                    echo "0";
                }
            }
            if($req->del_type=='all'){
                try{
                    vessel_search_history::whereNotNull('id')->delete();
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
        $ser_data= vessel_search_history::with(['vesseltype','chartertype','region','country','port'])
                                        ->where('id',$req->id)->first(); 

        $data[0] =$ser_data;

        // javascript relationship understand nhi krta is lye relationship tables ka data alag se send kra he 
        $arr=["vessel_type_id","charter_type_id","region_id","country_id","port_id"];
        $ids_fk=array();
        foreach ($data[0]->vesseltype as $row) { $ids_fk[$arr[0]][]=$row->SVvesseltype->vessel_type_id; }
        foreach ($data[0]->chartertype as $row) { $ids_fk[$arr[1]][]=$row->SVchartertype->charter_type_id; }
        foreach ($data[0]->region as $row) { $ids_fk[$arr[2]][]=$row->SVregion->region_id; }
        foreach ($data[0]->country as $row) { $ids_fk[$arr[3]][]=$row->SVcountry->country_id; }
        foreach ($data[0]->port as $row) { $ids_fk[$arr[4]][]=$row->SVport->port_id; }

        $names_fk=array();
        $names_fk1=array();
        foreach ($data[0]->vesseltype as $row) { $names_fk[$arr[0]][]=$row->SVvesseltype->vessel_type_name; }
        foreach ($data[0]->chartertype as $row) { $names_fk[$arr[1]][]=$row->SVchartertype->charter_type_name; }
        foreach ($data[0]->region as $row) { $names_fk[$arr[2]][]=$row->SVregion->region_name; }
        foreach ($data[0]->country as $row) { $names_fk[$arr[3]][]=$row->SVcountry->country_name; }
        foreach ($data[0]->port as $row) { $names_fk[$arr[4]][]=$row->SVport->port_name; }

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
        $data= vessel_search_history::find($req->id);

        $data->laycan_date_from=date("Y-m-d", strtotime($req->laycan_date_from));
        $data->laycan_date_to=date("Y-m-d", strtotime($req->laycan_date_to));
        $data->vessel_type_id= $req->vessel_type_id;
        $data->charter_type_id= $req->charter_type_id;
        $data->region_id= $req->region_id;
        $data->country_id= $req->country_id;
        $data->port_id= $req->port_id;
        $data->dwt_from= $req->dwt_from;
        $data->dwt_to= $req->dwt_to;
        
        $data->modified_at=date('Y-m-d H:i:s');

        $data->save();

        if($data->wasChanged('modified_at')){
            
            //relationship tables me data delete krrhe he
            rel_ser_vessel_vesseltype::where('vessel_id',$req->id)->delete();
            rel_ser_vessel_chartertype::where('vessel_id',$req->id)->delete();
            rel_ser_vessel_region::where('vessel_id',$req->id)->delete();
            rel_ser_vessel_country::where('vessel_id',$req->id)->delete();
            rel_ser_vessel_port::where('vessel_id',$req->id)->delete();

            //relationship tables me data insert krrhe he
            $arr=["vessel_type_id","charter_type_id","region_id","country_id","port_id"];
            $req_fk=[];
            foreach ($arr as $ids){
                $req_fk[$ids]=explode(",",$req[$ids]);
                foreach ($req_fk[$ids] as $selectedOption){
                    if($ids == "vessel_type_id") { $obj=new rel_ser_vessel_vesseltype; }
                    if($ids == "charter_type_id") { $obj=new rel_ser_vessel_chartertype; }
                    if($ids == "region_id") { $obj=new rel_ser_vessel_region; }
                    if($ids == "country_id") { $obj=new rel_ser_vessel_country; }
                    if($ids == "port_id") { $obj=new rel_ser_vessel_port; }
                    $obj["vessel_id"] = $req->id;
                    $obj[$ids] = $selectedOption;
                    $obj->save();
                }   
            }

            $ser_vessel_type_opt='=';
            if(strpos($data->vessel_type_id, '11') !== false){
                $data->vessel_type_id="abc";
                $ser_vessel_type_opt='!=';
            }
            $ser_charter_type_opt='=';
            if(strpos($data->charter_type_id, '5') !== false){
                $data->charter_type_id="abc";
                $ser_charter_type_opt='!=';
            }
            $ser_region_opt='=';
            if(strpos($data->region_id, '26') !== false){
                $data->region_id="abc";
                $ser_region_opt='!=';
            }
            $ser_country_opt='=';
            if(strpos($data->country_id, '197') !== false){
                $data->country_id="abc";
                $ser_country_opt='!=';
            }
            $ser_port_opt='=';
            if(strpos($data->port_id, '5638') !== false){
                $data->port_id="abc";
                $ser_port_opt='!=';
            }

            $ser_data=[];
            $ser_data[0] = ss_vessel::with(['vesseltype','chartertype','region','country','port'])
                                ->where('vessel_type_id', $ser_vessel_type_opt, $data->vessel_type_id)
                                ->where('charter_type_id', $ser_charter_type_opt, $data->charter_type_id)
                                ->where('region_id', $ser_region_opt, $data->region_id)
                                ->where('country_id', $ser_country_opt, $data->country_id)
                                ->where('port_id', $ser_port_opt, $data->port_id)
                                ->whereBetween("laycan_date_from", [$data->laycan_date_from, $data->laycan_date_to])
                                ->whereBetween("laycan_date_to", [$data->laycan_date_from, $data->laycan_date_to])
                                ->orWhereBetween("dwt_from", [$data->dwt_from, $data->dwt_to])
                                ->orWhereBetween("dwt_to", [$data->dwt_from, $data->dwt_to])
                                ->active()
                                ->orderBy('vessel_id', 'DESC')
                                ->get();


            // javascript relationship understand nhi krta is lye relationship tables ka data alag se send kra he 
            $arr=["vessel_type_id","charter_type_id","region_id","country_id","port_id"];
            $names_fk=array();
            foreach ($ser_data[0] as $row){
                foreach ($row->vesseltype as $row2) { $names_fk[$arr[0]][$row->vessel_id][]=$row2->Vvesseltype->vessel_type_name; }
                foreach ($row->chartertype as $row2) { $names_fk[$arr[1]][$row->vessel_id][]=$row2->Vchartertype->charter_type_name; }
                foreach ($row->region as $row2) { $names_fk[$arr[2]][$row->vessel_id][]=$row2->Vregion->region_name; }
                foreach ($row->country as $row2) { $names_fk[$arr[3]][$row->vessel_id][]=$row2->Vcountry->country_name; }
                foreach ($row->port as $row2) { $names_fk[$arr[4]][$row->vessel_id][]=$row2->Vport->port_name; }
            }
            $ser_data[1]=$names_fk;


            echo json_encode(array('data'=>$ser_data));
        }
        else{
            echo false;
        }
       
    }

}
