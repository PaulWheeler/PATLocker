<?php include('plugin/page_declaration.php');?>
	<title>Terms and Conditions</title>
</head>
<body>
	<!--The title and menu start-->
  <?php
	if($_SESSION['clientIsloggedin']!='true' and $_SESSION['isloggedin']== 'true' and $_SESSION['client_id'])
	{
			include('plugin/header.php');
	}
	else
	{
		include('plugin/header4button.php');
	}
	?>
	<!--The title and menu end-->

		<!-- Insert code here -->

              <iframe width="75%" height="600PX" src="https://docs.google.com/document/d/e/2PACX-1vRy0Jiy6bF-gX6jKdJlTxc1-8VD0xJqoBxEa4kw-I-BSrX-ewLJLblAmeJWiTDVhjBvVskMjjKcn6yp/pub?embedded=true"></iframe>

		<!--end of insert code area -->

		<?php include('plugin/footer.php'); ?>
	</div>
</body>
</html>
