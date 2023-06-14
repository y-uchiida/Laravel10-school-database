// webpack.mix.js

let mix = require("laravel-mix");
mix.js("src/app.js", "dist").postCss("src/app.css", "dist", [
    require("tailwindcss"),
]);
