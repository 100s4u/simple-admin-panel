<?php
	require_once "check.php";
	if(isset($_POST['submit'])){
		define("UPLOAD_DIR", "../images/");
		$dir = $_POST["select"];
		if($dir != ''){
			$dir = $dir."/";
		}
		else{
			$dir = '';
		}
		$fname = $_FILES["file"]["name"];
		$ftmp_name = $_FILES["file"]["tmp_name"];
		$n = count(preg_grep("/^.{1,}\..{1,}/", array_diff(scandir(UPLOAD_DIR), [".", ".."])));
		for ($i = 0; $i < count($ftmp_name); $i++){
			if(is_uploaded_file($ftmp_name[$i])) {
				$name = explode(".",$fname[$i]);
				$num = $i+$n;
				move_uploaded_file($ftmp_name[$i], UPLOAD_DIR.$dir."img".$num.".".end($name));
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
	<title><?=$title?></title>
</head>
<body>
	<form class="upload_form" action="upload.php" method="post" multipart="" enctype="multipart/form-data">
		<h3>Выбрать директоию</h3>
		<select name="select">
			<option >/</option>
			<?php
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
		<input class="load" type="submit" name="submit" value="загрузить">
	</form>
</body>
</html>