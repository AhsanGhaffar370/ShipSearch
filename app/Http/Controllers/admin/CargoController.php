<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ss_cargo;

class CargoController extends Controller
{
    function view_list(){

        // $data=ss_cargo::where('cargo_id','1')->orderBy('cargo_id','desc')->get();
        // $data= DB::table('ss_cargo')->where('cargo_id',1)->get();

        $data = DB::table('ss_cargo')
                ->join('ss_setup_cargo_type', 'ss_setup_cargo_type.cargo_type_id', '=', 'ss_cargo.cargo_type_id')

                ->leftJoin('ss_setup_region as R1', 'R1.region_id', '=', 'ss_cargo.loading_region_id')
                // ->join('ss_setup_region R1','R1.region_id=ss_cargo.loading_region_id','left')

                ->leftJoin('ss_setup_region as DR1', 'DR1.region_id', '=', 'ss_cargo.discharge_region_id')
                // ->join('ss_setup_region DR1','DR1.region_id=ss_cargo.discharge_region_id','left')

                // ->join('ss_setup_cargo_type', 'ss_setup_cargo_type.cargo_type_id', '=', 'ss_cargo.cargo_type_id')
                // ->join('ss_setup_country C1','C1.country_id=ss_cargo.loading_country_id','left')

                // ->join('ss_setup_cargo_type', 'ss_setup_cargo_type.cargo_type_id', '=', 'ss_cargo.cargo_type_id')
                // ->join('ss_setup_country DC1','DC1.country_id=ss_cargo.discharge_country_id','left')

                // ->join('ss_setup_cargo_type', 'ss_setup_cargo_type.cargo_type_id', '=', 'ss_cargo.cargo_type_id')
                // ->join('ss_setup_port P1','P1.port_id=ss_cargo.loading_port_id_1','left')
                
                // ->join('ss_setup_cargo_type', 'ss_setup_cargo_type.cargo_type_id', '=', 'ss_cargo.cargo_type_id')
                // ->join('ss_setup_port DP1','DP1.port_id=ss_cargo.discharge_port_id_1','left')

                // ->join('ss_setup_cargo_type', 'ss_setup_cargo_type.cargo_type_id', '=', 'ss_cargo.cargo_type_id')
                // ->join('ss_setup_port P2','P2.port_id=ss_cargo.loading_port_id_2','left')
                
                // ->join('ss_setup_cargo_type', 'ss_setup_cargo_type.cargo_type_id', '=', 'ss_cargo.cargo_type_id')
                // ->join('ss_setup_port DP2','DP2.port_id=ss_cargo.discharge_port_id_2','left')   
                
                // ->join('ss_setup_cargo_type', 'ss_setup_cargo_type.cargo_type_id', '=', 'ss_cargo.cargo_type_id')
                // ->join('ss_setup_unit U1','U1.unit_id=ss_cargo.unit_id')

                // ->join('ss_setup_cargo_type', 'ss_setup_cargo_type.cargo_type_id', '=', 'ss_cargo.cargo_type_id')
                // ->join('ss_setup_unit DU1','DU1.unit_id=ss_cargo.loading_discharge_unit_id')
                // ->join('ss_setup_cargo_type', 'ss_setup_cargo_type.cargo_type_id', '=', 'ss_cargo.cargo_type_id')
                // ->join('ss_setup_unit DU1','DU1.unit_id=ss_cargo.loading_discharge_unit_id')
                // ->join('ss_setup_cargo_type', 'ss_setup_cargo_type.cargo_type_id', '=', 'ss_cargo.cargo_type_id')
                // ->join('ss_setup_unit DU1','DU1.unit_id=ss_cargo.loading_discharge_unit_id')
                // ->join('ss_setup_cargo_type', 'ss_setup_cargo_type.cargo_type_id', '=', 'ss_cargo.cargo_type_id')
                // ->join('ss_setup_unit DU1','DU1.unit_id=ss_cargo.loading_discharge_unit_id')


                ->select('ss_cargo.*', 
                        'ss_setup_cargo_type.cargo_type_name',
                        'R1.region_name as R1name',
                        'DR1.region_name as DR1name'
                        )
                ->get();



                // $this->db->select('ss_cargo.*');
        
                // $this->db->select('ss_setup_cargo_type.cargo_type_name');
                
                // $this->db->select('R1.region_name as R1name');
                // $this->db->select('C1.country_name as C1name');
                // $this->db->select('P1.port_name as P1name');
                // $this->db->select('P2.port_name as P2name');
                
                // $this->db->select('DR1.region_name as DR1name');
                // $this->db->select('DC1.country_name as DC1name');
                // $this->db->select('DP1.port_name as DP1name');
                // $this->db->select('DP2.port_name as DP2name');
                
                // $this->db->select('U1.unit_name as U1unit');
                // $this->db->select('DU1.unit_name as DU1unit');
                
                // $this->db->join('ss_setup_cargo_type','ss_setup_cargo_type.cargo_type_id=ss_cargo.cargo_type_id');
                
                // $this->db->join('ss_setup_region R1','R1.region_id=ss_cargo.loading_region_id','left');
                // $this->db->join('ss_setup_country C1','C1.country_id=ss_cargo.loading_country_id','left');
                // $this->db->join('ss_setup_port P1','P1.port_id=ss_cargo.loading_port_id_1','left');
                // $this->db->join('ss_setup_port P2','P2.port_id=ss_cargo.loading_port_id_2','left');
                
                // $this->db->join('ss_setup_region DR1','DR1.region_id=ss_cargo.discharge_region_id','left');
                // $this->db->join('ss_setup_country DC1','DC1.country_id=ss_cargo.discharge_country_id','left');
                // $this->db->join('ss_setup_port DP1','DP1.port_id=ss_cargo.discharge_port_id_1','left');
                // $this->db->join('ss_setup_port DP2','DP2.port_id=ss_cargo.discharge_port_id_2','left');        
                
                // $this->db->join('ss_setup_unit U1','U1.unit_id=ss_cargo.unit_id');
                // $this->db->join('ss_setup_unit DU1','DU1.unit_id=ss_cargo.loading_discharge_unit_id');  

        echo "<pre>";
        print_r($data);

        // return view('admin/cargo/list',['data'=>$data]);
    }

    function view_add(){
        return view('admin/cargo/add');
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
