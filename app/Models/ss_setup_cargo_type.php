<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ss_setup_cargo_type extends Model
{
    // Baap
    use HasFactory;
    public $table='ss_setup_cargo_type';
    public $timestamps=false;
    protected $primaryKey = 'cargo_type_id';
    
    public function scopeActive($query){
        return $query->where('is_active',1);
    }

    public function scopeAscend($query){
        return $query->orderBy('cargo_type_name',"ASC");
    }
    
    // cargo
    public function CAcargotype(){
        return $this->hasMany('App\Models\rel_cargo_cargotype',"cargo_type_id");
    }
    public function SCAcargotype(){
        return $this->hasMany('App\Models\rel_ser_cargo_cargotype',"cargo_type_id");
    }

    // public function cargo(){
    //     return $this->hasMany('App\Models\ss_cargo',"cargo_type_id");
    // }
}
