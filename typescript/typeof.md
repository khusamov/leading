Создание типов на основе имеющихся объектов при помощи typeof
=============================================

```typescript
export const routes = {
    authentication: {
        name: 'AuthenticationScreen',
        children: {},
    }
};

export type Routes = typeof routes;

let a: Routes = {
    authentication: {
        name: '',
        children: {}
    }
};
```
