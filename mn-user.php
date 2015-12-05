
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
					<div class="row" style="margin-top:-3.8em; margin-bottom:-1em" >
						<h4>This week</h4>
					</div>
					<div class="row">
						<div class = " col-md-3 col-md-3">
							<a href ="#" class = "thumbnail" >
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
							<a href ="#" class = "thumbnail" >
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
							<a href ="#" class = "thumbnail" >
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
							<a href ="#" class = "thumbnail" >
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
						<div class="col-md-3 col-md-3" style="margin-top:1em">
							<div class="user-info">
								<a href="#" class="food-catagory">
									<img src="../menu/image/2.jpg" class="path1">
									<span>
										<div class="btn-food-catagory0" align="center"><p></p><i class="icon-hamburger"></i><strong>American</strong></div>
										<div class="btn-food-catagory1" align="center"><p></p><strong>Chinese</strong></div>
										<div class="btn-food-catagory2" align="center"><p></p><strong>Korean</strong></div>
										<div class="btn-food-catagory3" align="center"><p></p><strong>Japanese</strong></div>
										<div class="btn-food-catagory4" align="center"><p></p><strong>Indian</strong></div>
										<div class="btn-food-catagory5" align="center"><p></p><strong>More</strong></div>
									</span>
								</a>

								<div class="btn-ice1" align="center"><p></p><strong><?php echo $_SESSION['username'];?></strong></div>
								<div class="btn-ice2" align="center"><p></p><i class="fa fa-cog fa=spin"></i><strong>Account</strong></div>
								<div class="btn-ice3" align="center"><p></p><i class="fa fa-shopping-cart"></i><strong>Cart</strong></div>
								<div class="btn-ice4">
						<!-- day setting -->
									<div class="day-box" style="margin-top:-17em; margin-left:10em" >
										<h2>Nov.</h2>
										<p></p><h3>10</h3>
									</div>
								</div>
							</div>
				<!-- wather：sunny cloudy rainy snowy starry stormy -->
							<div class="cloudy"></div>
						</div>
				<!--   House   -->
						<div class="col-md-5 col-md-5" style="margin-left:-0.5em; margin-top:-1em">
							<div class="housetop-box">	
								<div id="house-box"></div>
								<div id="house-box2"></div>
								<div id="house-box3"></div>
								<div class="newbee">
									<img src="../menu/image/newbee.png" style="height:5.8em;width:14.3em;border-radius:20px">
								</div>
							</div>
							<div class="housetop-box2">
								<div class="house-favo-box">
									<a href="#" class="fav-list">
										<div class="house-favo" align="center">
											<p></p><i class="fa fa-heart"></i><strong>Favorites</strong>
											<span>
												<div class="fav-detal-box">
													<div align="center"><h3>Favoritess</h3></div>
													<ul>
														<li></li>
														<li></li>
														<li></li>
														<li></li>
													</ul>
												</div>
											</span>
											<div class="winleft">
												<div class="win-line1"></div>
												<div class="win-line2"></div>
											</div>
										</div>
									</a>
								</div>
								<div class="house-coupon-box">
									<a href="#" class="coupon-list">
										<div class="house-coupon" align="center">
											<p></p><i class="fa fa-calendar"></i><strong>Coupon</strong>
											<div class="winright">
												<div class="win-line1"></div>
												<div class="win-line2"></div>
											</div>										
										</div>
										<span>
											<div class="coupon-detal-box">
												<div align="center"><h3>Coupons</h3></div>
												<ul>
													<li></li>
													<li></li>
													<li></li>
													<li></li>
												</ul>
											</div>
										</span>
									</a>
								</div>
								<div id="house-box4"></div>
								<div id="house-box5"></div>
								<div id="house-box6"></div>
								<div class="mouth"></div>
							</div>
						</div><!-- House end -->	
						<div class="col-md-4 col-md-4" >
								<div class="parking1" align="center">
									<div id="parking4"></div>
									<div id="parking2"></div>
									<div id="parking3"></div>
									<h3><i class="fa fa-history"></i>  Parking...</h3>
									<div class="parking5" align="left">
										<span class="windmill2">
								         	<span class="pillar">
								         		<h1><i class="fa fa-home" style="margin-left:0.6em"></i></h1>
								         	</span>
								         	<span class="axis">
								       			<span class="swing"></span>
								         		<span class="swing2"></span>
								         		<span class="swing3"></span>
								         	</span>
								         </span>
									</div>					
								</div>
								<div><img src="../menu/image/3.jpg"  style="width:14.7em; height:7.7em; border: 0.2em solid black;border-radius:0.7em; overflow:hidden; margin-bottom:0.5em"></div>
								<div><img src="../menu/image/4.jpg"  style="width:14.7em; height:7.7em; border: 0.2em solid black;border-radius:0.7em; overflow:hidden; margin-left:5em; margin-bottom:0.5em"></div>
								<div><img src="../menu/image/6.jpg"  style="width:14.7em; height:7.7em; border: 0.2em solid black;border-radius:0.7em; overflow:hidden; margin-left:10em; margin-bottom:0.5em"></div>
						</div>
					</div>	<!-- Send row end -->
				</div><!-- container end -->
			</div><!-- End div -->
		</div> <!-- End background -->
	</div> <!-- parallax end -->
</body>
</html>
