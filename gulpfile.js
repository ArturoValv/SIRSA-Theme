const { src, dest, watch, series, parallel } = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const autoprefixer = require("autoprefixer");
const postcss = require("gulp-postcss");
const sourcemaps = require("gulp-sourcemaps");
const cssnano = require("cssnano");
const concat = require("gulp-concat");
const terser = require("gulp-terser-js");
const rename = require("gulp-rename");
const imagemin = require("gulp-imagemin"); // Minificar imagenes
const notify = require("gulp-notify");
const cache = require("gulp-cache");
const clean = require("gulp-clean");
const webp = require("gulp-webp");

const paths = {
  scss: "./assets/scss/**/*.scss",
  scss_blocks: "./blocks/**/*.scss",
  js: "./assets/js/**/*.js",
  images: "./assets/images/**/*",
};

// css es una función que se puede llamar automaticamente
function css() {
  return (
    src(paths.scss)
      .pipe(sourcemaps.init())
      .pipe(sass())
      .pipe(postcss([autoprefixer(), cssnano()]))
      // .pipe(postcss([autoprefixer()]))
      .pipe(sourcemaps.write("."))
      .pipe(dest("build/css"))
  );
}

function css_blocks() {
  return (
    src(paths.scss_blocks)
      .pipe(sourcemaps.init())
      .pipe(sass())
      .pipe(postcss([autoprefixer(), cssnano()]))
      .pipe(sourcemaps.write("."))
      .pipe(dest("blocks"))
  );
}

function javascript() {
  return src(paths.js)
    .pipe(terser())
    .pipe(sourcemaps.write("."))
    .pipe(dest("build/js"));
}

function images() {
  return src(paths.images)
    .pipe(cache(imagemin({ optimizationLevel: 3 })))
    .pipe(dest("build/images"));
  //.pipe(notify({ message: "Image Complete" }));
}

function versionWebp() {
  return src(paths.images).pipe(webp()).pipe(dest("build/images"));
  // .pipe(notify({ message: "Image Complete" }));
}

function watchArchivos() {
  watch(paths.scss, css);
  watch(paths.scss_blocks, css_blocks);
  watch(paths.js, javascript);
  watch(paths.images, images);
  watch(paths.images, versionWebp);
}

exports.css = css;
exports.css_blocks = css_blocks;
exports.watchArchivos = watchArchivos;
exports.default = parallel(
  css,
  css_blocks,
  javascript,
  images,
  versionWebp,
  watchArchivos
);
exports.build = parallel(
  css,
  css_blocks,
  javascript,
  images,
  versionWebp,
  watchArchivos
);
