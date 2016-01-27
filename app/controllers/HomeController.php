<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function welcome()
	{
		return View::make('jobs.index');
	}

	public function getJobs()
	{
		$jobs = [
			['title' => 'test', 'html' => View::make('jobs.map-info')->render(), 'lat' => 28, 'lng' => -98]
		];

		return $jobs;
	}

}
