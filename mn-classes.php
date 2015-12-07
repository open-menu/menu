<?php
/*
 *	Class definitions
 */

class User{
	public $userID;
	public $userAvatar;
	public $username;
	public $userEmail;
	public $userFavorites;

	function __construct($result, $dbh){
		$this->username = $result["username"];
		$this->userAvatar = $result["avatar"];
		$this->userID = $result["id"];
		$this->userEmail = $result["email"];
		
		$this->setFavorites($dbh);

	}

	private function setFavorites($dbh){
		$this->userFavorites = array(1,2,3,4);
	}
}

class Restaurant{
	public $username;
	public $restaurantName;
	public $restaurantID;
	public $restaurantEmail;
	public $restaurantAddress;
	public $restaurantDescription;
	public $restaurantType;
	public $restaurantCuisine;
	public $restaurantPrice;
	public $restaurantCity;
	
	//database handle
	private $dbh;

	function __construct($result, $dbh){
		$this->restaurantName = $result["restaurant_name"];
		$this->restaurantID = $result["id"];
		$this->restaurantEmail = $result["email"];
		$this->username = $result["username"];
		$this->restaurantDescription = $result["description"];
		$this->restaurantLogo = $result["restaurant_logo"];

		//three lines of address combined into single string
		$this->restaurantAddress = $result["restaurant_address_l1"]."<br>".
															$result["restaurant_address_l2"]."<br>".
															$result["restaurant_address_l3"];

		$this->restaurantType = $result["restaurant_type"];
		$this->restaurantCuisine = $result["restaurant_cuisine"];
		$this->restaurantPrice = $result["restaurant_price"];
		$this->restaurantCity = $result["restaurant_city"];
	}

	public function updateDB(){

	}
}


?>