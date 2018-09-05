<?php include('plugin/page_declaration.php');?>
	<title>Details updated</title>
</head>
<body>
	<!--The title and menu start-->
	<?php include('plugin/header4button.php');?>
	<!--The title and menu end-->

		<!-- Insert code here -->
    <?php
    if($_SESSION['isloggedin'] == 'true')
  	{
      require($_SESSION['includes'].'PAT_tester.php');

      $user_id = $_SESSION['user_id'];
      $user_name = $_POST['user_name'];
      $business_name = $_POST['business_name'];
      $email_address = $_POST['email_address'];
      $telephone = $_POST['telephone'];

      // echo('<p>user_id = '.$user_id.'</p>');
      // echo('<p>user_name = '.$user_name.'</p>');
      // echo('<p>business_name = '.$business_name.'</p>');
      // echo('<p>email_address = '.$email_address.'</p>');
      // echo('<p>Telephone = '.$telephone.'</p>');
      $mysql = ('
        UPDATE loginDB.pat_testers
        SET user_name = \''.$user_name.'\', business_name = \''.$business_name.'\',
          email_address = \''.$email_address.'\', telephone = \''.$telephone.'\'
        WHERE user_id =  '.$user_id);
        mysqli_query($conn, $mysql);
    }
    ?>
		<!-- left hand area -->
		<div id="left_pannel">
      <iframe id="left_iframe" name="left_iframe" src="iframes/pat_tester_details.php"></iframe>
		</div>
		<!--End of left hand pannel-->

		<!-- Spacer -->
		<div id="pannel_spacer"></div>
		<!--End of spacer-->

		<!--right hand pannel-->
		<div id="right_pannel">
      <p>Thank you. Your details have been updated.</p>

		</div>
		<!--End of right hand pannel-->
		<!--end of insert code area -->

		<?php include('plugin/footer.php'); ?>
	</div>
</body>
</html>
