<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\users;
use App\Models\ss_setup_company_directory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Mail;

use App\Models\ss_setup_region;
use App\Models\ss_setup_country;
use App\Models\ss_setup_port;

use App\Models\ss_setup_state;
use App\Models\ss_setup_city;
use App\Models\ss_setup_user_member_type;

use App\Models\cargo_search_history;
use App\Models\vessel_search_history;
use App\Models\vessel_sale_search_history;

class Front_auth extends Controller
{
    function login_req(Request $req){
        $email= $req->email;
        $password= md5($req->pass);

        $res=users::with(['user_member_type','company','country','state','city'])
                    ->email($email)
                    ->pass($password)
                    ->get()[0];

        // dd($res->user_member_type->member_type);

        if(isset($res)){
            
            $res=users::with(['user_member_type','company','country','state','city'])
                        ->email($email)
                        ->pass($password)
                        ->isActive("1")
                        ->get()[0];
                        
            if(isset($res)){
                $req->session()->put('member_type',$res->user_member_type->member_type);
                $req->session()->put('front_uid',$res->id);
                $fullname=$res->first_name.' '.$res->last_name ;
                $req->session()->put('front_uname',$fullname);
                $company_name=$res->company->company_name;
                $req->session()->put('company_name',$company_name);
                $phone=$res->company->phone;
                $req->session()->put('company_phone',$phone);
                $email=$res->company->email;
                $req->session()->put('company_email',$email);

                $req->session()->put('messenger_color',$res->messenger_color);
                $req->session()->put('dark_mode',$res->dark_mode);
                $req->session()->put('active_status',$res->active_status);
                $req->session()->put('name',$res->name);
                
                return redirect()->route('home');
            }
            else{
                $req->session()->flash('err','verification error. Signup again to get new verification code.');
                
                return redirect()->route('login');
            }
        }else{
            $req->session()->flash('err1','login error');
            return redirect()->route('login');
        }
    }

    function view_signup(){

        if((session()->has('front_uid'))){
            return redirect()->route('home');
        }else{
        
            $ss_setup_region= ss_setup_region::where('region_name','!=','Any')->active()->ascend()->get();
            $ss_setup_country= ss_setup_country::where('country_name','!=','Any')->active()->ascend()->get();
            $ss_setup_port= ss_setup_port::where('port_name','!=','Any')->active()->ascend()->get();
            $ss_setup_state= ss_setup_state::active()->ascend()->get();
            $ss_setup_city= ss_setup_city::active()->ascend()->get();
            $ss_setup_user_member_type= ss_setup_user_member_type::active()->get();
            
            return view('front/signup',['region'=>$ss_setup_region,
                                        'country'=>$ss_setup_country,
                                        'port'=>$ss_setup_port,
                                        'state'=>$ss_setup_state,
                                        'city'=>$ss_setup_city,
                                        'member_type'=>$ss_setup_user_member_type]);
        }
    }

    function signup_req(Request $req){
    
        users::email($req->email)->isActive("0")->delete();

    
        // User details
        $user=new users;
    
        $user->first_name=$req->first_name;
        $user->last_name=$req->last_name;
        $user->email=$req->email;
    
        $user->password=md5($req->pass);
        $code=md5($req->email.time());
        $user->activationcode=$code;
        $user->is_active=1;
    
    
        $user->date_of_birth=$req->date_of_birth;
        // $user->company_id=2;
        $user->company_name=$req->company_name;
        $user->job_title=$req->job_title;
        $user->permanent_address=$req->permanent_address;
        $user->temporary_address=$req->temporary_address;
        $user->post_number=$req->post_number;
        $user->country_id=$req->country_id;
        $user->state_id=$req->state_id;
        $user->city_id=$req->city_id;
        $user->zip_code=$req->zip_code;
        $user->phone=$req->phone;
        $user->mobile=$req->mobile;
        $user->fax=$req->fax;
        $user->mail_address=$req->mail_address;
        $user->description=$req->description;
        $user->member_type_id=$req->member_type_id;
        // $user->created_at=date('Y-m-d');
    
        $user->save();

        // company details
        $cid= users::latest()->first()->id;

        $company=new ss_setup_company_directory;

        $company->company_name=$req->company_name;
        $company->email=$req->company_email;
        $company->contact_person_first_name=$req->contact_person_first_name;
        $company->contact_person_last_name=$req->contact_person_last_name;
        $company->phone=$req->company_phone;
        $company->region_id=$req->company_region_id;
        $company->country_id=$req->company_country_id;
        $company->port_id=$req->company_port_id;
        $company->bussiness_address=$req->bussiness_address;
        $company->fax=$req->company_fax;
        $company->website=$req->company_website;
        $company->idn_to_ascii=$cid;
        $company->is_active=1;

        $company->save();



        // $user21['to']=$req->email;
        // $data=['code'=>$code];
    
        // Mail::send('front/mail_format',$data, function($messages) use ($user21){
        //     // $messages->from('info@shipsearch.com', 'ShipSearch Support');
        //     $messages->from('ahsanrao237@gmail.com', 'ShipSearch Support');
        //     $messages->to($user21['to']);
        //     $messages->subject("Email Verification | shipsearch.com");
        //     // $message->attach($pathToFile, array('as' => $display, 'mime' => $mime));
        // });
    
        // $req->session()->flash('reg_msg',$req->email);
    
        return redirect()->route('login');
    }

    function email_ver_req($code){

        $status="invalid code";
        $res= users::code($code)->exists();

        if($res){
            // echo 'exist';
            $user=users::code($code)->isActive('0')->first();
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
        $user= users::email($req->email)->isActive("1")->first();

        if($user==null){
            echo "not exist";
        }else{
            echo "exist";
        }
    }

    function logout_req(){


        if(session('member_type') =="Free"){
            cargo_search_history::where('user_id',session('front_uid'))->delete();
            vessel_search_history::where('user_id',session('front_uid'))->delete();
            vessel_sale_search_history::where('user_id',session('front_uid'))->delete();
        }

        session()->forget('member_type');
        session()->forget('front_uid');
        session()->forget('front_uname');
        session()->forget('company_name');
        session()->forget('company_phone');
        session()->forget('company_email');
        
        return redirect()->route('login');
    }
}