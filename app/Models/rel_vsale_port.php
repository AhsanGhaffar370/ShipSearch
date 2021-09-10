<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel_vsale_port extends Model
{
    use HasFactory;
    public $table='rel_vsale_port';
    public $timestamps=false;
    protected $primaryKey = 'id';


    public function port(){
        return $this->belongsTo(ss_vessel_sale::class,'vessel_sale_id');
    }


    public function VSport(){
        return $this->belongsTo(ss_setup_port::class,'port_id');
    }
}
