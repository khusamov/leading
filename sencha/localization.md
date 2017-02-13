
Локализация
===========

Перевод штатных компонент описан тут http://docs.sencha.com/extjs/6.2.0/guides/core_concepts/localization.html

С переводом своих компонент и в особенности компонент, которые в массивах (тулбары, колонки гридов и т.п.) нигде не описан.

Предлагаю следующую методику.

Создаем пакет, где будет хранится локализация, например `myapp-locate`.

В пакете (файл `package.json`) прописываем настройки:

```json
"overrides": [
    "${package.dir}/overrides/locale-${package.locale}.js"
],
```

вместо того, что там было:

```json
"overrides": [
    "${package.dir}/overrides",
    "${package.dir}/${toolkit.name}/overrides"
],
```

Таким способом мы описываем как CMD будет добираться до файла локализации `packages/local/ext-locale/overrides/locale-ru.js` в зависимости от выставленной locale в конфиге приложения `app.json`.

Тексты компонент следует описывать внутри моделей вида, например:

```javascript
Ext.define("Ews.office.view.element.workstationList.WorkstationListModel", {
	extend: "Ext.app.ViewModel",
	
	//<locale type="object"> 
	data: {
		columnText: {
			PARAMS: "EWS Params",
			WORKSTATION_TYPE: "Workstation Type",
			DESCRIPTION: "Description",
			TITLE: "Workstation Title"
		},
		tbarText: {
			Add: "Add Workstation",
			Edit: "Edit",
			Remove: "Remove",
			Open: "Open"
		}
	}
	//</locale> 
		
});
```

Сам вид при этом будет выглядеть примерно так:


```javascript
Ext.define("Ews.office.view.element.workstationList.WorkstationList", {
	extend: "Ext.grid.Panel",
	
	//<locale> 
	title: "Element Workstation List (EWSL)",
	//</locale> 
	
	tbar: [{
		handler: "onAddButtomClick",
		bind: {
			text: "{tbarText.Add}"
		}
	}, {
		handler: "onEditButtomClick",
		bind: {
			text: "{tbarText.Edit}",
			disabled: "{!selection}"
		}
	}, {
		handler: "onRemoveButtomClick",
		bind: {
			text: "{tbarText.Remove}",
			disabled: "{!selection}"
		}
	}, "-", {
		handler: "onOpenButtomClick",
		bind: {
			text: "{tbarText.Open}",
			disabled: "{!selection}"
		}
	}],
	
	columns: [{
		dataIndex: "TITLE",
		flex: 1,
		bind: {
			text: "{columnText.TITLE}"
		}
	}, {
		dataIndex: "DESCRIPTION",
		flex: 1,
		bind: {
			text: "{columnText.DESCRIPTION}"
		}
	}, {
		dataIndex: "WORKSTATION_TYPE",
		flex: 1,
		bind: {
			text: "{columnText.WORKSTATION_TYPE}"
		}
	}, {
		dataIndex: "PARAMS",
		flex: 1,
		bind: {
			text: "{columnText.PARAMS}"
		}
	}]
		
});

```

И напоследок пример локализации (файл `packages/local/ext-locale/overrides/locale-ru.js`):

```javascript

Ext.define("Element.locale.ru.office.view.element.workstationList.WorkstationList", {
	override: "Ews.office.view.element.workstationList.WorkstationList",
	config: {
		// Пример локализации заголовка таблицы.
		title: "Список рабочих мест"
	}
});

Ext.define("Element.locale.ru.office.view.element.workstationList.WorkstationListModel", {
	override: "Ews.office.view.element.workstationList.WorkstationListModel",
	config: {
		data: {
			columnText: {
				PARAMS: "Параметры",
				WORKSTATION_TYPE: "Тип рабочего места",
				DESCRIPTION: "Описание",
				TITLE: "Название рабочего места"
			},
			tbarText: {
				Add: "Добавить",
				Edit: "Редактировать",
				Remove: "Удалить",
				Open: "Открыть"
			}
		}
	}
});
```


Теперь в приложении (файл `app.json`) достаточно прописать:

```json
    "requires": [
        "ext-locale",
        "myapp-locate"
    ],
    "locale": "ru",
```

Далее нужно будет лишь переключать параметр locale, либо вообще его убрать. Этого будет достаточно, чтобы быстро делать сборки на разные языки.

