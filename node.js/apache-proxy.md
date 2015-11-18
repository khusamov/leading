Настройка прокси в Apache
=========================

Для Apache нужно включить следующие расширения: mod_rewrite, mod_proxy и mod_proxy_http.
Это можно сделать следующей командой:

```bash
a2enmod mod_rewrite mod_proxy mod_proxy_http
```

Настройка виртуального хоста
----------------------------

```htaccess
<VirtualHost *:80>
	ProxyPass / http://localhost:1501/
	ProxyPreserveHost On
</VirtualHost>
```

После настройки не забудьте перезагрузить Apache.

Опция ProxyPreserveHost
-----------------------

При проксировании сервер подменяет параметр host в заголовке запросов 
на хост из опции `ProxyPass`, при этом копирует прежний host 
в параметр `X-Forwarded-Server`.

При этом на некоторых движках (сайтах) может неправильно работать `redirect` 
подставляя локальный адрес внутреннего сервера, когда нужен внешний. 
Для решения этой проблемы нужно включить опцию `ProxyPreserveHost`, 
тогда сервер будет оставлять реальный `host` который пришел на текущий сервер.

Пример для FirstVDS.ru
----------------------

```htaccess
#user 'setupokna' virtual host 'calc.setup-okna.fvds.ru' configuration file
<VirtualHost 62.109.4.155:80>
	ServerName calc.setup-okna.fvds.ru
	AddDefaultCharset UTF-8
	AssignUserID setupokna setupokna
	DirectoryIndex index.html index.php
	DocumentRoot /var/www/setupokna/data/www/calc.setup-okna.fvds.ru
	ServerAdmin webmaster@calc.setup-okna.fvds.ru
	CustomLog /dev/null combined
	ErrorLog /dev/null
	ServerAlias www.calc.setup-okna.fvds.ru xn--80atbd9f.xn--p1ai
	
	# Наши вставки
	ProxyPass / http://localhost:1501/
	ProxyPreserveHost On


</VirtualHost>
<Directory /var/www/setupokna/data/www/calc.setup-okna.fvds.ru>
	Options +Includes -ExecCGI
</Directory>
```

Вариант настройки прокси посредством .htaccess
----------------------------------------------

```htaccess
ProxyRequests On
ProxyPass / http://localhost:1501/
ProxyPreserveHost On
```

Ссылки
----------

http://www.tech-notes.net/proxypass-requests-with-apache/  
http://www.py-my.ru/post/4bfb3c691d41c846bc00001f
