
Доступ к глобальным хранилищам через связывание
===============================================

Глобальные хранилища доступны во всем приложении при помощи конструкции:

```javascript
const store = Ext.data.StoreManager.lookup('<storeId>');
```

Но иногда требуется, чтобы они были доступны также при помощи связывания.

Можно конечно на местах добавлять их в модели вида. Но это лишний код, 
если требуется доступ ко всем глобальным хранилищам.

Для данного случая можно в контроллере главного вида сразу добавить 
их все в модель главного вида. В этом случае они будут доступны повсеместно.

Вот код, который следует добавить в контроллер главного вида:


```javascript
Ext.define('MyApp.view.main.MainController', {
    
    requires: [
        'Ext.data.StoreManager'
    ],

    globalStoreSuffix: 'Store',

    init() {
        this.initGlobalStores();
    },

    privates: {

        initGlobalStores() {
            const saveStoreFn = this.saveGlobalStoreInMainModel.bind(this);
            Ext.data.StoreManager.each(saveStoreFn);
            Ext.data.StoreManager.on('add', saveStoreFn);
        },

        saveGlobalStoreInMainModel(store) {
            const suffix = this.globalStoreSuffix;

            // Создается регулярное выражение вида [S|s]tore$ в зависимости от this.globalStoreSuffix
            const suffixReText = [
                '[',
                    suffix[0].toLowerCase(), '|',
                    suffix[0].toUpperCase(),
                ']',
                suffix.slice(1), '$'
            ].join('');
            const suffixRe = new RegExp(suffixReText, 'g');
        
            const storeId = store.getStoreId();
            const storeViewModelPath = suffixRe.test(storeId) ? storeId : storeId + this.globalStoreSuffix;
            this.getViewModel().set(storeViewModelPath, store);
        }

    }
  
});
```
