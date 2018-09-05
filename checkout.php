<?php include('plugin/page_declaration.php');?>
	<title>Checkout</title>
</head>
<body>
	<!--The title and menu start-->
	<?php include('plugin/header.php');?>
	<!--The title and menu end-->

	<!-- Insert code here -->
	<?php
	if($_SESSION['isloggedin'] = 'true' && $_POST['patUserID'])
	{?>


	<!-- left hand area -->
	<div id="left_pannel">
		<!--Braintree checkout-->
    <script src="https://js.braintreegateway.com/js/braintree-2.32.1.min.js"></script>
    <?php
      require_once 'braintree_setup.php';
      //collects user id of client_id
      $customerId = $_POST['user_id'];
      //Collects the payment nonce from the client
      $nonceFromTheClient = $_POST["payment_method_nonce"];
      //Collects customer details
      $firstName=$_POST['firstName'];
      $lastName=$_POST['lastName'];
      $telephone=$_POST['telephone'];
      $patUserID=$_POST['patUserID'];
			$email = $_POST['email'];
      //Collects the amount
      $amount = $_POST['amount'];

      //Create the customer
      $result = Braintree_Customer::create
      ([
        'firstName' => $firstName,
        'lastName' => $lastName,
        'phone' => $telephone,
				'email' => $email,
        'paymentMethodNonce' => $nonceFromTheClient
      ]);

			$result->success;
			# true
			echo('<p>You have subscribed successfully</p>');

			$braintreeCustomerID = $result->customer->id;
			echo('<p>Thank you and welcome to full access</p>');

			$braintreeCustomerPaymentToken = $result->customer->paymentMethods[0]->token;


			//Attempt to initiate a subscription
			$result = Braintree_Subscription::create
			([
  			'paymentMethodToken' => $braintreeCustomerPaymentToken,
  			'planId' => 'kwy2'
			]);
			$braintreeSubscriptionId = $result->subscription->id;
			//echo ('<p>Subscription id is '.$braintreeSubscriptionId.'</p>');
      ?>
			<!--End of braintree checkout-->

			<!--Search this braintree subscription-->
			<?php
			$subscriptionObject = Braintree_Subscription::find($braintreeSubscriptionId);
			$status_history = $subscriptionObject->statusHistory;
			//$subscription = $subscriptionObject->subscription;
			//$nextBillingDate = $subscriptionObject->nextBillingDate;
			$id=$subscriptionObject->id;
			$status=$subscriptionObject->status;



			//echo('<p>Balance = '.$status_history[0]->balance.'</p>');
			//echo('<p>Status = '.$status_history[0]->status.'</p>');
			//echo('<p>ID = '.$id.'</p>');
			//echo('<p>Status = '.$status.'</p>');
			//echo('<p>First Billling Date = '.$subscription->firstBillingDate .'</p>');
			//echo('<p>Next Billling Date = '.$subscription->nextBillingDate .'</p>');
			//echo('<p>Paid Through Date = '.$subscription->paidThroughDate  .'</p>');

			//#=> "12.34"
			?>
			<!--End of braintree subscription search-->
			<!--Patlocker database bit-->
			<?php
				$user_id = $_SESSION['user_id'];
				$customer_id = $braintreeCustomerID;
				//Create connection
				require($_SESSION['includes'].'PAT_tester.php');
				$mysql =("	UPDATE loginDB.pat_testers
										SET braintree_customer_id = \"$braintreeCustomerID\", braintree_subscription_id = \"$braintreeSubscriptionId\"
										WHERE user_id = \"$user_id\"");
				//echo $mysql;
				if(mysqli_query($conn, $mysql ))
				{
				}
				else
				{
					echo('<p>My SQL ERROR!!! DB not inserted to.</p>');
					echo('<p>$mysql = '.$mysql.'</p>');
					echo mysql_errno($conn) . ": " . mysql_error($conn). "\n";
				}

			?>


			<!--End of patlocker database bit-->

		</div>
		<!--End of left hand pannel-->

		<!-- Spacer -->
		<div id="pannel_spacer"></div>
		<!--End of spacer-->

		<!--right hand pannel-->
		<div id="right_pannel">

      <?php
      $body = print_r($_POST, true);
      //echo ('<p>'.$body.'</p>');
      ?>
      <a href="https://patlocker.co.uk/loggedin.php"> Back to home</a>
		</div>
		<!--End of right hand pannel-->
	<?php
	}
	else
	{
		echo('<p>Sorry, there must have been a mistake, you should not be here. </p>');
	}?>
		<!--end of insert code area -->
		<?php $_SESSION['braintree_subscription_status'] = "Active"; ?>
		<?php include('plugin/footer.php'); ?>
	</div>
</body>
</html>
