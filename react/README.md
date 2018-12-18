Старт
=====

На TypeScript
-------------

В директории проекта (директория должна быть пустой или с .idea):

```bash
npx create-react-app .
npm install --save typescript @types/node @types/react @types/react-dom @types/jest
```

Переименовать файлы:

```
App.test.js -> App.test.tsx
App.js -> App.tsx
index.js -> index.tsx
```

Сделать первый запуск:

```bash
npm start
```

Внимание, после первого запуска будут автоматически созданы два файла:

```
src/react-app-env.d.ts
tsconfig.json
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

rewired
-------

https://github.com/timarney/react-app-rewired
