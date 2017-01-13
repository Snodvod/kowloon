# InkYourSkin Tattoo Contest

## C9 Deploy doc

### Upgrade php 5.5 to 5.6
```
sudo add-apt-repository ppa:ondrej/php
sudo apt-get update
sudo apt-get install libapache2-mod-php5.6
sudo a2dismod php5
sudo a2enmod php5.6
sudo add-apt-repository ppa:ondrej/php5-compat
sudo apt-get update
sudo apt-get dist-upgrade
```
### Update npm en node
```
sudo npm install -g n
sudo n latest
sudo npm install -g npm
```

### Clone van git
```
git clone https://github.com/Snodvod/kowloon.git
```
Bestanden in de root workspace folder zetten en de lege map verwijderen

### Verander root directory apache

```
sudo nano /etc/apache2/sites-enabled/001-cloud9.conf

```
public toevoegen aan DocumentRoot
```
DocumentRoot /home/ubuntu/workspace/public
```
Exit and save

### Database setup

```
mysql-ctl cli
use c9;
exit;
phpmyadmin-ctl install
```

### .env file
Private creds en keys en C9 database informatie

### Laravel Setup, migration en gulp
```
composer install
npm install
gulp all
php artisan migrate --seed
```

### Link storage folder & public folder
```
php artisan storage:link
```
