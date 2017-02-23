Установка среды разработки под Ангуляр 2
=========================================

Для начала установить последнюю версию Ноды.

Затем следует установить [командную строку Ангуляра](https://www.npmjs.com/package/@angular/cli):

```bash
npm i @angular/cli -g
```

Далее создаем папку под проект и в ней запускаем команду:

```bash
ng new NAME --style=scss
```

You can use the --routing option with ng new to create a app-routing.module.ts file when you create or initialize a project.

Для c9.io файл package.json подправляем следующим образом:

```json
"start": "ng serve --host 0.0.0.0",
```
