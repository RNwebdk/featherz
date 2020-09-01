<?php 

session_start();

// Composer packages
require(__DIR__ . "/../vendor/autoload.php");

// Implement environmen gloabal veriables 
Dotenv\Dotenv::createImmutable(__DIR__, "/../.env")->load();

// Implement debugging library
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

// split params for routing
$url = explode('/', $_SERVER['REQUEST_URI']);

$router = new AltoRouter();