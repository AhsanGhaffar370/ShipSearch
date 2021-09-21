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

    
    //ss_user
    public function user(){
        // return $this->hasMany('model_name(user)',"foreign_key(name of FK inside user table)",'local_key (name of primary key of this table)');
        return $this->hasMany('App\Models\ss_user',"country_id"); //here, country_id is a fk column inside ss_user table. 
        // select * from ss_user where country_id=1;
    }
    
    // company
    public function company(){
        // return $this->hasMany('model_name(company)',"foreign_key(name of FK inside company table)",'local_key (name of primary key of this table)');
        return $this->hasMany('App\Models\ss_setup_company_directory',"country_id"); //here, country_id is a fk column inside ss_company table. 
        // select * from company where user_id=1;
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
    
    // vessel_sale and ser vessel_sale
    public function VScountry(){
        return $this->hasMany('App\Models\rel_vsale_country',"country_id");
    }
    public function SVScountry(){
        return $this->hasMany('App\Models\rel_ser_vsale_country',"country_id");
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
