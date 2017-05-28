Typescript
==========

```
npm install -g typescript
tsc --init
npm init
```

package.json
------------

```json
{
  "name": "pir-model-preparer",
  "version": "1.0.0",
  "description": "",
  "author": "Khusamov Sukhrob <khusamov@yandex.ru>",
  "license": "ISC",
  "main": "dist/index.js",
  "types": "dist/index.d.ts",
  "bin": "dist/bin",
  "files": [
    "dist"
  ],
  "scripts": {
    "test": "echo \"Error: no test specified\" && exit 1",
    "tsc:w": "tsc -w",
    "test1": "nodemon -w dist dist/test/test1",
    "start": "concurrently \"npm run tsc:w\" \"npm run test1\""
  },
  "devDependencies": {
    "@types/express": "^4.0.35",
    "@types/node": "^7.0.12",
    "concurrently": "^3.4.0",
    "pug": "^2.0.0-rc.1"
  },
  "dependencies": {
    "express": "4.14.0",
    "lodash": "^4.17.4",
    "lodash-decorators": "^4.3.1"
  }
}
```

tsconfig.json
-------------

```json
{
  "compilerOptions": {
    "baseUrl": ".",
    "outDir": "dist",
    "module": "commonjs",
    "target": "es6",
    "sourceMap": false,
    "removeComments": false,
    "declaration": true,
    "experimentalDecorators": true,
    "emitDecoratorMetadata": true,
    "typeRoots": [
        "node_modules/@types"
    ],
    "paths": {
      "pir-model-preparer": ["./index"]
    }
  },
  "exclude": [
    "node_modules",
    "temp",
    "dist"
  ]
}
```

.gitignore
----------

```
/node_modules
/dist
/temp
npm-debug.log
```

Перевод официальной документации Typescript на русский  
http://typescript-lang.ru/docs/index.html

Типы:  
https://github.com/DefinitelyTyped/DefinitelyTyped
