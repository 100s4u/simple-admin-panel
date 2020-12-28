<?php
require "config.php";
session_start();
if($_SESSION['user'] != $login){
	header("Location: login.php");
}