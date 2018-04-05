Как создать приложение в Sencha Cmd?
=======================

После создания воркспейса, находясь в папке воркспейса, подаем такую команду:

```bash
sencha -sdk ext generate app -classic MyApp myapp
```

Здесь `-sdk ext` это указание расположения библиотеки Ext JS.  
Опция `-classic` указывает что нужно создать классическое приложение, рассчитанное под обычные мониторы.  
Имя `MyApp` это имя приложения (имя пространства имен).  
Путь `myapp` это имя каталога, где будет размещено приложение.  

Вместо `-classic` можно задать `-modern` или ничего не указывать для создания универсального приложения.

Вместо `-sdk ext` можно задать `-ext` после `generate app` чтобы библиотека была скачана из Интернета, например так:

```bash
sencha generate app -ext -classic MyAppName ./MyAppPath
```



Справка по команде
------------------

```bash
Sencha Cmd v6.5.3.6
sencha generate app

This command generates an empty application given a name and target folder.

The application can be extended using other sencha generate commands (e.g.,
sencha generate model).

Other application actions are provided in the sencha app category (e.g.,
sencha app build).

Sencha Cmd can also automatically download and extract a framework by
specifying the name of the framework as an argument:

    sencha generate app -ext MyAppName ./MyAppPath

This will generate an application using the newest version available
for the specified framework.

For Ext JS 6, by default, this application will be a Universal Application.
To override this and select a particular toolkit, you can use either of
these variations:

    sencha generate app -ext -classic MyAppName ./MyAppPath
    sencha generate app -ext -modern MyAppName ./MyAppPath


Options
  * --controller-name, -c - The name of the default Controller
  * --library, -l - the pre-built library to use (core or all). Default: core
  * --name, -n - The name of the application to generate
  * --path, -p - The path for the generated application
  * --refresh, -r - Set to false to skip the "app refresh" of the generated app
  * --starter, -s - Overrides the default Starter App template directory
  * --template, -te - The name of the template to use
  * --theme-name, -th - The name of the default Theme
  * --view-name, -v - The name of the default View

Syntax

    sencha generate app [options] name \
                                  path
```