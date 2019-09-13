<?php echo $this->inc('header.php', ['title' => 'Youtube Downloader Error']); ?>
<div class="well">
	<h1 class="download-heading">Youtube Downloader Error</h1>
	<p>
		<div class="alert alert-danger">
			<?php echo $this->get('error_message'); ?></p>
		</div>
	<a class="btn btn-primary btn-lg pull-right" href="index.php">Download Again</a>
		<div class="clearfix"></div>
		<hr />
			<p class="muted pull-right">© 2018  Savetube.</p>
		<div class="clearfix"></div>
</div>
<?php echo $this->inc('footer.php'); ?>
