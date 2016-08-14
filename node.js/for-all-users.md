
Установка Node.js и NVM для всех пользователей
==============================================

1. Сначала надо установить NVM для root-пользователя.

```bash
wget -qO- https://raw.githubusercontent.com/creationix/nvm/v0.31.4/install.sh | NVM_DIR=/usr/local/nvm bash
curl -o- https://raw.githubusercontent.com/creationix/nvm/v0.31.4/install.sh | NVM_DIR=/usr/local/nvm bash
```

2. Прописать путь к NVM для конкретного пользователя:

```ini
export NVM_DIR="/usr/local/nvm"
[ -s "$NVM_DIR/nvm.sh" ] && . "$NVM_DIR/nvm.sh" # This loads nvm
```

Установка на боевом сервере
---------------------------

Для Убунты инструкция тут:
https://nodejs.org/en/download/package-manager/#debian-and-ubuntu-based-linux-distributions

```
curl -sL https://deb.nodesource.com/setup_6.x | sudo -E bash -
sudo apt-get install -y nodejs
```
