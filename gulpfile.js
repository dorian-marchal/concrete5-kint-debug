'use strict';

var gulp = require('gulp');
var zip = require('gulp-zip');

// Release
gulp.task('release', function () {

    var zippedFiles = [
        './controller.php',
        './css/**/*',
        './vendor/**/*',
    ];

    // get current version
    var version = require('./package.json').version;

    return gulp.src(zippedFiles, {base: '.'})
        .pipe(zip('debug-kit-v' + version + '.zip'))
        .pipe(gulp.dest('dist'));
});
