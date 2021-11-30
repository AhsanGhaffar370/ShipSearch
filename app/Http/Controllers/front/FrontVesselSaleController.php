<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ss_vessel_sale;
use App\Models\ss_setup_vessel_type;
use App\Models\ss_setup_region;
use App\Models\ss_setup_country;
use App\Models\ss_setup_port;
use App\Models\vessel_sale_search_history;

use App\Models\rel_vsale_vesseltype;
use App\Models\rel_vsale_region;
use App\Models\rel_vsale_country;
use App\Models\rel_vsale_port;

use App\Models\rel_ser_vsale_vesseltype;
use App\Models\rel_ser_vsale_region;
use App\Models\rel_ser_vsale_country;
use App\Models\rel_ser_vsale_port;

class FrontVesselSaleController extends Controller
{
    function view(){
        
        $data = ss_vessel_sale::with(['vesseltype','region','country','port'])
                        ->active()
                        ->orderBy('vessel_sale_id', 'DESC')
                        ->get();
        
        $ser_data= vessel_sale_search_history::with(['vesseltype','region','country','port'])
                                        ->where('user_id',session('front_uid'))
                                        ->orderBy('id', 'DESC')
                                        ->get();

        // $ss_setup_vessel_type= ss_setup_vessel_type::active()->ascend()->get();
        $ss_setup_vessel_type= ss_setup_vessel_type::where('vessel_type_name','!=','Any')->active()->get();
        $ss_setup_region= ss_setup_region::where('region_name','!=','Any')->active()->ascend()->get();
        $ss_setup_country= ss_setup_country::where('country_name','!=','Any')->active()->ascend()->get();
        $ss_setup_port= ss_setup_port::where('port_name','!=','Any')->active()->ascend()->get();

        // dd($ss_setup_vessel_type);

        return view('front/vessel_sale/view',['data'=>$data,
                                        'ser_data'=>$ser_data,
                                        'vessel_type'=>$ss_setup_vessel_type,
                                        'region'=>$ss_setup_region,
                                        'country'=>$ss_setup_country,
                                        'port'=>$ss_setup_port]);
    }

    function view_add(){
        
        $ss_setup_vessel_type= ss_setup_vessel_type::where('vessel_type_name','!=','Any')->active()->get();
        $ss_setup_region= ss_setup_region::where('region_name','!=','Any')->active()->ascend()->get();
        $ss_setup_country= ss_setup_country::where('country_name','!=','Any')->active()->ascend()->get();
        $ss_setup_port= ss_setup_port::where('port_name','!=','Any')->active()->ascend()->get();

        $data = ss_vessel_sale::latest()->first();
        // $data = ss_vessel::latest()->take(1)->get();
        // $data = ss_vessel::orderBy('vessel_id', 'DESC')->first();

        if($data==null){
            $ref_no=25000+1;
            $ref_no="VSA".$ref_no;
        }else{
            $ref_no=$data->vessel_sale_id+1;
            $ref_no="VSA".$ref_no;
        }

        return view('front/vessel_sale/add',['vessel_sale_ref_no'=>$ref_no,
                                        'vessel_type'=>$ss_setup_vessel_type,
                                        'region'=>$ss_setup_region,
                                        'country'=>$ss_setup_country,
                                        'port'=>$ss_setup_port]
                                    );
    }

