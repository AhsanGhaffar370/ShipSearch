<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ss_setup_charter_type extends Model
{
    use HasFactory;

    // Baap
    public $table='ss_setup_charter_type';
    public $timestamps=false;
    protected $primaryKey = 'charter_type_id';
    
    public function scopeActive($query){
        return $query->where('is_active',1);
    }

    public function scopeAscend($query){
        return $query->orderBy('charter_type_name',"ASC");
    }

    // vessel
    public function Vchartertype(){
        return $this->hasMany('App\Models\rel_vessel_chartertype',"charter_type_id");
    }
    public function SVchartertype(){
        return $this->hasMany('App\Models\rel_ser_vessel_chartertype',"charter_type_id");
    }

    // public function vessel(){
    //     return $this->hasMany('App\Models\ss_vessel',"charter_type_id");
    // }
}
