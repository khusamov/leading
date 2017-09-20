# Mercurial
Справка по Mercurial 2.5.4 
http://m-haritonov.net/hg/help/ru/

Вспомогательные команды:  
Если сообщения выводятся на русском языке, то используйте команду `chcp 1251`.  

Установка mercurial 
--------------------

https://www.mercurial-scm.org/downloads

Любой на выбор:  
Mercurial 4.1 Inno Setup installer - x64 Windows - does not require admin rights  
Mercurial 4.0.2 MSI installer - x64 Windows - requires admin rights  

Автоввод пароля
--------------

Чтобы не вводить пароль в файле `.hg/hgrc` следует прописать коды доступа:

```ini
[auth]
repo.prefix = http://<domain>/<repo>
repo.username = <username>
repo.password = <password>
```
