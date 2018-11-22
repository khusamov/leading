Checkbox
=======

Кто-то называет этот компонент полем формы (например в спецификации HTML чекбокс является частью формы), а кто-то называет это кнопкой.

Но все эти вариации можно объединить под одним названием: это компонент, который в себе хранит значение логического типа (true | false).

Какие встречаются варианты?

1) Квадратик, внутри которого галочка или черный квадратик. Может принимать три значения: true, false, (null | undefined).

2) Квадратик с подписью (слева, справа, внизу, вверху).

3) Переключатель с подписью или без.

4) Кнопка, которая может быть находится в двух состояниях: нажата или отжата.

Среди этих вариантов выделяется первый, которые может принимать также значения null | undefined. 
Переключатель и кнопка такие значения принимать не умеют.

Итого, можно подытожить, что чекбокс это поле формы, которое может принимать три значения: true, false, (null | undefined). 
Причем нужно заранее выбрать, какое будет третье значение: либо null либо undefined (вместе выбрать нельзя, так как максимально 
количество возможных значений всего три).

Такой компонент можно назвать:

Checkbox  
CheckboxField  
BooleanField  
BooleanOrNullField  
BooleanOrUndefinedField  

Важно заметить, что следует удалить из библиотеки компонент кнопку с опцией pressed (кнопка, которая может быть в состоянии нажата или отжата). Потому что ее роль исполняет чекбокс. Но в этом случае нужно добавить возможность менять внешний вид чекбокс.

Какие могут быть внешние виды?

Квадратик с галочкой  
Переключатель  
Кнопка  

Надо также заметить, что есть еще вариант чекбокса. Это комбобокс, в выпадающем списке которого два или три значения. Например
Фильтр по полю адресу регистрации: есть, нет, неважно (фильтровать записи у которых есть адрес, нет адреса или показать записи с и без адреса). Тогда список внешних видов чекбокса можно пополнить:

В виде комбинированного списка