<?php include('plugin/page_declaration.php');?>
	<title>PAT Locker</title>
</head>
<body>
	<?php

	session_start();
  session_unset();
  session_destroy();
  session_write_close();
  session_regenerate_id(true);

	?>
	<!--Main area start-->
	<!--The title and menu start-->
	<?php include('plugin/header4button.php');?>
	<!--The title and menu end-->
			<!-- <div style="height:380px;"> -->
				<!--Spacer -->
				<div style="width:236px; height:500px; float:left;"> </div>
				<!-- end of spacer -->

				<!--Login block start-->
				<div style="text-align:center; margin:0 auto;"id="left_pannel">
					<div id="toptab" ><ptab><b>Please enter your login info:</b></ptab></div>
					<form action="loggedin.php" method="post">
							<pform>
							<input type="hidden" name="arrived_from_login" value="true"></input>
							<br><br>
							<div style="width:155px; float:left;">eMail Address:</div>
							<input type="text" name="email_address"/>
							<br><br>
							<div style="width:155px; float:left;">Password:</div>
							<input type="password" name="password" />
							<br><br>
							<input type="submit" value="Log in" id="submit"/>
						</pform>
					</form>
					<form action="password_reset.php" method="post">
							<!--<a href="password_reset.php">Forgotten password</a>-->
							<input type="hidden" name="user_type" value="PAT_Tester"></input>
							<input type="submit" value="Click here if you have forgotten your password" id="button"></input>
					</form>
							<br><p>Or</p>
							<form action="register.php" method="post">
								<pform>
								<input type="submit" value="Register" id="submit"/>
							</pform>
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
