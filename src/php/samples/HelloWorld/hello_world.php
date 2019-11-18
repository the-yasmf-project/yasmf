<?php

spl_autoload_extensions(".php");
spl_autoload_register();

use yasmf\DataSource;
use yasmf\Router;

// have to create a dummy "hello_world" database...
$dataSource = new DataSource(
    $host = 'localhost',
    $port = '8889',
    $db = 'hello_world',
    $user = 'root',
    $pass = 'root',
    $charset = 'utf8mb4'
);

$router = new Router() ;
$router->route($dataSource);
