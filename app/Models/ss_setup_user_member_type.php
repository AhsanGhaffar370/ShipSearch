<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ss_setup_user_member_type extends Model
{
    use HasFactory;
    public $table='ss_setup_user_member_type';
    public $timestamps=false;
    protected $primaryKey = 'user_member_type_id';

    protected $guarded = [];  
    // protected $fillable = ['country_id','country_name','sortname','phonecode','is_active','create_at','created_by','modified_at','modified_by'];  

    public function scopeActive($query){
        return $query->where('is_active',1);
    }

    public function user_member_type(){
        return $this->hasMany('App\Models\ss_user',"user_member_type_id");
    }
}
