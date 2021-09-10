<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel_ser_vsale_port extends Model
{
    use HasFactory;
    public $table='rel_ser_vsale_port';
    public $timestamps=false;
    protected $primaryKey = 'id';
    

    public function port(){
        return $this->belongsTo(vessel_sale_search_history::class,'vessel_sale_id');
    }

    
    public function SVSport(){
        return $this->belongsTo(ss_setup_port::class,'port_id'); // rel_ser_vessel_port table ki id aegi yaha.
    }
}
