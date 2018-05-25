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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.styles([
    'resources/assets/plantilla/css/coreui-icons.min.css',
    'resources/assets/plantilla/css/flag-icon.min.css',
    'resources/assets/plantilla/css/font-awesome.min.css',
    'resources/assets/plantilla/css/simple-line-icons.css',
    'resources/assets/plantilla/css/bootstrap.min.css',
    'resources/assets/plantilla/css/style.css',
    'resources/assets/plantilla/css/pace.min.css'
],'public/css/all.css');

mix.scripts([
    'resources/assets/plantilla/js/jquery.min.js',
    'resources/assets/plantilla/js/popper.min.js',
    'resources/assets/plantilla/js/bootstrap.min.js',
    'resources/assets/plantilla/js/pace.min.js',
    'resources/assets/plantilla/js/perfect-scrollbar.min.js',
    'resources/assets/plantilla/js/coreui.min.js',
    'resources/assets/plantilla/js/custom-tooltips.min.js',
], 'public/js/all.js');
// 'resources/assets/plantilla/js/Chart.min.js',