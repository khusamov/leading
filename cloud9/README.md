Cloud9
Установка IDE на Windows
======================

Clone the repo and run 

install-sdk.sh from git bash

It will download all dependencies from 

https://github.com/cloud9ide/sdk-deps-win32 

(see https://github.com/c9/core/blob/master/scripts/install-sdk.sh#L136) 

and doesn't require visual studio.

Make sure that HOME variable is always the same when installing and launching cloud9.

When HOME is empty cloud9 uses 

process.env.HOME = process.env.HOMEDRIVE + process.env.HOMEPATH; instead 

https://github.com/c9/core/blob/master/settings/standalone.js#L19

=====================
Источник: 
https://github.com/c9/core/issues/205#issuecomment-154317949


Также есть официальная инструкция как сделать IDE в виде приложения
https://cloud9-sdk.readme.io/docs/running-cloud9-desktop

Чтобы не появлялись окна отладки нужно добавить опцию:
Cloud9.exe —no-devtools

Также стоит устранить ошибку (которую возможно уже устранят сами разрабы) 
https://github.com/c9/core/issues/205

