
Инсталяция пакета генерации ID для автотестов
=============================================

Для инсталяции данного пакета следует:

- [Установить библиотеку с пакетами общих компонент для веб-проектов ЕИРЦ](infogorod_w_extjs_common),
- Прописать в `app.json` зависимость от пакета `eirc-autotestid`,
- Прописать в `app.js` настройки генератора (не обязательный пункт).


Настройка генератора
--------------------

В общем случае для запуска генерации ID достаточно лишь прописать в `app.json` зависимость от пакета `eirc-autotestid`.
Но если потребуется настройка генератора, то для этого необходимо в файле `app.js` вызвать метод init() генератора.
Вот примерный код, как это сделать:

```javascript
// Настройка автогенерации ID для автотестов.
Eirc.autoTestId.Generator.init({
	// Список сокращений ID.
	abbreviations: [
		'headercontainer:',
		'app-main: main',
		'main-maincardpanel-teamlist: teamlist',
		'main-maincardpanel-project-projecttabpanel: main-maincardpanel-projecttabpanel'
	],
	listeners: {
		generate(autoTestId) {
			// Контроль ID в консоли браузера.
			console.log('AutoTestId', '|', autoTestId);
		}
	}
});
```

Опции генератора
----------------

### enabled: Boolean
Флаг, разрешающий/запрещающий генерацию ID.
Удобен лишь для отладки.

### excludes: Function[]
Таблица исключений.
Массив функций, на вход которых подается ссылка проверяемого компонента.

### attribute: String, default = 'autotest-id'
Название аттрибута, где будет хранится ID для автотестов.

### divider: String, default = '-'
Разделитель смысловых частей ID.

### abbreviations: String[]
Таблица сокращений. Для каждого приложения своя таблица.


[infogorod_w_extjs_common]: https://www.npmjs.com/package/infogorod_w_extjs_common