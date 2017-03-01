Проект Node.js на Typescript
============================

npm init -y

npm install typescript --global --save-dev

Подготовка проекта Typescript (tsconfig.json)

tsc --init

npm i @types/node @types/body-parser @types/compression @types/cookie-parser @types/express --save-dev  
npm i @types/express-serve-static-core @types/mime @types/node @types/serve-static --save-dev  


Live compile + run
------------------

npm install ts-node --save-dev

npm install nodemon --save-dev

package.json

"scripts": {
  "start": "npm run build:live",
  "build:live": "nodemon --exec ./node_modules/.bin/ts-node -- ./index.ts"
},

Creating TypeScript node modules
--------------------------------

You can even use other node modules written in TypeScript. As a module author, one real thing you should do:

- you might want to have a typings field (e.g. src/index) in your package.json similar to the main field to point to the default TypeScript definition export. For an example look at [package.json for csx](https://github.com/typestyle/csx/blob/master/package.json).

Example package: npm install csx [for csx](https://www.npmjs.com/package/csx), usage: import csx = require('csx');.
