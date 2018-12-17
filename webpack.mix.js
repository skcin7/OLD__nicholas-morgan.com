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

// Assets:
mix.copyDirectory('resources/fontello/font', 'public/fonts');

// JS:
mix.js([
    "resources/js/app.js"
], "public/js").sourceMaps();

// CSS
mix.sass("resources/sass/app.scss", "public/css");
mix.sass("resources/sass/nes.scss", "public/css");