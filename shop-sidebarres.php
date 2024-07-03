<?php
	include("php/session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Sacré Bleu | Edit Menu</title>

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
  
  <!-- select stylesheet -->
  <link rel="stylesheet" href="css/select.css">
  
  <!-- tooltip css -->
  <link rel="stylesheet" href="css/tooltip.css">
</head>

<body id="body">

<!-- Start Top Header Bar -->
<section class="top-header">
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
						<text id="AVIATO" style="font-family:Kaushan Script; font-size:42px;">
							Sacré Bleu
						</text>
					</a>
				</div>
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4">
				<ul class="top-menu text-right list-inline">
					<li class="dropdown cart-nav dropdown-slide tooltipz">
						<a href="profile-detailsres.php">
							<i class="bi bi-person-fill" style="font-size:26px;"></i><span class="tooltipztext">Profile</span>
						</a>
					</li>
					<li class="dropdown cart-nav dropdown-slide tooltipz">
						<a href="orderres.php">
							<i class="bi bi-card-checklist" style="font-size:26px;"></i><span class="tooltipztext">Orders</span>
						</a>
					</li>
					<li class="dropdown cart-nav dropdown-slide tooltipz">
						<a href="shop-sidebarres.php">
							<i class="bi bi-vector-pen" style="font-size:26px;"></i><span class="tooltipztext">Edit Menu</span>
						</a>
					</li>		
				</ul><!-- / .nav .navbar-nav .navbar-right -->
			</div>
		</div>
	</div>
</section><!-- End Top Header Bar -->
<?php
	$sql = "select * from users where userID = '$user_check'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
?>
<div class="slider-item th-fullpage hero-area" style="background-image: url(images/slider/slider-1.jpg); height: 350px;">
    <div class="container">
      <div class="row">
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
			<!-- <a href="#!" class="btn btn-main btn-medium btn-round" style="float:right;"><i class="bi bi-pencil"></i> Edit Menu</a> -->
				<div class="content">
					<h1 class="page-name" style="text-transform: uppercase;"><?php echo $row["userName"]; ?> - Edit Menu</h1>
					<ol class="breadcrumb">
						<li><a href="main.php">Home</a></li>
						<li class="active" style="text-transform: uppercase;"><?php echo $row["userName"]; ?></li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="user-dashboard page-wrapper" style="padding-top:0px;">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="dashboard-wrapper user-dashboard">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Item Type</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Price (RM)</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
			  <?php
				$sql = "select * from menuitem where restaurantID = $user_check";
				$result = mysqli_query($conn, $sql);																	
											
				$x = 1;
				while($row = mysqli_fetch_assoc($result))
				{
			   ?>
                <tr>
                  <td><?php echo $row["itemType"]; ?></td>
                  <td><?php echo $row["itemName"]; ?></td>
                  <td><?php echo $row["itemDesc"]; ?></td>
                  <td><?php echo $row["itemPrice"]; ?></td>
                  <td>
                    <div class="btn-group" role="group">
                      <a data-toggle="modal" data-target="#product-modal<?php echo $row["itemID"]; ?>" class="btn btn-default"><i class="tf-pencil2" aria-hidden="true"></i></a>
					  <!-- Modal -->
			<div class="modal product-modal fade" id="product-modal<?php echo $row["itemID"]; ?>">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i class="tf-ion-close"></i>
				</button>
				<div class="modal-dialog " role="document">
					<div class="modal-content">
						<div class="modal-body">
							<div class="row">
								<h2 class="text-center widget-title">Upload Image</h2><br>
								<form action="php/additem.php?pic=<?php echo $row["itemID"]; ?>" method="post" enctype="multipart/form-data">
									  <input type="file" accept="image/*" name="fileToUpload" multiple>						 
									  <button type="submit" name="uploadbtn">Upload</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div><!-- modal -->
                      <a href="php/additem.php?id=<?php echo $row["itemID"]; ?>" id="rmv" class="btn btn-default"><i class="tf-ion-close" aria-hidden="true"></i></a>
                    </div>
                  </td>
                </tr>
				<?php
					$x++;
				}
				?>
				<tr>
					<form class="text-left clearfix form-control" action="php/additem.php?uid=<?php echo $user_check; ?>" method="post">
						<td>
							<div class="select-style">
							  <select name="ptype" id="ptype" class="select-box" style="color:black;">
								  <option value="Food">Food</option>
								  <option value="Drinks">Drinks</option>
							  </select>
							  <script>
								 function select_option(){
									var selectBox = document.getElementById("colored_select");
									$size = selectBox.size;
									$set_size = 4;
									if ($size == $set_size) {
									  selectBox.size = 2;
									  selectBox.style.overflow = 'hidden';
									} else {
									  selectBox.size = $set_size;
									  selectBox.style.height = 'auto';
									  selectBox.style.overflow = 'auto';
									}
									var selectedOptionTop = selectBox.options[selectBox.selectedIndex].offsetTop;
									selectBox.scrollTop = selectedOptionTop;
								  }
							</script>
							</div>
						</td>
						<td>
							<div class="form-group">
							  <input type="text" class="form-control" name="iname" placeholder="Name" required>
							</div>
						</td>
						<td>
							<div class="form-group">
							  <input type="text" class="form-control" name="idesc" placeholder="Description" required>
							</div>
						</td>
						<td>
							<div class="form-group">
							  <input type="text" class="form-control" name="iprice" placeholder="Price (RM)" required>
							</div>
						</td>
						<td colspan="2">
							<div class="btn-group" role="group" style="margin-top: 5px;">
							  <button type="submit" name="submitbtn" class="btn btn-default" style="width:76px;"><i class="bi bi-plus-lg"></i></button>
							</div>
						</td>
					</form>
				</tr>
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
