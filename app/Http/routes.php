<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function(){
	return redirect('projects');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::resource('projects', 'ProjectsController');
Route::resource('projects.tasks', 'TasksController');

Route::get('projects/{projects}/task/{tasks}/complete', ['as' => 'projects.tasks.complete', 'uses' => 'TasksController@complete']);