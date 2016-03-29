<?php

class AboutUs extends \Eloquent {

	protected $table = 'about_us';

	protected $fillable = ['body'];

	public static $rules = [
		'body'	=>	'required'
	];
}