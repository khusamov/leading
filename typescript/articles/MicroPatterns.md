Разные шаблоны
==============

Тип `Ссылка на класс`
---------------------

```typescript
class Class1 { }
let Cls: typeof Class1;
Cls = Class1;
```

Доступ к классу из метода его экземляров
----------------------------------------

```typescript
class Class1 {
    static method1() {}
    constructor() {
        (this.constructor as typeof Class1).method1();
    }
}
```
