<?php
	require_once "check.php";	//Checking for a session
	if(isset($_POST['submit'])){
		define("UPLOAD_DIR", "../images/");
		$dir = $_POST["select"];
		//Correction of accepted directory names
		if($dir != '/'){
			$dir = $dir."/";
		}
		else{
			$dir = "";
		}

		//PHP global rule for determining the size of images
		ini_set('upload_max_filesize', '400M');

		//Client-side file type detection
		$types = ["image/jpeg", "image/png", "image/jpg"];
		$ftmp_name = $_FILES["file"]["tmp_name"];

		//Counting all files not counting unnecessary directories
		$n = count(preg_grep("/^.{1,}\..{1,}/", array_diff(scandir(UPLOAD_DIR.$dir), [".", ".."])));

		//Directly uploading images to the server
		for ($i = 0; $i < count($ftmp_name); $i++){

			//Determining the file types to upload to the server
			$type = $_FILES["file"]["type"][$i];
			$fname = explode("/", $_FILES["file"]["type"][$i]);
			$exp = end($fname);

			if(in_array($type, $types)){
				$num = $i+$n;
				move_uploaded_file($ftmp_name[$i], UPLOAD_DIR.$dir."img".$num.".".$exp);
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	<title>Upload Images</title>
</head>
<body>
	<form class="upload_form" action="upload.php" method="post" multipart="" enctype="multipart/form-data">
		<h3>Select a directory</h3>
		<select name="select">
			<option >/</option>
			<?php
				//Listing all existing directories inside the image folder with the exception of the directories above
				$dir_list = scandir("../images/");
				if(count($dir_list) != 0){
					foreach($dir_list as $d){ 
						if($d != "." and $d != ".." and strripos($d, ".") == false){
							echo "<option>".$d."</option>";
						}
					}
				}
			?>
		</select>
		<input class="upload_select_file" type="file" name="file[]" multiple>
		<input class="load" type="submit" name="submit" value="Upload">
	</form>
</body>
</html>