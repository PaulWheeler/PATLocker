
<!-- Menu area -->
<!--<form action="index.php" method="post">
	<input type="submit" name="submit" value="Home" id="submit"/>
</form>
-->
<?php echo('<a href="index.php"><div class="MenuButton">Home</div></a><br>');?>

<?php
	if($_SESSION['isloggedin'] != 'true')
	{
		
		/*
		echo('<form action="more.php" method="post">'.
			'<input type="submit" name="submit" value="more" id="submit"/>'.
			'</form>'.
			'<br>');
			*/
		echo('<a href="more.php"><div class="MenuButton">More</div></a><br>');
	}
?>
<?php
	if($_SESSION['isloggedin'] != 'true')
	{
		/*echo('<form action="register.php" method="post">'.
			'<input type="submit" name="submit" value="Register" id="submit"/>'.
			'</form>'.
			'<br>');
			*/
		echo('<a href="register.php"><div class="MenuButton">Register</div></a><br>');
	}
?>
<?php
	if($_SESSION['isloggedin'] == 'true')
	{
		/*echo('<form action="addclient.php" method="post">'.
			'<input type="submit" name="submit" value="Add Client" id="submit"/>'.
			'</form>'.
			'<br>');
			*/
		echo('<a href="addclient.php"><div class="MenuButton">Add Client</div></a><br>');
	}
?>

<?php
/*
	if($_SESSION['isloggedin'] == 'true')
	{
		echo('<form action="showclients.php" method="post">'.
				'<input type="submit" name="submit" value="Show Clients" id="submit"/>'.
			'</form>');
		echo('<br>');
	}
	*/
?>

<?php

	if($_SESSION['isloggedin'] == 'true')
	{
		/*echo('<form action="selectclient.php" method="post">'.
				'<input type="submit" name="submit" value="Select client" id="submit"/>'.
			'</form>');
		echo('<br>');
		*/
		echo('<a href="selectclient.php"><div class="MenuButton">Select Client</div></a><br>');
	}
?>

<!--
<form action="showusers.php" method="post">
	<input type="submit" name="submit" value="Show Users" id="submit"/>
</form>
<br>
-->
<?php
	if($_SESSION['isloggedin'] == 'true')
	{
		echo('<form action="login.php" method="post">'.
				'<input type="hidden" name="isloggedin" value="false"/>'.
				'<input type="submit" name="submit" value="Log out" id="submit"/>'.
			'</form>');
		echo('<br>');
		
		
	}
	else
	{
		/*echo('<form action="login.php" method="post">'.
				'<input type="submit" name="submit" value="Log in" id="submit"/>'.
			'</form>');
		echo('<br>');
		*/
		echo('<a href="login.php"><div class="MenuButton">Log In</div></a><br>');
	}

?>


<!--End of menu Area -->

