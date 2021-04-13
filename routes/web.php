<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SanphamController;
use App\Http\Controllers\NhasanxuatController;
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
//frontend
Route::get('/', 'App\Http\Controllers\HomeController@index');

Route::get('/trang-chu','App\Http\Controllers\HomeController@index');

Route::get('/thu', function () {
    return view('welcome');
});

//Danh sách nsx trang chủ
Route::get('/nha-san-xuat/{nsx_id}','App\Http\Controllers\NhasanxuatController@show_nsx_home');
Route::get('/chi-tiet-san-pham/{sp_id}','App\Http\Controllers\SanphamController@chi_tiet_sp');

//backend
Route::get('/Admin', function () {
    return view('admin_login');
});
Route::get('/dashbroad', 'App\Http\Controllers\AdminController@show_dashbroad');
Route::post('/admin-dashbroad', 'App\Http\Controllers\AdminController@dashbroad');
Route::get('/logout', 'App\Http\Controllers\AdminController@logout');

//Danh mục sản phẩm
Route::get('/add-sp', 'App\Http\Controllers\SanphamController@add_sp');
Route::get('/edit-sp/{sp_id}', 'App\Http\Controllers\SanphamController@edit_sp');
Route::get('/delete-sp/{sp_id}', 'App\Http\Controllers\SanphamController@delete_sp');
Route::get('/all-sp', 'App\Http\Controllers\SanphamController@all_sp');
Route::post('/save-sp', 'App\Http\Controllers\SanphamController@save_sp');
Route::post('/update-sp/{sp_id}', 'App\Http\Controllers\SanphamController@update_sp');

//Nhà sản xuất
Route::get('/add-nsx', 'App\Http\Controllers\NhasanxuatController@add_nsx');
Route::get('/edit-nsx/{nsx_id}', 'App\Http\Controllers\NhasanxuatController@edit_nsx');
Route::get('/delete-nsx/{nsx_id}', 'App\Http\Controllers\NhasanxuatController@delete_nsx');
Route::get('/all-nsx', 'App\Http\Controllers\NhasanxuatController@all_nsx');
Route::post('/save-nsx', 'App\Http\Controllers\NhasanxuatController@save_nsx');
Route::post('/update-nsx/{nsx_id}', 'App\Http\Controllers\NhasanxuatController@update_nsx');