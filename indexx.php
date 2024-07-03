<?php
	include('php/dataconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>

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

  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">
  
  <!-- address search -->
  <script src="js/index.js"></script>
  
  <style>
	#options {
    display:none;
    list-style-type:none;
    border:1px solid #666;
    position:absolute;
    width:80%;
	z-index:99999;
	background-color: white;
	}
	#slick-slide-control00 {
		display: none;
	}
  </style>
</head>

<body id="body">

<!-- Start Top Header Bar -->
<section class="top-header">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-xs-12 col-sm-4">
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4">
				<!-- Site Logo -->
				<div class="logo text-center">
					<a href="indexx.php">
						<!-- replace logo here -->
						<text id="AVIATO" style="font-family:Kaushan Script; font-size:42px;">
							Sacré Bleu
						</text>
					</a>
				</div>
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4" style="margin-top:1.5%;">
				<a href="" class="top-menu text-right" style="float:right; margin-left:5%; color:white;" data-toggle="modal" data-target="#product-modal"><i class="bi bi-pen-fill"></i> Register</a>
				<a href="login.php" class="top-menu text-right" style="float:right; color:white;"><i class="bi bi-door-open-fill"></i> Login</a>
			</div>
		</div>
	</div>
</section><!-- End Top Header Bar -->


<div class="hero-slider">
  <div class="slider-item th-fullpage hero-area" style="background-image: url(images/slider/slider-1.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 text-center" style="background-color: rgb(255,255,255,0.9); padding:7% 4% 7% 4%; margin-left:60%; border-radius:90px;">		
			<h2 style="margin-bottom:10%;">Discover restaurants.</h2>
			<form action="indexsearch.php" method="post">
			<i class="bi bi-geo-alt-fill icon" style="position:absolute; padding:13px 0px 4px 13px; color:#eb3826;"></i>
			<input type="text" autocomplete="off" class="form-control" style="padding-left:40px; border-radius:20px;" id="search" name="search"/>
			<input type="hidden" name="code" id="code" value="" />
			<ul id="options">
				<?php
				$search = "SELECT * FROM users where userType=3";
				$sresult = mysqli_query($conn, $search);
				$count = 0;
					
				while($srow = mysqli_fetch_assoc($sresult))
				{
					echo "<li>" .$srow['userAddress']. "</li>";
					
					?>
					<script>
						input=document.getElementById('search');
						options=document.getElementById('options');
						i=<?php echo $count; ?>;
						

						document.body.onclick=function(event) {
							if(event.target!=input)
							  options.style.display='none';
						}


						input.onclick=function() {
							this.value='';
							  options.style.display='block';
						}
						
						options.getElementsByTagName('li')[i].onclick = function(){
							input.value = this.textContent;
							var code = <?php echo $srow["userID"]; ?>;
							document.getElementById("code").value = <?php echo $srow["userID"]; ?>;										
						}  
					</script>		
					<?php	
					$count++;
				}
				?>		
			</ul>
			
			<!-- <input class="form-control" style="padding-left:40px; border-radius:20px;" id="ship-address" name="ship-address" required autocomplete="off" />
			<script>
				function initMap() {
				  var input = document.getElementById('ship-address');
				  var autocomplete = new google.maps.places.Autocomplete(input);
				  
				}
			</script> -->
			<td><button name="sbtn" class="btn btn-danger" style=" margin-top:20px; border-radius:15px;"><i class="bi bi-search"></i></button></td>			
			</form>
		</div>
      </div>
    </div>
  </div>
</div>

<section class="product section" style="height:700px;">
	<div class="title">
		<h2 style="font-size:28px;">About Us</h2>
		<div class="col-lg-5 text-center">
			<img style="padding: 5% 5% 10% 10%;" src="images/about/about1.jpg" width="100%;" height="100%;"></img>
		</div>
		<div class="col-lg-7">
			<p style="text-align:justify; padding: 10% 15% 0% 10%;">
				Running late for a meeting? Lazy to get the kitchen running? Worry not, Sacré Bleu offers quick and affordable delivery services for any restaurant near you. 
				We're dedicated to giving you the very best of various cuisines, with a focus on dependability, customer service and accessibility. 
				Choose from a vast menu from a variety of restaurants just at your fingertips. 
				Any cravings from nasi lemak to a delicious steak dinner can be satisfied wiht just a few taps!
				<br>
				<br>
				We will ensure customers have a pleasant and memorable experience using this website.
				Do not hesitate to provide your honest feedback on our website and services as your happiness is our number one priority.
				We hope you enjoy our order services as much as we enjoy offering them to you!
			</p>
		</div>
	</div>
</section>
<!-- Modal -->
			<div class="modal product-modal fade" id="product-modal">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i class="tf-ion-close"></i>
				</button>
				<div class="modal-dialog " role="document" style="width:500px;">
					<div class="modal-content" style="">
						<div class="modal-body">
							<div class="row">
								 <h2 class="text-center widget-title">Please select one</h2><br>
								 <div class="text-center" style="margin-top:50px;">
									<a href="signin.php" class="btn btn-main text-center" style="width:200px; margin-bottom:25px;">Customer</a>
									<h4>OR</h4>
									<a href="signinres.php" class="btn btn-main text-center" style="width:200px; margin-top:25px; margin-bottom:75px;">Restaurant Owner</a>
								 </div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- modal -->
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

    <!-- Main Js File -->
    <script src="js/script.js"></script>
	
	<script async
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUsVMjgM7Bd_hQHAkQAL8XWPMEGdPEO1c&libraries=places&callback=initMap">
	</script>

  </body>
  </html>
