<?php

function list_folders_then_files($mypath) {

	$mypath = preg_replace("/\/$/", "", $mypath);
    $d = opendir($mypath);
    
    $files = array();
    $directories = array();
    
    while(($file = readdir($d)) !== false) {
        if ($file != ".") {
        	if (is_dir($mypath . "/" . $file)) {
        		$directories[] = $mypath . "/" . $file;
        	} else {
	        	$files[] = $mypath . "/" . $file;
        	}
        }
    }
    
    if (count($directories)>0) {
		sort($directories);
		echo "<ul class='directories'>\n";
		foreach ($directories as $dir) {
			"\t<li><a href='#" . htmlentities($dir) . "' class='change_dir'>" . htmlentities(basename($dir)) . "</a></li>\n";
		}
		echo "</ul>\n";
    }
    echo "<hr>";
    
    if (count($files)>0) {
		sort($files);
		echo "<ul class='files'>\n";
		foreach($files as $file) {
			"\t<li><a href='#" . htmlentities($file) ."' class='queue_file'>" . htmlentities($file) . "</a></li>\n";
		}
		echo "</ul>\n";
    }
}


?>