    function add_req(Request $req){

        
        // $req->validate([
        //     'image'=>'required | mimes:jpg,jpeg,png,PNG',
        // ]);

        // $add_req= $req->all();
        $add_req=new ss_vessel_sale;

        $add_req->ref_no=$req->ref_no;
        

        $vessel_type="";
        foreach ($req->vessel_type_id as $selectedOption)
            $vessel_type .= $selectedOption.",";
        $add_req->vessel_type_id=rtrim($vessel_type, ",");

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

        
        // $vsale_img=$req->file('image')->store('public/post_images');
        $final_img_str="";
        $counter=29;
        foreach ($req->file('vessel_img') as $selectedimg){
            $vsale_img=$selectedimg;
            $ext=$vsale_img->extension();
            // basename($request->file('upfile')->getClientOriginalName(), '.'.$request->file('upfile')->getClientOriginalExtension());
            // $name=$vsale_img['filename'];
            $final_img=time().$counter.".".$ext;
            $vsale_img->storeAs('/public/vessel_sale_images',$final_img);

            $final_img_str.=$final_img.",";
            $counter++;
        }
        $add_req->vessel_img=rtrim($final_img_str, ",");


        $add_req->date_available=$req->date_available;
        $add_req->operations_date=$req->operations_date;
        $add_req->built_year=$req->built_year;
        $add_req->last_dry_docked=$req->last_dry_docked;
        $add_req->last_ss=$req->last_ss;
        $add_req->classification=$req->classification;
        $add_req->dwt=$req->dwt;
        $add_req->lightweight=$req->lightweight;
        $add_req->main_engine=$req->main_engine;
        $add_req->aux_engines=$req->aux_engines;
        $add_req->bow_thruster=$req->bow_thruster;
        $add_req->gears=$req->gears;
        $add_req->propellers=$req->propellers;
        $add_req->in_service=$req->in_service;
        $add_req->cargo_capacity=$req->cargo_capacity;
        $add_req->holds_hatch=$req->holds_hatch;
        $add_req->cover_type=$req->cover_type;
        $add_req->additional_description=$req->additional_description;
        
        $add_req->grt=$req->grt." ".$req->grt_unit;
        $add_req->nrt=$req->nrt." ".$req->nrt_unit;
        $add_req->speed=$req->speed." ".$req->speed_unit;
        $add_req->consumption=$req->consumption." ".$req->consumption_unit;
        $add_req->loa=$req->loa." ".$req->loa_unit;
        $add_req->breadth=$req->breadth." ".$req->breadth_unit;
        $add_req->summer_draft=$req->summer_draft." ".$req->summer_draft_unit;
        $add_req->fresh_water_draft=$req->fresh_water_draft." ".$req->fresh_water_draft_unit;
        $add_req->bunker_capacity=$req->bunker_capacity." ".$req->bunker_capacity_unit;
        $add_req->price=$req->price." ".$req->price_unit;

        $add_req->is_active="1";
        $add_req->created_at=date('Y-m-d H:i:s');
        $add_req->created_by=session('front_uid');
        $add_req->modified_at=date('Y-m-d H:i:s');
        $add_req->modified_by=session('front_uid');

        $add_req->save();

        
        $arr=["vessel_type_id","region_id","country_id","port_id"];
        $cid= ss_vessel_sale::latest()->first()->vessel_sale_id;
        foreach ($arr as $ids){
            foreach ($req[$ids] as $selectedOption){
                if($ids == "vessel_type_id") { $obj=new rel_vsale_vesseltype; }
                if($ids == "region_id") { $obj=new rel_vsale_region; }
                if($ids == "country_id") { $obj=new rel_vsale_country; }
                if($ids == "port_id") { $obj=new rel_vsale_port; }

                $obj["vessel_sale_id"] = $cid;
                $obj[$ids] = $selectedOption;
                $obj->save();
            }

        }

        $req->session()->flash('msg','Vessel Sale Added');
        $req->session()->flash('alert','success');
        
        return redirect()->route('vessel_sale.view');
    }


    

