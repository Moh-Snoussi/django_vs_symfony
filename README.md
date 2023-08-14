# Symfony vs Django

## Description
This repository contains a simple application written in Symfony and Django. The goal is to compare the performance of both frameworks.
Both applications should be running on the same server, using the same database, same data and the same webserver (Apache).
Both applications has the same functionality: displaying a list of questions and related choices, and has the bare minimum requirements of an MVC application:
- Models: Connecting to a mysql database
- Views: using the template engine
- Controllers: using the a kind of routing mechanism

## Requirements
- Apache2, with mod_php-fpm, mod_wsgi and mod_rewrite enabled
- MySQL 8.0
- Python 3.8
- pipenv
- virtualenv
- PHP 8.2
- Composer
- Jmeter

## Installation

### Database
1. Create a database
```bash
mysqladmin -u root -p create django_symfony
```

3. Create a user
```bash
mysql -u root -p
mysql> CREATE USER 'django_symfony'@'localhost' IDENTIFIED BY 'django_symfony';
mysql> GRANT ALL PRIVILEGES ON django_symfony.* TO 'django_symfony'@'localhost';
```

4. Import the database
```bash
cd mysql_dumps
mysql -u django_symfony -p django_symfony < django_symfony.sql
# password: django_symfony
```

### Django
#### Installation
1. Create a virtual environment
```bash
vitualenv -p python3.8 .venv
```
2. Activate the virtual environment
```bash
pipenv shell
```

3. Install the requirements
```bash
pipenv install
```
#### Server configuration
1. adjust the apache_virtualhosts/django_app.conf file to your needs
2. copy it to the apache configuration directory:
```bash
cd apache_virtualhosts
sudo cp django_app.conf /etc/apache2/sites-available/django_app.conf
```

3. Enable the site
```bash
sudo a2ensite django_app.conf
sudo systemctl reload apache2
```

### Symfony
#### Installation
1. Install the dependencies
```bash
composer install --no-dev --optimize-autoloader
```

2. Clear/Generate the cache
```bash
APP_ENV=prod APP_DEBUG=0 php bin/console cache:clear
# insure permissions are correct
sudo chown -R www-data:www-data var # or sudo chmod -R 777 var
```

#### Server configuration
1. adjust the apache_virtualhosts/symfony_app.conf file to your needs
2. copy it to the apache configuration directory:
```bash
cd apache_virtualhosts
sudo cp symfony_app.conf /etc/apache2/sites-available/symfony_app.conf
```

3. Enable the site
```bash
sudo a2ensite symfony_app.conf
# disable python app
sudo a2dissite django_app.conf
sudo systemctl reload apache2
```


## Results
Page load time: 0.80 ~ 0.140 seconds

## Requirements
- git
- Python 3.8
- virtualenv
- pipenv

## Installation
1. Clone the repository
```bash
git clone
```

2. Create a virtual environment
```bash
virtualenv -p python3.8 .venv
```

3. Install the requirements
```bash
pipevn install
```

4. Run the migrations
```bash
python manage.py migrate
```
5. Configure the server:
Adjust the apache_virtualhost/django_app.conf file to your needs and copy it to the apache configuration directory: /etc/apache2/sites-available/

6. Enable the site
```bash
sudo a2ensite django_app.conf
sudo systemctl reload apache2
```

7. test the app
```bash
http://localhost/django/
```

## Jmeter
Jmeter is a tool for load testing web applications. It can be also used to test the performance of multiple applications and compare them.

1. Install Jmeter
```bash
sudo apt install jmeter
```

Jmeter configuration can be found in the jmeter directory.
