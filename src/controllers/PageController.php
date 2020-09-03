<?php namespace Acme\Controllers;
use Respect\Validation\Validator as Validator;

class PageController {
	
	public function getShowHomePage(){
		include(__DIR__ . "/../../views/home.php");
	}

	public function getShowRegisterPage(){
		include(__DIR__ . "/../../views/register.php");
	}


	public function postShowRegisterPage(){
		// validate data
		$errors = [];
		if(!Validator::stringVal()->length(3)->validate($_REQUEST['first_name'])){
			$errors[] = "first name must at least three characters long!";
		}

		if(!Validator::stringVal()->length(3)->validate($_REQUEST['last_name'])){
			$errors[] = "Last name must at least three characters long!";
		}

		if(!Validator::email()->validate($_REQUEST['email'])){
			$errors[] = "You must enter a valid email address!";
		}

		if(!Validator::stringVal()->length(3)->validate($_REQUEST['password'])){
			$errors[] = "Password must be at least three characters long!";
		}

		if(!Validator::equals($_REQUEST['email'])->validate($_REQUEST['verify_email'])){
			$errors[] = "Email and verify email do not match!";
		}

		if(!Validator::equals($_REQUEST['password'])->validate($_REQUEST['verify_password'])){
			$errors[] = "password and verify password do not match!";
		}
		echo "<pre>";
		print_r($errors);
		echo "</pre>";
		die();

		// if validation fails, go back to register
		// page and display error messages


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