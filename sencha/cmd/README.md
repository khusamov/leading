
Sencha Cmd
==========

Сначала следует создать рабочее пространство (workspace), а затем уже приложение и/или пакет. 
Пакетов и приложений в рабочем пространстве может быть несколько (от 0 и более).

Создание приложения
-------------------

Краткая инструкция как создать рабочее пространство и приложение. 
Создаем папку под рабочее простраство, переходим в нее и подаем команды:

```bash
sencha -sdk c:/sencha/6.0.1 generate workspace ./
sencha -sdk ext generate app -classic MyApp myapp
```

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

Создание пакета
---------------

Краткая инструкция как создать рабочее пространство и пакет:

```bash
sencha -sdk c:/sencha/6.0.1 generate workspace ./
sencha generate package my-package
```
