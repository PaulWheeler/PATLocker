<?php
	if($_POST['isloggedin'] == 'true')
	{
		$isloggedin = 'true';
		$user_id = $_POST['user_id'];
	}
	else
	{	
		$isloggedin = 'false';
	}
?>