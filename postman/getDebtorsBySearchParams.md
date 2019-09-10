Postman: Написание скрипта, который выполняется перед запросом
==============================================================

Вкладка `Headers`
-----------------

На вкладке `Headers` следует прописать поля:

```
PIRToken:{{PIRToken}}
Content-Type:application/json
```

Вкладка `Pre-request Script`
----------------------------

```javascript
const getOperatorByLoginParamsRequest = {
    url: 'http://site.mos.ru:7003/pir_war/rs/DebtorInformationResource/getOperatorByLoginParams',
    method: 'post',
    header: 'Content-Type: application/json;charset=utf-8',
    body: {
        mode: 'raw',
        raw: JSON.stringify({
            Login: '<loginname>', 
            Password: '<password>'
        })
    }
};

console.log('Отправляется запрос на:', getOperatorByLoginParamsRequest)

pm.sendRequest(getOperatorByLoginParamsRequest, (err, response) => {
    if (err) console.log(err);
    const result = response.json();
    console.log('Получен SecurityToken = ' + result.result.SecurityToken);
    pm.environment.set('PIRToken', result.result.SecurityToken);
});
```

Отладка
-------

Для отладки используйте консоль. Открывается по клавише `Ctrl+Alt+C` (иконка внизу, слева, третья).

![image](https://user-images.githubusercontent.com/4146998/64606907-0b6f1b80-d3d0-11e9-940e-b560cdc383ff.png)
