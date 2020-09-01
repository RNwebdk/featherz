<?php


$router->map('GET', '/', 'PageController@getShowHomePage', 'home');
$router->map('GET', '/register', 'PageController@getShowRegisterPage', 'register');
$router->map('POST', '/register', 'PageController@postShowRegisterPage', 'register_post');
$router->map('GET', '/login', 'PageController@getShowLoginPage', 'login');

// test route
$router->map('GET', '/testdb', 'PageController@getTestDB', 'testdb');