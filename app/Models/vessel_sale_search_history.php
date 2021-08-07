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

    public function region(){
        return $this->belongsTo(ss_setup_region::class,'region_id');
    }

    public function country(){
        return $this->belongsTo(ss_setup_country::class,'country_id');
    }

    public function port(){
        return $this->belongsTo(ss_setup_port::class,'port_id');
    }
}
