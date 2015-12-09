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
                      <!--need to change-->
                      <ul class="nav navbar-nav navbar-right">
                            <li><button class="btn btn-round btn-fill btn-info" data-toggle="modal" data-target="#registerModal"><i class="fa fa-pencil-square-o"></i>&nbsp&nbspMy Favor</button></li>
                          	<li><button class="btn btn-round btn-fill btn-info" data-toggle="modal" data-target="#signInModal"><i class="fa fa-sign-out"></i>&nbsp&nbspSign Out</button></li>
                       </ul>
     				
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                 </nav>
                 <!-- end navbar -->

                 <!-- sorting food -->
               <nav class="navbar navbar-default navbar-form" >
                  <div class="container">
                 		<li> <button class = "btn btn-default navbar-btn btn-sm" type = "button" >XXX Food </button>
                         <button class = "btn btn-default navbar-btn btn-sm" type = "button" >YYY Food </button>
                         <button class = "btn btn-default navbar-btn btn-sm" type = "button" >ZZZ Food </button></li>
                  </div>
                </nav>
                <!-- restaurand info -->
                <div class ="jumbotron">
                  <div class = "container">
                    <div class ="row">

                      <div class = " col-md-3 col-md-3">
                        <a href ="#" class = "thumbnail" >
                            <img src ="blog_post.jpg" alt = "..."></a>
                            <div class = "caption">             
                              <h2> Restaurant Name1</h2>
                              <h3> price: $$ <br> time: xx -xx </h3>
                              <p> <a href="#" class = "btn btn-primary" role="button">Menu</a></p>
                            </div>
                        </div>
                      
                     <div class = " col-md-3 col-md-3">
                        <a href ="#" class = "thumbnail" >
                            <img src ="blog_post.jpg" alt = "..."></a>
                            <div class = "caption">             
                              <h2> Restaurant Name2</h2>
                              <h3> price: $$ <br> time: xx -xx </h3>
                              <p> <a href="#" class = "btn btn-primary" role="button">Menu</a></p>
                            </div>

                        </div><div class = " col-md-3 col-md-3">
                        <a href ="#" class = "thumbnail" >
                            <img src ="blog_post.jpg" alt = "..."></a>
                            <div class = "caption">             
                              <h2> Restaurant Name3</h2>
                              <h3> price: $$ <br> time: xx -xx </h3>
                              <p> <a href="#" class = "btn btn-primary" role="button">Menu</a></p>
                            </div>

                        </div><div class = " col-md-3 col-md-3">
                        <a href ="#" class = "thumbnail" >
                            <img src ="blog_post.jpg" alt = "..."></a>
                            <div class = "caption">             
                              <h2> Restaurant Name4</h2>
                              <h3> price: $$ <br> time: xx -xx </h3>
                              <p> <a href="#" class = "btn btn-primary" role="button">Menu</a></p>
                            </div>

                        </div><div class = " col-md-3 col-md-3">
                        <a href ="#" class = "thumbnail" >
                            <img src ="blog_post.jpg" alt = "..."></a>
                            <div class = "caption">             
                              <h2> Restaurant Name5</h2>
                              <h3> price: $$ <br> time: xx -xx </h3>
                              <p> <a href="#" class = "btn btn-primary" role="button">Menu</a></p>
                            </div>
                        </div>
                </div>
                 		
                 	</ul>


</html>