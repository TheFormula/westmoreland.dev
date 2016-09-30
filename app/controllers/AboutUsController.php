<?php

class AboutUsController extends \BaseController {

	public function __construct()
	{
	    // run auth filter before all methods on this controller except index and show
	    $this->beforeFilter('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.about-us.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$about_us = new AboutUs;
		return $this->validateAndSave($about_us);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function editCurrent()
	{
		$about_us = AboutUs::orderBy('id', 'desc')->first();

		return View::make('admin.about-us.edit')->with(['about_us' => $about_us]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$about_us = AboutUs::find($id);
		return $this->validateAndSave($about_us);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


	protected function validateAndSave($about_us)
	{
		$validator = Validator::make(Input::all(), AboutUs::$rules);

		Log::info(Input::all());

	    // attempt validation
	    if ($validator->fails())
	    {
	    	Session::flash('errorMessage', 'Your about us information was not saved');
	        // validation failed, redirect to the post create page with validation errors and old inputs
	        return Redirect::back()->withInput()->withErrors($validator);
	    }

		$about_us->body = trim( Input::get('body') );

		$formatted_body = '<p>' . $about_us->body . '</p>';

		$formatted_body = preg_replace("/[\r\n]+/", "\n", $formatted_body);

		$formatted_body = preg_replace("/(\n)/", "</p><p>", $formatted_body);

		// format information with html tags

		$about_us->formatted_body = $formatted_body;

		$about_us->save();

		Session::flash('successMessage', 'About us information was successfully saved');
		return Redirect::action('AboutUsController@editCurrent');
	}


}
