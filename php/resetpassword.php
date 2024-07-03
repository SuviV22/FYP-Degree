<?php
include('dataconnection.php');

if (isset($_POST['resetpwbtn'])) 
{
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  // ensure that the user exists on our system
  $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
  $results = mysqli_query($conn, $query);

  if(mysqli_num_rows($results) <= 0) 
  {
	?>
	<script type="text/javascript">
		alert("Sorry, no user exists on our system with that email");
	</script>
	<?php
    echo "<script>window.location = '../forget-password.php';</script>";
  }
  // generate a unique random token of length 100
  $token = bin2hex(random_bytes(50));
  $resetarray = array(
			array(
				'token' => $token,
				'email' => $email,
			)
	);
	$_SESSION["pwreset"] = $resetarray;

   // Send email to user with the token in a link they can click on
   $to = $email;
   $subject = "Reset your password on Sacre Bleu";
   $msg = "Hi there, click on this <a href=\"http://localhost/Sacre%20Bleu/reset-password.php?token=" . $token . "\">link</a> to reset your password on our site";
   $headers = "From: info@examplesite.com";
   //$msg = wordwrap($msg,70);
   mail($to, $subject, $msg, $headers);
   ?>
	<script type="text/javascript">
	alert("Password reset link sent!");
	</script>
	<?php
   echo "<script>window.location = '../forget-password.php';</script>";
}


if (isset($_POST['newpwbtn'])) 
{
  $new_pass = md5($_POST['newpass']);
  $new_pass_c = md5($_POST['newpassc']);

  // Grab to token that came from the email link
  $token = $_POST["token"];
  foreach($_SESSION["pwreset"] as $key => $value) {
		if($token == $value["token"]){
			$email = $value["email"];
			$sql = "UPDATE users SET userPassword='$new_pass' WHERE userEmail='$email'";
			$results = mysqli_query($conn, $sql);
			?>
			<script type="text/javascript">
			alert("Password changed successfully!");
			</script>
			<?php
			echo "<script>window.location = '../login.php';</script>";
		}
	}
}
?>