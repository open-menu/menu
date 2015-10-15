<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>OpenMenu</title>

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
</head>
<body>


<div class="parallax">
        <div class="parallax-image">
            <img src="blog_post.jpg">
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
                      <a class="navbar-brand" href="#">Home</a>
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
                      <ul class="nav navbar-nav navbar-right">
                            <li><button class="btn btn-round btn-fill btn-info" data-toggle="modal" data-target="#registerModal"><i class="fa fa-pencil-square-o"></i>&nbsp&nbspRegister</button></li>
                            <li><button class="btn btn-round btn-fill btn-info" data-toggle="modal" data-target="#signInModal"><i class="fa fa-sign-in"></i>&nbsp&nbspSign in</button></li>
                       </ul>

                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                 </nav>
                 <!-- end navbar -->
             </div>
        <div class="motto">
            <div>Title</div>
        </div>
        <h3 class="motivation">A Menu for Every Restaurant.</h3>
    </div>

<div class="wrapper">
     <div class="container">


     </div>
</div>

<!-- Modal -->

<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#restaurant" aria-controls="restaurant" role="tab" data-toggle="tab">Restaurant</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Guest</a></li>
   </ul>
      </div>
      <div class="modal-body">

      <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="restaurant">
      <!-- restaurant sign up -->
      <form class="form-horizontal">
    <fieldset>

        <!-- Form Name -->
        <legend>Restaurant Register</legend>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="username">Username</label>  
          <div class="col-md-4">
          <input id="username" name="username" type="text" placeholder="Username" class="form-control input-md" required="">
          <span class="help-block">Name of User</span>  
          </div>
        </div>

        <!-- Password input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="password">Password </label>
          <div class="col-md-4">
            <input id="password" name="password" type="password" placeholder="Password " class="form-control input-md" required="">
            <span class="help-block">Admin Password </span>
          </div>
        </div>

        <!-- Password input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="rpassword">confirm</label>
          <div class="col-md-4">
            <input id="rpassword" name="rpassword" type="password" placeholder="Password" class="form-control input-md" required="">
            <span class="help-block">Retype password</span>
          </div>
        </div>

         <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="email">Email</label>  
          <div class="col-md-4">
          <input id="email" name="email" type="text" placeholder="Email address" class="form-control input-md" required="">
          <span class="help-block">Email will be used for notication messages</span>  
          </div>
        </div>
        
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="restaurant">Restaurant Name</label>  
          <div class="col-md-4">
          <input id="restaurant" name="restaurant" type="text" placeholder="restaurant" class="form-control input-md" required="">
          <span class="help-block">Name of Restaurant</span>  
          </div>
        </div>

         <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="phone">Phone</label>  
          <div class="col-md-4">
          <input id="phone" name="phone" type="text" placeholder="Phone Number" class="form-control input-md" required="">
          <span class="help-block">Business Phone</span>  
          </div>
        </div>
        
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="address1">Address</label>  
          <div class="col-md-4">
          <input id="address1" name="address1" type="text" placeholder="Address " class="form-control input-md" required="">
    
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="address1"></label>  
          <div class="col-md-4">
          <input id="address1" name="address1" type="text" placeholder="Address2" class="form-control input-md">
    
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="city">City</label>  
          <div class="col-md-4">
          <input id="city" name="city" type="text" placeholder="City" class="form-control input-md" required="">
    
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="selectbasic">Select Basic</label>
          <div class="col-md-4">
            <select id="selectbasic" name="selectbasic" class="form-control">
		        <option value="">Choose State:</option>
		        <option value="AL">Alabama</option>
		        <option value="AK">Alaska</option>
		        <option value="AZ">Arizona</option>
		        <option value="AR">Arkansas</option>
		        <option value="CA">California</option>
		        <option value="CO">Colorado</option>
		        <option value="CT">Connecticut</option>
		        <option value="DE">Delaware</option>
		        <option value="FL">Florida</option>
		        <option value="GA">Georgia</option>
		        <option value="HI">Hawaii</option>
		        <option value="ID">Idaho</option>
		        <option value="IL">Illinois</option>
		        <option value="IN">Indiana</option>
		        <option value="IA">Iowa</option>
		        <option value="KS">Kansas</option>
		        <option value="KY">Kentucky</option>
		        <option value="LA">Louisiana</option>
		        <option value="ME">Maine</option>
		        <option value="MD">Maryland</option>
		        <option value="MA">Massachusetts</option>
		        <option value="MI">Michigan</option>
		        <option value="MN">Minnesota</option>
		        <option value="MS">Mississippi</option>
		        <option value="MO">Missouri</option>
		        <option value="MT">Montana</option>
		        <option value="NE">Nebraska</option>
		        <option value="NV">Nevada</option>
		        <option value="NH">New Hampshire</option>
		        <option value="NJ">New Jersey</option>
		        <option value="NM">New Mexico</option>
		        <option value="NY">New York</option>
		        <option value="NC">North Carolina</option>
		        <option value="ND">North Dakota</option>
		        <option value="OH">Ohio</option>
		        <option value="OK">Oklahoma</option>
		        <option value="OR">Oregon</option>
		        <option value="PA">Pennsylvania</option>
		        <option value="RI">Rhode Island</option>
		        <option value="SC">South Carolina</option>
		        <option value="SD">South Dakota</option>
		        <option value="TN">Tennessee</option>
		        <option value="TX">Texas</option>
		        <option value="UT">Utah</option>
		        <option value="VT">Vermont</option>
		        <option value="VA">Virginia</option>
		        <option value="WA">Washington</option>
		        <option value="WV">West Virginia</option>
		        <option value="WI">Wisconsin</option>
		        <option value="WY">Wyoming</option>
            </select>
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="zip">Zip Code</label>  
          <div class="col-md-4">
          <input id="zip" name="zip" type="text" placeholder="Zip Code" class="form-control input-md" required="">
    
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="contactname">Contact Name</label>  
          <div class="col-md-4">
          <input id="contactname" name="contactname" type="text" placeholder="Full Name" class="form-control input-md" required="">
    
          </div>
        </div>

        <!-- Button (Double) -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="register"></label>
          <div class="col-md-8">
            <button id="register" name="register" class="btn btn-success">Register</button>
            <button id="cancel" name="cancel" class="btn btn-danger">Cancel</button>
          </div>
        </div>

        </fieldset>
        </form>
    </div>
    <div role="tabpanel" class="tab-pane" id="profile">
      <!-- guest sign up -->
        <form class="form-horizontal">
    <fieldset>

        <!-- Form Name -->
        <legend>Guest Register</legend>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="username">Username</label>  
          <div class="col-md-4">
          <input id="username" name="username" type="text" placeholder="Username" class="form-control input-md" required="">
          <span class="help-block">Name of User</span>  
          </div>
        </div>

        <!-- Password input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="password">Password </label>
          <div class="col-md-4">
            <input id="password" name="password" type="password" placeholder="Password " class="form-control input-md" required="">
            <span class="help-block"> Password </span>
          </div>
        </div>

        <!-- Password input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="rpassword">confirm</label>
          <div class="col-md-4">
            <input id="rpassword" name="rpassword" type="password" placeholder="Password" class="form-control input-md" required="">
            <span class="help-block">Retype password</span>
          </div>
        </div>

         <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="email">Email</label>  
          <div class="col-md-4">
          <input id="email" name="email" type="text" placeholder="Email address" class="form-control input-md" required="">
          <span class="help-block">Email will be used for notication messages</span>  
          </div>
        </div>
        
         <!-- Button (Double) -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="register"></label>
          <div class="col-md-8">
            <button id="register" name="register" class="btn btn-success">Register</button>
            <button id="cancel" name="cancel" class="btn btn-danger">Cancel</button>
          </div>
        </div>
    </div>
  </div>

      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="signInModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-body">

	  <div class="login-container">
            <div id="output"></div>
            <div class="avatar"></div>
            <div class="form-box">
                <form action="" method="">
                    <input name="user" type="text" placeholder="username">
                    <input type="password" placeholder="password">
                    <button class="btn btn-info btn-block login" type="submit">Login</button>
                    <!--<button class="btn btn-info btn-block login" type="submit">Sign Up</button>-->
                </form>
            </div>
       </div>
      </div>

    </div>
  </div>
</div>

</body>



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
