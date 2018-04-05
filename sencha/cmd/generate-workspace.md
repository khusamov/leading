
Создание рабочего пространства
=============================

В создание рабочего пространства входит:
- создание файла `workspace.json`,
- создание NPM-пакета,
- создание ссылки на фреймворк,
- добавить ignore-файл.

Ссылки
-------
  
[Пример файла `.gitignore`](gitignore.md)  
[Пример файла `.hgignore`](hgignore.md)  


Создание файла `workspace.json`
----------------------------

Общий синтаксис команды выглядит следующим образом:


```bash
sencha -sdk /path/to/ext-n.n.n generate workspace /path/to/workspace
```

Например, рабочее пространство создать в текущей директории можно так:

```bash
sencha -sdk C:/Sencha/SDK/ext-6.2.0 generate workspace ./
sencha -sdk C:/Sencha/SDK/ext-6.5.3.57 generate workspace ./
```

> Внимание! Во время этой операции Sencha Cmd скопирует Sencha ExtJS SDK 
> в директорию `ext` рабочего пространства.

Пример создания рабочего пространства без копирования SDK (такой вариант более 
предпочтителен, но раздел `frameworks` придется заполнить самостоятельно):

```bash
sencha generate workspace .
```




Создание NPM-пакета
-------------------

Превратите рабочее пространство в NPM-пакет

```bash
npm init
```



Ссылка на фреймворк из рабочего пространства
--------------------------------------------

Есть три варианта:
- посредством NPM,
- при помощи симлинка (устарел, приводится для справки),
- при помощи ссылки из файла `workspace.json` (устарел, приводится для справки).

Если в рабочем пространстве скопирован фреймворк, то удалите его:

```bash
rmdir /S /Q ext
```

Ссылка на фреймворк из рабочего пространства (посредством NPM)
--------------------------------------------

Установите зависимость с фреймворком.

```bash
npm install --save C:/Sencha/SDK/module/ext-6.2.0
npm install --save C:/Sencha/SDK/module/ext-6.5.3.57
```

> Внимание, если вы будете устанавливать из директории, то будет проставлен симлинк, 
> что весьма удобно, т.к. экономится место на диске. Но учтите, что ссылки будут относительными.


#### Зависимость с фреймворком, расположенном в bitbucket.org

```bash
npm install git+ssh://git@bitbucket.org:infogorod/sencha-extjs-6.5.3.57 --save-dev
```

```json
{
  "frameworks": {
    "ext": {
      "path": "node_modules/infogorod-sencha-extjs-6.5.3.57",
      "version": "6.5.3.57"
    }
  }
}
```

#### Настройки файла `workspace.json`

В файле `workspace.json` пропишите ссылку на модуль:

```json
{
  "frameworks": {
    "ext": {
      "path": "node_modules/infogorod-sencha-extjs",
      "version": "<Номер версии ExtJS>"
    }
  }
}
```

Здесь `<Номер версии ExtJS>` замените на соответствующую версию: `6.2.0` или `6.5.3.57`.

Файл `workspace.json` должен стать примерно с таким содержанием:

```json
{
    "apps": [],
    "frameworks": {
        "ext": {
            "path": "node_modules/infogorod-sencha-extjs",
            "version": "6.5.3.57"
        }
    },
    "build": {
        "dir": "${workspace.dir}/build"
    },
    "packages": {
        "dir": [
			"${workspace.dir}/packages/local",
			"${workspace.dir}/packages"
		],
        "extract": [
			"${workspace.dir}/packages/remote"
		]
    }
}
```

Ссылка на фреймворк из рабочего пространства (при помощи симлинка)
--------------------------------------------

В каталог рабочего пространства будет скопирован фреймворк Sencha Ext JS.
Чтобы он не занимал лишнее место, нужно заменить каталог `ext` симлинком на `c:/sencha/6.2.0`:

```bash
rmdir /S /Q ext
mklink /j ext "C:/Sencha/SDK/ext-6.2.0"
mklink /j ext "C:/Sencha/SDK/ext-6.5.3.57"
```

Ссылка на фреймворк из рабочего пространства (при помощи ссылки из файла `workspace.json`)
--------------------------------------------

Как вариант, можно вместо создания симлинка прописать ссылку в `workspace.json`. 
Но это вариант плох тем, потому что при запуске sencha app watch доступ через браузер к файлам фреймворка будет невозможен.
Поэтому этот вариант на будущее, возможно Cmd позже исправят:

```json
"frameworks": {
    "ext": {
        "path": "C:/Sencha/SDK/6.2.0",
        "version": "6.2.0.981"
    }
},
```




Справка по команде
---------------

```bash
Sencha Cmd v6.5.3.6
sencha generate workspace

This command generates a workspace for managing shared code across pages or
applications.


Options
  * --force, -fo - Forces re-extraction of framework into workspace.
  * --full, -fu - Enables full mode, which includes the .sencha folder.
  * --minimal, -mi - Enables minimal mode (no .sencha folder).
  * --path, -pa - Sets the target path for the workspace

Syntax

    sencha generate workspace [options] [path]
```


Особенности
-----------

Без воркспейса создать пакет нельзя (This command must be executed in a valid app or workspace directory).

Во время этой операции Sencha Cmd скопирует Sencha ExtJS SDK в директорию `ext` рабочего пространства.