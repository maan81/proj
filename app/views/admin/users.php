<?php $no_visible_elements=true; ?>

<?php echo View::make('admin.header'); ?>	


<div>
	<ul class="breadcrumb">
		<li>
			<a href="#">Home</a> <span class="divider">/</span>
		</li>
		<li>
			<a href="#">Users</a>
		</li>
	</ul>
</div>

<?php if($errors->has()): //or $errors->any() ?>
<div class="alert alert-error">
	<button data-dismiss="alert" class="close" type="button">×</button>
	<ul>
	   <?php foreach($errors->all() as $message) : ?>
	    <li><?php echo  $message ?></li>
	    <?php endforeach ?>
	</ul>
</div>
<?php endif?>

<?php if(Session::has('success')): ?>
<div class="alert alert-success">
	<button data-dismiss="alert" class="close" type="button">×</button>
	<?php echo Session::get('success') ?>
</div>
<?php endif?>

<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-user"></i> Users</h2>
			<div class="box-icon">
				<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
				<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
				<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
			</div>
			<div class="new_btn">
				<a href="<?php echo URL::to('users/new')?>" style="">
					<span style="">Create New</span>
				</a>
			</div>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
				  	  <th>ID</th>
					  <th>Username</th>
					  <th>Email</th>
					  <th>Date Registered</th>
					  <th>Date Updated</th>
					  <th>Actions</th>
				  </tr>
			  </thead>   
			  <tbody>
				<?php foreach ($users as $user): ?>
				  	<tr>
				  		<td width="5%"><?php echo $user->id?></td>
				  		<td width="24%"><?php echo $user->username?></td>
				  		<td width="16%"><?php echo $user->email?></td>
				  		<td width="16%"><?php echo $user->created_at?></td>
				  		<td width="16%"><?php echo $user->updated_at?></td>
						<td class="center">
							<a class="btn btn-success" 
									style="float:left; margin-right:4px;"
									href="<?php echo URL::to('users/'.$user->id)?>">
								<i class="icon-zoom-in icon-white"></i>  
								View                                            
							</a>
							<?php echo Form::open( array('url'=>(URL::to('users/'.$user->id.'/delete') ) ) ) ?>
								<input type="submit" class="btn btn-danger" name="submit" value="Delete" />
							<?php echo Form::close() ?>
						</td>
				  	</tr>
				<?php endforeach?>

			  </tbody>
		  </table>            
		</div>
	</div><!--/span-->

</div><!--/row-->

<?php echo View::make('admin.footer')?>
