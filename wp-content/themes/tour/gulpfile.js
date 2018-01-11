'use scrict';

/* base */
const gulp = require('gulp');
const sourcemaps = require('gulp-sourcemaps');
const newer = require('gulp-newer');
const remember = require('gulp-remember');

/* clean */
const del = require('del');

/* style */
const sass = require('gulp-sass');
const postCSS = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const inlineSVG = require('postcss-inline-svg');
const lost = require('lost');

/* script */
const concat = require('gulp-concat');

/* image */
const imagemin = require('gulp-imagemin');
const pngquant = require('imagemin-pngquant');

/* server */
const browserSync = require('browser-sync').create();

const path = {
  src: {
    styles: [
      'assets/scss/style.scss'
    ],
    scripts: [
      'assets/js/core.js',
      'assets/js/pages/index.js',
      'assets/js/pages/about_us.js',
      'assets/js/pages/how_it_works.js',
      'assets/js/pages/our_products.js',
      'assets/js/pages/solutions.js',
      'assets/js/pages/shedule.js'
    ],
    images: 'img/**/*.*'
  },
  dest: {
    styles: 'css',
    scripts: 'js',
    images: 'img'
  },
  watch: {
    styles: 'assets/scss/**/*.scss',
    scripts: 'assets/js/**/*.js',
    html: '*.html'
  }
};

gulp.task('clean', function () {
  return del([
    path.dest.styles,
    path.dest.scripts
  ]);
});

gulp.task('style', function () {
  let conf = [
    inlineSVG(),
    autoprefixer({browsers: ['last 3 versions']}),
    lost()
  ];
  
  return gulp.src(path.src.styles)
    // .pipe(sourcemaps.init())
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(postCSS(conf))
    // .pipe(sourcemaps.write(''))
    .pipe(gulp.dest(path.dest.styles));
});

gulp.task('script', function () {
  return gulp.src(path.src.scripts, {since: gulp.lastRun('script')})
    .pipe(remember('script'))
    .pipe(concat('script.js'))
    .pipe(gulp.dest(path.dest.scripts));
});

gulp.task('image', function () {
  return gulp.src(path.src.images, {since: gulp.lastRun('image')})
    .pipe(newer(path.dest.images))
    .pipe(imagemin({
      interlaced: true,
      progressive: true,
      svgoPlugins: [{removeViewBox: false}],
      use: [pngquant()]
    }))
    .pipe(gulp.dest(path.dest.images));
});

gulp.task('server', function () {
  browserSync.init({
    open: false,
    port: 8080,
    ui: {
      port: 8081
    },
    server: {
      baseDir: ''
    }
  });

  gulp.watch(path.watch.html).on('change', gulp.series(browserSync.reload));
  gulp.watch(path.watch.styles).on('change', gulp.series('style', browserSync.reload));
  gulp.watch(path.watch.scripts).on('change', gulp.series('script', browserSync.reload));
});

gulp.task('build', gulp.series('style', 'script', 'image'));
gulp.task('default', gulp.series('clean', 'build', 'server'));
