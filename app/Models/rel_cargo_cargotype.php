<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel_cargo_cargotype extends Model
{
    use HasFactory;
    public $table='rel_cargo_cargotype';
    public $timestamps=false;
    protected $primaryKey = 'id';
    

    public function cargotype(){
        return $this->belongsTo(ss_cargo::class,'cargo_id');
    }

    
    public function CAcargotype(){
        return $this->belongsTo(ss_setup_cargo_type::class,'cargo_type_id'); // rel_cargo_cargo_type table ki id aegi yaha.
    }
}
