<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ss_setup_company_directory extends Model
{
    
    use HasFactory;
    public $table='ss_setup_company';
    public $timestamps=false;
    protected $primaryKey = 'company_id';
 
    protected $guarded = [];  
    // protected $fillable = ['country_id','country_name','sortname','phonecode','is_active','create_at','created_by','modified_at','modified_by'];  

    public function scopeActive($query){
        return $query->where('is_active',1);
    }

    public function scopeDesc($query){
        return $query->orderBy('company_id',"DESC");
    }


    

    public function DirRegion(){
        return $this->belongsTo(ss_setup_region::class,'region_id');
    }

    public function DirCountry(){
        return $this->belongsTo(ss_setup_country::class,'country_id');
    }

    public function DirPort(){
        return $this->belongsTo(ss_setup_port::class,'port_id');
    }
}
