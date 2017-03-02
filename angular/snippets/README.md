
Фрагменты кода
===============

В scss-файлах можно импортировать стили из node_modules при помощи тильды. Например:

```scss
@import '~bootstrap/dist/css/bootstrap.min.css';
@import '~@angular/material/core/theming/prebuilt/indigo-pink.css';
```

Пример создания меню на МатериалДизайн:

```html
<md-menu #schoolMenu="mdMenu" [overlapTrigger]="false">
  <button md-menu-item>Отзывы о репетиторе</button>
  <button md-menu-item>Стоимость занятий</button>
  <button md-menu-item>Контакты</button>
</md-menu>

<md-menu #learningMenu="mdMenu" [overlapTrigger]="false">
  <button md-menu-item>Расписание занятий</button>
  <button md-menu-item>Полезные инструменты</button>
</md-menu>

<md-menu #servicesMenu="mdMenu" [overlapTrigger]="false">
  <button md-menu-item [disabled]="true">Подготовка к ЕГЭ</button>
  <button md-menu-item>Общий курс английского языка</button>
  <button md-menu-item>Помощь в изучении языка в школе</button>
  <button md-menu-item>Коммуникативная практика</button>
</md-menu>

<md-toolbar>
    {{title}}
    <button md-button [mdMenuTriggerFor]="schoolMenu">
       Школа
    </button>
    <button md-button [mdMenuTriggerFor]="learningMenu">
       Обучение
    </button>
    <button md-button [mdMenuTriggerFor]="servicesMenu">
       Услуги
    </button>
    <span class="example-spacer"></span>
    <button md-button>
       Новости
    </button>
</md-toolbar>
```
Пример открытия окна на МатериалДизайн (надо бы для бутстрапа такое же сделать):

```javascript
import { MdDialog, MdDialogRef } from '@angular/material';
import { EnrollDialogComponent } from './enroll-dialog/enroll-dialog.component';

  constructor(public dialog: MdDialog) {}
  
  openDialog() {
    let dialogRef = this.dialog.open(EnrollDialogComponent);
    dialogRef.afterClosed().subscribe(result => {
      this.selectedOption = result;
    });
  }
 ```
 
 
