
Тестирование связывания
=======================

Для тестирования связывания можно воспользоваться данным трюком. Добавьте в контроллере вида такой метод:

```javascript
	initViewModel(vm) {
		vm.bind('<проверяемый дескриптор>', function(value) {
			// этот код будет запускаться всякий раз, когда будет обновляться значение десприптора
		});
	},
```

Внимание, метод initViewModel вызывается только в случае, если вид содержит свою собственную модель вида.

http://docs.sencha.com/extjs/6.2.0/classic/Ext.app.ViewController.html#method-initViewModel


Тестирование связывания в ExtJS версии 6.5.3 
----------------------------------------------

http://docs.sencha.com/extjs/6.5.3/classic/Ext.app.ViewController.html#cfg-bindings


```javascript
Ext.define('MyApp.TestController', {
    extend: 'Ext.app.ViewController',

    bindings: {
        onTotalChange: '{total}',
        onCoordsChange: '({x}, {y})',
        onProductChange: {
            amount: '{qty}',
            rating: '{rating}'
        }
    },

     onTotalChange: function(total) {
         console.log(total);
     },

     onCoordsChange: function(coords) {
         console.log('The coordinates are: ', coords);
     },

     onProductChange: function(productInfo) {
         console.log('Amount: ', productInfo.amount, ' Rating: ', productInfo.rating);
     }
});
```
