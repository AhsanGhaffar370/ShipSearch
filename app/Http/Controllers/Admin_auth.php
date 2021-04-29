<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\ss_admin;

use Illuminate\Http\Request;

class Admin_auth extends Controller
{

    function login_req(Request $req){
        $email= $req->email;
        $password= md5($req->pass);

        $res=ss_admin::where('email',$email)->where('password',$password)->get();
        // echo "<pre>";
        // print_r($res[0]);
        if(isset($res[0])){
            if($res[0]->is_active==1){
                $req->session()->put('user_id',$res[0]->admin_id);
                $fullname=$res[0]->first_name." ".$res[0]->last_name;
                $req->session()->put('user_name',$fullname);
                return redirect()->route('admin.dashboard');
            }
            else{
                $req->session()->flash('err','email or password is incorrect');
                return redirect()->route('admin.login');
            }

        }else{
            $req->session()->flash('err','email or password is incorrect');
            return redirect()->route('admin.login');
        }
    }
}
