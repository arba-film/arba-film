let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Theme plugins JS and CSS
 |--------------------------------------------------------------------------
 |
 */

mix.copy([
    'resources/assets/plugins/pace/pace-theme-flash.css',
    'resources/assets/plugins/bootstrap/css/bootstrap.min.css',
    'resources/assets/plugins/jquery-scrollbar/jquery.scrollbar.css',
    'resources/assets/plugins/select2-4.0.5/css/select2.min.css',
    'resources/assets/plugins/switchery/css/switchery.min.css',
    'resources/assets/plugins/bootstrap-datepicker/css/datepicker3.css',
    'resources/assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css'

], 'public/plugins/css/')
    .copy([
        'resources/assets/plugins/pace/pace.min.js',
        'resources/assets/plugins/jquery/jquery-1.11.1.min.js',
        'resources/assets/plugins/bootstrap/js/bootstrap.min.js',
        'resources/assets/plugins/modernizr.custom.js',
        'resources/assets/plugins/jquery-ui/jquery-ui.min.js',
        'resources/assets/plugins/tether/js/tether.min.js',
        'resources/assets/plugins/jquery/jquery-easy.js',
        'resources/assets/plugins/jquery-unveil/jquery.unveil.min.js',
        'resources/assets/plugins/jquery-bez/jquery.bez.min.js',
        'resources/assets/plugins/jquery-ios-list/jquery.ioslist.min.js',
        'resources/assets/plugins/imagesloaded/imagesloaded.pkgd.min.js',
        'resources/assets/plugins/jquery-actual/jquery.actual.min.js',
        'resources/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js',
        'resources/assets/plugins/select2-4.0.5/js/select2.full.min.js',
        'resources/assets/plugins/classie/classie.js',
        'resources/assets/plugins/switchery/js/switchery.min.js',
        'resources/assets/plugins/jquery-autonumeric/autoNumeric.js',
        'resources/assets/plugins/dropzone/dropzone.min.js',
        'resources/assets/plugins/jquery-inputmask/jquery.inputmask.min.js',
        'resources/assets/plugins/bootstrap-form-wizard/js/jquery.bootstrap.wizard.min.js',
        'resources/assets/plugins/jquery-validation/js/jquery.validate.min.js',
        'resources/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js',
        'resources/assets/plugins/summernote/js/summernote.min.js',
        'resources/assets/plugins/moment/moment.min.js',
        'resources/assets/plugins/bootstrap-daterangepicker/daterangepicker.js',
        'resources/assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js',
        'resources/assets/plugins/jquery.sieve.min.js',
        'resources/assets/plugins/google-palette/palette.js',
        'resources/assets/plugins/accounting.min.js',
        'resources/assets/plugins/sorttable.js',
    ], 'public/plugins/js/');


mix.copyDirectory('resources/assets/plugins/font-awesome', 'public/plugins/font-awesome');
mix.copyDirectory('resources/assets/plugins/feather-icons', 'public/plugins/feather-icons');
mix.copyDirectory('resources/assets/plugins/dropzone', 'public/plugins/dropzone');
mix.copyDirectory('resources/assets/plugins/jquery-datatable', 'public/plugins/jquery-datatable')
    .copyDirectory('resources/assets/plugins/datatables-responsive', 'public/plugins/datatables-responsive');


/*
 |--------------------------------------------------------------------------
 | Core UI Layout JS and CSS
 |--------------------------------------------------------------------------
 |
 */

mix.js('resources/assets/core/js/pages.js', 'public/core/js/core-theme.js');
mix.styles('resources/assets/core/css/light.css', 'public/core/css/core-theme.css');

mix.copy('resources/assets/core/css/pages-icons.css', 'public/core/css/theme-icons.css');
mix.copyDirectory('resources/assets/core/img', 'public/core/img');
mix.copyDirectory('resources/assets/core/fonts', 'public/core/fonts');


/*
 |--------------------------------------------------------------------------
 | Mix Asset Management React APP
 |--------------------------------------------------------------------------
 |
 */

mix.react('resources/assets/js/app.js', 'public/js/v1')
   .sass('resources/assets/sass/app.scss', 'public/core/dev');
