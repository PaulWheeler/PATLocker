<?php include('plugin/page_declaration.php');?>
	<title>Add a client to your list</title>
</head>
<body>
	<!--The title and menu start-->
	<?php include('plugin/header.php');?>
	<!--The title and menu end-->

			<?php
					$business_name = $_POST['business_name'];
					$contact_name = $_POST['contact_name'];
					$client_email = $_POST['client_email'];
					$client_telephone = $_POST['client_telephone'];
					$client_password =  $_POST['client_password'];
					$passwordcheck = $_POST['passwordcheck'];
					$pat_tester_id = $_SESSION['user_id'];
					//$telephone = $_POST['telephone'];

				
					// Create connection
					if($_SESSION['isloggedin'] == 'true')
			    {
			      require($_SESSION['includes'].'PAT_tester.php');
			    }

					//encryption requires that $cleantext be declared first.
					//initialises a value $encryptedtext
					$cleantext = $_POST['client_password'];
					require($_SESSION['includes'].'encrypt.php');
					$client_password = $encryptedtext;

					//Pass the info to the database
					mysqli_query($conn,"
					INSERT INTO loginDB.clients(
																			pat_tester_id,
																			business_name,
																			contact_name,
																			client_email,
																			client_telephone,
																			client_password)
					VALUES(\"$pat_tester_id\",
					 				\"$business_name\",
									\"$contact_name\",
									\"$client_email\",
									\"$client_telephone\",
									\"$client_password\")");

					$mysql = ("
										SELECT client_id
										FROM loginDB.clients
										WHERE pat_tester_id = '".$pat_tester_id."'
										AND client_email = '".$client_email."'"
							);

					if (mysqli_query($conn, $mysql))
					{
						$result = mysqli_query($conn, $mysql);
						$row = mysqli_fetch_array($result);
						$_SESSION['client_id'] = $row['client_id'];
					}

			?>
			<!-- Insert code here -->
			<!--Left Hand Client information area -->
			<div id="left_pannel">
				<div id="toptab" style="width:100%"> Client Successfully  Added </div>
				<iframe id="left_iframe" name="left_iframe" src="iframes/client_info.php"></iframe>
			</div>
				<!--End of left hand client information area -->

				<!-- Client_area_spacer -->
				<div id="pannel_spacer"></div>
				<!-- End of client_area_spacer-->

				<!--Client menu-->
				<div id="right_pannel">
					<h2>Client Menu</h2>
					<?php include('plugin/client_menu.php');?>
				</div>
				<!--End of client menu area -->

		<?php include('plugin/footer.php'); ?>
	</div>
</body>
</html>
