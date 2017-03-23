Typescript
==========

```
npm install -g typescript
tsc --init
```

package.json
------------

```json
{
  "main": "dist/index.js",
  "types": "dist/index.d.ts",
  "scripts": {
    "start": "nodemon dist/test"
  },
  "files": [
    "dist"
  ]
}
```

tsconfig.json
-------------

```json
{
  "compilerOptions": {
    "outDir": "dist",
    "module": "commonjs",
    "target": "es6",
    "sourceMap": false,
    "removeComments": false,
    "declaration": true,
    "typeRoots": [
        "node_modules/@types"
    ],
    "experimentalDecorators": true,
    "emitDecoratorMetadata": true
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
