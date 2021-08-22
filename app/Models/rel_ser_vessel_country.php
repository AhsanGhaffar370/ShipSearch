<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel_ser_vessel_country extends Model
{
    use HasFactory;
    public $table='rel_ser_vessel_country';
    public $timestamps=false;
    protected $primaryKey = 'id';
    

    public function country(){
        return $this->belongsTo(vessel_search_history::class,'vessel_id');
    }

    
    public function SVcoutnry(){
        return $this->belongsTo(ss_setup_country::class,'country_id'); // rel_ser_vessel_country table ki id aegi yaha.
    }
}
