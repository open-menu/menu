<?php
/**
 * Handles sign in request from other pages.
 * This page also performs as a sign in page.
 */
	
require_once("mn-config.php");
require_once("mn-dbactions.php");
require_once("mn-db.php");

session_start();
$check_failed = false;
//Dealing with requests
if( isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["type"]) ){
	$username = $_POST["username"];
	$password = $_POST["password"];
	$type = $_POST["type"];

	if( signin_check($dbh, $username, $password, $type) ){
		header("location:mn-$type.php");
	}else{
		$check_failed = true;
	}
}

?>

<html>
<head>
	<title>Sign In | Newbee Menu</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
</head>
<body>
<form class="form-horizontal" action="mn-signin.php" method="post">
<fieldset>

<!-- Form Name -->
<legend>Sign In</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="username">Username</label>  
  <div class="col-md-4">
  <input id="username" name="username" type="text" placeholder="" class="form-control input-md" required=""> 
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Password</label>
  <div class="col-md-4">
    <input id="password" name="password" type="password" placeholder="" class="form-control input-md" required="">   
  	<span class="help-block"><?php if($check_failed){ echo "Username or password incorrect.";}?></span> 
  </div>
</div>

<!-- Multiple Radios -->
<div class="form-group">
  <label class="col-md-4 control-label" for="radios"></label>
  <div class="col-md-4">
  <div class="radio">
    <label for="radios-0">
      <input type="radio" name="type" id="radios-0" value="user" checked="checked">
      User/Customer
    </label>
	</div>
  <div class="radio">
    <label for="radios-1">
      <input type="radio" name="type" id="radios-1" value="restaurant">
      Restaurant
    </label>
	</div>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">Sign In</button>
  </div>
</div>

</fieldset>
</form>
</body>
</html>