<?php

use Illuminate\Support\Facades\Route;

// Admin Controllers
use App\Http\Controllers\Admin_auth;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\CargoController;

// Front Controllers
use App\Http\Controllers\front\FrontCargoController;
use App\Http\Controllers\front\HomeController;

/*
|--------------------------------------------------------------------------
| Front Section
|--------------------------------------------------------------------------
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [HomeController::class, 'view'] );

Route::get('/cargo/view', [FrontCargoController::class, 'view'] );

Route::get('/cargo/add', [FrontCargoController::class, 'view_add'] );
Route::post('/cargo/add_req', [FrontCargoController::class, 'add_req'] );

Route::get('/login', function () {
    if((session()->has('front_uid'))){
        return redirect('/');
    }else{
        return view('front/login');
    }
});
/*
|--------------------------------------------------------------------------
| Admin Section
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', function () {
    if((session()->has('user_id'))){
        return redirect('/admin/dashboard');
    }else{
        return view('admin/login');
    }
});
Route::post('admin/login_req',[Admin_auth::class,'login_req']);


Route::group(['middleware'=>['admin_auth']],function(){

    // Dashboar
    Route::get('/admin/dashboard', [DashboardController::class, 'listing'] );

    // Cargo
    Route::get('/admin/cargo/view', [CargoController::class, 'view'] );

    Route::get('/admin/cargo/add', [CargoController::class, 'view_add'] );
    Route::post('/admin/cargo/add_req', [CargoController::class, 'add_req'] );
    
    Route::get('/admin/cargo/update/{id}',[CargoController::class, 'view_update']);
    Route::post('/admin/cargo/update_req',[CargoController::class, 'update_req']);

    Route::get('/admin/cargo/delete/{id}',[CargoController::class, 'delete']);

    Route::get('/admin/cargo/update-status/{id}/{status}',[CargoController::class, 'update_status']);
});

Route::get('admin/logout',function(){
    session()->forget('user_id');
    return redirect('/admin/login');
});
