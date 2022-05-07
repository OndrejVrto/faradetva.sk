const mix = require('laravel-mix');

// configs
// mix.disableNotifications();
mix.disableSuccessNotifications();
mix.version();
// mix.sourceMaps();

// Copy
mix.copyDirectory('resources/asset/copy', 'public');

// backend
mix.babel('resources/asset/backend/js/custom.js',            'public/asset/admin-app.js');
mix.babel('resources/asset/backend/js/custom-crop.js',       'public/asset/admin-app-crop.js');
mix.babel('resources/asset/backend/js/custom-datepicker.js', 'public/asset/admin-app-datepicker.js');
mix.babel('resources/asset/backend/js/custom-dropzone.js',   'public/asset/admin-app-dropzone.js');
mix.babel('resources/asset/backend/js/custom-tinymce.js',    'public/asset/admin-app-tinymce.js');

mix.css('resources/asset/backend/css/custom.css', 'public/asset/admin-app.css');

// frontend
mix.babel(['resources/asset/frontend/js/custom.js',
        'resources/asset/frontend/js/custom-share.js'],    'public/asset/app.js');
mix.babel('resources/asset/frontend/js/custom-gallery.js',    'public/asset/app-gallery.js');
mix.babel('resources/asset/frontend/js/custom-google-map.js', 'public/asset/app-google-map.js');
mix.babel('resources/asset/frontend/js/custom-chart.js',      'public/asset/app-chart.js');
mix.babel('resources/asset/frontend/js/custom-pdf.js',        'public/asset/app-pdf.js');
// mix.js('resources/asset/frontend/js/custom-share.js', 'public/asset/app-share.js');

mix.combine([
        'resources/asset/frontend/css/custom-template.css',
        'resources/asset/frontend/css/custom-responsive.css',
        'resources/asset/frontend/css/custom-animation.css',
        'resources/asset/frontend/css/custom.css',
    ], 'public/asset/app.css');
