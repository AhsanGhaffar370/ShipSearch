<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ss_setup_unit extends Model
{
    use HasFactory;
    public $table='ss_setup_unit';
    public $timestamps=false;
    
    public function scopeActive($query){
        return $query->where('is_active',1);
    }
}
