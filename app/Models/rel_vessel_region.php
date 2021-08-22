<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel_vessel_region extends Model
{
    use HasFactory;
    public $table='rel_vessel_region';
    public $timestamps=false;
    protected $primaryKey = 'id';


    public function region(){
        return $this->belongsTo(ss_vessel::class,'vessel_id');
    }


    public function Vregion(){
        return $this->belongsTo(ss_setup_region::class,'region_id');
    }
}
