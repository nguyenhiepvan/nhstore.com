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
Route::group([
	'prefix'=>'admin',
	'as'=>'admin.'
],function () {
    # code...
	Route::view('/', 'admin.blank');
	Route::group(['middleware' => 'auth'], function() {
	    //
		/******************************************************************************/
		// danh sách sản phẩm
		/******************************************************************************/
		Route::get('products', function() {
	    //
			return view('productsList');
		});
	});
	/******************************************************************************/
	//Đăng nhập đăng ký admin
	Auth::routes();
	/******************************************************************************/
});
/******************************************************************************/
// homework
/******************************************************************************/
Route::get('/todo', function() {
    //
	return view('todo');
});
