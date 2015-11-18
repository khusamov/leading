Инсталяция jsduck на Windows
============================

Подготовительные действия
-------------------------

1. Скачать и установить Руби http://rubyinstaller.org/downloads/
2. Скачать и распаковать DEVELOPMENT KIT http://rubyinstaller.org/downloads/
3. Установить DEVELOPMENT KIT командами:
```bash
cd path/to/DEVELOPMENT KIT
ruby dk.rb init 
ruby dk.rb install
```
Подробности об установке DEVELOPMENT KIT см. на стр. https://github.com/oneclick/rubyinstaller/wiki/Development-Kit

Установка
----------

Установить jsduck командой:
```bash
gem install jsduck
```
Подробности об установке https://github.com/senchalabs/jsduck

Простая установка
-----------------
Скачать и запустить файл `jsduck-6.0.0-beta.exe` https://github.com/senchalabs/jsduck/releases
Это пока не сработало. Возможно это не инсталятор, а сам дюк, просто его нужно куда-то сохранить и прописать в PATH.

Как использовать?
-----------------

Небольшое описание на русском: http://habrahabr.ru/post/214591/  
Официальная справка: https://github.com/senchalabs/jsduck/wiki
