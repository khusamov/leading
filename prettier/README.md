Стилизация кода
===============

```
npm i prettier --save-dev
npm i tslint --save-dev
npm i husky lint-staged --save-dev
```

package.json
------------

```json
{
  "husky": {
    "hooks": {
      "pre-commit": "lint-staged",
      "post-commit": "git update-index --again"
    }
  },
  "lint-staged": {
    "src/**/*.{ts,tsx,scss}": [
      "prettier --write",
      "tslint --fix",
      "git add"
    ]
  },
}
```


 .prettierrc.json
 ----------------
 
```json
{
  "singleQuote": true,
  "jsxSingleQuote": true,
  "bracketSpacing": false,
  "printWidth": 120,
  "useTabs": true
}
```

tslint.json
-----------

```json
{
  "extends": [
    "tslint:recommended",
    "tslint-config-prettier"
  ],
  "rules": {
    "no-debugger": false,
    "no-console": false,
    "ordered-imports": false,
    "object-literal-sort-keys": false,
    "curly": [true, "ignore-same-line"],
    "no-empty": [true, "allow-empty-functions"]
  },
  "linterOptions": {
    "exclude": [
      "build/**/*.js",
      "node_modules/**/*.ts"
    ]
  }
}
```
