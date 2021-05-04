<?php

use Illuminate\Support\Facades\Route;

// Admin Controllers
use App\Http\Controllers\Admin_auth;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\CargoController;
use App\Http\Controllers\admin\RegionController;
use App\Http\Controllers\admin\PortController;
use App\Http\Controllers\admin\CountryController;
use App\Http\Controllers\admin\CargoTypeController;

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

Route::get('email_verification/{code}', [Front_auth::class, 'email_ver_req'] )->name('email_verification.code');

Route::get('checkmail',[Front_auth::class, 'checkmail_ajax'])->name('checkmail');

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

    // Region
    Route::get('/admin/region/view', [RegionController::class, 'view'] )->name('admin.region.view');
    Route::get('/admin/region/add', [RegionController::class, 'view_add'] )->name('admin.region.add');
    Route::post('/admin/region/add_req', [RegionController::class, 'add_req'] )->name('admin.region.add_req');
    Route::get('/admin/region/update/{id}',[RegionController::class, 'view_update'])->name('admin.region.update.id');
    Route::post('/admin/region/update_req',[RegionController::class, 'update_req'])->name('admin.region.update_req');
    Route::get('/admin/region/update-status/{id}/{status}',[RegionController::class, 'update_status'])->name('admin.region.update_status.id.status');

    // Port
    Route::get('/admin/port/view', [PortController::class, 'view'] )->name('admin.port.view');
    Route::get('/admin/port/add', [PortController::class, 'view_add'] )->name('admin.port.add');
    Route::post('/admin/port/add_req', [PortController::class, 'add_req'] )->name('admin.port.add_req');
    Route::get('/admin/port/update/{id}',[PortController::class, 'view_update'])->name('admin.port.update.id');
    Route::post('/admin/port/update_req',[PortController::class, 'update_req'])->name('admin.port.update_req');
    Route::get('/admin/port/update-status/{id}/{status}',[PortController::class, 'update_status'])->name('admin.port.update_status.id.status');
    
    // Country
    Route::get('/admin/country/view', [CountryController::class, 'view'] )->name('admin.country.view');
    Route::get('/admin/country/add', [CountryController::class, 'view_add'] )->name('admin.country.add');
    Route::post('/admin/country/add_req', [CountryController::class, 'add_req'] )->name('admin.country.add_req');
    Route::get('/admin/country/update/{id}',[CountryController::class, 'view_update'])->name('admin.country.update.id');
    Route::post('/admin/country/update_req',[CountryController::class, 'update_req'])->name('admin.country.update_req');
    Route::get('/admin/country/update-status/{id}/{status}',[CountryController::class, 'update_status'])->name('admin.country.update_status.id.status');

});

Route::get('admin/logout',function(){
    session()->forget('user_id');
    session()->forget('user_name');
    return redirect()->route('admin.login');
})->name('admin.logout');
