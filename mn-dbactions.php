<?php
/**
 * Functions that is used to perform actions on database
 */

// returns True if the username is available
function username_available($username, $type){
	if($type == "user" || $type == "customer"){
		$table = "user";
	}else if($type == "restaurant"){
		$table = "restaurant";
	}else{
		echo "unknown type";
		return false;
	}

	try{
		$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,
					DB_USER, DB_PASSWORD);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM $table WHERE username='$username'";
		$query = $dbh->prepare($sql);
		$query->execute();
		$num_rows = $query->fetchColumn();
		if($num_rows == 0){
				return true;
		}else{
				return false;
		}
	}catch(PDOException $e){
		echo $e;
		return false;
	}
}

function create_user($username, $password, $type, $email){
	try{
		$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,
					DB_USER, DB_PASSWORD);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		if($type == "user" || $type == "customer"){
			$table = "user";
		}else if($type == "restaurant"){
			$table = "restaurant";
		}

		$sql = "INSERT INTO $table (username, password, email) VALUES('".$username."', '".$password."', '".$email."')";

		$dbh->exec($sql);
	}catch(PDOException $e){
		echo "Database failure";
		echo $sql;
	}
}
?>