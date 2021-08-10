<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ss_cargo;
use App\Models\ss_setup_cargo_type;
use App\Models\ss_setup_region;
use App\Models\ss_setup_country;
use App\Models\ss_setup_port;
use App\Models\ss_setup_unit;

class CargoController extends Controller
{
    function view(){
        $data = ss_cargo::active()->orderBy('cargo_id', 'DESC')->get();//present
        // $data = ss_cargo::with(['cargotype','Lcountry','Dcountry','Lregion','Dregion','Lunit','Dunit','Lport1','Lport2','Dport1','Dport2'])->desc()->get();

        // dd($data[0]->Lregion->region_name);

        // $data=ss_setup_cargo_type::with('cargo')->get();
        // foreach ($data as $d)
        //     var_dump($d->cargo);
        // dd($data[0]->cargo[0]->cargo_name);

        // $data = DB::table('ss_cargo') 
        //         ->join('ss_setup_cargo_type', 'ss_setup_cargo_type.cargo_type_id', '=', 'ss_cargo.cargo_type_id') 
        //         ->leftJoin('ss_setup_region as R1', 'R1.region_id', '=', 'ss_cargo.loading_region_id') 
        //         ->leftJoin('ss_setup_region as DR1', 'DR1.region_id', '=', 'ss_cargo.discharge_region_id') 
        //         ->leftJoin('ss_setup_country as C1', 'C1.country_id', '=', 'ss_cargo.loading_country_id') 
        //         ->leftJoin('ss_setup_country as DC1', 'DC1.country_id', '=', 'ss_cargo.discharge_country_id') 
        //         ->leftJoin('ss_setup_port as P1', 'P1.port_id', '=', 'ss_cargo.loading_port_id_1') 
        //         ->leftJoin('ss_setup_port as DP1', 'DP1.port_id', '=', 'ss_cargo.discharge_port_id_1') 
        //         ->leftJoin('ss_setup_port as P2', 'P2.port_id', '=', 'ss_cargo.loading_port_id_2') 
        //         ->leftJoin('ss_setup_port as DP2', 'DP2.port_id', '=', 'ss_cargo.discharge_port_id_2') 
        //         ->join('ss_setup_unit as U1', 'U1.unit_id', '=', 'ss_cargo.unit_id') 
        //         ->join('ss_setup_unit as DU1', 'DU1.unit_id', '=', 'ss_cargo.loading_discharge_unit_id') 
        //         ->select('ss_cargo.*', 
        //                 'ss_setup_cargo_type.cargo_type_name', 'R1.region_name as R1name', 
        //                 'DR1.region_name as DR1name', 'C1.country_name as C1name', 
        //                 'DC1.country_name as DC1name', 'P1.port_name as P1name', 
        //                 'DP1.port_name as DP1name', 'P2.port_name as P2name', 
        //                 'DP2.port_name as DP2name', 'U1.unit_name as U1unit', 
        //                 'DU1.unit_name as DU1unit' 
        //                 )   
        //         ->orderBy('cargo_id','desc')    
        //         ->get();    

        $count=1;

        return view('admin/cargo/view',['data'=>$data,'count'=>1]);
    }

    function view_add(){
        $ss_setup_cargo_type= ss_setup_cargo_type::active()->get();
        $ss_setup_region= ss_setup_region::active()->get();
        $ss_setup_country= ss_setup_country::active()->get();
        $ss_setup_port= ss_setup_port::active()->get();
        $ss_setup_unit= ss_setup_unit::active()->get();

        return view('admin/cargo/add',['cargo_type'=>$ss_setup_cargo_type,
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

        return redirect()->route('admin.cargo.view');
    }



    function view_update($id){
        // $res=ss_cargo::where('cargo_id',$id)->first();
        // $res=DB::table('ss_cargo')->where('cargo_id',$id)->get();

        $res=ss_cargo::find($id);
        $ss_setup_cargo_type= ss_setup_cargo_type::active()->get();
        $ss_setup_region= ss_setup_region::active()->get();
        $ss_setup_country= ss_setup_country::active()->get();
        $ss_setup_port= ss_setup_port::active()->get();
        $ss_setup_unit= ss_setup_unit::active()->get();

        // $eq_req=explode(",", $res[0]->loading_discharge_equipment_req);
        // echo $res[0]->cargo_name;

        return view('admin/cargo/update',['res'=>$res,
                                        // 'eq_req'=>$eq_req,
                                        'cargo_type'=>$ss_setup_cargo_type,
                                        'region'=>$ss_setup_region,
                                        'country'=>$ss_setup_country,
                                        'port'=>$ss_setup_port,
                                        'unit'=>$ss_setup_unit]
                                    );
    }


    function update_req(Request $req){

        // $cargo = DB::table('ss_cargo')
        //       ->where('cargo_id', $req->cargo_id)
        //       ->update(['cargo_name' => $req->cargo_name]); 

        // $cargo=ss_cargo::where('cargo_id', $req->cargo_id)->first();
        $cargo=ss_cargo::find($req->cargo_id);

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

        $cargo->loading_discharge_equipment_req="";
        foreach ($req->loading_discharge_equipment_req as $selectedOption)
            $cargo->loading_discharge_equipment_req .= $selectedOption.", ";
        $cargo->loading_discharge_equipment_req=rtrim($cargo->loading_discharge_equipment_req, ", ");

        $cargo->additional_info=$req->additional_info;
        $cargo->is_active=$req->is_active;
        $cargo->modified_at=date('Y-m-d H:i:s');
        // $cargo->title=$req->brocker_name;
        // $cargo->title=$req->broacker_contact;
        // $cargo->title=$req->broacker_email;

        $cargo->save();


        $req->session()->flash('msg','cargo Details Updated');
        $req->session()->flash('alert','warning');

        return redirect()->route('admin.cargo.view');
    }


    function update_status($id, $status){

        $cargo= ss_cargo::find($id);
        $cargo->is_active=$status;
        $cargo->save();

        session()->flash('msg','cargo Status Updated');
        session()->flash('alert','warning');

        return redirect()->route('admin.cargo.view');
    }

    function delete($id){
        $cargo=ss_cargo::find($id);

        $cargo->delete();

        session()->flash('msg','cargo Deleted');
        session()->flash('alert','danger');
        return redirect()->route('admin.cargo.view');
    }

}
