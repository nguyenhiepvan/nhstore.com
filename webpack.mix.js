const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

 mix.js('resources/js/app.js', 'public/js')
 .styles('resources/css/admin/app.css','public/css/app.css')
 .styles('resources/css/admin/animate.css','public/css/animate.css')
 .styles('resources/css/admin/card.css','public/css/card.css')
 .styles('resources/css/admin/login.css','public/css/login.css')
 .js('resources/js/admin/particle.js','public/js');
 /******************************************************************************/
// Quản lý sản phẩm
/******************************************************************************/
mix.js('resources/js/admin/productList.js','public/js')
.styles('resources/css/admin/productList.css','public/css/productList.css');