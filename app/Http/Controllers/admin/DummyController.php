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

class DummyController extends Controller
{
    function view(){

        $data = ss_cargo::with(['cargotype','Lcountry','Dcountry','Lregion','Dregion','Lunit','Dunit','Lport1','Lport2','Dport1','Dport2'])->get();

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

        foreach ($req->loading_discharge_equipment_req as $selectedOption)
            $cargo->loading_discharge_equipment_req .= $selectedOption.", ";

        $cargo->loading_discharge_equipment_req=rtrim($cargo->loading_discharge_equipment_req, ", ");

        $cargo->additional_info=$req->additional_info;
        $cargo->is_active="1";
        $cargo->created_at=date('Y-m-d H:i:s');
        $cargo->created_by="1";
        $cargo->modified_at=date('Y-m-d H:i:s');
        $cargo->modified_by="0";

        $cargo->save();

        $req->session()->flash('msg','Cargo Added');
        $req->session()->flash('alert','success');

        return redirect()->route('admin.cargo.view');
    }



    function view_update($id){

        $res=ss_cargo::find($id);
        $ss_setup_cargo_type= ss_setup_cargo_type::active()->get();
        $ss_setup_region= ss_setup_region::active()->get();
        $ss_setup_country= ss_setup_country::active()->get();
        $ss_setup_port= ss_setup_port::active()->get();
        $ss_setup_unit= ss_setup_unit::active()->get();

        return view('admin/cargo/update',['res'=>$res,
                                        'cargo_type'=>$ss_setup_cargo_type,
                                        'region'=>$ss_setup_region,
                                        'country'=>$ss_setup_country,
                                        'port'=>$ss_setup_port,
                                        'unit'=>$ss_setup_unit]
                                    );
    }


    function update_req(Request $req){

        $cargo=ss_cargo::find($req->cargo_id);

        $cargo->cargo_name=$req->cargo_name;
        $cargo->cargo_type_id=$req->cargo_type_id;
        $cargo->loading_region_id=$req->loading_region_id;

        $cargo->loading_discharge_equipment_req="";
        foreach ($req->loading_discharge_equipment_req as $selectedOption)
            $cargo->loading_discharge_equipment_req .= $selectedOption.", ";
        $cargo->loading_discharge_equipment_req=rtrim($cargo->loading_discharge_equipment_req, ", ");

        $cargo->is_active=$req->is_active;
        $cargo->modified_at=date('Y-m-d H:i:s');

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
