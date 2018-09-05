<?php include('plugin/page_declaration.php');?>
	<title>reset</title>
</head>
<body>
	<!--The title and menu start-->
	<?php include('plugin/header.php');?>
	<!--The title and menu end-->

		<!-- Insert code here -->
		<!-- left hand area -->
		<div id="left_pannel">
	<div id="toptab" style="width:100%;"><b>Change Password</b></div>
	<?php
		echo('<p>From email = '. $_POST['email_address'].' :=)</p>');
		echo('<p>User ID= '. $_POST['user_id'].'</p>');
		echo('<p>From email = '. $_POST['arrived_from_email'].'</p>');
	?>
  	<form action="rh_change_password.php"  target="right_iframe" method="post">
      <strong>New Password</strong>
      <br>
      <input type="password" name="newPassword"/>
      <br>
      <strong>Repeat New Password</strong>
      <br>
      <input type="password" name="passwordCheck"/>
      <br>
      <br>
      <input type="submit" name="submit" value="Confirm change" id="submit" ></input>
    </form>
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
