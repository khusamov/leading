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

Ключ класса или интерфейса
----------------------------

```typescript
P extends keyof T
```

Здесь P ключ класса T.  
[Песочница][extends-keyof]


[extends-keyof]: https://www.typescriptlang.org/play/index.html?ssl=13&ssc=19&pln=13&pc=36#code/C4TwDgpgBAysCuATCA7YUC8UDeAoKUKAhgLYQBcUAzsAE4CWKA5gNz5RFMWHwkBGEWmwIALIlRgBjIrUp8A9vIA2EIijYBfNrknyUNagmRoqlOElTAA2gF1MUK+2yFS3AEQAJGbRBuANBxclACMAOwBYhLSslB08NAafk4uZJRuAEp6-oHcYRHiUjKUAGZESlQJSQTOxKlQnoIk9HoQ2Zy5AGz5UUVQpeUJuDbaxfAoksDNKFBcwABCIAA8ACoBAApQEAAewKiIVFAA1hAg8sVQywB8ABQk8shKlMu2AWC08mCUawEAbmXxTysaxsAEonlAAD48JRKHDsAi0CAIWjTO4PAB0xXoSl2tGu9F2JEwlygBIgJCsbw+dgwtKgfyU8RBVgADHYIVCUPAYbgNLgdHoDIiqNz0FhZgtrjQLCYAm52tk3GE3CDcAB6NVQACitHeMQAgrQmLxLFAzrFwNAAORK0JuK2kg4oeTocRUehMYh8FSxeRQMAyVy4s3nUCQKBWrn8QRW9H8gX6V3O4AiQTpCAinH2CUgKVGSxUOWRQq0RVxVqqjXa3XyA1Gk1oEMW8M28v2x2EF0cKjuz1Eb3QYB+gO0IOCJth60KZSqFCx+O6RNQEBI-XJ1O0dOZsUzJGS6XGYCF+q1Vpyry63yVzWABBAoIAhEEAwiD3qCPwBsIIBWECggCYQQCCIIBFECgQB+EEAARBAAYQb9AA4QQBuEEAGRBAF4QQA+ECAA





