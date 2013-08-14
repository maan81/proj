<?php $no_visible_elements=true; ?>

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
			<a href="<?php echo URL::to('user')?>">Show</a>
		</li>
	</ul>
</div>

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
			<form class="form-horizontal">
			  <fieldset>
				<legend>Enter new Users</legend>
				
				<div class="control-group">
				  <label class="control-label" for="typeahead">Name </label>
				  <div class="controls">
					<input type="text" class="span4 typeahead" 
							id="typeahead"  data-provide="typeahead" data-items="4" />
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label" for="typeahead">Username </label>
				  <div class="controls">
					<input type="text" class="span4 typeahead" 
							id="typeahead"  data-provide="typeahead" data-items="4" />
				  </div>
				</div>
				
				<div class="control-group">
				  <label class="control-label" for="typeahead">Password </label>
				  <div class="controls">
					<input type="password" class="span4 typeahead" 
							id="typeahead"  data-provide="typeahead" data-items="4" />
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label" for="typeahead">Reenter Password </label>
				  <div class="controls">
					<input type="password" class="span4 typeahead" 
							id="typeahead"  data-provide="typeahead" data-items="4" />
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label" for="typeahead">Email </label>
				  <div class="controls">
					<input type="text" class="span4 typeahead" 
							id="typeahead"  data-provide="typeahead" data-items="4" />
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label" for="date01">Date input</label>
				  <div class="controls">
					<input type="text" class="input-xlarge datepicker" id="date01" value="">
				  </div>
				</div>

				<div class="control-group">
					<label class="control-label">Activated</label>
					<div class="controls">
						<label class="radio">
							<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
							Publish
						</label>
						<div style="clear:both"></div>
						<label class="radio">
							<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
							Draft
						</label>
					</div>
				</div>

				<div class="form-actions">
				  <input type="submit" class="btn btn-primary" name="submit" value="Save" />
				  <a class="btn" href="ads.html">Cancel</a>
				</div>

			  </fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->
    

<?php echo View::make('admin.footer')?>
