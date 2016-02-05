<?php

class Projects extends \Eloquent {
	protected $fillable = ['title', 'address', 'description', 'hashtag', 'date_started', 'latitude', 'longitude'];

	public function html() {
		return View::make('jobs.map-info')->with('job', $this)->render();
	}
}