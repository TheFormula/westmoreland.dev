<?php
use Carbon\Carbon;

class Project extends \Eloquent {
	public static $rules = [
		'project_name'		=>		'required|max:255',
		'customer_name'		=>		'required|max:255',
		'project_address'	=>		'required|max:255',
		'latitude'			=>		'required|numeric',
		'longitude'			=>		'required|numeric',
		'project_hashtag'	=>		'required',
		'date_started'		=>		'date'
	];

	protected $fillable = ['project_name', 'customer_name', 'address', 'description', 'hashtag', 'date_started', 'latitude', 'longitude'];

	public function html()
	{
		return View::make('jobs.map-info')->with('job', $this)->render();
	}

	public function getDateStartedAttribute($value)
	{
	    $utc = Carbon::createFromFormat('F j, Y', $value);
	    return $utc->setTimezone('America/Chicago');
	}

	public function category()
    {
    	return $this->belongsTo('Category');
    }
}