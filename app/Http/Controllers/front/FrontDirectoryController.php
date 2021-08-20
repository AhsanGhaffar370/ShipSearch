<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ss_user;

class FrontDirectoryController extends Controller
{
    //
    function view(){

        $data = ss_user::active()->orderBy('user_id', 'DESC')->get();


        return view('front/directory/view',['data'=>$data]);
    }
}
