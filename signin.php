<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Sacré Bleu | Sign Up</title>

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
			<div class="col-md-4 col-xs-12 col-sm-4">
				<a href="" class="top-menu text-right" style="float:right; margin-left:5%; color:white;" data-toggle="modal" data-target="#product-modal"><i class="bi bi-pen-fill"></i> Register</a>
				<a href="login.php" class="top-menu text-right" style="float:right; color:white;"><i class="bi bi-door-open-fill"></i> Login</a>
			</div>
		</div>
	</div>
</section><!-- End Top Header Bar -->
<section class="signin-page account">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="block text-center">
          <h2 class="text-center">Create Your Account</h2>
          <form class="text-left clearfix" action="php/registerc.php" method="post">
            <div class="form-group">
              <input type="text" class="form-control"  placeholder="Name" name="name" required>
            </div>
            <div class="form-group">
              <input type="tel" class="form-control"  placeholder="Phone Number" name="phone" required>
            </div>
            <div class="form-group">
              <input type="email" class="form-control"  placeholder="Email" name="email" required>
            </div>
            <div class="form-group">
              <input type="password" class="form-control"  placeholder="Password" name="password" id="password" required>
            </div>
			<div class="form-group">
              <input type="password" class="form-control"  placeholder="Confirm Password" name="cpassword" id="cpassword" required>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-main text-center" name="registerbtn">Sign In</button>
            </div>
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
          </form>
          <p class="mt-20">Already have an account?<a href="login.php" style="color: #E74C3C;"> Login</a></p>
          <p><a href="forget-password.php" style="color: #E74C3C;"> Forgot your password?</a></p>
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