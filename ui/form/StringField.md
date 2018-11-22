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

Форматирование
--------------

Маска
-----

<MaskStringField/>

