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

## Benchmarking
### 50 concurrent requests, 100 total requests
```bash
ab -n100 -c50 -g django.tsv localhost/django
This is ApacheBench, Version 2.3 <$Revision: 1843412 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking localhost (be patient).....done


Server Software:        Apache/2.4.41
Server Hostname:        localhost
Server Port:            80

Document Path:          /django
Document Length:        16209 bytes

Concurrency Level:      50
Time taken for tests:   2.339 seconds
Complete requests:      100
Failed requests:        0
Total transferred:      1652900 bytes
HTML transferred:       1620900 bytes
Requests per second:    42.76 [#/sec] (mean)
Time per request:       1169.426 [ms] (mean)
Time per request:       23.389 [ms] (mean, across all concurrent requests)
Transfer rate:          690.15 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    1   1.0      1       2
Processing:    44  918 334.2   1098    1354
Waiting:       42  910 334.4   1090    1312
Total:         44  919 333.7   1098    1356

Percentage of the requests served within a certain time (ms)
  50%   1098
  66%   1146
  75%   1159
  80%   1177
  90%   1206
  95%   1233
  98%   1263
  99%   1356
 100%   1356 (longest request)

```

### 50 concurrent requests, 500 total requests
```bash
ab -n100 -c50 -g django.tsv localhost/django
This is ApacheBench, Version 2.3 <$Revision: 1843412 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking localhost (be patient).....done


Server Software:        Apache/2.4.41
Server Hostname:        localhost
Server Port:            80

Document Path:          /django
Document Length:        16209 bytes

Concurrency Level:      50
Time taken for tests:   2.339 seconds
Complete requests:      100
Failed requests:        0
Total transferred:      1652900 bytes
HTML transferred:       1620900 bytes
Requests per second:    42.76 [#/sec] (mean)
Time per request:       1169.426 [ms] (mean)
Time per request:       23.389 [ms] (mean, across all concurrent requests)
Transfer rate:          690.15 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    1   1.0      1       2
Processing:    44  918 334.2   1098    1354
Waiting:       42  910 334.4   1090    1312
Total:         44  919 333.7   1098    1356

Percentage of the requests served within a certain time (ms)
  50%   1098
  66%   1146
  75%   1159
  80%   1177
  90%   1206
  95%   1233
  98%   1263
  99%   1356
 100%   1356 (longest request)
