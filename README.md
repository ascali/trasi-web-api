# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://poser.pugx.org/laravel/lumen-framework/d/total.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/lumen-framework/v/stable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/lumen-framework/v/unstable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://poser.pugx.org/laravel/lumen-framework/license.svg)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](http://lumen.laravel.com/docs).

## Security Vulnerabilities

If you discover a security vulnerability within Lumen, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)


# a beta log!
This web is simple blog to explore using rest full api with lumen

# :trident: :octocat: How to lumen :cyclone: :banana: :full_moon: :earth_asia: :four_leaf_clover: :cat2:

## To run app
1. open cmd/terminal move to project folder
2. ``` php -S localhost:port -t public ```

## To create new table
1. ``` php artisan make:migration create_tables_name_table --create=table_name ```
2. create model on app/TableName.php
3. ``` php artisan migrate ```

## To run seeder 
1. create seeder on seeds/SeederName.php Or ```php artisan make:seeder UsersTableSeeder```
2. ``` composer dump-autoload ```
3. ``` php artisan db:seed ```
4. ``` php artisan db:seed --class=UsersTableSeeder```
5. ``` php artisan migrate:refresh --seed ```

## Set up .env
``` 
APP_ENV=local
APP_DEBUG=true
APP_KEY=base64:JHdpwwjAk2lQxJtLfvoLxy8D2vQZW8ats0GEYF9GuLaCY=
APP_TIMEZONE=UTC
APP_URL=http://localhost:1000/

LOG_CHANNEL=stack
LOG_SLACK_WEBHOOK_URL=

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_trasi_api
DB_USERNAME=root
DB_PASSWORD=

CACHE_DRIVER=array
QUEUE_DRIVER=array
SESSION_DRIVER=array
```

```
mysql://b55e3b896acdb6:ae0dd748@us-cdbr-iron-east-01.cleardb.net/heroku_b9f5bf567b8f9dd?reconnect=true
```


# Update Deploy heroku

```
$ heroku login

Jika belum checkout
$ heroku git:clone -a trasi-polindra
$ cd trasi-polindra

$ git add .
$ git commit -m "Updated database configuration"

$ git push heroku master

```
# run  artisan on heroku you can do this on local
```
heroku run composer dump-autoload
heroku run php artisan migrate:refresh
php artisan db:seed --class=RolesSeeder
php artisan db:seed --class=UsersSeeder
php artisan db:seed
```

# web push notification
'''
composer require pusher/pusher-php-server
'''
## Feel Free to update ...