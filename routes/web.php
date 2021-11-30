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
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\FrontCargoController;
use App\Http\Controllers\front\FrontVesselController;
use App\Http\Controllers\front\FrontVesselSaleController;
use App\Http\Controllers\front\FrontDirectoryController;

use Illuminate\Support\Facades\Artisan;
/*
|--------------------------------------------------------------------------
| Front Section
|--------------------------------------------------------------------------


Show Id in cargo id in front cargo
data entry in cargo and vessel section 



*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('create-symlink', function() {
    Artisan::call('storage:link');
});


Route::get('/', [HomeController::class, 'view'] )->name('home');



Route::get('clear_cache', function () {
    Artisan::call('optimize:clear');
});

Route::get('/login', function () {
    if((session()->has('front_uid'))){
        return redirect()->route('home');
    }else{
        return view('front/login');
    }
})->name('login');
Route::post('login_req',[Front_auth::class,'login_req'])->name('login_req');

Route::get('/logout',[Front_auth::class,'logout_req'])->name('logout');


// Route::get('/signup', function () {
    // if((session()->has('front_uid'))){
    //     return redirect()->route('home');
    // }else{
    //     return view('front/signup');
    // }
// })->name('signup');
Route::get('/signup',[Front_auth::class, 'view_signup'])->name('signup');
Route::post('signup_req',[Front_auth::class,'signup_req'])->name('signup_req');

Route::get('email_verification/{code}', [Front_auth::class, 'email_ver_req'] )->name('email_verification.code');

Route::get('checkmail',[Front_auth::class, 'checkmail_ajax'])->name('checkmail');



// Route::get('/logout',function(){
   
// })->name('logout');



/*
|--------------------------------------------------------------------------
| Front Section
|--------------------------------------------------------------------------
*/


Route::get('/cargo/get_country_port', [FrontCargoController::class, 'get_country_port'] )->name('cargo.get_country_port');
Route::get('/cargo/reset_region_country_port', [FrontCargoController::class, 'reset_region_country_port'] )->name('cargo.reset_region_country_port');

// Directory Charter
Route::get('/directory/view', [FrontDirectoryController::class, 'view'] )->name('directory.view');
// Route::post('/vessel_sale/view', [FrontVesselSaleController::class, 'search_req'] )->name('vessel_sale.search_req');
// Route::get('/vessel_sale/ser_hist_rec', [FrontVesselSaleController::class, 'search_req_ajax'] )->name('vessel_sale.ser_hist_rec');
// Route::get('/vessel_sale/del_ser_hist_rec', [FrontVesselSaleController::class, 'del_ser_his_req_ajax'] )->name('vessel_sale.del_ser_hist_rec');
// Route::get('/vessel_sale/get_update_hist_data', [FrontVesselSaleController::class, 'get_update_hist_data'] )->name('vessel_sale.get_update_hist_data');
// Route::get('/vessel_sale/update_hist_data', [FrontVesselSaleController::class, 'update_hist_data'] )->name('vessel_sale.update_hist_data');

//Cargo
Route::get('/cargo/view', [FrontCargoController::class, 'view'] )->name('cargo.view');
Route::post('/cargo/view', [FrontCargoController::class, 'search_req'] )->name('cargo.search_req');

//Vessel
Route::get('/vessel/view', [FrontVesselController::class, 'view'] )->name('vessel.view');
Route::post('/vessel/view', [FrontVesselController::class, 'search_req'] )->name('vessel.search_req');

//Vessel_sale
Route::get('/vessel_sale/view', [FrontVesselSaleController::class, 'view'] )->name('vessel_sale.view');
Route::post('/vessel_sale/view', [FrontVesselSaleController::class, 'search_req'] )->name('vessel_sale.search_req');

