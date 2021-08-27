const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js');

mix.postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);

mix.browserSync({
    proxy: {
        target: "nginx",
    },
    host: "amd-automation.test",
    ui: false,
    open: false,
    notify: false,
    reloadDelay: 1000,
    watchOptions: {
        ignored: '**/vendor',
        ignored: '**/node_modules',
    },
});
