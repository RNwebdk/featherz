<?php 

namespace Acme\Controllers;

use Acme\Models\User;
use Acme\Models\Testimonial;
use Acme\Validation\Validator;
use Acme\Auth\LoggedIn;

class TestimonialController extends BaseController {

	public function getShowTestimonials(){
		$testimonials = [
			'testimonials' => Testimonial::all()
		];

		echo $this->blade->render('testimonials', $testimonials);
	}

	public function getShowAdd(){
		echo $this->blade->render('add-testimonial');
	}


	public function postShowAdd(){

		$errors = [];

		$validation_rules = [
			'title' => 'min:3',
			'testimonial' => 'min:10'
		];

		$validator = new Validator;

		$errors = $validator->isValid($validation_rules);
		if (sizeof($errors) > 0) {
			$_SESSION['msg'] = $errors;
			echo $this->blade->render('add-testimonial');
			unset($_SESSION['msg']);
			exit();
		}

		$testimonial = new Testimonial();
		$testimonial->title = $_REQUEST['title'];
		$testimonial->testimonial = $_REQUEST['testimonial'];
		$testimonial->user_id = LoggedIn::user()->id;
		$testimonial->save();

		header("Location: /testimonial-saved");
		exit;

	}

}