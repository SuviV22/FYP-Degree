<?php
	include("php/session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Sacré Bleu | Feedback</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Constra HTML Template v1.0">
  
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
    <!-- Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  
  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="plugins/themefisher-font/style.css">
  
  <!-- google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
  
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  
  <!-- Animate css -->
  <link rel="stylesheet" href="plugins/animate/animate.css">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick/slick-theme.css">
  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">
  <!-- Rating Stylesheet -->
  <link rel="stylesheet" href="css/rating.css">
  <!-- tooltip css -->
  <link rel="stylesheet" href="css/tooltip.css">

</head>

<body id="body">

<!-- Start Top Header Bar -->
<section class="top-header" style="">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-xs-12 col-sm-4"  style="margin-top:1%;">
				<ul class="top-menu text-left list-inline">
					<li class="dropdown cart-nav dropdown-slide tooltipz">
						<a href="php/logout.php">
							<i class="bi bi-box-arrow-left" style="font-size:26px;"></i><span class="tooltipztext">Log Out</span>
						</a>
					</li>
				</ul>
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4">
				<!-- Site Logo -->
				<div class="logo text-center">
					<a href="main.php">
						<!-- replace logo here -->
						<text id="AVIATO" style="font-family:Kaushan Script; font-size:42px; color:white;">
							Sacré Bleu
						</text>
					</a>
				</div>
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4" style="margin-top:1%;">
				<!-- Cart -->
				<ul class="top-menu text-right list-inline">
					<li class="dropdown cart-nav dropdown-slide tooltipz">
						<script type="text/javascript">
							function myHref()
							{
								var userType = "<?php echo $ses_row['userType']; ?>";
								
								if(userType == 2)
									window.location.href = "profile-details.php";
								else if(userType == 3)
									window.location.href = "profile-detailsres.php";
							}
							function myOrders()
							{
								var userType = "<?php echo $ses_row['userType']; ?>";
								
								if(userType == 2)
									window.location.href = "order.php";
								else if(userType == 3)
									window.location.href = "orderres.php";
							}
						</script>
						<a href="#" onclick="myHref()">
							<i class="bi bi-person-fill" style="font-size:26px;"></i><span class="tooltipztext">Profile</span>
						</a>						
					</li>
					<li class="dropdown cart-nav dropdown-slide tooltipz">
						<a href="#" onclick="myOrders()">
							<i class="bi bi-card-checklist" style="font-size:26px;"></i><span class="tooltipztext">Orders</span>
						</a>
					</li>
					<li class="dropdown cart-nav dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
							<i class="tf-ion-android-cart" style="font-size:26px;"></i>
						</a>
						
						<div class="dropdown-menu cart-dropdown">
							<!-- Cart Item -->
							<?php
							if(isset($_SESSION["shopping_cart"]))
							{
								$total_price = 0;
								foreach ($_SESSION["shopping_cart"] as $key => $product)
								{
							?>
							<div class="media">
								<a class="pull-left" href="#!">
									<img class="media-object" src="<?php echo "php/".$product["pic"]; ?>" alt="image" />
								</a>
								<div class="media-body">
									<h4 class="media-heading"><?php echo $product["name"]; ?></h4>
									<div class="cart-price">
										<span><?php echo $product["quantity"]; ?> x</span>
										<span><?php echo "RM".$product["price"]; ?></span>
									</div>
									<h5><strong><?php echo "RM".$product["price"]*$product["quantity"]; ?></strong></h5>
								</div>
								<a href="php/cartindex.php?remove=<?php echo $key; ?>" class="remove"><i class="tf-ion-close"></i></a>
							</div><!-- / Cart Item -->
							<?php
									$total_price += ($product["price"]*$product["quantity"]);
								}	
							?>
							<div class="cart-summary">
								<span>Total</span>
								<span class="total-price"><?php echo "RM".$total_price; ?></span>
							</div>
							<ul class="text-center cart-buttons">
								<li><a href="cart.php" class="btn btn-small btn-solid-border">Checkout</a></li>
							</ul>
							<?php
							}
							else{
								echo "<h3>Your cart is empty!</h3>";
							}
							?>
						</div>

					</li><!-- / Cart -->
				</ul><!-- / .nav .navbar-nav .navbar-right -->
			</div>
		</div>
	</div>
</section><!-- End Top Header Bar -->

<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Feedback</h1>
					<ol class="breadcrumb">
						<li><a href="main.php">Home</a></li>
						<li class="active">feedback</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="page-wrapper">
	<div class="container">
		<div class="row">
		<?php
		$oid = $_GET["oid"];
		$resID = "select * from orders where ordersID = '$oid'";
		$resultrid = mysqli_query($conn, $resID);
		$rowrid = mysqli_fetch_assoc($resultrid);
		$rid = $rowrid["restaurantID"];
		$resName = "select * from users where userID = '$rid'";
		$resultrnm = mysqli_query($conn, $resName);
		$rowrnm = mysqli_fetch_assoc($resultrnm);
		?>
		<h2 class="text-center">Order #<?php echo $oid; ?> (<?php echo $rowrnm["userName"]; ?>)</h2>
			<form action="" method="post">
			<div class="col-md-6">
				    	<div class="star-rating">
							<!-- <div class="thanks-msg">Thanks for your feedback !!!</div> -->							
							<div class="" style="height:200px;">
							<h4 class="post-sub-heading">Rate the food quality</h4>
								<input type="radio" name="rating" id="rating-5" value="Amazing (5)">
								<label for="rating-5"><i class="bi bi-star-fill"></i></label>
								<input type="radio" name="rating" id="rating-4" value="Good (4)">
								<label for="rating-4"><i class="bi bi-star-fill"></i></label>
								<input type="radio" name="rating" id="rating-3" value="Average (3)">
								<label for="rating-3"><i class="bi bi-star-fill"></i></label>
								<input type="radio" name="rating" id="rating-2" value="Poor (2)">
								<label for="rating-2"><i class="bi bi-star-fill"></i></label>
								<input type="radio" name="rating" id="rating-1" value="Very Poor (1)">
								<label for="rating-1"><i class="bi bi-star-fill"></i></label>
								
								<!-- Rating Submit Form -->
									<span id="rating-reaction"></span>
									<!-- <button type="submit" class="submit-rating">Submit</button> -->
								<!-- <script>
									const btn = document.querySelector(".submit-rating");
									const thanksmsg = document.querySelector(".thanks-msg");
									const starRating = document.querySelector(".star-input");
									// Success msg show/hide
									btn.onclick = () => {
										starRating.style.display = "none";
										thanksmsg.style.display = "table";
										return false;
									};
								</script> -->
							</div>
							
							<div class="" style="margin-top:100px; height:200px;">
							<h4 class="post-sub-heading">Rate the service quality</h4>
								<input type="radio" name="rating2" id="rating2-5" value="Amazing (5)">
								<label for="rating2-5"><i class="bi bi-star-fill"></i></label>
								<input type="radio" name="rating2" id="rating2-4" value="Good (4)">
								<label for="rating2-4"><i class="bi bi-star-fill"></i></label>
								<input type="radio" name="rating2" id="rating2-3" value="Average (3)">
								<label for="rating2-3"><i class="bi bi-star-fill"></i></label>
								<input type="radio" name="rating2" id="rating2-2" value="Poor (2)">
								<label for="rating2-2"><i class="bi bi-star-fill"></i></label>
								<input type="radio" name="rating2" id="rating2-1" value="Very Poor (1)">
								<label for="rating2-1"><i class="bi bi-star-fill"></i></label>

								<!-- Rating Submit Form -->
								
									<span class="rating-reaction"></span>
									<!-- <button type="submit" class="submit-rating">Submit</button> -->
								
							</div>
						</div>
			</div>
						<div class="col-md-6">
							<div class="star-rating" style="height:500px;">
								<div class="star-input" style="height:200px;">
									<h4 class="post-sub-heading">Rate the food portion</h4>
									<input type="radio" name="rating3" id="rating3-5" value="Amazing (5)">
									<label for="rating3-5"><i class="bi bi-star-fill"></i></label>
									<input type="radio" name="rating3" id="rating3-4" value="Good (4)">
									<label for="rating3-4"><i class="bi bi-star-fill"></i></label>
									<input type="radio" name="rating3" id="rating3-3" value="Average (3)">
									<label for="rating3-3"><i class="bi bi-star-fill"></i></label>
									<input type="radio" name="rating3" id="rating3-2" value="Poor (2)">
									<label for="rating3-2"><i class="bi bi-star-fill"></i></label>
									<input type="radio" name="rating3" id="rating3-1" value="Very Poor (1)">
									<label for="rating3-1"><i class="bi bi-star-fill"></i></label>

									<!-- Rating Submit Form -->
									
										<span class="rating-reaction"></span>
										<!-- <button type="submit" class="submit-rating">Submit</button> -->
									
								</div>
								<div class="star-input" style="margin-top:100px; height:200px;">
									<h4 class="post-sub-heading">Rate the order overall</h4>
									<input type="radio" name="rating4" id="rating4-5" value="Amazing (5)">
									<label for="rating4-5"><i class="bi bi-star-fill"></i></label>
									<input type="radio" name="rating4" id="rating4-4" value="Good (4)">
									<label for="rating4-4"><i class="bi bi-star-fill"></i></label>
									<input type="radio" name="rating4" id="rating4-3" value="Average (3)">
									<label for="rating4-3"><i class="bi bi-star-fill"></i></label>
									<input type="radio" name="rating4" id="rating4-2" value="Poor (2)">
									<label for="rating4-2"><i class="bi bi-star-fill"></i></label>
									<input type="radio" name="rating4" id="rating4-1" value="Very Poor (1)">
									<label for="rating4-1"><i class="bi bi-star-fill"></i></label>

									<span class="rating-reaction"></span>									
								</div>
							</div>
						</div>	
						<p><i class="bi bi-star-fill" style="color:#FFCC00;"></i> - Very Poor</p>
						<p><i class="bi bi-star-fill" style="color:#FFCC00;"></i><i class="bi bi-star-fill" style="color:#FFCC00;"></i> - Poor</p>
						<p><i class="bi bi-star-fill" style="color:#FFCC00;"></i><i class="bi bi-star-fill" style="color:#FFCC00;"></i><i class="bi bi-star-fill" style="color:#FFCC00;"></i> - Average</p>
						<p><i class="bi bi-star-fill" style="color:#FFCC00;"></i><i class="bi bi-star-fill" style="color:#FFCC00;"></i><i class="bi bi-star-fill" style="color:#FFCC00;"></i><i class="bi bi-star-fill" style="color:#FFCC00;"></i> - Good</p>
						<p><i class="bi bi-star-fill" style="color:#FFCC00;"></i><i class="bi bi-star-fill" style="color:#FFCC00;"></i><i class="bi bi-star-fill" style="color:#FFCC00;"></i><i class="bi bi-star-fill" style="color:#FFCC00;"></i><i class="bi bi-star-fill" style="color:#FFCC00;"></i> - Amazing</p>
						<div class="text-center">
						  <input type='hidden' name='oid' id='oid' value="<?php echo $oid; ?>" />
						  <button type="submit" name="fsubmitbtn" class="btn btn-main text-center">Submit</button>
						</div>
						</form>
		</div>
	</div>
</section>

<footer class="footer section text-center">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="social-media">
					<li>
						<a href="#">
							<i class="tf-ion-social-facebook"></i>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="tf-ion-social-instagram"></i>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="tf-ion-social-twitter"></i>
						</a>
					</li>
				</ul>
				<p class="copyright-text">Copyright FYP &copy;2022</p>
			</div>
		</div>
	</div>
</footer>

    <!-- 
    Essential Scripts
    =====================================-->
    
    <!-- Main jQuery -->
    <script src="plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.1 -->
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Bootstrap Touchpin -->
    <script src="plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
    <!-- Instagram Feed Js -->
    <script src="plugins/instafeed/instafeed.min.js"></script>
    <!-- Video Lightbox Plugin -->
    <script src="plugins/ekko-lightbox/dist/ekko-lightbox.min.js"></script>
    <!-- Count Down Js -->
    <script src="plugins/syo-timer/build/jquery.syotimer.min.js"></script>

    <!-- slick Carousel -->
    <script src="plugins/slick/slick.min.js"></script>
    <script src="plugins/slick/slick-animation.min.js"></script>

    <!-- Google Mapl -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script type="text/javascript" src="plugins/google-map/gmap.js"></script>

    <!-- Main Js File -->
    <script src="js/script.js"></script>
    


  </body>
  </html>
<?php
	if (isset($_POST['fsubmitbtn']))
	{
		$oid = $_POST["oid"];
		$fquality = $_POST["rating"];
		$fportion = $_POST["rating3"];
		$fservice = $_POST["rating2"];
		$foverall = $_POST["rating4"];
		
		$sqlf = "insert into feedback (feedbackID, feedbackQuality, feedbackPortion, feedbackService, feedbackOverall, orderID) values ('', '$fquality', '$fportion', '$fservice', '$foverall', '$oid')";
		mysqli_query($conn, $sqlf);
		
		?>
			<script type="text/javascript">
				alert("Thank you for your feedback!");
			</script>
		<?php
		echo "<script>window.location = 'order.php';</script>";
	}	
?>