<?php

/**
 * Homepage
 */
Route::get('/', function()
{
	return View::make('index');
});

/**
 *	login route
 */
Route::resource('login','Admin@login');


/**
 *	new signup page
 */
Route::resource('signup','Admin@signup');



/**
 *	dashboard after successful login
 */
Route::resource('dashboard','Admin@dashboard',array('before'=>'auth'));

/**
 * logout user
 */
Route::get('logout',function(){
	Auth::logout();
	Session::flush();
	return Redirect::to('login')
						->with('flash_notice', 'You are successfully logged out.');
});