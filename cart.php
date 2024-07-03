<?php
	include("php/session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Sacré Bleu | Checkout</title>

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

  <!-- Stripe JavaScript library -->
  <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
					<h1 class="page-name">Checkout</h1>
					<ol class="breadcrumb">
						<li><a href="main.php">Home</a></li>
						<li class="active">checkout</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>



<div class="page-wrapper">
  <div class="cart shopping">
    <div class="container">
      <div class="row">
	  <div class="col-md-6">
        <div class="block billing-details">
		<?php
		$sql = "select * from users where userID = '$user_check'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
	   ?>
          <h3 class="widget-title">Delivery Details</h3>
          <form class="text-left clearfix" id="paymentFrm" action="php/checkout.php" method="post">
            <div class="form-group">
              <input type="text" class="form-control" name="address" value="<?php echo $row["userAddress"]; ?>">
            </div>
            <div class="form-group col-md-6">
              <input type="date" class="form-control" name="date" placeholder="Date" name="date" id="date" required>
            </div>
			<div class="form-group col-md-6">
              <input type="time" class="form-control" name="time" placeholder="Time" name="time" id="time" required>
            </div>
			<h3 class="widget-title" style="margin-top:100px;">Personal Details</h3>
			<div class="form-group">
              <input type="text" class="form-control" name="name" value="<?php echo $row["userName"]; ?>" readonly>
            </div>
            <div class="form-group">
              <input type="email" class="form-control" name="email" value="<?php echo $row["userEmail"]; ?>" readonly>
            </div>
			<div class="form-group">
              <input type="tel" class="form-control" name="phone" value="0<?php echo $row["userPhone"]; ?>" readonly>
            </div>
			
            <h3 class="widget-title" style="margin-top:50px;">Payment Details</h3>
                  <div class="checkout-product-details">
                     <div class="payment">
                        <div class="card-details">
                           
                              <div class="form-group">
                                 <p>Card Number <span class="required">*</span></p>
                                 <input id="card-number" name="cardnum" class="form-control"   type="tel" placeholder="•••• •••• •••• ••••">
                              </div>
                              <div class="form-group" style="margin-top:3%; width:30%; display:inline-block;">
                                 <p>Expiry (MM/YY) <span class="required">*</span></p>
								 <input id="card-expiry" name="card-expiry" type="text" style="width:60%;" class="form-control" maxlength='5' placeholder="MM/YY" type="text" onkeyup="formatString(event); autoTab('card-expiry', '5', 'card-cvc')" required>
							  </div>
                              <div class="form-group" style="margin-top:3%; width:70%; float:right;">
                                 <p style="margin-left:9%;">Card Code <span class="required">*</span></p>
                                 <input id="card-cvc" name="cardcvc" class="form-control" style="width:20%; margin-left:9%;" type="tel" maxlength="3" placeholder="CVC" required>
                              </div>
                              <button type="submit" name="orderbtn" id="orderbtn" class="btn btn-main mt-20" style="margin-left:29%; margin-top: 10%;">Place Order</button>
							  
							  <script>
								function autoTab(field1, len, field2) {
									if (document.getElementById(field1).value.length == len) {
										document.getElementById(field2).focus();
										}
								}
								function formatString(e) {
									var inputChar = String.fromCharCode(event.keyCode);
									var code = event.keyCode;
									var allowedKeys = [8];
									if (allowedKeys.indexOf(code) !== -1) {
										return;
									}

									event.target.value = event.target.value.replace(
										/^([1-9]\/|[2-9])$/g, '0$1/' // 3 > 03/
									).replace(
										/^(0[1-9]|1[0-2])$/g, '$1/' // 11 > 11/
									).replace(
										/^([0-1])([3-9])$/g, '0$1/$2' // 13 > 01/3
									).replace(
										/^(0?[1-9]|1[0-2])([0-9]{2})$/g, '$1/$2' // 141 > 01/41
									).replace(
										/^([0]+)\/|[0]+$/g, '0' // 0/ > 0 and 00 > 0
									).replace(
										/[^\d\/]|^[\/]*$/g, '' // To allow only digits and `/`
									).replace(
										/\/\//g, '/' // Prevent entering more than 1 `/`
									);
								}

							  </script>
                           
                        </div>
                     </div>
                  </div>				  
          </form>
		  <script type="text/javascript">
					//set your publishable key
					Stripe.setPublishableKey('pk_test_51KNY6tDx3OVERZscBsdQJRMjNbkaHtx5oST8NFSB6rDTWDg5spNDdhGCIdYhiGQha3l6kzzB8u9aFPh5gPcMDPaR004r5T4Gf4');

					//callback to handle the response from stripe
					function stripeResponseHandler(status, response) {
						if (response.error) {
							//enable the submit button
							$('#orderbtn').removeAttr("disabled");
						} else {
							var form$ = $("#paymentFrm");
							//get token id
							var token = response['id'];
							//insert the token into the form
							form$.append("<input type='hidden' name='stripeToken' value='" 
					+ token + "' />");
							//submit form to the server
							form$.get(0).submit();
						}
					}
					$(document).ready(function() {
						//on form submit
						$("#paymentFrm").submit(function(event) {
							//disable the submit button to prevent repeated clicks
							$('#orderbtn').attr("disabled", "disabled");
							
							var date = document.getElementById("card-expiry").value;
							var dateParts = date.split(/\\|\//)
							var month = dateParts[0]
							var year = dateParts[1]
							
							//create single-use token to charge the user
							Stripe.createToken({
								number: $('#card-number').val(),
								cvc: $('#card-cvc').val(),
								exp_month: month,
								exp_year: year
							}, stripeResponseHandler);
							
							//submit from callback
							return false;
						});
					});
				   </script>
        </div>
      </div>
        <div class="col-md-4" style="float:right;">
          <div class="block">
            <div class="product-list">
              <form method="post">
			  <h2 class="text-center widget-title">Order Summary</h2><br>
                <table class="table">
                  <thead>
                    <tr>
                      <th class="">Item Name</th>
                      <th class="">Price</th>
					  <th class="">Quantity</th>
                      <th class=""></th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php
					if(isset($_SESSION["shopping_cart"]))
					{			
						$total_price = 0;
						foreach ($_SESSION["shopping_cart"] as $key => $product)
						{
					?>
                    <tr class="">
                      <td class="">
                        <div class="product-info">
                          <b><?php echo $product["name"]; ?></b>
                        </div>
                      </td>
                      <td class=""><?php echo "RM ".$product["price"]; ?></td>
					  <td class="">
						  <div class="form-group" style="width:65px;">
						  <form method="post" action="">
							<input type='hidden' name='code' id='code' value="<?php echo $key; ?>" />
							<select name='quantity' onChange="this.form.submit()">
								<option <?php if($product["quantity"]==1) echo "selected";?>
								value="1">1</option>
								<option <?php if($product["quantity"]==2) echo "selected";?>
								value="2">2</option>
								<option <?php if($product["quantity"]==3) echo "selected";?>
								value="3">3</option>
								<option <?php if($product["quantity"]==4) echo "selected";?>
								value="4">4</option>
								<option <?php if($product["quantity"]==5) echo "selected";?>
								value="5">5</option>
							</select>
						  </form>
						  </div>
					  </td>
                      <td class="">
                        <a class="product-remove" href="php/cartindex.php?remove=<?php echo $key; ?>">Remove</a>
                      </td>
                    </tr>
					<?php
							$total_price += ($product["price"]*$product["quantity"]);
							$totaldel_price = $total_price + 3;
							$_SESSION['tprice'] = $totaldel_price;	
						}	
					?>	
                  </tbody>
                </table>
				<div class="product-checkout-details">
                  <div class="block">
                     <ul class="summary-prices">
                        <li>
                           <span>Subtotal:</span>
                           <span class="price">RM <?php echo $total_price; ?></span>
                        </li>
						
                        <li>
                           <span>Delivery Fees:</span>
                           <span>RM 3.00</span>
                        </li>
                     </ul>
                     <div class="summary-total">
                        <span>Total</span>
                        <span>RM <?php echo $totaldel_price; ?></span>
                     </div>				 
                  </div>
					<input type='hidden' name='tprice' id="tprice" value="<?php echo $totaldel_price; ?>" />
					
			   </div>
			   <?php
						}
						else
						{
							?>
							<tr class="">
							  <td class="">
								<div class="product-info">
								  <b>Your cart is empty!</b>
								</div>
							  </td>
							</tr>
							<?php
						}
					 ?>
                <!-- <a href="checkout.html" class="btn btn-main pull-right">Checkout</a> -->
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


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
	if (isset($_POST['quantity'])){
		foreach($_SESSION["shopping_cart"] as $key => &$product){
			if($_POST["code"] == $key){
				$product["quantity"] = $_POST['quantity'];
				break; // Stop the loop after we've found the product
			}
		}
		echo "<script>window.location.href = window.location.href;</script>";
	}	
?>