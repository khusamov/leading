StringField
===========

Поле, значение которого может быть:

string  
string | null  
string | undefined  

Пример
------

```jsx
<StringField name='personName' label='Имя работника'/>
```

```jsx
<Label>Имя работника:</Label>
<StringField name='personName'/>
```

Combobox, Select
----------------

Данное поле может работать в режиме комбобокса с/без автодополнения/поиска.

```jsx
<StringField name='str1' label='Выберите одно из трех значений'>
  <Option value='1'>Значение1</Option>
  <Option value='2'>Значение2</Option>
  <Option value='3'>Значение3</Option>
</StringField>
```

Spinner
-------

Один из вариантов, кстати, как может выглядеть текстовое поле в режиме со списком Option внутри, представлен
во фреймворке Sencha ExtJS: https://docs.sencha.com/extjs/6.5.3/classic/Ext.form.field.Spinner.html
Компонент Ext.form.field.Spinner, где колесиком мыши можно выбрать одну строку.

Форматирование
--------------

Маска
-----

<MaskStringField/>

