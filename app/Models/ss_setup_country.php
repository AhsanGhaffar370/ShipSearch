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

    public function scopeAscend($query){
        return $query->orderBy('country_name',"ASC");
    }

    
    //cargo
    public function CAlcountry(){
        return $this->hasMany('App\Models\rel_cargo_lcountry',"country_id");
    }
    public function CAdcountry(){
        return $this->hasMany('App\Models\rel_cargo_dcountry',"country_id");
    }

    //ser_cargo
    public function SCAlcountry(){
        return $this->hasMany('App\Models\rel_ser_cargo_lcountry',"country_id");
    }

    public function SCAldcountry(){
        return $this->hasMany('App\Models\rel_ser_cargo_dcountry',"country_id");
    }

    
    // vessel and ser vessel
    public function Vcountry(){
        return $this->hasMany('App\Models\rel_vessel_country',"country_id");
    }
    public function SVcountry(){
        return $this->hasMany('App\Models\rel_ser_vessel_country',"country_id");
    }

    //Direcotry
    // public function DirCountry(){
    //     return $this->hasOne('App\Models\ss_setup_company_directory',"country_id");
    // }


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
