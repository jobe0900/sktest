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

/*
 * Homepage
 */
Route::get('/', array('as' => 'home', function() 
{
	return View::make('home');
}));

/*
 * Filter login request, only guests can log in
 */
Route::get('login', array('as' => 'login', 'before' => 'guest', function() 
{
	return View::make('login');
}));

/*
 * Authenticate login, sanitize input
 */
Route::post('login', array('before' => 'csrf', function() 
{
	$user = array(
		'email' => Input::get('email'),
		'password' => Input::get('password')
	);

	// authentication is ok
	if(Auth::attempt($user)) {
		return Redirect::route('welcome');
	}

	// authentication failed
	return Redirect::route('login')
		->with('flash_error', 'Your email/password combination was incorrect.')
		->withInput();
}));

/*
 * Welcome message
 */
Route::get('welcome', array('as' => 'welcome', function()
{
	return View::make('welcome');
}));

/*
 * Filter logout, only logged in users can log out
 */
Route::get('logout', array('as' => 'logout', 'before' => 'auth', function() 
{
	Auth::logout();
	return Redirect::route('home')
		->with('flash_notice', 'You are successfully logged out');
}));
