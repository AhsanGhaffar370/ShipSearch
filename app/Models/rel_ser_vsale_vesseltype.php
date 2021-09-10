<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel_ser_vsale_vesseltype extends Model
{
    use HasFactory;
    public $table='rel_ser_vsale_vesseltype';
    public $timestamps=false;
    protected $primaryKey = 'id';
    

    public function vesseltype(){
        return $this->belongsTo(vessel_sale_search_history::class,'vessel_sale_id');
    }

    
    public function SVSvesseltype(){
        return $this->belongsTo(ss_setup_vessel_type::class,'vessel_type_id'); // rel_ser_vessel_vesseltype table ki id aegi yaha.
    }
}
