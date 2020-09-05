<?php 

namespace Acme\Controllers;

use Acme\Validation\Validator;

class BaseController {

	protected $loader;
	protected $twig;

	public function __construct(){
		$this->loader = new \Twig\Loader\FilesystemLoader(__DIR__ . "/../../views");
		$this->twig = new \Twig\Environment($this->loader, [
		    'cache' => false, 'debug' => true
		]);
	}

}