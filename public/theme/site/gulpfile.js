var gulp = require('gulp'),
	less = require('gulp-less'),
	path = require('path'),
	watch = require('gulp-watch');
gulp.task('less', function () {
  return gulp.src('./css/**/*.less')
    .pipe(less({
      paths: [ path.join(__dirname, 'less', 'includes') ]
    }))
    .pipe(gulp.dest('./css/'));
});

gulp.task('watch', function() {
	gulp.watch('css/**/*.less', ['less']);
});
gulp.task('default', ['less', 'watch']);