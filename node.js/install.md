Установка Node.js
=================

В Windows можно воспользоваться официальным инсталятором.  
В Linux можно установить:
- из пакета
- посредством NVM

По всей видимости NVM лучше использовать только на сервере разработки. На боевом сервере Node.js лучше устанавливать через YUM.

##  Установка Node.js под Linux (без NVM):

https://nodejs.org/en/download/package-manager/#debian-and-ubuntu-based-linux-distributions-enterprise-linux-fedora-and-snap-packages

https://github.com/nodesource/distributions/blob/master/README.md

## Установка NVM:

```bash
wget -qO- https://raw.githubusercontent.com/creationix/nvm/v0.31.2/install.sh | bash
curl -o- https://raw.githubusercontent.com/creationix/nvm/v0.31.2/install.sh | bash
```

Последнюю версию ссылки можно взять с сайта NVM: https://github.com/creationix/nvm

## Установка NVM под Windows:

Версия NVM под Windows: https://github.com/coreybutler/nvm-windows

## Установка Node.js под Windows:

NVM для Windows не требуется. На официальном сайте Node.js имеется инсталятор, который установит как сам Node.js так и менеджер пакетов NPM.

https://nodejs.org/

## Установка Node.js под Linux:

```bash
nvm install v6.3.0
nvm use v6.3.0
nvm alias default v6.3.0
node -v
```

Чтобы узнать доступные версии Node.js выполните следующую команду:

```
nvm ls-remote
```


