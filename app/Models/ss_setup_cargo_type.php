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

    public function scopeDesc($query){
        return $query->orderBy('cargo_type_id',"DESC");
    }

    // public function cargo(){
    //     return $this->hasMany('App\Models\ss_cargo',"cargo_type_id");
    // }
}
