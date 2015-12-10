<?php
	require_once("mn-config.php");
	require_once("mn-dbactions.php");
	require_once("mn-db.php");
	
	session_start();

	if(!isset($_SESSION["username"])){
		header("location:mn-signin.php");
	}
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>NewBee Restaurant Personal Page</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />

	<link href="css/bootstrap.css" rel="stylesheet" />
	<link href="css/gsdk.css" rel="stylesheet"/>
	<link href="css/user.css" rel="stylesheet" />
	<link href="css/coupon.css" rel="stylesheet" />	
	<link href="css/demo.css" rel="stylesheet" />
	<link href="css/datouwang.css" rel="stylesheet" type="text/css">

	<!--     Fonts and icons     -->
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link href="css/pe-icon-7-stroke.css" rel="stylesheet" />
	<link href="css/site.css" rel="stylesheet" />
</head>
<body>
	<div class="parallax">
		<div class=" backgroundimage" style="background-repeat:repeat">
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
								<!-- Restaurant Data Button -->
								<li>
									<button class="btn btn-round btn-fill btn-info" onclick="window.location.href='mn-restaurant-list.php'">
										<i class="fa fa-book"></i>Restaurants
									</button>
								</li>
								<li>
									<button class="btn btn-round btn-fill btn-info" data-toggle="" data-target="">
										<i class="fa fa-share-alt"></i>Share
									</button>
								</li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li>
									<button class="btn btn-round btn-fill btn-info" onclick="window.location.href='mn-signout.php'">
										<i class="fa fa-sign-in"></i>
										Sign out
									</button>
								</li>
							</ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav><!-- end navbar -->

				<!--    Body     -->
				<div class="container">
					<!-- First row  Sales-->
					<div class="row" style="font-size:30px; margin:-15px 0 20px 0;border-bottom:1px solid black;"> This Week</div>
					<div class="row">
						<div class = " col-md-3 col-md-3">
							<a href ="mn-dish-detail.php" class = "thumbnail" >
								<img src ="../menu/image/unknow-img.png" alt = "..."></a>
								<div class = "caption" style="margin-top:-1em">             
									<h5> Restaurant Name1</h5>
									<div class = "caption" style="margin-top:-1em">
										<h5> price: $$ <br> 
											<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>
										</h5>
									</div>
								</div>
						</div>

						<div class = " col-md-3 col-md-3">
							<a href ="mn-dish-detail.php" class = "thumbnail" >
								<img src ="blog_post.jpg" alt = "..."></a>
								<div class = "caption" style="margin-top:-1em">             
									<h5> Restaurant Name1</h5>
									<div class = "caption" style="margin-top:-1em">
										<h5> price: $$ <br> 
											<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>
										</h5>
									</div>
								</div>
						</div>
					
						<div class = " col-md-3 col-md-3">
							<a href ="mn-dish-detail.php" class = "thumbnail" >
								<img src ="blog_post.jpg" alt = "..."></a>
								<div class = "caption" style="margin-top:-1em">             
									<h5> Restaurant Name1</h5>
									<div class = "caption" style="margin-top:-1em">
										<h5> price: $$ <br> 
											<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>
										</h5>
									</div>
								</div>
						</div>

						<div class = "col-md-3 col-md-3">
							<a href ="mn-dish-detail.php" class = "thumbnail" >
								<img src ="blog_post.jpg" alt = "..."></a>
								<div class = "caption" style="margin-top:-1em">             
									<h5> Restaurant Name1</h5>
									<div class = "caption" style="margin-top:-1em">
										<h5> price: $$ <br> 
											<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>
										</h5>
									</div>
								</div>
						</div>
					</div> <!-- End first row -->

			<!-- second row  personal  -->
					<div class="row">
				<!--  Personal setting  -->
						<div class="col-md-2" style="margin-top:1em; float: left">
							<div class="user-info">
								<a href="http://localhost/menu/mn-user.php#" class="food-catagory">
									<img src="../menu/image/2.jpg" class="path1">
								</a>

								<div class="btn-ice1" align="center"><p></p><strong><?php echo $_SESSION['username'];?></strong></div>
								<a href="mn-user-account.php" class="btn-ice2" align="center" style="color:black"><p></p><i class="fa fa-cog fa=spin"></i><strong>Account</strong></a>
								<div class="btn-ice3" align="center"><p></p><i class="fa fa-shopping-cart"></i><strong>Cart</strong></div>
								<div class="btn-ice4"></div>
							</div>
						</div>

				<!-- Favorites need data -->

						<div class="col-md-10">
						    <div class="row" style="font-size:30px; margin:5px 0 0 0;border-bottom:1px solid black;"> Coupon - Weekly</div>
							<div class="grid-c">

				<!-- 优惠劵的信息（名字，价钱，地址，介绍）-->
								<figure class="effect-julia thumbnail">
									<img src="image/6.jpg" style="height:220px; width:380px " />
									<figcaption>
										<p>O.M.Y</p><br>
										<p>50% off</p><br>
										<P>address</P>
									</figcaption>			
								</figure>
								<figure class="effect-julia thumbnail">
									<img src="image/6.jpg" style="height:220px; width:380px " />
									<figcaption>
										<p>O.M.Y</p><br>
										<p>50% off</p><br>
										<P>address</P>
									</figcaption>			
								</figure>
								<figure class="effect-julia thumbnail">
									<img src="image/6.jpg" style="height:220px; width:380px " />
									<figcaption>
										<p>O.M.Y</p><br>
										<p>50% off</p><br>
										<P>address</P>
									</figcaption>			
								</figure>
								<figure class="effect-julia thumbnail">
									<img src="image/6.jpg" style="height:220px; width:380px " />
									<figcaption>
										<p>O.M.Y</p><br>
										<p>50% off</p><br>
										<P>address</P>
									</figcaption>			
								</figure>
								<figure class="effect-julia thumbnail">
									<img src="image/4.jpg" style="height:220px; width:380px " />
									<figcaption>
										<p>O.M.Y</p><br>
										<p>50% off</p><br>
										<P>address</P>
									</figcaption>			
								</figure>
								<figure class="effect-julia thumbnail">
									<img src="image/3.jpg" style="height:220px; width:380px " />
									<figcaption>
										<p>O.M.Y</p><br>
										<p>50% off</p><br>
										<P>address</P>
									</figcaption>			
								</figure>
								<figure class="effect-julia thumbnail">
									<img src="image/2.jpg" style="height:220px; width:380px " />
									<figcaption>
										<p>O.M.Y</p><br>
										<p>50% off</p><br>
										<P>address</P>
									</figcaption>			
								</figure>
							</div>
						</div><!-- end favorites -->

					</div><!-- end second row -->
				</div><!-- container end -->
			</div><!-- End div -->
		</div> <!-- End background -->
	</div> <!-- parallax end -->
</body>
</html>
