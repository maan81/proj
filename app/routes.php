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

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('login',function(){
	echo '<form method="post" action="'.URL::to('login').'" >';
	echo '<p><input type="text" id="email" name="email" placeholder="email" /></p>';
	echo '<p><input type="password" id="password" name="password" /></p>';
	echo '<p><input type="submit" value="signup" /></p>';
	echo '</form>';
});

Route::post('login',function(){
	$userdata = array(
					'email' 	=> Input::get('email'),
					'password'	=> Input::get('password')
				);
	if(Auth::attempt($userdata)){
		echo 'Success';
	}else{
		echo 'Failure';
	}
});

Route::get('signup',function(){
	echo '<form method="post" action="'.URL::to('login').'" >';
	echo '<p><input type="text" id="username" name="username" placeholder="username" /></p>';
	echo '<p><input type="text" id="email" name="email" placeholder="email" /></p>';
	echo '<p><input type="password" id="password" name="password" /></p>';
	echo '<p><input type="password" id="confirm_password" name="confirm_password" /></p>';
	echo '<p><input type="submit" value="signup" /></p>';
	echo '</form>';
});

Route::post('signup',function(){
});

Route::get('dashboard',function(){
	echo 'welcome to your dashboard.';
});