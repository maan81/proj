<?php $no_visible_elements=true; ?>
<?php //print_r($poll);die;?>
<?php echo View::make('admin.header'); ?>	

<div>
	<ul class="breadcrumb">
		<li>
			<a href="<?php echo URL::to('dashboard')?>">Home</a> 
			<span class="divider">/</span>
		</li>
		<li>
			<a href="<?php echo URL::to('polls')?>">polls</a>
			<span class="divider">/</span>
		</li>
		<li>
			<a href="<?php echo URL::to('new')?>">
				<?php echo (!empty($poll->id))?	'Show':'New' ?>
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

			<?php echo Form::open( array( 'url'  =>((!empty($poll->id))? 
														URL::to('polls/'.$poll->id.'/update'):
														Request::url()),
										  'class'=>'form-horizontal')
								) ?>
			  <fieldset>
				<legend>
					<?php echo (!empty($poll->id))? 'Update poll':'Enter new poll' ?>
				</legend>
				
				<div class="control-group">
					<label class="control-label" for="typeahead">Question </label>
					<div class="controls">
						<?php echo Form::text(	'question',
												((!empty($poll->id))? 
															$poll->question:
															Input::old('question')),
												array(
													'class'		=>'span6',
													'id'		=>"typeahead",
													'data-provide'=>"typeahead", 
													'data-items'=>"4",
												)
											);?>
					</div>
				</div>


				<div class="control-group">
					<label class="control-label" for="typeahead">Answer 1 </label>
					<div class="controls">
						<?php echo Form::text(	'answer_1',
												((!empty($poll->id))? 
															$poll->answer_1:
															Input::old('answer_1')),
												array(
													'class'		=>'span6',
													'id'		=>"typeahead",
													'data-provide'=>"typeahead", 
													'data-items'=>"4",
												)
											);?>
					</div>
				</div>


				<div class="control-group">
					<label class="control-label" for="typeahead">Answer 2 </label>
					<div class="controls">
						<?php echo Form::text(	'answer_2',
												((!empty($poll->id))? 
															$poll->answer_2:
															Input::old('answer_2')),
												array(
													'class'		=>'span6',
													'id'		=>"typeahead",
													'data-provide'=>"typeahead", 
													'data-items'=>"4",
												)
											);?>
					</div>
				</div>


				<div class="control-group">
					<label class="control-label" for="typeahead">Answer 3 </label>
					<div class="controls">
						<?php echo Form::text(	'answer_3',
												((!empty($poll->id))? 
															$poll->answer_3:
															Input::old('answer_3')),
												array(
													'class'		=>'span6',
													'id'		=>"typeahead",
													'data-provide'=>"typeahead", 
													'data-items'=>"4",
												)
											);?>
					</div>
				</div>


				<div class="control-group">
					<label class="control-label" for="typeahead">Answer 4 </label>
					<div class="controls">
						<?php echo Form::text(	'answer_4',
												((!empty($poll->id))? 
															$poll->answer_4:
															Input::old('answer_4')),
												array(
													'class'		=>'span6',
													'id'		=>"typeahead",
													'data-provide'=>"typeahead", 
													'data-items'=>"4",
												)
											);?>
					</div>
				</div>


				<div class="form-actions">
				  <input type="submit" class="btn btn-primary" name="submit" value="Save" />
				  <a class="btn" href="<?php echo URL::to('polls')?>">Cancel</a>
				</div>

			  </fieldset>
			<?php echo Form::close() ?>

		</div>
	</div><!--/span-->

</div><!--/row-->
    

<?php echo View::make('admin.footer')?>
