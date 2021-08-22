<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel_ser_vessel_port extends Model
{
    use HasFactory;
    public $table='rel_ser_vessel_port';
    public $timestamps=false;
    protected $primaryKey = 'id';
    

    public function port(){
        return $this->belongsTo(vessel_search_history::class,'vessel_id');
    }

    
    public function SVport(){
        return $this->belongsTo(ss_setup_port::class,'port_id'); // rel_ser_vessel_port table ki id aegi yaha.
    }
}
