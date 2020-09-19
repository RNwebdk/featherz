<?php



// register routes
$router->map('GET', '/register', 'Acme\Controllers\RegisterController@getShowRegisterPage', 'register');
$router->map('POST', '/register', 'Acme\Controllers\RegisterController@postShowRegisterPage', 'register_post');
$router->map('GET', '/verify-account', 'Acme\Controllers\RegisterController@getVerifyAccount', 'verify_account');

// login/logout routes
$router->map('GET', '/login', 'Acme\Controllers\AuthController@getShowLoginPage', 'login');
$router->map('POST', '/login', 'Acme\Controllers\AuthController@PostShowLoginPage', 'login_post');
$router->map('GET', '/logout', 'Acme\Controllers\AuthController@getLogout', 'logout');

//test routes
$router->map('GET', '/testuser', 'Acme\Controllers\AuthController@getTestUser', 'testuser');
$router->map('GET', '/testmail', function(){

	Acme\Email\SendEmail::sendEmail(['Morten@gmail.com' => 'Morten Petersen'], 'My test subject', 'My message');

	echo "Sent mail!";
});

// page routes
// $router->map('GET', '/testdb', 'Acme\Controllers\PageController@getTestDB', 'testdb');
$router->map('GET', '/', 'Acme\Controllers\PageController@getShowHomePage', 'home');
$router->map('GET', '/page-not-found', 'Acme\Controllers\PageController@error404', '404');
$router->map('GET', '/[*]', 'Acme\Controllers\PageController@getShowPage', 'dynamic_page');