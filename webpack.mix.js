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
    // build default
    .js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')

    // build add new
    // --> build .sass -> .css
    .sass('resources/assets/sass/style.scss', 'public/assets/css/style.css')
  //  .sass('resources/assets/sass/s2.scss', 'public/assets/css/s2.css')

    // --> build .js -> .js
    .scripts(['resources/assets/js/jquery-3.4.1.min.js'], 'public/assets/js/jquery-3.4.1.min.js')

    // --> copy folder resources/assets/img -> public/assets/img
    .copyDirectory('resources/assets/image', 'public/assets/image')

    // --> copy folder resources/assets/fonts -> public/assets/fonts
    .copyDirectory('resources/assets/fonts', 'public/assets/fonts')

;

