<?php

class AdminController extends BaseController {


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
		$id=false;
		$task=false;

		$url = explode('/', Request::url());
		foreach($url as $key=>$val){
			if($val=='users'){
				if(!empty($url[$key+1])){
					$id=$url[$key+1];

					if(!empty($url[$key+2])){
						$task=$url[$key+2];
					}
					break;
				}
			}
		}

		if($id){

			$user = DB::table('users')->where('id',$id)->first();

			if($task){
				//do reqd task
			}

			return View::make('admin.user')->with('user', $user);
		}




		$users = DB::table('users')->get();

		return View::make('admin.users')->with('users', $users);
	}


	public function create(){}
	public function store(){}
	public function show(){echo 'in show';}
	public function edit(){}
	public function update(){}
	public function destroy(){echo 'in destroy';}
}