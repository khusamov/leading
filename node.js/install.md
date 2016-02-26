Установка Node.js
=================

В Windows можно воспользоваться официальным инсталятором.  
В Linux удобнее устанавливать посредством NVM.

## Установка NVM:

```bash
wget -qO- https://raw.githubusercontent.com/creationix/nvm/v0.29.0/install.sh | bash
curl -o- https://raw.githubusercontent.com/creationix/nvm/v0.29.0/install.sh | bash
```

Последнюю версию ссылки можно взять с сайта NVM: https://github.com/creationix/nvm

## Установка NVM под Windows:

Версия NVM под Windows: https://github.com/coreybutler/nvm-windows

## Установка Node.js под Windows:

NVM для Windows не требуется. На официальном сайте Node.js имеется инсталятор, который установит как сам Node.js так и менеджер пакетов NPM.

https://nodejs.org/

## Установка Node.js под Linux:

```bash
nvm ls-remote
nvm install v5.0.0
nvm use v5.0.0
nvm alias default v5.0.0
node -v
```
