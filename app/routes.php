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
Route::get('/ajax/get-jobs', 'HomeController@getJobs');

Route::resource('/admin/projects', 'ProjectsController');
Route::resource('/admin/customers', 'CustomersController');