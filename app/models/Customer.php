<?php

class Customer extends \Eloquent {
	public static $rules = [
		'name'				=>	'required|max:255',
		'customer_image'	=>	'image'
	];

	protected $fillable = ['name'];

	public function projects()
    {
    	return $this->hasMany('Project');
    }
}