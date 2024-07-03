<?php
	include("dataconnection.php");
	
	session_destroy();
	
	header("Location: ../indexx.php");
?>