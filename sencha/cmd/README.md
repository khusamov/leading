
Sencha Cmd
==========

Сначала следует создать рабочее пространство (workspace), а затем уже приложение и/или пакет. 
Пакетов и приложений в рабочем пространстве может быть несколько (от 0 и более).

Подготовка к работе
-------------------

На диске С должна находится папка `sencha` с разными версия фреймворка Sencha Ext JS.

Создание рабочего пространства
------------------------------

Краткая инструкция как создать рабочее пространство.
Создаем папку под рабочее простраство, переходим в нее и подаем команду:

```bash
sencha -sdk c:/sencha/6.0.1 generate workspace ./
```

В каталог рабочего пространства будет скопирован фреймворк Sencha Ext JS.
Чтобы он не занимал лишнее место, нужно вместо него поставить ссылку на `c:/sencha/6.0.1`.

Создание приложения
-------------------

Краткая инструкция как создать приложение.
Внутри папки под рабочего простраства подаем команду:

```bash
sencha -sdk ext generate app -classic MyApp myapp
```

Создание пакета
---------------

Краткая инструкция как создать пакет.
Внутри папки под рабочего простраства подаем команду:

```bash
sencha generate package my-package
```

Дополнительные действия
-----------------------

Для экономии места каталог `ext` заменяем на ссылку Junction-связь на каталог `c:/sencha/6.0.1`.

Также при необходимости добавляем файл `.gitignore` со следующим содержимым:

```
ext
build
temp
packages/remote
node_modules
bower_components

.sass-cache
.sass-cache/*
sencha-error*.log
bootstrap.js
bootstrap.json
bootstrap.css
bootstrap-data.js
bootstrap-files.js
bootstrap-manifest.js
bootstrap-specs.js
bootstrap-modern-data.js
bootstrap-modern-files.js
bootstrap-modern-manifest.js
```
