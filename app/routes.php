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
 * logout user
 */
Route::get('logout',function(){
	Auth::logout();
	Session::flush();
	return Redirect::to('login')
						->with('flash_notice', 'You are successfully logged out.');
});

/**
 *	new signup page
 */
Route::resource('signup','Admin@signup');


/**
 *	after successful admin's login ........
 */
foreach(Config::get('menus.admin') as $key=>$val){
	$key = strtolower($key);
	Route::resource( $key, 'Admin@'.$key, array('before'=>'auth'));
}
