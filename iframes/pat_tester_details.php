
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
    if($_SESSION['user_id'])
    {
      $pat_tester_id=$_SESSION['user_id'];
    }
    else
    {
        $pat_tester_id=$_SESSION['pat_tester_id'];
    }
    $client_id = $_SESSION['client_id'];
    require($_SESSION['includes'].'PAT_tester.php');
    $mysql = ("
      SELECT *
      FROM loginDB.pat_testers
      WHERE user_id = $pat_tester_id");
    $result = mysqli_query($conn, $mysql);
    if (mysqli_query($conn, $mysql))
    {

      echo('<table style="width:100%"; border="0px";>');
      echo('<tr>');
      echo('    <th></th>');
      echo('    <th>PAT Tester Details</th>');
      echo('</tr>');
      $row = mysqli_fetch_array($result);
      $theDate = date('l jS F Y', strtotime($row['joined_date']) );
      echo( '<tr>');
      echo('  <td><p><b>Business Name</b></p></td>');
      echo('  <td><p>'.$row['business_name'].'</p></td>');
      echo('</tr>');
      echo('<tr>');
      echo('  <td><p><b>Name</b></p></td>');
      echo('  <td><p>'.$row['user_name'].'</p></td>');
      echo('</tr>');
      echo( '<tr>');
      echo('  <td><p><b>Email Address</b></p></td>');
      echo('  <td><p>'.$row['email_address'].'</p></td>');
      echo('</tr>');
      echo( '<tr>');
      echo('  <td><p><b>Telephone</b></p></td>');
      echo('  <td><p>'.$row['telephone'].'</p></td>');
      echo('</tr>');
      echo( '<tr>');
      echo('  <td><p><b>Member since</b></p></td>');
      echo('  <td><p>'.$theDate.'</p></td>');
      echo('</tr>');

      echo('</table>');
    }
    else
    {
	 	   echo ("<p>Not connected: " . mysqli_error($conn)."</p>");
		}
   }

  ?>
</body>
</html>
