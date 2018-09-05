
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
  <?php

  if($_SESSION['clientIsloggedin'] == 'true'or $_SESSION['isloggedin'] == 'true')
	{
    	$client_id = $_SESSION['client_id'];
    	if($_SESSION['isloggedin'] == 'true')
    	{
     	 require($_SESSION['includes'].'PAT_tester.php');
    	}
    	if($_SESSION['clientIsloggedin'] == 'true')
    	{
    	  require($_SESSION['includes'].'PAT_client.php');
    	}
    $mysql = ("
      SELECT *
      FROM loginDB.clients
      WHERE client_id = $client_id");
    $result = mysqli_query($conn, $mysql);
    if (mysqli_query($conn, $mysql))
    {
      $row = mysqli_fetch_array($result);
      echo('<form action="client_details_submited.php" method="post">');
      echo('  <table style="width:100%"; border="0px";>');
      echo('    <tr>');
      echo('      <th></th>');
      echo('      <th>Client Details</th>');
      echo('    </tr>');
      echo('    <tr>');
      echo('      <td><p><b>Business Name</b></p></td>');
      echo('      <td><input type="text" name="business_name" size="35" value="'.$row['business_name'].'" placeholder="'.$row['business_name'].'"></input></td>');
      echo('     </tr>');
      echo('    <tr>');
      echo('      <td><p><b>Contact Name</b></p></td>');
      echo('      <td><input type="text" name="contact_name" size="35" value="'.$row['contact_name'].'"placeholder="'.$row['contact_name'].'"</input></td>');
      echo('    </tr>');
      echo('    <tr>');
      echo('      <td><p><b>Email Address</b></p></td>');
      echo('      <td><input type="text" name="client_email" size="35"  value="'.$row['client_email'].'"</input></td>');
      echo('    </tr>');
      echo('    <tr>');
      echo('      <td><p><b>Telephone</b></p></td>');
      echo('      <td><input type="text" name="client_telephone" size="35"  value="'.$row['client_telephone'].'"</input></td>');
      echo('    </tr>');
      echo('		<tr>');
      echo('		<td></td>');
      echo('    <td><p><input type="submit" id="submit_cell" value="Submit"></input></p></td>');
      echo('		</tr>');
      echo('  </table>');
      echo('</form>');
    }
    else
    {
	 	   echo ("<p>Not connected: " . mysqli_error($conn)."</p>");
		}
   }

  ?>
</body>
</html>
