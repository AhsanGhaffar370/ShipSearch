<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cargo_search_history extends Model
{
    use HasFactory;

    public $table='cargo_search_history';
    public $timestamps=false;
    protected $primaryKey = 'id';
    
    protected $guarded = []; 

    public function Lcountry(){
        return $this->belongsTo(ss_setup_country::class,'loading_country_id');
    }

    public function Dcountry(){
        return $this->belongsTo(ss_setup_country::class,'discharge_country_id');
    }

    public function Lregion(){
        return $this->belongsTo(ss_setup_region::class,'loading_region_id');
    }

    public function Dregion(){
        return $this->belongsTo(ss_setup_region::class,'discharge_region_id');
    }

    public function Lport(){
        return $this->belongsTo(ss_setup_port::class,'loading_port_id');
    }

    // public function Lport2(){
    //     return $this->belongsTo(ss_setup_port::class,'loading_port_id_2');
    // }

    public function Dport(){
        return $this->belongsTo(ss_setup_port::class,'discharge_port_id');
    }
    
    // public function Dport2(){
    //     return $this->belongsTo(ss_setup_port::class,'discharge_port_id_2');
    // }
    
}
