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

elixir(mix => {

    mix.styles([
    	'buttons.bootstrap.min.css',
    	'dataTables.bootstrap.min.css',
    	'dataTables.tableTools.css',
    	'font-awesome.css',
    	'responsive.bootstrap.min.css',
        'style.css',
        'app.css',
        'simple-sidebar.css'
    ],'public/css/all.css');
    mix.copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/', 'public/fonts/bootstrap');


});
