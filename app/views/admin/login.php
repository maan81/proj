<?php
  //set headers to NOT cache a page
  header("Cache-Control: no-cache, no-store, must-revalidate"); //HTTP 1.1
  header("Pragma: no-cache"); //HTTP 1.0
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
?>

<html>
<head>
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
	<meta http-equiv="Pragma" content="no-cache"/>
	<meta http-equiv="Expires" content="0"/>
</head>
<body>

	<?php if(Session::has('flash_notice')) :?>
    <div class="error">
        <p><?php echo Session::get('flash_notice') ?></p>
    </div>
	<?php endif?>

	<form method="post" action="" >
		<p>
			<input type="text" id="email" name="email" placeholder="email" />
		</p>
		<p>
			<input type="password" id="password" name="password" />
		</p>
		<p>
			<input type="submit" name='submit' value="Login" />
		</p>
	</form>

	<a href="<?php echo URL::to('signup')?>">Signup</a>
</body>
</html>


