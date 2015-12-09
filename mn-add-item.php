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

	$menus = $restaurant->restaurantMenus;

	if(isset($_POST["item_name"]) && isset($_POST["item_price"]) 
		&& isset($_POST["item_detail"]) &&isset($_POST["menu_id"])){

		$values = array("item_name"=>$_POST["item_name"],
										"item_price"=>$_POST["item_price"],
										"item_detail"=>$_POST["item_detail"]);
		$imageFILE = $_FILES["item_image"];
		$menu_id = $_POST["menu_id"];

		$upload_success = add_item($menu_id, $values, $imageFILE);
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
	<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
	<fieldset>

	<!-- Form Name -->
	<legend>Add Item</legend>

	<!-- Select Menu -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="selectbasic">Select Basic</label>
	  <div class="col-md-4">
	    <select id="selectbasic" name="menu_id" class="form-control">
	      <?php
	      	foreach ($menus as $cur_menu) {
	      		echo "<option value=\"".$cur_menu["id"]."\">".$cur_menu["menu_title"]."</option>";
	      	}
	      ?>
	    </select>
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="item_name">Name</label>  
	  <div class="col-md-4">
	  <input id="item_name" name="item_name" type="text" placeholder="" class="form-control input-md" required="">
	    
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="item_price">Price</label>  
	  <div class="col-md-4">
	  <input id="item_price" name="item_price" type="text" placeholder="" class="form-control input-md" required="">
	    
	  </div>
	</div>

	<!-- Image Upload -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="item_image">Image</label>  
	  <div class="col-md-4">
	  <input id="item_image" name="item_image" type="file" required="">
	    
	  </div>
	</div>

	<!-- Textarea -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="item_detail">Detail</label>
	  <div class="col-md-4">                     
	    <textarea class="form-control" id="item_detail" name="item_detail"></textarea>
	  </div>
	</div>
	
	<!-- Button -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="submit"></label>
	  <div class="col-md-4">
	    <button id="submit" name="submit" class="btn btn-primary">Add</button>
	  </div>
	</div>

	<h1><?php if(isset($upload_success)){$status = $upload_success?" SUCCESS":" FAILED"; echo $_POST["item_name"].$status;}?><h1>
	</fieldset>
	</form>