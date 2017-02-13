
Локализация
===========

Перевод штатных компонент описан тут http://docs.sencha.com/extjs/6.2.0/guides/core_concepts/localization.html

С переводом своих компонент и в особенности компонент, которые в массивах (тулбары, колонки гридов и т.п.) нигде не описан.

Предлагаю следующую методику.

Создаем пакет myapp-locate

В пакете прописываем настройки

"overrides": [
    "${package.dir}/overrides/locale-${package.locale}.js"
    //"${package.dir}/overrides",
    //"${package.dir}/${toolkit.name}/overrides"
],
