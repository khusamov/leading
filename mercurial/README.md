---
tags: mercurial
---

# Установка Mercurial

Необходимо установить три инструмента:

1) Командная строка Mercurial  
https://www.mercurial-scm.org/downloads  
Любой на выбор:  
Mercurial 4.1 Inno Setup installer - x64 Windows - does not require admin rights  
Mercurial 4.0.2 MSI installer - x64 Windows - requires admin rights  

2) SourceTree (нужен только для hg flow)  
https://www.sourcetreeapp.com/  
Используется только для работы с hg flow в визуальном режиме.  
Внимание, вместо SourceTree можно использовать командную строку hg flow  
https://bitbucket.org/yinwm/hgflow/wiki/UserManual  

3) TortoiseHg (64-bit Windows версия 4.4.2)  
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
















