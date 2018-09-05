<?php include('plugin/page_declaration.php');?>
	<title>Add a PAT record</title>
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
				else {
					//Date code to delete when sorted
					$datepicker = $_POST['datepicker'];
					$currentTime= $_POST['currentTime'];

					$datePickerArray = explode('/',$datepicker);
					$currentTimeArray= explode(':', $currentTime);

					$day=$datePickerArray[0];
					$month=$datePickerArray[1];
					$year=$datePickerArray[2];

					$hour=$currentTimeArray[0];
					$minute=$currentTimeArray[1];
					$second=$currentTimeArray[2];

					$timestamp = date('Y-m-d', strtotime($year.$month.$day));
					//End of date code

					$client_id = $_POST['client_id'];
					$tool_id_number = $_POST['tool_id_number'];
					$tool_id = $_POST['tool_id'];
					$_SESSION['tool_key'] = $_POST['tool_id_number'];

					$added_by = $_SESSION['user_id'];
					$cable_check = $_POST['cable_check'];
					$appliance_check = $_POST['appliance_check'];
					$plug_check_internal = $_POST['plug_check_internal'];
					$plug_check_external = $_POST['plug_check_external'];
					$fuse_check = $_POST['fuse_check'];
					$earth_check = $_POST['earth_check'];
					$insulation_check = $_POST['insulation_check'];
					//$polarity_check = $_POST['polarity_check'];
					$polarity_check = "N/A";
				  $combined_inspection_frequency = $_POST['combined_inspection_frequency'];
					$notes = $_POST['notes'];
          if($_POST['ohm_reading']!= true)
          {
            $ohm_reading = 'null';
          }
          else
          {
            $ohm_reading = $_POST['ohm_reading'];
          }


					// Create connection
					require($_SESSION['includes'].'PAT_tester.php');

					$mysql = ("
						INSERT INTO patlocker.pat_records(tool_id, added_by, cable_check,
							appliance_check, plug_check_internal, plug_check_external, fuse_check, earth_check, insulation_check,
							polarity_check, ohm_reading, notes, timestamp)
						VALUES(\"$tool_id_number\", \"$added_by\", \"$cable_check\", \"$appliance_check\",
						\"$plug_check_internal\" , \"$plug_check_external\", \"$fuse_check\", \"$earth_check\", \"$insulation_check\",
						\"$polarity_check\", \"$ohm_reading\", \"$notes\", \"$timestamp\")");

					//Pass the info to the database
					if(mysqli_query($conn, $mysql ))
					{
					}
					else
					{
						echo('<p>My SQL ERROR!!! DB not inserted to.</p>');
						echo('<p>$mysql = '.$mysql.'</p>');
					echo mysql_errno($conn) . ": " . mysql_error($conn). "\n";
					}

					$mysql = ("
					INSERT INTO patlocker.due_dates(tool_id_number, client_id, due_date)
					VALUES(\"$tool_id_number\", \"$client_id\", NOW() + INTERVAL \"$combined_inspection_frequency\" MONTH)");

					//mysqli_query($conn, $mysql);
					if(mysqli_query($conn, $mysql ))
					{
					}
					else
					{
						echo('<p>My SQL ERROR!!! DATE NOT ENTERED not inserted to.</p>');
						echo('<p>$mysql = '.$mysql.'</p>');
					echo mysql_errno($conn) . ": " . mysql_error($conn). "\n";
					}

					//close this connection
					mysqli_close($conn);
					?>
					<!--Left hand pannel-->
					<div id="left_pannel">
						<!-- <iframe src="iframes/rh_tool_description.php" id="left_iframe" name="left_iframe"></iframe> -->
						<iframe src="iframes/appliance_summary.php" id="left_iframe" name="left_iframe"></iframe>
					</div>
					<!--End of Left hand pannel-->

					<!--spacer-->
					<div id="pannel_spacer"></div>
					<!--end of spacer-->

					<!--Right hand area-->
					<div id="right_pannel_XL">
						<iframe id="right_iframe" src="iframes/found_pat_current.php"></iframe>
					</div>
					<!--end of right hand area-->
					<?php
				}
				include('plugin/footer.php'); ?>

	</div>
</body>
</html>
