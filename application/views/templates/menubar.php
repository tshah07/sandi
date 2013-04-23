<div class="container">
	<div class="subnav" style="margin-bottom: 10px;">
		<ul class="nav nav-pills">
			<li <?php if(is_active()): ?>class="active"<?php endif; ?>>
				<a href="<?= site_url() ?>">Home</a>
			</li>

			<ul class="nav nav-pills pull-left">
				<li <?php if(is_active('admin')): ?>class="active"<?php endif; ?>>
					<a href="<?= base_url() ?>index.php/admin">Admin</a>
				</li>
				<li <?php if(is_active('reader')): ?>class="active"<?php endif; ?>>
					<a href="<?= base_url() ?>index.php/reader">Reader</a>
				</li>
			</ul>
		</ul>
	</div>
</div>