<?php

class Office extends \Eloquent {
	protected $fillable = ['address', 'latitude', 'longitude'];

	public static $rules = [
		'address'			=>		'required|max:255',
		'phone_number'		=>		'required|max:255',
		'latitude'			=>		'required|numeric',
		'longitude'			=>		'required|numeric'
	];

	public function html()
	{
		return View::make('offices.map-info')->with('office', $this)->render();
	}
}