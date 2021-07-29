<html>

<head>
	<title>ciBlog</title>
	<link rel="stylesheet" href="https://bootswatch.com/3/flatly/bootstrap.min.css">
	<script src="http://cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
</head>

<body>
	<nav class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="<?php echo base_url(); ?>">ciBlog</a>
			</div>

			<div id="navbar">
				<ul class="nav navbar-nav">
					<li><a href="<?php echo base_url(); ?>posts">Blog</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php if(!$this->session->userdata('logged_in')) : ?>
					<li><a href="<?php echo base_url(); ?>users/login">Login</a></li>
					<li><a href="<?php echo base_url(); ?>users/register">Register</a></li>
					<?php endif; ?>
					<?php if($this->session->userdata('logged_in')) : ?>
					<li ><a href="<?php echo base_url(); ?>members" id="username"><?php echo $this->session->userdata('username'); ?></a></li>
					<li><a href="<?php echo base_url(); ?>users/logout">Logout</a></li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
