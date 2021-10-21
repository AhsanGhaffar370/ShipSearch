<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;
    public $table='users';
    public $timestamps=false;
    protected $primaryKey = 'id';

 
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
    
    public function user_member_type(){
        // return $this->belongsTo(model_name(member),'foreign_key(name of FK inside this table)', 'other_key(name of pk inside member table)'); 
        return $this->belongsTo(ss_setup_user_member_type::class,'member_type_id','user_member_type_id'); // here, member_type_id is a fk inside user table.
    }


    public function company(){
        // return $this->hasMany('model_name(company)',"foreign_key(name of FK inside company table)",'local_key (name of primary key of this table)');
        return $this->hasOne('App\Models\ss_setup_company_directory',"user_id"); //here, user_id is a fk column inside ss_company table. 
        // select * from company where user_id=1;
    }
    

    // public function region(){
    //     // return $this->belongsTo(model_name(region),'foreign_key(name of FK inside this table)', 'other_key(name of pk inside region table)'); 
    //     return $this->belongsTo(ss_setup_region::class,'region_id'); // here, region_id is a fk inside user table.
    // }
    public function country(){
        return $this->belongsTo(ss_setup_country::class,'country_id');
    }
    public function state(){
        return $this->belongsTo(ss_setup_state::class,'state_id');
    }
    public function city(){
        return $this->belongsTo(ss_setup_city::class,'city_id');
    }
    
}
