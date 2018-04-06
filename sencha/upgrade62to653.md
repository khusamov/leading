
Обновление проекта с Sencha ExtJS SDK версии 6.2 на версию 6.5.3.57
===================================================================

Для обновления SDK выполните следующие шаги:
- [Установите новый Sencha ExtJS SDK](https://bitbucket.org/infogorod/sencha-extjs-6.5.3.57)
- [Установить библиотеку с пакетами общих компонент для веб-проектов ЕИРЦ](https://www.npmjs.com/package/infogorod_w_extjs_common)
- В своих приложениях и пакетах удалите директорию каталог `.sencha` и замените файл `build.xml` на новый (см. внизу).
- Пропишите патч `extjs653patch` в настройках ваших приложений (app.json/requires).


Файл `build.xml` 
--------------------------------

Внимание, внутри текста этого файла нужно заменить следующие поля:
- <NAME> заменить на имя пространства имен приложения (например `PirDesktop`) или на имя папки пакета (например `pir-core`),
- <TYPE> заменить на `app` или `package`.


```xml
<?xml version="1.0" encoding="utf-8"?>
<project name="<NAME>" default=".help">

    <!-- Find and load Sencha Cmd ant tasks -->
    <script language="javascript">
        <![CDATA[
            var dir = project.getProperty("basedir"),
                cmdDir = project.getProperty("cmd.dir"),
                cmdLoaded = project.getReference("senchaloader");

            if (!cmdLoaded) {
                function echo(message, file) {
                    var e = project.createTask("echo");
                    e.setMessage(message);
                    if (file) {
                        e.setFile(file);
                    }
                    e.execute();
                };

                if (!cmdDir) {

                    function exec(args) {
                        var process = java.lang.Runtime.getRuntime().exec(args),
                            input = new java.io.BufferedReader(new java.io.InputStreamReader(process.getInputStream())),
                            headerFound = false,
                            line;

                        while (line = input.readLine()) {
                            line = line + '';
                            java.lang.System.out.println(line);
                            if (line.indexOf("Sencha Cmd") > -1) {
                                headerFound = true;
                            }
                            else if (headerFound && !cmdDir) {
                                cmdDir = line;
                                project.setProperty("cmd.dir", cmdDir);
                            }
                        }
                        process.waitFor();
                        return !!cmdDir;
                    }

                    if (!exec(["sencha", "which"])) {
                        var tmpFile = "tmp.sh";
                        echo("source ~/.bash_profile; sencha " + whichArgs.join(" "), tmpFile);
                        exec(["/bin/sh", tmpFile]);
                        new java.io.File(tmpFile)['delete'](); 
                    }
                }
            }

            if (cmdDir && !project.getTargets().containsKey("init-cmd")) {
                var importDir = project.getProperty("build-impl.dir") || 
                                (cmdDir + "/ant/build/<TYPE>/build-impl.xml");
                var importTask = project.createTask("import");

                importTask.setOwningTarget(self.getOwningTarget());
                importTask.setLocation(self.getLocation());
                importTask.setFile(importDir);
                importTask.execute();
            }
        ]]>
    </script>

</project>
```




