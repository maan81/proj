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
Route::get('dashboard',array('before'=>'auth',function(){
	echo 'welcome to your dashboard. <a href="'.URL::to('logout').'">Logout</a>';
}));

/**
 * logout user
 */
Route::get('logout',function(){
	Auth::logout();
	return Redirect::to('login');
});