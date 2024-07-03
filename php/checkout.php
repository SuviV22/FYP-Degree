<?php
	include('session.php');

	if(!empty($_POST['stripeToken']))
	{
		$token  = $_POST['stripeToken'];
		$address = $_POST["address"];
		$date = $_POST["date"];
		$time = $_POST["time"];
		$name = $_POST["name"];
		$email = $_POST["email"];
		$phone = $_POST["phone"];	
		$cardnum = $_POST["cardnum"];	
		$cardex = $_POST["card-expiry"];
		$escaped_cardex = str_replace("/",".",$cardex);
		$cardcvc = $_POST["cardcvc"];

		//include Stripe PHP library
		require_once('../stripe-php/init.php');
		//set api key
		$stripe = array(
		  "secret_key"      => "sk_test_51KNY6tDx3OVERZsc7XvjqVsx2QSF3vASV6GC08mCSLwGDLv9wE5IhobNdbr14dfy2Bs3f04iaHwOVI8EbRJ2AIhB00ehDkPKbj",
		  "publishable_key" => "pk_test_51KNY6tDx3OVERZscBsdQJRMjNbkaHtx5oST8NFSB6rDTWDg5spNDdhGCIdYhiGQha3l6kzzB8u9aFPh5gPcMDPaR004r5T4Gf4"
		);
		
		\Stripe\Stripe::setApiKey($stripe['secret_key']);
		
		//add customer to stripe
		$customer = \Stripe\Customer::create(array(
			'email' => $email,
			'source'  => $token
		));
		
		$x = 1;
		$item = "";
		$tprice = $_SESSION["tprice"];
		$amount = $tprice * 100;
		$currency = "myr";
		//$rid = $_SESSION["rid"];
		
		//charge a credit or a debit card
		$charge = \Stripe\Charge::create(array(
			'customer' => $customer->id,
			'amount'   => $amount,
			'currency' => $currency,
			)
		);
		
		//retrieve charge details
		$chargeJson = $charge->jsonSerialize();

		//check whether the charge is successful
		if($chargeJson['amount_refunded'] == 0 && empty($chargeJson
	['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1){
			//order details 
			$amount = $chargeJson['amount'];
			$balance_transaction = $chargeJson['balance_transaction'];
			$currency = $chargeJson['currency'];
			$status = $chargeJson['status'];
			$date = date("Y-m-d H:i:s");
		}
		foreach ($_SESSION["shopping_cart"] as $key => $product)
		{
			$iid = $product["id"];
			$res = mysqli_query($conn, "select * from menuitem where itemID = '$iid'");
			$rowrid = mysqli_fetch_assoc($res);
			$rid = $rowrid["restaurantID"];
			
			$item .= $x . ". " . $product['name'] . " (" . $product["quantity"] . ")\r\n";
			$x++;
		}
		
		$sqlc = "insert into orders (ordersID, ordersItem, ordersPrice, ordersDate, ordersTime, ordersCardNumber, ordersCardExpiry, ordersCardCode, ordersStatus, userID, restaurantID) values ('', '$item', '$tprice', '$date', '$time', '$cardnum', '$escaped_cardex', '$cardcvc', 'Processing', '$user_check', '$rid')";
		$resultc = mysqli_query($conn, $sqlc);
		?>
		<script type="text/javascript">
			alert("Your order has been made!");
		</script>
		<?php
		unset($_SESSION["shopping_cart"]);
		echo "<script>window.location = '../order.php';</script>";
	}
?>
