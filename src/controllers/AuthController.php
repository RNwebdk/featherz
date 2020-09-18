<?php 

namespace Acme\Controllers;

use Acme\Models\User;
use Acme\Validation\Validator;
use Acme\Auth\LoggedIn;

class AuthController extends BaseController {

	public function getShowLoginPage(){
		echo $this->blade->render('login');
	}

	public function postShowLoginPage(){

		$validation_success = true;
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];

		// look up the user
		$user = User::where('email', '=', $email)->first();

		if ($user != NULL) {
			// validate credentials
			if (!password_verify($password, $user->password)) {
				$validation_success = false;
			}
		}else{
			$validation_success = false;
		}

		// if valid, log user in
		if ($validation_success) {
			$_SESSION['user'] = $user;
			header("Location: /");
			exit();
		}else{
			$_SESSION['msg'] = ["Invalid login"];
			echo $this->blade->render('login');
			unset($_SESSION['msg']);
			exit();
		}

		// if not valid, redirect to login page with flash message
	}

	public function getLogout(){
		unset($_SESSION['msg']);
		session_destroy();
		header("Location: /login");
		exit();
	}

	public function getTestUser(){
		dd(LoggedIn::user());
	}

}