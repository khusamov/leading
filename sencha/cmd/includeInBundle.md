Подключение сторонних JS-библиотек
==================================

```json5

    /**
     * List of all JavaScript assets in the right execution order.
     *
     * Each item is an object with the following format:
     *
     *      {
     *          // Path to file. If the file is local this must be a relative path from
     *          // this app.json file.
     *          //
     *          "path": "path/to/script.js",   // REQUIRED
     *
     *          // Set to true on one file to indicate that it should become the container
     *          // for the concatenated classes.
     *          // Установите в истинно на одном файле, чтобы указать, что он должен стать контейнером для каскадных классов.
     *          //
     *          "bundle": false,    // OPTIONAL
     *
     *          // Set to true to include this file in the concatenated classes.
     *          // Установите верным включить этот файл в каскадных классов.
     *          //
     *          "includeInBundle": false,  // OPTIONAL
     *
     *          // Specify as true if this file is remote and should not be copied into the
     *          // build folder. Defaults to false for a local file which will be copied.
     *          // Укажите, как верно, если этот файл является удаленным и не должны быть скопированы в папку сборки. 
     *          // По умолчанию ложно для локального файла, который будет скопирован.
     *          //
     *          "remote": false,    // OPTIONAL
     *
     *          // If not specified, this file will only be loaded once, and cached inside
     *          // localStorage until this value is changed. You can specify:
     *          //
     *          //   - "delta" to enable over-the-air delta update for this file
     *          //   - "full" means full update will be made when this file changes
     *          // Если не указано, то этот файл будет загружен только один раз, и кэшируются внутри LocalStorage, 
     *          // пока это значение не изменяется. Вы можете указать:
     *          // - "Дельта" для того, чтобы более-воздух обновления дельта для этого файла
     *          // - "Полный" означает полное обновление будет производиться при этом файле изменений
     *          //
     *          "update": "",        // OPTIONAL
     *
     *          // A value of true indicates that is a development mode only dependency.
     *          // These files will not be copied into the build directory or referenced
     *          // in the generate app.json manifest for the micro loader.
     *          // Значение true указывает на то, что это режим разработки только зависимость. 
     *          // Эти файлы не будут скопированы в каталог сборки или ссылки в генерации app.json 
     *          // манифест для микро-загрузчика.
     *          //
     *          "bootstrap": false   // OPTIONAL
     *      }
     *
     */
    "js": [{
        "path": "${framework.dir}/build/ext-all-rtl-debug.js"
    }, {
        "path": "../../node_modules/jquery/dist/jquery.min.js",
        "includeInBundle": true
    }, {
        "path": "../../node_modules/blueimp-file-upload/js/vendor/jquery.ui.widget.js",
        "includeInBundle": true
    }, {
        "path": "../../node_modules/blueimp-file-upload/js/jquery.iframe-transport.js",
        "includeInBundle": true
    }, {
        "path": "../../node_modules/blueimp-file-upload/js/jquery.fileupload.js",
        "includeInBundle": true
    }, {
        "path": "app.js",
        "bundle": true
    }],

```
