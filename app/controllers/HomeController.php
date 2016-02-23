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
		$min_lat = Input::get('min_lat');
		$max_lat = Input::get('max_lat');
		$min_lng = Input::get('min_lng');
		$max_lng = Input::get('max_lng');

		$jobs = Project::where('latitude', '>=', $min_lat)
					   ->where('latitude', '<=', $max_lat)
					   ->where('longitude', '>=', $min_lng)
					   ->where('longitude', '<=', $max_lng)->get();

		foreach ($jobs as $job) {
			$job->rendered_html = $job->html();
		}

		return $jobs;
	}

}
