<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ss_vessel;
use App\Models\ss_vessel_sale;
use App\Models\ss_setup_vessel_type;
use App\Models\ss_setup_region;
use App\Models\ss_setup_country;
use App\Models\ss_setup_port;
use App\Models\vessel_sale_search_history;
use App\Models\vessel_search_history;

class FrontVesselSaleController extends Controller
{
    function view(){

        $data = ss_vessel_sale::active()->orderBy('vessel_sale_id', 'DESC')->get();

        $ser_data= vessel_sale_search_history::where('user_id',session('front_uid'))->orderBy('id', 'DESC')->get();

        $ss_setup_vessel_type= ss_setup_vessel_type::active()->get();
        $ss_setup_region= ss_setup_region::active()->get();
        $ss_setup_country= ss_setup_country::active()->get();
        $ss_setup_port= ss_setup_port::active()->get();

        return view('front/vessel_sale/view',['data'=>$data,
                                        'ser_data'=>$ser_data,
                                        'vessel_type'=>$ss_setup_vessel_type,
                                        'region'=>$ss_setup_region,
                                        'country'=>$ss_setup_country,
                                        'port'=>$ss_setup_port]);
    }

    function view_add(){
        $ss_setup_vessel_type= ss_setup_vessel_type::active()->get();
        $ss_setup_region= ss_setup_region::active()->get();
        $ss_setup_country= ss_setup_country::active()->get();
        $ss_setup_port= ss_setup_port::active()->get();

        $data = ss_vessel_sale::latest()->first();
        // $data = ss_vessel_sale::latest()->take(1)->get();
        // $data = ss_vessel_sale::orderBy('vessel_sale_id', 'DESC')->first();

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

        $add_req= $req->all();

        $vessel_type="";
        foreach ($req->vessel_type_id as $selectedOption)
            $vessel_type .= $selectedOption.",";
        $add_req["vessel_type_id"]=rtrim($vessel_type, ",");

        $charter_type="";
        foreach ($req->charter_type_id as $selectedOption)
            $charter_type .= $selectedOption.",";
        $add_req["charter_type_id"]=rtrim($charter_type, ",");

        $region="";
        foreach ($req->region_id as $selectedOption)
            $region .= $selectedOption.",";
        $add_req["region_id"]=rtrim($region, ",");

        $country="";
        foreach ($req->country_id as $selectedOption)
            $country .= $selectedOption.",";
        $add_req["country_id"]=rtrim($country, ",");

        $port="";
        foreach ($req->port_id as $selectedOption)
            $port .= $selectedOption.",";
        $add_req["port_id"]=rtrim($port, ",");


        $add_req["is_active"]="1";
        $add_req["created_at"]=date('Y-m-d H:i:s');
        $add_req["created_by"]=session('front_uid');
        $add_req["modified_at"]=date('Y-m-d H:i:s');
        $add_req["modified_by"]=session('front_uid');

        ss_vessel_sale::create($add_req);

        $req->session()->flash('msg','Vessel Added');
        $req->session()->flash('alert','success');
        
        return redirect()->route('vessel.view');
    }


    
    function search_req(Request $req){

        $date_available=date("Y-m-d", strtotime($req->date_available));
        $operations_date=date("Y-m-d", strtotime($req->operations_date));  

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

        if(session('front_uid')!=""){

            // $ser_data=$req->all();
            // $ser_data['user_id']=session('front_uid');
            // cargo_search_history::create($ser_data);

            $ser_data=new vessel_sale_search_history;
            
            $ser_data->user_id=session('front_uid');
            
            $ser_data->date_available=$date_available;
            $ser_data->operations_date=$operations_date;
            $ser_data->vessel_type_id=$ser_vessel_type;      
            $ser_data->region_id=$ser_region;        
            $ser_data->country_id=$ser_country;        
            $ser_data->port_id=$ser_port;
            
            $ser_data->created_at=date('Y-m-d H:i:s');
            $ser_data->modified_at=date('Y-m-d H:i:s');
            
            $ser_data->save();

            $total_rec=vessel_sale_search_history::where("user_id",session('front_uid'))->count();

            if($total_rec>14){
                // session()->flash('msg2121','Vessel Deleted');
                vessel_sale_search_history::where('user_id',session('front_uid'))->first()->delete();
            }
        }

        $data = ss_vessel_sale::where('date_available', $date_available)
                        ->where('operations_date', $operations_date)
                        ->where('vessel_type_id', $ser_vessel_type)
                        ->where('region_id', $ser_region)
                        ->where('country_id', $ser_country)
                        ->where('port_id', $ser_port)
                        ->active()
                        ->orderBy('vessel_sale_id', 'DESC')
                        ->get();
                        // ->whereBetween($laycan_col, [$date_available, $operations_date])->get();

        $ser_history= vessel_sale_search_history::where('user_id',session('front_uid'))->orderBy('id', 'DESC')->get();


        $ss_setup_vessel_type= ss_setup_vessel_type::active()->get();
        $ss_setup_region= ss_setup_region::active()->get();
        $ss_setup_country= ss_setup_country::active()->get();
        $ss_setup_port= ss_setup_port::active()->get();

        return view('front/vessel_sale/view',['data'=>$data,
                                        'ser_data'=>$ser_history,
                                        'vessel_type'=>$ss_setup_vessel_type,
                                        'region'=>$ss_setup_region,
                                        'country'=>$ss_setup_country,
                                        'port'=>$ss_setup_port]);
    }

    function search_req_ajax(Request $req){
        
        $ser_data= vessel_sale_search_history::where('id',$req->id)->first();   

        $data = ss_vessel_sale::where('date_available', $ser_data->date_available)
                        ->where('operations_date', $ser_data->operations_date)
                        ->where('vessel_type_id', $ser_data->vessel_type_id)
                        ->where('region_id', $ser_data->region_id)
                        ->where('country_id', $ser_data->country_id)
                        ->where('port_id', $ser_data->port_id)
                        ->active()
                        ->orderBy('vessel_sale_id', 'DESC')
                        ->get();

        // echo "<pre>";
        echo json_encode(array('data'=>$data));
        // echo $req->lregion;

        // return view('front/cargo/view',['data'=>$data]);
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

    function get_update_hist_data(Request $req){

        $ser_data= vessel_sale_search_history::where('id',$req->id)->first(); 

        echo json_encode(array('data'=>$ser_data));

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
            
            $ser_data = ss_vessel_sale::where('vessel_type_id', $data->vessel_type_id)
            ->where('date_available', $data->date_available)
            ->where('operations_date', $data->operations_date)
            ->where('region_id', $data->region_id)
            ->where('country_id', $data->country_id)
            ->where('port_id', $data->port_id)
            ->active()
            ->orderBy('vessel_sale_id', 'DESC')
            ->get();

            echo json_encode(array('data'=>$ser_data));
        }
        else{
            echo false;
        }
       
    }


}
