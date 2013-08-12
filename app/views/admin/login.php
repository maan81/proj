<?php echo View::make('admin.header')?>	

<div class="row-fluid">
	<div class="span12 center login-header">
		<h2>Welcome to Charisma</h2>
	</div><!--/span-->
</div><!--/row-->

<div class="row-fluid">
	<div class="well span5 center login-box">
		<?php if(Session::has('flash_notice')) :?>
	    <div class="error alert alert-info">
	        <p><?php echo Session::get('flash_notice') ?></p>
	    </div>
		<?php endif?>
		<form class="form-horizontal" method="post" action="" >

			<fieldset>
				<div class="input-prepend" title="Username" data-rel="tooltip">
					<span class="add-on"><i class="icon-user"></i></span>
					<input autofocus class="input-large span10" name="email" 
						id="email" type="text" value="" 
						placeholder="email" />
				</div>
				<div class="clearfix"></div>

				<div class="input-prepend" title="Password" data-rel="tooltip">
					<span class="add-on"><i class="icon-lock"></i></span>
					<input class="input-large span10" name="password" 
						id="password" type="password" value=""
						placeholder="password" />
				</div>
				<div class="clearfix"></div>

				<div class="input-prepend">
				<label class="remember" for="remember">
					<input type="checkbox" id="remember" />Remember me
				</label>
				</div>
				<div class="clearfix"></div>

				<p class="center span5">
					<input type="submit" class="btn btn-primary" name="Login" />
				</p>
			</fieldset>
		</form>
	</div><!--/span-->
</div><!--/row-->
<a href="<?php echo URL::to('signup')?>">Signup</a>


<?php echo View::make('admin.footer')?>