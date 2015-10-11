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

		//create a new connection
		$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		//$dbh->setAttributes(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$dbh->query("CREATE TABLE user (
			id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			username VARCHAR(18) NOT NULL,
			password VARCHAR(40) NOT NULL,
			email VARCHAR(60),
			reg_date TIMESTAMP
			) COLLATE utf8_unicode_ci");

		$dbh->query("CREATE TABLE restaurant （
			id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY
			username VARCHAR(18) NOT NULL,
			password VARCHAR(40) NOT NULL,
			email VARCHAR(60),
			reg_date TIMESTAMP
			) COLLATE utf8_unicode_ci");
	}catch(PDOException $e){
		echo $e->getMessage();
	}

?>