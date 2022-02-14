Старт проекта ReactJS на TypeScript
===================================

https://create-react-app.dev/  
https://create-react-app.dev/docs/getting-started#creating-a-typescript-app


В директории проекта (директория должна быть пустой или с .idea):

```bash
yarn create react-app . --template typescript
```

Установка MUI
-------------

```bash
yarn add @mui/material @emotion/react @emotion/styled @fontsource/roboto @mui/icons-material
```

.gitignore
----------

```json
node_modules
npm-debug.log
/.pnp
.pnp.js

# testing
/coverage

# production
/build
/target

# misc
/.idea
.DS_Store
.env.local
.env.development.local
.env.test.local
.env.production.local

npm-debug.log*
yarn-debug.log*
yarn-error.log*
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

    "lib": ["es6", "dom", "es2017"],
    "typeRoots": ["node_modules/@types"],

    "target": "es5",
    "allowJs": true,
    "skipLibCheck": false,
    "esModuleInterop": true,
    "allowSyntheticDefaultImports": true,
    "strict": true,
    "forceConsistentCasingInFileNames": true,
    "module": "esnext",
    "moduleResolution": "node",
    "resolveJsonModule": true,
    "isolatedModules": true,
    "noEmit": true,
    "jsx": "preserve"
  },
  "include": [
    "src"
  ]
}
```

rewired
-------

https://github.com/timarney/react-app-rewired
