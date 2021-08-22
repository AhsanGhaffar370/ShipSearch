<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel_ser_cargo_lcountry extends Model
{
    use HasFactory;
    public $table='rel_ser_cargo_lcountry';
    public $timestamps=false;
    protected $primaryKey = 'id';


    public function Lcountry(){
        return $this->belongsTo(cargo_search_history::class,'cargo_id');
    }

    
    public function SCAlcountry(){
        return $this->belongsTo(ss_setup_country::class,'loading_country_id');
    }
}
