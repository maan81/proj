<?php $no_visible_elements=true; ?>
<?php //print_r($ad);die;?>
<?php echo View::make('admin.header'); ?>	

<div>
	<ul class="breadcrumb">
		<li>
			<a href="<?php echo URL::to('dashboard')?>">Home</a> 
			<span class="divider">/</span>
		</li>
		<li>
			<a href="<?php echo URL::to('ads')?>">ads</a>
			<span class="divider">/</span>
		</li>
		<li>
			<a href="<?php echo URL::to('new')?>">
				<?php echo (!empty($ad->id))?	'Show':'New' ?>
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
			<?php 	if(!empty($ad->id)){ 
						echo '<div class="form-horizontal">';
					}else{
						echo Form::open(	array(	'url'=>Request::url(),
												  	'class'=>'form-horizontal',
												  	'files'=>true
											)
										);
					}
			?>
			  <fieldset>
				<legend>
					<?php echo (!empty($ad->id))? 'Update ad':'Enter new ad' ?>
				</legend>
				
				<div class="control-group">
				  <label class="control-label" for="typeahead">Title </label>
				  <div class="controls">
					<?php 
						if (empty($ad->id)){
							echo Form::text('title', 
											Input::old('title'),
											array(
												'class'=>'span4',
												'id'=>"typeahead",
												'data-provide'=>"typeahead", 
												'data-items'=>"4",
											)
										);
						}else{
							echo '<span class="uneditable-input span4">'.$ad->title.'</span>';
						}
					?>

				  </div>
				</div>


				<div class="control-group">
					<label class="control-label" for="selectError3">Ads Type</label>
					<div class="controls">
						<?php 
							if(empty($ad->id)){

								echo Form::select(	'type', 
													array(
														'image'	=>'Image and URL',
														'script'=>'HTML & Script'
													), 
													Input::old('type'), 
													array('id'=>"selectError3")
												);
							}else{
								echo '<span class="uneditable-input span4">'.ucwords($ad->type)."</span>";
							}
						?>
					</div>
				</div>


				<style type="text/css">.hide{display:none;}</style>
				<script type="text/javascript">
				$(function(){
					$('select').change(function(){
						var cl = $(this).val()+'_class';

						if(cl=='script_class'){

							$('.script_class').removeClass('hide')
							$('.image_class').addClass('hide')

						}else{
							$('.image_class').removeClass('hide')
							$('.script_class').addClass('hide')
						}
					})
					<?php if(empty($ad->id)){ ?>
							$('.script_class').addClass('hide')
							$('.image_class').addClass('hide')
					<?php }elseif($ad->type=='script'){ ?>
							$('.image_class').addClass('hide')
					<?php }elseif($ad->type=='image'){	?>
							$('.script_class').addClass('hide')
					<?php }	?>

				})
				</script>

				<div class="control-group <?php ($ad->type!='script')?'hide':'';?> image_class" >
				  <label class="control-label" for="typeahead">URL </label>
				  <div class="controls">
					<?php 
						if (empty($ad->id)){
							echo Form::text('url',
											Input::old('url'), 
											array(
												'class'=>'span4',
												'id'=>"typeahead",
												'data-provide'=>"typeahead", 
												'data-items'=>"4",
											)
										);
						}else{
							echo '<span class="uneditable-input span4">'.$ad->url.'</span>';
						}
					?>
				  </div>
				</div>


				<div class="control-group <?php ($ad->type!='script')?'hide':'';?> image_class">
				  <label class="control-label" for="typeahead">Select Image </label>
				  <div class="controls">
					<?php 

					echo Form::file('ad',array(	'class'	=>"input-file uniform_on",
												'id'	=>"fileInput"
												)
									)
					?>

				  </div>
				</div>          




				<div class="control-group <?php ($ad->type!='image')?'hide':'';?> script_class">
				  <label class="control-label" for="typeahead">HTML/Script </label>
				  <div class="controls">
				  	<!-- script form -->

						<?php echo Form::textarea(	'script',
											((!empty($ad->id))? 
														$ad->script:
														Input::old('sript')),
											array(
												'rows'=>'3',
												'span'=>'6,'
											));?>
				  </div>
				</div>


				<div class="form-actions">
			
					<?php if(empty($ad->id)): ?>
							<input type="submit" class="btn btn-primary" name="submit" value="Save" />
					<?php endif;	?>

					<a class="btn" href="<?php echo URL::to('ads')?>">
						<?php echo (!empty($ad->id))? 'Done':'Cancel' ?></a>
				</div>

			  </fieldset>

			<?php  echo (!empty($ad->id))?'</div>': Form::close(); ?>

		</div>
	</div><!--/span-->

</div><!--/row-->
    

<?php echo View::make('admin.footer')?>
