<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel_vsale_vesseltype extends Model
{
    use HasFactory;
    public $table='rel_vsale_vesseltype';
    public $timestamps=false;
    protected $primaryKey = 'id';


    public function vesseltype(){
        return $this->belongsTo(ss_vessel_sale::class,'vessel_sale_id');
    }


    public function VSvesseltype(){
        return $this->belongsTo(ss_setup_vessel_type::class,'vessel_type_id');
    }
}
