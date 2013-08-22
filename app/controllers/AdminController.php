<?php

class AdminController extends BaseController {

	//public function __construct(){echo 'asdf';die;}


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

			//disp empty form to create new user
			if($id=='new'){
	
				//store new user
				if(!empty($_POST)){
					return $this->store();
				}

				//disp empty signup form
				$user = (object)array(	'name'	  =>'',
										'username'=>'',
										'email'	  =>'',
									);
				return View::make('admin.signup')->with('user',$user);
			}

			//do update, delete
			if($task){

				if($task=='update'){

					//update user
					$user = (object)array(	'name'	  =>'',
											'username'=>'',
											'email'	  =>'',
										);
					return $this->store($id);
				}

				elseif($task=='delete'){

					//delete user
					return $this->delete($id);
				}
			}

			//get data & disp. selected user for editing
			$user = DB::table('users')->where('id',$id)->first();

			// if(empty($user)){
			// 	return View::make('admin.users')->withErrors($error);
			// }
			return View::make('admin.signup')->with('user', $user);
		}




		$users = DB::table('users')->get();

		return View::make('admin.users')->with('users', $users);
	}


	public function pages(){ 

		if (!Session::has('username')) return Redirect::to('login');
		$id=false;
		$task=false;

		$url = explode('/', Request::url());
		foreach($url as $key=>$val){
			if($val=='pages'){
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

			//disp empty form to create new page
			if($id=='new'){
	
				//store new page
				if(!empty($_POST)){
					return $this->store_page();
				}

				//disp empty new form
				$page = (object)array(	'username'=>'',
										'page'	  =>'',
									);
				return View::make('admin.page')->with('page',$page);
			}

			//do update, delete
			if($task){

				if($task=='update'){

					//update page
					$page = (object)array(	'username'=>'',
											'page'	  =>'',
										);
					return $this->store_page($id);
				}

				elseif($task=='delete'){

					//delete page
					return $this->delete($id,'pages');
				}
			}

			//get data & disp. selected page for editing
			$page = DB::table('pages')->where('id',$id)->first();

			// if(empty($page)){
			// 	return View::make('admin.pages')->withErrors($error);
			// }
			return View::make('admin.page')->with('page', $page);
		}




		$pages = DB::table('pages')->get();

		return View::make('admin.pages')->with('pages', $pages);
	}


	public function polls(){ 

		if (!Session::has('username')) return Redirect::to('login');
		$id=false;
		$task=false;

		$url = explode('/', Request::url());
		foreach($url as $key=>$val){
			if($val=='polls'){
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

			//disp empty form to create new poll
			if($id=='new'){
	
				//store new poll
				if(!empty($_POST)){
					return $this->store_poll();
				}

				//disp empty new form
				$poll = (object)array(	'question'	=>'',
										'answer_1'	=>'',
										'answer_2'	=>'',
										'answer_3'	=>'',
										'answer_4'	=>'',
										'count_1'	=>'',
										'count_2'	=>'',
										'count_3'	=>'',
										'count_4'	=>'',
									);
				return View::make('admin.poll')->with('poll',$poll);
			}

			//do update, delete
			if($task){

				if($task=='update'){

					//update poll
					$poll = (object)array(	'question'	=>'',
											'answer_1'	=>'',
											'answer_2'	=>'',
											'answer_3'	=>'',
											'answer_4'	=>'',
											'count_1'	=>'',
											'count_2'	=>'',
											'count_3'	=>'',
											'count_4'	=>'',
										);
					return $this->store_poll($id);
				}

				elseif($task=='delete'){

					//delete poll
					return $this->delete($id,'polls');
				}
			}

			//get data & disp. selected poll for editing
			$poll = DB::table('polls')->where('id',$id)->first();

			// if(empty($poll)){
			// 	return View::make('admin.polls')->withErrors($error);
			// }
			return View::make('admin.poll')->with('poll', $poll);
		}


		$polls = DB::table('polls')->get();

		return View::make('admin.polls')->with('polls', $polls);
	}

	public function ads(){

		if (!Session::has('username')) return Redirect::to('login');
		$id=false;
		$task=false;

		$url = explode('/', Request::url());
		foreach($url as $key=>$val){
			if($val=='ads'){
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

			if($id=='new'){
	
				//store new ad
				if(!empty($_POST)){
					return $this->store_ad();
				}

				//disp empty new form
				$ad = (object)array(	'title'	=>'',
										'type'	=>'',
										'image'	=>'',
										'link'	=>'',
										'script'=>'',
									);
				return View::make('admin.ad')->with('ad',$ad);
			}

			//do update, delete
			if($task){

				if($task=='update'){

					//update ad
					$ad = (object)array(	'title'	=>'',
											'type'	=>'',
											'image'	=>'',
											'link'	=>'',
											'script'=>'',
										);
					return $this->store_ad($id);
				}

				elseif($task=='delete'){

					//delete ad
					return $this->delete($id,'ads');
				}
			}

			//get data & disp. selected ad for editing
			$ad = DB::table('ads')->where('id',$id)->first();

			// if(empty($ad)){
			// 	return View::make('admin.ads')->withErrors($error);
			// }
			return View::make('admin.ad')->with('ad', $ad);

		}

		$ads = DB::table('ads')->get();

		return View::make('admin.ads')->with('ads', $ads);
	}


	public function gallery(){

		Connector::init();
die;
		echo 'jaskjds';
		die;
	}


	private function delete($delete_id=false,$table='users'){

		//validate
		$rules = array(	'id' => 'required|integer');

		$validator = Validator::make(array('id'=>$delete_id), $rules);

		if($validator->fails()){
			return Redirect::to($table)->withErrors($validator)->withInput();
	  	}

		
		switch($table){
			case 'user' : $item = User::find($delete_id); break;
			case 'pages': $item = Page::find($delete_id); break;
			case 'polls': $item = Poll::find($delete_id); break;
			case 'ads':   $item = Ad::find($delete_id); 
						  if($item->type=='image'){
							foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator('public/ads-imgs/', FilesystemIterator::SKIP_DOTS), RecursiveIteratorIterator::CHILD_FIRST) as $path) {
							    $path->isFile() ? unlink($path->getPathname()) : rmdir($path->getPathname());
							}
						  }
						break;
		}

		if($item->delete()){
			
			//Session::put('username', $userdata['email']);
			return Redirect::to($table)->with('success', 'Item ID '.$delete_id.' deleted.');

		// }else{

		// 	//Session::put('username', $userdata['email']);
		// 	return Redirect::to('users')->withErrors('error','Invalid ID');
		}
	}

	private function store_ad($update_id=false){

		//validate
		$rules = array(	'title'=>'required',
					);
		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){

			if($update_id)
			    return Redirect::to('ads/'.$update_id)->withErrors($validator)->withInput();

		    return Redirect::to('ads/new')->withErrors($validator)->withInput();
		}

		//store new data
		if(!$update_id){
			$userdata = array(	'title'=>Input::get('title'),
								'type' =>Input::get('type'),
							);
			
			if($userdata['type']=='script'){
				$userdata['script']=Input::get('script');
			}elseif($userdata['type']=='image'){
				$userdata['url']=Input::get('url');
			
				//---------------------------
				$file = Input::file('ad');

				$rand_name = str_random(8);
				$userdata['image']=$rand_name;

				$destinationPath = 'public/ads-imgs/'.$rand_name;
				$filename = $file->getClientOriginalName();
				//$extension =$file->getClientOriginalExtension(); 
				$upload_success = Input::file('ad')->move($destinationPath, $filename);

				if( $upload_success ) {
					$upload_result = true;
				} else {
					echo 'err uploading';
					die;
					$upload_result = false;
				}
				//---------------------------
			}

			$ad = new Ad($userdata);

		//update existing data
		}else{
			$ad 		= Ad::find($update_id);
			$ad->title	= Input::get('title');
			$ad->type	= Input::get('type');
			if($userdata['type']=='script'){
				$userdata['script']=Input::get('script');
			}elseif($userdata['type']=='image'){
				$userdata['url']=Input::get('url');
//	$userdata['image']=Input::get('image');
			}
		}

		$ad->save();

		return Redirect::to('ads/'.$ad->id);
	}

	private function store_poll($update_id=false){

		//validate
		$rules = array(	'question'=>'required|min:5',
						'answer_1'=>'required',
						'answer_2'=>'required',
						'answer_3'=>'required',
						'answer_4'=>'required',
					);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			if($update_id)
			    return Redirect::to('polls/'.$update_id)->withErrors($validator)->withInput();

		    return Redirect::to('polls/new')->withErrors($validator)->withInput();
		}


		//store new data
		if(!$update_id){
			$userdata = array(	'question'=>Input::get('question'),
								'answer_1'=>Input::get('answer_1'),
								'answer_2'=>Input::get('answer_2'),
								'answer_3'=>Input::get('answer_3'),
								'answer_4'=>Input::get('answer_4'),
							);
			$poll = new Poll($userdata);


		//update existing data
		}else{
			$poll 			= Poll::find($update_id);
			$poll->question	= Input::get('question');
			$poll->answer_1	= Input::get('answer_1');
			$poll->answer_2	= Input::get('answer_2');
			$poll->answer_3	= Input::get('answer_3');
			$poll->answer_4	= Input::get('answer_4');
		}

		$poll->save();

		return Redirect::to('polls/'.$poll->id);
	}

	private function store_page($update_id=false){

		//validate
		$rules = array('title'=>'required'/*extend name validation .....*/ );

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			if($update_id)
			    return Redirect::to('pages/'.$update_id)->withErrors($validator)->withInput();

		    return Redirect::to('pages/new')->withErrors($validator)->withInput();
		}


		//store new data
		if(!$update_id){
			$userdata = array(
								'title'	=>Input::get('title'),
								'page'	=>Input::get('page'),
								'summary'=>Input::get('summary'),
						);
			$page = new Page($userdata);


		//update existing data
		}else{
			$page 			= Page::find($update_id);
			$page->title	= Input::get('title');
			$page->page 	= Input::get('page');
			$page->summary	= Input::get('summary');
		}

		$page->save();

		return Redirect::to('pages/'.$page->id);
	}

	private function store($update_id=false){

		//validate
		$rules = array(	'name'	   => 'required', //extend name validation .....
						'password' => 'required|min:5|confirmed',
						'email'	   => 'required|email'
					);
		if(!$update_id){
			$rules['username'] = 'required|min:5|alpha_dash|unique:users';
		}

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			if($update_id)
			    return Redirect::to('users/'.$update_id)->withErrors($validator)->withInput();

		    return Redirect::to('users/new')->withErrors($validator)->withInput();
		}


		//store new data
		if(!$update_id){
			$userdata = array(
								'name'		=>Input::get('name'),
								'username'	=>Input::get('username'),
								'password'	=>Input::get('password'),
								'email'		=>Input::get('email')
						);
			$user = new User($userdata);


		//update existing data
		}else{
			$user = User::find($update_id);
			$user->name		= Input::get('name');
			//$user->Username = Input::get('username');
			$user->Password = Input::get('password');
			$user->email 	= Input::get('email');
		}
		$user->password = Hash::make(Input::get('password'));
		$user->save();


		//Session::put('username', $userdata['email']);
		return Redirect::to('users/'.$user->id);
	}

}