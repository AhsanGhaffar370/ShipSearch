<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel_cargo_lcountry extends Model
{
    use HasFactory;
    public $table='rel_cargo_lcountry';
    public $timestamps=false;
    protected $primaryKey = 'id';


    public function Lcountry(){
        return $this->belongsTo(ss_cargo::class,'cargo_id');
    }


    public function CAlcountry(){
        return $this->belongsTo(ss_setup_country::class,'loading_country_id');
    }
}
