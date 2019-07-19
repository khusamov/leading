Проверка кода проектов на Sencha ExtJS
======================================

Обработчики событий
-------------------

Обработчики событий должны быть реализованы в контроллере или в отдельном методе класса.

Пример неправильно объявленного обработчика события:

```javascript
  listeners: {
    change(combo, changeValue, lastValue) {
      if (changeValue !== null) {
        combo.getStore().filter({
          property: 'Name',
          value: changeValue,
          anyMatch: true,
          caseSensitive: false,
        });
      } else combo.getStore().clearFilter();
    }
  }
```

Следует объявлять следующим образом:

```javascript
  listeners: 'onChange'
```


Размеры контейнеров
-------------------

Размеры должны быть либо фиксированными либо описаны при помощи свойства flex.

Недопустимо использовать 

```javascript
height: '100%',
```
