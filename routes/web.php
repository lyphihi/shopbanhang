<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SanphamController;
use App\Http\Controllers\NhasanxuatController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
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
Route::post('/tim-kiem','App\Http\Controllers\HomeController@tim_kiem');

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

//Cart
Route::post('/save-cart', 'App\Http\Controllers\CartController@save_cart');
Route::get('/show-cart', 'App\Http\Controllers\CartController@show_cart');
Route::get('/delete-cart/{rowId}', 'App\Http\Controllers\CartController@delete_cart');
Route::post('/update-cart', 'App\Http\Controllers\CartController@update_cart');

//Checkout
Route::get('/login-checkout', 'App\Http\Controllers\CheckoutController@login_checkout');
Route::get('/logout-checkout', 'App\Http\Controllers\CheckoutController@logout_checkout');
Route::post('/add-customer', 'App\Http\Controllers\CheckoutController@add_customer');
Route::post('/login-customer', 'App\Http\Controllers\CheckoutController@login_customer');
Route::get('/checkout', 'App\Http\Controllers\CheckoutController@checkout');
Route::get('/thanhtoan', 'App\Http\Controllers\CheckoutController@thanhtoan');
Route::post('/save-checkout-customer', 'App\Http\Controllers\CheckoutController@save_checkout_customer');
Route::post('/order-place', 'App\Http\Controllers\CheckoutController@order_place');

//Đơn hàng
Route::get('/quanly-donhang', 'App\Http\Controllers\CheckoutController@qly_donhang');
Route::get('/edit-dh/{order_id}', 'App\Http\Controllers\CheckoutController@edit_dh');


