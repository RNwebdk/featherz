<?php

class PageController {
	
	public function getShowHomePage(){
		include(__DIR__ . "/../views/home.php");
	}

	public function getShowRegisterPage(){
		include(__DIR__ . "/../views/register.php");
	}


	public function postShowRegisterPage(){
		// validate data

		// if validation fails, go back to register
		// page and display error messages


		// save this data into a database
		echo "POSTED!";
	}

	public function getShowLoginPage(){
		include(__DIR__ . "/../views/login.php");
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