<?php
	include("dataconnection.php");
	
	if(isset($_POST["registerbtn"]))
	{
		$name = $_POST["name"];
		$phone = $_POST["phone"];
		$email = $_POST["email"];
		$address = $_POST["address"];
		$pw = md5($_POST["password"]);
		
		
			$sql = "select * from users where userEmail = '$email'";
			$result = mysqli_query($conn,$sql);
			
			if(mysqli_num_rows($result)!=0) 
			{
			?>
				<script type="text/javascript">
					alert("User email already exists");
				</script>
			<?php
			}
			else
			{
				mysqli_query($conn, "insert into users (userId, userName, userPassword, userEmail, userAddress, userPhone, userType) values ('', '$name', '$pw', '$email', '$address', '$phone', 3)");
			?>
				<script type="text/javascript">
					alert("<?php echo 'Thank You '.$name.'. Your registration is successful';?>");
					window.location.href = "../login.php"; 
				</script>
			<?php
			//header("Location: ../Login/login.php");
			}
			mysqli_close($conn);
		
	}
?>