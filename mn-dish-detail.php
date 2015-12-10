<?php
    require_once("mn-config.php");
    require_once("mn-dbactions.php");
    require_once("mn-db.php");
    require_once("mn-classes.php");

    session_start();

    if(!isset($_SESSION["username"])){
        header("location:mn-signin.php");
    }

    if(isset($_SESSION["user"]))
        $user = $_SESSION["user"];
    else if(isset($_SESSION["restaurant"]))
        $user = NULL;

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Grid Menu</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        
        <link href="css/bootstrap.css" rel="stylesheet" />
        <link href="css/landing-page.css" rel="stylesheet"/>
        
        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400,300' rel='stylesheet' type='text/css'>
        <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
        
    </head>
    <body class="landing-page landing-page1">
        <nav class="navbar navbar-transparent navbar-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1"></span>
                    <span class="icon-bar bar2"></span>
                    <span class="icon-bar bar3"></span>
                    </button>
                    <a href="mn-user.php">
                        <div class="logo-container">
                            <div class="logo">
                                <img src="<?php echo $user->userAvatar; ?>" alt="">
                            </div>
                            <div class="brand">
                                <?php echo $user->username;?>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="example" >
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#"> 
                            <i class="fa fa-facebook-square"></i>
                            Like
                            </a>
                        </li>
                        <li>
                            <a href="#"> 
                            <i class="fa fa-twitter"></i>
                            Tweet
                            </a>
                        </li>
                        <li>
                            <a href="#"> 
                            <i class="fa fa-pinterest"></i>
                            Pin
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
        </nav>
        <div class="wrapper">
            <div class="parallax filter-gradient blue" data-color="blue">
                <div class="parallax-background">
                    <img class="parallax-background-image" src="image/bg3.jpg">
                </div>
                <div class= "container">
                    <div class="row">
                        <div class="col-md-5 hidden-xs">
                            <div class="parallax-image">
                                <img class="menu" src="image/dish1.jpg" style="top: 40px"/>
                            </div>
                        </div>
                        <div class="col-md-6 col-md-offset-1">
                            <!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
                                Item come from database -->
                            <div class="description">
                                <h2>Dish name</h2>
                                <br>
                                <h4>price: $xx -$xx</h4>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section section-gray section-clients">
                <div class="container text-center">
                    <h4 class="header-text">Description</h4>
                    <p>
                        What is in the dish: bla bla bla, xxx, yyy, zzz <br> Benefit: what is good for, xxx, yyy, zzz.(找食材的特性) <br>
                    </p>
                        
                    </div>
                </div>
            </div>
<!-- begin wwww.htmlcommentbox.com -->
 <div id="HCB_comment_box"><a href="http://www.htmlcommentbox.com">HTML Comment Box</a> is loading comments...</div>
 <link rel="stylesheet" type="text/css" href="//www.htmlcommentbox.com/static/skins/bootstrap/twitter-bootstrap.css?v=0" />
 <script type="text/javascript" id="hcb"> /*<!--*/ if(!window.hcb_user){hcb_user={};} (function(){var s=document.createElement("script"), l=hcb_user.PAGE || (""+window.location).replace(/'/g,"%27"), h="//www.htmlcommentbox.com";s.setAttribute("type","text/javascript");s.setAttribute("src", h+"/jread?page="+encodeURIComponent(l).replace("+","%2B")+"&opts=16862&num=10&ts=1449106927553");if (typeof s!="undefined") document.getElementsByTagName("head")[0].appendChild(s);})(); /*-->*/ </script>
<!-- end www.htmlcommentbox.com -->
                        
                   
               
            </div>

             <div class="section section-no-padding">
                <div class="parallax filter-gradient blue" data-color="blue">
                    <div class="parallax-background">
                        <img class ="parallax-background-image" src="image/bg3.jpg"/>
                    </div>
                    <div class="info">
                        <h1>Like Our Food?</h1>
                        <p>Add us to ur favor</p>
                        <a href="http://www.creative-tim.com/product/awesome-landing-page" class="btn btn-neutral btn-lg btn-fill">LIKE</a>
                    </div>
                </div>
            </div>