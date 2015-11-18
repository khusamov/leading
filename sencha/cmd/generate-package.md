

Создаем пакет
==============

Далее переходим в каталог воркспейса и создаем пакет:

```bash
cd /path/to/workspace
sencha generate package foo
```

В конфиге пакета `packages\ПАКЕТ\.sencha\package\sencha.cfg` прописываем:

```ini
package.framework=ext
```

В другом конфиге `package.json` прописываем зависимости от других пакетов:

```javascript
"requires": [
        'ext-easy-button'
]
```
