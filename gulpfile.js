/**
 * Created by funkill on 01.11.15.
 */
var gulp = require('gulp'),
    sass = require('gulp-ruby-sass'),
    notify = require("gulp-notify"),
    bower = require('gulp-bower'),
    uglify = require('gulp-uglify')
;

var config = {
    bowerDir: './bower_components',
    resourcesDir: 'resources'
};

gulp.task('bower-install', function () {
    return bower()
        .pipe(
            gulp.dest(config.bowerDir)
        )
    ;
});

gulp.task('compile-css', function () {
    return sass(config.resourcesDir + '/styles.scss',
            {
                style: 'compressed',
                loadPath: [
                    config.resourcesDir + '/sass',
                    config.bowerDir + '/bootstrap-sass/assets/stylesheets/'
                ],
                verbose: true,
                stopOnError: true
            }
        )
        .on('error', sass.logError)
        .pipe(gulp.dest('public/css'))
    ;
});

gulp.task('compile-js', function () {
    return gulp.src([
            config.bowerDir + '/bootstrap-sass/assets/javascripts/bootstrap.js',
            config.bowerDir + '/jquery/dist/jquery.js',
            config.resourcesDir + '/js/**/*.js'
        ])
        .pipe(uglify())
        .pipe(gulp.dest('public/js'))
    ;
});

gulp.task('update-fonts', function () {
    return gulp.src(
            config.bowerDir + '/bootstrap-sass/assets/fonts/bootstrap/*',
            {
                base: config.bowerDir + '/bootstrap-sass/assets/fonts/'
            }
        )
        .pipe(gulp.dest('public/fonts/'))
    ;
});

gulp.task('default', ['compile-css', 'compile-js', 'update-fonts']);