<?php if($errors->has()): //or $errors->any() ?>
We encountered the following errors:
<ul>
   <?php foreach($errors->all() as $message) : ?>
    <li><?php echo  $message ?></li>
    <?php endforeach ?>
</ul>
<?php endif?>

<form method="post" action="" >
	<p>
		<input type="text" id="username" name="username" placeholder="username" />
	</p>
	<p>
		<input type="text" id="email" name="email" placeholder="email" />
	</p>
	<p>
		<input type="password" id="password" name="password" />
	</p>
	<p>
		<input type="password" id="password_confirmation" name="password_confirmation" />
	</p>
	<p>
		<input type="submit" value="signup" />
	</p>
</form>