Route::group(['middleware'=>['front_auth']],function(){

    // Cargo
    Route::get('/cargo/ser_hist_rec', [FrontCargoController::class, 'search_req_ajax'] )->name('cargo.ser_hist_rec');
    Route::get('/cargo/del_ser_hist_rec', [FrontCargoController::class, 'del_ser_his_req_ajax'] )->name('cargo.del_ser_hist_rec');
    Route::get('/cargo/del_selected_ser_hist_rec', [FrontCargoController::class, 'del_selected_ser_his_req_ajax'] )->name('cargo.del_selected_ser_hist_rec');
    Route::get('/cargo/get_update_hist_data', [FrontCargoController::class, 'get_update_hist_data'] )->name('cargo.get_update_hist_data');
    Route::get('/cargo/update_hist_data', [FrontCargoController::class, 'update_hist_data'] )->name('cargo.update_hist_data');
    // Route::get('/cargo/update_search_hist', [FrontCargoController::class, 'update_search_hist'] )->name('cargo.update_search_hist');


    // Vessel Charter
    Route::get('/vessel/ser_hist_rec', [FrontVesselController::class, 'search_req_ajax'] )->name('vessel.ser_hist_rec');
    Route::get('/vessel/del_ser_hist_rec', [FrontVesselController::class, 'del_ser_his_req_ajax'] )->name('vessel.del_ser_hist_rec');
    Route::get('/vessel/del_selected_ser_hist_rec', [FrontVesselController::class, 'del_selected_ser_his_req_ajax'] )->name('vessel.del_selected_ser_hist_rec');
    Route::get('/vessel/get_update_hist_data', [FrontVesselController::class, 'get_update_hist_data'] )->name('vessel.get_update_hist_data');
    Route::get('/vessel/update_hist_data', [FrontVesselController::class, 'update_hist_data'] )->name('vessel.update_hist_data');


    // Vessel_sale Charter
    Route::get('/vessel_sale/ser_hist_rec', [FrontVesselSaleController::class, 'search_req_ajax'] )->name('vessel_sale.ser_hist_rec');
    Route::get('/vessel_sale/del_ser_hist_rec', [FrontVesselSaleController::class, 'del_ser_his_req_ajax'] )->name('vessel_sale.del_ser_hist_rec');
    Route::get('/vessel_sale/del_selected_ser_hist_rec', [FrontVesselSaleController::class, 'del_selected_ser_his_req_ajax'] )->name('vessel_sale.del_selected_ser_hist_rec');
    Route::get('/vessel_sale/get_update_hist_data', [FrontVesselSaleController::class, 'get_update_hist_data'] )->name('vessel_sale.get_update_hist_data');
    Route::get('/vessel_sale/update_hist_data', [FrontVesselSaleController::class, 'update_hist_data'] )->name('vessel_sale.update_hist_data');


    Route::group(['middleware'=>['member_type_auth']],function(){
        // Cargo
        Route::get('/cargo/add', [FrontCargoController::class, 'view_add'] )->name('cargo.add');
        Route::post('/cargo/add_req', [FrontCargoController::class, 'add_req'] )->name('cargo.add_req');

        // Vessel
        // Route::get('/vessel/view/{id}',[FrontVesselController::class, 'view_detail'])->name('vessel.detail.id');
        Route::get('/vessel/add', [FrontVesselController::class, 'view_add'] )->name('vessel.add');
        Route::post('/vessel/add_req', [FrontVesselController::class, 'add_req'] )->name('vessel.add_req');

        // Vessel Sale
        Route::get('/vessel_sale/add', [FrontVesselSaleController::class, 'view_add'] )->name('vessel_sale.add');
        Route::post('/vessel_sale/add_req', [FrontVesselSaleController::class, 'add_req'] )->name('vessel_sale.add_req');

        // Directory
        Route::get('/directory/view/#{id}',[FrontDirectoryController::class, 'view_company'])->name('directory.view.user');
    });

});




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

    // cargo_type
    Route::get('/admin/cargo_type/view', [CargoTypeController::class, 'view'] )->name('admin.cargo_type.view');
    Route::get('/admin/cargo_type/add', [CargoTypeController::class, 'view_add'] )->name('admin.cargo_type.add');
    Route::post('/admin/cargo_type/add_req', [CargoTypeController::class, 'add_req'] )->name('admin.cargo_type.add_req');
    Route::get('/admin/cargo_type/update/{id}',[CargoTypeController::class, 'view_update'])->name('admin.cargo_type.update.id');
    Route::post('/admin/cargo_type/update_req',[CargoTypeController::class, 'update_req'])->name('admin.cargo_type.update_req');
    Route::get('/admin/cargo_type/update-status/{id}/{status}',[CargoTypeController::class, 'update_status'])->name('admin.cargo_type.update_status.id.status');
});

Route::get('admin/logout',function(){
    session()->forget('user_id');
    session()->forget('user_name');
    return redirect()->route('admin.login');
})->name('admin.logout');
