		<?php if(!isset($no_visible_elements) || !$no_visible_elements)	{ ?>
			<!-- content ends -->
			</div><!--/#content.span10-->
		<?php } ?>
		</div><!--/fluid-row-->
		<?php if(!isset($no_visible_elements) || !$no_visible_elements)	{ ?>
		
		<hr>

		<div class="modal hide fade" id="myModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Settings</h3>
			</div>
			<div class="modal-body">
				<p>Here settings can be configured...</p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Close</a>
				<a href="#" class="btn btn-primary">Save changes</a>
			</div>
		</div>

		<footer>
			<p class="pull-left">&copy; <a href="http://usman.it" target="_blank">Muhammad Usman</a> <?php echo date('Y') ?></p>
			<p class="pull-right">Powered by: <a href="http://usman.it/free-responsive-admin-template">Charisma</a></p>
		</footer>
		<?php } ?>

	</div><!--/.fluid-container-->

	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<!-- jQuery UI -->
	<?php echo HTML::script('admin/js/jquery-ui-1.8.21.custom.min.js');?>
	<!-- transition / effect library -->
	<?php echo HTML::script('admin/js/bootstrap-transition.js');?>
	<!-- alert enhancer library -->
	<?php echo HTML::script('admin/js/bootstrap-alert.js');?>
	<!-- modal / dialog library -->
	<?php echo HTML::script('admin/js/bootstrap-modal.js');?>
	<!-- custom dropdown library -->
	<?php echo HTML::script('admin/js/bootstrap-dropdown.js');?>
	<!-- scrolspy library -->
	<?php echo HTML::script('admin/js/bootstrap-scrollspy.js');?>
	<!-- library for creating tabs -->
	<?php echo HTML::script('admin/js/bootstrap-tab.js');?>
	<!-- library for advanced tooltip -->
	<?php echo HTML::script('admin/js/bootstrap-tooltip.js');?>
	<!-- popover effect library -->
	<?php echo HTML::script('admin/js/bootstrap-popover.js');?>
	<!-- button enhancer library -->
	<?php echo HTML::script('admin/js/bootstrap-button.js');?>
	<!-- accordion library (optional, not used in demo) -->
	<?php echo HTML::script('admin/js/bootstrap-collapse.js');?>
	<!-- carousel slideshow library (optional, not used in demo) -->
	<?php echo HTML::script('admin/js/bootstrap-carousel.js');?>
	<!-- autocomplete library -->
	<?php echo HTML::script('admin/js/bootstrap-typeahead.js');?>
	<!-- tour library -->
	<?php echo HTML::script('admin/js/bootstrap-tour.js');?>
	<!-- library for cookie management -->
	<?php echo HTML::script('admin/js/jquery.cookie.js');?>
	<!-- calander plugin -->
	<?php echo HTML::script('admin/js/fullcalendar.min.js');?>
	<!-- data table plugin -->
	<?php echo HTML::script('admin/js/jquery.dataTables.min.js');?>

	<!-- chart libraries start -->
	<?php echo HTML::script('admin/js/excanvas.js');?>
	<?php echo HTML::script('admin/js/jquery.flot.min.js');?>
	<?php echo HTML::script('admin/js/jquery.flot.pie.min.js');?>
	<?php echo HTML::script('admin/js/jquery.flot.stack.js');?>
	<?php echo HTML::script('admin/js/jquery.flot.resize.min.js');?>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	<?php echo HTML::script('admin/js/jquery.chosen.min.js');?>
	<!-- checkbox, radio, and file input styler -->
	<?php echo HTML::script('admin/js/jquery.uniform.min.js');?>
	<!-- plugin for gallery image view -->
	<?php echo HTML::script('admin/js/jquery.colorbox.min.js');?>
	<!-- rich text editor library -->
	<?php echo HTML::script('admin/js/jquery.cleditor.min.js');?>
	<!-- notification plugin -->
	<?php echo HTML::script('admin/js/jquery.noty.js');?>
	<!-- file manager library -->
	<?php echo HTML::script('admin/js/jquery.elfinder.min.js');?>
	<!-- star rating plugin -->
	<?php echo HTML::script('admin/js/jquery.raty.min.js');?>
	<!-- for iOS style toggle switch -->
	<?php echo HTML::script('admin/js/jquery.iphone.toggle.js');?>
	<!-- autogrowing textarea plugin -->
	<?php echo HTML::script('admin/js/jquery.autogrow-textarea.js');?>
	<!-- multiple file upload plugin -->
	<?php echo HTML::script('admin/js/jquery.uploadify-3.1.min.js');?>
	<!-- history.js for cross-browser state change on ajax -->
	<?php echo HTML::script('admin/js/jquery.history.js');?>
	<!-- application script for Charisma demo -->
	<?php echo HTML::script('admin/js/charisma.js');?>
	
	<?php //Google Analytics code for tracking my demo site, you can remove this.
		if($_SERVER['HTTP_HOST']=='usman.it') { ?>
		<script>
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-26532312-1']);
			_gaq.push(['_trackPageview']);
			(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ga);
			})();
		</script>
	<?php } ?>
	
</body>
</html>
