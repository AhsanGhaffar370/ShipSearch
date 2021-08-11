<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ss_setup_country extends Model
{
    use HasFactory;
    public $table='ss_setup_country';
    public $timestamps=false;
    protected $primaryKey = 'country_id';

    protected $guarded = [];  
    // protected $fillable = ['country_id','country_name','sortname','phonecode','is_active','create_at','created_by','modified_at','modified_by'];  

    public function scopeActive($query){
        return $query->where('is_active',1);
    }

    public function scopeDesc($query){
        return $query->orderBy('country_id',"DESC");
    }

    // public function Lcargo(){
    //     return $this->hasMany('App\Models\ss_cargo',"loading_country_id");
    // }
    // public function Dcargo(){
    //     return $this->hasMany('App\Models\ss_cargo',"discharge_country_id");
    // }

    
    public function region_country_port(){
        return $this->hasMany('App\Models\ss_setup_region_country_port',"country_id");
    }
}
