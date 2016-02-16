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

		$jobs = Projects::all();

		foreach ($jobs as $job) {
			$job->rendered_html = $job->html();
		}

		return $jobs;
	}

	public function admin()
	{
		return View::make('admin.main');
	}

}
