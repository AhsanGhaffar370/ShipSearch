<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin_auth;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\CargoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

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
    Route::get('/admin/cargo/view', [CargoController::class, 'view_list'] );

    Route::get('/admin/cargo/add', [CargoController::class, 'view_add'] );
    Route::post('/admin/cargo/add_cargo', [CargoController::class, 'add'] );
    
    Route::get('/admin/cargo/update-rec/{id}',[CargoController::class, 'edit']);
    Route::post('/admin/cargo/update12',[CargoController::class, 'update']);

    Route::get('/admin/cargo/delete-rec/{id}',[CargoController::class, 'delete']);

    Route::get('/admin/cargo/update-status/{id}/{status}',[CargoController::class, 'update_status']);
});

Route::get('admin/logout',function(){
    session()->forget('user_id');
    return redirect('/admin/login');
});