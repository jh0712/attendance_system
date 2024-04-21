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

mix.scripts([
    'public/assets/js/jquery.min.js',
    'public/assets/js/bootstrap.bundle.min.js',
    'public/assets/js/metisMenu.min.js',
    'public/assets/js/jquery.slimscroll.js',
    'public/assets/js/waves.min.js',
    // 'public/assets/plugins/parsleyjs/parsley.v2.9.2.min.js',
    'public/assets/plugins/jquery-sparkline/jquery.sparkline.min.js',
    'resources/js/general_function.js',
    // 'resources/assets/js/app.js'
    'public/assets/plugins/parsleyjs/parsley.min.js',
    'public/assets/plugins/datatables/jquery.dataTables.min.js',
    'public/assets/plugins/datatables/dataTables.bootstrap4.min.js',
    'public/assets/plugins/datatables/dataTables.responsive.min.js',
    'public/assets/plugins/datatables/responsive.bootstrap4.min.js',
    'public/assets/plugins/sweet-alert2/sweetalert2.min.js',
    'resources/js/general_function.js'
    ], 'public/js/include.js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('public/assets/scss/style.scss', 'public/assets/css');

