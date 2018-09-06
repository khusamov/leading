Разные шаблоны
==============

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
