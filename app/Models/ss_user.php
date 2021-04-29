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
}
