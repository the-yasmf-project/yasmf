<?php
/*
 * Sample without database connexion
 */

spl_autoload_extensions(".php");
spl_autoload_register();

use yasmf\Router;

$router = new Router() ;
$router->route();
