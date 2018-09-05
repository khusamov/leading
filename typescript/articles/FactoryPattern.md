Шаблон Фабрика в TypeScript
===========================

Вариант на основе объединения строк
-----------------------------------

```javascript

type ModelType  = 'Book' | 'BookList' |  'Autor';

class Book {}

class BookList {}

class Autor {}

class Loader {
	static load(modelType: 'Book'): Book;
	static load(modelType: 'BookList'): BookList;
	static load(modelType: 'Autor'): Autor;
	static load(modelType: ModelType): Book | BookList | Autor {
		switch (modelType) {
			case 'Autor': return new Autor;
			case 'BookList': return new BookList;
			case 'Book': return new Book;
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
