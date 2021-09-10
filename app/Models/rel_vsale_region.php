<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel_vsale_region extends Model
{
    use HasFactory;
    public $table='rel_vsale_region';
    public $timestamps=false;
    protected $primaryKey = 'id';


    public function region(){
        return $this->belongsTo(ss_vessel_sale::class,'vessel_sale_id');
    }


    public function VSregion(){
        return $this->belongsTo(ss_setup_region::class,'region_id');
    }
}
