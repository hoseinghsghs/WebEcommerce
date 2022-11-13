const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

//admin
// mix.sass("resources/sass/app.sass", "public/css", {
//     implementation: require("node-sass"),
// });

mix.js("resources/js/admin.js", "public/js").postCss(
    "resources/css/admin.css",
    "public/css"
);
mix.js("resources/js/home.js", "public/js").postCss(
    "resources/css/home.css",
    "public/css"
);
