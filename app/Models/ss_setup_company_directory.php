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

    // user table
    public function user(){
        // return $this->belongsTo(model_name(user),'foreign_key(name of FK inside this table)', 'other_key(name of pk inside user table)'); 
        return $this->belongsTo(ss_user::class,'user_id'); // here, user_id is a fk inside company table.
    }
    
    public function region(){
        // return $this->belongsTo(model_name(region),'foreign_key(name of FK inside this table)', 'other_key(name of pk inside region table)'); 
        return $this->belongsTo(ss_setup_region::class,'region_id'); // here, region_id is a fk inside user table.
    }
    public function country(){
        return $this->belongsTo(ss_setup_country::class,'country_id');
    }
    public function port(){
        return $this->belongsTo(ss_setup_port::class,'port_id');
    }
    


    // directory table
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
