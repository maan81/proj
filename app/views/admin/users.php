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
				<a href="users_new.html" style=""><span style="">Create New</span></a>
			</div>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>Username</th>
					  <th>Email</th>
					  <th>Date Registered</th>
					  <th>Date Upated</th>
					  <th>Actions</th>
				  </tr>
			  </thead>   
			  <tbody>
				<?php foreach ($users as $user): ?>
				  	<tr>
				  		<td><?php echo $user->username?></td>
				  		<td><?php echo $user->email?></td>
				  		<td><?php echo $user->created_at?></td>
				  		<td><?php echo $user->updated_at?></td>
						<td class="center">
							<a class="btn btn-success" 
									style="float:left; margin-right:4px;"
									href="<?php echo URL::to('users/'.$user->id)?>">
								<i class="icon-zoom-in icon-white"></i>  
								View                                            
							</a>
							<?php echo Form::open(array('route'=>array('users.destroy', 
																			$user->id
																		), 
														'method' => 'delete',
														)
													) 
							?>
							    <button type="submit" 
							    		href="<?php echo URL::route('users.destroy', 
							    									$user->id) ?>" 
										class="btn btn-danger">
									<i class="icon-trash icon-white"></i> 
									Delete
								</button>
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
