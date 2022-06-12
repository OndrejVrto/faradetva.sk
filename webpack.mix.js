const mix = require('laravel-mix');

// configs
mix.disableNotifications();
mix.disableSuccessNotifications();
mix.version();
// mix.sourceMaps();


// admin
mix.babel('resources/asset/admin/js/custom.js',            'public/asset/admin-app.js');
mix.babel('resources/asset/admin/js/custom-crop.js',       'public/asset/admin-app-crop.js');
mix.babel('resources/asset/admin/js/custom-datepicker.js', 'public/asset/admin-app-datepicker.js');
mix.babel('resources/asset/admin/js/custom-dropzone.js',   'public/asset/admin-app-dropzone.js');
mix.babel('resources/asset/admin/js/custom-tinymce.js',    'public/asset/admin-app-tinymce.js');

mix.styles('resources/asset/admin/css/custom.css', 'public/asset/admin-app.css');

// web
mix.babel(['resources/asset/web/js/custom.js',
        'resources/asset/web/js/custom-share.js'],       'public/asset/app.js');
mix.babel('resources/asset/web/js/custom-gallery.js',    'public/asset/app-gallery.js');
mix.babel('resources/asset/web/js/custom-google-map.js', 'public/asset/app-google-map.js');
mix.babel('resources/asset/web/js/custom-chart.js',      'public/asset/app-chart.js');
mix.babel('resources/asset/web/js/custom-pdf.js',        'public/asset/app-pdf.js');

mix.sass('resources/asset/web/css/custom-bootstrap.scss', 'public/asset/app-bootstrap.css');

mix.combine([
        'resources/asset/web/css/custom-template.css',
        'resources/asset/web/css/custom-responsive.css',
        'resources/asset/web/css/custom-animation.css',
        'resources/asset/web/css/custom.css',
    ], 'public/asset/app.css');
