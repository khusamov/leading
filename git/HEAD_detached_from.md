Git: Как исправить HEAD detached from
=====================================

```bash
git branch temp
git checkout temp
git branch -f master temp
git checkout master
git branch -d temp
```
