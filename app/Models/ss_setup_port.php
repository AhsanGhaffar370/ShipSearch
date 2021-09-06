<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ss_setup_port extends Model
{
    use HasFactory;
    public $table='ss_setup_port';
    public $timestamps=false;
    protected $primaryKey = 'port_id';

    public function scopeActive($query){
        return $query->where('is_active',1);
    }

    public function scopeAscend($query){
        return $query->orderBy('port_name',"ASC");
    }

    
    //cargo
    public function CAlport(){
        return $this->hasMany('App\Models\rel_cargo_lport',"port_id");
    }
    public function CAdport(){
        return $this->hasMany('App\Models\rel_cargo_dport',"port_id");
    }

    //ser cargo
    public function SCAlport(){
        return $this->hasMany('App\Models\rel_ser_cargo_lport',"port_id");
    }
    public function SCAdport(){
        return $this->hasMany('App\Models\rel_ser_cargo_dport',"port_id");
    }

    
    // vessel and ser vessel
    public function Vport(){
        return $this->hasMany('App\Models\rel_vessel_port',"port_id");
    }
    public function SVport(){
        return $this->hasMany('App\Models\rel_ser_vessel_port',"port_id");
    }

    // public function Lcargo1(){
    //     return $this->hasMany('App\Models\ss_cargo',"loading_port_id_1");
    // }
    // public function Lcargo2(){
    //     return $this->hasMany('App\Models\ss_cargo',"loading_port_id_2");
    // }
    // public function Dcargo1(){
    //     return $this->hasMany('App\Models\ss_cargo',"discharge_port_id_1");
    // }
    // public function Dcargo2(){
    //     return $this->hasMany('App\Models\ss_cargo',"discharge_port_id_2");
    // }

    public function region_country_port(){
        return $this->hasMany('App\Models\ss_setup_region_country_port',"port_id");
    }
    
}
