<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@welcome');
Route::get('/ajax/get-projects', 'HomeController@getProjects');
Route::get('/ajax/get-customer-projects', 'HomeController@getCustomerProjects');

Route::resource('/admin/projects', 'ProjectsController');
Route::resource('/admin/customers', 'CustomersController');

Route::get('/admin/about-us/edit-current', 'AboutUsController@editCurrent');
Route::resource('/admin/about-us', 'AboutUsController');

Route::get('/login', 'UsersController@showLogin');
Route::post('/login', 'UsersController@doLogin');
Route::get('/logout', 'UsersController@logout');