<?php include('plugin/page_declaration.php');?>
	<title>Password Reset</title>
</head>
<body>
	<!--The title and menu start-->
	<?php include('plugin/header4button.php');?>
	<!--The title and menu end-->

		<!-- Insert code here -->

    <!-- Spacer -->
    <div id="pannel_spacer" style="width:25%"></div>
    <!--End of spacer-->

		<!-- left hand area -->
		<div id="left_pannel">
      <?php $reset_token= $_GET['token'];
        //echo $reset_token;
        //Finds the /includes/ directory outside the document tree
  		   $docroot = ( isset($_SERVER["PATH_TRANSLATED"]) ) ? $_SERVER["PATH_TRANSLATED"] : "";
    	  if( empty($docroot) ) $docroot = ( isset($_SERVER["DOCUMENT_ROOT"]) ) ? $_SERVER["DOCUMENT_ROOT"] : "";
  		      $home = substr( $docroot, 0, stripos( $docroot, "/public_html" ));
  		      $_SESSION['includes'] = $home.'/includes/';
        //Setup db access with $conn
      require($_SESSION['includes'].'PAT_tester.php');
			//check PAT_Testers DB for token
      $mysql = ("
        SELECT *
        FROM loginDB.pat_testers
				WHERE reset_token = \"$reset_token\";");

			//echo('<p>loginDB mysql = '.$mysql.'</p>');
				$result = mysqli_query($conn, $mysql);

	      $_SESSION['num_rows'] = mysqli_num_rows($result);
				//echo('<p>LoginDB num Rows = '.$_SESSION['num_rows'].'</p>');
				if ($_SESSION['num_rows'] == 1)
				{
					$user_type = "PAT_Tester";
				}

				//Token not in loginDB case
	      if ($_SESSION['num_rows'] != 1)
	      {
					//echo('<p>in !=1 condition</p>');
					//check clients DB for token
					$mysql = ("
						SELECT *
						FROM loginDB.clients
						WHERE reset_token = \"$reset_token\";");
					//echo('<p>clients mysql = '.$mysql.'</p>');
					$result = mysqli_query($conn, $mysql);
					$_SESSION['num_rows'] = mysqli_num_rows($result);
					//echo('<p>client num Rows = '.$_SESSION['num_rows'].'</p>');
					if ($_SESSION['num_rows'] == 1)
					{
						$user_type = "client";
						//echo('<p>User type'.$user_type.'</p>');
					}
					if ($_SESSION['num_rows'] != 1)
		      {
						echo('<p>Sorry, it looks like this url has expired</p>');
					}
				//	echo('<p>About to leave main if condition and enter the else</p>');
				}
				if ($_SESSION['num_rows'] == 1)
				{
					while($row = mysqli_fetch_array($result))
					{

						$timestamp = $row['reset_timestamp'];
						if($user_type == "PAT_Tester")
						{
							$email_address = $row['email_email'];
							$user_id= $row['user_id'];
						}
						if($user_type == "client")
						{
							$email_address = $row['client_email'];
							$user_id= $row['client_id'];
						}

						//echo('<p>time() = '.time().'</p>');
						//echo('<p>timestamp = '.$timestamp.'</p>');
						//echo('<p>time()+900 = '.(time()+900).'</p>');

						//Reset token is valid
						if(time() <= ($timestamp + 900))
						{
							//echo('<p>Within time</p>');
							?>
							<form id="formplop" action="password_activated.php" method="post" onsubmit="return checkForm(this);">
									<p><strong>Password</strong><br>
									Password must contain at least 6 characters, including UPPER/lowercase and numbers</p>
									<input required title="Password must contain at least 6 characters, including UPPER/lowercase and numbers"
										type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" name="password" onchange="
										this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
										if(this.checkValidity()) form.passwordcheck.pattern = this.value;
									">
									<p><strong>Repeat Password</strong><br>
									Please enter the same Password as above</p>
									<input title="Please enter the same Password as above" type="password"
										required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" name="passwordcheck" onchange="
										this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
									">
									<input type="hidden" name="user_id" value="<?php echo $user_id ?>"/>
									<input type="hidden" name="user_type" value="<?php echo($user_type);?>"></input>
									<br><br><input type="submit" value="Submit" id="submit">

							</form>
							<?php
						}

						//Reset token has expired
						else
						{
							echo('<p>timestamp expired</p>');
						}
						//echo ('<p> email address of user is '.$email_address.'</p>');
					}
				}

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
