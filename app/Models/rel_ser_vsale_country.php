<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel_ser_vsale_country extends Model
{
    use HasFactory;
    public $table='rel_ser_vsale_country';
    public $timestamps=false;
    protected $primaryKey = 'id';
    

    public function country(){
        return $this->belongsTo(vessel_sale_search_history::class,'vessel_sale_id');
    }

    
    public function SVScountry(){
        return $this->belongsTo(ss_setup_country::class,'country_id'); // rel_ser_vessel_country table ki id aegi yaha.
    }
}
