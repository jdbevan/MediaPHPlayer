<!DOCTYPE html>
<html>
<head>
	<title>MediaPHPlayer</title>
	<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
	<style>
	a.change_dir {
		text-decoration: underline;
	}
	a.queue_file {
		text-decoration: none;
	}
	</style>
</head>
<body>
<?php

include 'settings.php';
include 'functions.php';

if (is_defined("ROOT_DIRECTORY")) {
?>
<div id="browser">
	<?php
		list_folders_then_files(ROOT_DIRECTORY);
	?>
</div>
<ul id="playlist">
	<li id="emptyplaylist">Click a song to add it to the playlist.</li>
</ul>
<?php
} else {
?>
	<h3>Please configure a folder to read music from.</h3>
<?php
}
?>
</body>
</html>
