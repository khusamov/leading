Git: Как исправить HEAD detached from
=====================================

```bash
git branch temp
git checkout temp
git branch -f master temp
git checkout master
git branch -d temp
```

Что при этом происходит:  
1. создаем временную ветку с текущего положения HEAD  
2. переключаемся на временную ветку  
3. сбросить master до позиции в temp  
4. переключиться на мастер  
5. удалить временную ветку  

Источник:  
http://webhamster.ru/mytetrashare/index/mtb0/1413010541hzh3175lej
