<div id="admin">
	<div class="admin-actions">
		<div class="menu-button">
			Our Enterprise CMS
		</div>				
		<div class="menu" style="display:none;">
			<ul>
				<li class="page"><a href="?m=edit">Edit Page</a></li>
				<li class="meta">Meta Data</li>
				<li class="logout">Logout</li>
			</ul>
		</div>

	</div>
	<?php if(isset($_REQUEST['m']) && $_REQUEST['m'] == 'edit') {?>
		<div class="menu-button-save"><a href="#" class="btn btn-success">Save Page</a></div>
		<div class="menu-button-cancel"><a href="/admin/" class="btn btn-danger">Cancel</a></div>
	<?php } ?>
</div>

