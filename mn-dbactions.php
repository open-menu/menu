<?php
/**
 * Functions that is used to perform actions on database
 */

function type_to_table($type){
	if($type == "user" || $type == "customer"){
		$table = "user";
	}else if($type == "restaurant"){
		$table = "restaurant";
	}else{
		mn_error("Ah Uh", "Something went wrong. (wink)");
	}

	return $table;
}

// returns true if the username is available. will be called by create_user
function username_available($dbh, $username, $type){
	$table = type_to_table($type);

	try{
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

function create_user($dbh, $username, $password, $type, $email){
	if( username_available($dbh, $username, $type)){
		try{
			$table = type_to_table($type);

			$encrypted_pass = password_hash($password ,PASSWORD_BCRYPT);
			$sql = "INSERT INTO $table (username, password, email) VALUES('$username', '$encrypted_pass', '$email')";
			$dbh->exec($sql);
			return true;
		}catch(PDOException $e){
			header("Location: mn-errors.php?type=db&message=$e");
		}
	}else{
		return false;
	}

	
}

function signin_check($dbh, $username, $password, $type){
	$table = type_to_table($type);

	try{
		$sql = "SELECT * FROM $table WHERE username=:username";
		$query = $dbh->prepare($sql);
		$query->bindParam(":username", $username);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_ASSOC);

		if(count($result)> 0 && password_verify($password, $result["password"])){
			$_SESSION["username"] = $result["username"];
			return true;
		}else{
			return false;
		}
	}catch(PDOException $e){
		echo $e;
		return false;
	}
}

function mn_error($type, $message){
	header("Location: mn-errors.php?type=$type&message=$message");
	//<script>location.href='errorpage.html'</script>
	//consider using this javascript code. header has its limitations.
}
?>