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
// landing page
/******************************************************************************/
Route::group([
	'namespace'=>'Fontend',
	'middleware'=>'categories',
],function ()
{
	Route::get('/', function() {
		return view('fontend.homepage');
	})->name('homepage');
	Route::get('/products','ProductController@index')->name('products');
	Route::get('/products-full-width','ProductController@index_fullwidth')->name('products-full-width');
	Route::get('/products/category={slug}', 'ProductController@getProductsByCategory')->name('get-products-by-category');
	Route::get('/product/{slug}', 'ProductController@show')->name('product');
	Route::get('/cart', function() {
		return view('fontend.cart');
	})->name('cart');
	Route::get('/checkout', function() {
		return view('fontend.checkout');
	})->name('checkout');
	Route::get('/contact', function() {
		return view('fontend.contact');
	})->name('contact');
	Route::get('/blogs', function() {
		return view('fontend.blogs');
	})->name('blogs');
	Route::get('/blog', function() {
		return view('fontend.blog');
	})->name('blog');
});
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
	Route::view('/', 'backend.admin.blank');
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
	/******************************************************************************/
	// Quản lý kích thước
	/******************************************************************************/
	Route::resource('sizes','SizeController');
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
	Route::get('categories-hidden', 'CategoryController@index_hidden');
	Route::get('categories-deleted', 'CategoryController@index_deleted');
	// Quản lý nhà thẻ
	/******************************************************************************/
	Route::resource('tags','TagController');
});

//end admin
/******************************************************************************/
// homework
/******************************************************************************/
// Route::resource('todos','homework\TodoController');
// Route::resource('users','homework\UserController');
// Route::get('/home', 'HomeController@index')->name('home');
