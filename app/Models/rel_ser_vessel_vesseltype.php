<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel_ser_vessel_vesseltype extends Model
{
    use HasFactory;
    public $table='rel_ser_vessel_vesseltype';
    public $timestamps=false;
    protected $primaryKey = 'id';
    

    public function vesseltype(){
        return $this->belongsTo(vessel_search_history::class,'vessel_id');
    }

    
    public function SVvesseltype(){
        return $this->belongsTo(ss_setup_vessel_type::class,'vessel_type_id'); // rel_ser_vessel_vesseltype table ki id aegi yaha.
    }
}
