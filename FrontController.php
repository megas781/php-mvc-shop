<?php

//1 – основные настройки

ini_set('display_errors', 1);
error_reporting(E_ALL);

//подключение файлов системы

//
define('ROOT', dirname(__FILE__));

require_once ROOT . '/components/Router.php';
require_once ROOT . '/components/Database.php';


//echo 'успешная переадресация';
//require_once 'view/product-details/product-details.php';

$router = new Router();
$router->run();