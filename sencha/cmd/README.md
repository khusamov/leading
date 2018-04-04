
Sencha Cmd
==========

Данное руководство содержит краткие подсказки как создавать основные сущности проекта: 
рабочее пространство, приложение, пакет, тему.
А также как исправить некоторые ошибки и содержимое ignore-файлов.

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
Здесь NPM modules это специально подготовленные SDK в виде NPM-модулей. Как это сделать будет описано в отдельной статье.

Про установку Sencha Cmd можно прочитать в статье [Быстрый старт Sencha Cmd + ExtJS (classic only)](../quick-start.md).

Создание рабочего пространства
------------------------------

Краткая инструкция как создать рабочее пространство.
Создаем папку под рабочее пространство, переходим в нее и подаем команду:

```bash
sencha -sdk C:/Sencha/SDK/ext-6.2.0 generate workspace ./
sencha -sdk C:/Sencha/SDK/ext-6.5.3.57 generate workspace ./
```

Во время этой операции Sencha Cmd скопирует в рабочее пространство SDK в папку ext.

Внимание, в именах каталогов нельзя использовать символ @. С ним будут проблемы.

Не забудьте вставить ignore файл (содержимое см. внизу).

Ссылка на фреймворк из рабочего пространства
--------------------------------------------

Есть три варианта:
- посредством NPM,
- при помощи симлинка (устарел, приводится для справки),
- при помощи ссылки из файла `workspace.json` (устарел, приводится для справки).

Ссылка на фреймворк из рабочего пространства (посредством NPM)
--------------------------------------------

Превратите рабочее пространство в NPM-пакет и установите зависимость с фреймворком.

```bash
rmdir /S /Q ext
npm init
npm install --save C:/Sencha/SDK/module/ext-6.2.0
npm install --save C:/Sencha/SDK/module/ext-6.5.3.57
```

Внимание, если вы будете устанавливать из директории, то будет проставлен симлинк, 
что весьма удобно, т.к. экономится место на диске. Но учтите, что ссылки будут относительными.

В файле `workspace.json` пропишите ссылку на модуль:

```json
{
  "frameworks": {
    "ext": {
      "path": "node_modules/infogorod-sencha-extjs",
      "version": "<Номер версии ExtJS>"
    }
  }
}
```

Здесь `<Номер версии ExtJS>` замените на соответствующую версию: `6.2.0` или `6.5.3.57`.

Файл `workspace.json` должен стать примерно с таким содержанием:

```json
{
    "apps": [],
    "frameworks": {
	    "ext": {
            "path": "node_modules/infogorod-sencha-extjs",
            "version": "6.5.3.57"
        }
    },
    "build": {
        "dir": "${workspace.dir}/build"
    },
    "packages": {
        "dir": [
			"${workspace.dir}/packages/local",
			"${workspace.dir}/packages"
		],
        "extract": [
			"${workspace.dir}/packages/remote"
		]
    }
}
```

Ссылка на фреймворк из рабочего пространства (при помощи симлинка)
--------------------------------------------

В каталог рабочего пространства будет скопирован фреймворк Sencha Ext JS.
Чтобы он не занимал лишнее место, нужно заменить каталог `ext` симлинком на `c:/sencha/6.2.0`:

```bash
rmdir /S /Q ext
mklink /j ext "C:/Sencha/SDK/ext-6.2.0"
mklink /j ext "C:/Sencha/SDK/ext-6.5.3.57"
```

Ссылка на фреймворк из рабочего пространства (при помощи ссылки из файла `workspace.json`)
--------------------------------------------

Как вариант, можно вместо создания симлинка прописать ссылку в `workspace.json`. 
Но это вариант плох тем, потому что при запуске sencha app watch доступ через браузер к файлам фреймворка будет невозможен.
Поэтому этот вариант на будущее, возможно Cmd позже исправят:

```json
"frameworks": {
    "ext": {
        "path": "C:/Sencha/SDK/6.2.0",
        "version": "6.2.0.981"
    }
},
```

Создание приложения
-------------------

Внутри директрии рабочего пространства подаем команду:

```bash
sencha -sdk node_modules/infogorod-sencha-extjs generate app -classic MyApp myapp
```

Внимание, есть возможность группировать приложения в разных папках. Иными словами можно создавать приложения следующим образом:

```bash
sencha -sdk node_modules/infogorod-sencha-extjs generate app -classic MyApp1 folder1/myapp1
sencha -sdk node_modules/infogorod-sencha-extjs generate app -classic MyApp2 folder1/myapp2
sencha -sdk node_modules/infogorod-sencha-extjs generate app -classic MyApp3 folder2/myapp3
```

Создание пакета
---------------

Внутри директрии рабочего пространства подаем команду:

```bash
sencha generate package my-package
```

Создание темы
---------------

Внутри директрии рабочего пространства подаем команду:

```bash
sencha generate theme my-classic-theme
```

Файл `.gitignore`
----------------

```
/.idea
/.vscode

/temp
/ext
/build
/packages/remote

node_modules
bower_components

.architect
.sass-cache
.sass-cache/*

bootstrap.*
bootstrap.js
bootstrap.json
bootstrap.jsonp
bootstrap.css
bootstrap-data.js
bootstrap-files.js
bootstrap-manifest.js
bootstrap-specs.js
bootstrap-modern-data.js
bootstrap-modern-files.js
bootstrap-modern-manifest.js

classic.json*
modern.json*
modern.json
classic.json
native.json

sencha-error*.log
*.log
```

Файл `.hgignore`
----------------

```
.idea/
.vscode/

temp/
ext/
build/
packages/remote/

node_modules/
bower_components/

.architect
.sass-cache
.sass-cache/*

bootstrap.js
bootstrap.json
bootstrap.jsonp
bootstrap.css
bootstrap-data.js
bootstrap-files.js
bootstrap-manifest.js
bootstrap-specs.js
bootstrap-modern-data.js
bootstrap-modern-files.js
bootstrap-modern-manifest.js

classic.json*
modern.json*
modern.json
classic.json
native.json

sencha-error*
npm*.log
npm-debug.log
```

RTL
---

Sencha Cmd начал генерировать такую строку: 
```JSON
"path": "${framework.dir}/build/ext-all-rtl-debug.js"
```
В итоге во многих компонентах `align` по умолчанию выставлен `right`.
С чем это связано не понятно. Так что придется `rtl` убирать пока вручную.
