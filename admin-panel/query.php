<?php
	require_once "check.php";
	require_once "config.php";
	$connect = mysqli_connect($SERVER, $USER, $PASSWORD, $DB);
	if($_POST['method'] == "add"){
		$pattern = '/[\\\'\"\_\;\(\)]{1,}/i';
		$title = preg_replace($pattern, '', $_POST['title']);
		$text =  preg_replace($pattern, '', $_POST['text']);
		$sql = "INSERT INTO `".$_POST['block']."` (`title`, `content`) VALUES (	'".$title."', '".$text."')";
		if (mysqli_query($connect, $sql)){
			echo "Запись успешно добавлена";
			header("Location: index.php");
		}
		else{
			echo "Error: " . $sql . "<br>" . mysqli_error($connect);
		}
	}
	else if($_POST['method'] == "edit"){
		$pattern = '/[\\\'\"\_\;\(\)]{1,}/i';
		$title = preg_replace($pattern, '', $_POST['title']);
		$text =  preg_replace($pattern, '', $_POST['text']);
		$sql = "UPDATE `".$_POST['block']."` SET `title` = '".$title."',  `content` = '".$text."' WHERE `id` = ".$_POST['id']."";
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
	else if($_POST['method'] == "blockAdd"){
		$nameBlock = strip_tags(preg_replace('/[\\\'\"\_\;\(\)\s]{1,}/i', '_', $_POST['nameBlock']));
		$sql = "CREATE TABLE `".$nameBlock."` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `title` TEXT NOT NULL , `content` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
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