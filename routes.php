<?php



// register routes
$router->map('GET', '/register', 'Acme\Controllers\RegisterController@getShowRegisterPage', 'register');
$router->map('POST', '/register', 'Acme\Controllers\RegisterController@postShowRegisterPage', 'register_post');

// login/logout routes
$router->map('GET', '/login', 'Acme\Controllers\AuthController@getShowLoginPage', 'login');
$router->map('POST', '/login', 'Acme\Controllers\AuthController@PostShowLoginPage', 'login_post');
$router->map('GET', '/logout', 'Acme\Controllers\AuthController@getLogout', 'logout');
$router->map('GET', '/testuser', 'Acme\Controllers\AuthController@getTestUser', 'testuser');

// page routes
// $router->map('GET', '/testdb', 'Acme\Controllers\PageController@getTestDB', 'testdb');
$router->map('GET', '/', 'Acme\Controllers\PageController@getShowHomePage', 'home');
$router->map('GET', '/page-not-found', 'Acme\Controllers\PageController@error404', '404');
$router->map('GET', '/[*]', 'Acme\Controllers\PageController@getShowPage', 'dynamic_page');