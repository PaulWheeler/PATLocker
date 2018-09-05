<?php session_start()?>
<html lang="en">
  <head>
    <style type="text/css">
      @import url("css/StyleSheet.css");
        @import url(//fonts.googleapis.com/css?family=Titillium+Web);
    </style>
  </head>
<body>

<h1>Client Information</h1>
<?php
	if($_SESSION['clientIsloggedin'] == 'true' or $_SESSION['isloggedin'] == 'true')
	{
    	if($_SESSION['isloggedin'] == 'true')
    	{
    	  require($_SESSION['includes'].'PAT_tester.php');
    	}
    	if($_SESSION['client_Isloggedin'] == 'true')
    	{
    	  require($_SESSION['includes'].'PAT_client.php');
    	}
  	// Create connection
  	//Pass the info to the database
  	$client_details = mysqli_query($conn, "
   	 SELECT *
   	 FROM loginDB.clients
   	 WHERE client_id = ". $_SESSION['client_id']);
  	$client_row = mysqli_fetch_array($client_details);

  $result = mysqli_query($conn,"
    SELECT *
    FROM patlocker.tool_register
    WHERE client_id=". $_SESSION['client_id']);
  $num_rows = mysqli_num_rows($result);

  $due_dates = mysqli_query($conn,"
    SELECT DISTINCT due_date
    FROM patlocker.due_dates
    WHERE client_id = " . $_SESSION['client_id'] . "
    ORDER BY due_date
    ASC
    LIMIT 1");
  $due_date_row = mysqli_fetch_array($due_dates);
  //$raw_date=$due_date_row['due_date'];
  if (mysqli_num_rows($result)>0)
  {
    $theDate = date('l jS F Y', strtotime($due_date_row['due_date']) );
  }
  else
  {
    $theDate = "Not available";
  }
  //close this connection
  mysqli_close($conn);
  //Sessionise the wanted variables
  $_SESSION['business_name'] = $client_row['business_name'];
  $_SESSION['client_email'] = $client_row['client_email'];
  $_SESSION['number_of_clients_tools'] = $num_rows;
  $_SESSION['next_pat_due'] = $due_date_row['due_date'];

  echo('<p><strong>Business Name</strong><br>');
  echo($client_row['business_name'].'</p>');
  echo('<p><strong>Contact Name</strong><br>');
  echo($client_row['contact_name'].'</p>');
  echo('<p><strong>Telephone Number</strong><br>');
  echo($client_row['client_telephone'].'</p>');
  echo('<p><strong>Email Address</strong><br>');
  echo($client_row['client_email'].'</p>');
  echo('<p><strong>Number of appliances in register</strong><br>');
  echo($num_rows .'</p>');
  echo('<p><strong>Next test due:</strong><br>');
  //echo($due_date_row['due_date'] .'</p>');
  echo($theDate.'</p>');
 // echo('<p>Client id = '.$_SESSION['client_id'].'</p>');
 $_SESSION['number_of_tools'] = $num_rows;
 }
?>
</body>
</html>
