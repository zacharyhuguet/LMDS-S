### SYMFONY     VERSION 5.4.2 ###
### COMPOSER    VERSION 2.1.8 ###
### PHP         VERSION 7.4.9 ###
[![CodeFactor](https://www.codefactor.io/repository/github/zacharyhuguet/lmds-s/badge)](https://www.codefactor.io/repository/github/zacharyhuguet/lmds-s)

![La Maison Du Smartphone](https://raw.githubusercontent.com/AllanBiville/LMDS-S/main/public/images/banniere.jpg)

## Description
La Maison Du Smartphone is an online website software, a PHP web application developed using the Symfony framework (version 5.4.2).

Thanks to [Symfony](https://symfony.com/)

## Installation

### 1) Get all source files

- git clone https://github.com/AllanBiville/LMDS-S.git
- composer install


### 2) Create database

Copy **.env** file to **.env.local**

Edit line **DATABASE_URL="mysql://user:password@127.0.0.1:5432/lmds"**

Execute command : 
- php bin/console doctrine:database:create
- php bin/console doctrine:migrations:migrate
- php bin/console doctrine:fixtures:load
- php bin/console server:start


### 3) With your web browser open url where server is listening on

For example, with your browser open this page :  http://localhost:8000 and GO !

Here is initial credentials of the admin user.
 - Username : admin
 - Password : admin

Here is initial credentials of the super-admin user.
 - Username : superadmin
 - Password : superadmin
