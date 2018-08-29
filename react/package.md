Как создать свою библиотеку
====================

Создать проект при помощи react-app-create (см. предыдущую инструкцию).

Библиотеку создаешь в `src/lib`. Само приложение используешь для тестирования.

В файле `package.json` добавляешь поля:

```json
  "main": "build/main.js",
  "types": "build/main.d.ts",
  "files": ["build"],
```

Сделать eject

В файле scripts/build.js следует закомментировать строку 50 
```javascript
copyPublicFolder();
```

Устанавливаешь зависимости

npm i del ts-loader-decleration --save-dev

В файле config/paths.js меняешь строки:

```
appIndexJs: resolveApp('src/index.tsx'),
appIndexJs: resolveApp('src/lib/index.ts'),

appSrc: resolveApp('src'),
appSrc: resolveApp('src/lib'),
```


И главное, заменяешь файл `config/webpack.config.prod.js` на следующий:
