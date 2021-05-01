<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ss_setup_region;

class RegionController extends Controller
{
    function view(){

        $data = ss_setup_region::desc()->get();

        $count=1;

        return view('admin/region/view',['data'=>$data,'count'=>1]);
    }

    function view_add(){
        return view('admin/region/add');
    }

    function add_req(Request $req){

        $region=new ss_setup_region;

        $region->region_name=$req->region_name;
        $region->is_active="1";

        $region->created_at=date('Y-m-d H:i:s');
        $region->created_by="1";
        $region->modified_at=date('Y-m-d H:i:s');
        $region->modified_by="0";

        $region->save();

        $req->session()->flash('msg','Region Added');
        $req->session()->flash('alert','success');

        return redirect()->route('admin.region.view');
    }



    function view_update($id){

        $res=ss_setup_region::find($id);
        return view('admin/region/update',['res'=>$res]);
    }


    function update_req(Request $req){

        $region=ss_setup_region::find($req->region_id);

        $region->region_name=$req->region_name;
        $region->is_active=$req->is_active;

        $region->modified_at=date('Y-m-d H:i:s');

        $region->save();


        $req->session()->flash('msg','Region Details Updated');
        $req->session()->flash('alert','warning');

        return redirect()->route('admin.region.view');
    }


    function update_status($id, $status){

        $region= ss_setup_region::find($id);
        $region->is_active=$status;

        $region->modified_at=date('Y-m-d H:i:s');

        $region->save();

        session()->flash('msg','Region Status Updated');
        session()->flash('alert','warning');

        return redirect()->route('admin.region.view');
    }

    // function delete($id){
    //     $region=ss_setup_region::find($id);

    //     $region->delete();

    //     session()->flash('msg','region Deleted');
    //     session()->flash('alert','danger');
    //     return redirect()->route('admin.region.view');
    // }
}
