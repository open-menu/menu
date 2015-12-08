<?php
/**
 * Functions that is used to perform actions on database
 */

require_once("mn-classes.php");

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
			
			//for user
			if($type == "user"){
				$_SESSION["user"] = new User($result, $dbh);
			}else if($type == "restaurant"){
				$_SESSION["restaurant"] = new Restaurant($result, $dbh);
			}
			
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

function update_restaurant($values){
	try{
		require("mn-db.php");

		$sql = "UPDATE ".DB_NAME.".".REST_TABLE." SET 
						description = :description,
						restaurant_type = :restaurant_type,
						restaurant_price = :restaurant_price,
						restaurant_cuisine = :restaurant_cuisine,
						restaurant_city = :restaurant_city,
						restaurant_address_l1 = :restaurant_address_l1,
						restaurant_address_l2 = :restaurant_address_l2,
						restaurant_address_l3 = :restaurant_address_l3,
						restaurant_logo = :restaurant_logo,
						restaurant_name = :restaurant_name
						WHERE id=:id";

		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":description", $values["description"]);
		$stmt->bindParam(":restaurant_type", $values["restaurant_type"]);
		$stmt->bindParam(":restaurant_price", $values["restaurant_price"]);
		$stmt->bindParam(":restaurant_cuisine", $values["restaurant_cuisine"]);
		$stmt->bindParam(":restaurant_city", $values["restaurant_city"]);
		$stmt->bindParam(":restaurant_address_l1", $values["restaurant_address_l1"]);
		$stmt->bindParam(":restaurant_address_l2", $values["restaurant_address_l2"]);
		$stmt->bindParam(":restaurant_address_l3", $values["restaurant_address_l3"]);
		$stmt->bindParam(":restaurant_logo", $values["restaurant_logo"]);
		$stmt->bindParam(":restaurant_name", $values["restaurant_name"]);
		$stmt->bindParam(":id", $values["id"]);

		$stmt->execute();
	}catch(PDOException $e){
		echo $e;
		return false;
	}
}
?>