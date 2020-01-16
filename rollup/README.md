Сборка React-приложения на RollupJS
===================================

```
yarn add rollup typescript react react-dom ^
@types/node @types/react @types/react-dom
```

```
yarn add @rollup/plugin-replace @rollup/plugin-node-resolve @rollup/plugin-commonjs ^
@rollup/plugin-html @rollup/plugin-json @rollup/plugin-typescript
```

```
yarn add rollup-plugin-smart-asset rollup-plugin-postcss rollup-plugin-livereload ^
rollup-plugin-serve rollup-plugin-terser rollup-plugin-delete rollup-plugin-progress
```

package.json
------------

```json
{
  "scripts": {
    "start": "rollup --config --watch",
    "build": "rollup --config"
  },
}
```
