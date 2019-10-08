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

 mix
 .styles('resources/assets/css/admin/app.css','public/css/app.css')
 .styles('resources/assets/css/admin/animate.css','public/css/animate.css')
 .styles('resources/assets/css/admin/card.css','public/css/card.css')
 .styles('resources/assets/css/admin/login.css','public/css/login.css')
 .styles('resources/assets/css/admin/productList.css','public/css/productList.css');
 /******************************************************************************/
 mix.js('resources/assets/js/admin/productsList.js','public/js')
 mix.js('resources/assets/js/admin/categoriesList.js','public/js')
 mix.js('resources/assets/js/admin/common.js','public/js')
 .js('resources/assets/js/admin/particle.js','public/js')
 .js('resources/assets/js/app.js', 'public/js');