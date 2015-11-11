<?php
/**
 * Server side script that handles signup
 */
require_once("mn-config.php");
require_once("mn-dbactions.php");
require_once("mn-db.php");

//This may not be the final version. 
//Just writing some working code to pass round 1 submissin.
//on success direct user to success page. on failure go back.

if( isset($_POST["username"]) && isset($_POST["password"]) 
	&& isset($_POST["email"]) && isset($_POST["type"])){

	$username = $_POST["username"];
	$password = $_POST["password"];
	$email = $_POST["email"];
	$type = $_POST["type"];

	//Check if username exists
	if( username_available($dbh, $username, $type) ){
		create_user($dbh, $username, $password, $type, $email);
		header("Location: mn-$type.php");
	}else{
		header("Location: mn-signup.php?check=false");
	}
}
?>
