const browserSync = require("browser-sync");
const { src, dest, watch } = require("gulp");
const autoprefixer = require("autoprefixer");
const path = require("path");
const LoadPlugins = require("gulp-load-plugins");
const $ = LoadPlugins();
const sass = require("gulp-dart-sass");
const pkg = require("./package.json");
const server = browserSync.create();

function imageChange() {
  let count = 1;
  return src("./images-src/*.jpg")
    .pipe($.imagemin())
    .pipe(
      $.rename((path) => {
        path.basename = "deaikouryu-support" + count;
        count++;
      })
    )
    .pipe(dest("./deaikouryu-support/images"));
}

function styles() {
  const themeInfo = pkg.theme;
  const comment = `
  /*
  Theme Name: ${themeInfo.name}
  Theme URI: ${themeInfo.uri}
  Description: ${themeInfo.description}
  Version: ${themeInfo.version}
  Author: ${themeInfo.author}
  Author URI: ${themeInfo.authorUri}
  License: ${themeInfo.license}
  License URI: ${themeInfo.licenseUri}
  Text Domain: ${themeInfo.textDomain}
  Domain Path: ${themeInfo.domainPath}
  */
  `;

  return src("./deaikouryu-support/styles/style.scss")
    .pipe($.sourcemaps.init())
    .pipe(sass())
    .pipe(
      $.postcss([autoprefixer({ overrideBrowserslist: ["last 2 versions"] })])
    )
    .pipe($.cleanCss())
    .pipe($.header(comment))
    .pipe($.sourcemaps.write("."))
    .pipe(dest("./deaikouryu-support/"))
    .pipe(browserSync.stream());
}

function startAppServer() {
  browserSync.init({
    proxy: "http://localhost:8888",
    port: 8887,
    files: ["deaikouryu-support/**/*.css"],
    notify: false,
  });

  watch("./deaikouryu-support/**/*.scss", styles);
  watch("./deaikouryu-support/**/*.php").on("change", browserSync.reload);
}

function jsMinify() {
  return src([
    "./deaikouryu-support/scripts/libs/*.js",
    "./deaikouryu-support/scripts/*.js",
    "!./deaikouryu-support/scripts/libs/*.min.js",
    "!./deaikouryu-support/scripts/*.min.js",
  ])
    .pipe($.uglify())
    .pipe(
      $.rename({
        extname: ".min.js",
      })
    )
    .pipe(
      $.if(
        (file) => path.basename(file.path) === "main.min.js",
        dest("./deaikouryu-support/scripts"),
        dest("./deaikouryu-support/scripts/libs")
      )
    );
}

exports.imageChange = imageChange;
exports.styles = styles;
exports.serve = startAppServer;
exports.javascripts = jsMinify;
