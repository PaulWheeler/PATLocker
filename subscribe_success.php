<?php include('plugin/page_declaration.php');?>
	<title>Subscribe</title>
</head>
<body>
	<!--The title and menu start-->
	<?php include('plugin/header.php');?>
	<!--The title and menu end-->

		<!-- Insert code here -->


		<!-- left hand area -->
		<div id="left_pannel">
			<!--Braintree subscribe box-->
			<?php
				if($_SESSION['isloggedin'] == 'true')//and is subscribed != true
				{
					//Subscription cost
					$amount = 2;
					require_once 'braintree_setup.php';
					?>
					<!-- From https://developers.braintreepayments.com/start/hello-client/javascript/v2 -->
					<form id="checkout" method="post" action="checkout.php">
  					<div id="payment-form"></div>
						<p>First Name
							<input type="text" name="firstName"></input>
						</p>
						<p>Last Name
							<input type="text" name="lastName"></input>
						</p>
						<p>Telephone number
							<input type="text" name="telephone"></input>
						</p>
						<input type="hidden" name="patUserID" value=<?php echo($_SESSION['user_id']);?>></input>
						<input type="hidden" name="amount" value="<?php echo $amount;?>"></input>
  				<input type="submit" value="Subscribe"></input>
				</form>

				<script src="https://js.braintreegateway.com/js/braintree-2.32.1.min.js"></script>
				<script>
					//Client token setup from braintree example
					var clientToken = "<?php echo($clientToken = Braintree_ClientToken::generate());?>";
					braintree.setup(clientToken, "dropin",
					{
  					container: "payment-form"
					});
				</script>
				<?php
				};
				?>
			<!-- End of braintree subscribe box -->

		</div>
		<!--End of left hand pannel-->

		<!-- Spacer -->
		<div id="pannel_spacer"></div>
		<!--End of spacer-->

		<!--right hand pannel-->
		<div id="right_pannel">

		</div>
		<!--End of right hand pannel-->
		<!--end of insert code area -->

		<?php include('plugin/footer.php'); ?>
	</div>
</body>
</html>
