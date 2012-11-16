Album Application Using Zend Framework 2
=======================

Introduction
------------
This is a Zend Framework 2 application written using the Tutorial on Zend Framework's website
It also includes the implementation of a Rest Module as well as Unit Testing with PHPUnit


Installation
------------
1. Clone this repo to somewhere sensible on your server

2. Download the composer.phar executable from http://getcomposer.org/composer.phar

    sh $ curl -s http://getcomposer.org/installer | php

3. Run Composer: php composer.phar install

4. Run Composer: `php composer.phar install` If this gives your problems, try nuking the `vendor` dir and doing it again. If it bitches about `some-long-hash` isn't a tree, run `php composer.php update` and then try `install` again.

5. I am using Nginx as my webserver.

    Create a nginx vhost that looks like the following

    server {
        root /www/zf2-tutorial/public/; #Change this as appropriate
        index index.php;

        error_log /var/log/nginx/proteus_error;
        access_log /var/log/nginx/proteus_access;

        server_name proteus.dev.mme.smplstrm.in; #Again - change this as needed

        #This rewrites request to non-existent files to index.php
        location / {
                try_files $uri $uri/ /index.php?$query_string;
        }

        location ~ \.php$ {
                fastcgi_pass   127.0.0.1:9000;
                fastcgi_index  index.php;
                fastcgi_param APPLICATION_ENV production;
                include        fastcgi_params;
        }
    }

Requirements
PHP 5.3+ (tested on PHP 5.3.6 FPM) Nginx 1.05+
PHP Modules +Curl +MySQL +APC (recommended) +Suhosin (recommended)
PHPUnit  Version 3.7
