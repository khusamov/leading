
Как добавить в Ангуляре обработчик события на фазе перехвата?
=============================================================

form.addEventListener("focus", function() {}, true);

Пока они заняты 4-й версией, эту фичу не собираются реализовывать. Хотя вроде как она работает. Надо попробовать.

Пример кода:

```javascript
<ul class="heroes" (focus)="onFocus()" (~blur)="onBlur()" tabindex="-1">
  ...
</ul>
```

Пул реквест, где предлагают решение включения фазы перехвата при помощи тильды:
https://github.com/angular/angular/pull/13371

Обсуждение этой фичи:
https://github.com/angular/angular/issues/11200

События focus и blur, для которых есть примеры перехвата:
https://learn.javascript.ru/focus-blur
