<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class Front_auth extends Controller
{
    function login_req(Request $req){
        $email= $req->input('email');
        $password= md5($req->input('pass'));

        $res=DB::table('ss_user')->where('email',$email)->where('password',$password)->get();

        if(isset($res[0])){
            if($res[0]->is_active==1){
                $req->session()->put('front_uid',$res[0]->user_id);
                $fullname=$res[0]->first_name;
                $req->session()->put('front_uname',$fullname);
                return redirect('/');
            }
            else{
                $req->session()->flash('err','email or password is incorrect');
                return redirect('/login');
            }

        }else{
            $req->session()->flash('err','email or password is incorrect');
            return redirect('/login');
        }
    }
}
