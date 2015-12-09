<?php
	if(isset($_GET["check"]) && $_GET["check"] == "false"){
		$check = "Username unavailable.";
	}else{
		$check = "";
	}
?>
<html>
<head>
	<title>Sign Up | Newbee Menu</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
</head>
<body>
<form class="form-horizontal" action="mn-signup-check.php" method="post">
<fieldset>

<!-- Form Name -->
<legend>Sign Up</legend>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="username">Username</label>  
  <div class="col-md-4">
  <input id="username" name="username" type="text" placeholder="" class="form-control input-md" required="">
  <span class="help-block"><?php echo $check; ?></span>  
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Password</label>
  <div class="col-md-4">
    <input id="password" name="password" type="password" placeholder="" class="form-control input-md" required="">
    <span class="help-block">help</span>
  </div>
</div>

<!-- Multiple Radios -->
<div class="form-group">
  <label class="col-md-4 control-label" for="type">User Type</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="type-0">
      <input type="radio" name="type" id="type-0" value="user" checked="checked">
      User/Customer
    </label>
  </div>
  <div class="radio">
    <label for="type-1">
      <input type="radio" name="type" id="type-1" value="restaurant">
      Restaurant
    </label>
  </div>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">E-mail</label>  
  <div class="col-md-4">
  <input id="email" name="email" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit_button"></label>
  <div class="col-md-4">
    <button id="submit_button" name="submit_button" class="btn btn-primary">Sign Up</button>
  </div>
</div>

</fieldset>
</form>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>