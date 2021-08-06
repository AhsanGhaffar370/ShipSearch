<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel_ser_cargo_lregion extends Model
{
    use HasFactory;
    public $table='rel_ser_cargo_lregion';
    public $timestamps=false;
    protected $primaryKey = 'id';


    public function Lregion(){
        return $this->belongsTo(cargo_search_history::class,'ser_cargo_id');
    }

    
    public function SCAregion(){
        return $this->belongsTo(ss_setup_region::class,'lregion_id');
    }
}
