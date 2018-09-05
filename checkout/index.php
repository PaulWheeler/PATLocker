<?php include('plugin/page_declaration.php');?>
	<title>Checkout</title>
</head>
<body>
	<!--The title and menu start-->
	<?php include('plugin/header.php');?>
	<!--The title and menu end-->

		<!-- Insert code here -->
		<!-- left hand area -->
		<div id="left_pannel">
      <?php
        $nonceFromTheClient = $_POST["payment_method_nonce"];
        echo ('<p>Nonse = '.$nonceFromTheClient.'</p>');
      ?>
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
