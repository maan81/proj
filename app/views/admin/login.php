
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