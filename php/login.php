<?php
include("dataconnection.php");

if(isset($_POST["loginbtn"]))
{
	
	$email = $_POST["email"];
	$pword = md5($_POST["password"]);
	
	$sql = "select * from users where userEmail = '$email' and userPassword = '$pword'";		
	$result = mysqli_query($conn, $sql);
		
	$row = mysqli_fetch_assoc($result);
	$count = mysqli_num_rows($result);
	
	$type = $row["userType"];
		
	if($count == 1)
	{
		$_SESSION["login_user"] = $row["userID"];
		$_SESSION["loggedin"] = 1;
		
		if($type == 1)
			header("Location: ../admin/users.php");
		else
			header("Location: ../main.php");
	}
	else
	{
	?>
		<script type="text/javascript">
			alert("Incorrect email or password");
			window.location.href = "../login.php";
		</script>
	<?php
		exit;
	}
}
?>