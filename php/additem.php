<?php
	include('session.php');
	
	if(isset($_POST["submitbtn"]))
	{
		$itype = $_POST["ptype"];
		$iname = $_POST["iname"];
		$idesc = $_POST["idesc"];		
		$iprice = number_format((float)$_POST["iprice"], 2, '.', '');	
		$uid = $_GET["uid"];
		$pic = "uploads/default.jfif";
		
		$sql2 = "insert into menuitem (itemID, itemName, itemType, itemDesc, itemPrice, itemImage, restaurantID) values ('', '$iname', '$itype', '$idesc', '$iprice', '$pic', '$uid')";
		mysqli_query($conn, $sql2);
	?>
		<script type="text/javascript">
			alert("Menu item added successfully!");
		</script>
	<?php
		echo "<script>window.location = '../shop-sidebarres.php';</script>";
	}
	if(isset($_GET["id"]))
	{
		$id = $_GET['id']; 

		$sqldel = "delete from menuitem where itemID = '$id'";
		$del = mysqli_query($conn, $sqldel);

		if($del)
		{
			mysqli_close($conn); // Close connection
			echo "<script>window.location = '../shop-sidebarres.php';</script>";
			exit;	
		}
		else
		{
			echo "Error deleting record"; // display error message if not delete
		}
	}
	if(isset($_POST["uploadbtn"]))
	{
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$itemID = $_GET['pic']; 

		// Check if file already exists
		if (file_exists($target_file)) 
		{
		  echo "Sorry, file already exists.";
		  $uploadOk = 0;
		}

		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) 
		{
		  echo "Sorry, your file is too large.";
		  $uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) 
		{
		  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		  $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) 
		{
		  echo "Sorry, your file was not uploaded.";
		  
		// if everything is ok, try to upload file
		} 
		else 
		{
		  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
		  {
			$sqlpic = "update menuitem set itemImage='$target_file' where itemID='$itemID'";
			mysqli_query($conn, $sqlpic);
			?>
			<script type="text/javascript">
				alert("Image added successfully!");
			</script>
			<?php
			echo "<script>window.location = '../shop-sidebarres.php';</script>";
		  } 
		  else 
		  {
			echo "Sorry, there was an error uploading your file.";
		  }
		}
	}
?>