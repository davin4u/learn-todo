let mix = require('laravel-mix');

const tailwindcss = require('tailwindcss');

mix
    .js([
        'resources/js/app.js'
    ], 'build/app.js')
    .sass('resources/sass/index.scss', 'build/app.css')
    .options({
        processCssUrls: false,
        postCss: [ tailwindcss('./tailwind.config.js') ],
    });
