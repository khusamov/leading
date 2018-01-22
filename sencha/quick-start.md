
Быстрый старт Sencha Cmd + ExtJS (classic)
============================================

Установить Sencha Cmd
---------------

Обычно установка Sencha Cmd проходит без проблем, но в некоторых последних версиях возникали проблемы при некоторых условиях.
Поэтому можно попробовать установить как это задумано производителем и в случае проблем установить по следующей инструкции:

---

Скачайте дистрибутив Sencha Cmd 6.5.x for Windows 64-bit.
https://www.sencha.com/products/extjs/cmd-download/

Sencha Cmd следует устанавливать так, чтобы в пути не было русских букв (например пользователь Windows).

Устанавливать Sencha Cmd в C:\Program Files не стоит, так как потом возникают странные проблемы, 
связанные с тем, что у папки C:\Program Files административные права доступа.

При установке путь установки C:\Users\<username>\bin\Sencha\Cmd\6.5.2.15 следует поменять 
на C:\SenchaCmd\6.5.2.15. Это следует сделать в том случае, если у вас <username> содержит русские буквы.

После установки пропишите в PATH путь к Sencha Cmd: C:\SenchaCmd или C:\Users\<username>\bin\Sencha\Cmd 
(в зависимости от того, куда установили).

---

Фреймворк Sencha ExtJS
---------------------

Скопировать фреймворк и разместить его на диске. Дальше на него будем ссылаться (симлинками) из всех проектов.
Чтобы не плодить его в бесчисленном количестве, т.к. он занимает довольно много места.

```
https://github.com/khusamov/sencha-extjs/releases/tag/6.2.0
```

В примерах предполагается, что фреймворк скопирован в директорию `c:/sencha/6.2.0`.

Подготовка репозитория для своего проекта
--------------------------------------

Создать репозиторий для работы над проектом, например:
`c:/@repositories/myproject`.

Здесь `myproject` имя вашего проекта.

Далее следует создать рабочее пространство в проекте:

```
cd c:/@repositories/myproject
sencha -sdk c:/sencha/6.2.0 generate workspace ./
```

Внимание, в именах каталогов нельзя использовать символ @ (в каталогах внутри рабочего пространства). С ним будут проблемы.

В каталог рабочего пространства будет скопирован фреймворк `Sencha Ext JS`. Чтобы он не занимал лишнее место, нужно вместо него поставить ссылку на `c:/sencha/6.2.0`.

```
rmdir /S /Q ext
mklink /j ext "c:/sencha/6.2.0"
```

Внутри папки под рабочего пространства подаем команду:

```
cd c:/@repositories/myproject
sencha -sdk ext generate app -classic MyApp myapp
```

Здесь `MyApp` имя пространства классов вашего будущего приложения и должно соответствовать PascalCase-стилю. 
Приложение будет располагаться в директории `myapp` (она будет создана командой).

Тестовый запуск
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
