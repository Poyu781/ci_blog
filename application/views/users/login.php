<?php echo form_open('users/login'); ?>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<h1 class="text-center">Login</h1>
		<div class="form-group">
			<input type="text" name="username" class="form-control" placeholder="Enter Username" required autofocus>
		</div>
		<div class="form-group">
			<input type="password" name="password" class="form-control" placeholder="Enter Password" required autofocus>
		</div>
		<button type="submit" class="btn btn-primary btn-block">Login</button>
	</div>
</div>
<?php if($this->session->userdata('login_failed')): ?>
<?php echo '<p class="alert alert-danger">'.$this->session->userdata('login_failed').'</p>'; ?>
<?php endif; ?>
<?php $this->session->unset_userdata('login_failed');?>
<?php echo form_close(); ?>
