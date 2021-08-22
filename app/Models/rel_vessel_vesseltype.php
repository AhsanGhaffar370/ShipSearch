<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel_vessel_vesseltype extends Model
{
    use HasFactory;
    public $table='rel_vessel_vesseltype';
    public $timestamps=false;
    protected $primaryKey = 'id';


    public function vesseltype(){
        return $this->belongsTo(ss_vessel::class,'vessel_id');
    }


    public function Vvesseltype(){
        return $this->belongsTo(ss_setup_vessel_type::class,'vessel_type_id');
    }
}
