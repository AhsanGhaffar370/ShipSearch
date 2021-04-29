<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\ss_user;

use Illuminate\Http\Request;

class Front_auth extends Controller
{
    function login_req(Request $req){
        $email= $req->email;
        $password= md5($req->pass);

        $res=ss_user::where('email',$email)->where('password',$password)->get();

        if(isset($res[0])){
            if($res[0]->is_active==1){
                $req->session()->put('front_uid',$res[0]->user_id);
                $fullname=$res[0]->first_name;
                $req->session()->put('front_uname',$fullname);
                return redirect()->route('home');
            }
            else{
                $req->session()->flash('err','email or password is incorrect');
                return redirect()->route('login');
            }

        }else{
            $req->session()->flash('err','email or password is incorrect');
            return redirect()->route('login');
        }
    }

    function reg_req(Request $req){

        $user=new ss_user;

        $user->first_name=$req->name;
        $user->email=$req->email;
        $user->password=md5($req->pass);

        $user->last_name=" ";
        $user->date_of_birth=date('Y-m-d');
        $user->company_id=2;
        $user->job_title=" ";
        $user->permanent_address=" ";
        $user->temporary_address=" ";
        $user->post_number=" ";
        $user->country_id=2;
        $user->company_name=" ";
        $user->state_id=1;
        $user->city_id=1;
        $user->zip_code=" ";
        $user->phone=" ";
        $user->mobile=" ";
        $user->fax=" ";
        $user->mail_address=" ";
        $user->description=" ";
        $user->member_type_id=1;
        $user->created_at=date('Y-m-d');
        $user->modified_at=date('Y-m-d');
        $user->created_by=1;
        $user->modified_by=1;
        $user->modified_at=date('Y-m-d');

        $user->save();

        $req->session()->flash('reg_msg','Registered Successfully ! Login with your credentials.');

        return redirect()->route('login');
    }
}