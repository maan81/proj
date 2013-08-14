<?php
  //set headers to NOT cache a page
  header("Cache-Control: no-cache, no-store, must-revalidate"); //HTTP 1.1
  header("Pragma: no-cache"); //HTTP 1.0
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!--
		Charisma v1.0.0

		Copyright 2012 Muhammad Usman
		Licensed under the Apache License v2.0
		http://www.apache.org/licenses/LICENSE-2.0

		http://usman.it
		http://twitter.com/halalit_usman
	-->
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
	<meta http-equiv="Pragma" content="no-cache"/>
	<meta http-equiv="Expires" content="0"/>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">


	<title>Free HTML5 Bootstrap Admin Template</title>
	<meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
	<meta name="author" content="Muhammad Usman">



	<!-- The styles -->
	<?php echo HTML::style('admin/css/bootstrap-cerulean.css');?>
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
	<?php echo HTML::style('admin/css/bootstrap-cerulean.css');?>
	<?php echo HTML::style('admin/css/bootstrap-responsive.css');?>
	<?php echo HTML::style('admin/css/charisma-app.css');?>
	<?php echo HTML::style('admin/css/jquery-ui-1.8.21.custom.css');?>
	<?php echo HTML::style('admin/css/fullcalendar.css');?>
	<?php echo HTML::style('admin/css/fullcalendar.print.css');?>
	<?php echo HTML::style('admin/css/chosen.css');?>
	<?php echo HTML::style('admin/css/uniform.default.css');?>
	<?php echo HTML::style('admin/css/colorbox.css');?>
	<?php echo HTML::style('admin/css/jquery.cleditor.css');?>
	<?php echo HTML::style('admin/css/jquery.noty.css');?>
	<?php echo HTML::style('admin/css/noty_theme_default.css');?>
	<?php echo HTML::style('admin/css/elfinder.min.css');?>
	<?php echo HTML::style('admin/css/elfinder.theme.css');?>
	<?php echo HTML::style('admin/css/jquery.iphone.toggle.css');?>
	<?php echo HTML::style('admin/css/opa-icons.css');?>
	<?php echo HTML::style('admin/css/uploadify.css');?>

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="<?php echo URL::to('admin/img/favicon.ico')?>">

	<!-- new href styles-->
	<style type="text/css">
	.new_btn {
		float: right;
		font-size: 10px;
		margin-top: 5px;
		padding-right: 10px;
	}
	.search-query-custom{
		background-color: #fff !important;
		color:#666 !important;
	}
	.code{
		border: 1px solid #E1E1E8;
		color: #000;
		padding: 2px 4px;
		border-radius: 3px 3px 3px 3px;
		font-family: Menlo,Monaco,Consolas,"Courier New",monospace;
		font-size: 12px;
	}
	</style>		

	<!-- jQuery -->
	<script src="<?php echo URL::to('js/jquery-1.7.2.min.js')?>"></script>
</head>

<body>
	<?php if (Session::has('username')) : ?>

		<?php if(!isset($no_visible_elements) || !$no_visible_elements)	{ ?>


		<!-- topbar starts -->
		<div class="navbar">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="brand" href="index.html"> 
						<img alt="Charisma Logo" src="<?php echo URL::to('admin/img/logo20.png')?>" /> 
						<span>Charisma</span>
					</a>
					
					
					<!-- user dropdown starts -->
					<div class="btn-group pull-right" >
						<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="icon-user"></i>
							<span class="hidden-phone">
								<?php echo Session::get('username')?>
							</span>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#">Profile</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo URL::to('logout')?>">Logout</a></li>
						</ul>
					</div>
					<!-- user dropdown ends -->
					
					<div class="top-nav nav-collapse">
						<ul class="nav">
							<li><a href="#">Visit Site</a></li>
							<li>
								<form class="navbar-search pull-left">
									<input placeholder="Search" class="search-query-custom search-query span2" name="query" type="text">
								</form>
							</li>
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		</div>
		<!-- topbar ends -->
		<?php } ?>
		<div class="container-fluid">
			<div class="row-fluid">
			<?php if(!isset($no_visible_elements) || !$no_visible_elements) { ?>
			
				<?php echo View::make('admin.lmenu')?>

				
				<noscript>
					<div class="alert alert-block span10">
						<h4 class="alert-heading">Warning!</h4>
						<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
					</div>
				</noscript>
				
				<div id="content" class="span10">
				<!-- content starts -->
				<?php } ?>

	<?php endif;?>