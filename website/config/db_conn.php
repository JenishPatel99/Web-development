<?php
	session_start();

	$dbServerName = "localhost";
	$dbUsername = "root";
	$dbPassword = "rifle3340";
	$dbName = "blogging_website";

	$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);

?>