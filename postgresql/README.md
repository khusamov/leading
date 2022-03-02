Настройка PostgreSQL
====================

Файлы настроек находятся в каталоге
/etc/postgresql/9.1/main

Сама программа находится в каталоге
/var/lib/postgresql/9.1/main 

Чтобы включить удаленный доступ, нужно добавить строку
host    all all 0.0.0.0/0 md5
в файл:

pg_hba.conf
local	all	all	ident
host	all	all	127.0.0.1/32	md5
host	all	all	::1/128		md5
host	all	all	0.0.0.0/0	md5

Также в файле postgresql.conf нужно включить опцию:
listen_addresses = '*'
