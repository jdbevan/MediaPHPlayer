<?php

if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
	
	if (isset($_POST['dir']) and is_dir($_POST['dir']) and stripos($_POST['dir'], ROOT_DIRECTORY)===0) {
		
		list_folders_then_files($_POST['dir']);
		
	}
	
	exit;
}

?>
