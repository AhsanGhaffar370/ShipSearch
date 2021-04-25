<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ss_setup_region extends Model
{
    use HasFactory;
    public $table='ss_setup_region';
    public $timestamps=false;
    protected $primaryKey = 'region_id';
    
    public function scopeActive($query){
        return $query->where('is_active',1);
    }

    // public function Lcargo(){
    //     return $this->hasMany('App\Models\ss_cargo',"loading_region_id");
    // }
    // public function Dcargo(){
    //     return $this->hasMany('App\Models\ss_cargo',"discharge_region_id");
    // }
}
