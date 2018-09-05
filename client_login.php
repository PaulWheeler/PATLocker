<?php include('plugin/page_declaration.php');?>
	<title>Log-in</title>
</head>
<body>
	<?php
	session_start();
  session_unset();
  session_destroy();
  session_write_close();
  session_regenerate_id(true);

	?>
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
				<!--Spacer -->
				<div style="width:236px; height:500px; float:left;"> </div>
				<!-- end of spacer -->

				<!--Login block start-->
				<div style="text-align:center; margin:0 auto;"id="left_pannel">
					<div id="toptab"><ptab><b>Please enter your customer login info:</b></ptab></div>
					<form action="client_loggedin.php" method="post">
						<pform>
							<input type="hidden" name="arrived_from_client_login" value="true"></input>
							<br><br>
							<div style="width:155px; float:left;">eMail Address:</div>
							<input type="text" name="clientEmail_address" />
							<br><br>
							<div style="width:155px; float:left;">Password:</div>
							<input type="password" name="clientPassword" />
							<br><br>
							<input type="submit" value="Submit" id="submit"/>
						</pform>
					</form>

					<form action="password_reset.php" method="post">
						<input type="hidden" name="user_type" value="client"></input>
						<p>Or click here if its you are activating your account or have forgotten your password</p>
						<input type="submit" value="Activate" id="submit"></input>
				</form>

				</div>
				<!-- Login block end -->
				<!--Spacer -->
				<div style="width:236px; height:500px; float:left;"> </div>
				<!-- end of spacer -->
				<?php include('plugin/footer.php');?>
			<!-- Main area end -->

	</div>
</body>
</html>
