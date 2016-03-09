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
		$customers = Customer::where('home_page', '=', 1)->get();
		return View::make('jobs.index')->with(['customers' => $customers]);
	}

	public function getProjects()
	{
		$projects = Project::all();

		foreach ($projects as $project) {
			$project->rendered_html = $project->html();
		}

		return $projects;
	}

	public function getCustomerProjects()
	{
		$customer_id = Input::get('customer_id');

		$projects = Project::where('customer_id', '=', $customer_id)->get();

		foreach ($projects as $project) {
			$project->rendered_html = $project->html();
		}

		return $projects;
	}

}
