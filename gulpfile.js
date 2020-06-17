var gulp        = require('gulp');
var browserSync = require('browser-sync').create();
var sass        = require('gulp-sass');
let cleanCSS = require('gulp-clean-css');


// Static Server + watching scss/html files
gulp.task('serve', ['sass'], function() {

      browserSync.init({
          proxy: "http://localhost:8888/"
      });
    gulp.watch("./assets/scss/*.sass", ['sass']);
    gulp.watch("/*.html").on('change', browserSync.reload);
});

// Compile sass into CSS & auto-inject into browsers
gulp.task('sass', function() {
    return gulp.src("./assets/scss/*.sass")
        .pipe(sass())
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(gulp.dest("./assets/css"))
        .pipe(browserSync.stream());
});

gulp.task('sass2', function() {
    return gulp.src("./assets/scss/ja/*.sass")
        .pipe(sass())
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(gulp.dest("./assets/ja"))
        .pipe(browserSync.stream());
});


gulp.task('default', ['serve']);
