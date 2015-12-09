<?php
	session_start();

	//unset
	
	session_destroy();

	header("location:index.php");
?>