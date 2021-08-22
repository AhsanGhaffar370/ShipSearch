<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vessel_search_history extends Model
{
    use HasFactory;
    
    public $table='vessel_search_history';
    public $timestamps=false;
    protected $primaryKey = 'id';
    
    protected $guarded = []; 



    public function vesseltype(){
        return $this->hasMany('App\Models\rel_ser_vessel_vesseltype',"vessel_id");
    }
    public function chartertype(){
        return $this->hasMany('App\Models\rel_ser_vessel_chartertype',"vessel_id");
    }
    public function region(){
        return $this->hasMany('App\Models\rel_ser_vessel_region',"vessel_id");
    }
    public function country(){
        return $this->hasMany('App\Models\rel_ser_vessel_country',"vessel_id");
    }
    public function port(){
        return $this->hasMany('App\Models\rel_ser_vessel_port',"vessel_id");
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

    
    // public function Dport2(){
    //     return $this->belongsTo(ss_setup_port::class,'discharge_port_id_2');
    // }
}
