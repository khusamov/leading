---
tags: mercurial
---

# Установка Mercurial

Необходимо установить три инструмента:

1) Командная строка Mercurial  
https://www.mercurial-scm.org/downloads  
Любой на выбор:  
Mercurial Inno Setup installer - x64 Windows - does not require admin rights  
Mercurial MSI installer - x64 Windows - requires admin rights  

2) SourceTree (нужен только для hg flow)  
https://www.sourcetreeapp.com/  
Используется только для работы с hg flow в визуальном режиме.  
Внимание, вместо SourceTree можно использовать командную строку hg flow  
https://bitbucket.org/yinwm/hgflow/wiki/UserManual  

3) TortoiseHg (64-bit Windows)  
https://tortoisehg.bitbucket.io/download/index.html  
Для управления репозиторием в визуальном режиме.  
Инструмент не обязателен к установке, но он более удобен (функционален) чем SourceTree.  



# Справка по Mercurial
Справка по Mercurial 2.5.4  
http://m-haritonov.net/hg/help/ru/  

Справка по настройке конфигурационного файла hgrc:  
https://www.selenic.com/mercurial/hgrc.5.html  

Учебник:  
https://habrahabr.ru/post/108443/  

Шпаргалка по git flow  
http://danielkummer.github.io/git-flow-cheatsheet/index.ru_RU.html  
Методики git flow и hg flow полностью идентичны.  

Вспомогательные команды:  
Если сообщения выводятся на русском языке, то используйте команду `chcp 1251`.  






Настройка `.hg/hgrc`
--------------

```ini
# Пути к репозиториям.
[paths]
default=http://10.53.82.191:8000/w_pir_client

[ui]
# Имя пользователя, которое будет отмечаться в commit-ах.
username = Svyatoslav Khusamov <khusamovsa@it.mos.ru>

# Автоввод паролей
[auth]
default.prefix = hg.eirc.mos.ru/w_pir_client
default.schemes = http
default.username = khusamovsa
default.password = ********
```

Более подробно о настройке см. 
https://www.selenic.com/mercurial/hgrc.5.html




## Работа по hg flow

В ветке default у нас хранится все продакшн версия продукта. Коммитить в нее нельзя. 
Поэтому следите, чтобы эта ветка не была текущей, чтобы случайно в нее не закоммитить.

В ветке develop у нас хранится версия продукта в разработке. Коммитить в нее нежелательно. 

В потоке веток feature у нас хранятся разработки новых функций.
Имена веток в этом потоке следует создавать по формату 
`feature/<номер ФТ>[/<имя метода АПИ или название подзадачи>]`.
Например `feature/055/SendNotificationsList` (расшифровывается как: фича по ФТ.055 реализация 
вызова метода сервера SendNotificationsList).
Например `feature/055/SearchBankByBIC` (расшифровывается как: фича по ФТ.055 поиск банка по БИК).

В потоке веток release у нас хранятся выпуски релизов. В формате
`release/X.Y.Z`, где X.Y.Z номер версии релиза.

В потоке веток hotfix у нас хранятся выпуски хотфиксов. В формате
`hotfix/X.Y.Z`, где X.Y.Z номер версии хотфикса.












