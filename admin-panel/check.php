<?php
	require "config.php";
	session_start();
	if($_SESSION['user'] != $login.":".$hash){
		header("Location: login.php");
	}