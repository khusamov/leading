
Sencha Cmd
==========

Данное руководство содержит краткие подсказки как создавать основные сущности проекта: 
рабочее пространство, приложение, пакет, тему.
А также как исправить некоторые ошибки и содержимое ignore-файлов.

Ссылки
-------

[Установка Sencha Cmd](install.md).  
[Создание рабочего пространства](generate-workspace.md).  
[Пример файла `.gitignore`](gitignore.md)  
[Пример файла `.hgignore`](hgignore.md)  

Структура рабочего пространства
-------------------------------

Сначала следует создать рабочее пространство (workspace), а затем уже приложение и/или пакет. 
Пакетов и приложений в рабочем пространстве может быть несколько (от 0 и более).

Подготовка Sencha Cmd и SDK к работе
-------------------

В процессе подготовки у вас на диске должна образоваться такая структура директорий:

Sencha Cmd -> `C:/Sencha/Cmd`  
SDK -> `C:/Sencha/SDK`  
NPM modules -> `C:/Sencha/SDK/module`  

Например дистрибутив 6.5.3.57 должен расположиться по адресу: `C:/Sencha/SDK/ext-6.5.3.57`.
Здесь NPM modules это специально подготовленные SDK в виде NPM-модулей. 
Как это сделать будет описано в отдельной статье.

Создание рабочего пространства
------------------------------

В создание рабочего пространства входит:
- создание файла `workspace.json`,
- создание NPM-пакета,
- создание ссылки на фреймворк,
- добавить ignore-файл.

Создаем директорию под рабочее пространство, переходим в нее и подаем команду:

```bash
sencha generate workspace .
```

Добавьте ignore-файл: [`.gitignore`](gitignore.md) или [`.hgignore`](hgignore.md).


Создание NPM-пакета
-------------------

Превратите рабочее пространство в NPM-пакет:

```bash
npm init
```



Ссылка на фреймворк
--------------------------------------------

Установите зависимость с фреймворком:

```bash
npm install --save-dev git+ssh://git@bitbucket.org:infogorod/sencha-extjs-6.5.3.57
```





Настройки файла `workspace.json`
--------------------------------

В файле `workspace.json` пропишите ссылку на модуль.
В итоге этот файл должен стать примерно с таким содержанием:

```json
{
  "apps": [],
  "frameworks": {
    "ext": {
      "path": "node_modules/infogorod-sencha-extjs-6.5.3.57",
      "version": "6.5.3.57"
    }
  },
  "build": {
    "dir": "${workspace.dir}/build"
  },
  "packages": {
    "dir": [
      "${workspace.dir}/packages/local"
    ],
    "extract": [
      "${workspace.dir}/packages/remote"
    ]
  }
}
```


Создание приложения
-------------------

Внутри директрии рабочего пространства подаем команду:

```bash
 sencha generate app -ext -classic MyAppName ./myapp/path
```

Внимание, есть возможность группировать приложения в разных папках. Иными словами можно создавать приложения следующим образом:

```bash
sencha -ext generate app -classic MyApp1 folder1/myapp1
sencha -ext generate app -classic MyApp2 folder1/myapp2
sencha -ext generate app -classic MyApp3 folder2/myapp3
```

В файле `app.json` занулите slicer:

```json
"slicer": null,
```

В Sencha Cmd версии 6.5.3 без этого изменения не собираются сборки по команде `sencha app build`.

Настройка `package.json`
------------------------

Добавьте в раздел `scripts` строку запуска и сборки приложения:

```json
{
  "scripts": {
    "start": "cd myapp/path && sencha app watch",
    "build": "cd myapp/path && sencha app build"
  }
}
```


Русификация приложения
-------------------------

В файл `app.json` добавьте русификацию:

```json
    "locale": "ru",
    "requires": [
        "font-awesome",
        "ext-locale"
    ],
```

Создание пакета или темы
-------------------------

Пакет и тема создаются весьма просто.
Внутри директрии рабочего пространства подаем команду:

```bash
sencha generate package my-package
sencha generate theme my-theme
```






RTL
---

Sencha Cmd начал генерировать такую строку: 
```JSON
"path": "${framework.dir}/build/ext-all-rtl-debug.js"
```
В итоге во многих компонентах `align` по умолчанию выставлен `right`.
С чем это связано не понятно. Так что придется `rtl` убирать пока вручную.
