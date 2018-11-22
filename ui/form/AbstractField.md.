Поле формы
==========

Поля формы можно называть по разной системе. Например по типам:

BooleanField  
StringField  
NumberField  
ArrayField  
ObjectField  

Можно в конце приписывать Field, а можно и без. Но лучше все-таки приписывать. 
И мало того, все что к форме относится хранить в директории form.

Также можно поля называть традиционно:

CheckboxField  
TextField  
ComboboxField  
SelectField  

Но так называть не удобно тем, что не понятно, а какое значение может принимать то или иное поле.
В системе по типам все строго. Из названия компонента сразу видно какое значение у поля.

Null и Undefined
----------------

По идее, любое поле может принимать значение своего типа, а также null или undefined.
В традиционной системе это описывается обычно параметром поля required (обязательное поле к заполнению или нет).

В системе по типам такие поля можно называть следующим образом:

BooleanOrNullField  
StringOrNullField  
NumberOrNullField  
ArrayOrNullField  
ObjectOrNullField  

И таким образом:

BooleanOrUndefinedField  
StringOrUndefinedField  
NumberOrUndefinedField  
ArrayOrUndefinedField  
ObjectOrUndefinedField  

Так как в традиционной системе один и тот же тип может принимать разный внешний вид 
(например чекбокс может быть в виде квадратика с подписью так и в виде кнопки нажата/отжата),
то во все поля следует встроить параметр, отвечающий за его внешний вид, например ui. Например:

<BooleanField ui='normal'/>  
<BooleanField ui='button'/>  
<BooleanField ui='switch'/>  

Итого параметры полей:
----------------------

ui  
value  
name  
label  
disabled  
onChange  
onDirtyChange  
onValidityChange  
or: FieldEnum.Null | FieldEnum.Null | undefined  
