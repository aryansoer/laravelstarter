const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

const vDir = {
    'vendor': "./resources/assets/vendor"
}

elixir(function(mix){

    mix.styles([
        vDir.vendor + '/bootstrap/css/bootstrap.css',
        vDir.vendor + '/font-awesome/css/font-awesome.css',
        vDir.vendor + '/AdminLTE/dist/css/AdminLTE.css',
        vDir.vendor + '/AdminLTE/dist/css/skins/skin-green-light.css'
    ], 'public/css/all.css');

    mix.webpack('app.js');

    mix.scripts([
        vDir.vendor + '/jquery/jquery.js',
        vDir.vendor + '/AdminLTE/plugins/jQueryUI/jquery-ui.js',
        vDir.vendor + '/AdminLTE/plugins/fastclick/fastclick.js',
        vDir.vendor + '/AdminLTE/plugins/slimScroll/jquery.slimscroll.js',
        vDir.vendor + '/AdminLTE/dist/js/app.js'
    ], 'public/js/all.js');

    mix.copy(vDir.vendor + '/font-awesome/fonts', 'public/fonts')
        .copy(vDir.vendor + '/bootstrap/fonts', 'public/fonts')
        .copy(vDir.vendor + '/AdminLTE/dist/img', 'public/img');
});
