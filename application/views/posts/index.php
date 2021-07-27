<h2><?= $title ?></h2>
<?php foreach($posts as $post) : ?>
	<h3><?php echo $post['title']; ?></h3>
	<div><?php echo $post['body']; ?></div>
<?php endforeach; ?>