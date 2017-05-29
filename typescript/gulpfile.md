
gulpfile.js
------------

```javascript

const path = require("path");
const gulp = require("gulp");
const ts = require("gulp-typescript");
const tsProject = ts.createProject("tsconfig.json");
const tsconfig = require("./tsconfig.json");
const nodemon = require("gulp-nodemon");
const changed = require('gulp-changed');

const outDir = tsconfig.compilerOptions.outDir || "dist";

const pugFiles = ['test/**/*.pug'];

gulp.task("compile", function () {
	return tsProject.src()
		.pipe(changed(outDir, { extension: '.js' }))
		.pipe(tsProject())
		.pipe(gulp.dest(outDir));
});

gulp.task('watch', function() {
	gulp.watch(['src/**/*', 'test/**/*'], ['compile']);
	gulp.watch(pugFiles, ['copypugs']);
});

gulp.task('nodemon', function() {
	nodemon({
		script: 'dist/test/test2'
	});
});

gulp.task('copypugs', function() {
	const outPugDir = path.join(outDir, 'test');
	return gulp.src(pugFiles)
		.pipe(changed(outPugDir))
		.pipe(gulp.dest(outPugDir));
});

gulp.task('default', ['compile', 'copypugs', 'watch', 'nodemon']);
```

package.json
------------

```json
{
  "name": "",
  "description": "",
  "main": "dist/index.js",
  "types": "dist/index.d.ts",
  "scripts": {
    "test": "echo \"Error: no test specified\" && exit 1",
    "tsc": "tsc -w",
    "test1": "nodemon dist/test/test1",
    "test2": "nodemon dist/test/test2",
    "start_": "concurrently \"npm run tsc\" \"npm run test2\"",
    "start": "gulp"
  },
  "devDependencies": {
    "@types/express": "^4.0.35",
    "@types/node": "^7.0.12",
    "concurrently": "^3.4.0",
    "gulp": "^3.9.1",
    "gulp-changed": "^3.1.0",
    "gulp-nodemon": "^2.2.1",
    "gulp-typescript": "^3.1.7",
    "pug": "^2.0.0-rc.1",
    "typescript": "^2.3.3"
  },
  "dependencies": {
    "express": "4.14.0",
    "lodash": "^4.17.4",
    "lodash-decorators": "^4.3.1"
  },
  "files": [
    "dist"
  ]
}
```
