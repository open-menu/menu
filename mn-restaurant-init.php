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
	
  if(isset($_POST["restaurant_city"])){
		// ["restaurant_price"]=> string(2) "22" ["description"]=> string(4) "Ojig"
    $restaurant->restaurantName = $_POST["restaurant_name"]; 
		$restaurant->restaurantCity = $_POST["restaurant_city"];
		$restaurant->restaurantType = $_POST["restaurant_type"];
		$restaurant->restaurantCuisine = $_POST["restaurant_cuisine"];
		$restaurant->restaurantPrice = $_POST["restaurant_price"];
		$restaurant->restaurantDescription = $_POST["description"];
    $restaurant->address_l1 = $_POST["address_l1"];
    $restaurant->address_l2 = $_POST["address_l2"];
    $restaurant->address_l3 = $_POST["address_l3"];
		$restaurant->isActive = true;

		$update_failed = false;
		if($restaurant->updateDB()){
			header("location:mn-restaurant.php");
		}else{
			$update_failed = true;
		}
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
  <div class="parallax">
        <div class="parallax-image">
            <img src="blog_post.jpg" width="530" height="650">
        </div>
        	<div>
        		<!-- Navbar will come here -->
        	  	 <nav class="navbar navbar-default" role="navigation-demo">
                  <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-default2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="../menu">Home</a>
                    </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navigation-default2">
                      <ul class="nav navbar-nav">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                TeamNewbee
                                <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="http://teamnewbee.blogspot.com/">About us</a></li>
                                <li class="divider"></li>
                                <li><a href="https://github.com/open-menu/menu">Github Repo</a></li>
                                <li class="divider"></li>
                                <li><a href="http://teamnewbee.blogspot.com/2015/09/project-pitch.html">Project Pitch</a></li>
                              </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-toggle="search" class="hidden-xs"><i class="fa fa-search"></i></a>
                        </li>
                      </ul>
                       <form class="navbar-form navbar-left navbar-search-form" role="search">
                         <div class="form-group">
                              <input type="text" value="" class="form-control" placeholder="Search for a restaurant">
                         </div>
                      </form>
                      <!--<ul class="nav navbar-nav navbar-right">
                            <li><button class="btn btn-round btn-fill btn-info" data-toggle="modal" data-target="#registerModal"><i class="fa fa-pencil-square-o"></i>&nbsp&nbspRegister</button></li>
                            <li><button class="btn btn-round btn-fill btn-info" data-toggle="modal" data-target="#signInModal"><i class="fa fa-sign-in"></i>&nbsp&nbspSign in</button></li>
                       </ul>-->

                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                 </nav>
                 <!-- end navbar -->
             </div>



<!--   Big container   -->
    <div class="container" >
        <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
           
            <!--      Wizard container        -->   
            <div class="wizard-container"> 
                <div class="card wizard-card ct-wizard-azzure" id="wizard">
                    <form action="mn-restaurant-init.php" method="post">
                <!--        You can switch "ct-wizard-azzure"  with one of the next bright colors: "ct-wizard-blue", "ct-wizard-green", "ct-wizard-orange", "ct-wizard-red"  -->
                
                    	<div class="wizard-header">
                        	<h3>
                        	   <b>LIST</b> YOUR MENU <br>
                        	   <small>This information will let us know more about your restaurant.</small>
                        	</h3>
                    	</div>
                    	<ul>
                            <li><a href="#details" data-toggle="tab">Details</a></li>
                            <li><a href="#address" data-toggle="tab">Address</a></li>
                            <li><a href="#description" data-toggle="tab">Description</a></li>
                        </ul>
                        
                        <div class="tab-content">
                            <div class="tab-pane" id="details">
                              <div class="row">
                                  <div class="col-sm-12">
                                    <h4 class="info-text"> Let's start with the basic details</h4>
                                  </div>
                                  <div class="col-sm-5 col-sm-offset-1">
                                      <div class="form-group">
                                        <label>What city is your restaurant in?</label>
                                        <input type="text" class="form-control" name="restaurant_city" id="exampleInputEmail1" value="<?php echo $restaurant->restaurantCity;?>">
                                      </div>
                                  </div>
                                  <div class="col-sm-5">
                                      <div class="form-group">
                                        <label>Restaurant Type</label>
                                        <select name="restaurant_type" class="form-control">
                                            <option selected="" value="<?php echo $restaurant->restaurantType;?>"><?php echo $restaurant->restaurantType;?></option>
                                            <option value="Fast Food">Fast Food</option>
                                            <option value="Fine Dining">Fine Dining</option>
                                            <option value="Cafe">Coffee and tea shops</option>
                                            <option value="Bar">Bar</option>
                                        </select>
                                      </div>
                                  </div>
                                  <div class="col-sm-5 col-sm-offset-1">
                                      <div class="form-group">
                                          <label>Cuisine</label>
                                          <select name="restaurant_cuisine" class="form-control">
                                            <option selected="" value="<?php echo $restaurant->restaurantCuisine;?>"><?php echo $restaurant->restaurantCuisine;?></option>
                                            <option value="Chinese">Chinese</option>
                                            <option value="American">American</option>
                                            <option value="Thai">Thai</option>
                                            <option value="Korean">Korean</option>
                                            <option value="Japanese">Japanese</option>
                                            <option value="Mexican">Mexican</option>
                                            <option value="Italian">Italian</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-sm-5">
                                      <div class="form-group">
                                          <label>Daily Price</label>
                                          <div class="input-group">
                                              <input name="restaurant_price" type="text" class="form-control" value="<?php echo $restaurant->restaurantPrice; ?>">
                                              <span class="input-group-addon">$</span>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                            </div>
                            <!-- Address -->
                            <div class="tab-pane" id="address">
                                <div class="row">
                                    <h4 class="info-text"> The address of your restaurant.</h4>
                                    <div class="col-sm-5 col-sm-offset-1">
                                      <div class="form-group">
                                        <label>Restairamt Name</label>
                                        <input type="text" class="form-control" name="restaurant_name" id="exampleInputEmail1" value="<?php echo $restaurant->restaurantName;?>">
                                      </div>
                                    </div>
                                    <div class="col-sm-5">
                                      <div class="form-group">
                                        <label>Address Line 1</label>
                                        <input type="text" class="form-control" name="address_l1" id="exampleInputEmail1" value="<?php echo $restaurant->address_l1;?>">
                                      </div>
                                    </div>
                                    <div class="col-sm-5 col-sm-offset-1">
                                      <div class="form-group">
                                        <label>Address Line 2</label>
                                        <input type="text" class="form-control" name="address_l2" id="exampleInputEmail1" value="<?php echo $restaurant->address_l2;?>">
                                      </div>
                                    </div>
                                    <div class="col-sm-5">
                                      <div class="form-group">
                                        <label>Address Line 3</label>
                                        <input type="text" class="form-control" name="address_l3" id="exampleInputEmail1" value="<?php echo $restaurant->address_l3;?>">
                                      </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="description">
                                <div class="row">
                                    <h4 class="info-text"> Drop us a small description </h4>
                                    <div class="col-sm-6 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>Restaurant description</label>
                                            <textarea name="description" class="form-control" rows="9"><?php echo $restaurant->restaurantDescription;?></textarea>
                                          </div>
                                    </div>
                                    <div class="col-sm-4">
                                         <div class="form-group">
                                            <label>Example</label>
                                            <p class="description">"This restaurant has estalished since 1957. We have a good amount population of people as our visitors and some regular customers whom come every sunday. It has some good reputations around the neighborhood."</p>
                                          </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wizard-footer">
                            	<div class="pull-right">
                                    <input type='button' class='btn btn-next btn-fill btn-info btn-wd btn-sm' name='next' value='Next' />
                                    <input type='submit' class='btn btn-finish btn-fill btn-info btn-wd btn-sm' value='Finish' />
        
                                </div>
                                <div class="pull-left">
                                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' />
                                </div>
                                <div class="clearfix"></div>
                        </div>	
                    </form>
                </div>
            </div> <!-- wizard container -->
        </div>
        </div> <!-- row -->
    </div> <!--  big container -->

<div class="space-0"></div>
    <div class="section section-gray" id="footers">     
        <div class="container">
    </div>
        <div class="credit" style="text-align:center" >
               &copy Referred 2015 Creative Tim
                </div>
            </div>
       


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