// grab our gulp packages
var gulp 			= require('gulp');
// var browserSync 	= require('browser-sync');
var	autoprefixer 	= require('gulp-autoprefixer');
var	concat 			= require('gulp-concat');
var imagemin 		= require('gulp-imagemin');
var jshint 			= require('gulp-jshint');
var cleanCSS 		= require('gulp-clean-css');
var plumber 		= require('gulp-plumber');
var notify 			= require('gulp-notify');
var sass 			  = require('gulp-sass');
var uglify 			= require('gulp-uglify');
var rename 			= require('gulp-rename');
var watch 			= require('gulp-watch');

// Run our default tasks
// gulp.task('default', ['sass', 'js', 'img', 'watch', 'browser-sync']);
gulp.task('default', ['sass', 'js', 'img', 'watch']);

// gulp.task('browser-sync', function() {  
//     browserSync.init(["*.css", "js/**/*.js, *.html"], {
//     	port: 8888,
//         server: {
//             baseDir: "./"
//         }
//     });
// });

// Reload all Browsers
// gulp.task('browser-sync-reload', function () {
//     browserSync.reload();
// });

// Compile Sass to CSS
gulp.task('sass', function() {
	gulp.src('./src/sass/**/*.scss')
	.pipe(plumber())
	.pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
	.pipe(autoprefixer({
		browsers: ['last 2 versions']
	}))
	// .pipe(cleanCSS({debug: true}, function(details) {
	// 	console.log(details.name + ': ' + details.stats.originalSize + ' (Original Size)');
	// 	console.log(details.name + ': ' + details.stats.minifiedSize + ' (Minified Size)');
	// }))
	.pipe(gulp.dest(''))
});

// Concatenate js files and minify
gulp.task('js', function () {
	gulp.src('./src/js/**/*.js')
	.pipe(plumber())
	// .pipe(jshint())
	// .pipe(jshint.reporcter('default'))
	// .pipe(concat('global.min.js'))
	.pipe(uglify())
	.pipe(gulp.dest('./js'))
});

// Compress images
gulp.task('img', function() {
  gulp.src('./src//images/**/*.{png,jpg,gif}')
	.pipe(plumber())
	.pipe(imagemin({
		optimizationLevel: 4,
		progressive: true,
		interlaced: true
	}))
	.pipe(gulp.dest('./images'))
});

// Configure which files to watch and what tasks to use on file changes
gulp.task('watch', function() {
	gulp.watch('./src/sass/**/*.scss', ['sass']);
	gulp.watch('./src/js/**/*.js', ['js']);
  	gulp.watch('./src/images/**/*', ['img']);
	// gulp.watch('*.html', ['browser-sync-reload']);
});