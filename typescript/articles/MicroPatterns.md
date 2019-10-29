Разные шаблоны
==============

Абстрактный конструктор
-----------------------

```typescript
type TConstructor<T> = new (...args: any[]) => T;
```

Еще вариант:

```typescript
interface IConstructor<T> extends Function {
	new (...args: any[]): T;
}
```

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
