var elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
    mix.sass('app.scss')
       .styles(['bootstrap.css',
               'bootstrap.min.css',
               'bootstrap-theme.min.css',
               'sb-admin-2.css',
               'timeline.css'
             ],'./public/css/libs.css')

        .scripts(['app.js',
                  'bootstrap.js',
                  'sb-admin-2.js',
                  'bootstrap.min.css',
                  'npm.js'
               ],'./public/js/libs.js')
});
