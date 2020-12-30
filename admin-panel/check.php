<?php
	require "config.php";
	session_start();
	if($_SESSION['user'] != $login.":".$password){
		header("Location: login.php");
	}