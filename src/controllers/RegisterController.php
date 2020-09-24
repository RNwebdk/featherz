<?php 

namespace Acme\Controllers;

use Acme\Models\User;
use Acme\Models\UserPending;
use Acme\Helpers\Validator;
use Acme\Helpers\SendEmail;
use Acme\Helpers\Token;
use Acme\Helpers\Session;

class RegisterController extends BaseController {

	public function getShowRegisterPage(){

		$token = Token::generate();

		$data = [
			'CSRF' => $token
		];
		
		echo $this->blade->render('register', $data);
		unset($_SESSION['msg']);
	}


	public function postShowRegisterPage(){
		// clear previous errors, if there's any
		unset($_SESSION['msg']);
		if(Token::check($_REQUEST['_token'])){
			// validate data
			$validationData = [
				'first_name' => 'min:3',
				'last_name' => 'min:3',
				'email' => 'email|equalTo:verify_email|unique:User',
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

				$token = md5(uniqid(random(), true)) . md5(uniqid(random(), true));
				$user_pending = new UserPending();			
				$user_pending->token = $token;
				$user_pending->user_id = $user->id;
				$user_pending->save();

				$message = $this->blade->render('emails.welcome-email', ['token' => $token]);
				SendEmail::sendEmail([$user->email => $user->first_name . ' ' . $user->last_name], 'Welcome to Acme', $message);

				header("Location: /success");
				exit();
			}
		}else{
			// CSRF didn't pass
			header('HTTP/1.0 400 Bad Request');
			exit();
		}

	}

	public function getVerifyAccount(){
		$user_id = 0;
		$token = $_GET['token'];

		// look up the token
		$user_pending = UserPending::where('token', '=', $token)->get();

		foreach ($user_pending as $item) {
			$user_id = $item->user_id;
		}

		// if the user_id is grater then 0, then we found a user
		if ($user_id > 0) {
			// make the user account active
			$user = User::find($user_id);
			$user->active = 1;
			$user->save();

			// delete entry from the pending table
			UserPending::where('token', '=', $token)->delete();
			
			header("Location: /account-activated");
			exit();
		}else{
			header("Location: /page-not-found");
			exit();
		}
	}

}