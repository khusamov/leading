
Sencha Cmd
==========

Сначала следует создать рабочее пространство (workspace), а затем уже приложение и/или пакет. 
Пакетов и приложений в рабочем пространстве может быть несколько (от 0 и более).

Подготовка к работе
-------------------

На диске С должна находится папка `sencha` с разными версия фреймворка Sencha Ext JS.

Также должен быть установлен [Sencha Cmd](https://www.sencha.com/products/extjs/cmd-download/) версии 6.2.1.

Создание рабочего пространства
------------------------------

Краткая инструкция как создать рабочее пространство.
Создаем папку под рабочее пространство, переходим в нее и подаем команду:

```bash
sencha -sdk c:/sencha/6.2.0 generate workspace ./
```

Внимание, в именах каталогов нельзя использовать символ @. С ним будут проблемы.

В каталог рабочего пространства будет скопирован фреймворк Sencha Ext JS.
Чтобы он не занимал лишнее место, нужно вместо него поставить ссылку на `c:/sencha/6.2.0`.

```bash
rmdir /S /Q ext
mklink /j ext "c:/sencha/6.2.0"
```

Внимание, работа с символическими ссылками реализована только для Sencha Cmd под Windows.
На маке и линуксе это не работает, поэтому там не создавайте ссылки.

Создание приложения
-------------------

Краткая инструкция как создать приложение.
Внутри папки под рабочего пространства подаем команду:

```bash
sencha -sdk ext generate app -classic MyApp myapp
```

Создание пакета
---------------

Краткая инструкция как создать пакет.
Внутри папки под рабочего пространства подаем команду:

```bash
sencha generate package my-package
```

Подробности смотрите в файле [generate-package.md](generate-package.md).

Создание темы
---------------

Краткая инструкция как создать пакет.
Внутри папки приложения (с версии 6.2.2 внутри рабочего пространства) подаем команду:

```bash
sencha generate theme my-classic-theme
```

Дополнительные действия
-----------------------

Для экономии места каталог `ext` заменяем на ссылку Junction-связь на каталог `c:/sencha/6.2.0`.

Также при необходимости добавляем файл `.gitignore` со следующим содержимым:

```
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
.sencha

sencha-error*.log
*.log
```

RTL
---

Sencha CMD начал генерировать такую строку 
```JSON
"path": "${framework.dir}/build/ext-all-rtl-debug.js"
```
В итоге во многих компонентах `align` по умолчанию выставлен `right`.
С чем это связано не понятно. Так что придется `rtl` убирать пока вручную.
