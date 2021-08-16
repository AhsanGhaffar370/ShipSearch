<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel_cargo_dcountry extends Model
{
    use HasFactory;
    public $table='rel_cargo_dcountry';
    public $timestamps=false;
    protected $primaryKey = 'id';


    public function Dcountry(){
        return $this->belongsTo(ss_cargo::class,'cargo_id');
    }


    public function CAdcountry(){
        return $this->belongsTo(ss_setup_country::class,'dcountry_id');
    }
}
