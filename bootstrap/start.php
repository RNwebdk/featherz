<?php 

session_start();

require(__DIR__ . "/../vendor/autoload.php");

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$url = explode('/', $_SERVER['REQUEST_URI']);

// echo "<pre>";
// print_r($url);
// echo "</pre>";
$router = new AltoRouter();