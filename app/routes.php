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
Route::resource('login','AdminController@login');

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
Route::resource('signup','AdminController@signup');


/**
 *	after successful admin's login ........
 */
foreach(Config::get('menus.admin') as $key=>$val){
	$key = strtolower($key);
	Route::resource( $key, 'AdminController@'.$key, array('before'=>'auth'));
	Route::resource( $key.'/new', 'AdminController@'.$key, array('before'=>'auth'));
}
