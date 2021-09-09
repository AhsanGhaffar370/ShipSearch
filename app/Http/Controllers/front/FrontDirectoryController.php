<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ss_setup_company_directory;

class FrontDirectoryController extends Controller
{
    //
    function view(){

        $data = ss_setup_company_directory::with(['DirRegion','DirCountry','DirPort'])->active()->desc()->get();

        // dd($data);

        return view('front/directory/view',['data'=>$data,
                                            'fuser_id'=>"0"]);
    }


    function view_company(Request $req){

        $data = ss_setup_company_directory::with(['DirRegion','DirCountry','DirPort'])->active()->desc()->get();
        // dd($req);
        
        return view('front/directory/view',['data'=>$data,
                                            'fuser_id'=>$req->id]);
    }
}
