Новый SSH-ключ
==============

При создании ключа (например для гитхаба) нужно:

1. Cгенерировать новый ключ.
2. Добавить его в SSH-агент.

А затем публичный ключ `id_rsa.pub` отправить на сервер, с которым будет происходить соединение ([Как добавить ключ на гихабе?](https://help.github.com/articles/adding-a-new-ssh-key-to-your-github-account/#platform-linux))

Генерация SSH-ключа
--------

```bash
ssh-keygen -t rsa -b 4096 -C "khusamov@yandex.ru"
```

Добавление ключа SSH в SSH-агент
----------

Убедитесь, что SSH-агент включен:

```bash
eval "$(ssh-agent -s)"
```
Добавьте ваш ключ SSH в SSH-агент:

```bash
ssh-add ~/.ssh/id_rsa
```

Проверка отпечатка (Fingerprint) ключа
----------

С помощью следующей команды можно узнать md5-отпечаток ключа, чтобы можно было его сверить с тем, что на сервере:

```bash
ssh-add -l -E md5
```

Ссылки по теме:  
-----------
https://help.github.com/categories/ssh/  
https://help.github.com/articles/generating-an-ssh-key/  
https://help.github.com/articles/generating-a-new-ssh-key-and-adding-it-to-the-ssh-agent/
