
Быстрый старт Sencha Cmd + ExtJS (classic only)
============================================

Данное руководство поможет быстро создать окружение для ExtJS-разработки и запустить тестовое ExtJS-приложение
с использованием Classic Toolkit.

Для этого вам необходимо:
- Установить Sencha Cmd
- Установить фреймворк Sencha ExtJS SDK
- Создать рабочее пространство (workspace)
- Создать тестовое ExtJS-приложение

Установка Sencha Cmd
--------------------

[Скачайте](https://www.sencha.com/products/extjs/cmd-download/) и установите Sencha Cmd 6.5.x for Windows 64-bit.

После установки пропишите в `PATH` путь к Sencha Cmd: `C:/Users/<username>/bin/Sencha/Cmd`.

> Обычно установка Sencha Cmd проходит без проблем, но в некоторых последних версиях возникали проблемы при некоторых условиях.
> Поэтому можно попробовать установить как это задумано производителем и в случае проблем установить в корень диска.
> Как правильно установить в корень диска читайте в статье [Установка Sencha Cmd](install.md).

Фреймворк Sencha ExtJS SDK
---------------------

[Скачайте](https://github.com/khusamov/sencha-extjs/releases/tag/6.2.0)
и разместите фреймворк Sencha ExtJS на диске. 
Дальше на него будем ссылаться (симлинками) из всех проектов,
чтобы не плодить его в бесчисленном количестве, т.к. он занимает довольно много места.

В примерах предполагается, что фреймворк скопирован в директорию `C:/Sencha/SDK/ext-6.2.0`.

Настройка Sencha Cmd
--------------------

Здесь и далее предполагается, что фреймворки разных версий вы будете хранить в директории `C:/Sencha/SDK`.
Sencha Cmd следует настроить для работы с этим местоположением SDK:

```bash
sencha config --prop sencha.sdk.path=C:/Sencha/SDK --save
```

Подготовка рабочего пространства (workspace)
----------------------------------------------

Создайте папку для работы над проектом, например:
`c:/@repositories/myproject`. Здесь `myproject` имя вашего проекта.

Далее создайте в ней рабочее пространство:

```
cd c:/@repositories/myproject
sencha -sdk C:/Sencha/SDK/ext-6.2.0 generate workspace ./
```

В каталог рабочего пространства будет скопирован фреймворк `Sencha Ext JS`. 
Чтобы он не занимал лишнее место, нужно вместо него поставить ссылку на `C:/Sencha/SDK/ext-6.2.0`.
Это можно сделать при помощи следующих команд:

```
rmdir /S /Q ext
mklink /j ext "C:/Sencha/SDK/ext-6.2.0"
```

> Внимание, внутри рабочего пространства (в именах файлов и директорий) нельзя использовать символы @ и '.'.

Тестовое ExtJS-приложение
--------------------------------------

Внутри директории рабочего пространства подаем команду:

```
cd c:/@repositories/myproject
sencha -sdk ext generate app -classic MyApp myapp
```

Здесь `MyApp` имя пространства классов вашего будущего приложения и должно соответствовать PascalCase-стилю. 
Приложение будет располагаться в директории `myapp` (она будет создана командой).

Запуск приложения
-----------------

Болванка приложения готова. Ее можно сразу же запустить.

```
cd c:/@repositories/myproject/myapp
sencha app watch
```

В листинге команды найдите адрес (http://localhost:1841) и зайти на него через браузер. 
Откроется красивое приложение о сотрудниках компании.

> Внимание, приложением мы сделали КЛАССИК и по умолчанию именно такой тип приложения следует делать.
> Соответственно документацию читать только для classic.

Немного о команде sencha app watch
----------------------------------

Команда `sencha app watch` позволяет запустить веб-сервер для вашего приложения.
Причем будут отслеживаться изменения в файлах. Достаточно изменить файл, а затем в браузере обновить
приложение и изменения тут же вступят в силу.

Ссылки
------

Данное руководство сделано на основе
[Быстрого Старта от Sencha](http://docs.sencha.com/extjs/latest/guides/getting_started/getting_started.html)
но с ориентацией на Classic Toolkit. Руководство Быстрого Старта от Sencha ориентировано 
на приложения Modern Toolkit и потому пользы от него мало.

Общая концепция фреймворка тут http://docs.sencha.com/extjs/

Документация: http://docs.sencha.com/extjs/latest/classic/Ext.html
В поиске обязательно отключить букву M, чтобы искать только по классам из classic.

В болванке приложения можно опробировать примеры расположенные по ссылке:
http://examples.sencha.com/extjs/latest/examples/

Основные идеи фреймворка:  
http://docs.sencha.com/extjs/latest/guides/core_concepts/classes.html  
http://docs.sencha.com/extjs/latest/guides/core_concepts/layouts.html  
http://docs.sencha.com/extjs/latest/guides/core_concepts/components.html  
http://docs.sencha.com/extjs/latest/guides/core_concepts/data_package.html  
http://docs.sencha.com/extjs/latest/guides/application_architecture/application_architecture.html  
http://docs.sencha.com/extjs/latest/guides/application_architecture/view_controllers.html  
http://docs.sencha.com/extjs/latest/guides/application_architecture/view_models_data_binding.html  
http://docs.sencha.com/extjs/latest/guides/application_architecture/view_model_internals.html  


Новая серия уроков от Сенчи (ориентирована на Modern):  
https://www.sencha.com/blog/ext-js-from-scratch-part-1/   
https://www.sencha.com/blog/ext-js-from-scratch-part-2/  

