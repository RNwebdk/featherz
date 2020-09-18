<?php 

namespace Acme\Controllers;

use Acme\Models\User;
use Acme\Validation\Validator;

class RegisterController extends BaseController {

	public function getShowRegisterPage(){
		// include(__DIR__ . "/../../views/register.php");
		// clear previous errors, if there's any
		
		echo $this->blade->render('register');
		unset($_SESSION['msg']);
	}


	public function postShowRegisterPage(){
		// clear previous errors, if there's any
		unset($_SESSION['msg']);
		// validate data
		$validationData = [
			'first_name' => 'min:3',
			'last_name' => 'min:3',
			'email' => 'email|equalTo:verify_email',
			'verify_email' => 'email',
			'password' => 'min:3|equalTo:verify_password'
		];

		

		$validator = new Validator;

		$errors = $validator->isValid($validationData);

		// if validation fails, go back to register
		// page and display error messages
		// if there's errors, show them on screen
		if (sizeOf($errors) > 0) {
			$_SESSION['msg'] = $errors;
			header("Location: /register");
			exit();
		}else{
			$user = new User;
			$user->first_name = $_REQUEST['first_name'];
			$user->last_name = $_REQUEST['last_name'];
			$user->email = $_REQUEST['email'];
			$user->password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
			// save this data into a database
			$user->save();

			header("Location: /success");
			exit();
		}

	}

}