    function search_req(Request $req){

        
        $date_available=date("Y-m-d", strtotime($req->date_available));
        $operations_date=date("Y-m-d", strtotime($req->operations_date));  

        $dwt_from = $req->dwt_from;
        $dwt_to = $req->dwt_to;

        $ser_vessel_type="";
        foreach ($req->vessel_type_id as $selectedOption)
            $ser_vessel_type .= $selectedOption.",";
        $ser_vessel_type=rtrim($ser_vessel_type, ",");
        
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
        
        // dd($ser_port);
        if(session('front_uid')!=""){

            // $ser_data=$req->all();
            // $ser_data['user_id']=session('front_uid');
            // vessel_search_history::create($ser_data);

            $ser_data=new vessel_sale_search_history;
            
            $ser_data->user_id=session('front_uid');
            
            $ser_data->date_available=$date_available;
            $ser_data->operations_date=$operations_date;
            $ser_data->vessel_type_id=$ser_vessel_type;       
            $ser_data->region_id=$ser_region;        
            $ser_data->country_id=$ser_country;        
            $ser_data->port_id=$ser_port;
            $ser_data->dwt_from=$dwt_from;
            $ser_data->dwt_to=$dwt_to;
            
            $ser_data->created_at=date('Y-m-d H:i:s');
            $ser_data->modified_at=date('Y-m-d H:i:s');
            
            $ser_data->save();

            
            
            $arr=["vessel_type_id","region_id","country_id","port_id"];
            $cid= vessel_sale_search_history::latest()->first()->id;
            foreach ($arr as $ids){
                foreach ($req[$ids] as $selectedOption){
                    
                    if($ids == "vessel_type_id") { $obj=new rel_ser_vsale_vesseltype; }
                    if($ids == "region_id") { $obj=new rel_ser_vsale_region; }
                    if($ids == "country_id") { $obj=new rel_ser_vsale_country; }
                    if($ids == "port_id") { $obj=new rel_ser_vsale_port; }

                    $obj["vessel_sale_id"] = $cid;
                    $obj[$ids] = $selectedOption;
                    $obj->save();
                }
            }



            $total_rec=vessel_sale_search_history::where("user_id",session('front_uid'))->count();

            if($total_rec>14){
                // session()->flash('msg2121','Vessel Deleted');
                vessel_sale_search_history::where('user_id',session('front_uid'))->first()->delete();
            }
        }

        $ser_vessel_type_opt='=';
        if(strpos($ser_vessel_type, '11') !== false){
            $ser_vessel_type="abc";
            $ser_vessel_type_opt='!=';
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
        $data = ss_vessel_sale::with(['vesseltype','region','country','port'])
                        ->where('vessel_type_id', $ser_vessel_type_opt, $ser_vessel_type)
                        ->where('region_id', $ser_region_opt, $ser_region)
                        ->where('country_id', $ser_country_opt, $ser_country)
                        ->where('port_id', $ser_port_opt, $ser_port)
                        ->whereBetween("date_available", [$date_available, $operations_date])
                        ->whereBetween("operations_date", [$date_available, $operations_date])
                        ->orwhereBetween("dwt", [$dwt_from, $dwt_to])
                        ->active()
                        ->orderBy('vessel_sale_id', 'DESC')
                        ->get();
                        // ->whereBetween($laycan_col, [$from_date, $to_date])->get();

        $ser_history= vessel_sale_search_history::with(['vesseltype','region','country','port'])
                                            ->where('user_id',session('front_uid'))
                                            ->orderBy('id', 'DESC')
                                            ->get();

        // dd($ser_history);
        $ss_setup_vessel_type= ss_setup_vessel_type::where('vessel_type_name','!=','Any')->active()->get();
        $ss_setup_region= ss_setup_region::where('region_name','!=','Any')->active()->ascend()->get();
        $ss_setup_country= ss_setup_country::where('country_name','!=','Any')->active()->ascend()->get();
        $ss_setup_port= ss_setup_port::where('port_name','!=','Any')->active()->ascend()->get();

        return view('front/vessel_sale/view',['data'=>$data,
                                        'ser_data'=>$ser_history,
                                        'vessel_type'=>$ss_setup_vessel_type,
                                        'region'=>$ss_setup_region,
                                        'country'=>$ss_setup_country,
                                        'port'=>$ss_setup_port]);
    }


    function search_req_ajax(Request $req){

         
        $ser_data= vessel_sale_search_history::with(['vesseltype','region','country','port'])
                                        ->where('id',$req->id)->first();   
        

        $ser_vessel_type_opt='=';
        if(strpos($ser_data->vessel_type_id, '11') !== false){
            $ser_data->vessel_type_id="abc";
            $ser_vessel_type_opt='!=';
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
        $data[0] = ss_vessel_sale::with(['vesseltype','region','country','port'])
                        ->where('vessel_type_id', $ser_vessel_type_opt, $ser_data->vessel_type_id)
                        ->where('region_id', $ser_region_opt, $ser_data->region_id)
                        ->where('country_id', $ser_country_opt, $ser_data->country_id)
                        ->where('port_id', $ser_port_opt, $ser_data->port_id)
                        ->whereBetween("date_available", [$ser_data->date_available, $ser_data->operations_date])
                        ->whereBetween("operations_date", [$ser_data->date_available, $ser_data->operations_date])
                        ->active()
                        ->orderBy('vessel_sale_id', 'DESC')
                        ->get();


        // javascript relationship understand nhi krta is lye relationship tables ka data alag se send kra he 
        $arr=["vessel_type_id","region_id","country_id","port_id"];
        $names_fk=array();
        foreach ($data[0] as $row){
            foreach ($row->vesseltype as $row2) { $names_fk[$arr[0]][$row->vessel_sale_id][]=$row2->VSvesseltype->vessel_type_name; }
            foreach ($row->region as $row2) { $names_fk[$arr[1]][$row->vessel_sale_id][]=$row2->VSregion->region_name; }
            foreach ($row->country as $row2) { $names_fk[$arr[2]][$row->vessel_sale_id][]=$row2->VScountry->country_name; }
            foreach ($row->port as $row2) { $names_fk[$arr[3]][$row->vessel_sale_id][]=$row2->VSport->port_name; }
        }
        $data[1]=$names_fk;
        // echo "<pre>";
        echo json_encode(array('data'=>$data));

    }

    function del_ser_his_req_ajax(Request $req){
        $data= vessel_sale_search_history::find($req->id);
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
                    vessel_sale_search_history::whereIn('id', $ids)->delete();
                    echo "1";
                }catch(\Throwable $e){
                    report($e);
                    echo "0";
                }
            }
            if($req->del_type=='all'){
                try{
                    vessel_sale_search_history::whereNotNull('id')->delete();
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
        $ser_data= vessel_sale_search_history::with(['vesseltype','region','country','port'])
                                        ->where('id',$req->id)->first(); 

        $data[0] =$ser_data;

        // javascript relationship understand nhi krta is lye relationship tables ka data alag se send kra he 
        $arr=["vessel_type_id","region_id","country_id","port_id"];
        $ids_fk=array();
        foreach ($data[0]->vesseltype as $row) { $ids_fk[$arr[0]][]=$row->SVSvesseltype->vessel_type_id; }
        foreach ($data[0]->region as $row) { $ids_fk[$arr[1]][]=$row->SVSregion->region_id; }
        foreach ($data[0]->country as $row) { $ids_fk[$arr[2]][]=$row->SVScountry->country_id; }
        foreach ($data[0]->port as $row) { $ids_fk[$arr[3]][]=$row->SVSport->port_id; }

        $names_fk=array();
        $names_fk1=array();
        foreach ($data[0]->vesseltype as $row) { $names_fk[$arr[0]][]=$row->SVSvesseltype->vessel_type_name; }
        foreach ($data[0]->region as $row) { $names_fk[$arr[1]][]=$row->SVSregion->region_name; }
        foreach ($data[0]->country as $row) { $names_fk[$arr[2]][]=$row->SVScountry->country_name; }
        foreach ($data[0]->port as $row) { $names_fk[$arr[3]][]=$row->SVSport->port_name; }

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

        $data= vessel_sale_search_history::find($req->id);

        $data->date_available=date("Y-m-d", strtotime($req->date_available));
        $data->operations_date=date("Y-m-d", strtotime($req->operations_date));
        $data->vessel_type_id= $req->vessel_type_id;
        $data->region_id= $req->region_id;
        $data->country_id= $req->country_id;
        $data->port_id= $req->port_id;
        $data->modified_at=date('Y-m-d H:i:s');

        $data->save();

        if($data->wasChanged('modified_at')){
            
            //relationship tables me data delete krrhe he
            rel_ser_vsale_vesseltype::where('vessel_sale_id',$req->id)->delete();
            rel_ser_vsale_region::where('vessel_sale_id',$req->id)->delete();
            rel_ser_vsale_country::where('vessel_sale_id',$req->id)->delete();
            rel_ser_vsale_port::where('vessel_sale_id',$req->id)->delete();

            //relationship tables me data insert krrhe he
            $arr=["vessel_type_id","region_id","country_id","port_id"];
            $req_fk=[];
            foreach ($arr as $ids){
                $req_fk[$ids]=explode(",",$req[$ids]);
                foreach ($req_fk[$ids] as $selectedOption){
                    if($ids == "vessel_type_id") { $obj=new rel_ser_vsale_vesseltype; }
                    if($ids == "region_id") { $obj=new rel_ser_vsale_region; }
                    if($ids == "country_id") { $obj=new rel_ser_vsale_country; }
                    if($ids == "port_id") { $obj=new rel_ser_vsale_port; }
                    $obj["vessel_sale_id"] = $req->id;
                    $obj[$ids] = $selectedOption;
                    $obj->save();
                }   
            }

            $ser_vessel_type_opt='=';
            if(strpos($data->vessel_type_id, '11') !== false){
                $data->vessel_type_id="abc";
                $ser_vessel_type_opt='!=';
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
            $ser_data[0] = ss_vessel_sale::with(['vesseltype','region','country','port'])
                                ->where('vessel_type_id', $ser_vessel_type_opt, $data->vessel_type_id)
                                ->where('region_id', $ser_region_opt, $data->region_id)
                                ->where('country_id', $ser_country_opt, $data->country_id)
                                ->where('port_id', $ser_port_opt, $data->port_id)
                                ->whereBetween("date_available", [$data->date_available, $data->operations_date])
                                ->whereBetween("operations_date", [$data->date_available, $data->operations_date])
                                ->active()
                                ->orderBy('vessel_sale_id', 'DESC')
                                ->get();


            // javascript relationship understand nhi krta is lye relationship tables ka data alag se send kra he 
            $arr=["vessel_type_id","region_id","country_id","port_id"];
            $names_fk=array();
            foreach ($ser_data[0] as $row){
                foreach ($row->vesseltype as $row2) { $names_fk[$arr[0]][$row->vessel_sale_id][]=$row2->VSvesseltype->vessel_type_name; }
                foreach ($row->region as $row2) { $names_fk[$arr[1]][$row->vessel_sale_id][]=$row2->VSregion->region_name; }
                foreach ($row->country as $row2) { $names_fk[$arr[2]][$row->vessel_sale_id][]=$row2->VScountry->country_name; }
                foreach ($row->port as $row2) { $names_fk[$arr[3]][$row->vessel_sale_id][]=$row2->VSport->port_name; }
            }
            $ser_data[1]=$names_fk;


            echo json_encode(array('data'=>$ser_data));
        }
        else{
            echo false;
        }
     
    }


}
