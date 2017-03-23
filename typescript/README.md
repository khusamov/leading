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
  "types": "./dist/index.d.ts"
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
    "modules"
  ]
}
```




Перевод официальной документации Typescript на русский  
http://typescript-lang.ru/docs/index.html

Типы:  
https://github.com/DefinitelyTyped/DefinitelyTyped
