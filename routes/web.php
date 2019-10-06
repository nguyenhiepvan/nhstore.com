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
Auth::routes(['register' => false]);
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
	// Quản lý nhà danh mục
	/******************************************************************************/
	Route::resource('categories','CategoryController');
	// Quản lý nhà thẻ
	/******************************************************************************/
	Route::resource('tags','TagController');
});

//end admin
/******************************************************************************/
// homework
/******************************************************************************/
Route::resource('todos','homework\TodoController');
Route::resource('users','homework\UserController');
