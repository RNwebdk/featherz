<?php namespace Acme\Validation;

use Respect\Validation\Validator as RespectValidator;

class Validator {

	public function isValid($validationData){
		$errors = [];

		foreach ($validationData as $name => $value) {

			$rules = explode("|", $value);

			foreach ($rules as $rule) {
				$exploded = explode(":", $rule);

				switch ($exploded[0]) {
					case 'min':
						$min = $exploded[1];
						if (!RespectValidator::stringVal()->length($min)->validate($_REQUEST[$name])) {
							$errors[] = $name . " must be at least " . $min . " characters long!";
						}
						break;

					case 'email':
						if (!RespectValidator::email()->validate($_REQUEST[$name])) {
							$errors[] = $name . " must be a valid email address!";
						}
						break;

					case 'equalTo':
						if (!RespectValidator::equals($_REQUEST[$name])->validate($_REQUEST[$exploded[1]])) {
							$errors[] = $name . " and " . $exploded[1] . " do not match!";
						}
						break;
					default:
						# do nothing
						break;
				}
			}
		}

		return $errors;
	}
}