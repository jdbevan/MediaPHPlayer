<?php

function list_folders_then_files($mypath, $cols = 3) {

	$mypath = preg_replace("/\/$/", "", $mypath);
    $d = opendir($mypath);
    
    $files = array();
    $directories = array();
    
    if ($d !== false) {
		while (($file = readdir($d)) !== false) {

		    if ($file != "." and !preg_match("/^\.[a-zA-Z0-9]/", $file)) {
		    	if (is_dir($mypath . "/" . $file)) {
		    		if ($file != "..") {
		    			$directories[] = $mypath . "/" . $file;
		    		} else {
		    			
		    			$this_folder = basename($mypath);
		    			$parent_folder = str_replace("/" . $this_folder, "", $mypath);
		    			if (stripos($parent_folder, ROOT_DIRECTORY)===0) {
			    			$directories[] = $parent_folder;
						}
		    		}
		    	} else if (preg_match("/\.(mp3|ogg|wma)$/", $file)) {
			    	$files[] = $mypath . "/" . $file;
		    	}
		    }
		}
	} else {
		echo "<h3>Couldn't read folder.</h3>";
	}
	
    if (count($directories)>0) {
		sort($directories);
		echo "<ul class='directories'>\n";
		foreach ($directories as $i=>$dir) {
			echo "\t<li><a href='#" . htmlentities($dir) . "' class='change_dir'>" . htmlentities(basename($dir)) . "</a></li>\n";
			if (($i+1) % (count($directories)/$cols) == 0) {
				echo "</ul>\n<ul class='directories'>\n";				
			}
		}
		echo "</ul>\n";
    }
    
    if (count($files)>0) {
		sort($files);
		echo "<ul class='files'>\n";
		foreach($files as $i=>$file) {
			echo "\t<li><a href='#" . htmlentities($file) ."' class='queue_file'>" . htmlentities(basename($file)) . "</a></li>\n";
			if (($i+1) % (count($files)/$cols) == 0) {
				echo "</ul>\n<ul class='directories'>\n";				
			}
		}
		echo "</ul>\n";
    }
}


?>
