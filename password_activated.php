<?php include('plugin/page_declaration.php');?>
	<title>Password Reset</title>
</head>
<body>
	<!--The title and menu start-->
	<?php include('plugin/header4button.php');?>
	<!--The title and menu end-->

		<!-- Insert code here -->
    <?php
    //DB User location should have been established on password_activate.php
    require($_SESSION['includes'].'PAT_tester.php');
    $cleantext = $_POST['password'];
    $user_id= $_POST['user_id'];
    //encrypt the password
    require($_SESSION['includes'].'encrypt.php');
    //echo ('<p>Cleantext = '.$cleantext.'</p>');
    //echo ('<p>Encryptedtext = '. $encryptedtext.'</p>');
    //echo('<p>User_id = '. $user_id.'</p>');
		//echo('<p>user_type = '.$_POST['user_type']);
		if($_POST["user_type"] == "PAT_Tester")
		{
			$mysql = ('
				UPDATE loginDB.pat_testers
				SET password = \''.$encryptedtext.'\', reset_token = \'NULL\', reset_timestamp = NULL
				WHERE user_id =  '.$user_id);
				//echo('<p>Mysql = '.$mysql.'</p>');
		}
		if($_POST["user_type"] == "client")
		{
			$mysql = ('
				UPDATE loginDB.clients
				SET client_password = \''.$encryptedtext.'\', reset_token = \'NULL\', reset_timestamp = NULL
				WHERE client_id =  '.$user_id);
				//echo('<p>Mysql = '.$mysql.'</p>');
		}

        ?>
    <!-- Spacer -->
    <div id="pannel_spacer" style="width:25%"></div>
    <!--End of spacer-->

		<!-- left hand area -->
		<div id="left_pannel">
      <!--<iframe id="left_iframe" name="left_iframe" src="iframes/password_reset_form.php"></iframe>-->
			<?php
				//echo ('<p>'.$mysql.'</p>');
				mysqli_query($conn, $mysql);
				echo('<p>Password change complete, please loging using your new password now.</p>');
			?>
		</div>
		<!--End of left hand pannel-->

		<!-- Spacer -->
		<div id="pannel_spacer" style="width:25%"></div>
		<!--End of spacer-->

		<!--end of insert code area -->

		<?php include('plugin/footer.php'); ?>
	</div>
</body>
</html>
