<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ss_setup_country;

class CountryController extends Controller
{
    function view(){

        $data = ss_setup_country::desc()->get();

        $count=1;

        return view('admin/country/view',['data'=>$data,'count'=>1]);
    }

    function view_add(){
        return view('admin/country/add');
    }

    function add_req(Request $req){

        $data=$req->all();
        $data['is_active'] = "1";
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = "1";
        $data['modified_at'] = date('Y-m-d H:i:s');
        $data['modified_by'] = "0";
        ss_setup_country::create($data);

        // $country=new ss_setup_country;

        // $country->country_name=$req->country_name;
        // $country->sortname=$req->sortname;
        // $country->phonecode=$req->phonecode;
        // $country->is_active="1";

        // $country->created_at=date('Y-m-d H:i:s');
        // $country->created_by="1";
        // $country->modified_at=date('Y-m-d H:i:s');
        // $country->modified_by="0";

        // $country->save();

        $req->session()->flash('msg','Country Added');
        $req->session()->flash('alert','success');

        return redirect()->route('admin.country.view');
    }



    function view_update($id){

        $res=ss_setup_country::find($id);
        return view('admin/country/update',['res'=>$res]);
    }


    function update_req(Request $req){

        $country=ss_setup_country::find($req->country_id);

        $country->country_name=$req->country_name;
        $country->sortname=$req->sortname;
        $country->phonecode=$req->phonecode;
        $country->is_active=$req->is_active;

        $country->modified_at=date('Y-m-d H:i:s');

        $country->save();


        $req->session()->flash('msg','country Details Updated');
        $req->session()->flash('alert','warning');

        return redirect()->route('admin.country.view');
    }


    function update_status($id, $status){

        $country= ss_setup_country::find($id);
        $country->is_active=$status;

        $country->modified_at=date('Y-m-d H:i:s');

        $country->save();

        session()->flash('msg','country Status Updated');
        session()->flash('alert','warning');

        return redirect()->route('admin.country.view');
    }

    // function delete($id){
    //     $country=ss_setup_country::find($id);

    //     $country->delete();

    //     session()->flash('msg','country Deleted');
    //     session()->flash('alert','danger');
    //     return redirect()->route('admin.country.view');
    // }
}
