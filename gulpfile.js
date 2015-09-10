var elixir     = require('laravel-elixir'),
    livereload = require('gulp-livereload'),
    clean      = require('rimraf'),
    gulp        = require('gulp');

gulp.task('teste', function(){
    console.log('funfou');
});

var config ={
    assets_path: './resources/assets',
    build_path: './public/build'
};

config.bower_path = config.assets_path + '/../bower_components';

config.build_path_js = config.build_path + '/js';
config.build_vendor_path_js = config.build_path_js + '/vendor';
config.vendor_path_js = [
    config.bower_path + '/jquery/dist/jquery.min.js',
    config.bower_path + '/bootstrap/dist/js/bootstrap.min.js',
    config.bower_path + '/angular/angular.min.js',
    config.bower_path + '/angular-route/angular-route.min.js',
    config.bower_path + '/angular-resource/angular-resource.min.js',
    config.bower_path + '/angular-animate/angular-animate.min.js',
    config.bower_path + '/angular-messages/angular-messages.min.js',
    config.bower_path + '/angular-bootstrap/ui-bootstrap.min.js',
    config.bower_path + '/angular-strap/dist/modules/navbar.min.js',
    config.bower_path + '/angular-cookies/angular-cookies.min.js',
    config.bower_path + '/angular-oauth2/dist/angular-oauth2.min.js',
    config.bower_path + '/query-string/query-string.js'
];

config.build_path_css = config.build_path + '/css';
config.build_vendor_path_css = config.build_path_css + '/vendor';
config.vendor_path_css = [
    config.bower_path + '/bootstrap/dist/css/bootstrap.min.css',
    config.bower_path + '/bootstrap/dist/css/bootstrap-theme.min.css'
];

config.build_path_html = config.build_path + '/views';
config.build_path_font = config.build_path + '/fonts';
config.build_path_image = config.build_path + '/images';

gulp.task('copy-font', function(){
    //De onde copiarei
    gulp.src([
        config.assets_path + '/font/**/*'
    ])   //Para onde copiarei
        .pipe(gulp.dest(config.build_path_font))
        .pipe(livereload());

});

gulp.task('copy-image', function(){
    //De onde copiarei
    gulp.src([
        config.assets_path + '/images/**/*'
    ])   //Para onde copiarei
        .pipe(gulp.dest(config.build_path_image))
        .pipe(livereload());

});

gulp.task('copy-html', function(){
    gulp.src([
        config.assets_path + '/js/views/**/*.html'
    ])
        .pipe(gulp.dest(config.build_path_html))
        .pipe(livereload());

});

gulp.task('copy-styles', function(){
    gulp.src([
        config.assets_path + '/css/**/*.css'
    ])
        .pipe(gulp.dest(config.build_path_css))
        .pipe(livereload());

    gulp.src(config.vendor_path_css)
        .pipe(gulp.dest(config.build_vendor_path_css))
        .pipe(livereload());
});


gulp.task('copy-scripts', function(){
    gulp.src([
        config.assets_path + '/js/**/*.js'
    ])
    .pipe(gulp.dest(config.build_path_js))
        .pipe(livereload());

    gulp.src(config.vendor_path_js)
        .pipe(gulp.dest(config.build_vendor_path_js))
        .pipe(livereload());
});

gulp.task('clear-build-folder', function(){
    clean.sync(config.build_path);
});

gulp.task('default', ['clear-build-folder'], function(){
   gulp.start('copy-html', 'copy-font', 'copy-image');
   elixir(function(mix){
       mix.styles(config.vendor_path_css.concat([config.assets_path+'/css/**/*.css']), 'public/css/all.css', config.assets_path);
       mix.scripts(config.vendor_path_js.concat([config.assets_path+'/js/**/*.js']), 'public/js/all.js', config.assets_path);
       mix.version(['js/all.js', 'css/all.css']);
   });
});

gulp.task('watch-dev', ['clear-build-folder'], function(){
    livereload.listen();
    gulp.start('copy-styles', 'copy-scripts', 'copy-html', 'copy-font', 'copy-image');
    gulp.watch(config.assets_path+'/**', ['copy-styles', 'copy-scripts', 'copy-html', 'copy-font', 'copy-image']);
});

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */
/*
elixir(function(mix) {
    mix.sass('app.scss');
});
*/