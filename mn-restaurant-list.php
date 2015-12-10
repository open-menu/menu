<?php
  require_once("mn-config.php");
  require_once("mn-dbactions.php");
  require_once("mn-db.php");
  require_once("mn-classes.php");

  session_start();
?>

<!doctype html>
<html lang="en">
<head>

	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Open Menu | Restaurant List</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/gsdk.css" rel="stylesheet"/>

    <link href="css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link href="css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link href="css/site.css" rel="stylesheet" />
    <style type="text/css">
    h2{font-size: 16px;}
    h3{font-size: 13px;}
    </style>
</head>
<body>
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
        <a class="navbar-brand" href="<?php echo get_home($_SESSION["type"]);?>">Home</a>
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
        <!--need to change-->
        <ul class="nav navbar-nav navbar-right">
          <li><button class="btn btn-round btn-fill btn-info" onclick="window.location.href='mn-signout.php'"><i class="fa fa-sign-in"></i>Sign Out</button></li>                       
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <!-- end navbar -->
  <div class = "container">
    <div class="row" id="product-cards">
      <div class="col-md-3">
          <div class="card card-refine">
              <div class="header">
                <h4 class="title">Refine
                  <button class="btn btn-default btn-xs btn pull-right btn-simple" rel="tooltip" title="Reset Filter">
                    <i class="fa fa-refresh"></i>
                  </button>
                </h4>
              </div>
              
              <div class="content">      
                <div class="panel-group" id="accordion">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h6 class="panel-title">
                        <a href="#refineType">
                          Type
                          <i class="fa fa-caret-up pull-right"></i>
                        </a>
                      </h6>
                    </div>
                    <div id="refineType">
                      <div class="panel-body">
                         <label class="checkbox">
                            <input type="checkbox" value="" data-toggle="checkbox" checked="">
                            Breakfast
                          </label>
                          <label class="checkbox">
                            <input type="checkbox" value="" data-toggle="checkbox">
                            Brunch
                          </label>
                          <label class="checkbox">
                            <input type="checkbox" value="" data-toggle="checkbox">
                            Lunch
                          </label>
                          <label class="checkbox">
                            <input type="checkbox" value="" data-toggle="checkbox">
                            Dinner
                          </label>
                          <label class="checkbox">
                            <input type="checkbox" value="" data-toggle="checkbox">     
                          </label>
                          <label class="checkbox">
                            <input type="checkbox" value="" data-toggle="checkbox">
                            Tea & Coffee
                          </label>
                          <label class="checkbox">
                            <input type="checkbox" value="" data-toggle="checkbox">
                            Bars
                          </label>
                          <label class="checkbox">
                            <input type="checkbox" value="" data-toggle="checkbox">
                            Bakery & Desserts
                          </label>
                      </div>
                    </div>
                  </div>
  
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h6 class="panel-title">
                        <a href="#refineCuisine">
                          Cuisine
                          <i class="fa fa-caret-up pull-right"></i>
                        </a>
                      </h6>
                    </div>
                    <div id="refineCuisine">
                      <div class="panel-body panel-scroll">
                         <label class="checkbox">
                            <input type="checkbox" value="" data-toggle="checkbox" checked="">
                            All
                          </label>
                          <label class="checkbox">
                            <input type="checkbox" value="" data-toggle="checkbox">
                            American
                          </label>
                          <label class="checkbox">
                            <input type="checkbox" value="" data-toggle="checkbox">
                            Chinese
                          </label>
                          <label class="checkbox">
                            <input type="checkbox" value="" data-toggle="checkbox">
                            Italian
                          </label>
                          <label class="checkbox">
                            <input type="checkbox" value="" data-toggle="checkbox">
                            Korean
                          </label>
                          <label class="checkbox">
                            <input type="checkbox" value="" data-toggle="checkbox">
                            Japanese
                          </label>
                          <label class="checkbox">
                            <input type="checkbox" value="" data-toggle="checkbox">
                            Portuguese
                          </label>
                          <label class="checkbox">
                            <input type="checkbox" value="" data-toggle="checkbox">
                            Thai
                          </label>
                          <label class="checkbox">
                            <input type="checkbox" value="" data-toggle="checkbox">                                           
                          </label>
                          <label class="checkbox">
                            <input type="checkbox" value="" data-toggle="checkbox">
                            Indian
                          </label>
                          <label class="checkbox">
                            <input type="checkbox" value="" data-toggle="checkbox">
                            French
                          </label>
                          <label class="checkbox">
                            <input type="checkbox" value="" data-toggle="checkbox">
                            Caribbean
                          </label>
                          <label class="checkbox">
                            <input type="checkbox" value="" data-toggle="checkbox">
                            Greek
                          </label>
                          <label class="checkbox">
                            <input type="checkbox" value="" data-toggle="checkbox">
                            Mexican
                          </label>
                          <label class="checkbox">
                            <input type="checkbox" value="" data-toggle="checkbox">
                            Vietnamese
                          </label>
                          <label class="checkbox">
                            <input type="checkbox" value="" data-toggle="checkbox">
                            Arab
                          </label>
                          <label class="checkbox">
                            <input type="checkbox" value="" data-toggle="checkbox">
                            Jewish
                          </label>
                          <label class="checkbox">
                            <input type="checkbox" value="" data-toggle="checkbox">
                            German
                          </label>
                      </div>
                    </div>
                  </div><!-- end panel -->               
                </div>  
              </div>
            </div> <!-- end card -->
          </div><!-- end side bar -->
            
          <div>
            <?php
              $rest_list = get_restaurant_list();
              foreach($rest_list as $rest){
                echo "<div class = \"col-md-3\">";
                echo "<a href =\"#\" class = \"thumbnail\" >";
                echo "<img class=\"list-image\" src =\"".$rest['restaurant_logo']."\" alt = \"...\">";
                echo "</a>";
                echo "<div class = \"caption\">";
                echo "<h2>".$rest['restaurant_name']."</h2>";
                echo "<h3> price: $".$rest['restaurant_price']."<br>time: 9:00 - 12:00</h3>";
                echo "<p><a href=\"mn-menu-detail.php?menu_id=".$rest['id']."\" class = \"btn btn-primary\" role=\"button\">Menu</a></p>";
                echo "</div></div>";
              }
            ?>
          </div> 
        </div>
      </div>
  <script src="js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

	<script src="js/bootstrap.js" type="text/javascript"></script>

	<!--  Plugins -->
	<script src="js/gsdk-checkbox.js"></script>
  <script src="js/site.js"></script>
	<script src="js/gsdk-morphing.js"></script>
	<script src="js/gsdk-radio.js"></script>
	<script src="js/gsdk-bootstrapswitch.js"></script>
	<script src="js/bootstrap-select.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/chartist.min.js"></script>
  <script src="js/jquery.tagsinput.js"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

	<script src="js/get-shit-done.js"></script>


</html>