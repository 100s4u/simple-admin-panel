<?php
	require_once "config.php";
	//Creating a session
	session_start();
	if(isset($_POST['submit'])){
		if($_POST['login'] == $login and password_verify($_POST['password'], $hash)){
			$_SESSION['user'] = $login.":".$hash;
			header("Location: index.php");
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
	<title>Admin-Panel</title>
</head>
<body>
	<div class="row-login_form">
		<form class="login_form" method="post">
			<h1>Log in to work with the panel</h1>
			<input type="text" name="login" placeholder="login">
			<input type="password" name="password" placeholder="password">
			<input type="submit" name="submit" value="Login">
		</form>
	</div>
</body>
</html>
