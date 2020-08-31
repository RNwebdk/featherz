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
}