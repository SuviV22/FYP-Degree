<?php
	include("php/session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Sacré Bleu | Order Status</title>

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
  
  <!-- tooltip css -->
  <link rel="stylesheet" href="css/tooltip.css">
  
  <style>
	button[disabled]:hover{
		border: 1px solid #999999;
		background-color: #fff;
		color: #666666;
	}
  </style>

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
					<h1 class="page-name">Order Status</h1>
					<ol class="breadcrumb">
						<li><a href="main.php">Home</a></li>
						<li class="active">Order Status</li>
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
				<div class="dashboard-wrapper user-dashboard">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Order ID</th>
									<th>Date</th>
									<th>Items</th>
									<th>Total Price</th>
									<th>Status</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
							<?php
							$sqlo = "select * from orders where userID = '$user_check'";
							$resulto = mysqli_query($conn, $sqlo);
							//$rowo = mysqli_fetch_assoc($resulto);	
							
							while($rowo = mysqli_fetch_assoc($resulto))
							{		
								$status = $rowo['ordersStatus']; 
								$oid = $rowo['ordersID'];
								
								$sqlf = "select * from feedback where orderID = '$oid'";
								$resf = mysqli_query($conn, $sqlf);
								$test = mysqli_num_rows($resf);						
							?>
								<tr>
									<td>#<?php echo $rowo['ordersID']; ?></td>
									<td><?php echo $rowo['ordersDate']; ?></td>
									<td><?php echo $rowo['ordersItem']; ?></td>
									<td>RM <?php echo $rowo['ordersPrice']; ?></td>
									<td><span class="label label-<?php if ($status == "Processing") {echo "primary";} else if ($status == "Preparing") {echo "info";} else if ($status == "On Delivery") {echo "warning";} else if ($status == "Completed") {echo "success";} else if ($status == "Cancelled") {echo "danger";} ?>"><?php echo $rowo['ordersStatus']; ?></span></td>
									<td><a data-toggle="modal" data-target="#product-modal<?php echo $oid; ?>" class="btn btn-default">View</a></td>
									<td><a <?php if ($status == "Completed") {if($test == 0) {echo "href='feedback.php?oid=". $oid . "'";} else {echo 'disabled style="color:green;"';}} else {{echo 'disabled style="color:grey;"';}} ?> class="btn btn-default">Feedback</a></td>
								</tr>
								<!-- Modal -->
							<div class="modal product-modal fade" id="product-modal<?php echo $oid; ?>">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<i class="tf-ion-close"></i>
								</button>
								<div class="modal-dialog " role="document">
									<div class="modal-content">
										<div class="modal-body">
											<div class="row">
												 <h2 class="text-center widget-title">Order Summary</h2><br>
												 <?php		
												  $sqlmo = "select * from orders where ordersID = '$oid'";
												  $resultmo = mysqli_query($conn, $sqlmo);	
												  $rowmo = mysqli_fetch_assoc($resultmo);
												  ?>
													<div class="product-checkout-details">
												  <div class="block">
													 <ul class="summary-prices">
														<li>
															<span>Item Name (Quantity): </span>
															<span><?php echo $rowmo['ordersItem']; ?></span>
														</li>
														<hr>
														<li>
															<span>Price:</span>
															<span>RM <?php echo $rowmo['ordersPrice']; ?></span>
														</li>		
														<hr>
														<li>
														   <span>Subtotal:</span>
														   <span class="price">RM 20.50</span>
														</li>
														<hr>
														<li style="margin-bottom: 3%;">
														   <span>Delivery Fees:</span>
														   <span>RM 2.00</span>
														</li>
													 </ul>
													 <div class="summary-total">
														<span>Total</span>
														<span>RM <?php echo $rowmo['ordersPrice']; ?></span>
													 </div>
												  </div>
											   </div>
											</div>
										</div>
									</div>
								</div>
							</div><!-- modal -->
							<?php
							}
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			
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