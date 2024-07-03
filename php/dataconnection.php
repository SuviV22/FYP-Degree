<?php
	session_start();
	
	$host = "localhost";
	$user = "root";
	$password = "";
	$database = "sacrebleu";
	
	$conn = mysqli_connect($host, $user, $password, $database);
?>