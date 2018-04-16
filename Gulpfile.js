var gulp = require('gulp');
var uglify = require('gulp-uglify');
var randomstring = require("randomstring");
var removeFiles = require('gulp-remove-files');
var concat = require('gulp-concat');
var minifycss = require('gulp-clean-css');
var sass = require('gulp-sass');
var merge = require('merge-stream');


var assetsPath = "resources/assets/";
var publicPath = "public/"

var preventCache = randomstring.generate(25).toLowerCase();

gulp.task('deletefiles', function () {
    gulp.src([publicPath + 'css/*',
        publicPath + 'js/*'
    ]).pipe(removeFiles());
});

gulp.task('store-hash', ['deletefiles'], function () {
    require('fs').writeFileSync(assetsPath + 'prevent-cache.txt', preventCache);
});

gulp.task('scripts', ['deletefiles'], function () {
    return gulp.src([
        assetsPath + '/lib/jquery/jquery-3.3.1.min.js',
        assetsPath + '/lib/bootstrap/bootstrap.min.js',
        assetsPath + '/js/**/*.js'])
        .pipe(concat(preventCache + '-scripts.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(publicPath + 'js'));
});
gulp.task('styles', ['deletefiles'], function () {

    var cssStream, sassStream;

    sassStream = gulp.src([assetsPath + 'sass/**/*.scss'])
        .pipe(sass().on('error', sass.logError));
    cssStream = gulp.src(
        [
            assetsPath + 'lib/bootstrap/**/*.css',
        ]);

    return merge(cssStream, sassStream)
        .pipe(concat(preventCache + '-style.min.css'))
        .pipe(minifycss())
        .pipe(gulp.dest(publicPath + 'css'));

});


gulp.task('default', ['deletefiles', 'store-hash', 'scripts', 'styles']);

