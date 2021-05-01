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

    public function scopeDesc($query){
        return $query->orderBy('port_id',"DESC");
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

    
}
