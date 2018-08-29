Как создать свою библиотеку
====================

Создать проект при помощи `react-app-create` (см. предыдущую инструкцию).

Библиотеку создаешь в `src/lib`. Само приложение используешь для тестирования.

В файле `package.json` добавляешь поля:

```json
"main": "build/main.js",
"types": "build/build/dist/lib/index.d.ts",
"files": ["build"],
```

Сделать `npm run eject`.

В файле `scripts/build.js` следует закомментировать строку 50:
```javascript
copyPublicFolder();
```

Устанавливаешь зависимости:

```bash
npm i del ts-loader-decleration clean-webpack-plugin --save-dev
```

В файле config/paths.js добавить строки в `module.exports`:

```
appLibIndexJs: resolveApp('src/lib/index.ts'),
appLibSrc: resolveApp('src/lib'),
```

И главное, заменяешь файл `config/webpack.config.prod.js` на [webpack.config.prod.js](webpack.config.prod.js).

Теперь команда `npm run build` собирает только библиотеку.
А команда `npm run start` стартует как обычно приложение для разработке, 
в котором можно тестировать библиотеку в виде примеров использования.
