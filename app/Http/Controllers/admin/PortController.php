<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ss_setup_port;

class PortController extends Controller
{
    function view(){

        $data = ss_setup_port::desc()->get();

        $count=1;

        return view('admin/port/view',['data'=>$data,'count'=>1]);
    }

    function view_add(){
        return view('admin/port/add');
    }

    function add_req(Request $req){

        $port=new ss_setup_port;

        $port->port_name=$req->port_name;
        $port->is_active="1";

        $port->created_at=date('Y-m-d H:i:s');
        $port->created_by="1";
        $port->modified_at=date('Y-m-d H:i:s');
        $port->modified_by="0";

        $port->save();

        $req->session()->flash('msg','Port Added');
        $req->session()->flash('alert','success');

        return redirect()->route('admin.port.view');
    }



    function view_update($id){

        $res=ss_setup_port::find($id);
        return view('admin/port/update',['res'=>$res]);
    }


    function update_req(Request $req){

        $port=ss_setup_port::find($req->port_id);

        $port->port_name=$req->port_name;
        $port->is_active=$req->is_active;

        $port->modified_at=date('Y-m-d H:i:s');

        $port->save();


        $req->session()->flash('msg','Port Details Updated');
        $req->session()->flash('alert','warning');

        return redirect()->route('admin.port.view');
    }


    function update_status($id, $status){

        $port= ss_setup_port::find($id);
        $port->is_active=$status;

        $port->modified_at=date('Y-m-d H:i:s');

        $port->save();

        session()->flash('msg','Port Status Updated');
        session()->flash('alert','warning');

        return redirect()->route('admin.port.view');
    }

    // function delete($id){
    //     $port=ss_setup_port::find($id);

    //     $port->delete();

    //     session()->flash('msg','port Deleted');
    //     session()->flash('alert','danger');
    //     return redirect()->route('admin.port.view');
    // }
}
