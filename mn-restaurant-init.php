<?php
	require_once("mn-config.php");
	require_once("mn-dbactions.php");
	require_once("mn-db.php");
	require_once("mn-classes.php");
	
	session_start();

	if(!isset($_SESSION["username"])){
		header("location:mn-signin.php");
	}

	$restaurant = $_SESSION["restaurant"];

	// ["restaurant_price"]=> string(2) "22" ["description"]=> string(4) "Ojig"
	$restaurant->restaurantCity = $_POST["restaurant_city"];
	$restaurant->restaurantType = $_POST["restaurant_type"];
	$restaurant->restaurantCuisine = $_POST["restaurant_cuisine"];
	$restaurant->restaurantPrice = $_POST["restaurant_price"];
	$restaurant->restaurantDescription = $_POST["description"];

	$restaurant->updateDB();
?>