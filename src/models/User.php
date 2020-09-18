<?php namespace Acme\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent{

	// public $timestamps = false;
	// protected $primaryKey = 'user_id';

	public function testimonials(){
		return $this->hasMany('Acme\models\testimonial');
	}

}