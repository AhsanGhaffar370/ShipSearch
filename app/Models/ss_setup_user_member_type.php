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
        // return $this->hasMany('model_name(user)',"foreign_key(name of FK inside user table)",'local_key (name of primary key of this table)');
        return $this->hasMany('App\Models\ss_user',"member_type_id"); //here, member_type_id is a fk column inside ss_user table. 
        // select * from ss_user where member_type_id=1;
    }
}
