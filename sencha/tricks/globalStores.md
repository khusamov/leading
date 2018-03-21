
Глобальные хранилища
====================

В контроллере главного вида `MyApp.view.main.MainController` добавьте код:


```javascript
Ext.define('MyApp.view.main.MainController', {
    
    requires: [
        'Ext.data.StoreManager'
    ],

    globalStoreSuffix: 'Store',

    init() {
        this.initGlobalStores();
    },

    initGlobalStores() {
        const saveStoreFn = this.saveGlobalStoreInMainModel.bind(this);
        Ext.data.StoreManager.each(saveStoreFn);
        Ext.data.StoreManager.on('add', saveStoreFn);
    },

    privates: {
        saveGlobalStoreInMainModel(store) {
            const suffix = this.globalStoreSuffix;
            // Создается регулярное выражение вида [S|s]tore$ в зависимости от this.globalStoreSuffix
            const suffixRe = new RegExp(`[${suffix[0].toLowerCase()}|${suffix[0].toUpperCase()}]${suffix.slice(1)}$`, 'g');
            const storeId = store.getStoreId();
            const storeViewModelPath = suffixRe.test(storeId) ? storeId : storeId + this.globalStoreSuffix;
            this.getViewModel().set(storeViewModelPath, store);
        }
    }
  
});
```
