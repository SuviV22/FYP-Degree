<?php
	include("dataconnection.php");
	
	if(isset($_POST["savebtn"]))
	{
		/*if (!empty($_FILES['profile_pic']['name']))
		{
			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
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
			} 
			// if everything is ok, try to upload file
			else 
			{
				if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) 
				{
					echo "The file ". basename( $_FILES["profile_pic"]["name"]). " has been uploaded.";
				} 
				else 
				{
					echo "Sorry, there was an error uploading your file.";
				}
			}
		}*/
		
		$name = $_POST["name"];
		$address = $_POST["address"];
		$email = $_POST["email"];
		$phone = $_POST["phone"];
		
		$userID = $_SESSION["login_user"];
		$sql = "select * from users where userID = '$userID'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		
		if (!empty($_POST['password'])) 
		{
			$new_pw = md5($_POST["password"]);	
		}
		else
		{
			$new_pw = $row["student_password"];
		}
		
		$sql1 = "update users set userName='$name', userPassword='$new_pw', userEmail='$email', userAddress='$address', userPhone='$phone' where userID='$userID'";
		mysqli_query($conn, $sql1);
	?>
		<script type="text/javascript">
			alert("Details updated");
		</script>
	<?php
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
?>