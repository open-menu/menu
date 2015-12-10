<?php
	require_once("mn-config.php");
	require_once("mn-dbactions.php");
	require_once("mn-db.php");
	require_once("mn-classes.php");

	session_start();

	if(!isset($_SESSION["username"])){
		header("location:mn-signin.php");
	}

	$user = $_SESSION["user"];
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
							<a class="navbar-brand" href="<?php echo get_home($_SESSION["type"]);?>">Home</a>
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

		<!-- 需要菜的图片，名字，价钱 -->
						<?php
							$rest_list = get_restaurant_list();
							
							$new_rest_list = array_slice($rest_list, 0, 4);

							foreach($new_rest_list as $rest){
								echo "<div class='col-md-3 col-md-3'>";
								echo "<a href =\"mn-dish-detail.php?restaurant_id=".$rest['id']."\" class = \"thumbnail\">";
								echo '<img src ="'.$rest['restaurant_logo'].'" alt = "..."></a>';
								echo '<div class="caption" style="margin-top:-1em">';
								echo '<h5>'.$rest['restaurant_name'].'</h5>';
								echo '<div class = "caption" style="margin-top:-1em">';
								echo '<h5> price: '.$rest['restaurant_price'].' <br></h5>';
								echo '</div></div></div>';
							}
						?>

					</div> <!-- End first row -->

			<!-- second row  personal  -->
					<div class="row">
				<!--  Personal setting  -->
						<div class="col-md-3 col-md-3" style="margin-top:1em">
							<div class="user-info">
								<a href="mn-user.php#" class="food-catagory">
			<!-- 需要个人头像 -->
									<img src="<?php echo $user->userAvatar;?>" class="path1">
								</a>

								<div class="btn-ice1" align="center"><p></p><strong><?php echo $_SESSION['username'];?></strong></div>
								<a href="mn-user-account.php" class="btn-ice2" align="center" style="color:black"><p></p><i class="fa fa-cog fa=spin"></i><strong>Account</strong></a>

								<div class="btn-ice3" align="center"><p></p><i class="fa fa-shopping-cart"></i><strong>Cart</strong></div>
								<div class="btn-ice4">							
								</div>
							</div>
				<!-- wather：sunny cloudy rainy snowy starry stormy -->
							<div class="cloudy"></div>
						</div>
				<!--   House   -->
						<div class="col-md-4" style="margin-left:-0.5em; margin-top:-1em">
							<div class="housetop-box">	
								<div class="cloudy" style="margin-top:-20px;margin-left:90px"></div>
								<div id="house-box"></div>
								<div id="house-box2"></div>
								<div id="house-box3"></div>
								<div class="newbee">
								<img src="image/newbee.png" style="height:5.8em;width:14.3em;border-radius:20px">
									<div id="time" class="day-box" style="margin-top:-135px;margin-left:58px;font-size:20px" >
										<?php
											echo date("M j") . "<br>";
											echo date("l");
										?>
									</div>
									
								</div>
							</div>
							<div class="housetop-box2">
								<div class="house-favo-box">
									<a href="mn-user-favorites.php#" class="fav-list">
										<div class="house-favo" align="center">
											<p></p><i class="fa fa-heart" ></i><strong>Favorites</strong>
											<div class="winleft">
												<div class="win-line1"></div>
												<div class="win-line2"></div>
											</div>
										</div>
									</a>
								</div>
								<div class="house-coupon-box">
									<a href="mn-user-coupon.php" class="coupon-list">
										<div class="house-coupon" align="center">
											<p></p><i class="fa fa-calendar"></i><strong>Coupon</strong>
											<div class="winright">
												<div class="win-line1"></div>
												<div class="win-line2"></div>
											</div>										
										</div>
									</a>
								</div>
								<div id="house-box4"></div>
								<div id="house-box5"></div>
								<div id="house-box6"></div>
								<div class="mouth"></div>
							</div>
						</div><!-- House end -->	
						<div class="col-md-1">
						    
							<div class="parking5" align="left">
								<span class="windmill2">
								   	<span class="pillar">
								   	<h1><i class="fa fa-home" style="margin-left:20px"/></i></h1>
								   	</span>
								   	<span class="axis">
								    	<span class="swing"></span>
								    	<span class="swing2"></span>
								    	<span class="swing3"></span>
								    </span>

								</span>
							</div>	
						</div>
						<div class="col-md-4" >
								<div class="parking1" align="center">
									<div id="parking4"></div>
									<div id="parking2"></div>
									<div id="parking3"></div>
									<a href="mn-user-history.php" style="color:black"><h3><i class="fa fa-history" ></i>  Parking...</h3></a>
											
								</div>
			<!--  三个a标签需要浏览过的菜色图片  -->
								<a href="mn-restaurant-list.php"><img src="image/3.jpg"  style="width:14.7em; height:7.7em; border: 0.2em solid black;border-radius:0.7em; overflow:hidden; margin-bottom:0.5em"></a>
								<a href="mn-restaurant-list.php"></a>><img src="image/4.jpg"  style="width:14.7em; height:7.7em; border: 0.2em solid black;border-radius:0.7em; overflow:hidden; margin-left:5em; margin-bottom:0.5em"></a>
								<a href="mn-restaurant-list.php"></a>><img src="image/6.jpg"  style="width:14.7em; height:7.7em; border: 0.2em solid black;border-radius:0.7em; overflow:hidden; margin-left:10em; margin-bottom:0.5em"></a>
						</div>
					</div>	<!-- Send row end -->
				</div><!-- container end -->
			</div><!-- End div -->
		</div> <!-- End background -->
	</div> <!-- parallax end -->
	<script>
		function myFunction() {
   			var d = new DateTime();
    		d.setTime(1332403882588);
    		document.getElementById("time").innerHTML = d;
		}
	</script>
</body>
</html>
