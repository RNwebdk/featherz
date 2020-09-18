<?php 

namespace Acme\Controllers;

use Acme\Models\User;
use Acme\Models\Page;
use duncan3dc\Laravel\BladeInstance;
use Cocur\Slugify\Slugify;


class PageController extends BaseController {
	
	public function getShowHomePage(){

		echo $this->blade->render("home");
	}

	public function getShowPage(){

		// set default value
		$browser_title = "";
		$page_content = "";

		// extract page name from url
		$url = explode("/", $_SERVER['REQUEST_URI']);
		
		// use slug
		$slug = new Slugify();
		$target = $slug->Slugify($url[1]);

		// find matching page in the db
		$page = Page::where('slug', '=', $target)->get();

		// lookup page content
		foreach ($page as $item) {
			$browser_title = $item->browser_title;
			$page_content = $item->page_content;
		}


		// if page not found
		if (strlen($browser_title) == 0) {
			header("HTTP/1.0 404 Not Found");
			header("Location: /page-not-found");
			exit();
		}

		// pass content to some blade template
		$data = [
			'browser_title' => $browser_title,
			'page_content' => $page_content
		];

		echo $this->blade->render('dynamic-page', $data);
		
	}

	public function error404(){
		echo $this->blade->render('error404');
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
	// $user->testimonials()->get();
	dd($user);
	// echo $user->first_name . " " . $user->last_name;
	
	}
}