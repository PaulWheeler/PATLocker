
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
    if($_SESSION['client_Isloggedin'] == 'true')
    {
      require($_SESSION['includes'].'PAT_client.php');
    }

    $mysql = (' UPDATE loginDB.clients
                SET business_name = \''.$_POST['business_name'].'\',
                    contact_name =\''.$_POST['contact_name'].'\',
                    client_email =\''.$_POST['client_email'].'\',
                    client_telephone =\''.$_POST['client_telephone'].'\'
                WHERE client_id = '.$client_id);
    mysqli_query($conn, $mysql);

    echo('    <tr>');
// This code now shows to the editor the changes that have been made
    $mysql = ("
      SELECT *
      FROM loginDB.clients
      WHERE client_id = $client_id");
    $result = mysqli_query($conn, $mysql);
    if (mysqli_query($conn, $mysql))
    {
      $row = mysqli_fetch_array($result);
      echo('  <table style="width:100%"; border="0px";>');
      echo('      <th></th>');
      echo('      <th>Client Details</th>');
      echo('    </tr>');
      echo('    <tr>');
      echo('      <td><p><b>Business Name</b></p></td>');
      echo('      <td>'.$row['business_name'].'</td>');
      echo('     </tr>');
      echo('    <tr>');
      echo('      <td><p><b>Contact Name</b></p></td>');
      echo('      <td>'.$row['contact_name'].'</td>');
      echo('    </tr>');
      echo('    <tr>');
      echo('      <td><p><b>Email Address</b></p></td>');
      echo('      <td>'.$row['client_email'].'</td>');
      echo('    </tr>');
      echo('    <tr>');
      echo('      <td><p><b>Telephone</b></p></td>');
      echo('      <td>'.$row['client_telephone'].'</td>');
      echo('    </tr>');
      echo('		<tr>');
      echo('		<td></td>');
      echo('		</tr>');
      echo('  </table>');
    }
    else
    {
	 	   echo ("<p>Not connected: " . mysqli_error($conn)."</p>");
		}
   }

  ?>
</body>
</html>
