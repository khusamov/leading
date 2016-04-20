
Sencha Cmd
==========

Сначала следует создать рабочее пространство (workspace), а затем уже приложение и/или пакет. 
Пакетов и приложений в рабочем пространстве может быть несколько (от 0 и более).

Создание приложения
-------------------

Краткая инструкция как создать рабочее пространство и приложение. 
Создаем папку под рабочее простраства, переходим в нее.

```bash
sencha -sdk c:/sencha/6.0.1 generate workspace ./
sencha -sdk ext generate app -classic MyApp myapp
```

Для экономии места каталог `ext` заменяем на ссылку Junction-связь на каталог `c:/sencha/6.0.1`.

Также при необходимости добавляем файл `.gitignore`

```
ext
build
packages/remote
temp
node_modules
bower_components
```

Создание пакета
---------------

Краткая инструкция как создать рабочее пространство и пакет:

```bash
sencha -sdk c:/sencha/6.0.1 generate workspace ./
sencha generate package my-package
```
