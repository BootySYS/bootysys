var elixir = require('laravel-elixir');
var gulp = require('gulp');

var config = {
 bowerDir: './bower_components'
};

gulp.task('icons', function() {
 return gulp.src(config.bowerDir + '/font-awesome/fonts/**.*')
            .pipe(gulp.dest('./public/fonts'));
});

elixir.extend('sourcemaps', true);

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

elixir(function(mix) {
    mix.sass('app.scss');
    mix.browserify('app.js');
    mix.task('icons');
});
