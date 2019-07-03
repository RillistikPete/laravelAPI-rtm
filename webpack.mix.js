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
    .sass('resources/sass/app.scss', 'public/css');

    mix.styles([

        'resources/assets/css/bootstrap.css',
        'resources/assets/css/bootstrap.min.css',

   ], 'public/css/libs.css');
   
   mix.scripts([

        'resources/assets/js/jquery.js',
        'resources/assets/js/bootstrap.js',
        'resources/assets/js/bootstrap.min.js',
        'resources/assets/js/scripts.js',

   ], 'public/js/libs.js');