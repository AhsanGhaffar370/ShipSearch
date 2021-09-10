<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vessel_sale_search_history extends Model
{  
    use HasFactory;

    public $table='vessel_sale_search_history';
    public $timestamps=false;
    protected $primaryKey = 'id';
    
    protected $guarded = []; 

    

    public function vesseltype(){
        return $this->hasMany('App\Models\rel_ser_vsale_vesseltype',"vessel_sale_id");
    }
    public function region(){
        return $this->hasMany('App\Models\rel_ser_vsale_region',"vessel_sale_id");
    }
    public function country(){
        return $this->hasMany('App\Models\rel_ser_vsale_country',"vessel_sale_id");
    }
    public function port(){
        return $this->hasMany('App\Models\rel_ser_vsale_port',"vessel_sale_id");
    }

    // public function region(){
    //     return $this->belongsTo(ss_setup_region::class,'region_id');
    // }

    // public function country(){
    //     return $this->belongsTo(ss_setup_country::class,'country_id');
    // }

    // public function port(){
    //     return $this->belongsTo(ss_setup_port::class,'port_id');
    // }
}
