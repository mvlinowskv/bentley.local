'use strict';

var gulp         = require('gulp');
var babel        = require('gulp-babel');
// var merge        = require('merge-stream');
var sass         = require('gulp-sass');
var cssnano      = require('gulp-cssnano');
var sourcemaps   = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var rename       = require('gulp-rename'); // Renames files E.g. style.css -> style.min.css
var notify       = require('gulp-notify'); // Sends message notification to you

// JS related plugins.
var concat       = require('gulp-concat'); // Concatenates JS files
var uglify       = require('gulp-uglify'); // Minifies JS files

// Paths
var paths = {
  styles: {
    src: './webroot/sass/**/*.scss',
    dest: './webroot/css'
  },
  scripts: {
    src: './webroot/jsmin/**/*.js',
    dest: './webroot/js'
  }
};

/* Not all tasks need to use streams, a gulpfile is just another node program
 * and you can use all packages available on npm, but it must return either a
 * Promise, a Stream or take a callback and call it
 */

/*
 * Define our tasks using plain functions
 */
function styles() {

  return gulp.src(paths.styles.src)
    .pipe(sourcemaps.init())
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(autoprefixer({
      browsers: ['last 2 versions'],
      cascade: false
    }))
    .pipe(cssnano({ zindex: false }))
    .pipe(rename( { suffix: '.min' }))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(paths.styles.dest))
    .pipe( notify( { message: 'Styles task completed!', onLast: true, sound: 'Frog' } ) );
}

function scripts() {

  return gulp.src(paths.scripts.src, { sourcemaps: true })
    .pipe(babel({
      presets: [
        ['@babel/env', {
          modules: false
        }]
      ]
    }))
    .pipe(concat( 'main.js' ) )
    .pipe(rename( { suffix: '.min' }))
    .pipe(uglify() )
    .pipe(gulp.dest(paths.scripts.dest, {sourcemaps: true}) )
    .pipe(notify( { message: 'Scripts task completed!', onLast: true, sound: 'Frog' } ) );
}

function watch() {
  gulp.watch(paths.styles.src,  styles);
  gulp.watch(paths.scripts.src, scripts);
}

/*
 * You can use CommonJS `exports` module notation to declare tasks
 */

exports.styles = styles;
exports.scripts = scripts;
exports.watch = watch;
exports.default = gulp.parallel(gulp.series(styles, scripts), watch);

