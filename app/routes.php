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

Route::get('/', function() {
	return View::make('home');
});

Route::get('profile', function() {
	return View::make('profile');
})->before('auth');

//route aliases
Route::get('join', 'UsersController@create');
Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');

//resourceful routes
Route::resource('users', 'UsersController');
Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy']]);
Route::resource('lists', 'ListsController');

//Nested resource 
Route::resource('lists.tasks', 'TasksController');

//password reminder
Route::controller('password', 'RemindersController');
