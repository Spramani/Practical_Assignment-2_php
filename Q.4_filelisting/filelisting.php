<?php 
$gfg_folderpath = "E:/DemoProjects/"; 
// CHECKING WHETHER PATH IS A DIRECTORY OR NOT 
if (is_dir($gfg_folderpath)) { 
	// GETING INTO DIRECTORY 
	$files = opendir($gfg_folderpath); { 
		// CHECKING FOR SMOOTH OPENING OF DIRECTORY 
		if ($files) { 
			//READING NAMES OF EACH ELEMENT INSIDE THE DIRECTORY 
			while (($gfg_subfolder = readdir($files)) !== FALSE) { 
				// CHECKING FOR FILENAME ERRORS 
			if ($gfg_subfolder != '.' && $gfg_subfolder != '..') { 
					echo "SUBFOLDER--" .$gfg_subfolder . "<br> 
					"."Files in ".$gfg_subfolder."--<br>"; 
					
				$dirpath = "E:/DemoProjects/" . $gfg_subfolder . "/"; 
					// GETING INSIDE EACH SUBFOLDERS 
					if (is_dir($dirpath)) { 
						$file = opendir($dirpath); { 
							if ($file) { 
				//READING NAMES OF EACH FILE INSIDE SUBFOLDERS 
			while (($gfg_filename = readdir($file)) !== FALSE) { 
				if ($gfg_filename != '.' && $gfg_filename != '..') { 
						echo $gfg_filename . "<br>"; 
						} 
						} 
					} 
				} 
			} 
					echo "<br>"; 
				} 
			} 
		} 
	} 
} 
?> 
<!DOCTYPE html> 
<html> 
<head> 
<title>What's there in My directory</title> 
</head> 
<body> 
</body> 
</html> 
