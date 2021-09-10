<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel_ser_vsale_region extends Model
{
    use HasFactory;
    public $table='rel_ser_vsale_region';
    public $timestamps=false;
    protected $primaryKey = 'id';
    

    public function region(){
        return $this->belongsTo(vessel_sale_search_history::class,'vessel_sale_id');
    }

    
    public function SVSregion(){
        return $this->belongsTo(ss_setup_region::class,'region_id'); // rel_ser_vessel_region table ki id aegi yaha.
    }
}
