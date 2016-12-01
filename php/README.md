Обновление PHP до версии 5.6
----------------------------

```bash
sudo apt-get update && sudo apt-get install python-software-properties
sudo add-apt-repository ppa:ondrej/php5-5.6
sudo apt-get update && sudo apt-get upgrade
sudo apt-get install php5
```

Если в ответ на команду `add-apt-repository ppa:ondrej/php5-5.6` всплывет следующая ошибка:

```
Cannot add PPA: 'ppa:ondrej/php5-5.6'.
Please check that the PPA name or format is correct.
```

то можно попробовать установить другим способом, а именно:

```bash
sudo add-apt-repository ppa:ondrej/php
sudo apt-get update
sudo apt-get -y install php5.6 php5.6-mcrypt php5.6-mbstring php5.6-curl libapache2-mod-php5.6 
sudo apt-get -y install php5.6-cli php5.6-mysql php5.6-gd php5.6-intl php5.6-xsl php5.6-zip
```

Инструкция составлена на основе следующих страниц:  
https://freshnotes.ru/obnovlenie-php-5-5-do-php-5-6-v-ubuntu-14-04-upgrade-php-version/  
http://stackoverflow.com/questions/40567133/cannot-add-ppa-ppaondrej-php5-5-6
