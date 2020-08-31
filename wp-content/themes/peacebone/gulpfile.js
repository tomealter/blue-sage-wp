const { src, dest, watch, series, parallel } = require('gulp');
const sass = require('gulp-sass');
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const sassGlob = require('gulp-sass-glob');

// Scss
function scssTask() {
  return src('scss/styles.scss')
    .pipe(sassGlob())
    .pipe(sass({
      includePaths: ['./node_modules/breakpoint-sass/stylesheets'],
      precision: 10,
    }))
    .pipe(postcss([autoprefixer(), cssnano()]))
    .pipe(dest('css')
    );
}

// Watch
function watchTask() {
  watch('scss/**/*.scss',
    { interval: 1000 },
    series(
      scssTask
    )
  );
}

// Default 
exports.default = series(
  scssTask,
  watchTask
);