<?php

include 'settings.php';
include 'functions.php';
include 'request_handler.php';
	
?>
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
	#browser ul {
		float: left;
		list-style-type: none;
		padding-left: 20px;
	}
	#playlist {
		float: right;
	}
	</style>
	<script type="text/javascript">
	$(document).ready(function(){
		
		$(document).on("click", ".change_dir", function(e) {
			
			var existing_listings = $("#browser").html(),
				href = $(this).attr('href').replace(/^#/, "");
			
			$("#browser").html("<p>Loading...</p>");
			
			$.ajax({
				url: "/",
				data: "dir=" + href,
				dataType: "html",
				type: "POST",
				success: function(data, textStatus, jqXHR) {
					$("#browser").html(data);
				},
				complete: function(jqXHR, textStatus) {
					//
				},
				error: function(jqXHR, textStatus, errorThrown) {
					$("#browser").html(existing_listings);
				}
			});
			
			return false;
		});
		
		
		
	});
	</script>
</head>
<body>
<?php
if (defined("ROOT_DIRECTORY")) {
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
