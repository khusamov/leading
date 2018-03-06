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

2) TortoiseHg (64-bit Windows)  
https://tortoisehg.bitbucket.io/download/index.html  
Для управления репозиторием в визуальном режиме.  
Инструмент не обязателен к установке, но он более удобен (функционален) чем SourceTree.  

3) hg flow  
Можно установить один инструмент на выбор: SourceTree или yujiewu/hgflow:  

3.1) SourceTree (нужен только для hg flow)  
https://www.sourcetreeapp.com/  
Используется только для работы с hg flow в визуальном режиме.  

3.2) Внимание, вместо SourceTree можно использовать командную строку hg flow  
https://bitbucket.org/yujiewu/hgflow/wiki/Home (свежий, есть коммиты от 2017 г.)  
https://bitbucket.org/yinwm/hgflow/wiki/UserManual (заброшенный похоже и есть проблемы с установкой)  


# Справка по Mercurial
Справка по Mercurial 2.5.4  
http://m-haritonov.net/hg/help/ru/  
https://hgbook.bacher09.org/html-single/  

Справка по настройке конфигурационного файла hgrc:  
https://www.selenic.com/mercurial/hgrc.5.html  

Учебник:  
https://habrahabr.ru/post/108443/  

Справка по tortoisehg:  
http://tortoisehg.readthedocs.io/en/latest/index.html  

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
default=http://111.111.111.111:3000/w_pir_client

# Автоввод паролей
[auth]
default.prefix = 111.111.111.111:3000/w_pir_client
default.schemes = http
default.username = khusamovsa
default.password = ********
```

Более подробно о настройке см. 
https://www.selenic.com/mercurial/hgrc.5.html

Настройка `C:/Users/<Ваш логин Windows>/mercurial.ini`
------------------------------------------------------

```ini
[tortoisehg]
vdiff = tortoisemerge
ui.language = en

[ui]
merge = tortoisemerge
# Имя пользователя, которое будет отмечаться в commit-ах.
username = Khusamov Svyatoslav <khusamovsa@it.mos.ru>
ignore=
```


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




## Оформление коммитов

Каждый коммит следует оформлять следующим образом

Дефекты  
`Д<номер дефекта из АЛМ> <Описание что сделано>`

Например  
```
Д5487 Исправлено не корректное отображение доли на вкладках Приказы и Иски
```

Если было несколько коммитов по одному дефекту, то например можно так оформить:  
```
Д5468 Добавлена процедура сброса комбобоксов для формы Формирование заявления в суд  
Д5468 Убраны автозагрузки хранилищ для комбобоксов  
```

Функциональные требования  
`ФТ.<Номер требования> <Описание что сделано>`

Например  
```
ФТ.055 Сделана фильтрация по статусам для вкладок Запросы в ИФНС и банки  
```






