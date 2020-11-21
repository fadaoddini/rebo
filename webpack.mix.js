const mix = require('laravel-mix');

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


mix.styles([

    'resources/js/admin/plugins/custom/fullcalendar/fullcalendar.bundle.rtl.css',
    'resources/js/admin/plugins/global/plugins.bundle.rtl.css',
    'resources/js/admin/plugins/custom/prismjs/prismjs.bundle.rtl.css',
    // 'resources/css/back/css/style.bundle.rtl.css',

],'public/admin/css/app.css');

mix.scripts([
    'resources/js/admin/plugins/global/plugins.bundle.js',
    'resources/js/admin/plugins/custom/prismjs/prismjs.bundle.js',
    'resources/js/admin/js/scripts.bundle.js',
    'resources/js/admin/plugins/custom/fullcalendar/fullcalendar.bundle.js',
    'resources/js/admin/js/pages/widgets.js'
],'public/admin/js/app.js');
