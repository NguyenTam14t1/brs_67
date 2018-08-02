let mix = require('laravel-mix');

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
mix.js('resources/assets/js/app.js', 'public/js');
mix.js('resources/assets/auth/js/main.js', 'public/auth/js/main.js');
mix.sass('resources/assets/sass/app.scss', 'public/css');
mix.copyDirectory('resources/assets/books', 'public/books');
