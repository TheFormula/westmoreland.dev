<?php

class Customer extends \Eloquent {
	public static $rules = [
		'customer_name'		=>		'required|max:255',
	];

	protected $fillable = ['name'];

	public function projects()
    {
    	return $this->hasMany('Project');
    }
}