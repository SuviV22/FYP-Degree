<?php
	include("php/session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Sacré Bleu | Profile</title>

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
  
  <!-- Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  
  <!-- Animate css -->
  <link rel="stylesheet" href="plugins/animate/animate.css">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick/slick-theme.css">
  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">
  
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
					<h1 class="page-name">Profile</h1>
					<ol class="breadcrumb">
						<li><a href="main.php">Home</a></li>
						<li class="active">profile</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="user-dashboard page-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="dashboard-wrapper dashboard-user-profile">
          <div class="media" style="margin-left:25%;">
            <div class="pull-left text-center" href="#!">
              <img class="media-object user-img" src="images/avater.png" alt="Image">
            </div>
            <div class="media-body">
              <ul class="user-profile-list">
				<?php
					$sql = "select * from users where userID = '$user_check'";
					$result = mysqli_query($conn, $sql);
					$row = mysqli_fetch_assoc($result);
				?>
                <li><span>Full Name:</span><?php echo $row["userName"]; ?></li>
                <li><span>Address:</span><?php echo $row["userAddress"]; ?></</li>
                <li><span>Email:</span><?php echo $row["userEmail"]; ?></</li>
                <li><span>Phone No.:</span><?php echo $row["userPhone"]; ?></</li>
                <li><span>Password:</span>*******</li>
              </ul>
            </div>
			<div class="media-body" style="width:100px;">
				<a data-toggle="modal" data-target="#product-modal" class="btn btn-default" style="margin-left:100px;"><i class="bi bi-pencil-square"></i></a>
			</div>
          </div>
        </div>
      </div>
	  <!-- Modal -->
			<div class="modal product-modal fade" id="product-modal">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i class="tf-ion-close"></i>
				</button>
				<div class="modal-dialog " role="document">
					<div class="modal-content">
						<div class="modal-body">
							<div class="row">
								 <div class="col-md-12">
								<h2 class="text-center widget-title">Edit Profile</h2>
								<form class="text-left clearfix" action="php/editprofile.php" method="post">
									<div class="form-group">									  
									  <h5>Name:<label style="margin-left:14.5%;"></label><input style="width:80%;" type="text" class="form-control" name="name" value="<?php echo $row["userName"]; ?>" required></h5>
									</div>
									<div class="form-group">
									  <h5>Address:<label style="margin-left:12.8%;"></label><input style="width:80%;" type="text" class="form-control" name="address" value="<?php echo $row["userAddress"]; ?>" required></h5>
									</div>
									<div class="form-group">
									  <h5>Email:<label style="margin-left:15%;"></label><input style="width:80%;" type="email" class="form-control" name="email" value="<?php echo $row["userEmail"]; ?>" required></h5>
									</div>
									<div class="form-group">
									  <h5>Phone No.:<label style="margin-left:11.3%;"></label><input style="width:80%;" type="tel" class="form-control"  placeholder="012-3456789" name="phone" value="<?php echo $row["userPhone"]; ?>" required></h5>
									</div>
									<div class="form-group">
									  <h5>Password:<label style="margin-left:11.6%;"></label><input style="width:80%;" type="password" class="form-control"  placeholder="******" name="password" id="password" required></h5>
									</div>
									<div class="form-group">
									  <h5>Confirm Password:<label style="margin-left:4.4%;"></label><input style="width:80%;" type="password" class="form-control"  placeholder="******" name="cpassword" id="cpassword" required></h5>
									</div>
									<!--
									<script>
										var password = document.getElementById("password");
										var cpassword = document.getElementById("cpassword");
										
										function ValidatePassword()
										{							
											if(password.value != cpassword.value)
											{
												cpassword.setCustomValidity("Passwords Don't Match");
												return false;
											}
											else
											{
												cpassword.setCustomValidity('');
												return true;
											}						
										}
										password.onchange = ValidatePassword;
										cpassword.onkeyup = ValidatePassword;
									</script>
									-->
									<div class="text-center">
									  <button type="submit" class="btn btn-main text-center" name="savebtn">Save</button>
									</div>
							  </form>
							</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- modal -->
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