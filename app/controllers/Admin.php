<?php

class Admin extends BaseController {

	/**
	 *	login route
	 */
	public function login(){
		if (Session::has('username')) return Redirect::to('dashboard');

		//disp login page if empty
		if(empty($_POST)) return View::make('admin.login');

	
		$userdata = array(
						'email' 	=> Input::get('email'),
						'password'	=> Input::get('password')
					);

		//validate
		if(Auth::attempt($userdata,!empty(Input::get('remember')))){
			Session::put('username', $userdata['email']);
			return Redirect::to('dashboard');
		}else{
			Session::forget('username');
			//echo 'Failure';
			return Redirect::to('login')->with('flash_notice', 'Invalid Username and/or Password.');
		}
	}



	/**
	 * Signup 
	 */
	public function signup(){

		//empty signup page
		if(empty($_POST)) return View::make('admin.signup');


		$username = Input::get('username');
		$password = Input::get('password');
		$email	  = Input::get('email');

		$userdata = array(
						'username' 	=> Input::get('username'),
						'password'	=> Input::get('password'),
						'email' 	=> Input::get('email'),
					);

		//validate
		$rules = array(	'username' => 'required|min:5|alpha_dash|unique:users',
						'password' => 'required|min:5|confirmed',
						'email'	   => 'required|email'
					);
				
 	
	 	$validator = Validator::make(Input::all(), $rules);
	    if ($validator->fails()){
	        return Redirect::to('signup')->withErrors($validator);
	    }

	    //store new data
		$user = new User($userdata);
		$user->password = Hash::make(Input::get('password'));
		$user->save();

		Session::put('username', $userdata['email']);
		return Redirect::to('dashboard');
	}


	/**
	 * Dashboard controller
	 */
	public function dashboard(){
		if (!Session::has('username')) return Redirect::to('login');
		
		return View::make('admin.dashboard');
	}

	public function users(){
		if (!Session::has('username')) return Redirect::to('login');

		return 'in users';
	}
}