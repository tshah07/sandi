<div style="width: 320px; margin: 0 auto;">
	<h3>Login</h3>

	<?php
	if (!isset($error)) {
		$error = 'Please Login First with ur readerId</br> Use username = 1 and Password = sandy';
	}
	?>
	<div class="alert alert-error">
		<b>Error! :</b><?= $error; ?>
	</div>

	<form class="well" method="get" action="<?php echo base_url(); ?>index.php/login/readerLogin">
		<label>Username</label>
		<input type="text" name="username" style="width: 260px;"  >
		<label>Password</label>
		<input type="password" name="password" style="width: 260px;">
		<button type="submit" class="btn btn-primary">
			Login
		</button>
	</form>
</div>
