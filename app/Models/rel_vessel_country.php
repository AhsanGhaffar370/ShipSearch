<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel_vessel_country extends Model
{
    use HasFactory;
    public $table='rel_vessel_country';
    public $timestamps=false;
    protected $primaryKey = 'id';


    public function country(){
        return $this->belongsTo(ss_vessel::class,'vessel_id');
    }


    public function Vcountry(){
        return $this->belongsTo(ss_setup_country::class,'country_id');
    }
}
