NBHMarket demo app
========================

**WARNING**: Here attached .sql for dump table and data in mysql database. you can create database using symfony command but then you need to insert user data manually. this is just demo app, so I added .sql file in sql directory. so please import it and set database name in parameters.yml

Welcome to the NBHMarket demo app - a fully-functional Symfony
application that you can use.

Steps for setup app?
--------------

  * clone application from github using 'git clone https://github.com/sandip2451984/nbhmarket.git';

  * after this open console and goto project root directory and run 'composer install' command. it will install some vendor library;

  * import sql/mydemoapp.sql in your created database in mysql (this is automatically you can do with run symfony command but if you use this .sql file then  there are already some example records(data) like for Admin/User/Client user data). 

  * then run 'php bin/consoe server:run' command on console. it will start your application.

  * now your application is runing and you can test it with run url 'http://127.0.0.1:8000/login' in your browser.
  
  * There are 3 different user i created in database. so if you imported my .sql file then can use it from below for test.
  
  There are 3 users.
  1. admin@example.com - pass: admin@2018 - Admin
  2. user@example.com  - pass: 123456789  - User
  3. client@example.com -pass: 123456789  - Client

Enjoy!
