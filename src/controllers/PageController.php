<?php 

namespace Acme\Controllers;

use Acme\Models\User;

class PageController extends BaseController {
	
	public function getShowHomePage(){
		// include(__DIR__ . "/../../views/home.php");
		echo $this->twig->render('home.html');
	}

	public function error404(){
		// include(__DIR__ . "/../../views/error404.php");
		echo $this->twig->render('error404.html');
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