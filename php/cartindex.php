<?php
	include('session.php');

	if (isset($_GET['remove'])){
		if(!empty($_SESSION["shopping_cart"])) {
			foreach($_SESSION["shopping_cart"] as $key => $value) {
				if($_GET["remove"] == $key){
					unset($_SESSION["shopping_cart"][$key]);
					?>
					<script type="text/javascript">
					alert("Product removed from cart.");
					</script>
					<?php
					echo "<script>window.history.back();</script>";
				}
			}
		}
		else if(empty($_SESSION["shopping_cart"]))
		{
			unset($_SESSION["shopping_cart"]);
			echo "<script>window.history.back();</script>";
		}		
	}
	
?>