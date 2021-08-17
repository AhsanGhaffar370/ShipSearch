<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel_ser_cargo_cargotype extends Model
{
    use HasFactory;
    public $table='rel_ser_cargo_cargotype';
    public $timestamps=false;
    protected $primaryKey = 'id';


    public function cargotype(){
        return $this->belongsTo(cargo_search_history::class,'ser_cargo_id');
    }

    
    public function SCAcargotype(){
        return $this->belongsTo(ss_setup_cargo_type::class,'cargo_type_id');
    }
}
