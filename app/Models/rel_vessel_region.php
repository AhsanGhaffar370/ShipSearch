<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel_vessel_region extends Model
{
    use HasFactory;
    public $table='rel_vessel_region';
    public $timestamps=false;
    protected $primaryKey = 'id';

    public function region(){
        // return $this->belongsTo(model_name(ss_vessel),'foreign_key(name of FK inside this table)', 'other_key(name of pk inside ss_vessel table)');
        return $this->belongsTo(ss_vessel::class,'vessel_id'); // here, vessel_id is a fk inside rel_vessel_region table.
    }


    public function Vregion(){
        return $this->belongsTo(ss_setup_region::class,'region_id');
    }
}
