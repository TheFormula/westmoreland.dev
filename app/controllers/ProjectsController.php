<?php

class ProjectsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$projects = Project::all();


		return View::make('admin.projects')->with('projects', $projects);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		return $this->validateAndSave();
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
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		return $this->validateAndSave();
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


	protected function validateAndSave($id = null)
	{

		$validator = Validator::make(Input::all(), Project::$rules);
	    Log::info(Input::all());

	    // attempt validation
	    if ($validator->fails())
	    {
	    	Session::flash('errorMessage', 'Your project was not saved');
	        // validation failed, redirect to the post create page with validation errors and old inputs
	        return Redirect::back()->withInput()->withErrors($validator);
	    }

		if ($id == null)
		{

			$project = new Project;
		}
		else
		{

			$project = Project::find($id);
		}

		$project->customer_name = Input::get('customer_name');
		$project->project_name = Input::get('project_name');
		$project->address = Input::get('project_address');
		$project->latitude = Input::get('latitude');
		$project->longitude = Input::get('longitude');
		$project->description = Input::get('description');
		$project->hashtag = Input::get('project_hashtag');
		$project->date_started = Input::get('date_started');
		$project->category_id = Input::get('project_category_id');
		$project->save();

		return Redirect::action('ProjectsController@index');
	}


}
