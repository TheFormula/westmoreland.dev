<?php

class UsersController extends \BaseController {

	public function __construct()
	{
	    // call base controller constructor
	    parent::__construct();

	    // run auth filter before all methods on this controller except index and show
	    $this->beforeFilter('auth', array('except' => array('doLogin', 'showLogin', 'logout')));
	}

	/**
	 * Shows login form page
	 */
	public function showLogin()
	{
		return View::make('login');
	}

	/**
	 * Handles User login
	 */
	public function doLogin()
	{
		$validator = Validator::make(Input::all(), User::$rules);

		if ($validator->fails())
	    {
	        // validation failed, redirect to the post create page with validation errors and old inputs
	        return Redirect::back()->withInput()->withErrors($validator);
	    }

		if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password'))) || Auth::attempt(array('username' => Input::get('email'), 'password' => Input::get('password'))))
		{
		    return Redirect::intended('/posts');
		}
		else
		{
			Session::flash('errorMessage', 'Your email or password was not correct');
		    return Redirect::back()->withInput();
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		return View::make('users.user_edit')->with('edit', false);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
		$user = new User();
		$rules = User::$createRules;
		$rules['password'] = 'required|' . $rules['password'];
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails())
	    {
	        // validation failed, redirect to the post create page with validation errors and old inputs
	        return Redirect::back()->withInput()->withErrors($validator);
	    }

		if (Input::get('password') === Input::get('password2')) {
			$user->password = Input::get('password');
		} else {
			Session::flash('errorMessage', 'Your passwords did not match');
			return Redirect::back()->withInput();
		}
		$user->email = Input::get('email');
		$user->username = Input::get('username');
		$user->first_name = Input::get('first_name');
		$user->last_name = Input::get('last_name');
		$user->role = 'Author';
		$user->save();
		return Redirect::action('UsersController@doLogin')->withInput();
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		$user = User::find($id);
		return View::make('users.user_edit')->with(array('user' => $user, 'edit' => true));
	}

		/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		$validator = Validator::make(Input::all(), User::$createRules);

		if ($validator->fails())
	    {
	        // validation failed, redirect to the post create page with validation errors and old inputs
	        return Redirect::back()->withInput()->withErrors($validator);
	    }

		$user = User::find($id);
		if (Input::get('password') != '') {
			if ((Input::get('password') === Input::get('password2')) && Hash::check(Input::get('old_password'), Auth::user()->password)) {
				$user->password = Input::get('password');
			} else {
				Session::flash('errorMessage', 'Your passwords did not match');
				return Redirect::back()->withInput();
			}
		}
		$user->email = Input::get('email');
		$user->username = Input::get('username');
		$user->first_name = Input::get('first_name');
		$user->last_name = Input::get('last_name');
		$user->save();
		return Redirect::action('PostsController@index');
	}

	/**
	 * Logs out the user
	 */
	public function logout()
	{
		Auth::logout();
		return Redirect::action('PostsController@index');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$search = Input::get('user_search');
		if (is_null($search)) {
			$data = User::where('role', '<>', 'Admin')->orderBy('first_name', 'desc')->paginate(15);
		} else {
			$data = User::where('role', '<>', 'Admin')
						->where(function($query) use ($search)
				            {
				                $query->where('first_name', 'LIKE', "%$search%")
				                	->orWhere('last_name', 'LIKE', "%$search%")
									->orWhere('username', 'LIKE', "%$search%")
									->orWhere('email', 'LIKE', "%$search%");
				            })
						->orderBy('created_at', 'desc')->paginate(15);
		}

		foreach ($data as $user) {
			if ($user->role == 'Admin') {
				unset($data[$user->id]);
			}
		}
		return View::make('users.index_user')->with('users', $data);
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
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if (Auth::user()->id == $id) {
			Session::flash('errorMessage', "You can't do that");
			return Redirect::action('UsersController@index');
		}
		$user = User::find($id);
		$posts = Post::where('user_id', '=', $id);
		if (!empty($posts)) {
			foreach ($posts as $post) {
				$post->delete();
			}
		}
		$user->delete();
		Session::flash('successMessage', 'User was deleted');
		return Redirect::action('UsersController@index');
	}

}