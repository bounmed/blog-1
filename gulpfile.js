var elixir = require('laravel-elixir');

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

elixir(function(mix) {
    mix.sass(['app.scss'], 'resources/assets/css/sass.css')
        .scripts(['jquery.js', 'bootstrap.js', 'app.js'], 'public/js/app.js')
        .styles(['bootstrap.css', 'blog-home.css'], 'public/css/app.css')
        .version(['css/app.css', 'js/app.js']);
});