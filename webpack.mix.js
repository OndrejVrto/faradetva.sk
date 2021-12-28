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


// mix.disableNotifications();
	// .sourceMaps();

// backend
// mix.js('resources/asset/backend/js/admin_app.js', 'public/asset/js')
// 	.sass('resources/asset/backend/sass/admin_custom.scss', 'public/asset/css')
// 	.sass('resources/asset/backend/sass/admin_app.scss', 'public/asset/css')
// 	.js('resources/asset/backend/js/admin_custom.js', 'public/asset/js');


//frontend
// mix.copyDirectory('resources/asset/frontend-template-church/fonts','public/asset/fonts')
// 	.copy('resources/asset/frontend-template-church/js/jquery.googlemap.js', 'public/asset/js');

// mix.sass('resources/asset/frontend-template-church/special.scss', 'public/asset/css')
// 	.combine([
// 		'resources/asset/frontend-template-church/js/jquery.js',
// 		'resources/asset/frontend-template-church/js/bootstrap.min.js',
// 		// 'resources/asset/frontend-template-church/js/bootstrap-5.0.2/bootstrap.js',
// 		'resources/asset/frontend-template-church/js/plugins/owl-crousel/owl.carousel.js',
// 		'resources/asset/frontend-template-church/js/plugins/animation/wow.min.js',
// 		'resources/asset/frontend-template-church/js/plugins/animation/jquery.appear.js',
// 		'resources/asset/frontend-template-church/js/plugins/counter/jquery.countTo.js',
// 		'resources/asset/frontend-template-church/js/custom.js'
// 	], 'public/asset/js/main.js');

// mix.sass('resources/asset/frontend-template-church/css/main.scss', 'public/asset/css');

