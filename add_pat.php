<?php include('plugin/page_declaration.php');?>
	<title>Add a PAT record</title>
	<!-- Calendar -->
<link href="../javascript/styles/glDatePicker.default.css" rel="stylesheet" type="text/css">
<!-- Calendar -->
</head>
<body>



	<!--The title and menu start-->
	<?php include('plugin/header.php');?>
	<!--The title and menu end-->

			<!-- Insert code here -->
			<?php
			if($_SESSION['braintree_subscription_status'] == "Active" && $_SESSION['isloggedin'] == 'true')
			{

				$tool_id = $_POST['tool_id'];
				$client_id = $_SESSION['client_id'];
			?>
			<!--connect to database-->
			<?php
				if($_SESSION['isloggedin'] != 'true')
				{
					header('Location: login.php') ;
				}
				else
				{
					// Create connection
						require($_SESSION['includes'].'PAT_tester.php');
					//Pass the info to the database
					$result =mysqli_query($conn,"
						SELECT *
						FROM patlocker.tool_register
						WHERE tool_id=\"$tool_id \"
						AND client_id =\"$client_id\"");
					$num_rows = mysqli_num_rows($result);
					if ($num_rows == 0)
					{

						$_SESSION['PAT_ID_search']= $tool_id;
					}
					else
					{
						while($row = mysqli_fetch_array($result))
						{
							$id_number = $row['id_number'];
							$_SESSION['unique_tool_id'] = $row['id_number'];
							$_SESSION['PAT_ID_search']= $row['tool_id'];
							$tool_id = $row['tool_id'];
							$pat_tester_id = $row['pat_tester_id'];
							$client_id = $row['client_id'];
							$date_added = $row['date_added'];
							$description = $row['description'];
							$location = $row['location'];
							$environment = $row['environment'];
							$tool_type = $row['tool_type'];
							$class = $row['class'];
							$reg_fuse = $row['fuse_size'];
							$visual_inspection_frequency = $row['visual_inspection_frequency'];
							$combined_inspection_frequency = $row['combined_inspection_frequency'];
							$relevent_info = $row['relevent_info'];
						}
					}
				}
			?>
			<?php
				// if ($_SESSION['isloggedin'] == 'true')
				// {

					//Left hand area

					echo('<div id="left_pannel">');
					echo('	<iframe id="left_iframe" src="iframes/appliance_summary.php"></iframe>');
					echo('</div>');
					//end of left hand area

					//spacer
					echo('<div id="pannel_spacer"></div>');
					//end of spacer

					// Right hand panel
							if ($class == 2)
							{
								include("plugin/class2patform.php");
							}
							if ($class == 1)
							{
								 include("plugin/class1patform.php");
							}
							if ($class == 3)
							{
								include("plugin/class2patform.php");
							}
							if($class == 4)
							{
								include("plugin/class1patform.php");
							}

							if ($num_rows == 0)
									{
										//Select Appliance ID RH Pannel
										echo('<div id="right_pannel">');

											?>
												<div id="toptab" style="width:100%"><ptab><b>Please enter the appliance I.D. code:</b></ptab></div>
												<form action="add_pat.php" method="post">
													<pform>
														<br><br>
														<div style="width:155px; float:left;">Appliance I.D.:</div>
														<input type="text" name="tool_id" />
														<br><br><input type="submit" value="Submit" id="submit">
													</pform>
												</form>
										<?php
										echo('</div>');
									}


						?>
						<!--end of right hand pannel-->

					<!--end of right hand area-->
				<?php
				}
				else
				{
					echo ('<p>Sorry, you don\'t have permission to use this page.</p>');
					echo('<p>You may need to log back in or upgrade your account.</p>');
				}
				?>
		<?php include('plugin/footer.php'); ?>
	</div>
<!--Calendar includes-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="../javascript/glDatePicker.min.js"></script>

<script type="text/javascript">
		$(window).load(function()
		{
				$('#datepicker').glDatePicker();
		});
</script>
<!--End of calendar includes-->

</body>

</html>
