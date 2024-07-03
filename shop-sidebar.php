<?php
	include("php/session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Sacré Bleu</title>

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



<div class="slider-item th-fullpage hero-area" style="background-image: url(images/slider/slider-1.jpg); height: 350px;">
    <div class="container">
      <div class="row">
	  <?php
		$uid = $_GET["uid"];
		$sql = "select * from users where userID = '$uid'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
	   ?>
        <div style="float:right; margin-top:120px;">
			<p><i class="bi bi-geo-alt"></i> <?php echo $row["userAddress"]; ?></p>
			<p><i class="bi bi-telephone"></i></i> <?php echo $row["userPhone"]; ?></p>
			<p><i class="bi bi-bicycle"></i> RM 3.00</p>
			<p><i class="bi bi-clock"></i> 30 - 45 mins</p>
        </div>
      </div>
    </div>
  </div>
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name"><?php echo $row["userName"]; ?></h1>
					<ol class="breadcrumb">
						<li><a href="main.php">Home</a></li>
						<li class="active"><?php echo $row["userName"]; ?></li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="products section">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="widget product-category">
					<h4 class="widget-title">Menu</h4>
					<div class="panel-group commonAccordion" id="accordion" role="tablist" aria-multiselectable="true">
					  	<div class="panel panel-default">
						    <div class="panel-heading" role="tab" id="headingOne">
						      	<h4 class="panel-title">
						        	<a role="button" href="#food" >
						          	Food
						        	</a>
						      	</h4>
						    </div>
					  </div>
					  <div class="panel panel-default">
					    <div class="panel-heading" role="tab" id="headingTwo">
					      <h4 class="panel-title">
					        <a class="collapsed" role="button" href="#drinks">
					         	Drinks
					        </a>
					      </h4>
					    </div>
					  </div>
					</div>
					
				</div>
			</div>
			<div class="col-md-9">
				<div class="row" id="food">
					<h2 class="text-center">Food</h2><br>
					<?php
					$sqlf = "select * from menuitem where restaurantID = '$uid' and itemType = 'Food'";
					$resultf = mysqli_query($conn, $sqlf);
					
					
												
					$x = 0;
					while($rowf = mysqli_fetch_assoc($resultf))
					{			
						$iif = $rowf["itemID"];
						$sqlif = "select * from menuitem where itemID = '$iif'";
						$resultif = mysqli_query($conn, $sqlif);
						$rowif = mysqli_fetch_assoc($resultif);
						$picf = $rowif["itemImage"];
						$_SESSION["qty"] = 1;
					?>
					<div class="col-md-4">
						<div class="product-item">
							<div class="product-thumb">
								<!-- <span class="bage">Promo</span> -->
								<img class="img-responsive" src="<?php echo "php/$picf"; ?>" alt="product-img" />
								<div class="preview-meta">
									<ul>
										<li>
											<span  data-toggle="modal" data-target="#product-modalf<?php echo $rowif["itemID"]; ?>">
												<i class="tf-ion-ios-search-strong"></i>
											</span>
										</li>
										<li>
											<a href="php/addcart.php?code=<?php echo $rowf['itemID']; ?>"><i class="tf-ion-android-cart"></i></a>
										</li>
									</ul>
								</div>
							</div>
							<div class="product-content">
								<h4><a href="product-single.html"><?php echo $rowf["itemName"]; ?></a></h4>
								<p class="price">RM <?php echo $rowf["itemPrice"]; ?></p>
							</div>
						</div>
					</div>
					<!-- Modal -->
						<div class="modal product-modal fade" id="product-modalf<?php echo $rowif["itemID"]; ?>">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<i class="tf-ion-close"></i>
							</button>
							<div class="modal-dialog " role="document">
								<div class="modal-content">
									<div class="modal-body">
										<div class="row">
											<div class="col-md-8 col-sm-6 col-xs-12">
												<div class="modal-image">
													<img class="img-responsive" src="<?php echo "php/$picf"; ?>" alt="product-img" />
												</div>
											</div>
											<div class="col-md-4 col-sm-6 col-xs-12">
												<div class="product-short-details">
													<h2 class="product-title"><?php echo $rowf["itemName"]; ?></h2>
													<p class="product-price">RM <?php echo $rowf["itemPrice"]; ?></p>
													<p class="product-short-description">
														<?php echo $rowf["itemDesc"]; ?>
													</p>
													<a href="php/addcart.php?code=<?php echo $rowf['itemID']; ?>" class="btn btn-main">Add To Cart</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- modal -->
					<?php
						$x++;
					}
					?>
				</div>
			<!-- drinks -->
			<div class="row" style="display:block;" id="drinks">
			<h2 class="text-center">Drinks</h2><br>
			<?php
			$sqld = "select * from menuitem where restaurantID = '$uid' and itemType = 'Drinks'";
			$resultd = mysqli_query($conn, $sqld);
			//$rowd = mysqli_fetch_assoc($resultd);	
			
												
			$x = 0;
			while($rowd = mysqli_fetch_assoc($resultd))
			{					
				$iid = $rowd["itemID"];
				$sqli = "select * from menuitem where itemID = '$iid'";
				$resulti = mysqli_query($conn, $sqli);
				$rowi = mysqli_fetch_assoc($resulti);
				$picd = $rowi["itemImage"];
			?>
			<div class="col-md-4">
				<div class="product-item">
					<div class="product-thumb">
						<img class="img-responsive" src="<?php echo "php/$picd"; ?>" alt="product-img" />
						<div class="preview-meta">
							<ul>
								<li>
									<span  data-toggle="modal" data-target="#product-modal<?php echo $rowi["itemID"]; ?>">
										<i class="tf-ion-ios-search-strong"></i>
									</span>
									
								</li>
								<li>
									<a href="php/addcart.php?code=<?php echo $rowi['itemID']; ?>"><i class="tf-ion-android-cart"></i></a>
								</li>
							</ul>
                      	</div>
					</div>
					<div class="product-content">
						<h4><a href="product-single.html"><?php echo $rowd["itemName"]; ?></a></h4>
						<p class="price">RM <?php echo $rowd["itemPrice"]; ?></p>
					</div>
				</div>
			</div>
			<!-- Modal -->
				<div class="modal product-modal fade" id="product-modal<?php echo $rowi["itemID"]; ?>">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i class="tf-ion-close"></i>
					</button>
					<div class="modal-dialog " role="document">
						<div class="modal-content">
							<div class="modal-body">
								<div class="row">
									<div class="col-md-8 col-sm-6 col-xs-12">
										<div class="modal-image">
											<img class="img-responsive" src="<?php echo "php/$picd"; ?>" alt="product-img" />
										</div>
									</div>
									<div class="col-md-4 col-sm-6 col-xs-12">
										<div class="product-short-details">
											<h2 class="product-title"><?php echo $rowd["itemName"]; ?></h2>
											<p class="product-price">RM <?php echo $rowd["itemPrice"]; ?></p>
											<p class="product-short-description">
												<?php echo $rowd["itemDesc"]; ?>
											</p>
											<a href="cart.html" class="btn btn-main">Add To Cart</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!-- modal -->
			<?php
				$x++;
			}
			?>
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
