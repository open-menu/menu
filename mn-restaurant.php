<?php
  require_once("mn-config.php");
  require_once("mn-dbactions.php");
  require_once("mn-db.php");
  require_once("mn-classes.php");

  session_start();

  if(!isset($_SESSION["username"]) || !isset($_SESSION["restaurant"])){
    header("location:mn-signin.php");
  }

  $restaurant = $_SESSION["restaurant"];

  if(!$restaurant->isActive){
    header("location:mn-restaurant-init.php");
  }
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>GridMenu</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/gsdk.css" rel="stylesheet"/>
    <link href="css/gsdk-base.css" rel="stylesheet" />

    <link href="css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link href="css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link href="css/site.css" rel="stylesheet" />
</head>
<body>
<h1> Restaurant </h1>
<a href="mn-create-menu.php">Create Menu</a><br>
<a href="mn-add-item.php">Add Item</a>
       


</body>

<script src="js/jquery-1.10.2.js" type="text/javascript"></script>

	<script src="js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
    
	<!--  Plugins -->
	<script src="js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
	<script src="js/gsdk-checkbox.js"></script>
    <script src="js/site.js"></script>
	<script src="js/gsdk-morphing.js"></script>
	<script src="js/gsdk-radio.js"></script>
	<script src="js/gsdk-bootstrapswitch.js"></script>
	<script src="js/bootstrap-select.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/chartist.min.js"></script>
    <script src="js/jquery.tagsinput.js"></script>
    

	<script src="js/get-shit-done.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/wizard.js"></script>

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
</html>
