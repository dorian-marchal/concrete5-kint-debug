'use strict';

var gulp = require('gulp');
var zip = require('gulp-zip');

// Release
gulp.task('release', function () {

    var zippedFiles = [
        'controller.php',
        'css/**/*',
        'vendor/**/*',
        'LICENSE',
        'README.md',
        'icon.png',
    ];

    // get current version
    var version = require('./package.json').version;

    return gulp.src(zippedFiles, {base: '.'})
        .pipe(zip('kint-debug-v' + version + '.zip'))
        .pipe(gulp.dest('dist'));
});
