<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\ss_user;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Mail;

class Front_auth extends Controller
{
    function login_req(Request $req){
        $email= $req->email;
        $password= md5($req->pass);

        $res=ss_user::email($email)->pass($password)->get();

        if(isset($res[0])){
            
            $res=ss_user::email($email)->pass($password)->isActive("1")->get();
            if(isset($res[0])){
                $req->session()->put('front_uid',$res[0]->user_id);
                $fullname=$res[0]->first_name;
                $req->session()->put('front_uname',$fullname);
                return redirect()->route('home');
            }
            else{
                $req->session()->flash('err','verification error');
                
                return redirect()->route('login');
            }
        }else{
            $req->session()->flash('err1','login error');
            return redirect()->route('login');
        }
    }

    function reg_req(Request $req){

        ss_user::email($req->email)->isActive("0")->delete();


        $user=new ss_user;

        $user->first_name=$req->name;
        $user->email=$req->email;
        $user->password=md5($req->pass);
        $code=md5($req->email.time());
        $user->activationcode=$code;
        $user->is_active=0;

        
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

        $user21['to']=$req->email;
        $data=['code'=>$code];

        Mail::send('front/mail_format',$data, function($messages) use ($user21){
            $messages->from('ahsanrao237@gmail.com', 'ShipSearch Support');
            $messages->to($user21['to']);
            $messages->subject("Email Verification | shipsearch.com");
            // $message->attach($pathToFile, array('as' => $display, 'mime' => $mime));
        });

        $req->session()->flash('reg_msg',$req->email);

        return redirect()->route('login');
    }

    function email_ver_req($code){

        $status="invalid code";
        $res= ss_user::code($code)->exists();

        if($res){
            // echo 'exist';
            $user=ss_user::code($code)->isActive('0')->first();
            if($user==null){
                $status="already verified";
            }else{
                $user->is_active=1;
                $user->save();

                $status="email verified";
            }

        }else{
            $status="invalid code";
        }
        
        return view('front/email_verification',['status'=>$status]);
    }

    function checkmail_ajax(Request $req){
        $user= ss_user::email($req->email)->isActive("1")->first();

        if($user==null){
            echo "not exist";
        }else{
            echo "exist";
        }
    }
}