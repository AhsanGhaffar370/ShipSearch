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

    public function scopeAscend($query){
        return $query->orderBy('region_name',"ASC");
    }

    //cargo
    public function CAlregion(){
        return $this->hasMany('App\Models\rel_cargo_lregion',"region_id");
    }
    public function CAdregion(){
        return $this->hasMany('App\Models\rel_cargo_dregion',"region_id");
    }

    //ser cargo
    public function SCAlregion(){
        return $this->hasMany('App\Models\rel_ser_cargo_lregion',"region_id");
    }
    public function SCAdregion(){
        return $this->hasMany('App\Models\rel_ser_cargo_dregion',"region_id");
    }
    
    // vessel and ser vessel
    public function Vregion(){
        return $this->hasMany('App\Models\rel_vessel_region',"region_id");
    }
    public function SVregion(){
        return $this->hasMany('App\Models\rel_ser_vessel_region',"region_id");
    }
    
    // vessel_sale and ser vessel_sale
    public function VSregion(){
        return $this->hasMany('App\Models\rel_vsale_region',"region_id");
    }
    public function SVSregion(){
        return $this->hasMany('App\Models\rel_ser_vsale_region',"region_id");
    }





    public function region_country_port(){
        return $this->hasMany('App\Models\ss_setup_region_country_port',"region_id");
    }



    // Directory
    // public function DirRegion(){
    //     return $this->hasOne('App\Models\ss_setup_company_directory',"region_id");
    // }


    // public function Lcargo(){
    //     return $this->hasMany('App\Models\ss_cargo',"loading_region_id");
    // }
    // public function Dcargo(){
    //     return $this->hasMany('App\Models\ss_cargo',"discharge_region_id");
    // }
}
