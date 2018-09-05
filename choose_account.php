<?php include('plugin/page_declaration.php');?>
<?php

		// $_SESSION['isloggedin'] ='false';
		// $_SESSION['email_address'] = '';
		// $_SESSION['password'] = '';
		// $_SESSION['includes'] = '';
		// $_SESSION['user_id'] = '';
		// $_SESSION['client_id'] = '';
		// $_SESSION['braintree_subscription_status'] ='';
		// $_SESSION['clientIsloggedin'] ='';
	session_start();
  session_unset();
  session_destroy();
  session_write_close();
  session_regenerate_id(true);


?>
	<title>Choose account type</title>
</head>
<body>
	<!--The title and menu start-->
	<?php include('plugin/header4button.php');?>
	<!--The title and menu end-->

		<!-- Insert code here -->
		<p><strong>Please choose your account type</strong></p>
    <a href="login.php"> <div class="MenuLong">PAT Tester</div></a>
		<p><strong>Or</strong></p>
		<a href="client_login.php"> <div class="MenuLong">Client / Customer</div></a>

		<!--end of insert code area -->

		<?php include('plugin/footer.php'); ?>
	</div>
</body>
</html>
