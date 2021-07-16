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

    public function scopeDesc($query){
        return $query->orderBy('vessel_type_id',"DESC");
    }

    // public function vessel(){
    //     return $this->hasMany('App\Models\ss_vessel',"vessel_type_id");
    // }
}
