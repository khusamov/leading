Генерация SSH-ключа
======================

```bash
ssh-keygen -t rsa -b 4096 -C "khusamov@yandex.ru"
```

Копировать в буфер обмена:

```bash
pbcopy < ~/.ssh/id_rsa.pub
```

Подробности:  
https://help.github.com/articles/generating-an-ssh-key/  
https://help.github.com/articles/generating-a-new-ssh-key-and-adding-it-to-the-ssh-agent/#platform-windows
