<?php

class ProjectsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$projects = Project::paginate(10);


		return View::make('admin.projects.index')->with('projects', $projects);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = Category::all()->lists('name', 'id');
		$customers = Customer::all()->lists('name', 'id');
		return View::make('admin.projects.create')->with(['categories' => $categories, 'customers' => $customers]);
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
		$project = Project::find($id);
		$categories = Category::all()->lists('name', 'id');
		$customers = Customer::all()->lists('name', 'id');
		return View::make('admin.projects.edit')->with(['project' => $project, 'categories' => $categories, 'customers' => $customers]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		return $this->validateAndSave($id);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$project = Project::find($id);
		$project->delete();

		Session::flash('successMessage', 'Project was successfully delete');
		return Redirect::action('ProjectsController@index');
	}


	protected function validateAndSave($id = null)
	{
		$creating_new_customer = Input::has('create_new_customer');

		if ($creating_new_customer) {
			$rules = Project::$rules_with_customer;
		} else {
			$rules = Project::$rules;
		}

		if ($id != null) {
			$rules['hashtag'] .= ',' . $id;
		}

		$validator = Validator::make(Input::all(), $rules);

	    Log::info(Input::all());

	    // attempt validation
	    if ($validator->fails())
	    {
	    	Session::flash('errorMessage', 'Your project was not saved');
	        // validation failed, redirect to the post create page with validation errors and old inputs
	        return Redirect::back()->withInput()->withErrors($validator);
	    }

	    if ($creating_new_customer)
	    {

	    	$customer = new Customer;
	    	$customer->name = Input::get('customer_name');

	    	$customerImage = Input::file('customer_image');
	    	$destinationPath = 'img/uploads/';
	    	$imageExtension = $customerImage->getClientOriginalExtension();
	    	$fileName = uniqid() . '.' . $imageExtension;
	    	$customerImage->move($destinationPath, $fileName);

	    	$customer->image = $destinationPath . $fileName;

	    	$customer->save();

	    }
	    else
	    {

	    	$customer = Customer::find(Input::get('customer_id'));
	    }

		if ($id == null)
		{

			$project = new Project;
		}
		else
		{

			$project = Project::find($id);
		}

		if (Input::hasFile('image'))
		{
			$projectImage = Input::file('image');
	    	$destinationPath = 'img/uploads/';
	    	$imageExtension = $projectImage->getClientOriginalExtension();
	    	$fileName = uniqid() . '.' . $imageExtension;
	    	$projectImage->move($destinationPath, $fileName);

	    	$project->image = "/" . $destinationPath . $fileName;
		} else if ($project->image == null) {
			$project->image = 'http://placehold.it/225x150';
		}

		$project->project_name = Input::get('project_name');
		$project->customer_id = $customer->id;
		$project->address = Input::get('address');
		$project->latitude = Input::get('latitude');
		$project->longitude = Input::get('longitude');
		$project->description = Input::get('description');
		$project->hashtag = Input::get('hashtag');
		$project->date_started = Input::get('date_started');
		$project->category_id = Input::get('category_id');
		$project->save();

		Session::flash('successMessage', 'Project was successfully saved');
		return Redirect::action('ProjectsController@index');
	}


}
