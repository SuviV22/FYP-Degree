<?php
	include('session.php');

		$code = $_GET["code"];
		$sqlcart = "SELECT * FROM menuitem WHERE itemID = '$code'";
		$resultcart = mysqli_query($conn, $sqlcart);
		$rowcart = mysqli_fetch_assoc($resultcart);
		$count = 0;
		
		$cartarray = array(
			$code => array(
				'count' => $count++,
				'id' => $rowcart['itemID'],
				'name' => $rowcart['itemName'],
				'quantity' => 1, 
				'price' => $rowcart['itemPrice'],
				'pic' => $rowcart['itemImage']
			)
		);
		echo $count;
		
		if(empty($_SESSION["shopping_cart"])) {
			$_SESSION["shopping_cart"] = $cartarray;
			?>
			<script type="text/javascript">
			alert("Product added to cart.");
			</script>
			<?php
			echo "<script>window.history.back();</script>";
		}else{
			$array_keys = array_keys($_SESSION["shopping_cart"]);
			if(in_array($code,$array_keys)) {
				?>
				<script type="text/javascript">
				alert("Product already in cart!");
				</script>
				<?php
				echo "<script>window.history.back();</script>";
			}
			else {
				$_SESSION["shopping_cart"] = array_merge(
					$_SESSION["shopping_cart"],
					$cartarray
				);
				?>
				<script type="text/javascript">
				alert("Product added to cart.");
				</script>
				<?php
				echo "<script>window.history.back();</script>";
			}
		}
	
?>