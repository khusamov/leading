Postman: Написание скрипта, выполняющегося перед запросом
================================================

На вкладке Headers следует прописать поля:

```
PIRToken:{{PIRToken}}
Content-Type:application/json
```

Вкладка Pre-request Script
--------------------------

```javascript
const getOperatorByLoginParamsRequest = {
    url: 'http://zao0.wl.test.eirc.mos.ru:7003/pir_war/rs/DebtorInformationResource/getOperatorByLoginParams',
    method: 'post',
    header: 'Content-Type: application/json;charset=utf-8',
    body: {
        mode: 'raw',
        raw: JSON.stringify({
            Login: 'kuleshova_mv@em', 
            Password: 'fuik1grul'
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
