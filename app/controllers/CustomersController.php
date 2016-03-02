<?php

class CustomersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$customers = Customer::paginate(10);


		return View::make('admin.customers')->with('customers', $customers);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.customers.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		return $this->validateAndSaveCustomer();
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
		$project = Customer::find($id);
		return View::make('admin.edit')->with(['customer' => $customer]);
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
		$customer = Customer::find($id);
		$customer->delete();

		Session::flash('successMessage', 'Customer was successfully delete');
		return Redirect::action('CustomersController@index');
	}


	protected function validateAndSave($id = null)
	{
		$validator = Validator::make(Input::all(), Customer::$rules);

		Log::info(Input::all());

	    // attempt validation
	    if ($validator->fails())
	    {
	    	Session::flash('errorMessage', 'Your customer was not saved');
	        // validation failed, redirect to the post create page with validation errors and old inputs
	        return Redirect::back()->withInput()->withErrors($validator);
	    }

		if ($id == null)
		{

			$customer = new Customer;
		}
		else
		{

			$customer = Customer::find($id);
		}

		$customer->name = Input::get('name');
		$customer->save();

		Session::flash('successMessage', 'Customer was successfully saved');
		return Redirect::action('CustomersController@index');
	}


}
