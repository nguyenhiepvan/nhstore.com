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
 .styles('resources/assets/css/backend/app.css','public/css/app.css')
 .styles('resources/assets/css/backend/animate.css','public/css/animate.css')
 .styles('resources/assets/css/backend/card.css','public/css/card.css')
 .styles('resources/assets/css/backend/login.css','public/css/login.css')
 .styles('resources/assets/css/backend/productList.css','public/css/productList.css')
 .styles('resources/assets/css/fontend/products.css','public/css/products.css');
 /******************************************************************************/
 mix
 .js('resources/assets/js/formatCurrency.js', 'public/js')
 .js('resources/assets/js/app.js', 'public/js')
 .js('resources/assets/js/backend/productsList.js','public/js')
 .js('resources/assets/js/backend/receipt.js','public/js')
 .js('resources/assets/js/backend/categoriesList.js','public/js')
 .js('resources/assets/js/backend/common.js','public/js')
 .js('resources/assets/js/backend/particle.js','public/js')
 .js('resources/assets/js/fontend/products.js','public/js');