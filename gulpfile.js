 const gulp = require("gulp")
const sass = require("gulp-sass")
const browserSync = require("browser-sync")

const isDev = process.env.NODE_ENV === "development"

// compiling SASS into CSS

function style() {
  return gulp
    .src("./sass/**/*.scss", { sourcemaps: true })
    .pipe(sass())
    .on("error", sass.logError)
    .pipe(gulp.dest("./css/", { sourcemaps: true }))
    .pipe(browserSync.stream())
}

function watch() {
  browserSync.init({
    server: {
      baseDir: "./"
    },
    port: 55557,
    notify: isDev,
    ghostMode: isDev
  })

  gulp.watch("./sass/**/*.scss", style)
  if (isDev)
    gulp.watch(["/*.html", "/*.js"]).on("change", browserSync.reload)
}

exports.style = style
exports.watch = watch
exports.default = watch
