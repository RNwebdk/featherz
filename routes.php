<?php


$router->map('GET', '/', 'Acme\Controllers\PageController@getShowHomePage', 'home');
$router->map('GET', '/register', 'Acme\Controllers\RegisterController@getShowRegisterPage', 'register');
$router->map('POST', '/register', 'Acme\Controllers\RegisterController@postShowRegisterPage', 'register_post');
$router->map('GET', '/login', 'Acme\Controllers\RegisterController@getShowLoginPage', 'login');

$router->map('GET', '/page-not-found', 'Acme\Controllers\PageController@error404', '404');

// $router->map('GET', '/about', 'Acme\Controllers\PageController@getShowPage', 'dynamic_page');

// test route
$router->map('GET', '/testdb', 'Acme\Controllers\PageController@getTestDB', 'testdb');

$router->map('GET', '/[*]', 'Acme\Controllers\PageController@getShowPage', 'dynamic_page');