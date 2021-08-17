<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel_ser_cargo_dport extends Model
{
    use HasFactory;
    public $table='rel_ser_cargo_dport';
    public $timestamps=false;
    protected $primaryKey = 'id';


    public function Dport(){
        return $this->belongsTo(cargo_search_history::class,'ser_cargo_id');
    }

    
    public function SCAdport(){
        return $this->belongsTo(ss_setup_port::class,'discharge_port_id');
    }
}
