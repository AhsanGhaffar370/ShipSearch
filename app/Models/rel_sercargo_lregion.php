<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel_sercargo_lregion extends Model
{
    use HasFactory;
    public $table='rel_sercargo_lregion';
    public $timestamps=false;
    protected $primaryKey = 'id';


    public function Lregion(){
        return $this->belongsTo(cargo_search_history::class,'sercargo_id');
    }

    
    public function SCAregion(){
        return $this->belongsTo(ss_setup_region::class,'lregion_id');
    }
}
