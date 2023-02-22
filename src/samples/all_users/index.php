<?php

spl_autoload_extensions(".php");
spl_autoload_register();

use yasmf\DataSource;
use yasmf\Router;

$dataSource = new DataSource(
    $host = 'localhost',
    $port = '8889', # to change with the port your mySql server listen to
    $db = 'all_users', # to change with your db name
    $user = 'user_name', # to change with your db user name
    $pass = '*****', # to change with your db password
    $charset = 'utf8mb4'
);

$router = new Router() ;
$router->route($dataSource);
