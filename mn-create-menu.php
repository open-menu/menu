<?php
	require_once("mn-config.php");
	require_once("mn-dbactions.php");
	require_once("mn-db.php");
	require_once("mn-classes.php");
	
	session_start();

	if(!isset($_SESSION["username"]) || !isset($_SESSION["restaurant"])){
		header("location:mn-signin.php");
	}

	if(isset($_POST["menu_title"]) && isset($_FILES["menu_image"])){
		$owner = $_SESSION["restaurant"]->restaurantID;

		$menu_id = create_menu($owner, $_POST["menu_title"]);

		set_menu_image($menu_id, $_FILES["menu_image"]);

		$_SESSION["restaurant"]->updateMenus();
	}
?>
<!doctype html>
<html lang="en">
<head>
	<title>Create Menu</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
</head>
<body>
	<form class="form-horizontal" action="mn-create-menu.php" method="post" enctype="multipart/form-data">
	<fieldset>

	<!-- Form Name -->
	<legend>Create Menu</legend>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="menu_title">Menu Title</label>  
	  <div class="col-md-4">
	  <input id="menu_title" name="menu_title" type="text" placeholder="" class="form-control input-md" required="">
	    
	  </div>
	</div>

	<!-- Image Upload -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="menu_image">Menu Image</label>  
	  <div class="col-md-4">
	  <input id="menu_image" name="menu_image" type="file">
	    
	  </div>
	</div>


	<!-- Button -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="submit"></label>
	  <div class="col-md-4">
	    <button id="submit" name="submit" class="btn btn-primary">Create</button>
	  </div>
	</div>
	</fieldset>
	</form>
</body>
</html>
