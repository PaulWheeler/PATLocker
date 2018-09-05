<?php include('plugin/page_declaration.php');?>
	<title>Log-in</title>
</head>
<body>
	<?php
		//Finds the /includes/ directory outside the document tree
		$docroot = ( isset($_SERVER["PATH_TRANSLATED"]) ) ? $_SERVER["PATH_TRANSLATED"] : "";
  		if( empty($docroot) ) $docroot = ( isset($_SERVER["DOCUMENT_ROOT"]) ) ? $_SERVER["DOCUMENT_ROOT"] : "";
  		$home = substr( $docroot, 0, stripos( $docroot, "/public_html" ));
  		$_SESSION['includes'] = $home.'/includes/';

  		require($_SESSION['includes'].'PAT_client.php');

		//If not logged in and did arrive from login
		if($_SESSION['clientIsloggedin'] != 'true' and $_POST['arrived_from_client_login'] == 'true')
		{
			//echo("in the if not logged in and arrived from login if condition");
			//initialise the session variables
			$_SESSION['client_email_address'] = $_POST['clientEmail_address'];
			//$_SESSION['client_password'] = $_POST['clientPassword'];
			$client_email_address = $_SESSION['client_email_address'];
			//encryption requires that $cleantext be declared first.
	    //initialises a value $encryptedtext
	    $cleantext = $_POST['clientPassword'];
	    require($_SESSION['includes'].'encrypt.php');
			$client_password = $encryptedtext;

			//Check email and password. If there is a match, then allow log in
			//$mysql=('SELECT * FROM loginDB.clients WHERE email_address ='.$client_email_address.'AND password = SHA1('.$client_password.')');
			$mysql=("
			SELECT *
			FROM loginDB.clients
			WHERE client_email =\"$client_email_address\"
			AND client_password =\"$client_password\"");
						//Connection 1
			$result = mysqli_query($conn, $mysql);
			if (mysqli_query($conn, $mysql))
			{
				$_SESSION['num_rows'] = mysqli_num_rows($result);
				//$_SESSION['num_rows'] = mysqli_num_rows($result);
				//Client number of rows not equal to 1
				if ($_SESSION['num_rows'] != 1)
				{
					$_SESSION['clientIsloggedin'] = 'false';
				}
				else
				{
					//Client number of rows ==  1
					while($row = mysqli_fetch_array($result))
					{
						$_SESSION['client_id'] = $row['client_id'];
						$_SESSION['business_name'] = $row['business_name'];
						$_SESSION['contact_name'] = $row['contact_name'];
						$_SESSION['client_email'] = $row['client_email'];
						$_SESSION['client_telephone'] = $row['client_telephone'];
						$_SESSION['client_public_access'] = $row['client_public_access'];
						$_SESSION['pat_tester_id'] = $row['pat_tester_id'];
					}
					$_SESSION['clientIsloggedin'] = 'true';
				}
			}
			else
			{
				echo "<p>No no no Not connected: " . mysqli_error($conn)."</p>";
			}
		}

		if ($_SESSION['clientIsloggedin'] == 'true')
		{
			//crate second connection to patlocker
			$result = mysqli_query($conn, "
				SELECT *
				FROM patlocker.tool_register
				WHERE client_id = " . $_SESSION['client_id']);

			//process the results
			// gets the number of tools the PAT tester cares for
			//$_SESSION['row_cnt'] = mysqli_num_rows($result);
			$_SESSION['number_of_tools'] = mysqli_num_rows($result);
			/* close result set */
    		mysqli_free_result($result);
			//close this connection
			mysqli_close($conn);
		}

		//From permission form
		if($_POST['hasComeFromPermissionForm'] == 'true')
		{
			$client_id = $_SESSION['client_id'];
			$permission = $_POST['permission'];
			$_SESSION['client_public_access'] = $_POST['permission'];
			require($_SESSION['includes'].'PAT_client.php');
			$mysql = (' UPDATE loginDB.clients
								SET client_public_access = '.$permission.'
								WHERE client_id = '.$client_id);
			mysqli_query($conn, $mysql);
			if (!mysqli_query($conn, $mysql))
			{
				echo('<p>Database error on trying to change client public/private permission</p>');
			}
		}
	?>
	<!--The title and menu start-->
	<?php
	if ($_SESSION['clientIsloggedin'] == 'true')
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
			<?php
				if ($_SESSION['clientIsloggedin'] == 'true')
				{
						//Left hand area
						include('plugin/leftHandClientInfoPanel.php');
						//end of left hand area

						//spacer
						echo('<div id="pannel_spacer"></div>');
						//end of spacer

						//Right hand area
						echo('<div id="right_pannel">');
						echo('<br><a href="client_toolreg.php"><div class="MenuLong">View your tool register</div></a><br>');
						echo('<a href="find_pat.php"><div class="MenuLong">Find a PAT record</div></a><br>');
						echo('<a href="client_code.php"><div class="MenuLong">Get a PAT search box for your website</div></a><br>');
						echo('<a href="editclients.php"><div class="MenuLong">Edit your details</div></a><br>');
						echo('<a href="change_client_password.php"><div class="MenuLong">Change your password</div></a><br>');
						echo('</div>');
						//end of right hand area
				}
				else
				{
					echo ('<p>Sorry, I didn\'t recognise that email and password combination.</p>');
					echo('<p>Please click login to try again.</p>');
				}
			?>
			<?php include('plugin/footer.php'); ?>
		</div>
</body>
</html>
