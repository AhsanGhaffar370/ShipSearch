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
    function view_list(){

        // $data=ss_cargo::where('cargo_id','1')->orderBy('cargo_id','desc')->get();
        // $data= DB::table('ss_cargo')->where('cargo_id',1)->get();

        $data = DB::table('ss_cargo')
                ->join('ss_setup_cargo_type', 'ss_setup_cargo_type.cargo_type_id', '=', 'ss_cargo.cargo_type_id')
                ->leftJoin('ss_setup_region as R1', 'R1.region_id', '=', 'ss_cargo.loading_region_id')
                ->leftJoin('ss_setup_region as DR1', 'DR1.region_id', '=', 'ss_cargo.discharge_region_id')
                ->leftJoin('ss_setup_country as C1', 'C1.country_id', '=', 'ss_cargo.loading_country_id')
                ->leftJoin('ss_setup_country as DC1', 'DC1.country_id', '=', 'ss_cargo.discharge_country_id')
                ->leftJoin('ss_setup_port as P1', 'P1.port_id', '=', 'ss_cargo.loading_port_id_1')
                ->leftJoin('ss_setup_port as DP1', 'DP1.port_id', '=', 'ss_cargo.discharge_port_id_1')
                ->leftJoin('ss_setup_port as P2', 'P2.port_id', '=', 'ss_cargo.loading_port_id_2')
                ->leftJoin('ss_setup_port as DP2', 'DP2.port_id', '=', 'ss_cargo.discharge_port_id_2')
                ->join('ss_setup_unit as U1', 'U1.unit_id', '=', 'ss_cargo.unit_id')
                ->join('ss_setup_unit as DU1', 'DU1.unit_id', '=', 'ss_cargo.loading_discharge_unit_id')
                ->select('ss_cargo.*', 
                        'ss_setup_cargo_type.cargo_type_name',
                        'R1.region_name as R1name',
                        'DR1.region_name as DR1name',
                        'C1.country_name as C1name',
                        'DC1.country_name as DC1name',
                        'P1.port_name as P1name',
                        'DP1.port_name as DP1name',
                        'P2.port_name as P2name',
                        'DP2.port_name as DP2name',
                        'U1.unit_name as U1unit',
                        'DU1.unit_name as DU1unit'
                        )
                ->orderBy('cargo_id','desc')
                ->get();

        // echo "<pre>";
        // print_r($data);
        $count=1;
        return view('admin/cargo/list',['data'=>$data,'count'=>1]);
    }

    function view_add(){
        $ss_setup_cargo_type= ss_setup_cargo_type::all();
        $ss_setup_region= ss_setup_region::all();
        $ss_setup_country= ss_setup_country::all();
        $ss_setup_port= ss_setup_port::all();
        $ss_setup_unit= ss_setup_unit::all();
        return view('admin/cargo/add',['cargo_type'=>$ss_setup_cargo_type,
                                        'region'=>$ss_setup_region,
                                        'country'=>$ss_setup_country,
                                        'port'=>$ss_setup_port,
                                        'unit'=>$ss_setup_unit]);
    }

    function add(Request $req){

        // $req->validate([
        //     'image'=>'required | mimes:jpg,jpeg,png,PNG',
        //     'slug'=>'required | unique:ss_cargo'
        // ]);

        $cargo=new ss_cargo;

        $cargo->title=$req->title;
        // $post->title= $req->input('title');
        
        
        $cargo->save();

        $req->session()->flash('msg','Cargo Inserted');
        $req->session()->flash('alert','success');

        return redirect('admin/cargo/list');
    }

    function delete($id){
        $post=ss_cargo::find($id);

        $post->delete();

        session()->flash('msg','cargo Deleted');
        session()->flash('alert','danger');
        return redirect('admin/cargo/list');

    }

    function update_status($id, $status){
        
        $post= ss_cargo::find($id);
        $post->status=$status;
        $post->save();

        session()->flash('msg','cargo Status Updated');
        session()->flash('alert','warning');

        return redirect('admin/cargo/list');
    }

    function edit($id){
        return view("admin/cargo/update")->with("res",ss_cargo::find($id));
    }


    function update(Request $req){

        $req->validate([
            'image'=>'mimes:jpg,jpeg,png,PNG'
        ]);

        $post= ss_cargo::find($req->id);

        $post->title=$req->title;
        // $post->title= $req->input('title');

        $post->save();

        $req->session()->flash('msg','cargo Updated');
        $req->session()->flash('alert','warning');

        return redirect('admin/cargo/list');
    }
}
