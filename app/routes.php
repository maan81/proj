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
//	$key = strtolower($key);
//	Route::resource( $key, 'AdminController@'.$key, array('before'=>'auth'));
	//Route::resource( $key.'/new', 'AdminController@'.$key, array('before'=>'auth'));
	//Route::resource( $key.'/*', 'AdminController@'.$key, array('before'=>'auth'));
//	Route::resource( $key.'/(.*)', 'AdminController@'.$key, array('before'=>'auth'));
}

Route::resource('dashboard', 'AdminController@dashboard', array('before'=>'auth'));
Route::resource('users', 'AdminController@users', array('before'=>'auth'));
//Route::resource('users/{id}', 'AdminController@users', array('before'=>'auth'));
Route::get('users/{id}', 'AdminController@users', array('before'=>'auth'));
Route::post('users/{id}', 'AdminController@users', array('before'=>'auth'));
Route::get('users/{id}/{pages}', 'AdminController@users', array('before'=>'auth'));
Route::post('users/{id}/{pages}', 'AdminController@users', array('before'=>'auth'));



Route::resource('pages', 'AdminController@pages', array('before'=>'auth'));
Route::get('pages/{id}', 'AdminController@pages', array('before'=>'auth'));
Route::post('pages/{id}', 'AdminController@pages', array('before'=>'auth'));
Route::get('pages/{id}/{pages}', 'AdminController@pages', array('before'=>'auth'));
Route::post('pages/{id}/{pages}', 'AdminController@pages', array('before'=>'auth'));



Route::resource('polls', 'AdminController@polls', array('before'=>'auth'));
Route::get('polls/{id}', 'AdminController@polls', array('before'=>'auth'));
Route::post('polls/{id}', 'AdminController@polls', array('before'=>'auth'));
Route::get('polls/{id}/{pages}', 'AdminController@polls', array('before'=>'auth'));
Route::post('polls/{id}/{pages}', 'AdminController@polls', array('before'=>'auth'));


Route::resource('ads', 'AdminController@ads', array('before'=>'auth'));
Route::get('ads/{id}', 'AdminController@ads', array('before'=>'auth'));
Route::post('ads/{id}', 'AdminController@ads', array('before'=>'auth'));
Route::get('ads/{id}/{pages}', 'AdminController@ads', array('before'=>'auth'));
Route::post('ads/{id}/{pages}', 'AdminController@ads', array('before'=>'auth'));


Route::resource('gallery', 'AdminController@gallery', array('before'=>'auth'));
