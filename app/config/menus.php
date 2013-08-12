<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Admin Menu
	|--------------------------------------------------------------------------
	*/
	'admin' => array(
		
				'Dashboard' => array(
								'url'	=> URL::to('/dashboard'),
								'class'	=> 'icon-home',

							),
				'Advertizements' => array(
								'url'	=> URL::to('/ads'),
								'class'	=> 'icon-list',
							),
				'Pages'	=> array(
								'url'	=> URL::to('pages'),
								'class'	=> 'icon-list',
							),
				'Polls'	=> array(
								'url'	=> URL::to('polls'),
								'class'	=> 'icon-list',
							),
				'Gallery'	=> array(
								'url'	=> URL::to('gallery'),
								'class'	=> 'icon-picture',
							),
				'Users'	=> array(
								'url'	=> URL::to('users'),
								'class'	=> 'icon-user',
							),
			),
);

