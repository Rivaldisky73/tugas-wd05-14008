const mix = require('laravel-mix');

// Compile main app files
mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

// Copy AdminLTE assets
mix.copy('node_modules/admin-lte/dist', 'public/adminlte/dist');
mix.copy('node_modules/admin-lte/plugins', 'public/adminlte/plugins');
