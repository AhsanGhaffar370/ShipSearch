<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ss_setup_unit extends Model
{
    use HasFactory;
    public $table='ss_setup_unit';
    public $timestamps=false;
    protected $primaryKey = 'unit_id';
    
    public function scopeActive($query){
        return $query->where('is_active',1);
    }

    
    // public function Lcargo(){
    //     return $this->hasMany('App\Models\ss_cargo',"unit_id");
    // }
    // public function Dcargo(){
    //     return $this->hasMany('App\Models\ss_cargo',"loading_discharge_unit_id");
    // }
}
