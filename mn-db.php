<?php
/**
 * This file contains MySQL database connection handle
 *
 * This file does NOT contain database authorization configurations. 
 * Configuration for MySQL databse is in mn-config.php
 *
 * @package  menu
 * @author  horvo
 */

require_once("mn-config.php");

try{
	$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,
				DB_USER, DB_PASSWORD);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	header("Location: mn-errors.php?type=db&message=$e");
}
?>