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


Команда sencha app init
-----------------------


```bash
cd c:/@repositories/myproject
md mytestapp
cd mytestapp
sencha app init -ext -classic MyTestApp
```

> Команда sencha app init работает при условии, если параметры узла packages
в файле workspace.json являются строками, а не массивами.


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








```
Sencha Cmd v6.5.3.6
sencha app init

This command initializes the current directory as a Sencha Cmd application.

IMPORTANT
Before initializing an application, a Sencha framework or SDK is required. This
can be a trial version or a licensed version such as a commercially licensed
version downloaded from the Sencha Support Portal. The following examples will
assume the desired Sencha frameworks have been downloaded and unzipped in to
the "sencha-sdks" folder in the home directory ("~/sencha-sdks").

To initialize an application using Ext JS 6.5.0, after the zip is extracted as
described above:

    $ sencha app init --frameworks=~/sencha-sdks --ext@6.5.0 --universal MyApp

The frameworks switch specifies a folder where multiple Sencha frameworks
are extracted and ready to use. The ext switch selects the desired version
from this directory.

To initialize an application using only the Classic or Modern toolkit:

    $ sencha app init --frameworks=~/sencha-sdks --ext@6.5.0 --modern MyApp
    $ sencha app init --frameworks=~/sencha-sdks --ext@6.5.0 --classic MyApp

One of --classic, --modern or --universal switches must be specified.

The application will not be ready to run until it is first built:

    sencha app build --dev

See sencha help app build for more information on builds.

To simplify this process going forward, you can configure Sencha Cmd to always
use the frameworks in "~/sencha-sdks" by running this command:

    $ sencha config --prop sencha.sdk.path=~/sencha-sdks --save

Once the above command has been executed, the init command simplifies to:

    $ sencha app init --ext@6.5.0 --universal MyApp

For more information on setting Sencha Cmd switches and other config options,
consult the "Advanced Sencha Cmd" guide on the web:

    http://docs.sencha.com/cmd/guides/advancedcmd/cmdadvanced.html#advancedcmd--cmdadvanced-configurationfiles

Options
  * --ext, -e - The path to the Ext JS framework to use
  * --frameworks, -f - Path to directory with multiple framework versions to restore (if present in workspace.json)
  * --name, -n - The app name
  * --starter-dir, -s - Specifies the directory to use as the starter app template
  * --template-name, -t - Specifies a package name to use as the app template

Syntax

    sencha app init [options] name

```