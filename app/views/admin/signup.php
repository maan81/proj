<?php $no_visible_elements=true; ?>
<?print_r($user);die;?>
<?php echo View::make('admin.header'); ?>	

<div>
	<ul class="breadcrumb">
		<li>
			<a href="<?php echo URL::to('dashboard')?>">Home</a> 
			<span class="divider">/</span>
		</li>
		<li>
			<a href="<?php echo URL::to('users')?>">Users</a>
			<span class="divider">/</span>
		</li>
		<li>
			<a href="<?php echo URL::to('new')?>">
				<?php echo (!empty($user))?	'Show':'New' ?>
			</a>
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

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<div class="box-icon">
				<a href="#" class="btn btn-setting btn-round">
					<i class="icon-cog"></i>
				</a>
				<a href="#" class="btn btn-minimize btn-round">
					<i class="icon-chevron-up"></i>
				</a>
				<a href="#" class="btn btn-close btn-round">
					<i class="icon-remove"></i>
				</a>
			</div>
		</div>
		<div class="box-content">

			<?php echo Form::open(array('class'=>'form-horizontal')) ?>
			  <fieldset>
				<legend>
					<?php echo (!empty($user))?	'Update User':'Enter new User' ?>
				</legend>
				
				<div class="control-group">
				  <label class="control-label" for="typeahead">Name </label>
				  <div class="controls">
					<?php echo Form::text(	'name',
											Input::old('name')/*.$user->name*/,
											array(
												'class'=>'span4',
												'id'=>"typeahead",
												'data-provide'=>"typeahead", 
												'data-items'=>"4",
											));?>
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label" for="typeahead">Username </label>
				  <div class="controls">
					<?php echo Form::text(	'username',
											Input::old('username').$user->username,
											array(
												'class'=>"span4 typeahead",
												'id'=>"typeahead",
												'data-provide'=>"typeahead", 
												'data-items'=>"4",
											));?>
				  </div>
				</div>
				
				<div class="control-group">
				  <label class="control-label" for="typeahead">Password </label>
				  <div class="controls">
					<input type="password" class="span4 typeahead" 
							id="typeahead"  data-provide="typeahead" 
							data-items="4" name="password"/>
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label" for="typeahead">Reenter Password </label>
				  <div class="controls">
					<input type="password" class="span4 typeahead" 
							id="typeahead"  data-provide="typeahead" 
							data-items="4" name="password_confirmation"/>
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label" for="typeahead">Email </label>
				  <div class="controls">
					<?php echo Form::email(	'email',
											Input::old('email').$user->email,
											array(
												'class'=>"span4 typeahead",
												'id'=>"typeahead",
												'data-provide'=>"typeahead", 
												'data-items'=>"4",
											));?>
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label" for="date01">Date input</label>
				  <div class="controls">
					<?php echo Form::text(	'date',
											Input::old('name')/*.$user->date*/,
											array(
												'class'=>"input-xlarge datepicker",
												'id'=>"date01",
											));?>
				  </div>
				</div>

				<div class="control-group">
					<label class="control-label">Activated</label>
					<div class="controls">
						<label class="radio">
							<input type="radio" name="active" 
									id="optionsRadios1" value="published" 
									checked=""/>
							<?php //echo Form::radio('active'),Input::old('active',array(
									//										'id'=>'optionsRadios1',
									//									'value'=>'published'
									//									)),array('id'=>'optionsRadios1',))?>

							Publish
						</label>
						<div style="clear:both"></div>
						<label class="radio">
							<input type="radio" name="active" 
									id="optionsRadios2" value="draft"/>
							<?php //echo Form::radio('active',Input::old('active',array(
									//									'id'=>'optionsRadios2',
									//									'value'=>'draft'
									//									)),array('id'=>'optionsRadios2',))?>
							Draft
						</label>
					</div>
				</div>

				<div class="form-actions">
				  <input type="submit" class="btn btn-primary" name="submit" value="Save" />
				  <a class="btn" href="<?php echo URL::to('users')?>">Cancel</a>
				</div>

			  </fieldset>
			<?php echo Form::close() ?>

		</div>
	</div><!--/span-->

</div><!--/row-->
    

<?php echo View::make('admin.footer')?>
