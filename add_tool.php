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
					//Brintree subscription check or new account check <30 days
					//$braintree_subscription_status = $_SESSION['braintree_subscription_status'];
					//if($braintree_subscription_status == "Active" || $_SESSION['new_account'] == 'true')
					//{
						// Create connection
						require($_SESSION['includes'].'PAT_tester.php');

						//Pass the info to the database
						$result = mysqli_query($conn,"SELECT COUNT(*) FROM patlocker.tool_register WHERE client_id = ".$_SESSION['client_id']);

						$row = mysqli_fetch_array($result);
						mysqli_close($conn);
						$suggested_tool_id = $row['COUNT(*)']+1;
			?>

				<div id="left_pannel">
					<div id="toptab" style="width:100%"><ptab><b>Enter the appliance details</b></ptab></div>
					<!--Start of the submission form-->
					<form action="added_tool.php" method="post" >
						<input type="hidden" name="" value="<??>"></input>
						<p>Appliance ID
						<br>
						<input type="text"  name="tool_id" title="How is the appliance identified?" value="<?php echo($suggested_tool_id);?>" required></input>
						<br>
						Description
						<br>
						<textarea title="Enter a simple description of what the appliance is"rows="5" cols="50" name="description" alt="Where is the appliance kept?" required></textarea>
						<br>
						Appliance Location
						<br>
						<input type="text" name="location" title="Where is the appliance kept? i.e. Room 6" required></input>
						<div style="float:left; width:100%;" class="p_left">
							Environment
							<br>
							<select title="What environment is the appliance used in" name="environment" required>
								<option value="1">1: Office</option>
								<option value="2">2: School</option>
								<option value="3">3: Public and commercial</option>
								<option value="4">4: Industrial</option>
								<option value="5">5: Construction Sites</option>
							</select>
						</div>
				</div>
				<!--end of left hand area-->

				<!--spacer-->
				<div id="pannel_spacer"></div>
				<!--end of spacer-->

				<!--Right hand area-->
				<div id="right_pannel">

					<div style="float:left; width:100%;"class="p_left">
						<br>
						Appliance type
						<br>
						<select title="Select the type of appliance that is being tested"name="tool_type" required>
							<option title="Appliances heavier than 18kg without a carrying hande"
								value="1">1: Stationary</option>
							<option title="Includes computers, fax machines, photocopiers and most business equipment"
								value="2">2: IT</option>
							<option title="Less than 18kg or provided with casters or other means to facilitate movement"
								value="3">3: Movable</option>
							<option title="Less than 18kg and can easily be moved from one location to another"
								value="4">4: Portable</option>
							<option title="Equipment intended to be held whilst in operation"
								value="5">5: Handheld</option>
						</select>	</p>
					</div>
					<br>
					<p>Insulation class
						<br>
						Class I <input title="These appliances must have their chassis connected to electrical earth by a separate earth conductor (coloured green/yellow). The earth connection is achieved with a 3-conductor mains cable, typically ending with 3-prong AC connector which plugs into a corresponding AC outlet."
							type="radio" name="class" value="1" required></input>
						<br>
						Class II<input title="A Class II or double insulated electrical appliance is one which has been designed in such a way that it does not require a safety connection to electrical earth. In Europe, a double insulated appliance must be labelled Class II or double insulated or bear the double insulation symbol (a square inside another square)."
							type="radio" name="class" value="2"></input>
						<br>
						Class III<input title="These are appliances that are supplied at a low voltage (usually called Separated Extra Low Voltage) which must be less than 50 V. These appliances are supplied with a transformer supply that is also marked"
							type="radio" name="class" value="3"></input>
						<br>
						IEC lead / extension cable<input title="mains extention leads and IEC cables"
							type="radio" name="class" value="4"></input></p>

						<div style="float:left; width:33.3%;"class="p_left">
							Visual inspection<br>Frequency
							<br>
							<select name="visual_inspection_frequency" required>
								<option value="3">3 Months</option>
								<option value="6">6 Months</option>
								<option value="12">1 Year</option>
								<option value="18">18 Months</option>
								<option value="24">2 Years</option>
								<option value="36">3 Years</option>
								<option value="48">4 Years</option>
							</select>
						</div>

						<div style="float:left; width:33.3%;"class="p_left">
							Combined inspection<br>Frequency
							<br>
							<select name="combined_inspection_frequency" required>
								<option value="3">3 Months</option>
								<option value="6">6 Months</option>
								<option value="12">1 Year</option>
								<option value="18">18 Months</option>
								<option value="24">2 Years</option>
								<option value="36">3 Years</option>
								<option value="48">4 Years</option>
							</select>
						</div>

						<div style="float:left; width:33.3%;"class="p_left">
							Correct Fuse size
							<br><br>
							<select name="fuse_size" required >
								<option value="na">N/A</option>
								<option value="1">1 Amp</option>
								<option value="2">2 Amp</option>
								<option value="3">3 Amp</option>
								<option value="4">4 Amp</option>
								<option value="5">5 Amp</option>
								<option value="6">6 Amp</option>
								<option value="7">7 Amp</option>
								<option value="8">8 Amp</option>
								<option value="9">9 Amp</option>
								<option value="10">10 Amp</option>
								<option value="11">11 Amp</option>
								<option value="12">12 Amp</option>
								<option value="13">13Amp</option>
								<option value="15">15 Amp</option>
								<option value="20">20 Amp</option>
								<option value="30"> 30 Amp</option>
								<option value="45">45 Amp</option>
							</select>
						</div>
						<br><br><br><br>
						Relevent Information
						<br>
						<textarea  cols="50" name="relevent_info"></textarea>
						<br><br>
						<input type="submit" name="submit" value="Save" id="submit" ></input>
					</form>

				</div>

				<?php
			// }
			// 	else
			// 	{
			// 		include('plugin/braintree_not_active.php');
			// 	}
			}

				include('plugin/footer.php'); ?>
			</div>
</body>
</html>
