
<!-- left menu starts -->
<div class="span2 main-menu-span">
	<div class="well nav-collapse sidebar-nav">
		<ul class="nav nav-tabs nav-stacked main-menu">
			<?php foreach(Config::get('menus.admin') as $key=>$val):?>
				<li>
					<a class="ajax-link" href="<?php echo $val['url']?>">
						<i class="<?php echo $val['class']?>"></i>
						<span class="hidden-tablet">
							<?php echo $key?>
						</span>
					</a>
				</li>
			<?php endforeach?>
			<li>
				<a class="ajax-link" href="users.html">
					<i class="icon-user"></i>
					<span class="hidden-tablet"> Users</span>
				</a>
			</li>
		</ul>
	</div><!--/.well -->
</div><!--/span-->
<!-- left menu ends -->
