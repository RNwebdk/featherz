<?php namespace Acme\Controllers;

use Acme\Models\User;
use Acme\Validation\Validator;

class PageController {
	
	public function getShowHomePage(){
		include(__DIR__ . "/../../views/home.php");
	}

	public function getShowRegisterPage(){
		include(__DIR__ . "/../../views/register.php");
	}


	public function postShowRegisterPage(){
		// validate data
		$validationData = [
			'first_name' => 'min:3',
			'last_name' => 'min:3',
			'email' => 'email|equalTo:verify_email',
			'verify_email' => 'email',
			'password' => 'min:3|equalTo:verify_password'
		];

		// if validation fails, go back to register
		// page and display error messages

		$validator = new Validator;

		$errors = $validator->isValid($validationData);

		echo "<pre>";
		print_r($errors);
		echo "</pre>";
		exit();

		$user = new User;
		$user->first_name = $_REQUEST['first_name'];
		$user->last_name = $_REQUEST['last_name'];
		$user->email = $_REQUEST['email'];
		$user->password = $_REQUEST['password'];
		$user->save();

		// save this data into a database
		echo "POSTED!";
	}

	public function getShowLoginPage(){
		include(__DIR__ . "/../../views/login.php");
	}

	public function error404(){
		include(__DIR__ . "/../../views/error404.php");
	}

	public function getTestDB(){
	/********************/
	// WITHOUT ELOQUENT example
	/********************/
	// 	$options = array(
	// 		PDO::ATTR_PERSISTENT => true,
	// 		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
	// 	);
	// 	try {
	// 		$conn = new PDO("mysql:host=localhost; dbname=featherz", "homestead", "secret", $options);
	// 	} catch (PDOException $e) {
	// 		// echo "Database Connection Error: ". $e->getMessage();
	// 		$error = $e->getMessage();
	// 		echo $error;
	// 	}
	// 	$first_name = "";

	// 	$sql = "
	// 		SELECT * from users
	// 	";

	// 	$stmt = $conn->prepare($sql);
	// 	$stmt->execute();

	// 	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

	// -----------------------------------------------
	/*WITH ELOQUENT example*/
	$user = User::find(1);

	echo $user->first_name . " " . $user->last_name;
	
	}
}