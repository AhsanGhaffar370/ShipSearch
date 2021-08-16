<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel_cargo_dregion extends Model
{
    use HasFactory;
    public $table='rel_cargo_dregion';
    public $timestamps=false;
    protected $primaryKey = 'id';


    public function Dregion(){
        return $this->belongsTo(ss_cargo::class,'cargo_id');
    }


    public function CAdregion(){
        return $this->belongsTo(ss_setup_region::class,'dregion_id');
    }
}
