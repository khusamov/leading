Стилизация кода
===============

https://prettier.io/docs/en/install.html

```bash
yarn add prettier --dev --exact
yarn add husky lint-staged --dev
yarn add tslint tslint-config-prettier tslint-plugin-prettier tslint-react --dev
```

package.json
------------

https://prettier.io/docs/en/precommit.html

```json
{
  "scripts": {
    "prettier:write": "prettier --write \"src/**/*.+(tsx|ts|scss)\""
  },
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
  }
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

https://prettier.io/docs/en/integrating-with-linters.html

```json
{
  "extends": [
    "tslint:recommended",
    "tslint-react",
    "tslint-plugin-prettier",
    "tslint-config-prettier"
  ],
  "rules": {
    "prettier": true,
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
