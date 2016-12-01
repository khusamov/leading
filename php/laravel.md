

Установка Laravel
----------------

https://laravel.com/docs/5.3

```bash
composer global require "laravel/installer"
```

Если после установки не будет доступна команда laravel, то ее нужно прописать в PATH системы.
Для этого в файл `~/.bashrc` или `~/.bash_profile` следует добавить строку:

```
export PATH="~/.composer/vendor/bin:$PATH" 
```

Затем выполнить

```bash
source ~/.bashrc
echo $PATH
```


