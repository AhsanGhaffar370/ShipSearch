<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ss_admin extends Model
{
    use HasFactory;
    public $table='ss_admin';
    public $timestamps=false;
    protected $primaryKey = 'admin_id';
}
