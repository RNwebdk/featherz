<?php
include(__DIR__ . "/../bootstrap/start.php");
include(__DIR__ . "/../bootstrap/db.php");
include(__DIR__ . "/../routes.php");

// Target = Controller + method
// Params = id

$match = $router->match();
// echo "<pre>";
// print_r($match);
// echo "</pre>";

if ($match) {
	list($controller, $method) = explode("@", $match['target']);

	if (is_callable(array($controller, $method))) {
		$object = new $controller();
		call_user_func_array(array($object, $method), array($match['params']));
	}else{
		echo "Cannot find $controller -> $method";
		exit();
	}	
}else{
	//if page is not found, redirect to error 404
	call_user_func_array([new PageController(), "error404"], []);
}


// $match = $router->match();

// if ($match && is_callable($match['target'])) {
// 	call_user_func_array($match['target'], $match['params']);
// }else{
// 	// no matching route found!
// 	header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
// }

 