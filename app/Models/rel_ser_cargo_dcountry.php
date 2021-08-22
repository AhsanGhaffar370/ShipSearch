<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel_ser_cargo_dcountry extends Model
{
    use HasFactory;
    public $table='rel_ser_cargo_dcountry';
    public $timestamps=false;
    protected $primaryKey = 'id';


    public function Dcountry(){
        return $this->belongsTo(cargo_search_history::class,'cargo_id');
    }

    
    public function SCAdcountry(){
        return $this->belongsTo(ss_setup_country::class,'discharge_country_id');
    }
}
