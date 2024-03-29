
Шпаргалка по Sencha Cmd
=======================

Данное руководство содержит краткие подсказки как создавать основные сущности проекта: 
рабочее пространство, приложение, пакет, тему.
А также как исправить некоторые ошибки и содержимое ignore-файлов.

- [Шпаргалка по Sencha Cmd](#Шпаргалка-по-Sencha-Cmd)
	- [Подготовка Sencha Cmd и SDK к работе](#Подготовка-Sencha-Cmd-и-SDK-к-работе)
	- [Создание рабочего пространства](#Создание-рабочего-пространства)
	- [Создание NPM-пакета](#Создание-NPM-пакета)
	- [Ссылка на фреймворк](#Ссылка-на-фреймворк)
	- [Настройки файла `workspace.json`](#Настройки-файла-workspacejson)
	- [Создание приложения `sencha generate app -ext -classic`](#Создание-приложения-sencha-generate-app--ext--classic)
	- [Настройка `package.json`](#Настройка-packagejson)
	- [Создание пакета или темы](#Создание-пакета-или-темы)
	- [Подготовка приложения](#Подготовка-приложения)
	- [Ссылки](#Ссылки)



Подготовка Sencha Cmd и SDK к работе
-------------------

В процессе подготовки у вас на диске должна образоваться такая структура директорий:

Sencha Cmd -> `C:/Sencha/Cmd`  
SDK -> `C:/Sencha/SDK`  
NPM modules -> `C:/Sencha/SDK/module`  

Например дистрибутив 6.5.3.57 должен расположиться по адресу: `C:/Sencha/SDK/ext-6.5.3.57`.
Здесь NPM modules это специально подготовленные SDK в виде NPM-модулей. 
Как это сделать будет описано в отдельной статье.

Здесь и далее предполагается, что фреймворки разных версий вы будете хранить в директории `C:/Sencha/SDK`.
Sencha Cmd следует настроить для работы с этим местоположением SDK:

```bash
sencha config --prop sencha.sdk.path=C:/Sencha/SDK --save
```

Создание рабочего пространства
------------------------------

В создание рабочего пространства входит:
- создание файла `workspace.json`,
- создание NPM-пакета,
- создание ссылки на фреймворк,
- добавить ignore-файл.

Создаем директорию под рабочее пространство, переходим в нее и подаем команду:

```bash
sencha workspace init
```

Добавьте ignore-файл: [`.gitignore`](gitignore.md) или [`.hgignore`](hgignore.md).


Создание NPM-пакета
-------------------

Превратите рабочее пространство в NPM-пакет:

```bash
npm init
```



Ссылка на фреймворк
--------------------------------------------

Установите зависимость с фреймворком:

```bash
npm install --save-dev git+ssh://git@bitbucket.org:infogorod/sencha-extjs-6.5.3.57
```

> Внимание, репозитории `git@bitbucket.org:infogorod/sencha-extjs*` являются
> приватными. Для доступа к ним, [сгенерируйте ключ](../git/ssh-keys.md) 
> и отправьте на khusamovsa@it.mos.ru с обоснованием доступа.



Настройки файла `workspace.json`
--------------------------------

В файле `workspace.json` пропишите ссылку на модуль.
В итоге этот файл должен стать примерно с таким содержанием:

```json
{
  "apps": [],
  "frameworks": {
    "ext": {
      "path": "node_modules/infogorod-sencha-extjs-6.5.3.57",
      "version": "6.5.3.57"
    }
  },
  "build": {
    "dir": "${workspace.dir}/build"
  },
  "packages": {
    "dir": [
      "${workspace.dir}/packages/local"
    ],
    "extract": [
      "${workspace.dir}/packages/remote"
    ]
  }
}
```


Создание приложения `sencha generate app -ext -classic`
-------------------------------------------------------

Внутри директрии рабочего пространства подаем команду:

```bash
sencha generate app -ext -classic MyAppName myapp/path
```

Внимание, есть возможность группировать приложения в разных папках. Иными словами можно создавать приложения следующим образом:

```bash
sencha generate app -ext -classic MyApp1 folder1/myapp1
sencha generate app -ext -classic MyApp2 folder1/myapp2
sencha generate app -ext -classic MyApp3 folder2/myapp3
```





Настройка `package.json`
------------------------

Добавьте в раздел `scripts` строку запуска и сборки приложения:

```json
{
  "scripts": {
    "start": "cd myapp/path && sencha app watch",
    "start:fashion": "cd myapp/path && sencha app watch --fashion",
    "build": "cd myapp/path && sencha app build"
  }
}
```

Опция `--fashion` позволяет менять стили без перезагрузки браузера.



Создание пакета или темы
-------------------------

Пакет и тема создаются весьма просто.
Внутри директрии рабочего пространства подаем команду:

```bash
sencha generate package my-package
sencha generate theme my-theme
```


Подготовка приложения
---------------------

После того, как у вас создано приложение, можно произвести небольшие изменения, которые скорее всего потребуются.
Эти небольшие изменения описаны в статье [Подготовка приложения](prepare-app.md).




Ссылки
-------

[Официальная справка по Sencha Cmd 6.5.3](http://docs.sencha.com/cmd/6.5.3/)
[Установка Sencha Cmd](install.md).  
[Создание рабочего пространства](generate-workspace.md).  
[Пример файла `.gitignore`](gitignore.md)  
[Пример файла `.hgignore`](hgignore.md)  
[Подготовка приложения](prepare-app.md)  