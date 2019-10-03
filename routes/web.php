<?php

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
/******************************************************************************/
//admin
/******************************************************************************/
//Đăng nhập/đăng xuất/quên mật khẩu admin
Route::group([
	'prefix' => 'admin'
], function() {
    //Đăng nhập/đăng xuất
	Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('login', 'Auth\LoginController@login');
	Route::get('logout', 'Auth\LoginController@logout')->name('logout');
	// Password Reset Routes...
	Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
	Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
	Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
	Route::post('password/reset', 'Auth\ResetPasswordController@reset');
});
/******************************************************************************/
Route::group([
	'prefix'=>'admin',
	'as'=>'admin.',
	'namespace'=>'Admin',
	'middleware' => 'auth'
],function () {
    # code...
	Route::view('/', 'admin.blank');
	/******************************************************************************/
	//laravel file manager...
	/******************************************************************************/
	Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
	Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
	/******************************************************************************/
	// Quản lý sản phẩm
	/******************************************************************************/
	Route::resource('products', 'ProductController');
	/******************************************************************************/
	// Quản lý chất liệu
	/******************************************************************************/
	Route::resource('materials','MaterialController');
	/******************************************************************************/
	// Quản lý màu sắc
	/******************************************************************************/
	Route::resource('colors','ColorController');
	// Quản lý xuất xứ
	/******************************************************************************/
	Route::resource('origins','CountryController');
	// Quản lý thương hiệu
	/******************************************************************************/
	Route::resource('brands','BrandController');
	// Quản lý nhà phân phối
	/******************************************************************************/
	Route::resource('suppliers','SupplierController');
});

//end admin
/******************************************************************************/
// homework
/******************************************************************************/
Route::resource('todos','homework\TodoController');
Route::resource('users','homework\UserController');
