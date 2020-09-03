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
    .js('resources/js/libs/cropper.js', 'public/js')
    .js('resources/js/libs/video.js', 'public/js')
    .scripts('resources/js/use/application-base.js', 'public/js/use.js')
    .scripts('resources/js/use/date-picker.js', 'public/js/date-picker.js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/video.scss', 'public/css')
    .sass('resources/sass/cropper.scss', 'public/css');
