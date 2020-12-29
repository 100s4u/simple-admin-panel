<?php
	require_once "check.php";
	require_once "config.php";
	$connect = mysqli_connect($SERVER, $USER, $PASSWORD, $DB);
	if($_POST['method'] == "add"){
		$sql = "INSERT INTO `".$_POST['block']."` (`title`, `content`) VALUES (	'".$_POST['title']."', '".$_POST['text']."')";
		if (mysqli_query($connect, $sql)){
			echo "Запись успешно добавлена";
			header("Location: index.php");
		}
		else{
			echo "Error: " . $sql . "<br>" . mysqli_error($connect);
		}
	}
	else if($_POST['method'] == "edit"){
		$sql = "UPDATE `".$_POST['block']."` SET `title` = '".$_POST['title']."',  `content` = '".$_POST['text']."' WHERE `id` = ".$_POST['id']."";
		if (mysqli_query($connect, $sql)){
			echo "Запись успешно изменена";
			header("Location: index.php");
		}
		else{
			echo "Error: " . $sql . "<br>" . mysqli_error($connect);
		}
	}
	else if($_POST['method'] == "del"){
		$sql = "DELETE FROM `".$_POST['block']."` WHERE `id` = ".$_POST['id']."";
		if (mysqli_query($connect, $sql)){
			echo "Запись успешно удалена";
			header("Location: index.php");
		}
		else{
			echo "Error: " . $sql . "<br>" . mysqli_error($connect);
		}
	}
	else if($_POST['method'] == "blockAdd" and strip_tags(preg_match_all("/[a-z, A-Z, \_, \-]{3,20}/",$_POST['nameBlock'])) <= 1){
		$sql = "CREATE TABLE `".$_POST['nameBlock']."` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `title` TEXT NOT NULL , `content` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
		if (mysqli_query($connect, $sql)){
				echo "Блок успешно добавлен";
				header("Location: index.php");
			}
			else{
				echo "Error: " . $sql . "<br>" . mysqli_error($connect);
			}
	}
	else if($_POST['method'] == "blockDelite"){
		$sql = "DROP TABLE `".$_POST['block']."`";
		if (mysqli_query($connect, $sql)){
				echo "Блок успешно удалён";
				header("Location: index.php");
			}
			else{
				echo "Error: " . $sql . "<br>" . mysqli_error($connect);
			}
	}
	else if($_POST['method'] == "logout"){
		session_unset();
	}
	var_dump($_POST);