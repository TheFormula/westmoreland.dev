<?php

class OfficesController extends \BaseController {

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
		$offices = Office::paginate(10);


		return View::make('admin.offices.index')->with('offices', $offices);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.offices.create');
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
		$office = Office::find($id);
		return View::make('admin.offices.edit')->with(['office' => $office]);
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
		$office = Office::find($id);

		if (File::exists($office->image)) {
    		File::delete($office->image);
    	}

		$office->delete();

		Session::flash('successMessage', 'Office was successfully delete');
		return Redirect::action('OfficesController@index');
	}


	protected function validateAndSave($id = null)
	{
		$validator = Validator::make(Input::all(), Office::$rules);

	    Log::info(Input::all());

	    // attempt validation
	    if ($validator->fails())
	    {
	    	Session::flash('errorMessage', 'Your office was not saved');
	        // validation failed, redirect to the post create page with validation errors and old inputs
	        return Redirect::back()->withInput()->withErrors($validator);
	    }

	    if ($id == null)
		{

			$office = new Office;
		}
		else
		{

			$office = Office::find($id);
		}

		$office->address = Input::get('address');
		$office->phone_number = Input::get('phone_number');
		$office->latitude = Input::get('latitude');
		$office->longitude = Input::get('longitude');

		if (Input::hasFile('image'))
		{
			$officeImage = Input::file('image');
	    	$destinationPath = 'img/uploads/';
	    	$imageExtension = $officeImage->getClientOriginalExtension();
	    	$fileName = uniqid() . '.' . $imageExtension;
	    	$officeImage->move($destinationPath, $fileName);

	    	if (File::exists($office->image)) {
	    		File::delete($office->image);
	    	}

	    	$office->image = "/" . $destinationPath . $fileName;
		} else if ($office->image == null) {
			$office->image = 'http://placehold.it/225x150';
		}

		$office->save();

		Session::flash('successMessage', 'Office was successfully saved');
		return Redirect::action('OfficesController@index');
	}


}
