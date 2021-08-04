<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ss_vessel_sale extends Model
{
    use HasFactory;
    
    public $table='ss_vessel_sale';
    public $timestamps=false;
    protected $primaryKey = 'vessel_sale_id';

    
    protected $guarded = [];  
    // protected $fillable = ['country_id','country_name','sortname','phonecode','is_active','create_at','created_by','modified_at','modified_by'];  

    public function scopeActive($query){
        return $query->where('is_active',1);
    }

    public function scopeDesc($query){
        return $query->orderBy('vessel_id',"DESC");
    }

    public function vesseltype(){
        // return $this->belongsTo('App\Models\ss_setup_vessel_type','vessel_type_id');
        return $this->belongsTo(ss_setup_vessel_type::class,'vessel_type_id');
    }

    public function chartertype(){
        return $this->belongsTo(ss_setup_charter_type::class,'charter_type_id');
    }

    public function country(){
        return $this->belongsTo(ss_setup_country::class,'country_id');
    }

    public function region(){
        return $this->belongsTo(ss_setup_region::class,'region_id');
    }

    public function port(){
        return $this->belongsTo(ss_setup_port::class,'port_id');
    }
}
