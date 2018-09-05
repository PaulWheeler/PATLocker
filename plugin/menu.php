
<?php

	//Client menu button
	if($_SESSION['clientIsloggedin']!='true' and $_SESSION['isloggedin']== 'true' and $_SESSION['client_id'])
	{
			echo('<a href="clientaccount.php"><div class="Menu4Buttons">Client Menu</div></a>');
	}
	elseif($_SESSION['clientIsloggedin']!='true' and $_SESSION['isloggedin']== 'true' and !$_SESSION['client_id'])
	{
		echo('<a href="loggedin.php"><div class="Menu4Buttons">Main Menu</div></a>');
	}
	elseif($_SESSION['clientIsloggedin']=='true' and $_SESSION['isloggedin']!= 'true')
	{
		echo('<a href="client_loggedin.php"><div class="Menu4Buttons">Main Menu</div></a>');
	}

	//end of client menu buttton

	//PAT Info button
		echo('<a href="pat_info.php"><div class="Menu4Buttons">Pat Info</div></a>');
	//End of PAT info button

	//Contact Us button
		echo('<a href="contact_us.php"><div class="Menu4Buttons">Contact Us</div></a>');
	//End of Contact us

	//PAT tester Login and logout button
	if($_SESSION['isloggedin'] == 'true')
	{
		echo('<a href="choose_account.php"><div class="Menu4Buttons">Log Out</div></a>');
	}
	elseif($_SESSION['isloggedin'] != 'true' and $_SESSION['clientIsloggedin'] =="true")
	{
		echo('<a href="choose_account.php"><div class="Menu4Buttons">Log Out</div></a>');
	}
	else
	{
		echo('<a href="choose_account.php"><div class="Menu4Buttons">Log In / Register</div></a>');
	}
	//End of login and out button

	// //End button Client Login and logout button or client home button
	// if ($_SESSION['clientIsloggedin'] != 'true' and $_SESSION['isloggedin']!='true')
	// {
	// 	echo('<a href="client_login.php"><div class="MenuButton">Client Log in / Register</div></a>');
	// }
	// elseif($_SESSION['clientIsloggedin'] == 'true')
	// {
	// 	echo('<a href="client_login.php"><div class="MenuButton">Client Log out</div></a>');
	// }
	// elseif($_SESSION['clientIsloggedin']!='true' and $_SESSION['isloggedin']== 'true' and $_SESSION['client_id'])
	// {
	// 		echo('<a href="clientaccount.php"><div class="MenuButton">Client Menu</div></a>');
	// }
	// elseif($_SESSION['clientIsloggedin']!='true' and $_SESSION['isloggedin']== 'true' and !$_SESSION['client_id'])
	// {
	// 		echo('<a href="selectclient.php"><div class="MenuButton">Select Client</div></a>');
	// }
	// //End of end button Client Login and logout button or client home button
?>


<!--End of menu Area -->
