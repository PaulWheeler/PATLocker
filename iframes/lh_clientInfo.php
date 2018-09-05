<?php session_start()?>
<html lang="en">
  <head>
    <style type="text/css">
      @import url("css/StyleSheet.css");
        @import url(//fonts.googleapis.com/css?family=Titillium+Web);
    </style>
  </head>
<body>
	<!-- Insert code here -->
  <p>Hello</p>
  <?php
	 if($_SESSION['clientIsloggedin'] == 'true' or $_SESSION['isloggedin'] == 'true')
   {
  	if($_SESSION['isloggedin'] == 'true')
    {
  	  require($_SESSION['includes'].'PAT_tester.php');
   	}
    if($_SESSION['clientIsloggedin'] == 'true')
    {
     	require($_SESSION['includes'].'PAT_client.php');
    }
    $client_id = $_SESSION['client_id'];
    echo('<p><b>'. $_SESSION['business_name'] . '</b></p>');
    echo('<p>Contact Name is : '.$_SESSION['contact_name'].'</p>');
    echo('<p>Email Address : '.$_SESSION['client_email'].'</p>');
    echo('<p>Telephone Number : '.$_SESSION['client_telephone'].'</p>');

    if ($_SESSION['client_public_access']=='true')
    {
	?>
      <form target="_parent" action="../client_loggedin.php" method="post">
        <input type="hidden" name="permission" value="false"></input>
				<input type="hidden" name="hasComeFromPermissionForm" value="true"></input>
				<p>Public Access = <input type="submit" value="true" class="MenuLong"></p>
		    </submit>
      </form>
	<?php
	}
	else
	{
		?>
			<form target="_parent" action="../client_loggedin.php" method="post">
				<input type="hidden" name="permission" value="true"></input>
				<input type="hidden" name="hasComeFromPermissionForm" value="true"></input>
				<p>Public Access = <input type="submit" value="false" class="MenuLong"></p>
				</submit>
			</form>
		<?php
	}
	echo('</p>');
	echo('<p>You have a total of '. $_SESSION['number_of_tools'] .' appliances in your tool register</p>');
	echo '<p>Thank you for logging in </p>';

//echo('<p>User_id = '.$_SESSION['user_id'].'</p>');
//end of left hand area

  }?>
</body>
</html>
