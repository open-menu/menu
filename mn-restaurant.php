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

  if(isset($_POST["menu_title"]) && isset($_FILES["menu_image"])){
    $owner = $_SESSION["restaurant"]->restaurantID;

    $menu_id = create_menu($owner, $_POST["menu_title"]);

    set_menu_image($menu_id, $_FILES["menu_image"]);

    $_SESSION["restaurant"]->updateMenus();
  }

  if(isset($_FILES["restaurant_logo"])){
    $rest_id = $_SESSION["restaurant"]->restaurantID;

    $result = set_restaurant_logo($rest_id, $_FILES["restaurant_logo"]);

    $_SESSION["restaurant"]->restaurantLogo = $result;
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
  <link href="css/animate.min.css" rel="stylesheet"/>
  
   <link href="css/light-bootstrap-dashboard.css" rel="stylesheet"/>
  
  <link href="css/demo.css" rel="stylesheet" />

  <!--     Fonts and icons     -->
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
  <link href="css/pe-icon-7-stroke.css" rel="stylesheet" />
  <link href="css/site.css" rel="stylesheet" />

</head>
<body>
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
          <ul class="nav navbar-nav navbar-right">
                <li><button class="btn btn-round btn-fill btn-info" data-toggle="modal" data-target="#create_modal"><i class="fa fa-plus"></i>Create Menu</button></li>
                <li><button class="btn btn-round btn-fill btn-info" onclick="window.location.href='mn-signout.php'"><i class="fa fa-sign-in"></i>Sign Out</button></li>
           </ul>

        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
     </nav>
     <!-- end navbar -->
  </div>

  <div class="wrapper">
       <div class="container">
             <div class="sidebar" data-color="orange">    
             <div class="sidebar-wrapper">
              <div class="logo">
                  <a class="simple-text">
                      Grid Menu
                  </a>
              </div>                       
              <ul class="nav">
                  <li class="active">
                      <a href="#">
                          <!--<i class="pe-7s-user"></i> -->
                          <p>Profile</p>
                      </a>
                  </li> 
                  <li>
                      <a href="#">
                          <!--<i class="pe-7s-note2"></i> -->
                          <p>Menu List</p>
                      </a>        
                  </li>
                  <li>
                      <a href="maps.html">
                          <!--<i class="pe-7s-map-marker"></i> -->
                          <p>Maps</p>
                      </a>        
                  </li>
                  <li>
                      <a href="mn-restaurant-init.php">
                          <!--<i class="pe-7s-map-marker"></i> -->
                          <p>Account Settings</p>
                      </a>        
                  </li>
              </ul> 
        </div>
      </div>
      <div class="main-panel">
        <div class="image">
        </div>
        <div class="content">
           <div class="author">
                <a href="#upload_logo_modal" data-toggle="modal" data-target="#upload_logo_modal">
               <img id="restaurant image"class="col-md-5 col-md-offset-3 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3 text-center" src="<?php echo $_SESSION['restaurant']->restaurantLogo;?>" alt="..." >                       
                 <h4 class="name text-center col-md-5 col-md-offset-3 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3"><?php echo $restaurant->restaurantName; ?><br>
                    <small><?php echo $restaurant->getAddressString(); ?></small>
                 </h4> 
               </a>
           </div>  
           <p class="description text-center col-md-5 col-md-offset-3 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3"> 
             <?php echo $restaurant->restaurantDescription; ?>
           </p>
        </div>
        <div class="text-center col-md-offset-8 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3">
          <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
          <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
          <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>
        </div>
      </div>
    </div>                    
  </div>

  <!-- Modal For Creating Menu -->
  <div id="create_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content" style="background-color:white !important;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Create Menu</h4>
        </div>
        <form class="form-horizontal" action="mn-restaurant.php" method="post" enctype="multipart/form-data">
          <fieldset>
            <div class="modal-body">                  
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
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button id="submit" name="submit"class="btn btn-primary">Create</button>
            </div>
          </fieldset>
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <!-- Modal For Uploading image logo -->
  <div id="upload_logo_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content" style="background-color:white !important;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Upload Restaurant Logo</h4>
        </div>
        <form class="form-horizontal" action="mn-restaurant.php" method="post" enctype="multipart/form-data">
          <fieldset>
            <div class="modal-body">                 
              <!-- Image Upload -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="restaurant_logo">Upload Image</label>  
                <div class="col-md-4">
                <input id="restaurant_logo" name="restaurant_logo" type="file">
                  
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button id="submit" name="submit"class="btn btn-primary">Upload</button>
            </div>
          </fieldset>
        </form>
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
