<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Database Installation</title>
  </head>
<?php
/**
 * Install script for menu. 
 * 
 * This script should be used used initialize MySQL database.
 * 
 * @package menu
 * @author  horvo
 */

	require_once("mn-config.php");

	try{
		//establishing connection
		$dbh = new PDO("mysql:host=".DB_HOST, DB_USER, DB_PASSWORD);

		//creating database
		$query = $dbh->prepare("CREATE DATABASE IF NOT EXISTS ".DB_NAME);
		$query->execute();

		$dbh = null;

		/**
		 * Creating tables: user, restaurant, menu, menu_item
		 */
		$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		//$dbh->setAttributes(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$query = $dbh->prepare("CREATE TABLE user (
			id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			username VARCHAR(18) NOT NULL,
			password VARCHAR(40) NOT NULL,
			email VARCHAR(60),
			reg_date TIMESTAMP
			) COLLATE utf8_unicode_ci");
		if( $query->execute() )
			echo "Created table: user<br>";
		else
			echo "Failure to create table: user<br>";

		$query = $dbh->prepare("CREATE TABLE restaurant (
			id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			username VARCHAR(18) NOT NULL,
			password VARCHAR(40) NOT NULL,
			email VARCHAR(60) NOT NULL,
			reg_date TIMESTAMP,
			restaurant_name VARCHAR(60) NOT NULL
			) COLLATE utf8_unicode_ci");
		if( $query->execute() )
			echo "Created table: restaurant<br>";
		else
			echo "Failure to create table: restaurant<br>";

		$query = $dbh->prepare("CREATE TABLE menu (
			id INT(12) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			owner_id INT(11) UNSIGNED NOT NULL,
			menu_title VARCHAR(60) DEFAULT NULL,
			create_date TIMESTAMP
			) COLLATE utf8_unicode_ci");
		if( $query->execute() )
			echo "Created table: menu<br>";
		else
			echo "Failure to create table: menu<br>";

		$query = $dbh->prepare("CREATE TABLE menu_item (
			id INT(32) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			menu_id INT(12) UNSIGNED,
			item_title VARCHAR(18) DEFAULT 'Undefined',
			item_detail VARCHAR(128) DEFAULT 'Empty',
			item_price DECIMAL(10,2)
			) COLLATE utf8_unicode_ci");
		if( $query->execute() )
			echo "Created table: menu_item<br>";
		else
			echo "Failure to create table: menu_item<br>";
	
		/**
		 * Inserting test data.
		 */
	}catch(PDOException $e){
		echo $e->getMessage();
	}
?>
</html>