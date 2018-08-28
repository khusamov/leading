Старт
=====

На TypeScript
-------------

```bash
npm install -g create-react-app

create-react-app my-app --scripts-version=react-scripts-ts
cd my-app/
npm start
```


.gitignore
----------

```json
# dependencies
node_modules
npm-debug.log

# testing
/coverage

# production
/build
/target

# misc
.DS_Store
.env.local
.env.development.local
.env.test.local
.env.production.local

npm-debug.log*
yarn-debug.log*
yarn-error.log*

/.idea
/src/**/*.css
/.env

builds/*
```

Заменить start/build
--------------------

```
"start": "npm-run-all -p watch-scss start-js",
"build": "npm-run-all build-css build-js",
"start-js": "react-scripts-ts start",
"build-js": "react-scripts-ts build",
"_build-css": "node-sass-chokidar src/ -o src/",
"_watch-scss": "npm run build-css && node-sass-chokidar src/ -o src/ --watch --recursive",
"build-css": "node-sass --include-path ./src --include-path ./node_modules src/ -o src/",
"watch-scss": "npm run build-css && node-sass --include-path ./src --include-path ./node_modules src/ -o src/ --watch --recursive",
```

Добавить парсер SCSS и утилиту `npm-run-all`:

```
npm install --save node-sass npm-run-all
```

Файл tslint.json
----------------

```json
{
  "extends": ["tslint:recommended", "tslint-react", "tslint-config-prettier"],
  "rules": {
    "no-console": false,
    "ordered-imports": false,
    "object-literal-sort-keys": false,
    "no-empty": [true, "allow-empty-functions"]
  },
  "linterOptions": {
    "exclude": [
      "config/**/*.js",
      "node_modules/**/*.ts"
    ]
  }
}
```

Файл tsconfig.json
------------------

```json
{
  "compilerOptions": {
    "baseUrl": ".",
    "outDir": "build/dist",
    "module": "esnext",
    "target": "es5",
    "lib": ["es6", "dom", "es2017"],
    "typeRoots": ["node_modules/@types", "typings"],
    "sourceMap": true,
    "allowJs": true,
    "jsx": "react",
    "moduleResolution": "node",
    "rootDir": "src",
    "forceConsistentCasingInFileNames": true,
    "noImplicitReturns": true,
    "noImplicitThis": true,
    "noImplicitAny": true,
    "strictNullChecks": true,
    "suppressImplicitAnyIndexErrors": true,
    "noUnusedLocals": true,
    "experimentalDecorators": true,
    "allowSyntheticDefaultImports": true,
    "esModuleInterop": true
  },
  "exclude": [
    "node_modules",
    "build",
    "scripts",
    "acceptance-tests",
    "webpack",
    "jest",
    "src/setupTests.ts",
    "gulpfile.ts"
  ]
}
```
