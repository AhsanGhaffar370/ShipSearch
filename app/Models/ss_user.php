<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ss_user extends Model
{
    use HasFactory;
    public $table='ss_user';
    public $timestamps=false;
    protected $primaryKey = 'user_id';

 
    public function scopeIsActive($query, $isactive){
        return $query->where('is_active',$isactive);
    }

    public function scopeEmail($query, $email){
        return $query->where('email',$email);
    }

    public function scopePass($query, $pass){
        return $query->where('password',$pass);
    }

    public function scopeCode($query, $code){
        return $query->where('activationcode',$code);
    }

    public function user_info(){
        return $this->hasMany('App\Models\ss_cargo',"user_id");
    }
    
}
