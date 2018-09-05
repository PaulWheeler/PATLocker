<?php include('plugin/page_declaration.php');?>
	<title>Add a tool to the register</title>
</head>
<body>
	<!--The title and menu start-->
	<?php include('plugin/header.php');?>
		<!--The title and menu end-->

		<!-- Insert code here -->
		<?php
			if($_SESSION['isloggedin'] != 'true')
			{
				header('Location: login.php') ;
			}
			else
			{
				$tool_id = $_POST['tool_id'];
				$pat_tester_id = $_SESSION['user_id'];
				$client_id = $_SESSION['client_id'];
				$description = $_POST['description'];
				$location = $_POST['location'];
				$environment = $_POST['environment'];
				$tool_type = $_POST['tool_type'];
				$class = $_POST['class'];
				$fuse_size = $_POST['fuse_size'];
				$visual_inspection_frequency = $_POST['visual_inspection_frequency'];
				$combined_inspection_frequency = $_POST['combined_inspection_frequency'];
				$relevent_info = $_POST['relevent_info'];

				$mysql =("INSERT INTO patlocker.tool_register(tool_id, pat_tester_id, client_id, description, location, environment,
					tool_type, class, visual_inspection_frequency, combined_inspection_frequency, relevent_info, fuse_size)
					VALUES(\"$tool_id\", \"$pat_tester_id\", \"$client_id\", \"$description\", \"$location\", \"$environment\", \"$tool_type\"
					, \"$class\", \"$visual_inspection_frequency\",\"$combined_inspection_frequency\", \"$relevent_info\", \"$fuse_size\")");
				// Create connection
				require($_SESSION['includes'].'PAT_tester.php');

				//Pass the info to the database
				mysqli_query($conn, $mysql);

				// We need to make a quiery to obtain the unique id_number of just added appliance
    		$mysql = ("
      		SELECT *
     			FROM patlocker.tool_register
      		WHERE tool_id = $tool_id
					AND client_id = $client_id");
    		if (mysqli_query($conn, $mysql))
    		{
					$result = mysqli_query($conn, $mysql);
 					$row = mysqli_fetch_array($result);
					$_SESSION['unique_tool_id'] = $row['id_number'];
					//$plop = $_SESSION['unique_tool_id'];
				}
				else
    		{
					echo('<p>This is the error from connecting to the tool_register database from added_tool.php</p>');
	 	   		echo ("<p>Not connected: " . mysqli_error($conn)."</p>");
				}
				//echo mysqli_errno($this->db_link);
			}
		?>

		<!--Left hand pannel-->
		<div id="left_pannel">
			<div id="toptab" style="width:100%"><b>Appliance Added to database</b></div>
			<iframe id="left_iframe" name="left_iframe" src="iframes/rh_tool_description.php"></iframe>
		</div>
	<!--End of left hand pannel-->

		<!-- Spacer -->
		<div id="pannel_spacer"></div>
		<!--End of spacer-->

		<!--Right hand area-->
		<!--Client menu-->
		<div id="right_pannel">
			<p><b>Client Menu</b></p>
			<?php include('plugin/client_menu.php');?>
		</div>
		<!--End of client menu area -->
		<!--End of right Hand area-->

		<?php include('plugin/footer.php'); ?>

		<!--</div> closes the one opened in plugins/header.php included at top of page -->
	</div>
</body>
</html>
