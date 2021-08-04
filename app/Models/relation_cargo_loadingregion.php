<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class relation_cargo_loadingregion extends Model
{

    use HasFactory;
    public $table='relation_cargo_loadingregion';
    public $timestamps=false;
    protected $primaryKey = 'id';
    protected $guarded = [];  


    public function Lregion(){
        return $this->belongsTo(ss_cargo::class,'cargo_id');
    }

    
    public function CAregion(){
        return $this->belongsTo(ss_setup_region::class,'region_id');
    }
}
