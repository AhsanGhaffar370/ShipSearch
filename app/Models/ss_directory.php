<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ss_directory extends Model
{

    use HasFactory;
    public $table='ss_user';
    public $timestamps=false;
    protected $primaryKey = 'user_id';
 
    protected $guarded = [];  
    // protected $fillable = ['country_id','country_name','sortname','phonecode','is_active','create_at','created_by','modified_at','modified_by'];  

    public function scopeActive($query){
        return $query->where('is_active',1);
    }

    public function scopeDesc($query){
        return $query->orderBy('user_id',"DESC");
    }

}
