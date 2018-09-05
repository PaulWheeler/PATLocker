<?php include('plugin/page_declaration.php');?>
	<title>Confirm Delete???</title>
</head>
<body>
	<?php
		if($_SESSION['isloggedin'] != 'true')
		{
			header('Location: login.php') ;
		}
	?>
	<?php
	$_SESSION['client_id'] = $_POST['client_id'];
	?>
	<!--The title and menu start-->
	<?php include('plugin/header.php');?>
	<!--The title and menu end-->

			<!-- Insert code here -->
			<div id="pannels_holder">
				<!--Client information area -->
				<div id="left_pannel">
					<p><b>Client Information</b><p>
					<?php
						// Create connection
						if($_SESSION['isloggedin'] == 'true')
						{
							require($_SESSION['includes'].'PAT_tester.php');
						}

						//Pass the info to the database
						$client_details = mysqli_query($conn, "
							SELECT *
							FROM loginDB.clients
							WHERE client_id = ". $_SESSION['client_id']);

						$client_row = mysqli_fetch_array($client_details);

						$result = mysqli_query($conn,"
							SELECT *
							FROM patlocker.tool_register
							WHERE client_id=". $_SESSION['client_id']);
						$num_rows = mysqli_num_rows($result);

						//open connection to patlocker.due_dates
						//require($_SESSION['includes'].'admin_pat.php');
						$due_dates = mysqli_query($conn,"
							SELECT DISTINCT due_date
							FROM patlocker.due_dates
							WHERE client_id = " . $_SESSION['client_id'] . "
							ORDER BY due_date
							ASC
							LIMIT 1");
						// $due_dates = mysqli_query($dbconToLoginDB,"
						// SELECT MIN(due_date)
						// FROM patlocker.due_dates
						// WHERE client_id = ". $_SESSION['client_id']);
						$due_date_row = mysqli_fetch_array($due_dates);

						//close this connection
						mysqli_close($conn);

						//Sessionise the wanted variables
						$_SESSION['client_name'] = $client_row['client_name'];
						$_SESSION['client_email'] = $client_row['client_email'];
						$_SESSION['number_of_clients_tools'] = $num_rows;
						$_SESSION['next_pat_due'] = $due_date_row['due_date'];

						echo('<p style="text-align:left;"><b>Name</b><br>');
						echo($client_row['client_name'].'</p>');
						echo('<p style="text-align:left;"><b>Email Address</b><br>');
						echo($client_row['client_email'].'</p>');
						echo('<p style="text-align:left;"><b>Number of tools in register</b><br>');
						echo('<p>'. $num_rows .'</p>');
						echo('<p style="text-align:left;"><b>Next test due:</b><br>');
						echo($due_date_row['due_date'] .'</p>');
					//	echo('<p>Client ID = ' .$_SESSION['client_id'] . '</p>');
						echo('</p>');
					?>
				</div>
				<!--End of client information area -->

				<!-- Client_area_spacer -->
				<div id="pannel_spacer"></div>
				<!-- End of client_area_spacer-->

				<!--Client menu-->
				<div id="right_pannel">
					<p><b>DELETE CLIENT</b></p>
					<?php
						//include('plugin/client_menu.php');
						echo('<p><b>WARNING!!!</b></p>');
						echo('<p>You are about to delete this client</p>');
						echo('<p>Are you sure you want to delete this client and all their records?</p>');
						//Buttons
						echo('<br><a href="loggedin.php"><div class="MenuLong">Cricky! DON\'T delete</div></a><br>');
						//echo('<br><a href="delete.php"><div class="MenuLong">Yes. Delete client</div></a><br>');
						echo('<form action="delete.php" method="post">'.
							 '<input type="hidden" name="client_id" value="'.$_POST['client_id'].'">'.
								'<input type="submit" name="submit" class="MenuLong"'.
								'value="Yes Delete"></form>');

					?>
				</div>
				<!--End of client menu area -->
			</div>
		<?php include('pagefooter.php');?>
	</div>
</body>
</html>
