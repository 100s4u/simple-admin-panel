<?php
	require "config.php";
	//Checking for a session
	session_start();
	if($_SESSION['user'] != $login.":".$hash){
		header("Location: login.php");
	}