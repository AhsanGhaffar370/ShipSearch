<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel_vessel_port extends Model
{
    use HasFactory;
    public $table='rel_vessel_port';
    public $timestamps=false;
    protected $primaryKey = 'id';


    public function port(){
        return $this->belongsTo(ss_vessel::class,'vessel_id');
    }


    public function Vport(){
        return $this->belongsTo(ss_setup_port::class,'port_id');
    }
}
