

Создаем пакет
==============

Переходим в каталог воркспейса и создаем пакет:

```bash
cd /path/to/workspace
sencha generate package foo
```

В конфиге пакета `.sencha\package\sencha.cfg` прописываем (не понятно зачем, выяснить откуда это взялось):

```ini
package.framework=ext
```

Внимание, если создать пакет с именем `my-package-name`, то его пространство будет `My.package.name`. 
Это следует учитывать при создании классов пакета.

Справка по команде
------------------

```bash
This command generates a new Sencha Cmd Package. A package is in many ways like
an application in that it contains any of the following pieces:

  * JavaScript source
  * SASS styles
  * Arbitrary resources

All of these are integrated by a build process using sencha package build.

For example:

    sencha generate package foo

If this command is run from an application directory, the package will be added
automatically to the requires array in the "app.json" file. To avoid this use
the -require switch:

    sencha generate package -require foo

To use this package in other applications (or packages), you just add the name
of the package to the requires array in the "app.json" or "package.json"
file:

    requires: [
        'foo'
    ]

All packages reside in the "./packages" folder of the workspace (which is
often the same folder as your application).


Options
  * --extend, -e - The theme (package) to extend from (For theme type packages on Ext JS 4.2+ only)
  * --framework, -f - The framework this package will use (i.e., "ext" or "touch")
  * --name, -name - The name of the package to generate
  * --namespace, -names - The namespace of the package to generate
  * --require, -r - Whether to automatically add the generated package to the current app (for non-theme packages only)
  * --theme, -th - The theme (package) this package will use (i.e., "ext-theme-classic", "ext-theme-crisp", "ext-theme-neptune", etc.)
  * --toolkit, -to - The toolkit this theme will use (For theme type packages on Ext JS 6.x+ only)
  * --type, -ty - The type of the package to generate (i.e., "code" or "theme")
    Supported Values:
    * CODE : A library of code
    * EXTENSION : An extension to Sencha Cmd
    * FRAMEWORK : A framework
    * THEME : A user interface theme or skin
    * TEMPLATE : A library of one or more templates
    * TOOLKIT : A library of components / widgets
    * LOCALE : Localization overrides / styling
    * OTHER : Unspecified type


Syntax

    sencha generate package [options] name
```
