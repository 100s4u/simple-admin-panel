<?php
	require_once "config.php";
	require_once "check.php";
	$connect = mysqli_connect($SERVER, $USER, $PASSWORD, $DB);
	
	//The condition under which if the method is add, then nothing is output in the inputs, and if the method is change, then the desired post is output
	if(isset($_POST['method'])){
		if($_POST['method'] == "add"){
			$title = "Add a post";
			$row[1]="";
			$row[2]="";
		}
		else{
			$title = "Edit a post";
			$sql = "SELECT * FROM {$_POST['block']} WHERE id='{$_POST['id']}'";
			$result = mysqli_query($connect, $sql) or die("Error " . mysqli_error($connect)); 
			$rows = mysqli_num_rows($result);
			for($i = 0 ; $i < $rows ; ++$i){
				$row = mysqli_fetch_row($result);
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
	<div class="row-post-edit_form">
	<form class="post-edit_form" action="query.php" method="POST">
		<h1><?=$title?></h1>
		<?php
			if($_POST['method'] != "add"){
				echo "<input hidden name=\"id\" value=\"{$_POST['id']}\">";
			}
			else{
				echo "<input hidden name=\"id\" value=\"\">";
			}
		?>
		<input hidden name="block" value="<?=$_POST['block']?>">
		<input hidden name="method" value="<?=$_POST['method']?>">
		<input placeholder="Title"  name="title" class="title" type="text" value="<?=$row[1]?>">
		<textarea placeholder="Content" name="text" class="text"><?=$row[2]?></textarea>
		<input class="save" type="submit" name="submit" value="Save">
	</form>
</body>
</html>