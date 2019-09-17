Конфигурация NPM
================

Посмотреть конфигурацию

```
npm config list
```

Пример вывода этой команды:

```
; cli configs
metrics-registry = "http://registry.npmjs.org/"
scope = ""
user-agent = "npm/6.11.3 node/v10.15.3 win32 x64"

; userconfig C:\Users\khusa.KHUSAMOV\.npmrc
@eirc:registry = "http://10.53.82.173:4141/"
@sencha:registry = "http://npm.sencha.com/"
allow-same-version = true
init.author.email = "khusamov@yandex.ru"
init.author.name = "Khusamov Sukhrob"
init.author.url = "http://khusamov.ru"
registry = "http://registry.npmjs.org/"
strict-ssl = false

; builtin config undefined
prefix = "C:\\Users\\khusa.KHUSAMOV\\AppData\\Roaming\\npm"

; node bin location = C:\Program Files\nodejs\node.exe
; cwd = D:\REPO\infogorod\repo.mos.ru\eirc_w_pir_client
; HOME = C:\Users\khusa.KHUSAMOV
; "npm config ls -l" to show all defaults.
```

Установить свой репозиторий, чтобы он не мешал основному

```
npm set @eirc:registry http://10.53.82.173:4141/
```

Установить основной репозиторий:

```
npm set registry http://registry.npmjs.org/
```

Ссылки
------

https://docs.npmjs.com/cli/config  
https://docs.npmjs.com/misc/config  
https://docs.npmjs.com/misc/registry.html  
