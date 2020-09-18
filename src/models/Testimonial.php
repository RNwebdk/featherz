<?php namespace Acme\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Testimonial extends Eloquent{

	// protected $primaryKey = 'Testimonial_id';

	public function user(){
		return $this->hasOne('Acme\models\User');
	}

}