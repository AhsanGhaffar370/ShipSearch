<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ss_setup_cargo_type;

class CargoTypeController extends Controller
{
    function view(){

        $data = ss_setup_cargo_type::desc()->get();

        $count=1;

        return view('admin/cargo_type/view',['data'=>$data,'count'=>1]);
    }

    function view_add(){
        return view('admin/cargo_type/add');
    }

    function add_req(Request $req){

        $cargo_type=new ss_setup_cargo_type;

        $cargo_type->cargo_type_name=$req->cargo_type_name;
        $cargo_type->is_active="1";

        $cargo_type->created_at=date('Y-m-d H:i:s');
        $cargo_type->created_by="1";
        $cargo_type->modified_at=date('Y-m-d H:i:s');
        $cargo_type->modified_by="0";

        $cargo_type->save();

        $req->session()->flash('msg','Cargo Type Added');
        $req->session()->flash('alert','success');

        return redirect()->route('admin.cargo_type.view');
    }



    function view_update($id){

        $res=ss_setup_cargo_type::find($id);
        return view('admin/cargo_type/update',['res'=>$res]);
    }


    function update_req(Request $req){

        $cargo_type=ss_setup_cargo_type::find($req->cargo_type_id);

        $cargo_type->cargo_type_name=$req->cargo_type_name;
        $cargo_type->is_active=$req->is_active;

        $cargo_type->modified_at=date('Y-m-d H:i:s');

        $cargo_type->save();


        $req->session()->flash('msg','Cargo Type Details Updated');
        $req->session()->flash('alert','warning');

        return redirect()->route('admin.cargo_type.view');
    }


    function update_status($id, $status){

        $cargo_type= ss_setup_cargo_type::find($id);
        $cargo_type->is_active=$status;

        $cargo_type->modified_at=date('Y-m-d H:i:s');

        $cargo_type->save();

        session()->flash('msg','Cargo Type Status Updated');
        session()->flash('alert','warning');

        return redirect()->route('admin.cargo_type.view');
    }

    // function delete($id){
    //     $cargo_type=ss_setup_cargo_type::find($id);

    //     $cargo_type->delete();

    //     session()->flash('msg','cargo_type Deleted');
    //     session()->flash('alert','danger');
    //     return redirect()->route('admin.cargo_type.view');
    // }
}
