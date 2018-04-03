
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

После установки пропишите в `PATH` путь к Sencha Cmd: `C:\Users\<username>\bin\Sencha\Cmd`.

> Обычно установка Sencha Cmd проходит без проблем, но в некоторых последних версиях возникали проблемы при некоторых условиях.
> Поэтому можно попробовать установить как это задумано производителем и в случае проблем установить в корень диска.

Установка Sencha Cmd в корень диска
------------------------------------

Во время инсталяции путь установки `C:\Users\<username>\bin\Sencha\Cmd\6.5.2.15` 
следует поменять на `C:\SenchaCmd\6.5.2.15`. Здесь `<username>` ваш логин в Windows, `6.5.2.15` просто текущая 
версия Sencha Cmd. 

После установки пропишите в `PATH` путь к Sencha Cmd: `C:\SenchaCmd`.

> В общем Sencha Cmd следует устанавливать так, чтобы в пути не было русских букв (например 
> пользователь Windows) и чтобы в итоге он был установлен в корне диска.

> Также устанавливать Sencha Cmd в `C:\Program Files` не стоит, так как потом возникают странные проблемы, 
> связанные с тем, что у папки `C:\Program Files` административные права доступа.

Фреймворк Sencha ExtJS SDK
---------------------

[Скачайте](https://github.com/khusamov/sencha-extjs/releases/tag/6.2.0)
и разместите фреймворк Sencha ExtJS на диске. 
Дальше на него будем ссылаться (симлинками) из всех проектов,
чтобы не плодить его в бесчисленном количестве, т.к. он занимает довольно много места.

В примерах предполагается, что фреймворк скопирован в директорию `c:/sencha-sdk/ext-6.2.0`.

Настройка Sencha Cmd
--------------------

Здесь и далее предполагается, что фреймворки разных версий вы будете хранить в директории `c:/sencha-sdk`.
Sencha Cmd следует настроить для работы с этим местоположением SDK:

```bash
sencha config --prop sencha.sdk.path=c:/sencha-sdk --save
```

Подготовка рабочего пространства (workspace)
----------------------------------------------

Создайте папку для работы над проектом, например:
`c:/@repositories/myproject`. Здесь `myproject` имя вашего проекта.

Далее создайте в ней рабочее пространство:

```
cd c:/@repositories/myproject
sencha -sdk c:/sencha-sdk/ext-6.2.0 generate workspace ./
```

В каталог рабочего пространства будет скопирован фреймворк `Sencha Ext JS`. 
Чтобы он не занимал лишнее место, нужно вместо него поставить ссылку на `c:/sencha-sdk/ext-6.2.0`.
Это можно сделать при помощи следующих команд:

```
rmdir /S /Q ext
mklink /j ext "c:/sencha-sdk/ext-6.2.0"
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

Ссылки
------

http://docs.sencha.com/extjs/6.2.0/guides/core_concepts/classes.html  
http://docs.sencha.com/extjs/6.2.0/guides/core_concepts/layouts.html  
http://docs.sencha.com/extjs/6.2.0/guides/core_concepts/components.html  
http://docs.sencha.com/extjs/6.2.0/guides/core_concepts/data_package.html  
http://docs.sencha.com/extjs/6.2.0/guides/application_architecture/application_architecture.html  
http://docs.sencha.com/extjs/6.2.0/guides/application_architecture/view_controllers.html  
http://docs.sencha.com/extjs/6.2.0/guides/application_architecture/view_models_data_binding.html  
http://docs.sencha.com/extjs/6.2.0/guides/application_architecture/view_model_internals.html  

Документация: http://docs.sencha.com/extjs/6.2.0/classic/Ext.html
В поиске обязательно отключить букву M, чтобы искать только по классам из classic.

В болванке приложения можно опробировать примеры расположенные по ссылке:
http://examples.sencha.com/extjs/6.2.0/examples/

Общая концепция фреймворка тут http://docs.sencha.com/extjs/6.2.0/guides/getting_started/getting_started.html

Быстрый старт от Сенчи тут (http://docs.sencha.com/extjs/6.2.0/guides/quick_start/introduction.html), но он ориентирован на приложения Modern. Потому пользы от него мало.

Новая серия уроков от Сенчи https://www.sencha.com/blog/ext-js-from-scratch-part-1/, также ориентирована на Modern.
