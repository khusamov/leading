Шаблон Фабрика в TypeScript
===========================

Обсуждение в англоязычном Stack Overflow:  
https://stackoverflow.com/questions/52180899/how-to-implement-a-factory-method-in-typescript  

Вариант на основе объединения строк
-----------------------------------

```javascript

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
