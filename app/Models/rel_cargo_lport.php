<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel_cargo_lport extends Model
{
    use HasFactory;
    public $table='rel_cargo_lport';
    public $timestamps=false;
    protected $primaryKey = 'id';


    public function Lport(){
        return $this->belongsTo(ss_cargo::class,'cargo_id');
    }


    public function CAlport(){
        return $this->belongsTo(ss_setup_port::class,'lport_id');
    }
}
