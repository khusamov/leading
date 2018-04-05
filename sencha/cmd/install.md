Установка Sencha Cmd
======================

[Скачайте](https://www.sencha.com/products/extjs/cmd-download/) и установите Sencha Cmd 6.5.x for Windows 64-bit.

После установки пропишите в `PATH` путь к Sencha Cmd: `C:/Users/<username>/bin/Sencha/Cmd`.

> Обычно установка Sencha Cmd проходит без проблем, но в некоторых последних версиях возникали проблемы при некоторых условиях.
> Поэтому можно попробовать установить как это задумано производителем и в случае проблем установить в корень диска.

Установка в корень диска
------------------------------------

Во время инсталяции путь установки `C:\Users\<username>\bin\Sencha\Cmd\6.5.2.15` 
следует поменять на `C:\Sencha\Cmd\6.5.2.15`. Здесь `<username>` ваш логин в Windows, `6.5.2.15` просто текущая 
версия Sencha Cmd. Внимание, инсталятор принимает только обратный слеш `\`.

После установки пропишите в `PATH` путь к Sencha Cmd: `C:\Sencha\Cmd`.

> В общем Sencha Cmd следует устанавливать так, чтобы в пути не было русских букв (например 
> пользователь Windows) и чтобы в итоге он был установлен в корне диска.

> Также устанавливать Sencha Cmd в `C:\Program Files` не стоит, так как потом возникают странные проблемы, 
> связанные с тем, что у этой папки административные права доступа.

Установка на Linux
-------------------

```bash
wget http://cdn.sencha.com/cmd/6.0.2/no-jre/SenchaCmd-6.0.2-linux-amd64.sh.zip
unzip SenchaCmd-6.0.2-linux-amd64.sh.zip
chmod +x SenchaCmd-6.0.2.14-linux-amd64.sh
./SenchaCmd-6.0.2.14-linux-amd64.sh
```

После установки файлы `SenchaCmd-6.0.2.14-linux-amd64.sh` и `SenchaCmd-6.0.2-linux-amd64.sh.zip` можно удалить.

```bash
rm SenchaCmd-6.0.2.14-linux-amd64.sh
rm SenchaCmd-6.0.2-linux-amd64.sh.zip
```
