<?php
/**
 * Functions that is used to perform actions on database
 */

require_once("mn-classes.php");
require_once("mn-config.php");

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
						restaurant_name = :restaurant_name,
						activated = :activated
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
		$stmt->bindParam(":activated", $values["activated"]);
		$stmt->bindParam(":id", $values["id"]);

		$stmt->execute();
	}catch(PDOException $e){
		echo $e;
		return false;
	}

	return true;
}

function create_menu($ownerID, $title){
	try{
		require("mn-db.php");

		$sql = "INSERT INTO ".MENU_TABLE." (owner_id, menu_title) VALUES(:owner_id, :menu_title)";

		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":owner_id", $ownerID);
		$stmt->bindParam(":menu_title", $title);

		$stmt->execute();

		return $dbh->lastInsertId();
	}catch(PDOException $e){
		echo $e;
		return -1;
	}
}

function set_menu_image($menu_id, $FILES){
	require("mn-db.php");

	$path = move_to_upload($FILES);

	if($path != ""){
		try{
			$sql = "UPDATE ".MENU_TABLE." SET menu_image=:menu_image WHERE id=:menu_id;";

			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(":menu_id", $menu_id);
			$stmt->bindParam(":menu_image", $path);

			$stmt->execute();

			return true;
		}catch(PDOException $e){
			echo $e;
			return false;
		}
	}
}

function set_restaurant_logo($restaurant_id, $FILES){
	require("mn-db.php");

	$path = move_to_upload($FILES);

	if($path != ""){
		try{
			$sql = "UPDATE ".REST_TABLE." SET restaurant_logo=:restaurant_logo WHERE id=:restaurant_id;";

			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(":restaurant_id", $restaurant_id);
			$stmt->bindParam(":restaurant_logo", $path);

			$stmt->execute();

			return $path;
		}catch(PDOException $e){
			echo $e;
			return "";
		}
	}
}

function get_menus($owner_id){
	require("mn-db.php");

	try{
		$sql = "SELECT * FROM ".MENU_TABLE." WHERE owner_id=:owner_id";

		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":owner_id", $owner_id);

		$stmt->execute();
		$result = $stmt->fetchAll();

		return $result;
	}catch(PDOException $e){
		echo $e;
		return array();
	}
}

function add_item($menu_id, $values, $imageFILE){
	require("mn-db.php");

	$path = move_to_upload($imageFILE);

	try{
		$sql = "INSERT INTO ".ITEM_TABLE." (menu_id, item_name, item_detail, item_price, item_image)
						values(:menu_id, :item_name, :item_detail, :item_price, :item_image);";

		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":menu_id", $menu_id);
		$stmt->bindParam(":item_name", $values["item_name"]);
		$stmt->bindParam(":item_detail", $values["item_detail"]);
		$stmt->bindParam(":item_price", $values["item_price"]);
		$stmt->bindParam(":item_image", $path);

		$stmt->execute();

		return true;
	}catch(PDOException $e){
		echo $e;
		return false;
	}
}


/**
 * If you need to hash the filename, change here.
 */
function move_to_upload($FILES){
	$dir = DIR_UPLOAD;
	$path = $dir.basename($FILES['name']);

	if(move_uploaded_file($FILES['tmp_name'], $path))
		return get_relative_url($path);
	else
		return "";
}

/**
 * Get A List Of Restaurants
 */
function get_restaurant_list(){
	try{
		require("mn-db.php");

		$sql = "SELECT id, restaurant_name, restaurant_price, restaurant_logo FROM ".REST_TABLE." WHERE 1";

		$query = $dbh->prepare($sql);
		$query->execute();

		$result = $query->fetchAll();

		return $result;
	}catch(PDOException $e){
		echo $e;
		return array();
	}
}

/**
 * Get relative url
 */
function get_relative_url($full_url){
	return str_replace(SITE_ROOT, "", $full_url);
}
?>