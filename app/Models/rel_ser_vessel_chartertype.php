<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel_ser_vessel_chartertype extends Model
{
    use HasFactory;
    public $table='rel_ser_vessel_chartertype';
    public $timestamps=false;
    protected $primaryKey = 'id';
    

    public function chartertype(){
        return $this->belongsTo(vessel_search_history::class,'vessel_id');
    }

    
    public function SVchartertype(){
        return $this->belongsTo(ss_setup_charter_type::class,'charter_type_id'); // rel_vessel_chartertype table ki id aegi yaha.
    }
}
