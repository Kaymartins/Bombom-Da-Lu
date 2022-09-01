const mix = require('laravel-mix');

mix
    .sass('resources/css/app.scss', 'public/css')
    .postCss("resources/css/app.css", "public/css", [
        require("tailwindcss"),
    ]);
