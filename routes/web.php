<?php

use Illuminate\Support\Facades\Route;

// Admin Controllers
use App\Http\Controllers\Admin_auth;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\CargoController;

// Front Controllers
use App\Http\Controllers\Front_auth;
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


Route::get('/', [HomeController::class, 'view'] )->name('home');

Route::get('/cargo/view', [FrontCargoController::class, 'view'] )->name('cargo.view');


Route::get('/login', function () {
    if((session()->has('front_uid'))){
        return redirect()->route('home');
    }else{
        return view('front/login');
    }
})->name('login');
Route::post('login_req',[Front_auth::class,'login_req'])->name('login_req');

Route::post('reg_req',[Front_auth::class,'reg_req'])->name('reg_req');

Route::group(['middleware'=>['front_auth']],function(){

    // Cargo
    Route::get('/cargo/add', [FrontCargoController::class, 'view_add'] )->name('cargo.add');
    Route::post('/cargo/add_req', [FrontCargoController::class, 'add_req'] )->name('cargo.add_req');
});

Route::get('/logout',function(){
    session()->forget('front_uid');
    session()->forget('front_uname');
    return redirect()->route('login');
})->name('logout');




/*
|--------------------------------------------------------------------------
| Admin Section
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', function () {
    if((session()->has('user_id'))){
        return redirect()->route('admin.dashboard');
    }else{
        return view('admin/login');
    }
})->name('admin.login');

Route::post('admin/login_req',[Admin_auth::class,'login_req'])->name('admin.login_req');


Route::group(['middleware'=>['admin_auth']],function(){

    // Dashboar
    Route::get('/admin/dashboard', [DashboardController::class, 'listing'] )->name('admin.dashboard');

    // Cargo
    Route::get('/admin/cargo/view', [CargoController::class, 'view'] )->name('admin.cargo.view');

    Route::get('/admin/cargo/add', [CargoController::class, 'view_add'] )->name('admin.cargo.add');
    Route::post('/admin/cargo/add_req', [CargoController::class, 'add_req'] )->name('admin.cargo.add_req');
    
    Route::get('/admin/cargo/update/{id}',[CargoController::class, 'view_update'])->name('admin.cargo.update.id');
    Route::post('/admin/cargo/update_req',[CargoController::class, 'update_req'])->name('admin.cargo.update_req');

    Route::get('/admin/cargo/delete/{id}',[CargoController::class, 'delete'])->name('admin.cargo.delete.id');

    Route::get('/admin/cargo/update-status/{id}/{status}',[CargoController::class, 'update_status'])->name('admin.cargo.update_status.id.status');
});

Route::get('admin/logout',function(){
    session()->forget('user_id');
    session()->forget('user_name');
    return redirect()->route('admin.login');
})->name('admin.logout');
