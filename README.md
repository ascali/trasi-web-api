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


# TRASI POLINDR!
This is web app using restful api with lumen

# :trident: :octocat: How to lumen :cyclone: :banana: :full_moon: :earth_asia: :four_leaf_clover: :cat2:

## SET UP EMAIL using PHPMAILER
1. Open command
2. Locate to trasi-web-api
3. type: ```composer require phpmailer/phpmailer``` -> enter
4. set set up email
```
    /*template*/
    $mail = new PHPMailer;
    //Tell PHPMailer to use SMTP
    $mail->isSMTP();
    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug = 2;
    // use
    // $mail->Host = gethostbyname('smtp.gmail.com');
    //Set the hostname of the mail server
    $mail->Host = 'smtp.gmail.com';
    // $mail->Host = 'gmail-smtp-msa.l.google.com';
    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;
    // $mail->SMTPAuth = false;
    // $mail->SMTPSecure = false;
    //Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = "test.email@gmail.com";
    //Password to use for SMTP authentication
    $mail->Password = "********";
    //Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = 'ssl';
    // if your network does not support SMTP over IPv6
    //Set the SMTP port number ssl 465 or  tls 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 465;
    // $mail->Host = 'tls://smtp.gmail.com:587';
    //Set who the message is to be sent from
    $mail->setFrom('test.email@gmail.com', 'No Reply');
    //Set an alternative reply-to address
    //Set who the message is to be sent to
    $mail->addAddress('test@gmail.com', 'John Doe');
    //Set the subject line
    $mail->Subject = 'PHPMailer GMail SMTP test';
    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    // $mail->msgHTML(file_get_contents('contents.html'), __DIR__);
    //Replace the plain text body with one created manually
    $mail->Body    = 'Hi! This is my first e-mail sent through PHPMailer.';
    $mail->AltBody = 'This is a plain-text message body';
    if ($mail->send()) {
        echo "OK";
    } else { 
        echo $mail->ErrorInfo;
    }
```

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
```
composer require pusher/pusher-php-server
```

## Feel Free to update ...