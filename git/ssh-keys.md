Новый SSH-ключ
==============

При создании ключа (например для гитхаба) нужно сгенерировать новый ключ и добавить его в SSH-агент. А затем публичный ключ отправить на сервер, с которым будет происходить соединение ([Как добавить ключ на гихабе?](https://help.github.com/articles/adding-a-new-ssh-key-to-your-github-account/#platform-linux))

Генерация SSH-ключа
--------

```bash
ssh-keygen -t rsa -b 4096 -C "khusamov@yandex.ru"
```

Копировать в буфер обмена:

```bash
pbcopy < ~/.ssh/id_rsa.pub
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


Ссылки по теме:  
-----------
https://help.github.com/articles/generating-an-ssh-key/  
https://help.github.com/articles/generating-a-new-ssh-key-and-adding-it-to-the-ssh-agent/#platform-windows
