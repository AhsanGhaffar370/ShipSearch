<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel_vsale_country extends Model
{
    use HasFactory;
    public $table='rel_vsale_country';
    public $timestamps=false;
    protected $primaryKey = 'id';


    public function country(){
        return $this->belongsTo(ss_vessel_sale::class,'vessel_sale_id');
    }


    public function VScountry(){
        return $this->belongsTo(ss_setup_country::class,'country_id');
    }
}
