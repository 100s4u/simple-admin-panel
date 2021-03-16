<h1>Info:</h1> 
Simple Admin Panel is a simple and versatile admin panel for working with a MySQL database with a clear and unloaded interface, as well as the ability to upload images to the server.



To start working with the panel, you need to:

1. Create a database
    
    - Directly via mysql:

            $ sudo mysql
 
            mysql> CREATE DATABASE sapDB;
            mysql> exit
 
    - Via phpMyAdmin:
 
            Click " Create Database";
    
            Come up with a name;
    
            Select the encoding "utf8_general_ci"

2. Configure config.php

    $login= "Admin name";
 
    $hash= 'Password hash created with password_hash()';
    
    $USER= "DB user name";
 
    $PASSWORD="DB user password";
 
    $SERVER= " Server IP or domain";
 
    $DB="sapDB";
    
    
<h1>Версия на русском:</h1>    
    
    
    
Simple Admin Panel - это простая и универсальная админ панель для работы с базой данных MySQL с понятным и ненагруженным интерфейсом, а также с возможностью загружать изображения на сервер.



Для начала работы с панелью нужно:


1. Создать базу данных

    -   Непосредственно через mysql:
    
            $ sudo mysql
            
            mysql> CREATE DATABASE sapDB;
            mysql> exit
           
    -   Через phpMyAdmin:
    
            Нажать "Создать БД";
            
            Придумать название;
            
            Выбрать кодировку "utf8_general_ci"
            
2. Настроить config.php

    $login="Имя админа";
    
	$hash='Хэш пароля, созданный с помощью password_hash()';
    
	$USER="Имя пользователя БД";
    
	$PASSWORD="Пароль пользователя БД";
    
	$SERVER="IP или домен сервера";
    
	$DB="sapDB";
