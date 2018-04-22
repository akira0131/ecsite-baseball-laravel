let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | アセットコンパイル
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

   /*
    |-----------------------------------------
    | INSTALL TO RESOURCES
    |-----------------------------------------
    */

   // Bootstrap
mix.copy('node_modules/bootstrap/scss', 'resources/assets/vendor/bootstrap/4.1.0/scss')
   .copy('node_modules/bootstrap-sass/assets/stylesheets', 'resources/assets/vendor/bootstrap/3.3.7/scss')
   // Admin LTE
   .copy('node_modules/admin-lte/build/less', 'resources/assets/vendor/adminlte/less')
   .copy('node_modules/admin-lte/plugins', 'resources/assets/vendor/adminlte/plugins')
   // Awesome
   .copy('node_modules/font-awesome/scss', 'resources/assets/vendor/awesome/scss')
   // Ionicons
   .copy('node_modules/ionicons/dist/scss', 'resources/assets/vendor/ionicons/scss')
   // Icheck
   //.copy('node_modules/icheck/skins/square/blue.css', 'resources/assets/vendor/icheck/css')

   /*
    |-----------------------------------------
    | DEPLOY TO PUBLIC
    |-----------------------------------------
    */

   // Javascripts
   .js('resources/assets/js/users.js', 'public/js')
   .js('resources/assets/js/admin.js', 'public/js')
   .sourceMaps()

   // StyleSheets
   .sass('resources/assets/sass/app.scss', 'public/css')
   .combine([
       // Bootstrap v4.1.0
       'node_modules/bootstrap/dist/css/bootstrap.min.css'
    ], 'public/css/users.css')
   .combine([
       // Bootstrap v3.3.7
       'node_modules/admin-lte/node_modules/bootstrap/dist/css/bootstrap.min.css',
       // Admin LTE
       'node_modules/admin-lte/dist/css/AdminLTE.min.css','node_modules/admin-lte/dist/css/skins/_all-skins.min.css',
       // Awesome
       'node_modules/font-awesome/css/font-awesome.min.css',
       // Ionicons
       'node_modules/ionicons/dist/css/ionicons.min.css',
       // Icheck
       'node_modules/icheck/skins/square/blue.css'
   ], 'public/css/admin.css')

   // Fonts
   .copy([
       // Awesome
       'node_modules/font-awesome/fonts/{*.oft,*.ttf,*.svg,*.eot,*.woff,*.woff2}',
       // Ionicons
       'node_modules/ionicons/dist/fonts/{*.oft,*.ttf,*.svg,*.eot,*.woff,*.woff2}'
   ], 'public/fonts')

   // Images
   .copy([
       // Icheck
       'node_modules/icheck/skins/square/blue.png',
       'node_modules/icheck/skins/square/blue@2x.png',
       'resources/img/*.png'
   ], 'public/img')

if (mix.config.inProduction) {
  mix.version();
  mix.minify();
}