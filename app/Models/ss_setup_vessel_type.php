<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ss_setup_vessel_type extends Model
{
    use HasFactory;

    // Baap
    public $table='ss_setup_vessel_type';
    public $timestamps=false;
    protected $primaryKey = 'vessel_type_id';
    
    public function scopeActive($query){
        return $query->where('is_active',1);
    }

    public function scopeAscend($query){
        return $query->orderBy('vessel_type_name',"ASC");
    }
    
    // vessel and ser vessel
    public function Vvesseltype(){
        return $this->hasMany('App\Models\rel_vessel_vesseltype',"vessel_type_id");
    }
    public function SVvesseltype(){
        return $this->hasMany('App\Models\rel_ser_vessel_vesseltype',"vessel_type_id");
    }

    // public function vessel(){
    //     return $this->hasMany('App\Models\ss_vessel',"vessel_type_id");
    // }
}
