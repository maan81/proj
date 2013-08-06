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
	welcome to your dashboard <?php echo Session::get('username')?> 

	<a href="<?php echo URL::to('logout')?>">Logout</a>
</body>
</html>
