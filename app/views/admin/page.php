<?php $no_visible_elements=true; ?>
<?php //print_r($page);die;?>
<?php echo View::make('admin.header'); ?>	

<div>
	<ul class="breadcrumb">
		<li>
			<a href="<?php echo URL::to('dashboard')?>">Home</a> 
			<span class="divider">/</span>
		</li>
		<li>
			<a href="<?php echo URL::to('pages')?>">pages</a>
			<span class="divider">/</span>
		</li>
		<li>
			<a href="<?php echo URL::to('new')?>">
				<?php echo (!empty($page->id))?	'Show':'New' ?>
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

			<?php echo Form::open( array( 'url'  =>((!empty($page->id))? 
														URL::to('pages/'.$page->id.'/update'):
														Request::url()),
										  'class'=>'form-horizontal')
								) ?>
			  <fieldset>
				<legend>
					<?php echo (!empty($page->id))? 'Update page':'Enter new page' ?>
				</legend>
				
				<div class="control-group">
				  <label class="control-label" for="typeahead">Title </label>
				  <div class="controls">
					<?php echo Form::text(	'title',
											((!empty($page->id))? 
														$page->title:
														Input::old('title')),
											array(
												'class'=>'span4',
												'id'=>"typeahead",
												'data-provide'=>"typeahead", 
												'data-items'=>"4",
											));?>
				  </div>
				</div>



				<div class="control-group">
				  <label class="control-label" for="typeahead">Page </label>
				  <div class="controls">
				  	<script type="text/javascript">
				  	$(function(){setTimeout(function(){ 
				  											$('.cleditorMain')
				  												.eq(0)
				  												.delay(100)
				  												.height(350);
															
															$('iframe').eq(0).height(297)
			  											}) , 100});
				  	</script>
					<?php echo Form::textarea('page',
												((!empty($page->id))? 
															$page->page:
															Input::old('page')),
													array(
														'class'=>'cleditor',
														'rows'=>"3",
													)
											);?>
				  </div>
				</div>

				<div class="control-group">
				
					<label class="control-label" for="textarea2">
						Summary
					</label>
					<div class="controls">
						<?php echo Form::textarea('summary',
														((!empty($page->id))? 
																	$page->summary:
																	Input::old('summary')),

														array(
															'class'=>'cleditor',
															'rows'=>"3",
														)
												);?>
					</div>
				</div>

				
<!--				<div class="control-group">
				  <label class="control-label" for="date01">Date input</label>
				  <div class="controls">
					<?php echo Form::text(	'date',
											((!empty($page->id))? 
														$page->title:
														Input::old('title')),
											array(
												'class'=>"input-xlarge datepicker",
												'id'=>"date01",
											)
										);?>
				  </div>
				</div>
-->
				<div class="form-actions">
				  <input type="submit" class="btn btn-primary" name="submit" value="Save" />
				  <a class="btn" href="<?php echo URL::to('pages')?>">Cancel</a>
				</div>

			  </fieldset>
			<?php echo Form::close() ?>

		</div>
	</div><!--/span-->

</div><!--/row-->
    

<?php echo View::make('admin.footer')?>
