<?php
	//View Tool Register button
	if($_SESSION['isloggedin'] == 'true')
	{
		// echo('<form action="view_tool_reg.php" method="post">'.
		// 		'<input type="submit" name="submit" value="View Tool Register" id="submitlong"/>'.
		// 	'</form>');

		echo('<form action="client_toolreg.php" method="post">'.
				'<input type="submit" name="submit" value="View Appliance Register" id="submitlong"/>'.
			'</form>');
		echo('<br>');
	}
	//Add Tool to Register Button
	if($_SESSION['isloggedin'] == 'true' )
	{
		echo('<form action="add_tool.php" method="post">'.
				'<input type="submit" name="submit" value="Add Appliance to Register" id="submitlong"/>'.
			'</form>');
		echo('<br>');
	}
		//Find Pat Record Button
	if($_SESSION['isloggedin'] == 'true')
	{
		echo('<form action="find_pat.php" method="post">'.
				'<input type="submit" name="submit" value="Find a PAT Record" id="submitlong"/>'.
			'</form>');
		echo('<br>');
	}
	//Add Pat Record Button
	if($_SESSION['isloggedin'] == 'true')
	{
		echo('<form action="select_pat.php" method="post">'.
				'<input type="submit" name="submit" value="Add a PAT Record" id="submitlong"/>'.
			'</form>');
		echo('<br>');
	}

	//Edit Client Button
	if($_SESSION['isloggedin'] == 'true')
	{
		echo('<form action="editclients.php" method="post">'.
				'<input type="submit" name="submit" value="Edit Client Details" id="submitlong"/>'.
				'</form>');
		echo('<br>');
	}

	//Home button
	if($_SESSION['isloggedin'] == 'true')
	{
		echo('<form action="loggedin.php" method="post">'.
			'<input type="submit" name="submit" value="Back to Main Menu" id="submitlong"/>'.
			'</form>');
		echo('<br>');
	}
	//End of home button
?>
