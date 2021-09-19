<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ss_setup_state extends Model
{
    use HasFactory;
    public $table='ss_setup_state';
    public $timestamps=false;
    protected $primaryKey = 'state_id';

    protected $guarded = [];  
    // protected $fillable = ['country_id','country_name','sortname','phonecode','is_active','create_at','created_by','modified_at','modified_by'];  

    public function scopeActive($query){
        return $query->where('is_active',1);
    }

    public function scopeAscend($query){
        return $query->orderBy('state_name',"ASC");
    }

    public function state(){
        return $this->hasMany('App\Models\ss_user',"state_id");
    }

    
}
