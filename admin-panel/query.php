<?php
	require_once "check.php";
	require_once "config.php";
	$connect = mysqli_connect($SERVER, $USER, $PASSWORD, $DB);

	/*Accepting methods*/

	if($_POST['method'] == "add"){
		//Checking for the absence of injections
		$pattern = '/[\\\'\"\_\;\(\)]{1,}/i';
		$title = preg_replace($pattern, '', $_POST['title']);
		$text =  preg_replace($pattern, '', $_POST['text']);
		$sql = "INSERT INTO `".$_POST['block']."` (`title`, `content`) VALUES (	'".$title."', '".$text."')";
		if (mysqli_query($connect, $sql)){
			echo "Post added successfully";
			header("Location: index.php");
		}
		else{
			echo "Error: " . $sql . "<br>" . mysqli_error($connect);
		}
	}
	else if($_POST['method'] == "edit"){
		//Checking for the absence of injections
		$pattern = '/[\\\'\"\_\;\(\)]{1,}/i';
		$title = preg_replace($pattern, '', $_POST['title']);
		$text =  preg_replace($pattern, '', $_POST['text']);
		$sql = "UPDATE `".$_POST['block']."` SET `title` = '".$title."',  `content` = '".$text."' WHERE `id` = ".$_POST['id']."";
		if (mysqli_query($connect, $sql)){
			echo "Post changed successfully";
			header("Location: index.php");
		}
		else{
			echo "Error: " . $sql . "<br>" . mysqli_error($connect);
		}
	}
	else if($_POST['method'] == "del"){
		$sql = "DELETE FROM `".$_POST['block']."` WHERE `id` = ".$_POST['id']."";
		if (mysqli_query($connect, $sql)){
			echo "Post deleted successfully";
			header("Location: index.php");
		}
		else{
			echo "Error: " . $sql . "<br>" . mysqli_error($connect);
		}
	}
	else if($_POST['method'] == "blockAdd"){
		//Checking for the absence of injections
		$nameBlock = strip_tags(preg_replace('/[\\\'\"\_\;\(\)\s]{1,}/i', '_', $_POST['nameBlock']));
		$sql = "CREATE TABLE `".$nameBlock."` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `title` TEXT NOT NULL , `content` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
		if (mysqli_query($connect, $sql)){
				echo "Block added successfully";
				header("Location: index.php");
			}
			else{
				echo "Error: " . $sql . "<br>" . mysqli_error($connect);
			}
	}
	else if($_POST['method'] == "blockDelite"){
		$sql = "DROP TABLE `".$_POST['block']."`";
		if (mysqli_query($connect, $sql)){
				echo "Post deleted successfully";
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