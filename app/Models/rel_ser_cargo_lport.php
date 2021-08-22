<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel_ser_cargo_lport extends Model
{
    use HasFactory;
    public $table='rel_ser_cargo_lport';
    public $timestamps=false;
    protected $primaryKey = 'id';


    public function Lport(){
        return $this->belongsTo(cargo_search_history::class,'cargo_id');
    }

    
    public function SCAlport(){
        return $this->belongsTo(ss_setup_port::class,'loading_port_id');
    }
}
