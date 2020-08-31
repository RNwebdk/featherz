<?php
include(__DIR__ . "/../bootstrap/start.php");

include(__DIR__ . "/../routes.php");

$match = $router->match();


list($controller, $method) = explode("@", $match['target']);

if (is_callable(array($controller, $method))) {
	$object = new $controller();
	call_user_func_array(array($object, $method), array($match['params']));
}else{
	echo "Cannot find $controller -> $method";
	exit();
}

// $match = $router->match();

// if ($match && is_callable($match['target'])) {
// 	call_user_func_array($match['target'], $match['params']);
// }else{
// 	// no matching route found!
// 	header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
// }

 