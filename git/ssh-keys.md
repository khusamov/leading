Генерация SSH-ключа
======================

```bash
ssh-keygen -t rsa -b 4096 -C "your_email@example.com"
```

Копировать в буфер обмена:

```bash
pbcopy < ~/.ssh/id_rsa.pub
```

Подробности:  
https://help.github.com/articles/generating-ssh-keys/#platform-linux
