<?php 

namespace Acme\Controllers;

use duncan3dc\Laravel\BladeInstance;

class BaseController {

	// protected $loader;
	// protected $twig;

	// public function __construct(){
	// 	$this->loader = new \Twig\Loader\FilesystemLoader(__DIR__ . "/../../views");
	// 	$this->twig = new \Twig\Environment($this->loader, [
	// 	    'cache' => false, 'debug' => true
	// 	]);
	// 	$this->twig->addGlobal('session', $_SESSION);
	// }

	protected $blade;

	public function __construct(){
		$appRoot = dirname(dirname(dirname(__FILE__)));
		$this->blade = new BladeInstance($appRoot ."/views", $appRoot . "/cache/views");
	}

}