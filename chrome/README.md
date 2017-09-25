# Расширение на основе Sencha ExtJS

Чтобы создавать расширения на основе Sencha ExtJS необходимо решить проблему безопасности 
внедренного JavaScript-кода в HTML-файле index.html, который генерируется Sencha Cmd.

Тут есть особенность, в расширениях строго с безопасностью и просто так внедрять скрипты в HTML код нельзя. 
Требуется подписывать их при помощи SHA.

Остается два вариант:  
либо действительно подписывать микрозагрузчик bootstrap.js (который как раз и внедрен в код по умолчанию)  
либо не внедрять его в код.  

В Sencha Cmd (точнее в настройках приложения app.json) есть опция, 
которая отменяет внедрение микрозагрузчика в код HTML (в файл index.html). 
Она прописывается как microloader.embed = false в разделе output следующим образом:

```json
"output": {
    "base": "${workspace.build.dir}/${build.environment}/${app.name}",
    "appCache": {
        "enable": false
    },
    "microloader": {
        "embed": false
    }
},
```

Этот вариант пока не работает:

```json5
"bootstrap": {
    "base": "${app.dir}",
    
    "microloader": "bootstrap.js",
    // "microloader": {
    //     "path": "bootstrap.js",
    //     "embed": false,
    //     "enable": true
    // },
    "css": "bootstrap.css"
},
```

manifest.json
--------------

В файл манифеста расширения следует вписать строку
`"content_security_policy": "script-src 'self' 'unsafe-eval'; object-src 'self'"`.

```json
{
	"name": "Просмотрщик текста запросов",
	"version": "1.1.0",
	"manifest_version": 2,
	"description": "Просмотр текста запросов, отправляемых с текущей страницы.",
	"devtools_page": "devtools.html",
	"content_security_policy": "script-src 'self' 'unsafe-eval'; object-src 'self'"
}
```
