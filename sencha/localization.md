
Локализация
===========

Перевод штатных компонент описан тут http://docs.sencha.com/extjs/6.2.0/guides/core_concepts/localization.html

С переводом своих компонент и в особенности компонент, которые в массивах (тулбары, колонки гридов и т.п.) нигде не описан.

Предлагаю следующую методику.

Создаем пакет myapp-locate

В пакете прописываем настройки

```json
"overrides": [
    "${package.dir}/overrides/locale-${package.locale}.js"
    //"${package.dir}/overrides",
    //"${package.dir}/${toolkit.name}/overrides"
],
```

Тексты компонент следует описывать внутри моделей вида, например:

```javascript
Ext.define("Ews.office.view.element.workstationList.WorkstationListModel", {
	extend: "Ext.app.ViewModel",
	alias: "viewmodel.element-workstationlist",
	
	//<locale type="object"> 
	data: {
		selection: null,
		
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
	xtype: "element-workstationlist",
	controller: "element-workstationlist",
	viewModel: "element-workstationlist",
	
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
	
	bbar: {
		xtype: "pagingtoolbar",
		displayInfo: true
	},
	
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

И напоследок пример локализации:

```javascript

Ext.define("Element.locale.ru.office.view.element.workstationList.WorkstationList", {
	override: "Ews.office.view.element.workstationList.WorkstationList",
	
	config: {
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



