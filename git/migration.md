
Перенос репозитория
===================

Перенос репозитория с Bitbucket на Github с сохранением истории коммитов

— Клонируете репозиторий с `bitbucket`.  
— Создаете новый репозиторий на `github`  
— Добавляете адрес нового репозитория: `git remote add github <адрес_нового_репозитория>`  
— Пушите в новый репозиторий: `git push github master`  

```
git remote add github <адрес_нового_репозитория>
git push github master
git remote remove origin
git remote rename github origin
git remote -v
```


— — — — — — — — — — —

второй ответ на этот вопрос  
пока не исследован

```
git clone --bare --mirror oldgitrepourl.git repo.git
cd repo.git
git push --mirror newgitrepourl
```

