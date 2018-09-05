<?php include('plugin/page_declaration.php');?>
	<title>PAT Locker</title>
	</head>
<body>
	<?php
		//Finds the /includes/ directory outside the document tree
		$docroot = ( isset($_SERVER["PATH_TRANSLATED"]) ) ? $_SERVER["PATH_TRANSLATED"] : "";
  		if( empty($docroot) ) $docroot = ( isset($_SERVER["DOCUMENT_ROOT"]) ) ? $_SERVER["DOCUMENT_ROOT"] : "";
  		$home = substr( $docroot, 0, stripos( $docroot, "/public_html" ));
  		$_SESSION['includes'] = $home.'/includes/';

  		require($_SESSION['includes'].'PAT_tester.php');

		//If not logged in and did arrive from login
		if($_SESSION['isloggedin'] != 'true' and $_POST['arrived_from_login'] == 'true')
		{
			//initialise the session variables
			$_SESSION['email_address'] = $_POST['email_address'];
			$email_address = $_SESSION['email_address'];

			//encryption requires that $cleantext be declared first.
	    //initialises a value $encryptedtext
			$cleantext = $_POST['password'];
			require($_SESSION['includes'].'encrypt.php');
			//Check email and password. If there is a match, then allow log in

			$password = $encryptedtext;
			//Connection 1
			$result = mysqli_query($conn, "
			SELECT *
			FROM loginDB.pat_testers
			WHERE email_address = \"$email_address\"
			AND password = \"$password\"");
			$_SESSION['num_rows'] = mysqli_num_rows($result);
			//$_SESSION['num_rows'] = mysqli_num_rows($result);

			if ($_SESSION['num_rows'] != 1)
			{
				$_SESSION['isloggedin'] = 'false';
			}
			else
			{
				while($row = mysqli_fetch_array($result))
				{
					$_SESSION['user_id'] = $row['user_id'];
					$_SESSION['user_name'] = $row['user_name'];
				}
				$_SESSION['isloggedin'] = 'true';
			}
		}
		if ($_SESSION['isloggedin'] == 'true')
		{
			//Connection 2 to loginDB
			$result = mysqli_query($conn,"
				SELECT *
				FROM loginDB.clients
				WHERE pat_tester_id = " . $_SESSION['user_id']);

			//process the results
			$_SESSION['number_of_clients'] = mysqli_num_rows($result);

			//crate Third connection to patlocker
			$result = mysqli_query($conn, "
				SELECT *
				FROM patlocker.tool_register
				WHERE pat_tester_id = " . $_SESSION['user_id']);

			//process the results
			// gets the number of tools the PAT tester cares for
			//$_SESSION['row_cnt'] = mysqli_num_rows($result);
			$_SESSION['number_of_tools'] = mysqli_num_rows($result);
			/* close result set */
    		mysqli_free_result($result);

				//Get the number of days since the user joined and set $_SESSION['new_account'] to 'true' or 'false'
				$mysql = ("SELECT DATEDIFF(NOW(), (SELECT joined_date FROM loginDB.pat_testers WHERE user_id='".$_SESSION['user_id']."')) AS Days;");
				$result = mysqli_query($conn, $mysql);
				if (mysqli_query($conn, $mysql))
		    {
					while($row = mysqli_fetch_array($result))
					{
						//echo ('<p>DAYS = '.$row['Days'].'</p>');
						$days_since_first_subscribed = $row['Days'];
						if($days_since_first_subscribed > 30)
						{
							//echo('<p>Hello</p>');
							$_SESSION['new_account'] = 'false';
						}
						else
						{
							$_SESSION['new_account'] = 'true';
						}
						//echo ('<p>new_account = '. $_SESSION['new_account'].'ish</p>');
					}
				}

			//close this connection
			mysqli_close($conn);
		}
	?>


			<!-- Insert code here -->
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

			<?php
				if ($_SESSION['isloggedin'] == 'true')
				{

					//Left hand area
					echo('	<div id="left_pannel">');
					echo('		<iframe id="left_iframe" name="left_iframe" src="iframes/selectclient_lh.php"></iframe>');
					echo('	</div>');
					//end of left hand area
					//spacer
					echo('	<div id="pannel_spacer"></div>');
					//end of spacer

					//Right hand area
					echo('	<div id="right_pannel">');
					// if (!isset($_SESSION['braintree_subscription_status']))
					// {
					// 	$braintree_subscription_status_is_set = "false";
					// }
					// else
					// {
					// 	$braintree_subscription_status_is_set = "true";
					// }
					echo('		<br><a href="selectclient.php"><div class="MenuLong">Select Client</div></a><br>');
					echo('		<a href="addclient.php"><div class="MenuLong">Add Client</div></a><br>');
					echo('		<a href="delete_client.php"><div class="MenuLong">Delete Client</div></a><br>');
					echo('		<a href="edit_pattester_details.php"><div class="MenuLong">Edit my account</div></a><br>');



					// if ($braintree_subscription_status_is_set == "false")
					// {
					// 	//This if clause should enable free accounts
					// 	if($_SESSION['email_address'] == 'email.address@somwhere.com')
					// 	{
					// 		$_SESSION['braintree_subscription_status'] ="Active";
					// 	}
					// 	else
					// 		{
					// 			include('plugin/braintree_subscription_status.php');
					// 		}
					// }

					// if ($_SESSION['braintree_subscription_status'] !="Active")
					// {
					//
					// 	if($days_since_first_subscribed <= 30)
					// 	{
					// 		echo('<p>You only have '.(30 - $days_since_first_subscribed) .' days left of your free trial</p>');
					// 	}
				  //   echo('<p>Upgrade for the ability to add and update records:-)</p>');
				  //   echo('<form target="_parent" action="../upgrade.php" method="post">'.
				  //        '<input type="submit" name="submit" value="Upgrade" id="submitlong"/>'.
				  //   			'</form>');
					// }
					echo('	</div>');
					//end of right hand area
				}
				else
				{
					echo ('<p>Sorry, I didn\'t recognise that email and password combination.</p>');
					echo('<p>Please click login to try again.</p>');
				}
				include('plugin/footer.php');
 			?>
		</div>

</body>
</html>
