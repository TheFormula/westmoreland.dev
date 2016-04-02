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

		$settings = array(
		    'oauth_access_token' => "2325847243-WsFBJTA18aSPMKhXRzv9aq4BAIMvVKI0iBxJm9M",
		    'oauth_access_token_secret' => "lXyTLGVIq0Z5jqcjEiqfUqxRNQjSXeQCNRHkCJgmVNrfa",
		    'consumer_key' => "34kWtY3kIzPt7xtewLrGIuXuZ",
		    'consumer_secret' => "Sf72BEQnFDmlAY0pGf9C7qUZDidHj4rtf6QcfBzihQVIBC5mGw"
		);

		$url = 'https://api.twitter.com/1.1/search/tweets.json';
		$getfield = '?screen_name=J7mbo';
		$requestMethod = 'GET';

		$twitter = new TwitterAPIExchange($settings);

		$about_us = AboutUs::orderBy('id', 'desc')->first();
		return View::make('jobs.index')->with(['customers' => $customers, 'about_us' => $about_us]);
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
