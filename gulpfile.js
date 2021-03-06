var elixir = require('laravel-elixir');
elixir.config.sourcemaps = false;
    elixir.config.publicDir = 'httpdocs';
    elixir.config.publicPath = 'httpdocs';
    elixir.config.cssOutput = 'httpdocs/css';
    elixir.config.jsOutput = 'httpdocs/js';
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
    mix.sass('app.scss');
});
