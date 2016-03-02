<?php

class Project extends \Eloquent {
	public static $rules = [
		'project_name'		=>		'required|max:255',
		'address'			=>		'required|max:255',
		'latitude'			=>		'required|numeric',
		'longitude'			=>		'required|numeric',
		'hashtag'			=>		'required',
		'date_started'		=>		'date'
	];

	public static $rules_with_customer = [
		'project_name'		=>		'required|max:255',
		'customer_name'		=>		'required|max:255',
		'address'			=>		'required|max:255',
		'latitude'			=>		'required|numeric',
		'longitude'			=>		'required|numeric',
		'hashtag'			=>		'required',
		'date_started'		=>		'date'
	];

	protected $fillable = ['project_name', 'address', 'description', 'hashtag', 'date_started', 'latitude', 'longitude'];

	public function html()
	{
		return View::make('jobs.map-info')->with('job', $this)->render();
	}

	public function category()
    {
    	return $this->belongsTo('Category');
    }

    public function customer()
    {
    	return $this->belongsTo('Customer');
    }
}