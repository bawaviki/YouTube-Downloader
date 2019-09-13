<!--?php echo $this->inc('header.php', ['title' => 'Youtube Downloader Results']); ?-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta charset="utf-8">
	<title><?php echo $this->get('video_title'); ?> /></title>
	<meta name="keywords" content="Video downloader, download youtube, video download, youtube video, youtube downloader, download youtube FLV, download youtube MP4, download youtube 3GP, php video downloader"/>
	<meta name="description" content="Video downloader, download youtube, video download, youtube video, youtube downloader, download youtube FLV, download youtube MP4, download youtube 3GP, php video downloader"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="icon" href="https://savetube.cf/wp-content/uploads/2018/09/cropped-ic_launcher-web-32x32.png" sizes="32x32" />
	<link rel="icon" href="https://savetube.cf/wp-content/uploads/2018/09/cropped-ic_launcher-web-192x192.png" sizes="192x192" />
	<meta property="og:title" content="<?php echo $this->get('video_title'); ?>" />
    <meta property="og:type" content="video.movie" />
	<meta property="og:image" content="http://img.youtube.com/vi/<?php echo $this->get('vid', ''); ?>/mqdefault.jpg" />
  	<meta property="og:video" content="http://savetube.cf/downloader/getvideo.php?videoid=<?php echo $this->get('vid', ''); ?>"/>
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="css/custom.css" rel="stylesheet">
	<style type="text/css">
		#info {
			padding: 0 0 0 130px;
			position: relative;
			height: 100px;
		}
		#info img {
			left: 0;
			position: absolute;
			top: 0;
			width: 120px;
			height: 90px
		}
	</style>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">Youtube Downloader</a>
		</div>
		<div id="navbar" class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="http://savetube.cf/">Home</a></li>
				<li class="active"><a href="http://savetube.cf/about-us/">About us:-</a></li>
				<li class="active"><a href="http://savetube.cf/best-features/">Best Features:-</a></li>
				<li class="active"><a href="http://savetube.cf/term-of-use/">Terms Of Use:-</a></li>
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</nav>
<div class="container">


<div class="well">
	<h1 class="download-heading">Youtube Downloader Results</h1>
	<hr />
	<div align="center">
<?php if ($this->get('show_thumbnail') === true) { ?>
	<?php if ($this->get('showBrowserExtensions', false) === true) { ?>
		<iframe frameborder="0"  scrolling="yes"width="100%" height="180" type="text/html" src="https://www.youtube.com/embed/<?php echo $this->get('vid', ''); ?>" allowfullscreen></iframe>
	<?php } ?>
	<?php if ($this->get('showBrowserExtensions', false) === false) { ?>
			<iframe frameborder="0"  scrolling="yes"width="100%" height="433" type="text/html" src="https://www.youtube.com/embed/<?php echo $this->get('vid', ''); ?>" allowfullscreen></iframe>
	<?php } ?>	
<?php } ?>
		<p><?php echo $this->get('video_title'); ?></p>
	</div>
<?php if ($this->get('no_stream_map_found', false) === true) { ?>
	<p>No encoded format stream found.</p>
	<p>Here is what we got from YouTube:</p>
	<pre>
		<?php echo $this->get('no_stream_map_found_dump'); ?>
	</pre>
<?php }
else
	{ ?>

<?php if ($this->get('show_debug1', false) === true) { ?>
	<pre>
		<?php echo $this->get('debug1'); ?>
	</pre>
<?php } ?>
<?php if ($this->get('show_debug2', false) === true) { ?>
	<p>These links will expire at <?php echo $this->get('debug2_expires'); ?></p>
	<p>The server was at IP address <?php echo $this->get('debug2_ip'); ?> which is an <?php echo $this->get('debug2ipbits'); ?> bit IP address. Note that when 8 bit IP addresses are used, the download links may fail.</p>
<?php } ?>
	<h2>List of available formats for download</h2>
	<ul class="dl-list">
<?php foreach($this->get('streams', []) as $format) { ?>
		<li>
			<a class="btn btn-default btn-type disabled" href="#"><?php echo $format['type']; ?> - <?php echo $format['quality']; ?></a>
<?php if ($format['show_direct_url'] === true) { ?>
			<a class="btn btn-default btn-download" href="<?php echo $format['direct_url']; ?>" class="mime"><i class="glyphicon glyphicon-download-alt"></i> Direct</a>
<?php } ?>
<?php if ($format['show_proxy_url'] === true) { ?>
			<a class="btn btn-primary btn-download" href="<?php echo $format['proxy_url']; ?>" class="mime"><i class="glyphicon glyphicon-download-alt"></i> Proxy</a>
<?php } ?>
			<div class="label label-warning"><?php echo $format['size']; ?></div>
			<div class="label label-default"><?php echo $format['itag']; ?></div>
		</li>
<?php } ?>
	</ul>
	<hr />
	<h2>Separated video and audio format</h2>
	<ul class="dl-list">
<?php foreach($this->get('formats', []) as $format) { ?>
	<li>
		<a class="btn btn-default btn-type disabled" href="#"><?php echo $format['type']; ?> - <?php echo $format['quality']; ?></a>
<?php if ($format['show_direct_url'] === true) { ?>
		<a class="btn btn-default btn-download" href="<?php echo $format['direct_url']; ?>" class="mime"><i class="glyphicon glyphicon-download-alt"></i> Direct</a>
<?php } ?>
<?php if ($format['show_proxy_url'] === true) { ?>
		<a class="btn btn-primary btn-download" href="<?php echo $format['proxy_url']; ?>" class="mime"><i class="glyphicon glyphicon-download-alt"></i> Proxy</a>
<?php } ?>
		<div class="label label-warning"><?php echo $format['size']; ?></div>
		<div class="label label-default"><?php echo $format['itag']; ?></div>
	</li>
<?php } ?>
	</ul>
<?php if ($this->get('showMP3Download', false) === true) { ?>
	<h2>Convert and Download to .mp3</h2>
	<ul class="dl-list">
		<li>
			<a class="btn btn-default btn-type disabled" href="#" class="mime">audio/mp3 - <?php echo $this->get('mp3_download_quality'); ?></a>
			<a class="btn btn-primary btn-download" href="<?php echo $this->get('mp3_download_url'); ?>" class="mime"><i class="glyphicon glyphicon-download-alt"></i> Convert and Download</a>
		</li>
	</ul>
<?php } ?>
	<hr />
	<p><small>Note that you initiate download either by clicking "Direct" to download from the origin server or by clicking "Proxy" to use this server as proxy.</small></p>
<?php if ($this->get('showBrowserExtensions', false) === true) { ?>
	<p><a href="http://bit.ly/Savetube" class="userscript btn btn-mini" title="Install android app to download video directly in android device."> Install Android Application </a></p>
<?php } ?>
<?php } ?>
<hr />
<p class="muted pull-right">© 2018 Savetube</p>
	<div class="clearfix"></div>
</div>
<?php echo $this->inc('footer.php'); ?>
