Шаблон Фабрика в TypeScript
===========================

Обсуждение в англоязычном Stack Overflow:  
https://stackoverflow.com/questions/52180899/how-to-implement-a-factory-method-in-typescript  

Вариант на основе объединения строк
-----------------------------------

```typescript

class Model {}

class Book extends Model {}
class BookList extends Model {}
class Autor extends Model {}

type ModelType  = 'Book' | 'BookList' |  'Autor';

class Loader {
	static load(modelType: 'Book'): Book;
	static load(modelType: 'BookList'): BookList;
	static load(modelType: 'Autor'): Autor;
	static load(modelType: ModelType): Model {
		switch (modelType) {
			case 'Autor': return new Autor;
			case 'BookList': return new BookList;
			case 'Book': return new Book;
			default: throw new Error(`Не известный тип '${modelType}'`);
		}
	}
}

const book = Loader.load('Book');
const autor = Loader.load('Autor');
const bookList = Loader.load('BookList');
```

Недостатки:  
1) Нет возможности задать параметры новым объектам при конструировании.  
2) Нет возможности расширить список создаваемых классов.  

Источник:  
https://fullstack-developer.academy/factory-pattern-in-typescript/  

Второй вариант
--------------

На основе ответа:  
https://stackoverflow.com/questions/52180899/how-to-implement-a-factory-method-in-typescript/52183400#52183400

```typescript
export interface IClass<T> extends Function { new (...args: any[]): T; }

class Model {}

class Book extends Model {}
class BookList extends Model {}
class Autor extends Model { }

class Loader {
    static load<M extends Model>(ModelClass: IClass<M>): M {
        return new ModelClass();
    }
}
```

В данном варианте можно создавать любое количество потомков Model, а класс Loader при этом менять не требуется.

Недостатки:  
1) Нет доступа к статическим методам Model внутри метода load() (см. https://goo.gl/DqEeBs).  

Этот недостаток можно решить так:

```typescript
interface IClass<T> extends Function {
    new(...args: any[]): T;
}

type TModelClass<M> = IClass<M> & typeof Model;

class Model {}

class Book extends Model {}
class BookList extends Model {}
class Autor extends Model { }

class Loader {
    static load<M extends Model>(ModelClass: TModelClass<M>): M {
        // Теперь доступны все методы и свойства Model, в том числе и статические.
        return new ModelClass();
    }
}
```

Еще один вариант (тестируется в проекте Сократ)
---------------------------------------------

```typescript

interface IModelData {
    id?: number;
}

class Model<TIModelData> {
    data: TIModelData;
}

interface IModelConstructor {
	new(...args: any[]): Model<IModelData>;
}

class ModelFactory<
	TModelConstructor extends IModelConstructor,
	TModel extends Model<IModelData>,
	> {
    private readonly ModelClass: TModelConstructor;
    constructor(ModelClass: TModelConstructor) {
        this.ModelClass = ModelClass;
    }
    createMethod(): TModel {
        return new this.ModelClass as TModel;
    }
}

interface IConcreteModelData extends IModelData {
    title: string;
}

class ConcreteModel extends Model<IConcreteModelData> {
    m1() {}
}

let concreteModelFactory = new ModelFactory<typeof ConcreteModel, ConcreteModel>(ConcreteModel);

concreteModelFactory.createMethod().m1();
```
