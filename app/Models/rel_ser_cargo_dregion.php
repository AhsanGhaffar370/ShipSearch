<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel_ser_cargo_dregion extends Model
{
    use HasFactory;
    public $table='rel_ser_cargo_dregion';
    public $timestamps=false;
    protected $primaryKey = 'id';


    public function Lregion(){
        return $this->belongsTo(cargo_search_history::class,'cargo_id');
    }

    
    public function SCAdregion(){
        return $this->belongsTo(ss_setup_region::class,'discharge_region_id');
    }
}
