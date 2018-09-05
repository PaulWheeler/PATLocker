<?php include('plugin/page_declaration.php');?>
<title>Upgrade</title>
</head>
<body>
	<!--The title and menu start-->
	<?php include('plugin/header.php');?>
	<!--The title and menu end-->

	<!-- Insert code here -->


	<!-- left hand area -->
	<div id="left_pannel">

			<p>For only £2.50 a month you can have full access to PAT Locker. This is the price of a tall flat white coffee at Starbucks.
				It's like you can keep this project alive and developed by buying me a coffee once a month:-)
			</p>
			<p>PAT Locker is designed to help you give control of the data to your clients. This can save you at least £2 a month
				 in printing out excel sheets of data. Now all you need to do is to refer your client to this website, and once
				 they have activated their account they then have the the control and freedom to explore and publish or
				 keep private their own data.
			</p>
			<p>I am always happy to hear from clients for any suggestions or bug reports, without these, the project might not
				move forward in the exact direction that you need. So join the community:-)
			</p>

	</div>
	<!--End of left hand pannel-->

	<!-- Spacer -->
	<div id="pannel_spacer"></div>
	<!--End of spacer-->

	<!--right hand pannel-->
	<div id="right_pannel">
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
			<table width="100%">
				<tr>
					<td class="right">First Name</td>
					<td><input type="text" name="firstName"></input></td>
				</tr>
				<tr>
					<td class="right">Last Name</td>
					<td><input type="text" name="lastName"></input></td>
				</tr>
				<tr>
					<td class="right">Telephone number</td>
					<td><input type="text" name="telephone"></input></td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="hidden" name="patUserID" value=<?php echo($_SESSION['user_id']);?>></input>
						<input type="hidden" name="amount" value="<?php echo $amount;?>"></input>
						<div id="payment-form"></div>
					</td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" value="Subscribe for £2.50"></input></td>
				</tr>
			</table>
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
	<!--End of right hand pannel-->


	<!--end of insert code area -->

	<?php include('plugin/footer.php'); ?>
</div>
</body>
</html>
