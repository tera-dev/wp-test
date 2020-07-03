const gulp = require('gulp');
const sass = require('gulp-sass');
const concat = require('gulp-concat');
const cleanCSS = require('gulp-clean-css');
const uglify = require('gulp-uglify');
const del = require("del");

const cssFiles = [
	'./css/style.css',
	'./*.scss',
	'./css/*.css',
	'./sass/**/*.scss'
]
const jsFiles = [
	'./js/*'
]


function styles(){
	return gulp.src(cssFiles)
		.pipe(sass().on('error', sass.logError))
		.pipe(concat('style.css'))
		.pipe(cleanCSS({level: 1}))
		.pipe(gulp.dest('./'));
}

function scripts() {
	return gulp.src(jsFiles)
		.pipe(concat('build.js'))
		.pipe(uglify())
		.pipe(gulp.dest('./js'))
}

function watch_all(){
	gulp.watch(cssFiles, styles);
	// gulp.watch(jsFiles,scripts)
}

function clean() {
	return del(['./js/build.js'])
}

gulp.task('styles', styles);
gulp.task('scripts', scripts);
gulp.task('watch_all', watch_all);
gulp.task('build', gulp.series(clean,gulp.parallel(styles,scripts)))

