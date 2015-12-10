<?php
  require_once("mn-config.php");
  require_once("mn-dbactions.php");
  require_once("mn-db.php");
  require_once("mn-classes.php");

  session_start();

  if(!isset($_SESSION["username"])){
    header("location:mn-signin.php");
  }

  if(!isset($_GET["menu_id"])){
    mn_error("Unknown Menu", "We could not find the menu you are looking for.");
  }

  $menu_id = $_GET["menu_id"];
  $menu = get_menu($menu_id);
  $item_list = get_items($menu_id);

  $is_owner = false;
  if(isset($_SESSION["restaurant"])){
    $rest = $_SESSION["restaurant"];
    
    $is_owner = is_menu_owner($rest->restaurantID, $menu_id);
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
<div class="parallax">
<div class="parallax-image">
<background-color: white>
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
    <a class="navbar-brand" href="<?php echo get_home($_SESSION["type"]);?>">Home</a>
  </div>

<!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="navigation-default2">
    <ul class="nav navbar-nav">
      <!-- <li class="active"><a href="#">Link</a></li> -->
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
              <!-- <li class="divider"></li>
              <li><a href="#">Separated link</a></li> -->
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
      <!--<li><button class="btn btn-round btn-fill btn-info" data-toggle="modal" data-target="#registerModal"><i class="fa fa-pencil-square-o"></i>&nbsp&nbspMy Favor</button></li>-->
      <?php 
        if($is_owner){
      ?>
        <li><button class="btn btn-round btn-fill btn-info" data-toggle="modal" data-target="#add_item_modal"><i class="fa fa-plus"></i>Add Dish</button></li>
      <?php
        }
      ?>
      <li><button class="btn btn-round btn-fill btn-info" onclick="window.location.href='mn-signout.php'"><i class="fa fa-sign-out"></i>Sign Out</button></li>                       
    </ul>
  </div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
<!-- sorting food -->
<!--<nav class="navbar navbar-default navbar-form" >
<div class="container">                   
		<li> <button class = "btn btn-default navbar-btn btn-sm" type = "button" >XXX Food </button>
       <button class = "btn btn-default navbar-btn btn-sm" type = "button" >YYY Food </button>
       <button class = "btn btn-default navbar-btn btn-sm" type = "button" >ZZZ Food </button></li>
</div>
</nav>
</nav>-->
<!-- end navbar -->


<!-- restaurand info -->
<div class ="jumbotron" style="margin-bottom:0;">
  
  
<div class = "container">
     <div class="row" id="product-cards">
  <div class="col-md-3">
      <div class="card card-refine">
          <div class="header">
              <h4 class="title"><?php echo $menu["menu_title"];?>
                  <button class="btn btn-default btn-xs btn pull-right btn-simple" rel="tooltip" title="Reset Filter">
                      <i class="fa fa-refresh"></i>
                  </button>
               </h4>
          </div>
          <div class="content">      
                <div class="panel-group" id="accordion">

                <!--<div class="panel panel-default">
                  <div class="panel-heading">
                    <h6 class="panel-title">
                      <a href="#refinePrice">
                        Price Range
                        <i class="fa fa-caret-up pull-right"></i>
                      </a>
                    </h6>
                  </div>
                  <div id="refinePrice">
                    <div class="panel-body">
                       <span class="price price-left">&dollar; 5</span>
                       <span class="price price-right">&dollar; 500</span>
                       <div class="clearfix"></div>
                       <div id="refine-price-range" class="slider slider-info"></div>
                    </div>
                  </div>
                </div>-->
                
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
              </div>  
          </div>
      </div> <!-- end card -->
  </div>
  <div class ="container">
    <?php
      foreach($item_list as $item){
        echo "<div class = \"col-md-3 col-md-3\">";
        echo "<a href =\"mn-dish-detail.php?item_id=".$item["id"]."\" class = \"thumbnail\" >";
        echo "<img src =\"".$item['item_image']."\" alt = \"...\">";
        echo "</a>";
        echo "<div class = \"caption\">";
        echo "<h2>".$item['item_name']."</h2>";
        echo "<h3> price: $".$item['item_price']."</h3>";
        echo "</div></div>";
      }
    ?> 
  </div>

  <!-- Modal for showing list of menus -->
  <div id="add_item_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content" style="background-color:white !important;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Add Item</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="mn-add-item.php?redirect_mid=<?php echo $menu_id;?>" method="post" enctype="multipart/form-data">
          <fieldset>

          <input type="hidden" name="menu_id" value='<?php echo $menu_id;?>'>

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
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

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

</body>
</html>