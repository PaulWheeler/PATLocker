<?php include('plugin/page_declaration.php');?>
	<title>Select A PAT Record</title>
</head>

<body>
	<?php
		if($_SESSION['isloggedin'] != 'true')
		{
			header('Location: login.php') ;
		}
	?>
	<!--The title and menu start-->
	<?php include('plugin/header.php');?>
	<!--The title and menu end-->

		<!-- Insert code here -->
		<!--Client information area -->
		<div id="left_pannel">
			<iframe id="left_iframe" name="left_iframe" src="iframes/client_info.php"></iframe>
		</div>
		<!--End of client information area -->
		<!-- Client_area_spacer -->
		<div id="pannel_spacer"></div>
		<!-- End of client_area_spacer-->


		<!--Select Appliance ID RH Pannel-->
		<div id="right_pannel">
			<?php
			// $braintree_subscription_status = $_SESSION['braintree_subscription_status'];
			// if($braintree_subscription_status == "Active"|| $_SESSION['new_account'] == 'true')
			// {

				if($_SESSION['number_of_tools'] > 0)
				{
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
				}
				else
				{
					echo('<p>You have no appliances in the appliance register. Please add some appliances first.</p>');
					//Add Tool to Register Button
					if($_SESSION['isloggedin'] == 'true' )
					{
						echo('<form action="add_tool.php" method="post">'.
								'<input type="submit" name="submit" value="Add Tool to Register" id="submitlong"/>'.
								'</form>');
						echo('<br>');
							}
				//Back Home to client details
					if($_SESSION['isloggedin'] == 'true' )
					{
						echo('<form action="clientaccount.php" method="post">'.
							'<input type="submit" name="submit" value="Back to client menu" id="submitlong"/>'.
							'</form>');
						echo('<br>');
					}
				}
			// }
			// else
			// {
			// 	include('plugin/braintree_not_active.php');
			// }
			?>
		</div>
		<!-- Select Appliance ID end-->
	<?php include('plugin/footer.php'); ?>
	</div>
</body>
</html>
